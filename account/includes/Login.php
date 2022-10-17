<?php

class Login {

    private $db;

    public function __construct($db, $session, $functions, $configs, $logger) {
        $this->db = $db;
        $this->session = $session;
        $this->functions = $functions;
        $this->configs = $configs;
        $this->logger = $logger;
        $this->time = time();
    }
 
    function login($subuser, $subpass, $subremember) {
        
       
        $field = "username";  
        if (!$subuser || strlen($subuser = trim($subuser)) == 0) {
            Form::setError($field, "* Email não inseridos");
        }
 
        $field = "password";  
        if (!$subpass) {
            Form::setError($field, "* Senha não inserida");
        }
 
        if (Form::$num_errors > 0) {
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = Form::getErrorArray();
            return false;
        }
 
        $result = $this->confirmUserPass($subuser, $subpass);
        $field = "username";
 
        if ($result == 1) { 
            Form::setError($field, "Dados inválidos. Por favor, tente novamente.");
        } else if ($result == 2) { 
            Form::setError($field, "Dados inválidos. Por favor, tente novamente");  
            $num_of_attemps = $this->addLoginAttempt($subuser);
            if ($num_of_attemps > 10) {
                 
                $num_of_attemps = 10;
            }
            sleep($num_of_attemps);
        } else if ($result == 3) {
            Form::setError($field, "Sua conta ainda não foi ativada");
        } else if ($result == 4) {
            Form::setError($field, "Sua conta ainda não foi ativada pelo administrador");
        } else if ($result == 5) {
            Form::setError($field, "Sua conta de usuário foi banida");
        } else if ($result == 6) {
            Form::setError($field, "Seu endereço IP foi banido");
        }

    
        if (Form::$num_errors > 0) {
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = Form::getErrorArray();
            return false;
        }
 
        $this->userinfo = $this->getUserInfo($subuser, $this->db);
         
        $this->username = $_SESSION['username'] = $this->userinfo['username'];
        $this->id = $_SESSION['id'] = $this->userinfo['id'];
        $this->session_id = $_SESSION['session_id'] = Functions::generateRandStr(16);    

 
        $validator = Functions::generateRandStr(32);
        $hashedValidator = hash('sha256', $validator);
        
       
        $cookie_expire = $this->configs->getConfig('COOKIE_EXPIRE');
        $session_expire_timestamp = time() + 60 * 60 * 24 * $cookie_expire;
        
      
        if ($subremember) { 
                $persist = 1;
                $cookie_expire = $this->configs->getConfig('COOKIE_EXPIRE');
                $session_expire_timestamp = time() + 60 * 60 * 24 * $cookie_expire;               
        } else { 
                $persist = 0;
                $session_expire = $this->configs->getConfig('USER_TIMEOUT');
                $session_expire_timestamp = time() + 60 * 60 * 24 * $session_expire; 
        }
        
    
        $this->functions->addSession($this->session_id, $hashedValidator, $persist, $this->id, $session_expire_timestamp);          
         
        $this->functions->updateUserField($this->username, "lastip", $_SERVER['REMOTE_ADDR']);    
        $this->functions->addLastVisit($this->username);
        $this->session->updateActiveUsers($this->username);
        $this->resetLoginAttempts($this->username);
        $this->session->removeActiveGuest($_SERVER['REMOTE_ADDR']);
                
        $this->logger->logAction($this->id, 'LOGIN');
 
        if ($subremember) {
            $cookie_path = $this->configs->getConfig('COOKIE_PATH');
            setcookie("xa_sessid", $this->session_id, time() + 60 * 60 * 24 * $cookie_expire, $cookie_path,"","",1);
            setcookie("xa_valid", $validator, time() + 60 * 60 * 24 * $cookie_expire, $cookie_path,"","",1);
        }
        
        if($this->configs->getConfig('ALLOW_MULTI_LOGONS') == 0){
            $this->functions->deleteAllSessionsButCurrent($this->id);
        }
        
        session_regenerate_id();
     
        return true;
    }

  
    function confirmUserPass($username, $password) {

        $query = "SELECT password, userlevel FROM users WHERE (username = :username OR email = :username)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':username' => $username));
        $count = $stmt->rowCount();
        
        if (!$stmt || $count < 1) {
            return 1;  
        }

         
        $dbarray = $stmt->fetch();

        if (!password_verify($password, $dbarray['password'])) {
            return 2;  
        }

      
        if ($dbarray['userlevel'] == 1) {
            return 3; 
        }

        if ($dbarray['userlevel'] == 2) {
            return 4;  
        }

        if ($this->functions->checkBanned($username)) {
            return 5;  
        }

        if ($this->functions->ipDisallowed($_SERVER['REMOTE_ADDR'])) {
            return 6;  
        } else {
            return 0; 
        }
    }

 
    public function getUserInfo($username) {
        $query = "SELECT * FROM users WHERE (username = :username OR email = :username)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':username' => $username));
        $dbarray = $stmt->fetch();
     
        $result = count($dbarray);
        if (!$dbarray || $result < 1) {
            return NULL;
        }
       
        return $dbarray;
    }

  
    public function addLoginAttempt($username) {
        $num_of_attempts = (($num_of_attempts = $this->getLoginAttempts($username)) + 1);
        $this->db->query("UPDATE users SET user_login_attempts = '$num_of_attempts' WHERE (username = '$username' OR email = '$username')");
        return $num_of_attempts;
    }
 
    public function resetLoginAttempts($username) {
        $this->db->query("UPDATE users SET user_login_attempts = '0' WHERE (username = '$username' OR email = '$username')");
    }

    public function getLoginAttempts($username) {
        $stmt = $this->db->query("SELECT user_login_attempts FROM users WHERE (username = '$username' OR email = '$username')");
        return $login_attempts = $stmt->fetchColumn();
    }

}
