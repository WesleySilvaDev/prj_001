<?php
   include_once("includes/controller.php");
   
   $pagename = 'planos';
   $container = '';
   
   if(!$session->logged_in){ 
       header("Location: login.php"); 
       
   } 
   else{
   
          
   $total_users = $adminfunctions->totalUsers(); 
   $user_info = $functions->getUserInfo($session->username);
    $regUserId = $user_info['id'];
   include_once("includes/uFunctions.php");
   $form = new Form; 
    
        
    }
    
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
 
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
       <script>
         if ( window.history.replaceState ) {3
             window.history.replaceState( null, null, window.location.href );
         }
      </script> 
   </head>
  <style>
.accordion {
    background-color: #eceff1;
    color: #5d7c8e;
    cursor: pointer;
    padding: 5px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
} 
.panel {
  padding: 0 18px;
  display: none;
  background-color: #eceff1;
  color:#5d7c8e;
  overflow: hidden;
}
</style>
   <body class="pace-done grey" style="background-color: #0d0d0d;">
      <div class="app" id="app"> 
      <div id="content" class="app-content box-shadow-z0" role="main">
      <div class="app-header white box-shadow" style="background-color: #000000;">
            
         </div> 
      <div ui-view class="app-body" id="view">
         <!-- ############ PAGE START-->
         <div class="padding" style="margin-top: -60px; background-color: #0d0d0d; ">
           <table style="width:100%; border-bottom: 1px solid #232323;">
                                      <tr> 
                                          <td  style="width:100%; text-align:center;">
                                            <div class="app-header white box-shadow" style="background-color: #000000;">
                                <div class="navbar">
                                   <!-- Open side - Naviation on mobile -->
                                    <a href="account.php" class="navbar-item pull-left hidden-lg-up">
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
                                          </td>  
                                      </tr>
                                  </table>
                      
               
                        <div class="tab-pane animated fadeIn text-muted active" id="tab1" aria-expanded="true" >
                           <div class="box-header" style="margin-top:20px;">
                               
                              <br> 
                              <br> 
                              <div class="col-sm-4">
                    
                             <table class="table " style="width:100%; border-radius:10px; font-size:12px; -webkit-box-shadow: 1px 0px 7px 2px rgba(255,0,0,0.43); 
