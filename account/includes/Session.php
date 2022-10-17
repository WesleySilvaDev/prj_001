<?php
     
class Session {

    public $username;     
    public $userid;       
    public $userlevel;    
    public $time;          
    public $id;            
    public $logged_in;     
    public $userinfo = array();   
    public $url;           
    public $referrer;     
    public $num_members;   
    public $num_active_users;    
    public $num_active_guests;   
    private $db;            
    
    function __construct($db) {

        $this->db = $db;
        $this->functions = new Functions($db);
        $this->logger = new Logger($db);
        $this->configs = new Configs($db);
        $this->time = time();
        $this->startSession();

        $this->num_members = -1;
 
        $this->functions->calcNumActiveUsers();
         
        $this->calcNumActiveGuests();
 
        $total = $this->total_users_online = $this->functions->calcNumActiveUsers() + $this->calcNumActiveGuests();
        if ($total > $this->configs->getConfig('record_online_users')) {
            $this->configs->updateConfigs($total, 'record_online_users');
            $this->configs->updateConfigs($this->time, 'record_online_date');
        }
    }

    function startSession() {

        session_start();   
 
        $this->logged_in = $this->checkIfLoggedIn();
 
        if (!$this->logged_in) {
            $this->username = $_SESSION['username'] = GUEST_NAME;
            $this->userlevel = 0;
            $this->addActiveGuest($_SERVER['REMOTE_ADDR'], $this->time);
              
        } else {
            $this->checkExpiryTimes($_SESSION['session_id']);  
            $this->updateActiveUsers($this->id);  
        }
 
        $this->removeInactiveGuests();
 
        if (isset($_SESSION['url'])) {
            $this->referrer = $_SESSION['url'];
        } else {
            $this->referrer = "/";
        }
 
        $this->url = $_SESSION['url'] = htmlentities($_SERVER['PHP_SELF']);
    }


    function checkIfLoggedIn() {       
 
        if (isset($_COOKIE['xa_sessid']) && isset($_COOKIE['xa_valid'])) {
            $this->functions->cookieCheck($_COOKIE['xa_sessid'], $_COOKIE['xa_valid']);
        }
 
        if (isset($_SESSION['username']) && isset($_SESSION['session_id']) && isset($_SESSION['id']) && $_SESSION['username'] != GUEST_NAME) {
         
            if ($this->confirmUserID($_SESSION['session_id'], $_SESSION['id']) != 0) {
              
                unset($_SESSION['username']);
                unset($_SESSION['session_id']);
                unset($_SESSION['id']);
                return false;
            }
             
            if ($this->functions->checkBanned($_SESSION['username'])) {
                return false;
            }
 
            $this->userinfo = $this->functions->getUserInfo($_SESSION['username'], $this->db);
            $this->username = $this->userinfo['username'];
            $this->id = $this->userinfo['id'];
            $this->userlevel = $this->userinfo['userlevel'];
            return true;
        }
         else {
            return false;
        }
    }

 
    function confirmUserID($session_id, $userid) { 
        $query = "SELECT session_id FROM user_sessions WHERE session_id = '$session_id' AND userid = '$userid'";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(1,':userid' => $userid, 2,':sessionid' => $session_id));
        $count = $stmt->rowCount();

        if (!$stmt || $count < 1) {
            return 1;  
        }

        $dbarray = $stmt->fetch();
 
