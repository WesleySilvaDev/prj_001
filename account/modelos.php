<?php
   include_once("includes/controller.php");
   
   $pagename = 'modelos';
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
      background: #151515;
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
      }
   </style>
   <style> 
      #arquivoup{ border:0px; background:#1b1b1b; color:white;  padding:5px; width:100%; border:1px solid #2f2f2f }
      #upload1 { position:absolute; left:0; opacity:0.01; z-index:1; }
      #upload2 { position:absolute; left:0; opacity:0.01; z-index:1; }
      #upload3 { position:absolute; left:0; opacity:0.01; z-index:1; }
      #texto1 { border:0px; background:#2f2f2f; color:white;  padding:5px; width:100%; font-size: 12px;}
      #texto2 { border:0px; background:#2f2f2f; color:white;  padding:5px; width:100%; font-size: 12px;}
      #texto3 { border:0px; background:#2f2f2f; color:white;  padding:5px; width:100%; font-size: 12px;}
      #botao { border:1px solid red; background:red; color:white; border-radius:4px; padding:5px }
    .nav-active-primary .nav-link.active, .nav-active-primary .nav > li.active > a {
    color: rgba(255, 255, 255, 0.87) !important;
    background-color: #ff0700 !important;
}
   </style> 
   <script>
      $(function(){
      $('#upload1').on('change',function(){
          var numArquivos = $(this).get(0).files.length;
          if ( numArquivos >0 ) {
           $('#texto1').val( numArquivos+' arquivo selecionado' );
          } else {
           $('#texto1').val( ('( Clique aqui para procurar na galeria )') );
          }
      });
      $('#upload2').on('change',function(){
          var numArquivos = $(this).get(0).files.length;
          if ( numArquivos >0 ) {
           $('#texto2').val( numArquivos+' arquivo selecionado' );
          } else {
           $('#texto2').val( ('( Clique aqui para procurar na galeria )') );
          }
      });
      $('#upload3').on('change',function(){
          var numArquivos = $(this).get(0).files.length;
          if ( numArquivos >0 ) {
           $('#texto3').val( numArquivos+' arquivo selecionado' );
          } else {
           $('#texto3').val( ('( Clique aqui para procurar na galeria )') );
          }
      });
      });
   </script>    
   <body class="pace-done grey">
  <div class="app" id="app">

<!-- ############ LAYOUT START-->

  <!-- aside -->
  <div id="aside" class="app-aside modal fade folded md nav-expand">
  	<div class="left navside indigo-900 dk" layout="column">
      <div class="navbar navbar-md no-radius">
        <!-- brand -->
        <a class="navbar-brand">
        	<center><img src="img/COR.png" alt="." class="" height="44px"></center>
        </a>
        <!-- / brand -->
      </div>
      <div flex class="hide-scroll">
        <nav class="scroll nav-active-primary">
          
            <ul class="nav" ui-nav>
              <li class="nav-header hidden-folded">
                <small class="text-muted">Menu</small>
              </li>
              
              <li class="">
                <a  onclick="location.href='admin.php';">
                  <span class="nav-icon"> <i class="material-icons md-24" style="font-size:20px;"></i></span>
                  <span class="nav-text">Inicial</span>
                </a>
              </li> 
                <li class="">
                <a onclick="location.href='cad_analise.php';" >
                  <span class="nav-icon"> <i class="material-icons md-24" style="font-size:20px;"></i></span>
                  <span class="nav-text">Cadastros</span>
                </a>
              </li> 
              <li class="active">
                <a onclick="location.href='modelos.php';"  >
                  <span class="nav-icon"> <i class="material-icons md-24" style="font-size:20px;"></i> </span>
                  <span class="nav-text">Contas</span>
                </a>
              </li> 
              <li class="">
                <a onclick="location.href='pagamentos_adm.php';">
                  <span class="nav-icon"><i class="material-icons md-24" style="font-size:22px;"></i></span>
                  <span class="nav-text">Pagamentos</span>
                </a>
              </li>  
    
              <li class="nav-header hidden-folded">
                <small class="text-muted">Administração</small>
              </li>  
              <li>
                <a href="#" >
                  <span class="nav-icon">  <i class="fa fa-list-ol"></i> </span>
                  <span class="nav-text">Planos</span>
                </a>
              </li>
              <li>
                <a href="#" >
                  <span class="nav-icon">  <i class="fa fa-cogs"></i> </span>
                  <span class="nav-text">Config. sistema</span>
                </a>
              </li>
               
           
          
              <li class="nav-header hidden-folded">
                <small class="text-muted">Atalhos</small>
              </li>
              
              <li class="hidden-folded" >
                <a href="https://www.nossolove.com/" target="_blank">
                  <span class="nav-text">www.nossolove.com</span>
                </a>
              </li>
          
            </ul>
        </nav>
      </div>
      <div flex-no-shrink="">
        <nav ui-nav="">
  <ul class="nav"> 
    <li><div class="b-b b m-t-sm"></div></li>
    <li class="no-bg">
      <a href="logout.php?path=login">
         <span class="nav-icon"><i class="fa fa-power-off"></i></span> 
        <span class="nav-text">Logout</span>
      </a>
    </li>
  </ul>
