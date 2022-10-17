<?php
   include("includes/controller.php");
   require 'vendor/autoload.php';
    $pagename = 'pagamentos';
   require_once 'MobileDetect/Mobile_Detect.php';
   $detect = new Mobile_Detect;
   date_default_timezone_set('America/Sao_Paulo');

   if(!$session->logged_in){ 
       header("Location: login.php"); 
       
   } 
   else{
   
         if ( $detect->isMobile() ){ 
                }else{
                header("Location: account.php");
                }
                
       $user_info = $functions->getUserInfo($session->username);
            $regUserId = $user_info['id'];
            $DB_USERS_grupo = $user_info['grupo'];
            $DB_USERS_nome = $user_info['firstname'] . ' ' . $user_info['lastname'];
            include_once("includes/uFunctions.php");
            $total_users = $adminfunctions->totalUsers();
            $regUserPays = $user_info['username'];
            $consultaPagamentos = $db->query("SELECT * FROM paymets WHERE id_user = '$regUserPays' ORDER BY id DESC LIMIT 10");
            $form = new Form;
            
            if($user_info['grupo'] == 'DEVELOPER' or $user_info['grupo'] =='ADMIN'){
                header("Location: admin.php");
             } 
    
    
    $regUserId = $user_info['id'];
  

  include_once("includes/uFunctions.php");
   
   ?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8" />
      <title>NOSSO LOVE</title>
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
      <link rel="stylesheet" href="css/style_galeria.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   </head>
    
   <body class="pace-done grey"  style="background-color:#0d0d0d;">
      <div class="app" id="app">
      <!-- ############ LAYOUT START-->
    
      <!-- content -->
      <div id="content" class="app-content box-shadow-z0" role="main">
       <div class="app-header white box-shadow" style="background-color: #000000;">
                                <div class="navbar">
                                   <!-- Open side - Naviation on mobile -->
                                    <a href="account.php"  class="navbar-item pull-left hidden-lg-up">
               <font size="4px;"><i class="fa fa-reply"  style="margin-top:25px; margin-left:3px; line-height: 1.0;"></i></font>
               </a>  
                                   <!-- Page title - Bind to $state's title -->
                                   <div class="navbar-item h7" ng-bind="$state.current.data.title" id="pageTitle"
                        style="line-height:15px">
                        <center>
                            <a href="../index.php">
                                <img src="img/COR.png" alt="." style="margin-top:8px; margin-left:-24px; height:45px "
                                    class="logoMobile" style=""><br>
                                <font size="2" color="gray"
                                    style="font-family: Abhaya Libre Regular; margin-left:-24px;">As melhores
                                    acompanhantes de luxo</font>
                            </a>
                        </center>
                    </div>
                                   <ul class="nav navbar-nav pull-right" style="margin-top:-54px">
                        <a data-toggle="modal" data-target="#logoutAccount">
                            <font size="5px"><i class="fa fa-power-off"></i></font>
                        </a>
                    </ul>
                                </div>
                             </div>
      <div ui-view class="app-body" id="view">
         <!-- ############ PAGE START-->
         <div class="padding">   
    <div class="row">
     <br>
     <div class="box">    
    <div class="box-header"style="text-align:center;" >
         
          <h4>ASSINATURAS</h4> 
        </div>
                    
                    <?php if($user_info['plano'] == ''){ ?>
                    Você ainda não possui nenhuma assinatura ativa, para que seu perfil seja exibido em buscas ou divulgado em nosso site é necessário assinar um de nosso planos. <br><br> 
                   <? }else{ ?>
                   
                
     <table class="table table-striped b-t" style="background-color: #1f1f1fc2; border:1px solid #111111;font-size:10px; width:99%;">
          <thead>
            <tr style="border:1px solid #111111;">    
                 <th  style="border:1px solid #111111;"><font color="#981d1d"><center>ATIVA</center></font></th>  
                 <th  style="border:1px solid #111111;"><font color="#981d1d"><center>EXPIRA</center></font></th> 
                  <th  style="border:1px solid #111111;"><font color="#981d1d"><center>OPÇÕES</center></font></th>
            </tr>
          </thead>
          <tbody> 
          <tr >   
                <td style="border:1px solid #111111;">
                    <?php
                    if ($user_info['plano'] == "1"){?>
                        <button class="btn btn-sm  " style="width:100%; padding:2px;font-size:11px; border-radius:2px; color:white; background-color:#da9100; font-size:11px; cursor:default"> 
                        BÁSICO <br>
                     R$ 97,99 / semana
                    <?php   
                    } 
                    if ($user_info['plano'] == "2"){?>
                     <button class="btn btn-sm  " style="width:100%; padding:2px;font-size:11px; border-radius:2px; color:white; background-color:#c01bb9; font-size:11px;  cursor:default"> 
                      PREMIUM  <br>
                     R$ 197,99 / semana
                     </button>
                    <?php
                    } 
                    if ($user_info['plano'] == "3"){?>
                        <button class="btn btn-sm  " style="width:100%; padding:2px;font-size:11px; border-radius:2px; color:white; background-color:red; font-size:11px; cursor:default"> 
                        TOP MODEL<br>
                     R$ 297,99 / semana
                    <?php  
                        
                    }
                    ?>
                    
                 
                     </td> 
                <td style="border:1px solid #111111;"> <center><?php echo Tempo($user_info['time_plan']); ?></center> </td> 
                <td style="border:1px solid #111111;"> 
                <?php if ($user_info['assinatura_ativa'] == "SIM"){?>
                <a href="?assinST=NAO"
                                                                        class="btn btn-sm rounded text-red"
                                                                        style="width:100%; border-color: red; background-color: #1c1c1c;  color: red;font-size:16px;">
                                                                        <i class="fa fa-times"></i>  CANCELAR </a>
                
                <? }?>
                
                <?php if ($user_info['assinatura_ativa'] == "NAO"){?>
                <a href="?assinST=SIM"
                                                                        class="btn btn-sm rounded text-green"
                                                                        style="width:100%; border-color: green; background-color: #1c1c1c;  color: green;font-size:16px;">
                                                                        <i class="fa fa-refresh"></i> REATIVAR</a>
                
                <? }?>
                
                
                                                                        
                                                                        </td>
          </tr> 
       
          </tbody>
        </table> 
        
                   
                    <? } ?>
     
         </div>
        </div>
      
      <div class="box">   
     <div class="box-header"style="text-align:center;" >
         
          <h4>HISTÓRICO DE PAGAMENTOS</h4> 
        </div>
        <table class="table table-striped b-t" style="background-color: #1f1f1fc2; border:1px solid #111111;font-size:10px;">
          <thead>
            <tr>   
                 <th  style="border:1px solid #111111;"><font color="#981d1d">DATA</font></th>
                 <th  style="border:1px solid #111111;"><font color="#981d1d">PLANO</font></th>  
                 <th  style="border:1px solid #111111;"><font color="#981d1d">VALOR</font></th>
                  <th  style="border:1px solid #111111;"><font color="#981d1d">STATUS</font></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($consultaPagamentos as $pagamento){   
            ?>
          <tr>  
                <td style="border:1px solid #111111;"><? echo $pagamento['data'];?></td>
                <td style="border:1px solid #111111;">
                    <?php 
                    if($pagamento['plano']=='1'){?>
                        <button class="btn btn-sm  " style="width:100%; padding:2px;font-size:11px; border-radius:2px; color:white; background-color:#da9100; font-size:11px; cursor:default"> BÁSICO </button>
                    <?php 
                    }else
                    if($pagamento['plano']=='2'){?>
                     <button class="btn btn-sm  " style="width:100%; padding:2px;font-size:11px; border-radius:2px; color:white; background-color:#c01bb9; font-size:11px;  cursor:default"> PREMIUM </button>
                    <?php    
                    }else
                    if($pagamento['plano']=='3'){?>
                        <button class="btn btn-sm  " style="width:100%; padding:2px;font-size:11px; border-radius:2px; color:white; background-color:red; font-size:11px; cursor:default"> TOP MODEL </button>
                    <?php  
                    }else
                    {
                        echo'~';
                    } 
                    ?>
                     </td> 
                <td style="border:1px solid #111111;">R$ <? echo  $pagamento['valor'];?></td> 
                <td style="border:1px solid #111111;"><? echo $pagamento['status'];?></td>
          </tr> 
         <?php }  ?>
          </tbody>
        </table>
         
      </div>
      
    
    
  
      
       
                             <!--  modal logout-->
                    <div class="modal" data-backdrop="true" id="logoutAccount">
                        <div class="row-col h-v">
                            <div class="row-cell v-m">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content" style="background: #151515; color:white;">
                                        <div class="modal-body text- p-lg" style="text-align:center;">
                                            <font size="2px" color="white">
                                               <center><b><img src="../assets/imagens/icon-info.png" height="20px"> ATENÇÃO </b></center>
                                            </font>
                                            <BR>
                                            DESEJA REALMENTE SAIR DA SUA CONTA ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm accent p-x-md"
                                                data-dismiss="modal">Não</button>
                                            <a href="logout.php?path=login" class="btn btn-sm red p-x-md">Sim</a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                            </div>
                        </div>
                    </div>
      
     
  </div> 
           
            <!-- ############ PAGE END--> 
         </div>
         <!-- ############ LAYOUT END--> 
      </div>
      <!-- build:js scripts/app.html.js -->
      <!-- jQuery -->
      <script type="text/javascript">
         var sc_project=3967696; 
         var sc_invisible=1; 
         var sc_partition=46; 
         var sc_click_stat=1; 
         var sc_security="6979b175"; 
      </script>
      <script type="text/javascript" src="https://statcounter.com/counter/counter.js"></script>
      <noscript>
         <div
            class="statcounter"><a title="free hit counter"
            href="http://www.statcounter.com/free_hit_counter.html"
            target="_blank"><img class="statcounter"
            src="http://c.statcounter.com/3967696/0/6979b175/0/"
            alt="free hit counter" ></a></div>
      </noscript>
      <script src="../libs/jquery/jquery/dist/jquery.js"></script>
      <!-- Bootstrap -->
      <script src="../libs/jquery/tether/dist/js/tether.min.js"></script>
      <script src="../libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
      <!-- core -->
      <script src="../libs/jquery/underscore/underscore-min.js"></script>
      <script src="../libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
      <script src="../libs/jquery/PACE/pace.min.js"></script>
      <script src="scripts/config.lazyload.js"></script>
      <script src="scripts/palette.js"></script>
      <script src="scripts/ui-load.js"></script>
      <script src="scripts/ui-jp.js"></script>
      <script src="scripts/ui-include.js"></script>
      <script src="scripts/ui-device.js"></script>
      <script src="scripts/ui-form.js"></script>
      <script src="scripts/ui-nav.js"></script>
      <script src="scripts/ui-screenfull.js"></script>
      <script src="scripts/ui-scroll-to.js"></script>
      <script src="scripts/ui-toggle-class.js"></script>
      <script src="scripts/app.js"></script>
      <!-- ajax -->
      <script src="../libs/jquery/jquery-pjax/jquery.pjax.js"></script>
      <script src="scripts/ajax.js"></script>
      <!-- endbuild -->
   </body>
</html>
<?php
   }
   ?>