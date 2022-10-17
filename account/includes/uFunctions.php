<?php  
 error_reporting(0);
   function MessageRedir($msg, $time = 4, $url) {
   		die("$msg <meta http-equiv='refresh' content='$time;URL=$url'>");	
   	}
   	
   	function Tempo($d)
    {
        $ts = SecondsVIP($d);

        if ($ts >= 31104000) $val = round($ts / 31104000, 0) . ' Ano';
        else if ($ts >= 2592000) $val = round($ts / 2592000, 0) . ' Mes';
        else if ($ts >= 604800) $val = round($ts / 604800, 0) . ' Semana';
        else if ($ts >= 86400) $val = round($ts / 86400, 0) . ' Dia';
        else if ($ts >= 3600) $val = round($ts / 3600, 0) . ' Hora';
        else if ($ts >= 60) $val = round($ts / 60, 0) . ' Minuto';
        else $val = $ts . ' Segundo';

        if ($val[strlen($val) - 1] == 's')
            if ($val > 1) $val .= 'e';

        if ($val > 1) $val .= 's';
        return $val;
    }

   function SecondsVIP($d)
    {
        return strtotime($d) - time();
    }

    function CheckVIP($d)
    {
        if (SecondsVIP($d) > 0) return true;
        else return false;
    }
    
 function Tempo_admin($d)
    {
        $ts = SecondsVIP_admin($d);

        if ($ts >= 31104000) $val = round($ts / 31104000, 0);
        else if ($ts >= 2592000) $val = round($ts / 2592000, 0);
        else if ($ts >= 604800) $val = round($ts / 604800, 0);
        else if ($ts >= 86400) $val = round($ts / 86400, 0);
        else if ($ts >= 3600) $val = round($ts / 3600, 0);
        else if ($ts >= 60) $val = round($ts / 60, 0);
        else $val = $ts; 
        return $val;
    }
    
    function SecondsVIP_admin($d)
    {
        return strtotime($d) - time();
    }

    function CheckVIP_admin($d)
    {
        if (SecondsVIP_admin($d) > 0) return true;
        else return false;
    }
     
   if (isset($_POST['form_submission'])) {
   
       $form_submission = $_POST['form_submission'];
       switch ($form_submission) {
   
            
           case "edit_account" :
               editAccount($session);
               break;
           case "editAccount_termos" :
               editAccountTermos($session); 
               break;
           default :
               if ($session->logged_in) {
                   logout($session, $configs);
               } else {
                   header("Location: " . $configs->homePage());
               }
       }
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
       header("Location: cadastro.php"); 
   
   }
    
    $messageEditAccount='';
    $modalEditAccount='';
   $Error_new_profilephoto=''; 
   if (isset($_POST['editarContaPerfil'])) {
    
       $modalEditAccount='show';
       $editReg_erros ='0';    
         
       function id($qtd){
               $Caracteres = '0123456789AbCdEfGhIjKlMnOpQrStUvXyZ';
               $QuantidadeCaracteres = strlen($Caracteres);
               $QuantidadeCaracteres--; 
               $Hash=NULL;
               for($x=1;$x<=$qtd;$x++){
               $Posicao = rand(0,$QuantidadeCaracteres);
               $Hash .= substr($Caracteres,$Posicao,1);
               }
               return $Hash;
               }
               
           $fileTmpPath           = $_FILES['new_profilephoto']['tmp_name'];
           $fileName              = $_FILES['new_profilephoto']['name'];    
           $fileSize              = $_FILES['new_profilephoto']['size']; 
           $fileType              = $_FILES['new_profilephoto']['type'];
           $fileNameCmps          = explode(".", $fileName);
           $fileExtension         = strtolower(end($fileNameCmps));
           $reg_new_profilephoto            = md5(id(55). $fileName) . '.' . $fileExtension;
           $allowedfileExtensions = array('jpg','png','jpeg');
           
           if(!empty($fileExtension)){
               if (in_array($fileExtension, $allowedfileExtensions)){
               
               $uploadFileDir = 'files/profile/'; 
               $dest_path = $uploadFileDir . $reg_new_profilephoto;
               if(move_uploaded_file($fileTmpPath, $dest_path)){
                    
               }else{
                       $messageEditAccount = 'Erro enviar arquivo ';
                   }
               
           }else{
           $editReg_erros =   '1';
           $Error_new_profilephoto = '<font color="red">Envie uma foto no formato: ' . implode(',', $allowedfileExtensions).'</font>';
           }
           }else{
               $reg_new_profilephoto='';
           }
           
            
          $reg_new_nome                    = $_POST['new_nome'];                
          $reg_new_sobrenome               = $_POST['new_sobrenome'];           
          $reg_new_email                   = $_POST['new_email'];             
          $reg_new_password                = $_POST['new_password'];            
          $reg_new_whatsapp                = $_POST['new_whatsapp'];            
          $reg_new_telefone                = $_POST['new_telefone'];            
          $reg_new_bio                     = $_POST['new_bio']; 
          $reg_new_sobre                   = $_POST['new_sobre'];
          $reg_new_cache                   = $_POST['new_cache'];
          $reg_new_acompanhante            = $_POST['new_acompanhante'];                  
          $reg_new_idade                   = $_POST['new_idade'];   
          $reg_new_nacionalidade           = $_POST['new_nacionalidade'];           
          $reg_new_idiomas                 = $_POST['new_idiomas'];            
          $reg_new_localizacao             = $_POST['new_localizacao'];   
          $reg_new_dominatrix              = $_POST['new_dominatrix'];
          $reg_new_massagem_tantrica       = $_POST['new_massagem_tantrica']; 
          $reg_new_tatuadas                = $_POST['new_tatuadas'];
          $reg_new_suggar_baby             = $_POST['new_suggar_baby']; 
          $reg_new_menage                  = $_POST['new_menage'];
          $reg_new_desp_solteiro           = $_POST['new_desp_solteiro']; 
           
           if ($reg_new_email == $user_info['email']){
               $reg_new_email_error='<br><small><span style="color:red;">Email informado é igual ao email atual</span></small>'; 
                    $editReg_erros =   '1';
           }else{
               $sql = "SELECT * FROM users WHERE email = '$reg_new_email'";
                $result = $db->query($sql);
                $resultEmail = $result->rowCount();
                if($resultEmail > 0){
                    $reg_new_email_error='<br><small><span style="color:red;">Esse email já esta em uso</span></small>'; 
                    $editReg_erros =   '1';
                    
                }else{ 
                    $editReg_erros == '0';
                }
           } 
           
           if($editReg_erros =='0'){ 
            $session->editarContaPerfil(
      $reg_new_profilephoto,    $reg_new_nome,
      $reg_new_sobrenome,       $reg_new_email,
      $reg_new_password,        $reg_new_whatsapp,
      $reg_new_telefone,        $reg_new_bio,
      $reg_new_sobre,           $reg_new_cache,
      $reg_new_acompanhante,    $reg_new_idade,
      $reg_new_nacionalidade,   $reg_new_idiomas,
      $reg_new_localizacao,     $reg_new_dominatrix,      
      $reg_new_massagem_tantrica, $reg_new_tatuadas,        
      $reg_new_suggar_baby,     $reg_new_menage,
      $reg_new_desp_solteiro);
      
      if ( $detect->isMobile() ){
          $messageEditAccount =  '<font-size="2px"><span style="color:#3e9a47;"><i class="fa fa-check"></i> Alterações salvas</span></font>'.$reg_new_modeloConfig;
      }else{
         header("Location: index.php");
      } 
               
           }else{
               
               if ( $detect->isMobile() ){
          $messageEditAccount ='<font-size="2px"><span style="color:red;"><i class="fa fa-close"></i> Verifique os dados.</span></font>';
      }else{
         header("Location: index.php");
      }
               
           }     
   
   }
   
  $message_admin_configCad='';  
   if (isset($_POST['admin_configCad'])) {
       
          $admin_configCad_id                               = $_POST['cad_detalhes_id'];
          $admin_configCad_termos_status                    = $_POST['configCad_termos_status'];                
          $admin_configCad_docs_status                      = $_POST['configCad_docs_status'];           
          $admin_configCad_midia_status                     = $_POST['configCad_midia_status'];   
          $admin_configCad_docs_recusados_motivo            = $_POST['configCad_docs_recusados_motivo'];            
          $admin_configCad_midia_recusada_motivo            = $_POST['configCad_midia_recusada_motivo'];
           $admin_configCad_editReg_erros='0';
           if($admin_configCad_editReg_erros =='0'){ 
            $session->admin_configCad($admin_configCad_id, $admin_configCad_termos_status, $admin_configCad_docs_status, $admin_configCad_midia_status, $admin_configCad_docs_recusados_motivo, $admin_configCad_midia_recusada_motivo); 
            $message_admin_configCad =  '<font-size="2px"><span style="color:#3e9a47;"><i class="fa fa-check"></i> Alterações salvas</span></font>';
         
            if(($admin_configCad_termos_status== 'SIM')  and (($admin_configCad_docs_status=='CONFIRMADO')) and ($admin_configCad_midia_status=='CONFIRMADO')){
                $statusDaConta = 'ATIVA';
                $uPerFilVericado ='SIM';
                $admin_configCad_id_status_conta = $admin_configCad_id;
                $session->admin_config_status_conta($admin_configCad_id_status_conta,$statusDaConta,$uPerFilVericado);
            }else{
                $statusDaConta = 'INATIVA';
                $uPerFilVericado ='NAO';
                $admin_configCad_id_status_conta = $admin_configCad_id;
                $session->admin_config_status_conta($admin_configCad_id_status_conta,$statusDaConta,$uPerFilVericado);
            }
           }else{
               $message_admin_configCad ='<font-size="2px"><span style="color:red;"><i class="fa fa-close"></i> Erro ao salvar alterações.</span></font>';
           } 
           
   }
   
    $messageUploadMidia=''; $messageUploadMidiaERRO='';
   if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'mat_midia'){
   function id($qtd){
               $Caracteres = '0123456789AbCdEfGhIjKlMnOpQrStUvXyZ';
               $QuantidadeCaracteres = strlen($Caracteres);
               $QuantidadeCaracteres--; 
               $Hash=NULL;
               for($x=1;$x<=$qtd;$x++){
               $Posicao = rand(0,$QuantidadeCaracteres);
               $Hash .= substr($Caracteres,$Posicao,1);
               }
               return $Hash;
               } 
      
   $arqUpload = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
     for ($controle = 0; $controle < count($arqUpload['name']); $controle++){
          
           $fileTmpPath = $_FILES['arquivo']['tmp_name'];
           $fileNameCmps = explode(".", $arqUpload['name'][$controle]);
           $fileExtension = strtolower(end($fileNameCmps));
           
   	    $newNome =  md5(id(10) . $arqUpload['name'][$controle]) . '.' . $fileExtension;
   	        $RegUser_info = $functions->getUserInfo($session->username);
   	        $regUserId= $RegUser_info['id'];
   	    
   	  $allowedfileExtensions = array('jpg', 'png', 'jpeg');
   	  if (in_array($fileExtension, $allowedfileExtensions)){
   	      
           $uploadFileDir = "files/midia/";
   	    $dest_path = $uploadFileDir."/".$newNome;
   	  
   	  if(move_uploaded_file($arqUpload['tmp_name'][$controle], $dest_path)){ 
   		  $MidiaStatus='ANALISE';
              $session->editAccountMidia($MidiaStatus,$regUserId,$newNome);
              
              header("Location: cadastro.php"); 
   	  }else{
   		  $messageUploadMidia= "Ocorreu um erro ao enviar os arquivos."; 
   	  }
       }else{ 
            $messageUploadMidia = 'Compatíveis: '. implode(',', $allowedfileExtensions).'<br><br>';
               $messageUploadMidiaERRO = '<br><font color="red" ">ERRO: 1 ou mais foto(s) em formato incompatível</font>';
           
       }
   	      
     }
   }
   
   if (isset($_POST['uploadBtn_newMidiaGalery']) && $_POST['uploadBtn_newMidiaGalery'] == 'mat_midia'){
   function id($qtd){
               $Caracteres = '0123456789AbCdEfGhIjKlMnOpQrStUvXyZ';
               $QuantidadeCaracteres = strlen($Caracteres);
               $QuantidadeCaracteres--; 
               $Hash=NULL;
               for($x=1;$x<=$qtd;$x++){
               $Posicao = rand(0,$QuantidadeCaracteres);
               $Hash .= substr($Caracteres,$Posicao,1);
               }
               return $Hash;
               } 
    
    $tipo_newMidiaGallery  = isset($_POST['tipoRd']);
    
   $UPerror=false; 
  $UPerror=false; 
   if (empty($tipo_newMidiaGallery)){
               $UPerror = true;
               $UPMidiaST='show';
              $UPMidiaST_MSG =' <style> body{background-color:black; color:white; text-align:center; font-size:25px; font-family:Arial;} </style>
          <img  src="../assets/imagens/logo/loading.gif" width="500px" height="500px" style="margin-top:45%;>  
          <span style="margin-top:-20px;">      <h2>Erro! Selecione uma categoria.</h2>           </span>   ';
    
       
   } 
   
   if(!$UPerror){
       
       $arqUpload = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
      $tipo_newMidiaGallery  = $_POST['tipoRd'];
     for ($controle = 0; $controle < count($arqUpload['name']); $controle++){
           
           $fileTmpPath = $_FILES['arquivo']['tmp_name'];
           $fileNameCmps = explode(".", $arqUpload['name'][$controle]);
           $fileExtension = strtolower(end($fileNameCmps));
           
   	    $newNome =  md5(id(10) . $arqUpload['name'][$controle]) . '.' . $fileExtension;
   	        $RegUser_info = $functions->getUserInfo($session->username);
   	        $regUserId= $RegUser_info['id'];
   	    
   	 
   	      
           $uploadFileDir = "files/midia/"; 
   	    $dest_path = $uploadFileDir."/".$newNome;
    
   	  if(move_uploaded_file($arqUpload['tmp_name'][$controle], $dest_path)){  
              $session->editAccountMidiaGallery($regUserId,$newNome,$tipo_newMidiaGallery);
                
                if ( $detect->isMobile() ){
                 $UPMidiaST='show';
              $UPMidiaST_MSG =' <style> body{background-color:black; color:white; text-align:center; font-size:25px; font-family:Arial;} </style>
          <img  src="../assets/imagens/logo/loading.gif" width="500px" height="500px" style="margin-top:45%;>  
          <span style="margin-top:-20px;">      <h2>Carregando...</h2>           </span>   ';               
                }else{
                                              $UPMidiaST='show';
            $UPMidiaST_MSG =' 
          <style> body{background-color:black; color:white; text-align:center; font-size:12px; font-family:Arial;} </style>
            <img  src="../assets/imagens/logo/loading.gif" width="300px" height="300px" style="margin-top:10%;>  
            <span style="margin-top:-70px;"><h7><center>Carregando...</center></h7></span>';             
                }
                
                
   	  }else{
   	      
   	      if ( $detect->isMobile() ){
              	       $UPMidiaST='show';
              $UPMidiaST_MSG ='<style> body{background-color:black; color:white; text-align:center; font-size:25px; font-family:Arial;} </style>
          <img  src="../assets/imagens/logo/loading.gif" width="500px" height="500px" style="margin-top:45%;>  
          <span style="margin-top:-20px;">      <h2>Erro! Tente novamente.</h2>           </span>   ';             
        }else{
                                    $UPMidiaST='show';
            $UPMidiaST_MSG =' 
          <style> body{background-color:black; color:white; text-align:center; font-size:12px; font-family:Arial;} </style>
            <img  src="../assets/imagens/logo/loading.gif" width="300px" height="300px" style="margin-top:10%;>  
            <span style="margin-top:-70px;"><h7><center>Erro! Tente novamente.</center></h7></span>';               
        }
   	      
   	      

   		  
   	  } 
       
   	      
     }   
    }
     
       
   }
   
     if (isset($_GET['cad_detalhes_id'])) {
         $cad_detalhes_id           = $_GET['cad_detalhes_id'];
     }
     
     if (isset($_GET['modViagem'])) {
         $modViagem           = $_GET['modViagem']; 
         $RegUser_info = $functions->getUserInfo($session->username);
         $modViagemUser       = $RegUser_info['id'];
         $session->UpdateDisponivel($modViagem,$modViagemUser); 
          header("Location: account.php");
     } 
     
     if (isset($_GET['adm_alt_conta_status']) and isset($_GET['adm_alt_id_user']) and isset($_GET['adm_alt_colum'])) {
         
         $admin_check_grup = $functions->getUserInfo($session->username);
         
         if($admin_check_grup['grupo'] =='DEVELOPER' or $admin_check_grup['grupo'] =='ADMIN' ){
         $adm_alt_conta_status          = $_GET['adm_alt_conta_status']; 
         $adm_alt_id_user               = $_GET['adm_alt_id_user']; 
         $adm_alt_colum               = $_GET['adm_alt_colum']; 
         $session->Update_admn_statusConta($adm_alt_conta_status,$adm_alt_id_user,$adm_alt_colum); 
          header("Location: cad_detalhes.php?cad_detalhes_id=$adm_alt_id_user");
         
         } 
         
         
     }
     
     if (isset($_POST['update_qtd_dias_adc'])) {
        $admin_check_grup = $functions->getUserInfo($session->username);
         if($admin_check_grup['grupo'] =='DEVELOPER' or $admin_check_grup['grupo'] =='ADMIN' ){   
         $adm_adc_qtd_dias                               = $_POST['adm_adc_qtd_dias'];
         $adm_alt_id_user_adc                         = $_POST['adm_alt_id_user_adc'];  
         $update_qtd_dias = date('Y-m-d H:i:s', strtotime('+'.$adm_adc_qtd_dias.'days')); 
         $session->Update_admn_qtd_dias($update_qtd_dias,$adm_alt_id_user_adc); 
     }
         
     } 
    
   	 if (isset($_GET['ProcessPayment'])) { 
   	      
   	      $Process_Plano         = $_GET['ProcessPayment'];    
   	      $Process_User_session  = $functions->getUserInfo($session->username); 
   	      $Process_User          = $Process_User_session['username'];   
   	      $session->ProcessPayment($Process_Plano,$Process_User); 
   	      if ( $detect->isMobile() ){
            header("Location: pagamentos.php");
                
                }else{
                header("Location: account.php");
                }
   	   
   	 
   	 }
   	 
   	 if (isset($_GET['assinST'])) {
   	     
   	  $assinST           = $_GET['assinST'];  
   	  
      $planUserID= $user_info['id'];
   	  $session->UpdatePlano($assinST,$planUserID); 
   	  
   	   if ( $detect->isMobile() ){
            header("Location: pagamentos.php");
                
                }else{
                header("Location: account.php");
                }
   	   
   	 }
   
    if (isset($_GET['acao']) and isset($_GET['id']) and isset($_GET['file'])) {
       
       $acao_photo           = $_GET['acao'];
       $idAqr                = $_GET['id'];
       $fileAqr              = $_GET['file']; 
       
        
       if($acao_photo == 'excluir'){
           
        if(file_exists( "files/midia/$fileAqr" )){
            unlink("files/midia/$fileAqr");
            if(!is_file( "files/midia/$fileAqr" )){
            $session->ExcluirPhoto($idAqr); 
             
            
            if ( $detect->isMobile() ){
            $UPMidiaST='show';
              $UPMidiaST_MSG ='<style> body{background-color:black; color:white; text-align:center; font-size:25px; font-family:Arial;} </style>
          <img  src="../assets/imagens/logo/loading.gif" width="500px" height="500px" style="margin-top:45%;>    
          <span style="margin-top:-20px;">      <h2>Excluindo...</h2>           </span> ';
                
                }else{
                header("Location: account.php");
                }
            
            }
            
        }else{
            
            
            if ( $detect->isMobile() ){
            $UPMidiaST='show';
            $UPMidiaST_MSG =' 
          <style> body{background-color:black; color:white; text-align:center; font-size:25px; font-family:Arial;} </style>
          <img  src="../assets/imagens/logo/loading.gif" width="500px" height="500px" style="margin-top:45%;>    
          <span style="margin-top:-20px;">      <h2>Erro! Foto não encontrada. <br> Tente novamente.</h2>           </span> ';
                
                }else{
            $UPMidiaST='show';
            $UPMidiaST_MSG =' 
          <style> body{background-color:black; color:white; text-align:center; font-size:12px; font-family:Arial;} </style>
            <img  src="../assets/imagens/logo/loading.gif" width="300px" height="300px" style="margin-top:10%;>  
            <span style="margin-top:-70px;"><h7><center>Erro! Foto não encontrada. <br> Tente novamente.</center></h7></span>';
                }
                   
        }
       
             
       }else
       if($acao_photo =='hidden'){
           $status_photo = 'HIDDEN';
           $session->HiddenShowPhotos($status_photo,$idAqr);
             
                if ( $detect->isMobile() ){
                $UPMidiaST='show';
                $UPMidiaST_MSG =' 
                <style> body{background-color:black; color:white; text-align:center; font-size:25px; font-family:Arial;} </style>
                <img  src="../assets/imagens/logo/loading.gif" width="500px" height="500px" style="margin-top:45%;>    
                <span style="margin-top:-20px;">      <h2>Ocultando ...</h2>           </span> ';
                
                }else{
                header("Location: account.php");
                }    
           
       }
       if($acao_photo =='show'){
           $status_photo = 'VISIBLE';
           $session->HiddenShowPhotos($status_photo,$idAqr);
            if ( $detect->isMobile() ){
           $UPMidiaST='show';
            $UPMidiaST_MSG =' 
          <style> body{background-color:black; color:white; text-align:center; font-size:25px; font-family:Arial;} </style>
          <img  src="../assets/imagens/logo/loading.gif" width="500px" height="500px" style="margin-top:45%;>  
          <span style="margin-top:-20px;">      <h2>Exibindo...</h2>           </span>';
                
                }else{
                header("Location: account.php");
                }
                
       }
       else
       if($acao_photo =='cover'){
           $session->CoverPhoto($fileAqr);
           
            if ( $detect->isMobile() ){
            $UPMidiaST='show';
            $UPMidiaST_MSG =' 
          <style> body{background-color:black; color:white; text-align:center; font-size:25px; font-family:Arial;} </style>
          <img  src="../assets/imagens/logo/loading.gif" width="500px" height="500px" style="margin-top:45%;>  
          <span style="margin-top:-20px;">      <h2>Alterando foto de capa...</h2>           </span>   ';
                
                }else{
                 $UPMidiaST='show';
            $UPMidiaST_MSG =' 
          <style> body{background-color:black; color:white; text-align:center; font-size:12px; font-family:Arial;} </style>
            <img  src="../assets/imagens/logo/loading.gif" width="300px" height="300px" style="margin-top:10%;>  
            <span style="margin-top:-70px;"><h7><center>Alterando foto de capa...</center></h7></span>   ';
                }           
          
           
       }
     
          
   	}  
     
    
    $messageUpload1 = '( Clique aqui para procurar na galeria )';  $messageUpload2 = '( Clique aqui para procurar na galeria )';   $messageUpload3 = '( Clique aqui para procurar na galeria )'; 
    $messageUpload1Erro = ''; $messageUpload2Erro = ''; $messageUpload3Erro = '';
     if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'confirm_identidade'){
    
       function id($qtd){
               $Caracteres = '0123456789AbCdEfGhIjKlMnOpQrStUvXyZ';
               $QuantidadeCaracteres = strlen($Caracteres);
               $QuantidadeCaracteres--; 
               $Hash=NULL;
               for($x=1;$x<=$qtd;$x++){
               $Posicao = rand(0,$QuantidadeCaracteres);
               $Hash .= substr($Caracteres,$Posicao,1);
               }
               return $Hash;
               } 
                
    
       
       $fileTmpPath1 = $_FILES['uploadedFile1']['tmp_name'];
       $fileTmpPath2 = $_FILES['uploadedFile2']['tmp_name'];
       $fileTmpPath3 = $_FILES['uploadedFile3']['tmp_name'];
       
       $fileName1 = $_FILES['uploadedFile1']['name'];
       $fileName2 = $_FILES['uploadedFile2']['name'];
       $fileName3 = $_FILES['uploadedFile3']['name'];
       
       $fileSize1 = $_FILES['uploadedFile1']['size'];
       $fileSize2 = $_FILES['uploadedFile2']['size'];
       $fileSize3 = $_FILES['uploadedFile3']['size'];
       
       $fileType1 = $_FILES['uploadedFile1']['type'];
       $fileType2 = $_FILES['uploadedFile2']['type'];
       $fileType3 = $_FILES['uploadedFile3']['type'];
       
       $fileNameCmps1 = explode(".", $fileName1);
       $fileNameCmps2 = explode(".", $fileName2);
       $fileNameCmps3 = explode(".", $fileName3);
       
       $fileExtension1 = strtolower(end($fileNameCmps1));
       $fileExtension2 = strtolower(end($fileNameCmps2));
       $fileExtension3 = strtolower(end($fileNameCmps3)); 
       
        $newFileName1 = md5(id(55). $fileName1) . '.' . $fileExtension1;
        $newFileName2 = md5(id(33). $fileName2) . '.' . $fileExtension2;
        $newFileName3 = md5(id(22). $fileName3) . '.' . $fileExtension3;
        
       $allowedfileExtensions1 = array('.text', '.php', '.html', '.js');
       $allowedfileExtensions2 = array('.text', '.php', '.html', '.js');
       $allowedfileExtensions3 = array('.text', '.php', '.html', '.js');
   
   
       if (!in_array($fileExtension1, $allowedfileExtensions1)){    
           if (!in_array($fileExtension2, $allowedfileExtensions2)){ 
               if (!in_array($fileExtension3, $allowedfileExtensions3)){ 
                   
                               $uploadFileDir1 = 'files/docs/'; 
                               $dest_path1 = $uploadFileDir1 . $newFileName1; 
                               
                   if(move_uploaded_file($fileTmpPath1, $dest_path1)){ 
                       
                               $uploadFileDir2 = 'files/docs/'; 
                               $dest_path2 = $uploadFileDir2 . $newFileName2; 
                               
                       if(move_uploaded_file($fileTmpPath2, $dest_path2)){
                           
                               $uploadFileDir3 = 'files/docs/'; 
                               $dest_path3 = $uploadFileDir3 . $newFileName3; 
                               
                           if(move_uploaded_file($fileTmpPath3, $dest_path3)){ 
                               $DocsStatus='ANALISE';
                               $session->editAccountDocs($DocsStatus, $newFileName1, $newFileName2, $newFileName3);
                               header("Location: cadastro.php");  
                           }else{
                               $messageUpload3 = 'Erro ao enviar verso do documento';
                           }
                           
                       }else{
                           $messageUpload2 = 'Erro ao enviar frente do documento';
                       }
                       
                       
                   }else{
                       $messageUpload1 = 'Erro ao enviar vídeo';
                   }
                    
                    
               }else{
                   $messageUpload3 = 'Incompatível: '. implode(',', $allowedfileExtensions3);
                   $messageUpload3Erro = '<br><font color="red" font-size="2px">ERRO: foto em formato incompatível</font>';
               }
               
           }else{
               $messageUpload2 = 'Incompatível: '. implode(',', $allowedfileExtensions2);
               $messageUpload2Erro = '<br><font color="red" ">ERRO: foto em formato incompatível</font>';
           }
           
       }else{
           $messageUpload1 = 'Incompatível: '. implode(',', $allowedfileExtensions1);
           $messageUpload1Erro = '<br><font color="red">ERRO: vídeo em formato incompatível</font>';
       } 
        
    }
     
    
     
   
   ?>