box-shadow: 1px 0px 7px 2px rgba(255,0,0,0.43);">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="padding: 0px;background-color:#1f1f1fc2; border-radius: 10px 10px 0px 0px; border-bottom:1px solid #111111;"> 
                                                                                    <table  style="width:100%;" >
                                                                                    <tr>
                                                                                        <td  style="color:white;  padding: 10px; width:100%; border: 1.1px solid #11111100; ">
                                                                                        
                                                                                             Plano: <font color="red"  >Basic </font> <br> 
                                                                                          
                                                                                        </td> 
                                                                                    </tr>
                                                                                </table>
                                                                                </th>
                                                                            </tr> 
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="background-color: #1f1f1fc2; color:white; border-bottom:1.1px solid #111111;"> 
                                                                                     <img src="../assets/imagens/icon-coracao.png" height="14px"> 
                                                                                     Listagem 24 horas no site
                                                                                     <br><br>
                                                                                     <img src="../assets/imagens/icon-coracao.png" height="14px"> 
                                                                                     Prioridade no suporte Nosso Love
                                                                                     <br><br>
                                                                                     <img src="../assets/imagens/icon-coracao.png" height="14px"> 
                                                                                     Classificação: Parte inferior do site  
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style=" paddding:0px;background-color: #1f1f1fc2; border-radius: 0px 0px 10px 10px;">
                                                                                
                                                                                     
                                                                                     
                                                                                     <a href="pay.php?Plano=Basico" class="btn btn-sm rounded btn-block" style="border-radius:30px;margin-left:5px;background-color:red; font-size:15px;"> 
                                                                                     <span style="font-size:14px; color:white;"><b> ASSINAR PLANO -  97,90/Semana </b> </span></a>
                                                                                     
                                                                                </td>
                                                                            </tr> 
                                                                        </tbody>
                                                                    </table>   
                            </div>
                    <div class="col-sm-4">
                    
                             <table class="table " style="width:100%; border-radius:10px; font-size:12px; -webkit-box-shadow: 1px 0px 7px 2px rgba(255,0,0,0.43);  box-shadow: 1px 0px 7px 2px rgba(255,0,0,0.43);">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="padding: 0px;background-color:#1f1f1fc2; border-radius: 10px 10px 0px 0px; border-bottom:1px solid #111111;">
                                                                                    <table  style="width:100%;" >
                                                                                    <tr>
                                                                                        <td  style="color:white; padding: 10px; width:50%; border: 1px solid #11111100; ">
                                                                                          
                                                                                             Plano:
                                                                                             <font color="red"  > Premium </font> <br>
                                                                                           
                                                                                          
                                                                                        </td>
                                                                                        <td style=" border: 1.1px solid #11111100; padding: 10px; width:50%; color:white; text-align: center;">
                                                                                           <div style="background-color: red;border-radius: 0px 8px ;">  Recomendado </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                                </th>
                                                                            </tr> 
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                               <td style="background-color: #1f1f1fc2; color:white; border-bottom:1.1px solid #111111;">
                                                                                     <img src="../assets/imagens/icon-coracao.png" height="14px"> 
                                                                                     Listagem 24 horas no site
                                                                                     <br><br>
                                                                                     <img src="../assets/imagens/icon-coracao.png" height="14px"> 
                                                                                     Prioridade no suporte Nosso Love
                                                                                     <br><br>
                                                                                     <img src="../assets/imagens/icon-coracao.png" height="14px"> 
                                                                                     Classificação em: Top 4 e Destaques
                                                                                     <br><br>
                                                                                     <img src="../assets/imagens/icon-coracao.png" height="14px"> 
                                                                                     Relevancia dobrada no site 
                                                                                </td>
                                                                            </tr>
                                                                           <tr>
                                                                                <td style="background-color: #1f1f1fc2; border-radius: 0px 0px 10px 10px;">
                                                                                
                                                                                     <a href="pay.php?Plano=Premium" class="btn btn-sm rounded btn-block" style="border-radius:30px;margin-left:5px;background-color:red; font-size:15px;"> 
                                                                                     <span style="font-size:14px; color:white;"><b> ASSINAR PLANO -  197,90/Semana </b> </span></a>
                                                                                  
                                                                                </td>
                                                                            </tr> 
                                                                        </tbody>
                                                                    </table>   
                            </div>
                     <div class="col-sm-4">
                    
                             <table class="table " style="width:100%; border-radius:10px; font-size:12px; -webkit-box-shadow: 1px 0px 7px 2px rgba(255,0,0,0.43);  box-shadow: 1px 0px 7px 2px rgba(255,0,0,0.43);">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="padding: 0px;background-color:#1f1f1fc2; border-radius: 10px 10px 0px 0px; border-bottom:1px solid #111111;"> 
                                                                                    <table  style="width:100%;" >
                                                                                    <tr>
                                                                                        <td  style="color:white;  padding: 10px; width:50%; border: 1.1px solid #11111100; ">
                                                                                        
                                                                                             Plano: <font color="red"  > Top Model </font> <br> 
                                                                                          
                                                                                        </td>
                                                                                        <td style=" border: 1px solid #11111100; padding: 10px; width:50%; color:white;  text-align: center;">
                                                                                           <div style="background-color: ;border-radius: 0px 8px ;">   </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                                </th>
                                                                            </tr> 
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="background-color: #1f1f1fc2; color:white; border:1px solid #111111;"> 
                                                                                     <img src="../assets/imagens/icon-coracao.png" height="14px"> 
                                                                                     Listagem 24 horas no site
                                                                                     <br><br>
                                                                                     <img src="../assets/imagens/icon-coracao.png" height="14px"> 
                                                                                     Prioridade no suporte Nosso Love
                                                                                     <br><br>
                                                                                     <img src="../assets/imagens/icon-coracao.png" height="14px"> 
                                                                                     Classificação em: Parte superior do site
                                                                                     <br><br>
                                                                                     <img src="../assets/imagens/icon-coracao.png" height="14px"> 
                                                                                     Classificação em: Destaques e Top 4
                                                                                     <br><br>
                                                                                     <img src="../assets/imagens/icon-coracao.png" height="14px"> 
                                                                                     Tenha 10x mais visitas dentro do perfil
                                                                                     <br><br>
                                                                                     <img src="../assets/imagens/icon-coracao.png" height="14px"> 
                                                                                     Revelancia premium do site
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="background-color: #1f1f1fc2; border-radius: 0px 0px 10px 10px;">
                                                                                
                                                                                     <a href="pay.php?Plano=Top Model" class="btn btn-sm rounded btn-block" style="border-radius:30px;margin-left:5px;background-color:red; font-size:15px;"> 
                                                                                     <span style="font-size:14px; color:white;"><b> ASSINAR PLANO -  297,90/Semana </b> </span></a>
                                                                               
                                                                                </td>
                                                                            </tr>  
                                                                        </tbody>
                                                                    </table>   
                            </div>
          
         
           
                               
                            
                             
                             
                           </div>
                           
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
           
            <!-- ############ PAGE END--> 
         </div>
         <!-- ############ LAYOUT END--> 
      </div>
      <!-- build:js scripts/app.html.js -->
      <!-- jQuery -->
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

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
 