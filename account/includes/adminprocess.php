<?php

include_once 'controller.php';

if (!$session->isAdmin()) {
    header("Location: " . $configs->homePage());
    exit;
}

$form_submission = (isset($_POST['form_submission']) ) ? $_POST['form_submission'] : $_GET['form_submission'];
switch ($form_submission) {

    case "activate_users" :
        activateUsers($db, $configs, $functions, $session, $logger);
        break;
    case "admin_registration" :
        adminRegister($db, $session, $configs, $functions, $logger);
        break;
    case "delete_individual_sessions" :
        deleteIndividualSessions($db, $adminfunctions, $session);
        break;
    case "delete_all_user_sessions" :
        deleteAllUserSessions($functions, $adminfunctions, $session, $logger);
        break;
    case "delete_inactive" :
        deleteInactive($db, $adminfunctions, $session);
        break;
    case "disallow_user" :
        disallowUsername($db);
        break;
    case "undisallow_user" :
        unDisallowUsername($db);
        break;
    case "group_creation" :
        groupCreation($db);
        break;
    case "edit_group" :
        editGroup($db);
        break;
    case "edit_group_membership" :
        editGroupMembership($db, $session, $adminfunctions, $functions);
        break;
    case "remove_groupmember" :
        removeFromGroup($db, $session, $adminfunctions, $functions);
        break;
    case "delete_group" :
        deleteGroup($db, $session, $adminfunctions);
        break;
    case "ban_ip" :
        banIp($db, $adminfunctions);
        break;
    case "unban_ip" :
        deleteBanIp($db, $adminfunctions);
        break;
    case "config_edit" :
        configEdit($adminfunctions, $configs, $session);
        break;
    case "registration_edit" :
        regConfigEdit($adminfunctions, $configs, $session);
        break;
    case "session_edit" :
        sessionConfigEdit($adminfunctions, $configs, $session);
        break;
    case "main_user_settings" :
        mainUserSettingsEdit($adminfunctions, $configs, $session);
        break;
    case "user_settings" :
        userSettingsEdit($adminfunctions, $configs, $session);
        break;
    case "update_userhome" :
        updateUserHomePage($db, $adminfunctions, $session);
        break;
    case "edit_user" :
        if (isset($_POST['button']) && ($_POST['button'] == "Edit Account")) {
            editAccount($adminfunctions, $session);
        }
        break;
    case "delete_user" :
        if (isset($_POST['button']) && ($_POST['button'] == "Ban User")) {
            banUser($db, $functions, $session, $logger);
        } else
        if (isset($_POST['button']) && ($_POST['button'] == "unban User")) {
            unBanUser($db, $functions, $session, $logger);
        } else
        if (isset($_POST['button']) && ($_POST['button'] == "Promotetoadmin")) {
            promoteUserToAdmin($adminfunctions, $session);
        } else
        if (isset($_POST['button']) && ($_POST['button'] == "Demotefromadmin")) {
            demoteUserFromAdmin($adminfunctions, $session);
        } else
        if (isset($_POST['button']) && ($_POST['button'] == "Delete")) {
            deleteUser($db, $adminfunctions, $functions, $session, $logger);
        }
        break;
    default :
        header("Location: " . $configs->homePage());
}

 
function adminRegister($db, $session, $configs, $functions, $logger) {
    $registration = new Registration($db, $session, $configs, $functions, $logger);
 
    if ($configs->getConfig('ALL_LOWERCASE') == 1) {
        $_POST['user'] = strtolower($_POST['user']);
    }

    $retval = $registration->register($_POST['user'], $_POST['firstname'], $_POST['lastname'], $_POST['pass'], $_POST['conf_pass'], $_POST['email'], $_POST['conf_email'], 1);
 
    if ($retval == 0) {
        $_SESSION['reguname'] = $_POST['user'];
        $_SESSION['regsuccess'] = 0;
        header("Location: ../summary.php");
    }
     else if ($retval == 1) {
        $_SESSION['reguname'] = $_POST['user'];
        $_SESSION['regsuccess'] = 2;
        header("Location: ../summary.php");
    }
    else if ($retval == 2) {
        $_SESSION['reguname'] = $_POST['user'];
        $_SESSION['regsuccess'] = 2;
        header("Location: ../summary.php");
    }
}

 
function deleteUser($db, $adminfunctions, $functions, $session, $logger) {
 
    $user = $adminfunctions->checkUsername($_POST['usertoedit']);
 
    if (Form::$num_errors > 0) {
        $_SESSION['value_array'] = $_POST;
        $_SESSION['error_array'] = Form::getErrorArray();
        header("Location: " . $session->referrer);
    } else {
        
        if (isset($_POST['delete-user'])) {
            $stop = $_POST['delete-user'];
        } else {
            $stop = '';
        }
        if ($adminfunctions->verifyStop($session->username, 'delete-user', $stop) == '2') {
            
            $userid = $functions->getUserInfoSingular('id', $user);
            $admin_userid = $session->id;
             
            $query = $db->prepare("DELETE FROM users_groups WHERE user_id = '$userid'");
            $query->execute();
             
            $query2 = $db->prepare("DELETE FROM banlist WHERE ban_userid = '$userid' LIMIT 1");
            $query2->execute();
            
            $query3 = $db->prepare("DELETE FROM users WHERE username = :username LIMIT 1");
            $query3->execute(array(':username' => $user));
             
            $logger->purgeLogsOfUser($userid);
             
            $functions->deleteAllUserSessions($userid);
             
            $logger->logAction($admin_userid, "DELETED USER : ".$user );
            
            header("Location: ../useradmin.php");
        } else { 
            header("Location: process.php");
        }
    }
}

 
function deleteInactive($db, $adminfunctions, $session) {
     
    if (isset($_GET['stop'])) {
        $stop = $_GET['stop'];
    } else {
        $stop = '';
    }

    if ($adminfunctions->verifyStop($session->username, 'delete-inactive', $stop) == '2') {
        
    $time = time();
    $inact_time = $time - 30/**days**/ * 24 * 60 * 60;
    $sql = $db->prepare("DELETE FROM users WHERE timestamp < $inact_time AND userlevel != " . SUPER_ADMIN_LEVEL);
    $sql->execute();
    header("Location: ../useradmin.php");
    
 
    } else {
        header("Location: process.php");
    }
}

 
function deleteAllUserSessions($functions, $adminfunctions, $session, $logger) {
     
    if (isset($_GET['stop'])) {
        $stop = $_GET['stop'];
    } else {
        $stop = '';
    }

    if ($adminfunctions->verifyStop($session->username, 'delete-sessions', $stop) == '2') {
        
    $functions->deleteAllSessionsButAdmin();
    $logger->logAction($session->id, "DELETED_ALL_SESSIONS");
    header("Location: ../useradmin.php");
 
    } else {
        header("Location: process.php");
    }
}

 
function deleteIndividualSessions($db, $adminfunctions, $session) {
     
    if (isset($_POST['stop'])) {
        $stop = $_POST['stop'];
    } else {
        $stop = '';
    }

    if ($adminfunctions->verifyStop($session->username, 'delete-sessions', $stop) == '2') {
        
    if (isset($_POST['id'])) {
        foreach ($_POST['id'] as $id) {
            $sql = $db->query("DELETE FROM user_sessions WHERE id = '$id'");
            $sql->execute();          
        }
        header("Location: ../useradmin.php#current_sessions");  
    } else {
        header("Location: ../useradmin.php");  
    }
     
    } else {
        header("Location: process.php");
    }
}
 
