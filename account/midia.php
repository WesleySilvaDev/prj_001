<?php
   include_once("includes/controller.php"); 
   error_reporting(0);
   $pagename = 'midia';
   $container = '';
   require_once 'MobileDetect/Mobile_Detect.php';
   $detect = new Mobile_Detect;
   
   
   if($session->logged_in){  
         $idlogado = $functions->getUserInfo($session->username); 
      
   }
   if ( $detect->isMobile() ){
      $usernameGET  = $_GET['user'];
   $photoidGET  = '#'.$_GET['photo'];
   $user_info = $functions->getUserInfo($usernameGET);
   $idUsername = $user_info['username'];
   $regUserId = $user_info['id'];
   $DB_USERS_grupo = $user_info['grupo']; 
   $biografia = $user_info['bio']; 
   $usernamePerfil = $user_info['firstname'].' '.$user_info['lastname'];
   $verificarUsername = ($usernameGET =! $user_info['username']) ? "Usuário não encontrado" : $usernamePerfil;
   
    if($usernameGET =! $user_info['username']){ 
       http_response_code(404);
       exit;
    } 
    
    
    
   }else{
       header("Location: account.php");
   }
   
   
   
   
   
      ?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8" />
      <title>NOSSO LOVE: <?=$verificarUsername;?></title>
      <meta name="description" content="As melhores acompanhantes de luxo" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="icon" href="img/favicon2.png" />
      <!-- for ios 7 style, multi-resolution icon of 152x152 -->
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
      <link rel="apple-touch-icon" href="img/favicon2.png">
      <meta name="apple-mobile-web-app-title" content="As melhores acompanhantes de luxo">
      <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
      <meta name="mobile-web-app-capable" content="yes">
      <link rel="shortcut icon" sizes="196x196" href="img/favicon2.png">
      <!-- style -->
      <link rel="stylesheet" href="../assets/animate.css/animate.min.css" type="text/css" />
      <link rel="stylesheet" href="../assets/glyphicons/glyphicons.css" type="text/css" />
      <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css" type="text/css" />
      <link rel="stylesheet" href="../assets/material-design-icons/material-design-icons.css" type="text/css" />
      <link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
      <!-- build:css ../assets/styles/app.min.css -->
      <link rel="stylesheet" href="../assets/styles/app.css?version=<?=filemtime('../assets/styles/app.css');?>" type="text/css" />
      <!-- endbuild -->
      <link rel="stylesheet" href="../assets/styles/font.css" type="text/css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
      <script>
         if ( window.history.replaceState ) {
             window.history.replaceState( null, null, window.location.href );
         }
      </script>  
      <script src="../libs/jquery/bootstrap/dist/js/bootstrap.js"></script> 
   </head>
   <style> 
      body{ 
      margin:0;
      padding: 0;
      box-sizing: border-box;
      }
      section {
      position: absolute; 
      margin-left: 0px; 
      width: 100%; 
      height: 9vh;
      display: flex;
      justify-content: center; 
      align-items:center;
      overflow: hidden;
      }
      section:before {
      content: '';
      position: absolute;
      top:0; 
      margin-left: 0;
      width: 100%;
      height: 280px; 
      background: #000000;
      border-radius:  100% 100% 0 0 /100% 100% 0 0;
      transform: scaleX(1.3); 
      } 
      * {
      box-sizing: border-box;
      }
      /* grid styles ------------------------------------ */
      @media (min-width: 300px) {
      main {
      margin-top:4px;
      display: grid;
      grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr; 
      } 
      .figure {
      grid-column: span 2;
      margin:0;
      }
      }
      .figure-img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
        padding: 1px;
      }
   </style>
   <style>
      .heart {
      background: url(../account/img/like1.png);
      background-position: left;
      background-repeat: no-repeat;
      height: 70px;
      width: 70px;
      cursor: pointer;
      position: absolute;
      left:25px;
      background-size:2900%; 
      }
      .heart:hover, .heart:focus{
      background-position: right;
      }
      @-webkit-keyframes heartBlast {
      0% {
      background-position: left;
      }
      100% {
      background-position: right;
      }
      }
      @keyframes heartBlast {
      0% {
      background-position: left;
      }
      100% {
      background-position: right;
      }
      }
      .heartAnimation {
      display: inline-block;
      -webkit-animation-name: heartBlast;
      animation-name: heartBlast;
      -webkit-animation-duration: .8s;
      animation-duration: .8s;
      -webkit-animation-iteration-count: 1;
      animation-iteration-count: 1;
      -webkit-animation-timing-function: steps(28);
      animation-timing-function: steps(28);
      background-position: right;
      }
      .nav-active-red .nav-link.active, .nav-active-red .nav > li.active > a {
      color: rgba(255, 255, 255, 0.87) !important;
      background-color: #ff1100 !important;
      }
   </style>
   <script>
      $(document).ready(function()
      {
         
      $('body').on("click",'.heart',function()
         {
         	
         	var A=$(this).attr("id");
         	var B=A.split("like");
             var messageID=B[1];
             var C=parseInt($("#likeCount"+messageID).html());
         	$(this).css("background-position","")
             var D=$(this).attr("rel");
            
             if(D === 'like') 
             {      
             $("#likeCount"+messageID).html(C+1);
             $(this).addClass("heartAnimation").attr("rel","unlike");
              //acao para like aqui
                $(document).ready(function(){
                    $.ajax({
                        url: '../account/includes/like.php?like=<?=$user_info['username'];?>',
                        type: 'GET',
                        data: '<?php echo "teste"; ?>'
                    });
                })
             }
             else 
             {
             $("#likeCount"+messageID).html(C-1);
             $(this).removeClass("heartAnimation").attr("rel","like");
             $(this).css("background-position","left");
                $(document).ready(function(){
                    $.ajax({
                        url: '../account/includes/like.php?unlike=<?=$user_info['username'];?>',
                        type: 'GET',
                        data: '<?php echo "teste"; ?>'
                    });
                })
             }
      
      
         });
      
      
      });
   </script>
   <body class="pace-done grey" style="background-color: #000000;">
      <div class="app" id="app">
      <!-- ############ LAYOUT START--> 
      <!-- content -->
      <div id="content" class="app-content box-shadow-z0" role="main">
         <div class="app-header white box-shadow" style="background-color: #000000;">
            <div class="navbar">
                <table width="100%">
                    <tr>
                        <td width="90%">
                            <img src="./files/profile/<?php echo $user_info['profile_photo']?>" class="img-circle" style=" object-fit: cover; border: 2px solid red;"  width="45px" height="45px"> 
                                                               <span style="font-size:16px;"><?php echo  $user_info['firstname'].' '.$user_info['lastname'];?></span> 
                        </td> 
                        <td width="10%">
                            <a onClick="JavaScript: window.history.back();" class="navbar-item pull-left hidden-lg-up">
               <font size="4px;"><i class="fa fa-reply"  style="margin-top:25px; margin-left:-8px; line-height: 1.0;"></i></font>
               </a>   
                        </td>
                    </tr>
                </table>
                
                
            </div>
         </div> 
         <div ui-view class="app-body" id="view">
            <!-- ############ PAGE START-->
            <div class="padding">
               <div class="row" style=" margin-left: -10px;  margin-right: -10px;">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                     <!-- top --> 
                     <div class="box" style="background-color: #121212;">
                   
                <div class="tab-content pos-rlt">
                                 <?php
                                    $regUserId = $user_info['id'];
                                    if ($regUserId == $idlogado['id'] ){
                                        $sql = "SELECT * FROM fotos_videos WHERE id_user = '$regUserId'";
                                    }else{
                                      $sql = "SELECT * FROM fotos_videos WHERE id_user = '$regUserId' AND status = 'VISIBLE'";  
                                    }
                                     
                                    $result = $db->prepare($sql);
                                    $result->execute();
                                    while ($row = $result->fetch()) { ?>
                                 <div class="row" id="<?php echo $row['id'];?>">
                                    <div class="col-sm-6 col-md-4" style="padding-top:10px;">
                                       <div class="box" style="background-color: #000000;">
                                          <div class="box-header" style=" padding: 0px; padding-left: 15px;  padding-right: 15px;">
                                          </div>
                                          <div class="box-body" style="  background-color: #121212;   /* padding: 1rem; */ padding-top: 10px;     padding-bottom: 0px; padding-left: 10px;  padding-right: 10px;">
                                             <table width="100%" style="    /* border-collapse: collapse; */    background-color: #121212; border-radius: 10px;  margin-bottom: 5px;margin-top: 5px; ">
                                                <tr>
                                                   <td> 
                                                 
                                                      <img  src="./files/midia/<?php echo $row['file_path'];?>" width="100%" height="auto" style="padding:10px; border-radius:20px;">
                                                       
                                                       <?php 
                                                       
                                                       if ($row['id_user'] == $idlogado['id'] ){  ?>
        <table width="100%">
                                                                             <tr>
                                                                               
                                                                                
                                                                                <?php if ($row['status'] == 'HIDDEN'){?> 
                                                                                <center><small> Você ocultou esta foto da galeria</small></center>
                                                                                <?php } ?>
                                                                                <td width="49%; " >
                                                                                   <center> 
                                                                                   
                                                                                      <div style="padding-left: 10px;  padding-right: 10px;">
                                                                                          
                                                                                         <?php if ($row['status'] == 'HIDDEN'){?>  
                    <a class="btn btn-xs white" style="width:100%; margin-bottom:7px; border-color: #000000; background-color: #1c1c1c;  color: #1c8e22;font-size:12px;" href="account.php?acao=show&id=<?php echo $row['id'];?>&file=<?php echo $row['file_path'];?>"><i class="fa fa-eye"></i> EXIBIR NA GALERIA</a>
                    <?php }else
                        if ($row['status'] == 'VISIBLE'){?>
                    <a class="btn btn-xs white" style="width:100%; margin-bottom:7px; border-color: #000000; background-color: #1c1c1c;  color: #d5d5d5;font-size:12px;" href="account.php?acao=hidden&id=<?php echo $row['id'];?>&file=<?php echo $row['file_path'];?>"><i class="fa fa-eye"></i> OCULTAR DA GALERIA</a>
                    <?php }?>
                                                                                          
                                                                                      </div>
                                                                                   </center> 
                                                                                </td>
                                                                                <td width="49%; " >
                                                                                   <center> 
                                                                                      <div style="padding-left: 10px;  padding-right: 10px;">
                                                                                          
                                                                                          <div class="btn-group dropdown" style="width:100%;">
                                                                                       <button type="button" class="btn btn-xs white" data-toggle="dropdown" aria-expanded="false" style="width:100%; margin-bottom:7px;  border-color: #000000; background-color: #1c1c1c;  color: #d5d5d5;font-size:12px;"><i class="fa fa-reorder "></i>  OPÇÕES <span class="caret"></span></button>
                                                                                            <ul class="dropdown-menu animated fadeIn"> 
                                                                                                <li class="dropdown-item">
                                                                                                  <a  href="account.php?acao=cover&id=<?php echo $row['id'];?>&file=<?php echo $row['file_path'];?>">Definir como capa</a>
                                                                                                </li>
                                                                                                <li class="dropdown-item">
                                                                                                    <a href="account.php?acao=excluir&id=<?php echo $row['id'];?>&file=<?php echo $row['file_path'];?>">Excluir foto</a>
                                                                                                </li>
                                                                                                 
                                                                                            </ul>
                                                                                    </div>
                                                                                          
                                                                                      </div>
                                                                                   </center> 
                                                                                </td>
                                                                             </tr>
                                                                          </table>
                                                      <?php   } ?>
                                                      
                                                   </td>
                                                </tr>
                                             </table> 
                                          </div> 
                                       </div> 
                                    </div> 
                                 </div> 
                                 <?php }  ?>    
                              </div>
                
                
                
               
               
             
            
            
            
            
                         
                     </div>
                  </div>
               </div>
              
            </div>  
         </div> 
      </div>
      
