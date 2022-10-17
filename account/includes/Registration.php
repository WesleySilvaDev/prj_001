<?php

class Registration {

    private $db;
    private $session;

    public function __construct($db, $session, $configs, $functions, $logger) {
        $this->db = $db;
        $this->session = $session;
        $this->configs = $configs;
        $this->functions = $functions;
        $this->logger = $logger;
    }

 
    function register($user, $firstname, $lastname, $pass, $conf_pass, $email, $conf_email, $isadmin) {
  
        $field = "user";   
        if (!$user || strlen($user = trim($user)) == 0) {
            Form::setError($field, "Username not entered");
        } else {
           
            if (strlen($user) < $this->configs->getConfig('min_user_chars')) {
                Form::setError($field, "Nome de usuário menor que " . $this->configs->getConfig('min_user_chars') . " characters");
            } else if (strlen($user) > $this->configs->getConfig('max_user_chars')) {
                Form::setError($field, "Nome de usuário maior que " . $this->configs->getConfig('max_user_chars') . " characters");
            }
              
            else if (!$this->functions->usernameRegex($user)) {
                Form::setError($field, "O nome de usuário não corresponde aos requisitos");
            }
             
            else if (strcasecmp($user, GUEST_NAME) == 0) {
                Form::setError($field, "Esse nome de usuário não esta disponível");
            }
            
            else if ($this->usernameTaken($user, $this->db)) {
                Form::setError($field, "Esse nome de usuário já está cadastrado");
            }
            
            else if ($this->usernameDisallowed($user)) {
                Form::setError($field, "Nome de usuário não permitido");
            }
            
            else if ($this->functions->ipDisallowed($_SERVER['REMOTE_ADDR'])) {
                Form::setError($field, "Endereço IP banido");
            }
        }

         
        $this->functions->nameCheck($firstname, 'firstname', 'Nome', 2, 30);
 
        $this->functions->nameCheck($lastname, 'lastname', 'Sobrenome', 2, 30);
 
        $this->functions->emailCheck($email, $conf_email, 'email');
 
        $field = "pass";  
        if (!$pass) {
            Form::setError($field, "Senha não informada");
        } else {
            
            if (strlen($pass) < $this->configs->getConfig('min_pass_chars')) {
                Form::setError($field, "Senha muito curta");
            }
             
            else if (strlen($pass) > $this->configs->getConfig('max_pass_chars')) {
                Form::setError($field, "Senha muito longa");
            }
             
            else if ($pass != $conf_pass) {
                Form::setError($field, "As senhas não coincidem");
            }
        }    

       
        if (Form::$num_errors > 0) {
            $_SESSION['value_array'] = $_POST;
            $_SESSION['error_array'] = Form::getErrorArray();
            return 1;  //Errors with form
        }
        
        else {          
            if ($this->addNewUser($user, $firstname, $lastname, $pass, $email)) {
                
                $mailer = new Mailer($this->db, $this->configs);
                $time = time();

                 
                if (($this->configs->getConfig('ACCOUNT_ACTIVATION') == 2) AND ( $isadmin != '1')) {
                    $token = Functions::generateRandStr(16);                  
                    $mailer->sendActivation($user, $email, $token, $this->configs);
                    $id = $this->functions->getUserInfoSingular('id', $user);
                    $this->db->query("INSERT INTO user_temp SET userid = '$id', timestamp = '$time', type = 'act', detail = '$token'");
                    $successcode = 3;
                }
 
                else if (($this->configs->getConfig('ACCOUNT_ACTIVATION') == 3) AND ( $isadmin != '1')) {
                    $token = Functions::generateRandStr(16);
                    $mailer->adminActivation($user, $email, $this->configs);
                    $mailer->activateByAdmin($user, $email, $token);
                    $id = $this->functions->getUserInfoSingular('id', $user);
                    $this->db->query("INSERT INTO user_temp SET userid = '$id', timestamp = '$time', type = 'act', detail = '$token'");
                    $successcode = 4;
                }
 
                else if (($this->configs->getConfig('EMAIL_WELCOME') && $this->configs->getConfig('ACCOUNT_ACTIVATION') == 1 ) AND ( $isadmin != '1')) {
                    $mailer->sendWelcome($user, $email, $this->configs);
                    $successcode = 5;

              
                } else {
                    $successcode = 0;
                }
                
            
                if($isadmin == '1'){
                    $id = $this->session->id;
                    $this->logger->logAction($id, "REGISTERED : ".$user );
                } else {
                    $id = $this->functions->getUserInfoSingular('id', $user);
                    $this->logger->logAction($id, "REGISTERED" );
                }
                
                return $successcode;   
            } else {
                return 2;  
            }
        }
    }

  
    function usernameTaken($username) {
        $result = $this->db->query("SELECT username FROM users WHERE username = '$username'");
        $count = $result->rowCount();
        return ($count > 0);
    }
 
    function usernameDisallowed($username) {
        $query = "select * from banlist where :username like concat('%',ban_username,'%') AND ban_username != ''";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        $count = $stmt->rowCount();
        return ($count > 0);
    }

 
    function addNewUser($username, $firstname, $lastname, $password, $email) {
        $time = time(); 
        if (($this->functions->totalUsers() == '0') AND (strcasecmp($username, ADMIN_NAME) == 0)) {
            $ulevel = SUPER_ADMIN_LEVEL;
        
      
        } else if ($this->configs->getConfig('ACCOUNT_ACTIVATION') == 1) {
            $ulevel = REGUSER_LEVEL;  
        } else if ($this->configs->getConfig('ACCOUNT_ACTIVATION') == 2) {
            $ulevel = ACT_EMAIL;  
        } else if ($this->configs->getConfig('ACCOUNT_ACTIVATION') == 3) {
            $ulevel = ADMIN_ACT;  
        } else if (($this->configs->getConfig('ACCOUNT_ACTIVATION') == 4) && !$this->session->isAdmin()) {
            header("Location: " . $this->configs->homePage());  
        } else {
            $ulevel = REGUSER_LEVEL;
        }

        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $userip = $_SERVER['REMOTE_ADDR'];

        $query = "INSERT INTO users SET username = :username, firstname = :firstname, lastname = :lastname, password = :password, userlevel = $ulevel, email = :email, timestamp = $time, ip = '$userip', regdate = $time";
        $stmt = $this->db->prepare($query);
        return $stmt->execute(array(':username' => $username, ':firstname' => $firstname, ':lastname' => $lastname, ':password' => $password_hash, ':email' => $email));
    }

}