function banUser($db, $functions, $session, $logger) {
 
    $banned_user = $_POST['usertoedit'];
    if ($functions->checkBanned($banned_user)) {
        header("Location: ../useradmin.php");
        exit;
        
    } else {
 
        $banuserid = $functions->getUserInfoSingular('id', $banned_user);
        $time = time();
        $sql = $db->prepare("INSERT INTO banlist (ban_userid, timestamp) VALUES ('$banuserid', $time)");
        $sql->execute();
         
        $admin_userid = $session->id;
        $logger->logAction($admin_userid, "BANNED USER : ".$banned_user );
        
        header("Location: ../adminuseredit.php?usertoedit=" . $banned_user);
    }
}

 
function unBanUser($db, $functions, $session, $logger) {
 
    $banned_user = $_POST['usertoedit'];
    if (!$functions->checkBanned($banned_user)) {
        header("Location: ../useradmin.php");
    }
 
    $banuserid = $functions->getUserInfoSingular('id', $banned_user);
    $sql = $db->prepare("DELETE FROM banlist WHERE ban_userid = '$banuserid'");
    $sql->execute();
     
    $admin_userid = $session->id;
    $logger->logAction($admin_userid, "UNBANNED USER : ".$banned_user );
        
    header("Location: ../adminuseredit.php?usertoedit=" . $banned_user);
}
 