</nav>
      </div>
    </div>
  </div>
  <!-- / aside -->
  
  <!-- content -->
  <div id="content" class="app-content box-shadow-z0" role="main">
     <div class="app-header white box-shadow">
         <div class="navbar">
            <!-- Open side - Naviation on mobile -->
            <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up">
            <font size="6px;"><i class="fa fa-ellipsis-v"  style="margin-top:20px;line-height: 1.0;"></i></font>
            </a> 
            <!-- Page title - Bind to $state's title -->
            <div class="navbar-item h7" ng-bind="$state.current.data.title" id="pageTitle" style="line-height:15px">
               <center> 
                  <img src="img/COR.png" alt="." style="margin-top:8px; height:45px "class="logoMobile" style=""  ><br>
                  <font size="2" color="gray" >Painel de controle</font>  
               </center>
            </div>
         </div>
      </div>
    <div class="app-footer">
      <div class="p-a text-xs">
        <div class="pull-right text-muted">
          &copy; Copyright <strong>Nosso Love</strong> 
          <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
        </div>
        <div class="nav">
         03/2022 - V 1.0
          <span class="text-muted">-</span>
          <a class="nav-link label accent" href="">BETA</a>
        </div>
      </div>
    </div>
    <div ui-view class="app-body" id="view">

