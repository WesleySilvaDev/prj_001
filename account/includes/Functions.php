<?php

class Functions {

    private $db; 

    public function __construct($db) {
        $this->db = $db;
    }

    
    public function getUserInfo($username) {
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':username' => $username));
        $dbarray = $stmt->fetch();
        
        $result = count($dbarray);
        if (!$dbarray || $result < 1) {
            return NULL;
        }
        
        return $dbarray;
    }
    
    public function getPlan($plan_id){
        $sql = "SELECT * FROM planos WHERE idPlano = :plan_id";
        $sql = $this->db->prepare($sql);
        $sql->execute(array(':plan_id' => $plan_id));
        $data = $sql->fetch();
        
        $result = count($data);
        if (!$data || $result < 1) {
            return NULL;
        }
        
        return $data;
    }
    
    public function getUserInfo_public($cad_detalhes_id) {
        $query = "SELECT * FROM users WHERE id = $cad_detalhes_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':id' => $cad_detalhes_id));
        $dbarray = $stmt->fetch();
      
        $result = count($dbarray);
        if (!$dbarray || $result < 1) {
            return NULL;
        }
     
        return $dbarray;
    }

     
    public function getUserInfoSingular($asset, $username) {
        $asset = strip_tags($asset);
        $query = "SELECT $asset FROM users WHERE (username = :username OR email = :username)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':username' => $username));
        return $usersinfo = $stmt->fetchColumn();
    }
    
    
    public function getUserInfoSingularFromId($asset, $id) {
        $asset = strip_tags($asset);
        $query = "SELECT $asset FROM users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':id' => $id));
        return $usersinfo = $stmt->fetchColumn();
    }

     
    public function usernameTaken($username) {
        $result = $this->db->query("SELECT username FROM users WHERE username = '$username'");
        $count = $result->rowCount();
        return ($count > 0);
    }

    
    function ipDisallowed($ip) {
        $query = "SELECT ban_id FROM banlist WHERE ban_ip = :ip_address";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':ip_address' => $ip));
        $count = $stmt->rowCount();
        return ($count > 0);
    }

     
    public function updateUserField($username, $field, $value) {
        $query = "UPDATE users SET " . $field . " = :value WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':username' => $username, ':value' => $value));
        return $count = $stmt->rowCount();
    }
    public function updateUserFieldaC($username, $field, $value) {
        $query = "UPDATE users SET " . $field . " = :value WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':username' => $username, ':value' => $value));
        return $count = $stmt->rowCount();
    }
    public function updateHiddenShowPhotos($status_photo,$idAqr) {
        $query = ("UPDATE fotos_videos SET status='$status_photo' WHERE id=$idAqr");
        $stmt = $this->db->prepare($query);
        $stmt->execute(); 
        return $count = $stmt->rowCount();
    }
    
    public function update_admin_configCad($admin_configCad_id, $admin_configCad_termos_status, $admin_configCad_docs_status, $admin_configCad_midia_staus, $admin_configCad_docs_recusados_motivo, $admin_configCad_midia_recusada_motivo) {
   
        $query_termos = ("UPDATE users SET termos_aceitos  ='$admin_configCad_termos_status' WHERE id=$admin_configCad_id");
        $stmt_termos = $this->db->prepare($query_termos);
        $stmt_termos->execute(); 
        $query_docs_status = ("UPDATE users SET documentos_aceitos  ='$admin_configCad_docs_status' WHERE id=$admin_configCad_id");
        $stmt_dosc_status = $this->db->prepare($query_docs_status);
        $stmt_dosc_status->execute(); 
        $query_midia = ("UPDATE users SET midia_aceita    ='$admin_configCad_midia_staus' WHERE id=$admin_configCad_id"); 
        $stmt_midia = $this->db->prepare($query_midia);
        $stmt_midia->execute(); 
        $query_doc_rec = ("UPDATE users SET motivo_doc_recusado ='$admin_configCad_docs_recusados_motivo' WHERE id=$admin_configCad_id");
        $stmt_doc_rec = $this->db->prepare($query_doc_rec);
        $stmt_doc_rec->execute(); 
        $query_mid_rec = ("UPDATE users SET motivo_mid_recusada ='$admin_configCad_midia_recusada_motivo' WHERE id=$admin_configCad_id"); 
        $stmt_mid_rec = $this->db->prepare($query_mid_rec); 
        $stmt_mid_rec->execute(); 
        
    }
    
    public function update_admin_config_status_conta($admin_configCad_id_status_conta,$statusDaConta,$uPerFilVericado){  
        $query_mid_rec = ("UPDATE users SET conta = '$statusDaConta', perfil_verificado = '$uPerFilVericado' WHERE id = $admin_configCad_id_status_conta"); 
        $stmt_mid_rec = $this->db->prepare($query_mid_rec); 
        $stmt_mid_rec->execute(); 
        
    }
    
    public function updateExcluirPhoto($idAqr) {
        $this->db->query("DELETE FROM fotos_videos WHERE id = '$idAqr'");  
        
    }
  
    public function uUpdatePlano($assinST,$planUserID) { 
        $query_plan_update = ("UPDATE users SET assinatura_ativa ='$assinST' WHERE id=$planUserID"); 
        $stmt_plan_update = $this->db->prepare($query_plan_update); 
        $stmt_plan_update->execute(); 
    }
    
    public function Pay_assinaturaUpdate($Process_Plano, $Process_User) { 
         
        $NewDate_Payment =date('Y-m-d H:i:s', strtotime('+ 30 days'));
      
        $query_Pay_assinaturaUpdate = ("UPDATE users SET plano = '$Process_Plano', time_plan ='$NewDate_Payment' WHERE username= '$Process_User'"); 
        $stmt_Pay_assinaturaUpdate = $this->db->prepare($query_Pay_assinaturaUpdate); 
        $stmt_Pay_assinaturaUpdate->execute(); 
    }
    
    public function uUpdateDisponivel($modViagem,$modViagemUser) { 
        $query_disponivel_update = ("UPDATE users SET disponivel ='$modViagem' WHERE id=$modViagemUser"); 
        $stmt_disponivel_update = $this->db->prepare($query_disponivel_update); 
        $stmt_disponivel_update->execute(); 
    }
    
    
    public function uUpdate_admn_statusConta($adm_alt_conta_status,$adm_alt_id_user,$adm_alt_colum) { 
        $query_uUpdate_admn_statusConta = ("UPDATE users SET $adm_alt_colum ='$adm_alt_conta_status' WHERE id=$adm_alt_id_user"); 
        $stmt_uUpdate_admn_statusConta = $this->db->prepare($query_uUpdate_admn_statusConta); 
        $stmt_uUpdate_admn_statusConta->execute(); 
    }
    
    public function uUpdate_admn_qtd_dias($update_qtd_dias,$adm_alt_id_user_adc) { 
        $query_uUpdate_admn_qtd_dias = ("UPDATE users SET time_plan ='$update_qtd_dias' WHERE id=$adm_alt_id_user_adc"); 
        $stmt_uUpdate_admn_qtd_dias = $this->db->prepare($query_uUpdate_admn_qtd_dias); 
        $stmt_uUpdate_admn_qtd_dias->execute(); 
    }
    
    public function addSession($userid, $validator, $persist, $id, $expires) {
        $addsession = $this->db->prepare("INSERT INTO user_sessions (session_id, hashedValidator, persistent, userid, expires) VALUES (:userid, :validator, :persist, :id, :expires)");
        $addsession->execute(array(':userid' => $userid, ':validator' => $validator, ':persist'=> $persist, ':id' => $id, ':expires' => $expires));
        return $count = $addsession->rowCount();
    }
 
    public function addLastVisit($username) {
        $admin_details = $this->getUserInfo($username);
        $admin_lastvisit = $admin_details['timestamp'];
        $this->updateUserField($username, "previous_visit", $admin_lastvisit);
    }

     
    function checkBanned($username) {
        $userid = $this->getUserInfoSingular('id', $username);
        $query = "SELECT ban_userid FROM banlist WHERE ban_userid = :userid";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':userid' => $userid));
        $count = $stmt->rowCount();
        return ($count > 0);
    }
    
    function setIndividualPath() {
        $configs = new Configs($this->db);
        if($configs->getConfig('HOME_SETBYADMIN') == 1) { 
            $path = $configs->getConfig('USER_HOME_PATH');
            $path = str_replace('%username%', $_POST['username'], $path);   
            
            if((strtolower($_POST['username']) == strtolower(ADMIN_NAME)) && ($configs->getConfig('NO_ADMIN_REDIRECT') == 1)) {
                $path = $configs->loginPage();
                header("Location: " . $path);
            } else { 
                header("Location: " . $configs->getConfig('WEB_ROOT') . $path);
            }
        } else if ($configs->getConfig('HOME_SETBYADMIN') == 0) { 
         
            if((strtolower($_POST['username']) == strtolower(ADMIN_NAME)) && ($configs->getConfig('NO_ADMIN_REDIRECT') == 1)) {
                $path = $configs->loginPage();
                header("Location: " . $path);
            } else {
                $username = $_POST['username'];
                $query = "SELECT user_home_path FROM users WHERE username = :username";
                $stmt = $this->db->prepare($query);
                $stmt->execute(array(':username' => $username));
                $path = $stmt->fetchColumn();
                $path = str_replace('%username%', $_POST['username'], $path);
                header("Location: " . $configs->getConfig('WEB_ROOT') . $path);
            }
        }
    }
  
    public function calcNumActiveUsers() {
        $ten = time() - 600;  
        $sql = $this->db->query("SELECT id FROM user_sessions WHERE timestamp >= '$ten'");
        return $num_active_users = $sql->rowCount();
    }
    
    public function activeUserList($showlinks) {
        $twenty = time() - 1200;  
        $stmt = $this->db->query("SELECT users.username FROM `users` INNER JOIN `user_sessions` ON users.id=user_sessions.userid WHERE user_sessions.timestamp >= '$twenty' ORDER BY users.username ASC");
        $count = 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $username = $row['username'];
            if($count != 0) { echo ","; }
            if($showlinks){
                $configs = new Configs($this->db);
                echo " <a href='".$configs->getConfig('WEB_ROOT')."adminuseredit.php?usertoedit=" . $username . "'>" . $username . "</a>";
            } else {
                echo " $username";
            }
            $count++;
        }
    }
    
    public function totalUsers() {
       
        $sql = $this->db->query("SELECT id FROM users");
        return $total_users = $sql->rowCount();
    }

    public function usernameRegex($subuser) {
        $configs = new Configs($this->db);
        $option = $configs->getConfig('USERNAME_REGEX');
        switch ($option) {
            case 'any_chars':
                $regex = '.+';
                break;

            case 'alphanumeric_only':
                $regex = '[A-Za-z0-9]+';
                break;

            case 'alphanumeric_spacers':
                $regex = '[A-Za-z0-9-[\]_+ ]+';
                break;

            case 'any_letter_num':
                $regex = '[a-zA-Z0-9]+';
                break;

            case 'letter_num_spaces':
            default:
                $regex = '[-\]_+ [a-zA-Z0-9]+';
                break;
        }
        if (preg_match('#^' . $regex . '$#u', $subuser)) {
            return 1;
        }
    }
    
    function emailCheck($email, $conf_email, $field) {

        if (!$email || strlen($email = trim($email)) == 0) {
            Form::setError($field, " Informe um email");
        } else {
             
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                Form::setError($field, " Email inválido");
            }
             
            else if (strcasecmp($email, $conf_email)) {
                Form::setError($field, " Os endereços de email não correspondem");
            }
             
            else if ($this->emailTaken($email)) {
                Form::setError($field, " Esse email já está em uso");               
            } 
 
            $email = strtolower($email);
        }
    }

    function nameCheck($name, $field, $fullname, $min, $max) {
        if (!$name) {
            Form::setError($field, $fullname . "  muito curto");
        } else {
 
            if (strlen($name) < $min) { 
                Form::setError($field,  $fullname." muito curto");
            }
              else if (strlen($name) > $max) {
                Form::setError($field, $fullname . " muito longo");
            }
                else if (!preg_match("#^[A-Za-z0-9-[\]_+ ]+$#u", ($name = trim($name)))) {
                Form::setError($field, $fullname. " Não é permitido símbolos ou caracteres especiais");
            }
        }
    }
    
    function emailTaken($email) {
        $query = "SELECT email FROM users WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':email' => $email));
        $count = $stmt->rowCount();
        return ($count > 0);
    }

   
    function checkGroupNumbers($groupid) {
        $sql = $this->db->query("SELECT COUNT(group_id) FROM users_groups WHERE group_id = '$groupid'");
        return $count = $sql->fetchColumn();      
    }
    
    function getGroupId($groupname) {
        $sql = $this->db->query("SELECT users_groups.group_id FROM groups INNER JOIN `users_groups` ON groups.group_id = users_groups.group_id WHERE group_name = '$groupname' LIMIT 1");
        return $group_id = $sql->fetchColumn();
    }
    
    function returnGroupInfo($id) {
        $sql = $this->db->query("SELECT * FROM `groups` WHERE group_id = '$id'");
        return $groupinfo = $sql->fetch();
    }
    
    function returnGroupMembers($id) {
        $sql = $this->db->query("SELECT users.username, users_groups.group_id FROM `users` INNER JOIN `users_groups` ON users.id=users_groups.user_id WHERE users_groups.group_id = '$id'");
        return $groupinfo = $sql->fetch();
    }
    
    function cookieCheck($session_id, $validator) {
        $hashedValidator = hash('sha256', $validator);
        $time = time();
        $sql = $this->db->query("SELECT * FROM user_sessions WHERE session_id = '$session_id'");
        $sessioninfo = $sql->fetch();
        if($sessioninfo){
            if(hash_equals($sessioninfo['hashedValidator'], $hashedValidator) && $sessioninfo['expires'] > $time){
                $userinfo = $this->getUserInfoSingularFromId('username', $sessioninfo['userid']);
                $_SESSION['username'] = $userinfo;
                $_SESSION['session_id'] = $session_id;
                $_SESSION['id'] = $sessioninfo['userid'];
                
                
                $configs = new Configs($this->db);
                 
                if ($configs->getConfig('PERSIST_NOT_EXPIRE') == '1') {
 
                    $cookie_path = $configs->getConfig('COOKIE_PATH');
                    $cookie_expire = $configs->getConfig('COOKIE_EXPIRE');
                    setcookie("xa_sessid", $session_id, time() + 60 * 60 * 24 * $cookie_expire, $cookie_path,"","",1);
                    setcookie("xa_valid", $validator, time() + 60 * 60 * 24 * $cookie_expire, $cookie_path,"","",1);
 
                    $session_expiry = time() + 60 * 60 * 24 * $cookie_expire;               
                    $this->db->query("UPDATE user_sessions SET expires = '$session_expiry' WHERE session_id = '$session_id'");
                }

            } else { 
                $this->deleteSession($sessioninfo['id']);
                $this->deleteCookies();
                session_regenerate_id();
                session_destroy();
                unset($_SESSION['session_id']);
                unset($_SESSION['id']);
                $_SESSION['username'] = GUEST_NAME;
            }
        } else { 
            $this->deleteCookies();
            session_regenerate_id();
            session_destroy();
            unset($_SESSION['session_id']);
            unset($_SESSION['id']);
            $_SESSION['username'] = GUEST_NAME;
        }
        
    }
    
    function deleteCookies(){
        $configs = new Configs($this->db);
        if (isset($_COOKIE['xa_sessid']) && isset($_COOKIE['xa_valid'])) {

            $cookie_expire = $configs->getConfig('COOKIE_EXPIRE');
            $cookie_path = $configs->getConfig('COOKIE_PATH');

            setcookie("xa_sessid", "", time() - 60 * 60 * 24 * $cookie_expire, $cookie_path);
            setcookie("xa_valid", "", time() - 60 * 60 * 24 * $cookie_expire, $cookie_path);
        }
    }
   
    function deleteSession($id) {
        $deletesess = $this->db->prepare("DELETE FROM user_sessions WHERE id = :id LIMIT 1");
        $deletesess->execute(array(':id' => $id));
    }
    
    function deleteAllUserSessions($userid) {
        $deletesess = $this->db->prepare("DELETE FROM user_sessions WHERE userid = :userid");
        $deletesess->execute(array(':userid' => $userid));
    }
    
    function deleteAllSessionsButCurrent($userid) {
        $sessionid = $_SESSION['session_id'];
        $deletesess = $this->db->prepare("DELETE FROM user_sessions WHERE userid = :userid AND session_id != '$sessionid'");
        $deletesess->execute(array(':userid' => $userid));
    }
    
    function deleteAllSessionsButAdmin() {
        $sessionid = $_SESSION['session_id'];
        $this->db->query("DELETE FROM user_sessions WHERE session_id != '$sessionid'");
    }
    
    function deleteCurrentSession() {
        $sessionid = $_SESSION['session_id'];
        $this->db->query("DELETE FROM user_sessions WHERE session_id = '$sessionid'");
    }

    public static function generateRandStr($length) {
        
        $string = bin2hex(openssl_random_pseudo_bytes($length));  
        return $string;
    }

}
