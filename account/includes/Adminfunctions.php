<?php

class Adminfunctions {

    private $db;
    public $functions;
    public $configs;
    public $stop_life = '86400'; 

    public function __construct($db, $functions, $configs, $logger) {
        $this->db = $db;
        $this->functions = $functions;
        $this->configs = $configs;
        $this->logger = $logger;
    }

   
    function checkLevel($username) {
        $query = "SELECT userlevel FROM users WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':username' => $username));
        return $row = $stmt->fetchColumn();
    }

    
    function checkIPFormat($ip) {
        if (!filter_var($ip, FILTER_VALIDATE_IP)) {
            $field = "ip_address";
            Form::setError($field, "Formato de endereço IP incorreto");
        } else {
            return true;
        }
    }
    
 
    function demoteUserFromAdmin($username){
        if ($this->functions->getUserInfoSingular('userlevel', $username) != '9') {
            return false;
        } else {
           
            $this->functions->updateUserField($username, 'userlevel', '3');
            
             
            $user_id = $this->functions->getUserInfoSingular('id', $username);
            $demote = $this->db->prepare("DELETE FROM users_groups WHERE user_id = :userid AND group_id = '1' LIMIT 1");
            $demote->execute(array(':userid' => $user_id));
                 
            $this->logger->logAction($user_id, 'DEMOTED_FROM_ADMIN');
            
            return true;
        }
    }
 
    function promoteUserToAdmin($username){
        if ($this->functions->getUserInfoSingular('userlevel', $username) == '9') {
            return false;
        } else {
          
            $this->functions->updateUserField($username, 'userlevel', '9');
             
            $user_id = $this->functions->getUserInfoSingular('id', $username);
            $promote = $this->db->prepare("INSERT INTO users_groups (user_id, group_id) VALUES (:userid, '1')");
            $promote->execute(array(':userid' => $user_id));
                  
            $this->logger->logAction($user_id, 'PROMOTED_TO_ADMIN');
            
            return true;
        }
    }    
 
    function displayStatus($username) {
        $level = $this->checkLevel($username);
        if ($level == 1) {
            return $status = '<span style="color:blue;">Aguardando ativação de e-mail</span>';
        }
        if ($level == 2) {
            return $status = '<span style="color:blue;">Aguardando ativação do administrador</span>';
        }
        if (($level == 3) && (!$this->functions->checkBanned($username))) {
            return $status = '<span style="color:green;">Registered</span>';
        }
        if ($this->functions->checkBanned($username)) {
            return $status = '<span style="color:red;">Banned</span>';
        }
        if ($level == ADMIN_LEVEL) { 
            return $status = '<span style="color:blue;">Admin</span>';
        }
        if ($level == SUPER_ADMIN_LEVEL) { 
            return $status = 'SuperAdmin';
        }
    }
 
    public function displayDate($date_toedit) {
        if (isset($date_toedit)) {
            $date = $this->configs->getConfig('DATE_FORMAT');
            return date("$date", $date_toedit);
        }
    }
 