<!-- ############ PAGE START-->
<div class="padding" style="margin-top: 10px;"> 
	<div class="row">  
	    
	    <div class="box"> 
    <div class="table-responsive" >
      <table ui-jp="dataTable" class="table table-striped b-t b-b" >
        <thead>
          <tr>  
            <th  style="width:15%;"><font color="#981d1d">  </font></th> 
            <th  style="width:60%;"><font color="#981d1d">  </font></th> 
            <th  style="width:25%;"><font color="#981d1d">  </font></th> 
          </tr>
        </thead>
        <tbody>
            <?php 
                            
                           $sql = "SELECT * FROM users"; 
                           $result = $db->prepare($sql);
                           $result->execute();
                           while ($row = $result->fetch()) { ?>
                           
                           
                            <tr> 
                                 
                                <td> 
                                <table style="border:1px solid #242424; background-color:#1c1c1c; width:100%;">
                                    <tr>
                                        <td style="border-top:0px; text-align:center;">
                                     
                                            <img src="./files/profile/<?php echo $row['profile_photo'] ?>" style=" border-radius:50px; border:1px solid red; max-width: 100%; object-fit: cover;  width: 90px;  height: 90px;"> 
                                <br>
                                <b><?echo $row['firstname'].' '.$row['lastname'];?></b>
                                <br>
                                  <?php 
                                        if($row['grupo']=='DEVELOPER'){ ?> 
                                            <button class="btn btn-sm  " style="width:100%; padding:2px;font-size:11px; border-radius:2px; color:#ffffffb5; border:1px solid #000; background-color:#353535; font-size:11px; cursor:default"> <i class="fa fa-desktop"></i> PROGRAMADOR </button>
                                        <?php }else{?>
                                           <button class="btn btn-sm  " style="width:100%; padding:2px;font-size:11px; border-radius:2px; color:white; border:1px solid #6a6a6a; background-color:#252525; font-size:11px; cursor:default">  <?php if( $row['grupo']=='REGISTERED'){echo'MODELO';}else{echo $row['grupo'];} ?> </button>
                                        
                                            
                                        <?php }  if($row['plano']=='3'){?>
                                          <button class="btn btn-sm  " style="width:100%; padding:2px;font-size:11px; border-radius:2px; color:white; background-color:red; font-size:11px; cursor:default"> TOP MODEL </button>
                                     <?php }else if($row['plano']=='2'){?>
                                          
                                          <button class="btn btn-sm  " style="width:100%; padding:2px;font-size:11px; border-radius:2px; color:white; background-color:#c01bb9; font-size:11px;  cursor:default"> PREMIUM </button>
                                          
                                     <?php }else if($row['plano']=='1'){?>
                                         
                                         <button class="btn btn-sm  " style="width:100%; padding:2px;font-size:11px; border-radius:2px; color:white; background-color:#da9100; font-size:11px; cursor:default"> BÁSICO </button>
                                         
                                     <?php }else{ ?>
                                            <button class="btn btn-sm  " style="width:100%; border:1px solid #000;padding:2px;font-size:11px; border-radius:2px; color:red; background-color:#1a1a1a; font-size:11px; cursor:default"> NOSSO LOVE </button>
                                     
                                     <?php }  ?>
                                  
                                  <?echo $row['username'];?>
                                     
                                        </td>
                                    </tr>
                                </table>
                                </td> 
                                <td> 
                                <table style="width:100%;border:1px solid #242424; text-align:center; height:100%;"> 
                                    <tr >
                                        <td style="border-top:0px; background-color:#1c1c1c; border-right:1px solid #242424;"> STATUS DA CONTA   </td>
                                        <td style="border-top:0px; background-color:#1c1c1c; border-right:1px solid #242424;"> ASSINATURA    </td>
                                        <td style="border-top:0px; background-color:#1c1c1c; border-right:1px solid #242424;"> EXPIRA EM     </td>
                                        <td style="border-top:0px; background-color:#1c1c1c; border-right:1px solid #242424;"> MODO VIAGEM     </td>
                                        
                                    </tr>
                                    <tr>
                                        <td style="border-top:0px;  border-right:1px solid #242424;">
                                            <?php if($row['conta'] == 'ANALISE' ){$spanCor ='orange';}else if($row['conta'] == 'INATIVA' ){$spanCor ='red';}else
                                      if($row['conta'] == 'ATIVA' ){$spanCor ='green';}else if($row['conta'] == 'SUSPENSA' ){$spanCor ='#c31fc3';}?>
                                <button class="btn btn-sm " style="padding:2px;font-size:11px; border-radius:2px; cursor:default; color:white; background-color:<?php echo $spanCor;?>;" ><?echo $row['conta'];?> </button> 
                                   
                                        </td>
                                        <td style="border-top:0px; border-right:1px solid #242424;">
                                                 <?php
                                                 if($row['assinatura_ativa']=='SIM'){?>
                                                     
                                                     <button class="btn btn-sm " style="padding:2px;font-size:11px; border-radius:2px; cursor:default; color:white; background-color:green;" > ATIVA </button>
                                                     
                                                 <?php }else if($row['assinatura_ativa']=='NAO'){ ?>
                                                     <button class="btn btn-sm " style="padding:2px;font-size:11px; border-radius:2px; cursor:default; color:white; background-color:red;" > CANCELADA </button>
                                                <?php }else{
                                                     echo'~';
                                                 }
                                                 ?>
                                        </td> 
                                        <td style="border-top:0px;  border-right:1px solid #242424;">
                                            
                                             <?php 
                                             
                                             if (!$row['plano'] == '') {
                                                 if (Tempo($row['time_plan']) >= 0) { 
                                                    
                                                     
                                                        echo Tempo($row['time_plan']); 
                                                     
                                                    
                                                    
                                                }else{?>
                                                    <button class="btn btn-sm " style="padding:2px;font-size:11px; border-radius:2px; cursor:default; color:white; background-color:red;" > EXPIRADO </button>
                                        <?php   }   }   ?>
                                              
                                             
                                        </td>
                                        <td style="border-top:0px;  border-right:1px solid #242424;">
                                            <?php
                                                 if($row['disponivel']=='SIM'){?>
                                                     
                                                     <button class="btn btn-sm " style="padding:2px;font-size:11px; border-radius:2px; cursor:default; color:white; background-color:red;" > INATIVO </button>
                                                     
                                                 <?php }else if($row['disponivel']=='NAO'){ ?>
                                                     <button class="btn btn-sm " style="padding:2px;font-size:11px; border-radius:2px; cursor:default; color:white; background-color:green;" > ATIVO </button>
                                                <?php }else{
                                                     echo'~';
                                                 }
                                                 ?>
                                        </td>
                                    </tr>  
                                </table> 
                                </td> 
                                <td>
                                     <a href="cad_detalhes.php?cad_detalhes_id=<?echo $row['id'];?>" class="btn btn-sm warn" style="width:120px; background-color:#2f2f2f; font-size:11px; "> <i class="material-icons md-24"></i>  EDITAR CONTA </a>
                                <br><br>
                                <a href="../perfil/<?echo $row['username'];?>" target="_blank" class="btn btn-sm warn" style="width:120px; background-color:#2f2f2f; font-size:11px; "><i class="material-icons md-24"></i>  VER PERFIL</a>
                                
                                </td>
                           
                            </tr>
                             <?php }  ?>
                             
                             
           
        </tbody>
      </table>
    </div>
  </div>
	</div>
	
	
</div>

<!-- ############ PAGE END-->

    </div>
  </div>
  <!-- / -->

 

<!-- ############ LAYOUT END-->

  </div>
<!-- build:js scripts/app.html.js -->
<!-- jQuery -->
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