<?php 
include_once("includes/controller.php");
$pagename = 'index';
$container = '';
require_once 'MobileDetect/Mobile_Detect.php';
$detect = new Mobile_Detect;
  

if(!$session->logged_in){ header("Location: login.php");  } 
else{  
        $user_info = $functions->getUserInfo($session->username); 
        $DB_USERS_grupo = $user_info['grupo'];  
        include_once("includes/uFunctions.php"); 
        $form = new Form; 
    if ( $detect->isMobile() ) {
                 //LOGIN OK = ADMIN MOBILE 
         if($DB_USERS_grupo =='ADMIN' or  $DB_USERS_grupo =='DEVELOPER'){ 
             MessageRedir(' <style> body{background-color:black; color:white; text-align:center; font-size:25px; font-family:Arial;} </style>
            <img  src="../assets/imagens/logo/loading.gif" width="500px" height="500px" style="margin-top:45%;>  
            <span style="margin-top:-20px;"><h2><center>Carregando...</center></h2></span>   ', 4, 'admin.php');
             
            }else //LOGIN OK = USER MOBILE 
            if($DB_USERS_grupo=='REGISTERED'){  
              MessageRedir(' <style> body{background-color:black; color:white; text-align:center; font-size:25px; font-family:Arial;} </style>
            <img  src="../assets/imagens/logo/loading.gif" width="500px" height="500px" style="margin-top:45%;>  
            <span style="margin-top:-20px;"><h2><center>Carregando...</center></h2></span>   ', 4, 'account.php'); 
            }else //ERRO 
            {  
            MessageRedir(' <style> body{background-color:black; color:white; text-align:center; font-size:25px; font-family:Arial;} </style>
            <img  src="../assets/imagens/logo/loading.gif" width="500px" height="500px" style="margin-top:45%;>  
            <span style="margin-top:-20px;"><h3><center>Econtramos um problema em sua conta, contate o suporte.</center></h3></span>   ', 4, 'logout.php?path=login');
            }
            
        }
        else{     //LOGIN OK = ADMIN DESKTOP 
            if($DB_USERS_grupo =='ADMIN' or  $DB_USERS_grupo =='DEVELOPER'){ 
             MessageRedir(' <style> body{background-color:black; color:white; text-align:center; font-size:12px; font-family:Arial;} </style>
            <img  src="../assets/imagens/logo/loading.gif" width="300px" height="300px" style="margin-top:10%;>  
            <span style="margin-top:-70px;"><h7><center>Carregando...</center></h7></span>   ', 4, 'admin.php');

             
            }else //LOGIN OK = USER DESKTOP 
            if($DB_USERS_grupo=='REGISTERED'){ 
              MessageRedir(' <style> body{background-color:black; color:white; text-align:center; font-size:12px; font-family:Arial;} </style>
            <img  src="../assets/imagens/logo/loading.gif" width="300px" height="300px" style="margin-top:10%;>  
            <span style="margin-top:-70px;"><h7><center>Carregando...</center></h7></span>   ', 4, 'account.php');
            
                
            }else//ERRO 
            {  
            MessageRedir(' <style> body{background-color:black; color:white; text-align:center; font-size:12px; font-family:Arial;} </style>
            <img  src="../assets/imagens/logo/loading.gif" width="300px" height="300px" style="margin-top:10%;>  
            <span style="margin-top:-70px;"><h7><center>Econtramos um problema em sua conta, contate o suporte.</center></h7></span>   ', 4, 'logout.php?path=login');
            }
        } 
 
}
?>
