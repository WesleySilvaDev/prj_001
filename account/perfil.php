<?php
   include_once("includes/controller.php");
   include_once("account/includes/like.php");
   error_reporting(0);
   $pagename = 'index';
   $container = '';
   require_once 'MobileDetect/Mobile_Detect.php';
   $detect = new Mobile_Detect;
    
   $usernameGET  = $_GET['user'];
   $user_info = $functions->getUserInfo($usernameGET);
   if($user_info['disponivel']=='NAO'){
       
       if ( $detect->isMobile() ){
            
            function MessageRedir($msg, $time = 4, $url) { 	die("$msg <meta http-equiv='refresh' content='$time;URL=$url'>"); }
       MessageRedir(' <style> body{background-color:black; color:white; text-align:center; font-size:25px; font-family:Arial;} </style>
            <img  src="../assets/imagens/logo/loading.gif" width="500px" height="500px" style="margin-top:45%;>  
            <span style="margin-top:-20px;"><h3><center>MODELO INDISPONÍVEL NO MOMENTO! <br>  TENTE NOVAMENTE MAIS TARDE <br> OU ESCOLHA OUTRA.</center></h3></span>   ', 4, '../index.php');
        
            
                
                }else{
                
                function MessageRedir($msg, $time = 4, $url) { 	die("$msg <meta http-equiv='refresh' content='$time;URL=$url'>"); }
       MessageRedir(' <style> body{background-color:black; color:white; text-align:center; font-size:12px; font-family:Arial;} </style>
            <img  src="../assets/imagens/logo/loading.gif" width="300px" height="300px" style="margin-top:10%;>  
            <span style="margin-top:-70px;"><h7><center>MODELO INDISPONÍVEL NO MOMENTO! <br> TENTE NOVAMENTE MAIS TARDE <BR> OU ESCOLHA OUTRA.</center></h7></span>   ', 4, '../index.php');
       
                
                }
       
         
       
       
        
        
        
         
        }
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
    
    if(!$user_info['idade']==''){
        $datadonascimento = $user_info['idade'];; 
        list($ano, $mes, $dia) = explode('-', $datadonascimento); 
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y')); 
        $diadonascimento = mktime( 0, 0, 0, $mes, $dia, $ano); 
        $idade = floor((((($hoje - $diadonascimento) / 60) / 60) / 24) / 365.25).' anos';  
     }
       
   if ( $detect->isMobile() ){?>
   
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
               <!-- Open side - Naviation on mobile -->
               <a href="../index.php" class="navbar-item pull-left hidden-lg-up">
               <font size="4px;"><i class="fa fa-reply"  style="margin-top:25px; margin-left:-8px; line-height: 1.0;"></i></font>
               </a>  
               <!-- Page title - Bind to $state's title -->
               <div class="navbar-item h7" ng-bind="$state.current.data.title" id="pageTitle" style="line-height:15px">
                  <center> 
                     <a href="../index.php">
                         <img src="../account/img/COR.png" alt="." style="margin-top:8px; margin-left:-19px; height:45px "class="logoMobile" style=""  ><br>
                     <font size="2" color="gray" style="font-family: Abhaya Libre Regular; margin-left:-19px;">As melhores acompanhantes de luxo</font> 
                     </a> 
                  </center>
               </div>
               <ul class="nav navbar-nav pull-right" style="margin-top:-63px"> 
                   <a href="https://api.whatsapp.com/send?text=*<?php echo $usernamePerfil; ?>* - NossoLove%0D%0AAcompanhante exclusiva:%0D%0A%0D%0Ahttps://www.nossolove.com/perfil/<?php echo $idUsername;?>"><font size="6px"><i class="material-icons md-24"></i></font></a> 
               </ul> 
            </div>
         </div> 
         <div ui-view class="app-body" id="view">
            <!-- ############ PAGE START-->
            <div class="padding">
               <div class="row" style=" margin-left: -10px;  margin-right: -10px;">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                     <!-- top --> 
                     <div class="box" style="background-color:#000000">
                        <div class="item">
                           <div class="item-bg" style="height:200px; background-color:#101010" >
                              <img src="../account/files/midia/<?php echo $user_info['profile_capa'];?>" class="blur"> 
                              <span class="label red pos-rlt " style="margin:10px;">GAROTA NOVA</span> 
                           </div>
                        </div>
                        <section style="margin-top:150px;">
                           <div class="content" >  </div>
                        </section>
                        <div class="p-a text-center" style="  border-radius:30%; margin-top: 10px "  >
                           <div class="p-a-lg pos-rlt text-center"    style="margin-top: 35px;" >
                              <img src="../account/files/profile/<?php echo $user_info['profile_photo'];?>" class="img-circle" style="margin-bottom: -5rem; border: 2px solid red; object-fit: cover;"  width="150px" height="150px"> 
                           </div>
                           <?php
                           $verificado = '<div class="pos-rlt" style="margin-top:  -18px; margin-left:-220px; line-height: 0.8;"><font color="white" size="1px">Garota </br>Verificada</font> </div>
                           <div class="pos-rlt" style="margin-top: -32px; margin-left:-138px;   " ><font color="#509ae9" size="5px"><img src="../account/img/verificada.png" height="25px"></img></font>  </div>';
                           ?>
                           <?= ($user_info['perfil_verificado'] == "SIM") ? $verificado : "" ?>
                           
                           <div class="pos-rlt"  style="margin-top: -40px; margin-left:220px" >
                              <font color="white" size="1px">
                                 <div class="feed" id="feed1" style="margin-top: -24px; ">
                                    <?php
                                        if(isset($_SESSION['verificarLike'][$idUsername]) == 'liked'){
                                            $class= "heart-animation heartAnimation";
                                            $rel = "un";
                                            $style = "";
                                        }
                                    ?>
                                      
                                    <div class="heart img-circle <?=$class;?>" id="like1" rel="<?=$rel;?>like" style="<?=$style;?>"><small style="top:-10px;">Gostou?</small></div>
                                 </div>
                              </font>
                              <br> 
                           </div> 
                        </div>
                        <div class="p-a text-center"  style="margin-top: 0px; line-height: 2.0;">
                           <span class="text-md m-t block">
                              <small>
                              <font color="gold" size="3px">Exclusiva</font>
                              </small>
                              <br> 
                              <h5><?=$usernamePerfil;?></h5>
                           </span>
                           <center>
                              <p style="max-width: 70%; text-align: left; line-height: 1.0; margin-left:20px;"><font size="2px">
                                 <?=$biografia;?>
                                 </font>
                              </p>
                           </center> 
                           <p>
                           <table  style=" width: 100%; ">
                              <tr>
                                 <td  style="width: 100%; ">  
                                    <a href="" data-toggle="modal" data-target="#contatos" class="btn btn-sm red p-x-md" style="border-radius: 15px;background-color:#3e8718;" >
                                     <table>
                                         <tr>
                                             <td> 
                                                <i class="fa fa-comments" aria-hidden="true" style="font-size:24px;"></i> 
                                             </td>
                                             <td>
                                                <span style="font-size:14px;">
                                       ENTRAR EM CONTATO</span> 
                                             </td>
                                         </tr>
                                     </table>
                                    </a>
                              </tr>
                           </table>  
                           </p>
                        </div>
                        <div class="nav-active-border b-danger top box" style="border-color: red; background-color: #000000">
                           <div class="nav nav-md" >
                              <ul class="nav " style="justify-content: center;display: flex;">
                                 <a class="nav-link active" href data-toggle="tab" data-target="#tab4" style="width: 33%; " >
                                    <center><i class="fa fa-camera" style="font-size: 16px;"></i> <br><small><font size="1px">FOTOS</font></small> </center>
                                 </a>
                                 <a class="nav-link" href data-toggle="tab" data-target="#tab5" style="width: 33%; " >
                                    <center><i class="fa fa-youtube-play" style="font-size: 18px;"></i> <br><small><font size="1px">VÍDEOS</font></small></center>
                                 </a>
                                 <a class="nav-link" href data-toggle="tab" data-target="#tab6" style="width: 33%; " >
                                    <center><img src="../assets/imagens/icon-info.png" height="24px"> <br><small><font size="1px">SOBRE</font></small> </center>
                                 </a>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-12" style=" padding-right: 0px;  padding-left: 0px; ">
                  <div class="tab-content" >
                     <div class="tab-pane animated fadeIn text-muted active" id="tab4" >
                      
                       
                        <div class="box-divider m-a-0"> </div>
                        <main class="main" >
                           <?php 
                              $regUserId = $user_info['id']; 
                              $sql = "SELECT * FROM fotos_videos WHERE id_user = '$regUserId' AND tipo = 'FP' AND status = 'VISIBLE' "; 
                              $result = $db->prepare($sql);
                              $result->execute();
                              while ($row = $result->fetch()) { ?>
                           <figure class="figure" >
                              <a href="../account/midia.php?user=<?echo $user_info['username'];?>&photo=#<?echo $row['id'];?>" >    
                              <img class="figure-img" src="../account/files/midia/<?php echo $row['file_path'];?>" > 
                              </a>
                           </figure>
                           <?php }  ?>
                           
                        </main>
                        <BR>
                        <div class="box-divider m-a-0" > </div>
                        <small>
                           <center>
                              <h7>Conteúdo Extra</h7>
                           </center>
                        </small>
                         <br>
                        <main class="main" >
                           <?php 
                              $regUserId = $user_info['id']; 
                              $sql = "SELECT * FROM fotos_videos WHERE id_user = '$regUserId' AND tipo = 'FA' AND status = 'VISIBLE' "; 
                              $result = $db->prepare($sql);
                              $result->execute();
                              while ($row = $result->fetch()) { ?>
                           <figure class="figure" >
                              <a href="../account/midia.php?user=<?echo $user_info['username'];?>&photo=#<?echo $row['id'];?>" >    
                              <img class="figure-img" src="../account/files/midia/<?php echo $row['file_path'];?>" > 
                              </a>
                           </figure>
                           <?php }  ?> 
                        </main>
                        <br>
                        <!-- galeria de fotos -->
                     </div>
                     <div class="tab-pane animated fadeIn text-muted " id="tab5">
                        <!-- galeria de VIDEOS --> 
                        <div class="box-divider m-a-0"> </div>
                        <main class="main" >
                           <?php 
                              $regUserId = $user_info['id']; 
                              $sql = "SELECT * FROM fotos_videos WHERE id_user = '$regUserId' AND tipo = 'VD' AND status = 'VISIBLE' "; 
                              $result = $db->prepare($sql);
                              $result->execute();
                              while ($row = $result->fetch()) { ?>
                         
                           <?php }  ?>
                            
                        </main>
                        <br>
                        <!-- galeria de VIDEOS -->
                     </div>
                     <div class="tab-pane animated fadeIn text-muted " id="tab6">
                        <div class="box-header">
                           <table style="width:98%">
                              <tr>
                                 <td style="width:80%">
                                    <h2><?php echo  $user_info['firstname'].' '.$user_info['lastname'];?>
                                       <?php 
                                          if($user_info['perfil_verificado'] == "SIM"){?>
                                       <img src="../account/img/verificada.png" height="17px"></img>
                                    </h2>
                                 </td>
                                 <td style="width:27%">
                                    <?php } ?>
                                 </td>
                              </tr>
                           </table>
                           <small> 
                           <?php if($user_info['perfil_verificado'] == "SIM"){?>
                           Perfil verificado! Garantimos a autenticidade de todos os dados informados.
                           <?php }else{
                              ?>
                           Este perfil ainda não foi verificado...
                           <?php
                              }?>
                           </small><br>
                           <div class="box-divider m-a-0"></div>
                           <br>
                           <h2>Sobre mim:</h2>
                           <small><?php echo  $user_info['sobre'];?></small> 
                           <BR>
                           <table style="width:100%">
                              <tr>
                                 <td style="width:5%"><font size="2px"><i class="fa fa-home"></i> </font> </td>
                                 <td style="width:95%"><font size="2px"> <?php echo  $user_info['nacionalidade'];?></font> </td>
                              </tr>
                              <tr>
                                 <td style="width:5%"><font size="2px"><i class="fa fa-language"></i> </font> </td>
                                 <td style="width:95%"><font size="2px"> <?php echo  $user_info['idiomas'];?></font> </td>
                              </tr>
                              <tr>
                                 <td style="width:5%"><font size="2px"><i class="fa fa-map-marker"></i> </font> </td>
                                 <td style="width:95%"><font size="2px"> <?php echo  $user_info['localizacao'];?></font> </td>
                              </tr>
                                 <tr>
                                 <td style="width:5%"><font size="2px"><i class="fa fa-fire"></i> </font> </td>
                                 <td style="width:95%"><font size="2px"> <?php echo  $idade;?></font> </td>
                              </tr>
                              <tr>
                                 <td style="width:5%"><font size="2px"><i class="fa fa-dollar"></i> </font> </td>
                                 <td style="width:95%"><font size="2px"> <?php echo  $user_info['cache'];?></font> </td>
                              </tr>
                           </table>
                           <br>
                           <h2>Categorias:</h2>
                           <small>
                           <?php 
                           if($user_info['dominatrix']=='SIM'){
                               echo'Dominatrix, ';
                           }
                           if($user_info['massagem_tantrica']=='SIM'){
                               echo'Massagem tantrica, ';
                           }
                           if($user_info['tatuadas']=='SIM'){
                               echo'Tatuadas, ';
                           }
                           if($user_info['suggar_baby']=='SIM'){
                               echo'Suggar baby, ';
                           } 
                           if($user_info['menage']=='SIM'){
                               echo'Menage, ';
                           }
                           if($user_info['desp_solteiro']=='SIM'){
                               echo'Despedida de solteiro, ';
                           }
                         
                           
                           ?></small> 
                        </div>
                     </div>
                  </div>
               </div> 
               
            </div>  
            
         </div>  
             <!-- contatos -->
  <div class="modal fade" id="contatos" role="dialog">
    <div class="modal-dialog">  
      <div class="modal-content" style="margin-top:35%; background-color:#111111; color:white; border-radius: 30px;"> 
        <div class="modal-body" style="margin-bottom: -40px;"> 
       <table style="width:100%;">
           <tr>
               <td><center><img src="../assets/imagens/logo/ICONE VERMELHO.png" height="26px"></center></td>
           </tr>
       </table><br> 
      <p style=" text-align: center; line-height: 1.0;">
        
        <table style="width:100%">
            <tr>
                <td style="width:50%">
                   <center>  <a href="https://api.whatsapp.com/send?phone=+55<?php echo $user_info['whatsapp'].'&text=Oii%2C%20vi%20seu%20anuncio%20no%20site%20NossoLove.'?>" class="btn btn-sm red p-x-md" style=" height:30px; width:120px; border-radius: 15px;background-color:#3e8718;" >
                                     <table style="width:100%">
                                         <tr>
                                             <td>
                                                <i class="fa fa-whatsapp" aria-hidden="true" style="font-size:19px;"></i>  
                                             </td>
                                             <td>
                                                <span style="font-size:12px;">   WhatsApp </span> 
                                             </td>
                                         </tr>
                                     </table>
                                    </a><br>
                                   <small>chame sem adicionar<br> <?php echo $user_info['whatsapp'] ?></small></center>
                </td>
                <td style="width:50%">
                   <center>  
                   <a href="tel:+55<?php echo $user_info['telefone'];?>" class="btn btn-sm red p-x-md" style="height:30px; width:120px; border-radius: 15px;background-color:#035eff;" >
                                     <table style="width:100%">
                                         <tr>
                                             <td >
                                                <i class="fa fa-phone" aria-hidden="true" style="font-size:19px;"></i>  
                                             </td>
                                             <td>
                                                <span style="font-size:12px;">    Ligar </span> 
                                             </td>
                                         </tr>
                                     </table>
                                    </a><br>
                                   <small>Ligue sem adicionar<br> <?php echo $user_info['telefone'] ?></small></center>
                </td>
            </tr>
        </table>
        <table style="width:100%;">
           <tr>
               <td><br><center>
                   
          <?php if($user_info['perfil_verificado'] == "SIM"){ ?>
                       <div class="pos-rlt" style="margin-top: ; margin-left:;   " ><font color="white" size="2px">Modelo  Verificada </font><font color="#509ae9" size="5px"> <img src="../account/img/verificada.png" height="15px" style="margin-top:4px ; "></img></font>   </div> 
          
         <?php }else{ ?>
               <center>Essa modelo ainda não foi verificada.</center>
         <?php }  ?>
                   
               </center></td>
           </tr>
       </table>
         
        
      </p><br>
       
        </div> 
      </div>
      
    </div>
  </div>
      </div>
     
 
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
     
   <?php }else{?>
   
   <?php 
      include('./inc/config.php'); 
      ?>
        
        <!DOCTYPE html> 
<html lang="pt-BR" id="html">
   <meta http-equiv="../assets/content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Nosso Love</title>
      <link rel="stylesheet" href="../assets/content/cache/min/1/nl_937763584983622.css" media="all" data-minify="1" /> 
 	<style type="text/css">
         img.wp-smiley,
         img.emoji {
         display: inline !important;
         border: none !important;
         box-shadow: none !important;
         height: 1em !important;
         width: 1em !important;
         margin: 0 .07em !important;
         vertical-align: -0.1em !important;
         background: none !important;
         padding: 0 !important;
         }
    </style>
      <script type='text/javascript' src='../assets/includes/js/dist/vendor/wp-polyfill.min2c7c.js?ver=3.15.0' id='wp-polyfill-js'></script>
      <script type='text/javascript' src='../assets/includes/js/jquery/jquery.minaf6c.js?ver=3.6.0' id='jquery-core-js' defer></script>
      <script type='text/javascript' id='responsive-lightbox-js-extra'>
         /* <![CDATA[ */
         var rlArgs = {"script":"nivo","selector":"lightbox","customEvents":" ajaxComplete","activeGalleries":"1","effect":"fade","clickOverlayToClose":"1","keyboardNav":"1","errorMessage":"The requested content cannot be loaded. Please try again later.","woocommerce_gallery":"0","ajaxurl":"https:\/\/Nosso Love.com.br\/wp-admin\/admin-ajax.php","nonce":"e3c329c636"};
         /* ]]> */
      </script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
     <style type="text/css" id="wp-custom-css">
         .menu-block {max-height: 67px !important;}.rl-gallery-link:after {max-height: 727px !important;}
         .tnp-subscription th {padding: 0px;}.search-results-header, .archive-header {background-color: #0c0c0c; border-bottom: 1px solid #3e3e3e; padding-left: 60px; padding-right: 0px; padding-top: 10px; padding-bottom: 10px;}.menu-position-top .main-content-w {background-color: #000000;border-bottom: 1px solid rgba(255,255,255,0.1);width: 100%;border-top: 0px;}.novid{padding-left: 60px;padding-right: 60px; margin-bottom:45px;}.novid22{margin-top: 40px;padding-left: 60px;padding-right: 60px;}.destaquecapa .g-col, .g-dyn {width: 33%;margin: 1px;}.novidades .g-col, .g-dyn {width: 49%;margin: 1px;}.destaqueS {float: right;width: 53%;}.novidades {width: 43.2%;padding-right: 1.5%;}.menu-position-top.menu-style-v2 .menu-block .os_menu > ul > li.menu-item-has-children > a:before{display:none;}.titulo{color: #FFFFFF;display: flex;align-items: center;justify-content: center;background-color:#0f0f0f;padding-top: 3px;padding-bottom: 3px;}.titulotop4{background-color:#0f0f0f;padding-top: 15px;padding-bottom: 15px;color: #FFFFFF;display: flex;align-items: center;justify-content: center;}.titulotop5{background-color:#b20e0e; color: #ffffff;display: flex;align-items: center;justify-content: center;font-style:;     font-size: 14px; padding: 2px;}.menu-position-top.menu-style-v2 .menu-block .os_menu > ul > li > a {text-transform: uppercase;}.destaqueG {display: flex;justify-content: center;margin-top: 0px;padding: 10px;width: 100%;}.destaqueG7 {display: grid;justify-content: center;margin-top: 10px;padding: 10px;background-color: #0f0f0f;border-bottom: 1px solid rgba(255,255,255,0.1);border-top: 1px solid rgba(255,255,255,0.1);width: 100%;}h4, .h4 {font-size: 16px;color: #d2d2d2;}h5, .h5 {font-size: 14px;color: #ff0000d1;}.top-sidebar-wrapper {text-align: center;padding-top: 0px;padding-bottom: 20px;}.menu-position-top .top-sidebar-wrapper {padding-top: 0px;}.portoads3{padding-bottom:10px;padding-right:5px;padding-left:5px;}.portoads7{padding-bottom:10px;padding-right:15px;padding-left:15px;}.home .top-sidebar-wrapper {padding-right: 0px;padding-left: 20px;}.sub-bar-i .bar-breadcrumbs, .sub-bar-i .bbp-breadcrumb {display: none;}.post-navigation-unique {display: none;}.page article.pluto-page-box, .single article.pluto-page-box, .index-fullwidth article.pluto-page-box {text-align: left;border: none;-webkit-box-shadow: 0px 8px 25px 3px rgba(14,15,23,0.3);box-shadow: 0px 8px 25px 3px rgba(14,15,23,0.3);background-color: #30384d;border-radius: 6px;max-width: 100%;-webkit-transition: all 0.2s ease;transition: all 0.2s ease;}.page article.pluto-page-box .post-title, .single article.pluto-page-box .post-title, .index-fullwidth article.pluto-page-box .post-title {display: none;}#container47{width: 100%;display:flex; }.topcard {width: 100%;background-color: #0f0f0f;padding: 1px;border-radius: 1px;}td, th {border: 0px solid #0f0f0f;text-align: left;padding: 5px;color: #efefef;}tr:nth-child(even) {background-color: #232222;}.left-div {margin:2px;background-color: #0f0f0f;float: left;width: 20%;}.page article.pluto-page-box .post-body, .single article.pluto-page-box .post-body, .index-fullwidth article.pluto-page-box .post-body {padding-top: 0px; padding-right: 0px; padding-left: 0px; padding-bottom: 10px; position: relative;}.galeria{float:left;}h3, .h3 {font-size: 16px;color: #ffffff;}.textocard{float:left;width: 100%;}.celu {	margin: 0 auto;color: #ffffff;font-weight: normal;font-size: 20px;text-align: center;margin-bottom:5px;width: 100%;}.sidebar-position-right .primary-sidebar-wrapper .primary-sidebar {border-left: none;border-radius: 0px 0px 0px 0px;background-color: #2b2b2b;}.primary-sidebar {background-color: #30384d;background-image: none;-webkit-box-shadow: 0px 3px 25px 3px rgba(14,15,23,0.3);box-shadow: 0px 3px 25px 3px rgba(14,15,23,0.3);padding: 30px 0px 50px;position: relative;color: #c9c9c9;}.gatadasemana {margin: 20px;}.page article.pluto-page-box .post-meta, .single article.pluto-page-box .post-meta, .index-fullwidth article.pluto-page-box .post-meta {display: none;}.descricao {margin: 20px;min-height: 300px;}.video_single {margin: 20px;}.comments-area {display: none;}.index-isotope.v3 article.pluto-post-box .post-content {display: none;}.index-isotope.v3 article.pluto-post-box .post-meta {display: none;}.index-isotope.v3 article.pluto-post-box:hover .post-top-share {display: none;}.page .figure-link:hover .figure-icon, .single .figure-link:hover .figure-icon, .index-isotope .figure-link:hover .figure-icon, .index-fullwidth .figure-link:hover .figure-icon {display: none;}.main-footer.with-social .footer-copy-and-menu-w {width: 100%;}#second{width: 100%;}
         @media (max-width: 1200px) {#second{margin-left:0px;}.nome {font-size: 20px !important;margin-left: 136px;padding-top: 14px;text-align: left !important; padding-bottom: 0px;}.iperfilgrakz {padding-left: 8px;}.celu {margin-left: 18px;}.textocard {padding-top: 3px;}.topcelu {float: left;}}@media (max-width:1418px) {.tnp-subscription {display: none;}}@media (max-width:1200px) {.sidebar-position-right .primary-sidebar-wrapper {display: none;}.rightsideinside{display: none;}.sbar{display: none;}}.topvideo {float: left; min-height: 467px; margin-top: 20px;margin-left: 5px;margin-right: 5px;padding: 10px;width: 100%;background-color: #272727;border-radius: 5px;}.topvideo2 {float: left; min-height: 600px; margin-top: 20px;margin-left: 5px;margin-right: 5px;padding: 10px;width: 100%;background-color: #272727;border-radius: 5px;}
         @media (max-width: 1200px) {.left-div {width:100%;}}.right-div {padding:5px;margin:2px;width: 60%;background-color: #1b1b1b;min-height: 720px;}.right-div2 {float: left;padding:5px; margin-left: 20px; margin-bottom: 10px;;width: 640px;background-color: #171717;min-height: 550px;}@media (max-width: 1200px) {.right-div {margin-left:0px ;width: 100%;}}@media (max-width: 1200px) {#container47{width: 100%;display:inline-block;}}
         .infocard2 {display: inline-block;width: 100%;padding: 1px;border-radius: 1px;background-color: #0f0f0f;border: 1px solid #383838;margin-top:40px;}
         @media (max-width: 1200px) {.dgrakz{display:none;}.iperfilgrakz {text-align:center;max-height: 96px;float: left;margin: 10px}}@media (min-width: 1200px) {.infocard2{display:none;}}@media (max-width: 1200px) {.left-div {padding-left: 0px;}}@media (max-width: 1200px){.topvideo {width:100%;margin-left: 0px;}.topvideo2 {width:100%;margin-left: 0px;}}
         @media (max-width: 700px){.topvideo2 {width:100%;margin-left: 0px;}}
         .index-isotope.v3 article.pluto-post-box .post-title a {color: #FFFFFF;}.index-isotope.v3 article.pluto-post-box .post-media-body + .post-content-body {text-align: center;padding-top: 5px;}.page h1.page-title {display: none;}.textao {margin: 20px;}.page article.pluto-page-box .post-content, .single article.pluto-page-box .post-content, .index-fullwidth article.pluto-page-box .post-content {color: #ffffff;}.novidades img:hover {-webkit-filter: brightness(70%);-webkit-transition: all 0.5s ease;-moz-transition: all 0.5s ease;-o-transition: all 0.5s ease;-ms-transition: all 0.5s ease;transition: all 0.5s ease;}.portoads2 img:hover {-webkit-filter: brightness(70%);-webkit-transition: all 0.5s ease;-moz-transition: all 0.5s ease;-o-transition: all 0.5s ease;-ms-transition: all 0.5s ease;transition: all 0.5s ease;}.sidebar-under-post {max-width: 100%;}.widget .widget-title {text-align: center;color: #d5d5d5;text-transform: uppercase;}.widget .widget-title:after {display: none;}@media (max-width: 991px) and (min-width: 10px){.page-fluid-width.no-sidebar.menu-position-top .index-isotope .item-isotope, .page-fluid-width.no-sidebar.menu-position-top .index-isotope article.featured-post, .page-fluid-width.no-sidebar.menu-position-top .featured-posts-slider-contents .item-isotope, .page-fluid-width.no-sidebar.menu-position-top .featured-posts-slider-contents article.featured-post {width: 49%;padding: 1%;}}@media (max-width: 1000px) {.novidades {display:none;}.destaqueS{width: 100%;}}.os-back-to-top:hover {background-color: #535353;background-position: center 7px;}.destaqueS {float: right;}@media (max-width: 2000px){.side-padded-content {padding-left: 60px;padding-right: 60px;}}@media (min-width: 1200px) {.infocard2{display:none;}}.index-isotope.v3 article.pluto-post-box {background-color: #232323;}.main-footer.color-scheme-dark {background-color: #000000;color: rgba(255,255,255,0.5);}.page article.pluto-page-box, .single article.pluto-page-box, .index-fullwidth article.pluto-page-box {background-color: #232323;}.not-wrapped-widgets .sidebar-under-post > .row {display: none;margin-left: 0px;margin-right: 0px;}.menu-position-top.menu-style-v2 .menu-block .logo {margin-right: 30px;margin-bottom: 0px;padding-left: 40px;}.nome{color:#f58623;font-size: 24px;font-style: italic;text-align: center;}.local{text-transform: uppercase;float: left;color:#d5d5d5;font-size: 16px;font-style: normal;padding-bottom: 3px;margin-left: 5px;}.celu{width: 200px;color: #d5d5d5;}.textocard{color:#d5d5d5;font-size: 12px;font-style: italic;padding-bottom: 3px;float: left;}.widget .widget-title {margin-bottom: 0px;}.menu-block .os_menu li a {color: #d2d2d2;outline: none;font-weight: 600;text-shadow: none;text-decoration: none;position: relative;display: block;}.menu-block .os_menu li a:hover {color: #ffffff;outline: none;font-weight: 600;text-shadow: none;text-decoration: none;position: relative;display: block;}.perfil{margin:5px;font-size: 16px;}.rightsideinside{font-size: 18px;margin: 2px;padding-top:2px;padding-bottom:2px;text-align:center;background-color: #b20e0e;width:100%;}.rightsideinside2{font-size: 18px;margin: 2px;padding-top:2px;padding-bottom:2px;text-align:left;background-color: #000000;width:100%;}.rightsideinside2 .g-single{width:100%;}.footersideinside .g-single{width:100%;}.footersideinside {display:inline-block;font-size: 18px;margin: 2px;padding-top:2px;padding-bottom:2px;text-align:center;background-color: #1b1b1b;width:100%;}.rightside{width:20%;margin-right: 4px;}.portoads4{margin:3px;}.destaquecapa{padding-left: 60px;padding-right: 60px;}
         .top4{padding-left: 0px;}.nome-modelo-destaque {background: #b20e0e none repeat scroll 0 0;bottom: 3px;box-sizing: border-box;max-width:100%;min-height:25px;padding: 6px 11px 8px;position: absolute;right: 3px;text-align: center;transition: all 0.2s linear 0s;-moz-transition: all 0.2s linear 0s;-webkit-transition: all 0.2s linear 0s;-o-transition: all 0.2s linear 0s;-ms-transition: all 0.2s linear 0s;vertical-align: middle;color: #ffffff;margin-right: 10px;font-style: tahoma;}.nome-modelo-destaque2 {background: #b20e0e none repeat scroll 0 0;bottom: 3px;box-sizing: border-box;max-width: 100%;min-height: 25px;padding: 6px 11px 8px;position: absolute;right: 3px;text-align: center;transition: all 0.2s linear 0s;-moz-transition: all 0.2s linear 0s;-webkit-transition: all 0.2s linear 0s;-o-transition: all 0.2s linear 0s;-ms-transition: all 0.2s linear 0s;vertical-align: middle;color: #ffffff;margin-right: 10px;font-style: italic;}.page-fluid-width.no-sidebar.menu-position-top .index-isotope .item-isotope, .page-fluid-width.no-sidebar.menu-position-top .index-isotope article.featured-post, .page-fluid-width.no-sidebar.menu-position-top .featured-posts-slider-contents .item-isotope, .page-fluid-width.no-sidebar.menu-position-top .featured-posts-slider-contents article.featured-post {width: 16.6%;}.index-isotope.v3 article.pluto-post-box .post-media-body {padding: 0px;}.index-isotope.v3 article.pluto-post-box .post-body .figure-link {border-radius: 0px;overflow: hidden;}.index-isotope.v3 article.pluto-post-box .post-body .figure-link figure {border-radius: 0px;}.page .figure-link .figure-shade, .single .figure-link .figure-shade, .index-isotope .figure-link .figure-shade, .index-fullwidth .figure-link .figure-shade {border-radius: 0px;}.index-isotope.v3 article.pluto-post-box .post-body .figure-link figure img {border-radius: 0px;}.index-isotope.v3 article.pluto-post-box .post-title a {color: #ffffff;}.index-isotope.v3 article.pluto-post-box .post-title a {font-weight: 400;font-style: italic;font-size: 14px;line-height: 32px;border-bottom: 1px solid transparent;-webkit-transition: all 0.2s ease;transition: all 0.2s ease;}.index-isotope.v3 article.pluto-post-box .post-media-body + .post-content-body {background-color: #b20e0e;}.index-isotope.v3 article.pluto-post-box .post-content-body {padding: 0px;}.index-isotope.v3 article.pluto-post-box {border: 0px solid #000;}.portoads4 img:hover {-webkit-filter: brightness(70%);-webkit-transition: all 0.5s ease;-moz-transition: all 0.5s ease;-o-transition: all 0.5s ease;-ms-transition: all 0.5s ease;transition: all 0.5s ease;}.menu-block .os_menu li.current-menu-item > a, .menu-block .os_menu li:hover > a {color: red;text-decoration: none;}.destaqueG2 {justify-content: center;margin-top: 10px;padding: 10px;background-color: #0f0f0f;border-bottom: 1px solid rgba(255,255,255,0.1);border-top: 1px solid rgba(255,255,255,0.1);}.padded-top {padding-top: 0px;}@media (max-width: 1072px) {.page-fluid-width.no-sidebar.menu-position-top .index-isotope .item-isotope, .page-fluid-width.no-sidebar.menu-position-top .index-isotope article.featured-post, .page-fluid-width.no-sidebar.menu-position-top .featured-posts-slider-contents .item-isotope, .page-fluid-width.no-sidebar.menu-position-top .featured-posts-slider-contents article.featured-post {width: 50%;}.right-div2 {padding:5px;margin:2px ;width: 100%;background-color: #171717;}.perfil{display:none;}.celu {font-size: 18px;width: 180px;}.side-padded-content {padding-left: 5px;padding-right: 5px;}.celu {margin-top: 0px;}.destaqueG7 {justify-content: center;margin-top: 10px;padding: 0px;background-color: #0f0f0f;border-bottom: 1px solid rgba(255,255,255,0.2);border-top: 1px solid rgba(255,255,255,0.2);width: 100%;}}.topv{vertical-align: top;}.menu-position-top.menu-style-v2 .menu-block .logo img {height: 34px;}@media (max-width: 1524px) and (min-width: 900px){.right-div2 {width: 580px; margin:8px}.portoads3{padding-bottom:10px;padding-right:5px;padding-left:5px;}.destaqueS {float: right;}}@media (min-width: 1700px) {.portoads3{padding-bottom:10px;padding-right:5px;padding-left:5px;}.menu-position-top.menu-style-v2 .menu-block .menu-inner-w {margin: 0 auto;max-width: 1460px;min-width: 990px;}.destaquecapa {padding-left: 60px;padding-right: 60px;}.side-padded-content {padding-left: 60px;padding-right: 60px;}}@media (max-width: 1400px) and (min-width: 900px){.portoads3{padding-bottom:10px;padding-right:5px;padding-left:5px;}.right-div2 {width: 540px;}}@media (max-width: 1360px) and (min-width: 10px){.portoads3{padding-bottom:10px;padding-right:5px;padding-left:5px;}.destaqueS {float: right;}.right-div2 {width: 500px;}}.menu-position-top .menu-block {background-color: #000000;border-bottom: 1px solid #414141;}.page article.pluto-page-box, .single article.pluto-page-box, .index-fullwidth article.pluto-page-box {margin: 10px auto 20px auto;}.mobile-menu > ul > li a {padding: 12px 20px;display: inline-block;position: relative;color: #FFFFFF;font-size: 18px;}.portoads4 img{width: 100%;}@media (max-width: 768px){.page-fluid-width.no-sidebar.menu-position-top .index-isotope.v1 .item-isotope, .page-fluid-width.no-sidebar.menu-position-top .index-isotope.v3 .item-isotope {padding: 5px 5px;float: left;}.destaqueS {float: right;}.portoads4 {margin: 0px;}.destaquecapa{display: none;}}.footerside{margin-top:30px;}@media (min-width: 768px){.footerside{display:none;}.footersideinside{	display:none;}.scrollclose {
         display:none;}
         .scrollclose img {
         width: 100% !important;
         }	.regatas{display:none;}
         }.d5 {padding-left: 60px;padding-right: 60px;}@media only screen and (max-width: 940px){.topvideo {min-height: 0px;}.g-col, .g-dyn, .g-single {width: 49%;margin: 1px;}.novid{padding-left: 0px;padding-right: 0px;}.novid22{padding-left: 0px;padding-right: 0px;}.videosin .g-col{width: 100%;}.right-div2 {width: 96%;}.nome-modelo-destaque {background: #b20e0e none repeat scroll 0 0;bottom: 3px;box-sizing: border-box;width: 100%;min-height: 25px;padding: 6px 11px 8px;position: static;right: 3px;text-align: center;transition: all 0.2s linear 0s;-moz-transition: all 0.2s linear 0s;-webkit-transition: all 0.2s linear 0s;-o-transition: all 0.2s linear 0s;-ms-transition: all 0.2s linear 0s;vertical-align: middle;color: #ffffff;margin-right: 0px;font-style: tahoma;}.d4{padding-left: 9px;}.d5 {padding-left: 9px;}.portoads7 {padding-bottom: 10px;padding-right: 0px;padding-left: 0px;}.search-results-header, .archive-header {padding-left: 0px;padding-right: 0px;padding-top: 10px;padding-bottom: 10px;}}@media only screen and (max-width: 330px){.nome {font-size: 14px;  text-align: left;}.celu {font-size: 14px;text-align: right;width: 160px;}.local {font-size: 14px;}.textocard {font-size: 10px;}}.novidfooter{float:left;}.contato {background-color: #232323;padding: 20px;margin: 10px;}.backgroundf {padding-top: 5px;margin-top: 20px;}.g-4 {max-width: 100%;}.main-search-form form .search-submit {background-color: #f58623;}.tab {position: relative;margin-bottom: 1px;width: 100%;color: #d5d5d5;overflow: hidden;}.tab input {position: absolute;opacity: 0;z-index: -1;}label {position: relative;display: block;padding: 0 0 0 5px;font-weight: bold;line-height: 3;cursor: pointer;}.blue label {background: #0c0c0c;}.tab-content {max-height: 0;overflow: hidden;background: #1abc9c;-webkit-transition: max-height .35s;-o-transition: max-height .35s;transition: max-height .35s;}.blue .tab-content {background: #272727;}.tab-content p {margin: 1em;}/* :checked */input:checked ~ .tab-content {max-height: 40em;}/* Icon */label::after {position: absolute;right: 0;top: 0;display: block;width: 3em;height: 3em;line-height: 3;text-align: center;-webkit-transition: all .35s;-o-transition: all .35s;transition: all .35s;}input[type=checkbox] + label::after {content: "+";}input[type=radio] + label::after {content: "+";}input[type=checkbox]:checked + label::after {transform: rotate(315deg);}input[type=radio]:checked + label::after {transform: rotate(315deg);}.menu-modelo-left > li > ul > li:last-child {height: 162px;}.owl-dots {display: none;}.destaqueG .destaqueS {padding-left: 4%;}.back7{background-color: #0f0f0f;padding: 16px;border-style: solid;border-width: 1px;border-color: #3c3c3c;margin-bottom: 20px;}.infocard {max-height:600px;}.wicon{ float: left; width: 20px; margin-top:4px; height:22px}.ms-inner-controls-cont{margin-top: 74px;} @media only screen and (max-width: 1190px) and (min-width: 882px)  {.right-div2 {width: 440px;}} .post-content img {width: 100%;}@media (min-width: 1650px){.largura_grakz {height: auto;margin: 0 auto;max-width: 1460px;min-width: 990px;position: relative;width: 100%;}} img.ms-thumb.lazyloaded  {width: 140px !important; height: 80px !important; margin-top: 0px !important; margin-left: 0px !important;}.topvideonews {float: left;min-height: 210px;margin-top: 20px;margin-left: 5px;margin-right: 5px;padding: 10px;width: 100%;background-color: #0f0f0f !important;border: 1px solid #333333;-webkit-box-shadow: 0px 9px 24px 0px rgb(0 0 0 / 12%);box-shadow: 0px 1px 14px 0px rgb(47 47 47);border-radius: 6px;margin-bottom: 20px;}
         @media (max-width: 1200px){.topvideonews{width:90% !important;margin-left: 20px !important;margin-right: 20px !important;margin-top: 40px !important;margin-bottom: 50px !important;}}
         #style-1::-webkit-scrollbar-track
         {
         -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
         border-radius: 10px;
         background-color: #F5F5F5;
         }
         #style-1::-webkit-scrollbar
         {
         width: 12px;
         background-color: #F5F5F5;
         }
         #style-1::-webkit-scrollbar-thumb
         {
         border-radius: 10px;
         -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
         background-color: #FF0000;
         }
         @media (max-width: 600px){
         .extras {display:block;}
         .gvideos{display:block;}
         .netletter{display:block;}
         }
         .video-wrapper {
         position: relative;
         display:inline;
         }
         .video-wrapper > video {
         width: 470px;
         }
         @media (max-width: 600px){
         .video-wrapper > video {
         width: 100%;
         }
         .local {
         font-size: 16px;
         }
         .telegram {
         display: table;
         margin: 0 auto;
         font-weight: bold;
         background: #2a2a2a;
         padding: 6px 0px 6px 16px;
         border-radius: 6px;
         width: 140px;
         float: left;
         }
         }
         .video-wrapper > video.has-media-controls-hidden::-webkit-media-controls {
         display: none ;
         }
         .video-overlay-play-button {
         box-sizing: border-box;
         width: 100%;
         height: 100%;
         padding: 10px calc(50% - 50px);
         position: absolute;
         top: 0;
         left: 0;
         display: block;
         opacity: 0.95;
         cursor: pointer;
         background-image: linear-gradient(transparent, #000);
         transition: opacity 150ms;
         }
         .video-overlay-play-button:hover {
         opacity: 1;
         }
         .video-overlay-play-button.is-hidden {
         display: none;
         }
         .gatag{text-align: center;}
         .portoads7 img {
         height: 70%;
         width: 70%;
         }
         .tnp-subscription input.tnp-submit {background-color: #252525;}
         .custom_acf_image_slider2 {
         max-width: 226px;
         margin: 0 auto;
         }
         .portoads47 {float: left;width: 48%;margin: 1%;min-height: 274px;}
         .portoads47 img {width: 100%;height: auto;}
         .footerwhats {background-color: rgb(37 37 37 / 50%);position: fixed;bottom: 0;left: 0;right: 0;height: 60px;z-index: 1;}
         ul.ulperfil2 {width: 100%;margin: 0 auto;padding-top: 10px;list-style-type: none;}
         .ulperfil2 li {float: left;margin-right: 30px;margin-top: 0px;background-color: #292929;border: 1px solid #696969;padding: 10px;border-radius: 10px;list-style-type: none;}
         @media (min-width: 600px){.footerwhats{display:none}}
         .gcenter {display: table;margin: 0 auto;}
         li#qa-7cfa3c {min-width: 84px;text-align: center;}
         .vertig {
         max-width: 360px;
         margin: 0 auto;
         }
         .gvideos, .extras, .netletter  {
         max-width: 660px;
         margin: 0 auto;
         }
         .scrollclose img {
         width: 100% !important;
         }
         .tnp-subscriptiongrakz input.tnp-submit {
         background-color: #101010;
         border-radius: 4px;
         min-height: 34px;
         padding-left: 10px;
         margin-left: 4px;
         color: #fff;
         border: 1px solid #333333;
         }
         .g-col {
         position: relative;
         float: left;
         }
         .menu-position-top.menu-style-v2 .menu-block .menu-inner-w {height: auto;margin: 0 auto;max-width: 1470px;min-width: 990px;position: relative;width: 100%;}
         .menu-position-top.menu-style-v2 .menu-block .os_menu .sub-menu li a {
         text-transform: uppercase;
         font-size: 14px;
         }
         .menu-position-top.menu-style-v2 .menu-block .os_menu > ul > li.menu-item-has-children > a {padding-left: 15px;}
         .menu-position-top.menu-style-v2 .menu-block .menu-search-form-w {margin-right: 40px;}
         .main-footer .menu li a {font-size: 14px;c;font-weight: 700;}
         .nslider {float: left;width: 100%;}
         .sy-pager li {
         width: 5px !important;
         height: 5px !important;
         }
         .sy-pager li.sy-active a {
         background-color: #e88024 !important;
         }
         .iperfilgrakz img {
         border-radius: 100%;
         max-width: 90px !important;
         }
         .iperfilgrakz {
         text-align:center;
         max-height: 96px;
         }
         .nivo-lightbox-wrap {
         position: absolute !important;
         top: 0% !important;
         bottom: 0% !important;
         left: 0% !important;
         right: 0% !important;
         }
         .nivo-lightbox-theme-default .nivo-lightbox-close {
         display: block;
         width: 50px;
         height: 30px;
         text-indent: -9999px;
         padding: 5px;
         opacity: inherit;
         margin: 10px;
         }
         #swipebox-close {
         margin-right: 40px;
         }
         .nivo-lightbox-theme-default.nivo-lightbox-overlay {
         background: #666;
         background: rgba(0,0,0,0.9);
         }
         .grrr {
         display: table;
         width: 100%;
         max-width: 1300px;
         margin: 0 auto;
         margin-bottom: 30px;
         }
         ul.ulgrakz2 {
         list-style-type: none;
         margin-top: 10px;
         }
         ul.ulgrakz {
         list-style-type: none;
         margin-top: 10px;
         }
         ul.ulgrakz3 {
         list-style-type: none;
         margin-top: 10px;
         }
         .modelosg {
         float: left;
         width: 22%;
         background: #1f1f1f;
         border: 2px solid #313131;
         padding: 10px;
         margin: 10px;
         min-height: 194px;
         border: 1px solid #333333;
         -webkit-box-shadow: 0px 9px 24px 0px rgba(0,0,0,0.12);
         box-shadow: 0px 1px 14px 0px rgb(47 47 47);
         border-radius: 6px;
         min-height: 214px;
         }
         .modelosg2 {
         float: left;
         width: 22%;
         background: #1f1f1f;
         padding: 10px;
         margin: 10px;
         border: 1px solid #333333;
         -webkit-box-shadow: 0px 9px 24px 0px rgba(0,0,0,0.12);
         box-shadow: 0px 1px 14px 0px rgb(47 47 47);
         border-radius: 6px;
         min-height: 215px;
         }
         .modelosg4 {
         float: left;
         width: 22%;
         background: #1f1f1f;
         padding: 10px;
         margin: 10px;
         border: 1px solid #333333;
         -webkit-box-shadow: 0px 9px 24px 0px rgba(0,0,0,0.12);
         box-shadow: 0px 1px 14px 0px rgb(47 47 47);
         border-radius: 6px;
         min-height: 215px;
         }
         .modelosg3 {
         float: left;
         width: 22%;
         background: #1f1f1f;
         padding: 10px;
         margin: 10px;
         border: 1px solid #333333;
         -webkit-box-shadow: 0px 9px 24px 0px rgba(0,0,0,0.12);
         box-shadow: 0px 1px 14px 0px rgb(47 47 47);
         border-radius: 6px;
         min-height: 194px;
         }
         ul.display-posts-listing {
         list-style-type: none;
         padding: 0px;
         }
         .tgrakz {
         background: #0c0c0c;
         padding: 5px;
         border-radius: 5px;
         color: #ffffff;
         font-weight: 600;
         border: 1px solid #333333;
         text-align:center;
         }
         .mbloco {
         margin-left: 24px;
         }
         @media (max-width:1250px){
         .modelosg {width: 100%;}
         .modelosg2 {width: 100%;}
         .modelosg3 {width: 100%;}
         .modelosg4 {width: 100%;}
         .mbloco {
         margin-left: 0px;
         }
         ul.ulgrakz2 {padding: 0;    text-align: center;}
         ul.ulgrakz3 {padding: 0;    text-align: center;}
         ul.ulgrakz {padding: 0;    text-align: center;}
         }
         }
         @media (max-width: 767px){
         .main-content-w .main-footer {
         }
         }
         .novidades_page {
         display: table;
         width: 100%;
         }
         .portoads48 {
         float: left;
         width: 18%;
         margin: 1%;
         margin-bottom: 20px;
         }
         @media (max-width: 1110px){
         .portoads48 {
         float: left;
         width: 48%;
         margin: 0.8%;
         margin-bottom: 10px;
         min-height:280px;
         }
         }
         .portoads71 {
         width: 19%;
         float: left;
         min-height: 280px;
         margin: 6px;
         }
         @media (max-width: 1340px){
         .portoads71 {
         width: 23%;
         float: left;
         min-height: 270px;
         margin: 11px;
         }
         }
         @media (max-width: 1240px){
         .portoads71 {
         width: 31%;
         float: left;
         min-height: 300px;
         margin: 11px;
         text-align: center;
         }}
         @media (max-width: 970px){
         .portoads71 {
         width: 49.5%;
         float: left;
         min-height: 244px;
         margin: 1px;
         text-align: center;
         }}
         .g-col.b-4.a-27 {float: left;width: 33%;min-height: 333px;}
         @media (max-width: 970px){
         .g-col.b-4.a-27 {width: 49%;margin: 1px;min-height: 200px;}}
         .g-col.b-6 {
         width: 100%;
         margin: 2px;
         float: none;
         }
         @media (max-width: 1072px){
         .g-col.b-6 {
         width: 100%;
         margin: 2px;
         float: none;
         }
         .menu-position-top.menu-style-v2 .menu-block .os_menu > ul > li > a {
         padding: 12px 7px;
         }
         }
         @media (min-width: 1072px){
         .g-col.b-6 {
         float: none;
         }
         }
         .nome2 {
         font-size: 18px;
         font-style: italic;
         text-align: left;float:left;
         margin-top: 20px;
         }
         .nome2 a{
         color: #f58623;}
         .celu2 {
         float: right;
         font-size: 18px;
         text-align: right;
         margin-top:20px;
         }
         .textocard2 {color: #d5d5d5;font-size: 12px;}
         .iperfilgrakz2 {
         text-align: left;
         max-height: 96px;
         float: left;
         margin:10px
         }
         .iperfilgrakz2 img {
         border-radius: 100%;
         max-width: 70px !important;
         }
         @media (max-width: 767px){
         .iperfilgrakz2 img {
         border-radius: 100%;
         max-width: 50px !important;
         }
         .celu2 {
         margin-top:10px;
         }
         .nome2 {
         margin-top: 10px;
         }
         }
         .top4 a {color: #cecece;text-decoration: none;}
         .top4 a:hover {color: #fff;}
         @media (min-width: 941px){
         .destaquecapa3 .g-col {
         width: 33%;
         }
         .novid {
         max-height: 154px;
         }
         .destaquesMobile {
         padding-left: 60px;
         margin-top:50px;
         }
         .g-col {
         width: 32%;
         }
         }
         .nivo-lightbox-theme-default .nivo-lightbox-nav {
         top: 42%;
         width: 8%;
         height: 18%;
         text-indent: -9999px;
         background-repeat: no-repeat;
         background-position: 50% 50%;
         opacity: 0.5;
         }
         .mobile-menu>ul>li a{
         font-size: 16px !important;
         }
         .mobile-menu > ul > li a:focus {
         color: #c5c5c5 !important;
         }
         .varipidhin ul.sub-menu {
         padding-left: 0px;
         margin-top: 10px;
         text-align: center;
         }
         @media (max-width: 520px){
         .portoads48 {
         min-height: 290px;
         }
         .portoads71 {
         width: 49%;
         float: left;
         min-height: 206px;
         margin: 1px;
         text-align: center;
         }
         .main-content-w .main-footer.with-social .footer-copy-and-menu-w .menu li {
         display: block;
         text-align: center;
         margin: 0 0 0 0;
         }.varipidhin ul.sub-menu {
         padding-left: 0px !important;
         }}
         ul.display-posts-listing {
         text-align: center;
         }
         ul.ulgrakz3 {
         padding-inline-start: 0px;
         }
         ul.ulgrakz {
         text-align: center;
         padding-inline-start: 0px;
         }
         .owl-carousel {z-index: 0;}
         .varipidhin ul.sub-menu {
         padding-inline-start: 0px;
         }
         .main-content-w .main-footer.with-social .footer-copy-and-menu-w .menu li {
         margin: 0 0 0 0;
         }
         .arve-embed-container video {width: 100%;}
         .info_container a {
         text-decoration: none;
         }
         .watchiframe .info_container {
         bottom: 24%;
         top: initial !important;
         }
         .conteudocerto {margin: 30px;}
         .portoads101 {
         width: 22%;
         float: left;
         margin-left: 1.5%;
         margin-right: 1.5%;
         margin-bottom: 1%;
         }
         a.custom_top_image_link2 {
         position:relative;
         display:block;
         display: inline-block;
         }
         .custom_top_image_link2 img{
         max-width:100%;
         height: auto;
         }
         .custom_top_image_page2 {
         margin: 0 auto;
         margin-bottom: 10px;
         padding-right: 10px;
         padding-left: 10px;
         float: left;
         width: 25%;
         box-sizing: border-box;
         text-align: center;
         }
         @media(max-width:900px){
         .custom_top_image_page2{
         width: initial;
         margin: 0 auto;
         margin-bottom: 20px;
         width: 50%;
         float: left;
         clear: none;}}
         .custom_top_image:nth-child(odd){clear: none;}
         .nome-modelo-destaque22 {
         background: #1b1b1b none repeat scroll 0 0;
         bottom: 3px;
         box-sizing: border-box;
         max-width: 100%;
         min-height: 25px;
         padding: 6px 11px 8px;
         position: absolute;
         text-align: center;
         transition: all 0.2s linear 0s;
         -moz-transition: all 0.2s linear 0s;
         -webkit-transition: all 0.2s linear 0s;
         -o-transition: all 0.2s linear 0s;
         -ms-transition: all 0.2s linear 0s;
         vertical-align: middle;
         color: #f58623;
         margin-right: 10px;
         }
         .despedida {text-align: center;background: #000000;}
         .descricao h1 {font-size: 16px;color: #f58623;}
         .page-fixed-width .index-isotope .item-isotope, .page-fixed-width .index-isotope article.featured-post, .page-fixed-width .featured-posts-slider-contents .item-isotope, .page-fixed-width .featured-posts-slider-contents article.featured-post, .page-fixed-width ul.products .item-isotope, .page-fixed-width ul.products article.featured-post {
         width: 16.6%;
         padding: 1%;
         }
         @media (max-width: 1072px) {
         .page-fixed-width .index-isotope .item-isotope, .page-fixed-width .index-isotope article.featured-post, .page-fixed-width .featured-posts-slider-contents .item-isotope, .page-fixed-width .featured-posts-slider-contents article.featured-post, .page-fixed-width ul.products .item-isotope, .page-fixed-width ul.products article.featured-post {
         width: 50%;
         padding: 1%;
         }
         }
         @media (min-width: 1475px){
         .paddalert {
         height: auto;
         margin: 0 auto;
         max-width: 1344px;
         min-width: 990px;
         position: relative;
         width: 100%;
         }}
         @media (max-width: 1475px){
         .paddalert {
         margin-left: 4%;
         margin-right: 4%;
         }}
         .paddalert h1 {font-size: 24px;}
         .back7 h2 {font-size: 24px;}
         .paddalert h1 {color: #fc9f34;font-weight: 500;}
         .conteudocerto h1 {color: #f58623;}
         .tnp-field.tnp-field-email {text-align: center;}
         @media (max-width: 600px){
         .portoads101 {
         width: 46%;
         float: left;
         margin: 1.5%;
         }
         .tnp-subscriptiongrakz input.tnp-submit {
         margin-top: 10px;
         }
         }
         .topvideonews h4 {background: #0c0c0c;padding: 5px;border-radius: 5px;color: #fc9c35;font-weight: 600;border: 1px solid #333333;text-align: center;}
         span.catecss a {
         color: #ffcc9e;
         font-weight: 600;
         }
         h1, .h1 {
         font-size: 24px;
         font-weight: 500;
         }
         td.maintd {
         color: #f9a236;
         font-weight: 600;
         font-size: 16px;
         }
         .paddalert h4 {
         text-align: center;
         font-weight: 500;
         background-color: #1f1f1f;
         padding: 5px;
         border: 1px solid #313131;
         }
         .infocard2 ul {
         margin-top: 10px;
         padding-left: 15px;
         }
         .tnp-field.tnp-field-email h6 {font-size: 16px;font-weight: 500;}
         .ori_custom_container_vimeos.kot2 {
         margin: 0 auto;
         display: table;
         }
         .right-div2 {
         border-radius: 10px;
         }
         @media (min-width: 600px){
         .wp-video {
         width: 100% !important;
         }
         }
         .top47 {
         text-align: center;
         font-size: 18px;
         }
         .titulotop57 {
         color: #ffffff;
         }
         .tnp-subscription {
         width: unset;
         margin: 0px;
         margin-left: 20px;
         }
         .tnp-subscription input[type=text], .tnp-subscription input[type=email], .tnp-subscription input[type=submit], .tnp-subscription select {
         height: 38px;
         color: #fff;
         background-color: #2f2f2f;
         margin-top: 2px
         }
         .tnp-subscription input[type=submit] {
         background-color: #464646;
         }
         .tnp-subscription input[type=email] {
         width: 240px;
         }
         .tnp-subscription div.tnp-field {
         margin-bottom: 0px;
         }
         .telegram {
         display: table;
         margin: 0 auto;
         font-weight: bold;
         background: #2a2a2a;
         padding: 6px 0px 6px 16px;
         border-radius: 6px;
         width: 140px;
         }
         .telegram img {
         max-height: 22px;
         margin-bottom: 3px !important;
         padding-right: 10px;
         }
         .spatele {
         margin-bottom: 10px;
         }
         body {  
         background-color:#000000;
         }




/* Style the tab */
.tab {
  overflow: hidden;  
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit; 
  border: none; 
  cursor: pointer; 
  transition: 0.3s;  
  width: 100%;
  height: 100%;
  color: white;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #0f0f0f;
  color: red;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #0f0f0f; 
  color: red;
}

 

 
      </style>
  <style>
      .heart {
      background: url(../account/img/like1.png);
      background-position: left;
      background-repeat: no-repeat;
      height: 87px;
      width: 87px;
      cursor: pointer;  
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
      grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr; 
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
      
      ::-webkit-scrollbar {
display: none;
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
   </head>
   <body data-rsssl=1 class="post-template-default single single-post postid-41611 single-format-standard _masterslider _ms_version_3.7.10 menu-position-top menu-style-v2 no-sidebar not-wrapped-widgets no-ads-on-smartphones no-ads-on-tablets with-infinite-scroll page-fixed-width with-transparent-menu"> 
      <div class="all-wrapper with-loading">
         <!-- DESKTOP TOP MENU  -->
      <?php include("inc/menu.php"); ?>
         <!-- # DESKTOP TOP MENU  --> 
         <div class="main-content-w">
            <div class="largura_grakz">
               <div class="main-content-m">
                  <div class="main-content-i">
                     <div class="../assets/content side-padded-content reading-mode-content">
                        
                        <style>
                           .main-content-w .main-content-i{
                           display:block;
                           }
                        </style>
                        <article  class="pluto-page-box" style="background-color:#0f0f0f; border-radius: 20px; border: 1px solid #292929;"> 
                           <div class="post-body" style="border-radius: 20px">
                              <div class="post-content entry-content"  style="border-radius: 20px">
                                
                                 <div id="container47"  style="border-radius: 20px">
                                    <div class="left-div"  style="border-radius: 20px;"> 
   <table style="width: 100%;  border-radius:20px 0px 0px 20px;">
 
      <tr>
          <td>
              <table style="width:100%;  border-bottom:1px solid #3d3d3d;">
                  <tr>
                  <td style="width: 100%; text-align:center;">  
                 <img src="../account/files/profile/<?php echo $user_info['profile_photo'];?>" style="border: 2px solid red; object-fit: cover; border-radius:50%;  width: 150px; height: 150px;"> 
               <br>
               <div style="margin-top:-20px;">
                              <font color="gold" size="2px">Exclusiva</font>
                              </div>
                              
                              <div style="margin-top:-12px; ">
                                <?php echo  $user_info['firstname'].' '.$user_info['lastname']; 
                      
                                          if($user_info['perfil_verificado']=='SIM'){?>
                                       <img src="../account/img/verificada.png" style="height:20px; width:20px; margin-top:12px;"></img> 
                                       <?php } ?>
                                  
                              </div>
                              <table width="100%" >
                              <tr>
                                 <td width="50%" style="font-size:12px; text-align:center;">  
                               <?php echo $user_info['bio'];?>
                                    </td>  
                              </tr>
                              <tr>
                                 <td width="50%" style="font-size:12px; text-align:center; background-color:#0f0f0f;">  
                               <a href="" data-toggle="modal" data-target="#contatos"  class="btn btn-sm rounded text-danger" style="border-radius:10px;width:100%;  background-color: #0e5e00;  color: white;font-size:16px;"><i class="fa fa-comments" ></i> ENTRAR EM CONTATO</a>
                                    </td>  
                              </tr>
                           </table>    
                </td> 
                </tr>
                             
                           </table>   
                           <h3>Sobre mim:</h3>
                           <small style="font-size:12px;"><?php echo  $user_info['sobre'];?></small> 
                           <br><br>
                           <table style="width:100%">
                              <tr>
                                 <td style="width:5%"><font size="2px"><i class="fa fa-home"></i> </font> </td>
                                 <td style="width:95%"><font size="2px"> <?php echo  $user_info['nacionalidade'];?></font> </td>
                              </tr>
                              <tr>
                                 <td style="width:5%"><font size="2px"><i class="fa fa-language"></i> </font> </td>
                                 <td style="width:95%"><font size="2px"> <?php echo  $user_info['idiomas'];?></font> </td>
                              </tr>
                              <tr>
                                 <td style="width:5%"><font size="2px"><i class="fa fa-map-marker"></i> </font> </td>
                                 <td style="width:95%"><font size="2px"> <?php echo  $user_info['localizacao'];?></font> </td>
                              </tr>
                                 <tr>
                                 <td style="width:5%"><font size="2px"><i class="fa fa-fire"></i> </font> </td>
                                 <td style="width:95%"><font size="2px"> <?php echo  $idade;?></font> </td>
                              </tr>
                              <tr>
                                 <td style="width:5%"><font size="2px"><i class="fa fa-dollar"></i> </font> </td>
                                 <td style="width:95%"><font size="2px"> <?php echo  $user_info['cache'];?></font> </td>
                              </tr>
                           </table> 
                           <h3>Categorias:</h3>
                           <small>
                           <?php 
                           if($user_info['dominatrix']=='SIM'){
                               echo'Dominatrix, ';
                           }
                           if($user_info['massagem_tantrica']=='SIM'){
                               echo'Massagem tantrica, ';
                           }
                           if($user_info['tatuadas']=='SIM'){
                               echo'Tatuadas, ';
                           }
                           if($user_info['suggar_baby']=='SIM'){
                               echo'Suggar baby, ';
                           } 
                           if($user_info['menage']=='SIM'){
                               echo'Menage, ';
                           }
                           if($user_info['desp_solteiro']=='SIM'){
                               echo'Despedida de solteiro, ';
                           }
                         
                           
                           ?></small> 
                           <br><br>
                           <div style="border-bottom:1px solid #3d3d3d;"></div>
                           <br>
                           <small style="font-size:12px;  "> 
                           <?php if($user_info['perfil_verificado'] == "SIM"){?>
                           Perfil verificado! Garantimos a autenticidade de todos os dados informados.
                           <?php }else{
                              ?>
                           Este perfil ainda não foi verificado...
                           <?php
                              }?>
                           </small><br>
          </td>
      </tr>
   </table>
   
   
   
   
   
   
   
   
 
                                        
                                    </div>
                                     
                                    <div class="right-div" style="    background-color: #0f0f0f;  border-left: 1px solid #292929; border-right: 1px solid #292929; margin-top: 0px;">
                                       <div class="nslider">
                                     
                                       <div id="Fotos" class="tabcontent1"> 
                                          <div class="rl-gallery-container rl-loading" id="rl-gallery-container-1" data-gallery_id="62124">
                                             <div class="rl-gallery rl-basicmasonry-gallery " id="rl-gallery-1" data-gallery_no="1">
                                                <div class="rl-gutter-sizer"></div>
                                                <div class="rl-grid-sizer"></div>
                             <div class="rl-gallery-item" >    <main class="main" >                  
                                                  <?php 
                              $regUserId = $user_info['id']; 
                              $sql = "SELECT * FROM fotos_videos WHERE id_user = '$regUserId' AND tipo = 'FP' AND status = 'VISIBLE' "; 
                              $result = $db->prepare($sql);
                              $result->execute();
                              while ($row = $result->fetch()) { ?>
            
                          
                                                   <figure class="figure" >
                                                      <a href="../account/files/midia/<?php echo $row['file_path'];?>" title="" data-rl_title="" class="rl-gallery-link" data-rl_caption="" data-rel="lightbox-gallery-1">
                                                         <img src="../account/files/midia/<?php echo $row['file_path'];?>"  class="figure-img" style="object-fit: cover;     height: 100%;"/>
                                                        </a>
                                                   </figure>
                                                   
                                               
                           <?php }  ?>
                                                 </main>  
                                                 </div>
                                               
                                             </div>
                                          </div>
                                          <center> CONTEÚDO EXTRA </center>
                                          <div class="rl-gallery-container rl-loading" id="rl-gallery-container-1" data-gallery_id="62124">
                                             <div class="rl-gallery rl-basicmasonry-gallery " id="rl-gallery-1" data-gallery_no="1">
                                                <div class="rl-gutter-sizer"></div>
                                                <div class="rl-grid-sizer"></div>
                                              <div class="rl-gallery-item" >    <main class="main" >                  
                                                  <?php 
                              $regUserId = $user_info['id']; 
                              $sql = "SELECT * FROM fotos_videos WHERE id_user = '$regUserId' AND tipo = 'FA' AND status = 'VISIBLE' "; 
                              $result = $db->prepare($sql);
                              $result->execute();
                              while ($row = $result->fetch()) { ?>
            
                          
                                                   <figure class="figure" >
                                                      <a href="../account/files/midia/<?php echo $row['file_path'];?>" title="" data-rl_title="" class="rl-gallery-link" data-rl_caption="" data-rel="lightbox-gallery-1">
                                                         <img src="../account/files/midia/<?php echo $row['file_path'];?>"  class="figure-img" style="object-fit: cover;     height: 100%;"/>
                                                        </a>
                                                   </figure>
                                                   
                                               
                           <?php }  ?>
                                                 </main>  
                                                 </div>
                                        
                                            
                                               
                                             </div>
                                          </div>
                                       </div>
                                       <div id="Videos" class="tabcontent1"> 
                                       
                                                 
                                                
                                       </div>
                                       



                                       </div>
                                       <div class="scrollm">
                                       </div>
                                    </div>
                                    <div class="rightside" style="">
                   <div class="top4"><a href=""><center>VEJA TAMBÉM</center></a></div>               	      
                <?php
                     $im=0;
                     foreach($consultaUsers_Top4M as $top4M){
                     $id = $top4M['id'];
                     $consultaFotoTop4M = $pdo->query("SELECT * FROM fotos_videos WHERE id_user = '$id' and tamanho = 'VERTICAL' ORDER BY RAND() LIMIT 1");
                     foreach($consultaFotoTop4M as $cm){    
                         if($im==2) break;  
                         $im++;  
                      ?> 
                      
                      
               <div class="rightsideinside" style="background-color: #0f0f0f;"> 
               
				<style>.custom_acf_image_link img{max-width:100% !important}</style>
				<div class="portoads7">
				    <div class="custom_acf_image">
				        <a href="<?php echo '../perfil/'.$top4M['username']; ?>" class="custom_acf_image_link">
				            <img width="226" height="300" src="<?php echo '../account/files/midia/'.$cm['file_path']; ?>" style="object-fit: cover;     height: 100%; border-radius:10px;" class="attachment-medium size-medium entered lazyloaded" alt="" title="" data-lazy-src="<?php echo '../account/files/midia/'.$cm['file_path']; ?>" data-ll-status="loaded">
				             </a>
				                <div class="titulotop57"><?=$top4M['firstname']." ". $top4M['lastname'];?></div>
				    </div>
				</div>				
			   </div>
                       
                  <?php  }} ?>
                  
                  
				
  

				</div>
                                 
                                 </div>
                                
                              </div> 
                              <!-- orionk hide ends  -->						
                           </div>
                     </div>
                      
                     </article>
                  </div>
               </div>
               
               <div class="sidebar-under-post">
               </div>
            </div>
            <div class="footerwhats"><div class="gcenter">	<ul class="ulperfil2">
												
					<li id="qa-61f2a0" class="">
					
					

								 <a target="_blank" class="w105625" href="http://api.whatsapp.com/send?phone=55000000000" rel="nofollow">
    	<img src="../assets/content/uploads/img/whatsicon2.png" data-lazy-src="../assets/content/uploads/img/whatsicon2.png" data-ll-status="loaded" class="entered lazyloaded"><noscript><img src="../assets/content/uploads/img/whatsicon2.png"></noscript>    	<span style="color:#1ead12">Whatsapp</span>
    </a>
									
    
</li>	



					
																			
										
															
</ul></div></div>
            <div class="main-footer with-social color-scheme-dark">
               <div class="footer-copy-and-menu-w"> 
                  <div class="footer-copyright">
                     <div style="float:left">© Copyright 2022 - Nosso Love </div>
                  </div>
               </div>
             </div>
      </div>
      <!-- ketu2 -->
      </div>
       <div class="modal fade" id="contatos" role="dialog">
    <div class="modal-dialog">  
      <div class="modal-content" style="margin-top:35%; background-color:#111111; color:white; border-radius: 30px;"> 
        <div class="modal-body" style="margin-bottom: -40px;"> 
       <table style="width:100%;">
           <tr>
               <td><center><img src="../assets/imagens/logo/ICONE VERMELHO.png" height="26px"></center></td>
           </tr>
       </table><br> 
      <p style=" text-align: center; line-height: 1.0;">
        
        <table style="width:100%">
            <tr>
                <td style="width:50%">
                   <center>  <a href="https://api.whatsapp.com/send?phone=+55<?php echo $user_info['whatsapp'].'&text=Oii%2C%20vi%20seu%20anuncio%20no%20site%20NossoLove.'?>" class="btn btn-sm red p-x-md" style="padding:0px; height:30px; width:120px; border-radius: 15px;background-color:#3e8718;" >
                                     <table style="width:100%">
                                         <tr>
                                             <td>
                                                <i class="fa fa-whatsapp" aria-hidden="true" style="font-size:19px;"></i>  
                                             </td>
                                             <td>
                                                <span style="font-size:12px;">   WHATSAPP </span> 
                                             </td>
                                         </tr>
                                     </table>
                                    </a><br>
                                   <small>chame sem adicionar<br> <?php echo $user_info['whatsapp'] ?></small></center>
                </td>
                <td style="width:50%">
                   <center>  
                   <a href="tel:+55<?php echo $user_info['telefone'];?>" class="btn btn-sm red p-x-md" style="padding:0px;height:30px; width:120px; border-radius: 15px;background-color:#035eff;" >
                                     <table style="width:100%">
                                         <tr>
                                             <td >
                                                <i class="fa fa-phone" aria-hidden="true" style="font-size:19px;"></i>  
                                             </td>
                                             <td>
                                                <span style="font-size:12px;">    LIGAR </span> 
                                             </td>
                                         </tr>
                                     </table>
                                    </a><br>
                                   <small>Ligue sem adicionar<br> <?php echo $user_info['telefone'] ?></small></center>
                </td>
            </tr>
        </table>
        <table style="width:100%;">
           <tr>
               <td><br><center>
                   
          <?php if($user_info['perfil_verificado'] == "SIM"){ ?>
                       <div class="pos-rlt" style="margin-top: ; margin-left:;   " ><font color="white" size="2px">Modelo  Verificada </font><font color="#509ae9" size="5px"> <img src="../account/img/verificada.png" height="15px" style="margin-top:4px ; "></img></font>   </div> 
          
         <?php }else{ ?>
               <center>Essa modelo ainda não foi verificada.</center>
         <?php } ?>
                   
               </center></td>
           </tr>
       </table>
         
        
      </p><br>
       
        </div> 
      </div>
      
    </div>
  </div>
    <!-- contato -->
  <div class="modal fade" id="modal-contato" role="dialog">
    <div class="modal-dialog">  
      <div class="modal-content" style="margin-top:35%; background-color:#111111; color:white; border: 3px solid #ffffff69;"> 
        <div class="modal-body"> 
       <table style="width:100%;">
           <tr>
               <td><center><img src="../assets/imagens/logo/COR.png" height="36px"></center></td>
           </tr>
       </table><br>
       <table >
           <tr>
               <td>Para entrar em contato com a administração do site utilize os canais abaixo: </td>
           </tr>
       </table>
       
        <table >
           <tr>
               <td ><img src="../assets/imagens/whats.png" height="36px"></td>
               <td > (00) 0 0000-0000 </td>
           </tr>
       </table>
        <table >
            <tr>
               <td><img src="../assets/imagens/email.png" height="36px"></td>
               <td> contato@nossolove.com </td>
           </tr>
       </table>
       
        <hr>
        Se você deseja contratar uma acompanhante, entre em contato diretamente pelo número de telefone que consta no perfil da modelo de sua preferência.  NOSSOLOVE não é uma agência e sim um site adulto de classificados, dessa forma, não intermediamos a negociação entre usuários e anunciantes, toda e qualquer informação sobre serviços, horários e valores são obtidos com cada garota individualmente.
        
        
        </div> 
      </div>
      
    </div>
  </div>
      <a href="#" class="os-back-to-top"></a>
      <div class="display-type"></div>
      <div class="main-search-form-overlay"></div>
        
 
    
        <script>
           document.getElementById("tabid1").click(); 
         function openCity(evt, cityName) {
           var i, tabcontent1, tablinks;
           tabcontent1 = document.getElementsByClassName("tabcontent1");
           for (i = 0; i < tabcontent1.length; i++) {
             tabcontent1[i].style.display = "none";
           }
           tablinks = document.getElementsByClassName("tablinks");
           for (i = 0; i < tablinks.length; i++) {
             tablinks[i].className = tablinks[i].className.replace(" active", "");
           }
           document.getElementById(cityName).style.display = "block";
           document.getElementById("tabid1").className = " ";
           document.getElementById("tabid2").className = " ";
           document.getElementById("tabid3").className = " ";
           evt.currentTarget.className += "active";

         }
         
         
         </script>
      <script type='text/javascript' id='rocket-browser-checker-js-after'>
         "use strict";var _createClass=function(){function defineProperties(target,props){for(var i=0;i<props.length;i++){var descriptor=props[i];descriptor.enumerable=descriptor.enumerable||!1,descriptor.configurable=!0,"value"in descriptor&&(descriptor.writable=!0),Object.defineProperty(target,descriptor.key,descriptor)}}return function(Constructor,protoProps,staticProps){return protoProps&&defineProperties(Constructor.prototype,protoProps),staticProps&&defineProperties(Constructor,staticProps),Constructor}}();function _classCallCheck(instance,Constructor){if(!(instance instanceof Constructor))throw new TypeError("Cannot call a class as a function")}var RocketBrowserCompatibilityChecker=function(){function RocketBrowserCompatibilityChecker(options){_classCallCheck(this,RocketBrowserCompatibilityChecker),this.passiveSupported=!1,this._checkPassiveOption(this),this.options=!!this.passiveSupported&&options}return _createClass(RocketBrowserCompatibilityChecker,[{key:"_checkPassiveOption",value:function(self){try{var options={get passive(){return!(self.passiveSupported=!0)}};window.addEventListener("test",null,options),window.removeEventListener("test",null,options)}catch(err){self.passiveSupported=!1}}},{key:"initRequestIdleCallback",value:function(){!1 in window&&(window.requestIdleCallback=function(cb){var start=Date.now();return setTimeout(function(){cb({didTimeout:!1,timeRemaining:function(){return Math.max(0,50-(Date.now()-start))}})},1)}),!1 in window&&(window.cancelIdleCallback=function(id){return clearTimeout(id)})}},{key:"isDataSaverModeOn",value:function(){return"connection"in navigator&&!0===navigator.connection.saveData}},{key:"supportsLinkPrefetch",value:function(){var elem=document.createElement("link");return elem.relList&&elem.relList.supports&&elem.relList.supports("prefetch")&&window.IntersectionObserver&&"isIntersecting"in IntersectionObserverEntry.prototype}},{key:"isSlowConnection",value:function(){return"connection"in navigator&&"effectiveType"in navigator.connection&&("2g"===navigator.connection.effectiveType||"slow-2g"===navigator.connection.effectiveType)}}]),RocketBrowserCompatibilityChecker}();
      </script>
      <script type='text/javascript' id='rocket-preload-links-js-extra'>
         /* <![CDATA[ */
         var RocketPreloadLinksConfig = {"excludeUris":"\/novidades\/|\/gatas-do-dia\/|\/(.+\/)?feed\/?.+\/?|\/(?:.+\/)?embed\/|\/(index\\.php\/)?wp\\-json(\/.*|$)|\/wp-admin\/|\/logout\/|\/wp-login.php","usesTrailingSlash":"1","imageExt":"jpg|jpeg|gif|png|tiff|bmp|webp|avif","fileExt":"jpg|jpeg|gif|png|tiff|bmp|webp|avif|php|pdf|html|htm","siteUrl":"https:\/\/Nosso Love.com.br","onHoverDelay":"100","rateThrottle":"3"};
         /* ]]> */
      </script>
      <script type='text/javascript' id='rocket-preload-links-js-after'>
         (function() {
         "use strict";var r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},e=function(){function i(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(e,t,n){return t&&i(e.prototype,t),n&&i(e,n),e}}();function i(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}var t=function(){function n(e,t){i(this,n),this.browser=e,this.config=t,this.options=this.browser.options,this.prefetched=new Set,this.eventTime=null,this.threshold=1111,this.numOnHover=0}return e(n,[{key:"init",value:function(){!this.browser.supportsLinkPrefetch()||this.browser.isDataSaverModeOn()||this.browser.isSlowConnection()||(this.regex={excludeUris:RegExp(this.config.excludeUris,"i"),images:RegExp(".("+this.config.imageExt+")$","i"),fileExt:RegExp(".("+this.config.fileExt+")$","i")},this._initListeners(this))}},{key:"_initListeners",value:function(e){-1<this.config.onHoverDelay&&document.addEventListener("mouseover",e.listener.bind(e),e.listenerOptions),document.addEventListener("mousedown",e.listener.bind(e),e.listenerOptions),document.addEventListener("touchstart",e.listener.bind(e),e.listenerOptions)}},{key:"listener",value:function(e){var t=e.target.closest("a"),n=this._prepareUrl(t);if(null!==n)switch(e.type){case"mousedown":case"touchstart":this._addPrefetchLink(n);break;case"mouseover":this._earlyPrefetch(t,n,"mouseout")}}},{key:"_earlyPrefetch",value:function(t,e,n){var i=this,r=setTimeout(function(){if(r=null,0===i.numOnHover)setTimeout(function(){return i.numOnHover=0},1e3);else if(i.numOnHover>i.config.rateThrottle)return;i.numOnHover++,i._addPrefetchLink(e)},this.config.onHoverDelay);t.addEventListener(n,function e(){t.removeEventListener(n,e,{passive:!0}),null!==r&&(clearTimeout(r),r=null)},{passive:!0})}},{key:"_addPrefetchLink",value:function(i){return this.prefetched.add(i.href),new Promise(function(e,t){var n=document.createElement("link");n.rel="prefetch",n.href=i.href,n.onload=e,n.onerror=t,document.head.appendChild(n)}).catch(function(){})}},{key:"_prepareUrl",value:function(e){if(null===e||"object"!==(void 0===e?"undefined":r(e))||!1 in e||-1===["http:","https:"].indexOf(e.protocol))return null;var t=e.href.substring(0,this.config.siteUrl.length),n=this._getPathname(e.href,t),i={original:e.href,protocol:e.protocol,origin:t,pathname:n,href:t+n};return this._isLinkOk(i)?i:null}},{key:"_getPathname",value:function(e,t){var n=t?e.substring(this.config.siteUrl.length):e;return n.startsWith("index.php")||(n="/"+n),this._shouldAddTrailingSlash(n)?n+"/":n}},{key:"_shouldAddTrailingSlash",value:function(e){return this.config.usesTrailingSlash&&!e.endsWith("index.php")&&!this.regex.fileExt.test(e)}},{key:"_isLinkOk",value:function(e){return null!==e&&"object"===(void 0===e?"undefined":r(e))&&(!this.prefetched.has(e.href)&&e.origin===this.config.siteUrl&&-1===e.href.indexOf("?")&&-1===e.href.indexOf("#")&&!this.regex.excludeUris.test(e.href)&&!this.regex.images.test(e.href))}}],[{key:"run",value:function(){"undefined"!=typeof RocketPreloadLinksConfig&&new n(new RocketBrowserCompatibilityChecker({capture:!0,passive:!0}),RocketPreloadLinksConfig).init()}}]),n}();t.run();
         }());
      </script>
      <script>window.lazyLoadOptions={elements_selector:"img[data-lazy-src],.rocket-lazyload,iframe[data-lazy-src]",data_src:"lazy-src",data_srcset:"lazy-srcset",data_sizes:"lazy-sizes",class_loading:"lazyloading",class_loaded:"lazyloaded",threshold:300,callback_loaded:function(element){if(element.tagName==="IFRAME"&&element.dataset.rocketLazyload=="fitvidscompatible"){if(element.classList.contains("lazyloaded")){if(typeof window.jQuery!="undefined"){if(jQuery.fn.fitVids){jQuery(element).parent().fitVids()}}}}}};window.addEventListener('LazyLoad::Initialized',function(e){var lazyLoadInstance=e.detail.instance;if(window.MutationObserver){var observer=new MutationObserver(function(mutations){var image_count=0;var iframe_count=0;var rocketlazy_count=0;mutations.forEach(function(mutation){for(i=0;i<mutation.addedNodes.length;i++){if(typeof mutation.addedNodes[i].getElementsByTagName!=='function'){continue}
         if(typeof mutation.addedNodes[i].getElementsByClassName!=='function'){continue}
         images=mutation.addedNodes[i].getElementsByTagName('img');is_image=mutation.addedNodes[i].tagName=="IMG";iframes=mutation.addedNodes[i].getElementsByTagName('iframe');is_iframe=mutation.addedNodes[i].tagName=="IFRAME";rocket_lazy=mutation.addedNodes[i].getElementsByClassName('rocket-lazyload');image_count+=images.length;iframe_count+=iframes.length;rocketlazy_count+=rocket_lazy.length;if(is_image){image_count+=1}
         if(is_iframe){iframe_count+=1}}});if(image_count>0||iframe_count>0||rocketlazy_count>0){lazyLoadInstance.update()}});var b=document.getElementsByTagName("body")[0];var config={childList:!0,subtree:!0};observer.observe(b,config)}},!1)
      </script><script data-no-minify="1" async src="../assets/content/plugins/wp-rocket/assets/js/lazyload/16.1/lazyload.min.js"></script><script src="../assets/content/cache/min/1/989f9c377ffaa11e7786bf75798ba2ee.js" data-minify="1" defer></script>
   
 
      </body> 
</html>
 
        
   <?php } ?>