    public function displayAdminActivation($orderby) {
        return $sql = $this->db->query("SELECT username, regdate, email, ip, userlevel FROM users WHERE userlevel = " . ADMIN_ACT . " OR userlevel = " . ACT_EMAIL . " ORDER BY $orderby DESC");
    }

  
    public function adminEditAccount($subusername, $subfirstname, $sublastname, $subnewpass, $subconfnewpass, $subemail, $subusertoedit, $subusertoeditid) {
       
        if ($subnewpass) { 
            $field = "newpass"; 
            $this->userinfo = $this->functions->getUserInfoSingular('id', $subusername);

            if (strlen($subnewpass) < $this->configs->getConfig('min_pass_chars')) {
                Form::setError($field, "Nova senha muito curta");
            }
            
            else if (strlen($subnewpass) > $this->configs->getConfig('max_pass_chars')) {
                Form::setError($field, "Nova senha muito longa");
            }
            
            else if ($subnewpass != $subconfnewpass) {
                Form::setError($field, "As senhas não coincidem");
            }
        }

        if (($subconfnewpass) && (!$subnewpass)) {
            $field = "conf_newpass";
            Form::setError($field, "Você inseriu apenas uma nova senha");
        }
 
        if ($subusername) { 
            $field = "username";   
            if (!$this->functions->usernameRegex($subusername)) {
                Form::setError($field, "O nome de usuário não corresponde aos requisitos");
            } 
            else if (strlen($subusername) > 36) {
                Form::setError($field, "Nome de usuário ultrapassa 36 caracteres permitidos.");
            } 
             else if (strcasecmp($subusername, GUEST_NAME) == 0) {
                Form::setError($field, "Esse nome de usuário não está disponível");
            } 
            else if ($subusertoedit !== $subusername && $this->functions->usernameTaken($subusername)) {
                Form::setError($field, "Nome de usuário já registrado");
            }
        }
 
        $this->functions->nameCheck($subfirstname, 'firstname', 'First Name', 2, 30);
 
        $this->functions->nameCheck($sublastname, 'lastname', 'Last Name', 2, 30);
 
        $this->currentemail = $this->functions->getUserInfoSingularFromId('email', $subusertoeditid);
        if($this->currentemail != $subemail){
            $this->functions->emailCheck($subemail, $subemail, 'email');
        }

       
        if (Form::$num_errors > 0) {
            return false;   
        }
 
        if ($subfirstname) {
            $this->functions->updateUserField($subusertoedit, "firstname", $subfirstname);
        }
 
        if ($sublastname) {
            $this->functions->updateUserField($subusertoedit, "lastname", $sublastname);
        }
 
        if ($subnewpass) {
            $this->functions->updateUserField($subusertoedit, "password", password_hash($subnewpass, PASSWORD_DEFAULT));
             
            $id = $this->functions->getUserInfoSingular('id', $subusertoedit);
            $this->logger->logAction($id, 'PWD_CHANGED BY ADMIN'); 
        }
 
        if($this->currentemail != $subemail){
            $this->functions->updateUserField($subusertoedit, "email", $subemail);
            
           
            $id = $this->functions->getUserInfoSingular('id', $subusertoedit);
            $this->logger->logAction($id, 'EMAIL_CHANGED BY ADMIN'); 
        }

        
        if ($subusername) {
            $this->functions->updateUserField($subusertoedit, "username", $subusername);
        }
 
        return true;
    }

     
    public function checkUsername($username) {
 
        $subuser = $username;
        $field = 'user';   
        if (!$subuser || strlen($subuser = trim($subuser)) == 0) {
            Form::setError($field, "Username not entered<br>");
        } else {
            
            if (strlen($subuser) < $this->configs->getConfig('min_user_chars') ||
                strlen($subuser) > $this->configs->getConfig('max_user_chars') ||
                (!$this->functions->usernameRegex($subuser)) ||
                (!$this->functions->usernameTaken($subuser))) {
                    Form::setError($field, "Usuário não existe<br>");
            }
        }
        return $subuser;
    }

   
    function createStop($admin, $name) {
        $session_id = $_SESSION['session_id'];
        if (isset($session_id)) {
            $stoptick = ceil(time() / ( $this->stop_life / 2 ));
            return md5($stoptick . $session_id . $name);
        }
    }

    function verifyStop($admin, $name, $stop) {
        $session_id = $_SESSION['session_id'];
        if (isset($session_id)) {
            $stoptick = ceil(time() / ( $this->stop_life / 2 ));
            if ((md5($stoptick . $session_id . $name)) == $stop) {
                return 2;
            }
        }
    }
    
    function stopField($admin, $name) {
        $stop_field = '<input type="hidden" id="' . $name . '" name="' . $name . '" value="' . $this->createStop($admin, $name) . '" />';
        return $stop_field;
    }
    
  
    function previousVisit($username) {
        $lastvisit = $this->functions->getUserInfoSingular('previous_visit', $username);
        return $this->displayDate($lastvisit);
    }
 
    function usersSince($username) {
        $lastvisit = $this->functions->getUserInfoSingular('previous_visit', $username);
        $query = $this->db->query("SELECT username FROM users WHERE regdate > " . $lastvisit);
        return $userssince = $query->rowCount();
    }
     
    function totalUsers() {
        $query = $this->db->query("SELECT username FROM users");
        $total_users = $query->rowCount();
        return $total_users;
    }
     
    function recentlyOnline($minutes) {
        $time = time() - ($minutes * 60);
        $query = $this->db->query("SELECT username FROM users WHERE timestamp > $time");
        $usersonline = "";
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $usersonline .= $row['username']. ", ";
        }
        $results = rtrim($usersonline, ", ");    
        return $results;
    }
     
    function getLastUserRegisteredDetails($num) {
        $result = $this->db->query("SELECT username, regdate FROM users ORDER BY regdate DESC LIMIT 0,1");
        $this->lastuser_reg = $result->fetchColumn($num);
        return $this->lastuser_reg;
    }

}