<script src="../libs/jquery/jquery/dist/jquery.js"></script>
  <!-- Bootstrap -->
  <script src="../libs/jquery/tether/dist/js/tether.min.js"></script> 
  <!-- core -->
  <script src="../libs/jquery/underscore/underscore-min.js"></script>
  <script src="../libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
  <script src="../libs/jquery/PACE/pace.min.js"></script>
  <script src="../account/scripts/config.lazyload.js"></script>
  <script src="../account/scripts/palette.js"></script>
  <script src="../account/scripts/ui-load.js"></script>
  <script src="../account/scripts/ui-jp.js"></script>
  <script src="../account/scripts/ui-include.js"></script>
  <script src="../account/scripts/ui-device.js"></script>
  <script src="../account/scripts/ui-form.js"></script>
  <script src="../account/scripts/ui-nav.js"></script>
  <script src="../account/scripts/ui-screenfull.js"></script>
  <script src="../account/scripts/ui-scroll-to.js"></script>
  <script src="../account/scripts/ui-toggle-class.js"></script>
  <script src="../account/scripts/app.js"></script>
      <!-- ajax -->
      <script src="../libs/jquery/jquery-pjax/jquery.pjax.js"></script>
      <script src="../account/scripts/ajax.js"></script> 
      <!-- endbuild -->
   </body>
</html>