function promoteUserToAdmin($adminfunctions, $session){
    
    if(!empty($_POST['usertoedit']) && $session->isSuperAdmin()){
        
        $user_to_promote = $_POST['usertoedit'];
        $adminfunctions->promoteUserToAdmin($user_to_promote);
        header("Location: ../adminuseredit.php?usertoedit=".$user_to_promote);
    } else {       
        header("Location: ../adminuseredit.php?usertoedit=".$user_to_promote);
    }
}
 
function demoteUserFromAdmin($adminfunctions, $session){
    
    if(!empty($_POST['usertoedit'])&& $session->isSuperAdmin()){      
        $user_to_demote = $_POST['usertoedit'];
        $adminfunctions->demoteUserFromAdmin($user_to_demote);
        header("Location: ../adminuseredit.php?usertoedit=".$user_to_demote);
    } else {       
        header("Location: ../adminuseredit.php?usertoedit=".$user_to_demote);
    }
}
 
function disallowUsername($db) {
    if (!empty($_POST['usernametoban'])) {
        $time = time();
        $usernametoban = $_POST['usernametoban'];
        $sql = $db->prepare("INSERT INTO banlist (ban_username, timestamp) VALUES ('$usernametoban', '$time')");
        $sql->execute();
    }
    header("Location: ../security.php");  
}
 
function unDisallowUsername($db) {
    if (isset($_POST['username_tounban'])) {
        $ban_id = $_POST['username_tounban'];
        $sql = $db->prepare("DELETE FROM banlist WHERE ban_id = '$ban_id'");
        $sql->execute();
    }
    header("Location: ../security.php");  
}
 
function banIp($db, $adminfunctions) {
    if (isset($_POST['ipaddress'])) {
        $ipaddress = $_POST['ipaddress'];
        if ($adminfunctions->checkIPFormat($ipaddress)) {
            $time = time();
            $sql = $db->prepare("INSERT INTO banlist (ban_ip, timestamp) VALUES ('$ipaddress', '$time')");
            $sql->execute();
            header("Location: ../security.php"); 
        } else {
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = Form::getErrorArray();
            header("Location: ../security.php");  
        }
    } header("Location: ../security.php");  
}
 
function deleteBanIp($db, $adminfunctions) {
    if (isset($_POST['ipaddress'])) {
        $ipaddress = $_POST['ipaddress'];
        if ($adminfunctions->checkIPFormat($ipaddress)) {
            $sql = $db->prepare("DELETE FROM banlist WHERE ban_ip = '$ipaddress'");
            $sql->execute();
        } else {
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = Form::getErrorArray();
            header("Location: ../security.php");  
        }
    } header("Location: ../security.php");
}

 
function configEdit($adminfunctions, $configs, $session) {
 
    if (isset($_POST['configs'])) {
        $stop = $_POST['configs'];
    } else {
        $stop = '';
    }
    if ($adminfunctions->verifyStop($session->username, 'configs', $stop) == '2') {
 
        $retval = $configs->editConfigs($_POST['sitename'], $_POST['sitedesc'], $_POST['emailfromname'], $_POST['adminemail'], $_POST['webroot'], $_POST['home_page'], $_POST['login_page'], $_POST['date_format']);
 
        if ($retval) {
            $_SESSION['configedit'] = true;
            header("Location: ../configurations.php");
        } else {
            
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = Form::getErrorArray();
            header("Location: ../configurations.php");
        }
 
    } else {
        header("Location: process.php");
    }
}

 
function regConfigEdit($adminfunctions, $configs, $session) {

    if (isset($_POST['registration'])) {
        $stop = $_POST['registration'];
    } else {
        $stop = '';
    }
    if ($adminfunctions->verifyStop($session->username, 'registration', $stop) == '2') {
 
        $retval = $configs->editRegConfigs($_POST['activation'], $_POST['limit_username_chars'], $_POST['min_user_chars'], $_POST['max_user_chars'], $_POST['min_pass_chars'], $_POST['max_pass_chars'], $_POST['send_welcome'], $_POST['enable_capthca'], $_POST['all_lowercase']);
 
        if ($retval) {
            $_SESSION['configedit'] = true;
            header("Location: ../registration.php");
        } else {
             
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = Form::getErrorArray();
            header("Location: ../registration.php");
        }
 
    } else {
        header("Location: process.php");
    }
}
 
