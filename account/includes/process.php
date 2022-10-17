<?php
include_once 'controller.php';

 
if (isset($_POST['form_submission'])) {

    $form_submission = $_POST['form_submission'];
    switch ($form_submission) {

        case "adminlogin" :
            adminLogin($db, $session, $functions, $configs, $logger);
            break;
        case "login" :
            login($db, $session, $functions, $configs, $logger);
            break;
        case "register" :
            register($db, $session, $configs, $functions, $logger);
            break;
        case "forgot_password" :
            forgotPass($db, $session, $configs, $functions);
            break;
        case "edit_account" :
            editAccount($session);
            break;
        case "editAccount_termos" :
            editAccountTermos($session);
            break;
         default:
             if ($session->logged_in) {
                 logout($session, $configs);
             } else {
         header("Location: " . $configs->homePage());
             }
    }
} else {
    logout($session, $configs);
}

 
function adminLogin($db, $session, $functions, $configs, $logger) {
    $login = new Login($db, $session, $functions, $configs, $logger);
  
    $success = $login->login($_POST['username'], $_POST['password'], isset($_POST['remember']));
 
    if ($success) {
        header("Location: " . $configs->homePage());
    } else {
        $_SESSION['value_array'] = $_POST;
        $_SESSION['error_array'] = Form::getErrorArray();
        header("Location: " . $session->referrer);
    }
}

 
function login($db, $session, $functions, $configs, $logger) {
    $login = new Login($db, $session, $functions, $configs, $logger);
 
    $success = $login->login($_POST['username'], $_POST['password'], isset($_POST['remember']));

 
    if ($success) {
        $path = $configs->loginPage();
        header("Location: " . $path);
  
    } else {
        $_SESSION['value_array'] = $_POST;
        $_SESSION['error_array'] = Form::getErrorArray();
        header("Location: " . $session->referrer);
    }
}

 
function logout($session, $configs) {
    $session->logout();
    header("Location: " . $configs->homePage());
}

 
function register($db, $session, $configs, $functions, $logger) {
    $registration = new Registration($db, $session, $configs, $functions, $logger);

 
    if ($configs->getConfig('ACCOUNT_ACTIVATION') == 4) {
        $_SESSION['reguname'] = $_POST['user'];
        $_SESSION['regsuccess'] = 6;
        header("Location: " . $session->referrer);
    }

    
    if ($configs->getConfig('ALL_LOWERCASE') == 1) {
        $_POST['user'] = strtolower($_POST['user']);
    }

    
    if (!empty($_POST['killbill'])) {
        $retval = 2;
    } else {
        
        $retval = $registration->register($_POST['user'], $_POST['firstname'], $_POST['lastname'], $_POST['pass'], $_POST['conf_pass'], $_POST['email'], $_POST['conf_email'], 0);
    }

   
    if ($retval == 0) {
        $_SESSION['reguname'] = $_POST['user'];
        $_SESSION['regsuccess'] = 0;
        header("Location: " . $session->referrer . "?registro");
    }

   
    else if ($retval == 3) {
        $_SESSION['reguname'] = $_POST['user'];
        $_SESSION['regsuccess'] = 3;
        header("Location: " . $session->referrer . "?registro");
    }

 
    else if ($retval == 4) {
        $_SESSION['reguname'] = $_POST['user'];
        $_SESSION['regsuccess'] = 4;
        header("Location: " . $session->referrer . "?registro");
    }

   
    else if ($retval == 5) {
        $_SESSION['reguname'] = $_POST['user'];
        $_SESSION['regsuccess'] = 5;
        header("Location: " . $session->referrer );
    }

   
    else if ($retval == 1) {
        header("Location: " . $session->referrer . "?registro");
    }

     
    else if ($retval == 2) {
        $_SESSION['reguname'] = $_POST['user'];
        $_SESSION['regsuccess'] = 2;
        header("Location: " . $session->referrer . "?registro");
    }
}
 
function forgotPass($db, $session, $configs, $functions) {
    
    $user = $_POST['user'];
    $email = $_POST['email'];

    if (!$user || strlen($user = trim($user)) == 0) {
        $field = "pwd_user";   
        Form::setError($field, "Endereço de e-mail não inserido<br>");
    } else if(!$email || strlen($email = trim($email)) == 0) {
        $field = "pwd_email";   
        Form::setError($field, "Endereço de e-mail não inserido<br>");
    } else {
        $field = "pwd_user";  
        if (strcasecmp($user, ADMIN_NAME) == 0) {
            Form::setError($field, "A senha para esta conta não pode ser redefinida");
        } else if (strlen($user) < $configs->getConfig('min_user_chars') || strlen($user) > $configs->getConfig('max_user_chars')) {
            Form::setError($field, "O nome de usuário ou e-mail está incorreto<br>");
        } else if ((!$functions->usernameRegex($user)) || (!$functions->usernameTaken($user, $db))) {
            Form::setError($field, "O nome de usuário ou e-mail está incorreto<br>");
        } else if ($session->checkUserEmailMatch($user, $email) == 0) {
            Form::setError($field, "O nome de usuário ou e-mail está incorreto<br>");
        }
    }
 
    if (Form::$num_errors > 0) {
        $_SESSION['value_array'] = $_POST;
        $_SESSION['error_array'] = Form::getErrorArray();
    } else {
        $mailer = new Mailer($db, $configs);
         
        $emailaddress = $functions->getUserInfoSingular('email', $user);
        $id = $functions->getUserInfoSingular('id', $user);      
       
        $templink = $session->generatePasswordLink($id);
         
        if ($mailer->sendPassLink($user, $emailaddress, $templink)) {
             
            $_SESSION['sentpassemail'] = true;
        } else {
             
            $_SESSION['sentpassemail'] = false;
        }
    }
    header("Location: " . $session->referrer . "#reset");
}

 
function editAccount($session) {
 
    $form = new Form();
    $retval = $session->editAccount($_POST['curpass'], $_POST['newpass'], $_POST['conf_newpass'], $_POST['email']);
 
    if ($retval) {
        $_SESSION['useredit'] = true;
        header("Location: " . $session->referrer);
    }
 
    else {
        $_SESSION['value_array'] = $_POST;
        $_SESSION['error_array'] = Form::getErrorArray();
        header("Location: " . $session->referrer . "#link-edit-user");
    }
} 

 
function editAccountTermos($session) {
 
    $form = new Form();
    $retval = $session->editAccountTermos($_POST['termosAcpt']);
 
    if ($retval) {
        $_SESSION['useredit'] = true;
        header("Location: " . $session->referrer);
    }
 
    else {
        $_SESSION['value_array'] = $_POST;
        $_SESSION['error_array'] = Form::getErrorArray();
        header("Location: " . $session->referrer . "#link-edit-user");
    }
}