        if ($session_id == $dbarray['session_id']) {
            return 0;  
        } else {
            return 2;  
        }
    }
    

    function checkExpiryTimes($session_id) {
        
      
        $timeout = time() - $this->configs->getConfig('USER_TIMEOUT') * 60000;
        
        
        $sql = $this->db->query("SELECT timestamp FROM user_sessions WHERE session_id = '$session_id'");
        $sessioninfo = $sql->fetch();
                
        if ($sessioninfo['timestamp'] < $timeout && !isset($_COOKIE['xa_sessid']) && !isset($_COOKIE['xa_valid'])) {
            $this->logout();
            header("Location: " . $this->configs->loginPage()); 
        }
        
    }
    
 
    function updateActiveUsers($userid) {  
        
        $time = time();
        $session_id = $_SESSION['session_id'];
        $ipaddress = $_SERVER['REMOTE_ADDR'];
         
        $stmt2 = $this->db->prepare("UPDATE users SET timestamp = '$time' WHERE id = :userid");
        $stmt2->execute(array(':userid' => $userid));
         
        $this->db->query("UPDATE user_sessions SET timestamp = '$time', ipaddress = '$ipaddress' WHERE session_id = '$session_id'");

        $this->functions->calcNumActiveUsers();    
    }

   
    function removeInactiveGuests() {
        $timeout = time() - $this->configs->getConfig('GUEST_TIMEOUT') * 60;
        $stmt = $this->db->prepare("DELETE FROM active_guests WHERE timestamp < $timeout");
        $stmt->execute();
        $this->calcNumActiveGuests();
    }

  
    function calcNumActiveGuests() {
        $sql = $this->db->query("SELECT * FROM active_guests");
        return $num_active_guests = $sql->rowCount();
    }   

  
    function removeActiveGuest($ip) {
        $sql = $this->db->prepare("DELETE FROM active_guests WHERE ip = '$ip'");
        $sql->execute();
        $this->calcNumActiveGuests();
    }
 
    function checkUserEmailMatch($username, $email) {
        $query = "SELECT username FROM users WHERE username = :username AND email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array(':username' => $username, ':email' => $email));
        $number_of_rows = $stmt->rowCount();

        if (!$stmt || $number_of_rows < 1) {
            return 0;
        } else {
            return 1;
        }
    }
 
    function getNumMembers() {
        if ($this->num_members < 0) {
            $result = $this->db->query("SELECT id FROM users");
            $this->num_members = $result->rowCount();
        }
        return $this->num_members;
    }
 
    function logout() {       
 
        $this->functions->deleteCookies();
         
        if(!empty($this->id)) { $this->logger->logAction($this->id, 'LOGOFF'); }
         
        $this->functions->deleteCurrentSession();
 
        unset($_SESSION['username']);
        unset($_SESSION['session_id']);

        $this->logged_in = false;       
     
        $this->addActiveGuest($_SERVER['REMOTE_ADDR'], $this->time);      
 
        $this->username = GUEST_NAME;
        $this->userlevel = GUEST_LEVEL;
 
        session_regenerate_id();
        session_destroy();  
header("Location: login.php"); 
        

    }
     
     function HiddenShowPhotos($status_photo,$idAqr){ 
         $this->functions->updateHiddenShowPhotos($status_photo,$idAqr);
         $this->functions->deleteAllSessionsButCurrent($this->id);
  
     }
     
     function CoverPhoto($fileAqr){ 
         $this->functions->updateUserField($this->username, "profile_capa", $fileAqr);
         $this->functions->deleteAllSessionsButCurrent($this->id);
  
     }
     
     function ExcluirPhoto($idAqr){  
         $this->functions->updateExcluirPhoto($idAqr);
         $this->functions->deleteAllSessionsButCurrent($this->id);
  
     }
  
     function UpdatePlano($assinST,$planUserID){  
         $this->functions->uUpdatePlano($assinST,$planUserID);
         $this->functions->deleteAllSessionsButCurrent($this->id);
  
     }
     
     function UpdateDisponivel($modViagem,$modViagemUser){  
         $this->functions->uUpdateDisponivel($modViagem,$modViagemUser);
         $this->functions->deleteAllSessionsButCurrent($this->id);
  
     }
     
     function Update_admn_statusConta($adm_alt_conta_status,$adm_alt_id_user,$adm_alt_colum){  
         $this->functions->uUpdate_admn_statusConta($adm_alt_conta_status,$adm_alt_id_user,$adm_alt_colum);
         $this->functions->deleteAllSessionsButCurrent($this->id);
  
     }
     
     function Update_admn_qtd_dias($update_qtd_dias,$adm_alt_id_user_adc){  
         $this->functions->uUpdate_admn_qtd_dias($update_qtd_dias,$adm_alt_id_user_adc);
         $this->functions->deleteAllSessionsButCurrent($this->id);
  
     }
     
      
      function editAccountTermos($termosAcpt) {
           
           
        if ($termosAcpt =='1') {
            $this->functions->updateUserField($this->username, "termos_aceitos", 'SIM');
            $this->functions->deleteAllSessionsButCurrent($this->id);
            
           
            $this->logger->logAction($this->id, 'ACEITOU_OS_TERMOS'); 
           
        return true;
        }     
           
      }
      
      function editAccountDocs($DocsStatus, $newFileName1, $newFileName2, $newFileName3) {  
            $this->functions->updateUserField($this->username, "documentos_aceitos", $DocsStatus);
            $this->functions->updateUserField($this->username, "video_verificacao", $newFileName1); 
            $this->functions->updateUserField($this->username, "doc_frente", $newFileName2);
            $this->functions->updateUserField($this->username, "doc_verso", $newFileName3);
            $this->functions->updateUserField($this->username, "conta", 'ANALISE');
            $this->functions->deleteAllSessionsButCurrent($this->id);  
        return true;
       
           
      } 
       
      function editAccountMidia($MidiaStatus,$regUserId,$newNome) {
          
          $tamanho =  getimagesize('files/midia/'.$newNome);
            if($tamanho['0'] > $tamanho['1']){ 
                $tamanhoImagem = "HORIZONTAL";
            }else{
                $tamanhoImagem = "VERTICAL";
            }
          
            $sql = $this->db->prepare("INSERT INTO fotos_videos (id_user, file_path, status, tipo, tamanho) VALUES ('$regUserId', '$newNome', 'VISIBLE','FP','$tamanhoImagem')");
            $sql->execute(); 
            $this->functions->updateUserField($this->username, "midia_aceita", $MidiaStatus);  
            $this->functions->updateUserField($this->username, "conta", 'ANALISE');
            $this->functions->deleteAllSessionsButCurrent($this->id); 
        return true;
           
      }
      
      function ProcessPayment($Process_Plano,$Process_User){ 
          
        if($Process_Plano=='Basico'){
            $Process_Plano ='1';  
            $_planoValor = '97,99';
        } 
        if($Process_Plano=='Premium'){ 
            $Process_Plano ='2';
            $_planoValor = '197,99';
        } 
        if($Process_Plano=='Top Model'){ 
            $Process_Plano ='3';  
            $_planoValor = '297,99';
        }
        
          $DatePayment = date('d-m-Y H:i:s');
          
          $sql = $this->db->prepare("INSERT INTO paymets (id_user, data, status, plano, valor, cod_transacao_stripe) VALUES ('$Process_User', '$DatePayment', 'PAGO','$Process_Plano','$_planoValor', '32213123123')");
          $sql->execute(); 
             
          $this->functions->Pay_assinaturaUpdate($Process_Plano, $Process_User);
          $this->functions->deleteAllSessionsButCurrent($this->id);  
             
      }
      
       function editAccountMidiaGallery($regUserId,$newNome,$tipo_newMidiaGallery) {
           
           $tamanho =  getimagesize('files/midia/'.$newNome);
            if($tamanho['0'] > $tamanho['1']){ 
                $tamanhoImagem = "HORIZONTAL";
            }else{
                $tamanhoImagem = "VERTICAL";
            }
            $sql = $this->db->prepare("INSERT INTO fotos_videos (id_user, file_path, status, tipo, tamanho) VALUES ('$regUserId', '$newNome', 'VISIBLE','$tipo_newMidiaGallery', '$tamanhoImagem')");
            $sql->execute(); 
          
            $this->functions->deleteAllSessionsButCurrent($this->id);  
        return true;
           
      }
        
                            
    function editarContaPerfil(
      $reg_new_profilephoto,    $reg_new_nome,
      $reg_new_sobrenome,       $reg_new_email,
      $reg_new_password,        $reg_new_whatsapp,
      $reg_new_telefone,        $reg_new_bio,
      $reg_new_sobre,           $reg_new_cache,
      $reg_new_acompanhante,          $reg_new_idade,
      $reg_new_nacionalidade,   $reg_new_idiomas,
      $reg_new_localizacao,     $reg_new_dominatrix,      
      $reg_new_massagem_tantrica,$reg_new_tatuadas,        
      $reg_new_suggar_baby,     $reg_new_menage,          
      $reg_new_desp_solteiro
      ) { 
            if (!empty($reg_new_profilephoto))          { $this->functions->updateUserField($this->username, "profile_photo", $reg_new_profilephoto);}
            if (!empty($reg_new_nome))                  { $this->functions->updateUserField($this->username, "firstname",     $reg_new_nome);}
            if (!empty($reg_new_sobrenome))             { $this->functions->updateUserField($this->username, "lastname",      $reg_new_sobrenome);}
            if (!empty($reg_new_email))                 { $this->functions->updateUserField($this->username, "email",         $reg_new_email);}
            if (!empty($reg_new_password))              { $reg_new_password = password_hash($reg_new_password, PASSWORD_DEFAULT);$this->functions->updateUserField($this->username, "password", $reg_new_password);;}
            if (!empty($reg_new_whatsapp))              { $this->functions->updateUserField($this->username, "whatsapp",      $reg_new_whatsapp);}
            if (!empty($reg_new_telefone))              { $this->functions->updateUserField($this->username, "telefone",      $reg_new_telefone);}  
            if (!empty($reg_new_acompanhante))          { $this->functions->updateUserField($this->username,"acompanhante",$reg_new_acompanhante);}
            if (!empty($reg_new_idade))                 { $this->functions->updateUserField($this->username, "idade",         $reg_new_idade);}
            if (!empty($reg_new_nacionalidade))         { $this->functions->updateUserField($this->username, "nacionalidade", $reg_new_nacionalidade);}
            if (!empty($reg_new_idiomas))               { $this->functions->updateUserField($this->username, "idiomas",       $reg_new_idiomas);}
            if (!empty($reg_new_localizacao))           { $this->functions->updateUserField($this->username, "localizacao",   $reg_new_localizacao);}
            if (!empty($reg_new_dominatrix))             { $this->functions->updateUserField($this->username, "dominatrix",   $reg_new_dominatrix);}
            if (!empty($reg_new_massagem_tantrica))      { $this->functions->updateUserField($this->username, "massagem_tantrica",   $reg_new_massagem_tantrica);} 
            if (!empty($reg_new_tatuadas))               { $this->functions->updateUserField($this->username, "tatuadas",   $reg_new_tatuadas);} 
            if (!empty($reg_new_menage))               { $this->functions->updateUserField($this->username, "menage",   $reg_new_menage);} 
            if (!empty($reg_new_desp_solteiro))               { $this->functions->updateUserField($this->username, "desp_solteiro",   $reg_new_desp_solteiro);} 
            if (!empty($reg_new_cache)){ $this->functions->updateUserField($this->username, "cache",       $reg_new_cache);}else{ $this->functions->updateUserField($this->username, "cache",       'A combinar' );}
            
            $this->functions->updateUserField($this->username, "bio",           $reg_new_bio); 
            $this->functions->updateUserField($this->username, "sobre",         $reg_new_sobre);
             
        $this->functions->deleteAllSessionsButCurrent($this->id);  
     return true; 
  }
  
  
    function admin_configCad($admin_configCad_id, $admin_configCad_termos_status, $admin_configCad_docs_status, $admin_configCad_midia_status, $admin_configCad_docs_recusados_motivo, $admin_configCad_midia_recusada_motivo) {
         
         $this->functions->update_admin_configCad($admin_configCad_id, $admin_configCad_termos_status, $admin_configCad_docs_status, $admin_configCad_midia_status, $admin_configCad_docs_recusados_motivo, $admin_configCad_midia_recusada_motivo);
           $this->functions->deleteAllSessionsButCurrent($this->id);  
   return true; 
  }
  
  
  function admin_config_status_conta($admin_configCad_id,$statusDaConta,$uPerFilVericado){
         $this->functions->update_admin_config_status_conta($admin_configCad_id,$statusDaConta,$uPerFilVericado);
         $this->functions->deleteAllSessionsButCurrent($this->id);  
   return true; 
  }
     
    function editAccount($subcurpass, $subnewpass, $subconfnewpass, $subemail) {
 
        if ($subnewpass) {

            $field = "curpass";   
            
            if (!$subcurpass) {
                Form::setError($field, "Senha atual não informada");
             
            } else if ($this->confirmUserPass($this->username, $subcurpass) != 0) {
                Form::setError($field, "Senha atual incorreta");
            }
 
            $field = "newpass";   
            
           
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
        
        
         else if ($subcurpass) {
            $field = "newpass";   
            Form::setError($field, "Informe a nova senha");
        } else if ($subconfnewpass) {
            $field = "conf_newpass";   
            Form::setError($field, "Senha atual não informada");
        }
         
        $this->currentemail = $this->functions->getUserInfoSingular('email', $this->username);
        if($this->currentemail != $subemail){
            $this->functions->emailCheck($subemail, $subemail, 'email');
        }
 
        if (Form::$num_errors > 0) {
            return false;   
        }

         
        if ($subcurpass && $subnewpass) {
            $subnewpass = password_hash($subnewpass, PASSWORD_DEFAULT);
            $this->functions->updateUserField($this->username, "password", $subnewpass); 
            $this->functions->deleteAllSessionsButCurrent($this->id);
           
            $this->logger->logAction($this->id, 'PWD_CHANGE'); 
        }
 
        if ($subemail) {
            $change = $this->functions->updateUserField($this->username, "email", $subemail);
            
            if($change){
    
            $this->logger->logAction($this->id, 'EMAIL_CHANGE');
            }
        }
         

      
        return true;
    }
     
    function confirmUserPass($username, $password) {
        
        $query = "SELECT password, userlevel FROM users WHERE username = :username";
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
    
    
    function isAdmin() {
        return ($this->userlevel == ADMIN_LEVEL || $this->userlevel == SUPER_ADMIN_LEVEL);
    }
    
  
    function isSuperAdmin() {
        return ($this->userlevel == SUPER_ADMIN_LEVEL and
                $this->username == ADMIN_NAME);
    }
    
  
    function isMemberOfGroup($groupname) {
        $userid = $this->id;
        $group_id = $this->functions->getGroupId($groupname);
        $sql = $this->db->query("SELECT user_id FROM users_groups WHERE group_id = '$group_id' AND user_id = '$userid' LIMIT 1");
        return $groupinfo = $sql->fetchColumn();
    }
    
 
    function isMemberOfGroupOverLevel($level) {
        $userid = $this->id;
        $sql = $this->db->query("SELECT groups.group_level, groups.group_id, users_groups.group_id, users_groups.user_id FROM `groups` INNER JOIN `users_groups` ON groups.group_id=users_groups.group_id WHERE users_groups.user_id = '$userid' AND groups.group_level > '$level'");
        $count = $sql->rowCount();
        return ($count > 0);
    }
 
    function isUserlevel($level) {
        return ($this->userlevel == $level);
    }

 
    function overUserlevel($level) {
        if ($this->userlevel > $level) {
            return true;
        } else {
            return false;
        }
    }

 
    function addActiveGuest($ip, $time) {
        $sql = $this->db->prepare("REPLACE INTO active_guests VALUES ('$ip', '$time')");
        $sql->execute();
        $this->calcNumActiveGuests();
    }
    
 
    function generatePasswordLink($id) {
        $templink = Functions::generateRandStr(18);
        $time = time();
        $sql = $this->db->query("DELETE FROM user_temp WHERE userid = '$id'");
        $sql2 = $this->db->prepare("INSERT INTO user_temp (userid, timestamp, type, detail) VALUES (:userid, '$time', 'pwd', '$templink')");
        $sql2->execute(array(':userid' => $id));
        if($sql2) { return $templink; } else { return 'error'; }
    }
    
 
    function activateUser($user, $actkey){
        
        $id = $this->functions->getUserInfoSingular('id', $user);
        $time = time() - 1209600;  
        $activation = $this->db->prepare("SELECT * FROM user_temp WHERE detail = :actkey AND userid = '$id' AND timestamp >= '$time' LIMIT 1");
        $activation->execute(array(':actkey' => $actkey));
        $count = $activation->rowCount();
        
        if(!$count){
            echo "O Link está incorreto ou não é mais válido!";
            exit();
        }
        
   
        
        $userlevel = $this->db->prepare("SELECT userlevel FROM users WHERE username = :user LIMIT 1");
        $userlevel->execute(array(':user' => $user));
        $row = $userlevel->fetch();

      
        if (($row['userlevel'] == 1) or ( $row['userlevel'] == 2)) {

            $sql = $this->db->prepare("UPDATE users SET USERLEVEL = '3' WHERE username=:user");
            $sql->bindParam(":user", $user);
            $sql->execute();
 
            $count = $sql->rowCount();

            if ($count) {
 
                $mailer = new Mailer($this->db, $this->configs);
                if ($row['userlevel'] == 2) {
                    echo "<div>Você ativou a conta para" . $user . ".</div>";
                } else {
                    echo "<div>Sua conta já está ativada.</div>";
                }
                $sql = $this->db->query("SELECT email FROM users WHERE username = '$user'");
                $email_array = $sql->fetch();
                $email = array_shift($email_array);
                $mailer->adminActivated($user, $email);

                 
                $sql2 = $this->db->prepare("DELETE FROM user_temp WHERE detail = :actkey AND userid = '$id'");
                $sql2->execute(array(':actkey' => $actkey));
            } else {
                echo "<div>Sua conta não foi ativada. Entre em contato com o administrador para obter mais assistência.</div>";
            }
        } else if (($row['userlevel'] != 1 ) && ($row['actkey'] === $actkey)) {
            echo "<div>Esta conta não precisa ser ativada.</div>";
        } else {
            echo "<div>Ocorreu um erro. Entre em contato com o administrador para obter mais assistência.</div>";
        }
    }

}