function sessionConfigEdit($adminfunctions, $configs, $session) {

    if (isset($_POST['session'])) {
        $stop = $_POST['session'];
    } else {
        $stop = '';
    }
    if ($adminfunctions->verifyStop($session->username, 'session', $stop) == '2') {

      
        $retval = $configs->editSessConfigs($_POST['user_timeout'], $_POST['guest_timeout'],  $_POST['persist_not_expire'], $_POST['cookie_expiry'], $_POST['cookie_path']);
 
        if ($retval) {
            $_SESSION['configedit'] = true;
            header("Location: ../session-settings.php");
        } else {
           
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = Form::getErrorArray();
            header("Location: ../session-settings.php");
        }
       
    } else {
        header("Location: process.php");
    }
}

 
function groupCreation($db){
    $int_options = array("options"=>array("min_range"=>2, "max_range"=>99));
    if (filter_var($_POST['group_level'], FILTER_VALIDATE_INT, $int_options)){
       $grouplevel = $_POST['group_level']; 
    } else {
       header("Location: ../usergroups.php");
       exit;
    }
    
    $groupname = (htmlspecialchars($_POST['group_name']));
    
    $sql = $db->prepare("INSERT INTO groups (group_name, group_level) VALUES (:groupname, :grouplevel)");
    $sql->execute(array(':groupname' => $groupname, ':grouplevel' => $grouplevel));
    header("Location: ../usergroups.php");
}

 
function editGroup($db){

    $group_id = $_POST['group_id'];
     
    $int_options = array("options"=>array("min_range"=>1, "max_range"=>256));
    if (filter_var($_POST['group_level'], FILTER_VALIDATE_INT, $int_options)){
       $grouplevel = $_POST['group_level']; 
    } else {
       header("Location: ../usergroups.php");
       exit;
    }
     
    $groupname = (htmlspecialchars($_POST['group_name']));        
    $sql = $db->prepare("UPDATE groups SET group_name = :groupname, group_level = :grouplevel WHERE group_id = '$group_id'");
    $sql->execute(array(':groupname' => $groupname, ':grouplevel' => $grouplevel));
     
    foreach ($_POST['add-user'] as $value) { 
        $application = $db->prepare("INSERT INTO users_groups (user_id, group_id) VALUES (:userid, :group_id)");
        $application->execute(array(':userid' => $value, ':group_id' => $group_id));
    }
    
    header("Location: ../usergroups.php");
}

 
function removeFromGroup($db, $session, $adminfunctions, $functions){
    
 
    if (isset($_GET['stop'])) {
        $stop = $_GET['stop'];
    } else {
        $stop = '';
    }
    
    if ($adminfunctions->verifyStop($session->username, 'delete-groupmembership', $stop) == '2') {
        
        $userid = $_GET['remove'];
        $group_id = $_GET['group_id'];
        
        if($group_id == '1') { 
            $username = $functions->getUserInfoSingularFromId('username', $userid); 
            $adminfunctions->demoteUserFromAdmin($username);
        }
    
        $delete_user_from_group = $db->prepare("DELETE FROM users_groups WHERE group_id = :group_id AND user_id = :userid");
        $delete_user_from_group->execute(array(':group_id' => $group_id, ':userid' => $userid));

        header("Location: ../usergroups.php");
 
    } else {
        header("Location: process.php");
    }
}

 
function editGroupMembership($db, $session, $adminfunctions, $functions) {
    
    // Stop Check
    if (isset($_POST['edit-groups'])) {
        $stop = $_POST['edit-groups'];
    } else {
        $stop = '';
    }
    
    if ($adminfunctions->verifyStop($session->username, 'edit-groups', $stop) == '2') {
        
        $userid = $functions->getUserInfoSingular('id', $_POST['usertoedit']);
 
        $sql = $db->prepare("DELETE FROM users_groups WHERE user_id = '$userid' AND group_id != '1' ");
        $sql->execute();
        
        if (!empty($_POST['groups'])){
            
            foreach ($_POST['groups'] as $value) { 
            $application = $db->prepare("INSERT INTO users_groups (user_id, group_id) VALUES (:userid, '$value')");
            $application->execute(array(':userid' => $userid));
            }
            
        }
        
        header("Location: ../adminuseredit.php?usertoedit=" . $_POST['usertoedit']);
        
    } else {
        header("Location: process.php");
    }
}
 
function deleteGroup($db, $session, $adminfunctions) {

    if (isset($_GET['stop'])) {
        $stop = $_GET['stop'];
    } else {
        $stop = '';
    }

    if ($adminfunctions->verifyStop($session->username, 'delete-group', $stop) == '2') {

        $group_id = $_GET['delete'];

        $sql = $db->prepare("DELETE FROM groups WHERE group_id = :group_id");
        $done = $sql->execute(array(':group_id' => $group_id));
        if ($done) {
            $delete_users_from_group = $db->prepare("DELETE FROM users_groups WHERE group_id = :group_id");
            $delete_users_from_group->execute(array(':group_id' => $group_id));
        }
        header("Location: ../usergroups.php");
    } else {
        header("Location: process.php");
    }
}
 
function activateUsers($db, $configs, $functions, $session, $logger) {
    $mailer = new Mailer($db, $configs);
    /* Account edit attempt */
    if (isset($_POST['user_name'])) {
        foreach ($_POST['user_name'] as $username) {
            $sql = $db->prepare("UPDATE users SET USERLEVEL = '3' WHERE username = '$username'");
            $sql->execute();
            $email = $functions->getUserInfoSingular('email', $username);
            $mailer->adminActivated($username, $email);
            $logger->logAction($session->id, "ACTIVATED USER : ".$username );
        }
        header("Location: ../useradmin.php#users_activation");  
    } else {
        header("Location: ../useradmin.php");  
    }
}
 
function mainUserSettingsEdit($adminfunctions, $configs, $session) {
    
    // Stop Check
    if (isset($_POST['mainusersettings'])) {
        $stop = $_POST['mainusersettings'];
    } else {
        $stop = '';
    }
    
    if ($adminfunctions->verifyStop($session->username, 'mainusersettings', $stop) == '2') {
        
        $allow_multiple = $_POST['allow_multi_logins'];        
        $retval = $configs->mainEditUserSettings($allow_multiple);       
        header("Location: ../user-settings.php");
        
    } else {
        header("Location: process.php");
    }
}

function userSettingsEdit($adminfunctions, $configs, $session) {
    
    // Stop Check
    if (isset($_POST['usersettings'])) {
        $stop = $_POST['usersettings'];
    } else {
        $stop = '';
    }
    
    if ($adminfunctions->verifyStop($session->username, 'usersettings', $stop) == '2') {
        
        $turn_on_individual = $_POST['turn_on_individual'];
        $home_setbyadmin = $_POST['home_setbyadmin'];
        $user_home_path_byadmin = $_POST['user_home_path_byadmin'];
        $no_admin_redirect = $_POST['no_admin_redirect'];
        
        $retval = $configs->editUserSettings($turn_on_individual, $home_setbyadmin, $user_home_path_byadmin, $no_admin_redirect);
        
        header("Location: ../user-settings.php");
        
    } else {
        header("Location: process.php");
    }
}
 
function updateUserHomePage($db, $adminfunctions, $session) {
    
        // Stop Check
    if (isset($_POST['update_userhome'])) {
        $stop = $_POST['update_userhome'];
    } else {
        $stop = '';
    }
    
    if ($adminfunctions->verifyStop($session->username, 'update_userhome', $stop) == '2') {
        
        $usertoedit = $_POST['usertoedit'];
        $user_home_path = $_POST['user_home_path'];
        $sql = $db->prepare("UPDATE users SET user_home_path = '$user_home_path' WHERE username = '$usertoedit'");
        $sql->execute();
        header("Location: ../adminuseredit.php?usertoedit=" . $usertoedit . "#homepage");
        
    } else {
        header("Location: process.php");
    }
    
}

function editAccount($adminfunctions, $session) {
 
    if (isset($_POST['edit-user'])) {
        $stop = $_POST['edit-user'];
    } else {
        $stop = '';
    }
    if ($adminfunctions->verifyStop($session->username, 'edit-user', $stop) == '2') {

        $username = $_POST['username'];
 
        $retval = $adminfunctions->adminEditAccount($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['newpass'], $_POST['conf_newpass'], $_POST['email'], $_POST['usertoedit'], $_POST['usertoeditid']);
 
        if ($retval) {
            $_SESSION['adminedit'] = true;
            $_SESSION['usertoedit'] = $_POST['usertoedit'];
            header("Location: ../adminuseredit.php?usertoedit=" . $username);
        } 
        else {
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = Form::getErrorArray();
            header("Location: ../adminuseredit.php?usertoedit=" . $_POST['usertoedit'] ."#profile");
        }
 
    } else {
        header("Location: process.php");
    }
}  
    