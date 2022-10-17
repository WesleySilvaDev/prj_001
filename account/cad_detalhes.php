<?php
   include_once("includes/controller.php");
   
   $pagename = 'cadastro';
   $container = '';
   
   if(!$session->logged_in){ 
       header("Location: login.php"); 
       
   } 
   else{
   
        
   $total_users = $adminfunctions->totalUsers(); 
   $user_info = $functions->getUserInfo($session->username);
    $regUserId = $user_info['id'];
   include_once("includes/uFunctions.php"); 
   $user_info_public = $functions->getUserInfo_public($cad_detalhes_id);
   $form = new Form;
 
    $regUserIdpUBLIC = $user_info_public['username'];

    $consultaPagamentos = $db->query("SELECT * FROM paymets WHERE id_user = '$regUserIdpUBLIC' ORDER BY id DESC LIMIT 10");
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
      <script>
         if ( window.history.replaceState ) {
             window.history.replaceState( null, null, window.location.href );
         }
      </script>  
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
      .nav-active-primary .nav-link.active, .nav-active-primary .nav > li.active > a {
    color: rgba(255, 255, 255, 0.87) !important;
    background-color: #ff0700 !important;
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

 <!-- / aside --> <!-- aside -->
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
            
              <li class="" >
                <a href="#" >
                  <span class="nav-icon">  <i class="fa fa-list-ol"></i> </span>
                  <span class="nav-text">Planos</span>
                </a>
              </li>
              <li class="">
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
         05/2022 - V 2.0
          <span class="text-muted">-</span>
          <a class="nav-link label red accent" href="">BETA</a>
        </div>
      </div>
    </div>
    <div ui-view class="app-body" id="view">

<!-- ############ PAGE START-->
<div class="padding" style="margin-top: 10px;"> 
	<div class="row">   
	   <div class="col-xs-12 col-sm-12 col-md-12"> 
	   
	   <div class="row-col ng-scope"> 
   <div class="col-sm-9 col-lg-9 light lt bg-auto" style="background-color: #151515;">
      <div class="tab-content pos-rlt">
         
         <div class="tab-pane active" id="tab-001">
            <BR>
 
               <div class="col-sm-12 col-lg-12">
                <table style="width:100%; border:1px solid #242424; background-color:#1b1b1b; text-align:center;">
                            <tr>
                                <td style="height: 40px; width:16%;border:1px solid #242424;  "> STATUS DA CONTA </td>
                                <td style="height: 40px; width:16%;border:1px solid #242424;  "> PLANO </td>
                                <td style="height: 40px; width:16;border:1px solid #242424;  "> ASSINATURA </td>
                                <td style="height: 40px; width:16%;border:1px solid #242424;  "> QTD. DIAS </td>
                                <td style="height: 40px; width:16%;border:1px solid #242424;  "> MODO VIAGEM </td>
                                <td style="height: 40px; width:16%;border:1px solid #242424;  "> GRUPO</td>
                            </tr>
                            <tr>
                                <td> 
                                <?php 
                                    if($user_info_public['conta'] =='ATIVA'){ ?>
                                      <div class="btn-group btn-sm  btn dropdown" style="width: 100%;">
                                    <button class="btn btn-sm " data-toggle="dropdown" style="width: 100%; padding:2px;font-size:12px; border-radius:2px;  color:white; background-color:green;" >
                                         ATIVA <br>
                                         <small>Clique para alterar</small>
                                    </button>
                                    
                                    <ul class="dropdown-menu animated fadeIn"> 
                                        <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=INATIVA&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=conta'">DESATIVAR </li> 
                                        <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=SUSPENSA&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=conta'">SUSPENDER </li> 
                                         <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=ANALISE&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=conta'">ANALISE</a></li> 
                                    </ul>
                                </div>
                                    <?php }else
                                    if($user_info_public['conta'] =='INATIVA'){ ?>
                                      <div class="btn-group btn-sm  btn dropdown" style="width: 100%;">
                                    <button class="btn btn-sm " data-toggle="dropdown" style="width: 100%; padding:2px;font-size:12px; border-radius:2px;  color:white; background-color:red;" >
                                         INATIVA <br>
                                         <small>Clique para alterar</small>
                                    </button>
                                    
                                    <ul class="dropdown-menu animated fadeIn"> 
                                         <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=ATIVA&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=conta'">ATIVAR</a></li>
                                        <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=SUSPENSA&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=conta'">SUSPENDER </li> 
                                          <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=ANALISE&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=conta'">ANALISE</a></li> 
                                    </ul>
                                </div>
                                    <?php }else
                                    if($user_info_public['conta'] =='SUSPENSA'){ ?>
                                      <div class="btn-group btn-sm  btn dropdown" style="width: 100%;">
                                    <button class="btn btn-sm " data-toggle="dropdown" style="width: 100%; padding:2px;font-size:12px; border-radius:2px;  color:white; background-color:#c31fc3;" >
                                         SUSPENSA <br>
                                         <small>Clique para alterar</small>
                                    </button>
                                    
                                    <ul class="dropdown-menu animated fadeIn"> 
                                        <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=ATIVA&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=conta'">ATIVAR </li>
                                         <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=INATIVA&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=conta'">DESATIVAR</a></li> 
                                         <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=ANALISE&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=conta'">ANALISE</a></li> 
                                    </ul>
                                </div>
                                    <?php }else
                                    if($user_info_public['conta'] =='ANALISE'){ ?>
                                      <div class="btn-group btn-sm  btn dropdown" style="width: 100%;">
                                    <button class="btn btn-sm " data-toggle="dropdown" style="width: 100%; padding:2px;font-size:12px; border-radius:2px;  color:white; background-color:orange;" >
                                         ANÁLISE <br>
                                         <small>Clique para alterar</small>
                                    </button>
                                    
                                    <ul class="dropdown-menu animated fadeIn"> 
                                         <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=ATIVA&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=conta'">ATIVAR</a></li>
                                         <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=INATIVA&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=conta'">DESATIVAR</a></li> 
                                         <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=SUSPENSA&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=conta'">SUSPENDER</a></li>
                                    </ul>
                                </div>
                                    <?php }else{ ?>
                                    <div class="btn-group btn-sm  btn dropdown" style="width: 100%;">
                                    <button class="btn btn-sm " data-toggle="dropdown" style="width: 100%; padding:2px;font-size:12px; border-radius:2px;  color:white; background-color:#84848466;" >
                                         INDEFINIDO <br>
                                         <small>Clique para alterar</small>
                                    </button>
                                    
                                    <ul class="dropdown-menu animated fadeIn"> 
                                         <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=ATIVA&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=conta'">ATIVAR</a></li>
                                         <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=DESATIVA&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=conta'">DESATIVAR</a></li>
                                         <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=SUSPENSA&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=conta'">SUSPENDER</a></li> 
                                          <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=ANALISE&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=conta'">ANALISE</a></li> 
                                    </ul>
                                </div>
                                    <?php }?>
                                    
                                 
                                
                                </td>
                                <td style="height: 40px; width:20%;border:1px solid #242424; padding: 8px;"> 
                                
                                
                                <div class="btn-group btn-sm  btn dropdown" style="width: 100%;">  
                                    <?php 
                                    if($user_info_public['plano'] =='3'){ ?>
                                       <button class="btn btn-sm " data-toggle="dropdown" style="width: 100%; padding:2px;font-size:12px; border-radius:2px;  color:white; background-color:red;" > TOP MODEL 
                                       <br>
                                         <small>Clique para alterar</small></button>
                                     <ul class="dropdown-menu animated fadeIn"> 
                                     <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=2&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=plano'">PREMIUM</a></li> 
                                     <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=1&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=plano'">BÁSICO</a></li>   
                                    </ul>
                                    <?php }else
                                    if($user_info_public['plano'] =='2'){?>
                                       <button class="btn btn-sm " data-toggle="dropdown" style="width: 100%; padding:2px;font-size:12px; border-radius:2px;  color:white; background-color:#c01bb9;" > PREMIUM
                                       <br>
                                         <small>Clique para alterar</small></button>
                                     <ul class="dropdown-menu animated fadeIn"> 
                                        <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=1&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=plano'">BÁSICO</a></li>
                                        <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=3&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=plano'">TOP MODEL</a></li>  
                                    </ul>
                                    <?php }else
                                    if($user_info_public['plano'] =='1'){?>
                                       <button class="btn btn-sm " data-toggle="dropdown" style="width: 100%; padding:2px;font-size:12px; border-radius:2px;  color:white; background-color:#da9100;" > BÁSICO 
                                       <br>
                                         <small>Clique para alterar</small></button>
                                     
                                     <ul class="dropdown-menu animated fadeIn"> 
                                        <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=2&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=plano'">PREMIUM</a></li>
                                        <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=3&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=plano'">TOP MODEL</a></li> 
                                    </ul>
                                    <?php }else{?>
                                       <button class="btn btn-sm " data-toggle="dropdown" style="width: 100%; padding:2px;font-size:12px; border-radius:2px;  color:white; background-color:gray;" > INDEFINIDO 
                                       <br>
                                         <small>Clique para alterar</small></button>
                                     
                                     <ul class="dropdown-menu animated fadeIn"> 
                                        <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=1&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=plano'">BASICO</a></li>
                                        <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=2&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=plano'">PREMIUM</a></li>
                                        <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=3&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=plano'">TOP MODEL</a></li> 
                                    </ul>
                                    <?php }?>     
                                </div>
                                
                                </td>
                                <td style="height: 40px; width:20%;border:1px solid #242424; padding: 8px;"> 
                                
                                <div class="btn-group btn-sm  btn dropdown" style="width: 100%;">  
                                    <?php 
                                    if($user_info_public['assinatura_ativa'] =='SIM'){ ?>
                                       <button class="btn btn-sm " data-toggle="dropdown" style="width: 100%; padding:2px;font-size:12px; border-radius:2px;  color:white; background-color:green;" > ATIVA 
                                       <br>
                                         <small>Clique para alterar</small></button>
                                     <ul class="dropdown-menu animated fadeIn"> 
                                        <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=NAO&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=assinatura_ativa'">CANCELAR ASSINATURA</a></li>
                                    </ul>
                                    <?php }else
                                    if($user_info_public['assinatura_ativa'] =='NAO'){?>
                                       <button class="btn btn-sm " data-toggle="dropdown" style="width: 100%; padding:2px;font-size:12px; border-radius:2px;  color:white; background-color:red;" > CANCELADA 
                                       <br>
                                         <small>Clique para alterar</small></button>
                                     <ul class="dropdown-menu animated fadeIn"> 
                                         <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=SIM&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=assinatura_ativa'">ATIVAR ASSINATURA</a></li> 
                                    </ul>
                                    <?php } ?>     
                                </div>
                                
                                
                                </td>
                                <td style="height: 40px; width:20%;border:1px solid #242424; padding: 8px;"> 
                                
                                
                                
                                <?php  
                                             if (!$user_info_public['plano'] == '') {
                                                 if (Tempo($user_info_public['time_plan']) >= 0) { 
                                                    if ($user_info_public['assinatura_ativa'] == 'SIM') { 
                                                     
                                                        echo Tempo($user_info_public['time_plan']); 
                                                     
                                                    }else{
                                                        echo Tempo($user_info_public['time_plan']); 
                                                    }
                                                    
                                                }else{ ?>
                                                    <button class="btn btn-sm " style="padding:2px;font-size:11px; border-radius:2px; cursor:default; color:white; background-color:red;" > EXPIRADO </button>
                                        <?php   }    }else{
                                        echo'<snall>NENHUM PLANO ATIVO</small>';
                                        }?>
                                
                                
                                </td>
                                
                                <td style="height: 40px; width:20%;border:1px solid #242424; padding: 8px;"> 
                                
                                <div class="btn-group btn-sm  btn dropdown" style="width: 100%;">  
                                    <?php 
                                    if($user_info_public['disponivel'] =='SIM'){ ?>
                                       <button class="btn btn-sm " data-toggle="dropdown" style="width: 100%; padding:2px;font-size:12px; border-radius:2px;  color:white; background-color:red;" > INATIVO 
                                       <br>
                                         <small>Clique para alterar</small></button>
                                     <ul class="dropdown-menu animated fadeIn"> 
                                        <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=NAO&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=disponivel'">ATIVAR MODO VIAGEM</a></li>  
                                    </ul>
                                    <?php }else
                                    if($user_info_public['disponivel'] =='NAO'){?>
                                       <button class="btn btn-sm " data-toggle="dropdown" style="width: 100%; padding:2px;font-size:12px; border-radius:2px;  color:white; background-color:green;" > ATIVO 
                                       <br>
                                         <small>Clique para alterar</small></button>
                                     <ul class="dropdown-menu animated fadeIn"> 
                                        <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=SIM&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=disponivel'">DESATIVAR MODO VIAGEM</a></li> 
                                    </ul>
                                    <?php } ?>     
                                </div>
                                
                                
                                </td>
                                <td style="height: 40px; width:20%;border:1px solid #242424; padding: 8px;"> 
                                
                                 <div class="btn-group btn-sm  btn dropdown" style="width: 100%;">  
                                    <?php 
                                    if($user_info_public['grupo'] =='DEVELOPER'){ ?>
                                         
                                       <button class="btn btn-sm " style="width: 100%; padding:2px; font-size:12px; border-radius:2px;  border-color:#000000; color:#919191; background-color:#1c1c1c;" ><i class="fa fa-desktop"></i> PROGRAMADOR 
                                       <br>
                                         <small>Membro da equipe</small> </button> 
                                    <?php }else
                                    if($user_info_public['grupo'] =='ADMIN'){?>
                                       <button class="btn btn-sm " data-toggle="dropdown" style="width: 100%; padding:2px;font-size:12px; border-radius:2px;  color:white; background-color:red;" > ADMINISTRADOR 
                                       <br>
                                         <small>Clique para alterar</small></button>
                                     <ul class="dropdown-menu animated fadeIn"> 
                                         <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=REGISTERED&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=grupo'">MODELO</a></li> 
                                         <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=AUX&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=grupo'">AUXILIAR</a></li>     
                                    </ul>
                                    <?php }else
                                    if($user_info_public['grupo'] =='AUX'){?>
                                       <button class="btn btn-sm " data-toggle="dropdown" style="width: 100%; padding:2px;font-size:12px; border-radius:2px;  color:white; background-color:blue;" > AUXILIAR 
                                       <br>
                                         <small>Clique para alterar</small></button>
                                     <ul class="dropdown-menu animated fadeIn"> 
                                         <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=REGISTERED&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=grupo'">MODELO</a></li>  
                                        <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=ADMIN&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=grupo'">ADMINISTRADOR</a></li>    
                                    </ul>
                                    <?php }else
                                    if($user_info_public['grupo'] =='REGISTERED'){?>
                                       <button class="btn btn-sm " data-toggle="dropdown" style="width: 100%; padding:2px;font-size:12px; border-radius:2px;  color:white; background-color:gray;" > MODELO 
                                       <br>
                                         <small>Clique para alterar</small></button>
                                     <ul class="dropdown-menu animated fadeIn"> 
                                         <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=AUX&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=grupo'">AUXILIAR</a></li>  
                                         <li class="dropdown-item"  onclick="location.href='?adm_alt_conta_status=ADMIN&adm_alt_id_user=<?php echo $user_info_public['id'];?>&adm_alt_colum=grupo'">ADMINISTRADOR</a></li>   
                                    </ul>
                                    <?php }?>     
                                </div>
                                
                                
                                
                                </td>
                            </tr>
                        </table>  
                        
                        <br>
                                
                               
                                 
                                 
                                  <div class="col-sm-4 col-lg-4">
                                    <table style="width:100%; border:1px solid #242424; background-color:#1b1b1b; ">
                            <tr> 
                                <td style="height: 40px; width:50%;border:1px solid #242424;  text-align:center;"> ATIVAÇÃO DE CONTA 
                                <br> <small> <?php echo $message_admin_configCad; ?></small></td> 
                            </tr>
                            <tr>  
                               <td style="height: 40px; width:50%;border:1px solid #242424; padding: 8px;"> 
                                  <form method="POST"  action="cad_detalhes.php?cad_detalhes_id=<?php echo $user_info_public['id'];?>" enctype="multipart/form-data" autocomplete="off" id="ConfigCad" style="font-size:12px;">
                        <div class="form-group" style="color:#b2b2b2">
                            
                            <br> 
                            <label>TERMOS & POLÍTICAS ACEITOS: </label> 
                            <select name="configCad_termos_status" class="form-control form-control-sm" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                            
                            <?php if($user_info_public['termos_aceitos']=='SIM'){ ?>
                            <option value="SIM">SIM *</option>
                            <option value="NAO">NÃO</font></option>    
                            <?php }else if($user_info_public['termos_aceitos']=='NAO'){ ?> 
                            <option value="NAO">NÃO *</font></option>
                            <option value="SIM">SIM</option>
                            <?php }else{ ?>
                            <option value="<?php echo $user_info_public['termos_aceitos']; ?>">SELECIONE</font></option>
                            <option value="NAO">NÃO</font></option>
                            <option value="SIM">SIM</option>
                            <?php }?>      
                            </select> 
                            </div>
                            
                            
                            <div class="form-group" style="color:#b2b2b2"> 
                            
                            
                            <label>DOCS. IDENTIDADE: </label> 
                            <select name="configCad_docs_status"class="form-control form-control-sm" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px; ">
                             
                            <?php  if( $user_info_public['documentos_aceitos'] == 'RECUSADO'){ ?>
                             <option value="RECUSADO">RECUSADO *</option>
                            <option value="CONFIRMADO">CONFIRMADO</option> 
                            <option value="ANALISE">ANÁLISE</option>   
                           <?php }else if($user_info_public['documentos_aceitos'] == 'CONFIRMADO'){ ?>
                            <option value="CONFIRMADO">CONFIRMADO *</option> 
                            <option value="ANALISE">ANÁLISE</option>
                           <option value="RECUSADO">RECUSADO</option>
                           <?php }else if($user_info_public['documentos_aceitos'] == 'ANALISE'){ ?>  
                            <option value="ANALISE">ANÁLISE *</option>
                           <option value="RECUSADO">RECUSADO</option>
                           <option value="CONFIRMADO">CONFIRMADO</option>
                           <?php }else{ ?>
                               <option value="<?php echo $user_info_public['documentos_aceitos']; ?>">SELECIONE</font></option>
                               <option value="ANALISE">ANÁLISE</option>
                           <option value="RECUSADO">RECUSADO</option>
                           <option value="CONFIRMADO">CONFIRMADO</option>
                          <?php } ?> 
                            </select>  
                            </div> 
                            
                            <div class="form-group" style="color:#b2b2b2">
                             <label>MOTIVO RECUSADA:</label>
                             <textarea name="configCad_docs_recusados_motivo" class="form-control" rows="2"  form="ConfigCad" style="border-radius:5px; font-size:12px;" ><?php echo $user_info_public['motivo_doc_recusado'];?></textarea>
                              </div>
                             
                            
                            <div class="form-group" style="color:#b2b2b2"> 
                            <label>MATERIAL DE MÍDIA ( FOTOS ): </label> 
                            <select name="configCad_midia_status" class="form-control form-control-sm" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                                 
                           <?php  if( $user_info_public['midia_aceita'] == 'RECUSADO'){ ?>
                             <option value="RECUSADO">RECUSADO *</option>
                            <option value="CONFIRMADO">CONFIRMADO</option> 
                            <option value="ANALISE">ANÁLISE</option>   
                           <?php }else if($user_info_public['midia_aceita'] == 'CONFIRMADO'){ ?>
                            <option value="CONFIRMADO">CONFIRMADO *</option> 
                            <option value="ANALISE">ANÁLISE</option>
                           <option value="RECUSADO">RECUSADO</option>
                           <?php }else if($user_info_public['midia_aceita'] == 'ANALISE'){ ?>  
                            <option value="ANALISE">ANÁLISE *</option>
                           <option value="RECUSADO">RECUSADO</option>
                           <option value="CONFIRMADO">CONFIRMADO</option>
                           <?php }else{ ?>
                               <option value="<?php echo $user_info_public['midia_aceita']; ?>">SELECIONE</font></option> 
                               <option value="ANALISE">ANÁLISE</option>
                           <option value="RECUSADO">RECUSADO</option>
                           <option value="CONFIRMADO">CONFIRMADO</option>
                               
                           <?php } ?> 
                            </select> 
                            </div>
                            <div class="form-group" style="color:#b2b2b2">
                             <label>MOTIVO RECUSADA:</label>
                             <textarea name="configCad_midia_recusada_motivo" class="form-control" rows="2"  form="ConfigCad" style="border-radius:5px; font-size:12px;"><?php echo $user_info_public['motivo_mid_recusada'];?></textarea>
                              </div>
                            <input type="text" class="form-control" name="cad_detalhes_id" value="<?php echo $user_info_public['id'];?>" hidden > 
                            
                            <div class="box-divider m-a-0" > </div>
                            <br>
                            
                            <button type="submit" name="admin_configCad"   value="salvar" class="btn btn-sm btn-block white" style="color:white; background-color:green; font-size:12px;"> <font size="2px"> SALVAR </font></button>
                            </form>
                                 </td>
                              
                                
                            </tr>
                        </table> 
                                 </div>
                                
                                
                        <div class="col-sm-5 col-lg-5">
                                    <table style="width:100%; border:1px solid #242424; background-color:#1b1b1b; ">
                            <tr> 
                                <td style="height: 40px; width:50%;border:1px solid #242424;  text-align:center;"> DADOS DO PERFIL </td> 
                            </tr>
                            <tr>  
                               <td style="height: 40px; width:50%;border:1px solid #242424; padding: 8px;"> 
                               <form method="POST" action="cad_detalhes.php?cad_detalhes_id=<?php echo $user_info_public['id'];?>" enctype="multipart/form-data" autocomplete="off" id="ConfigCad" style="font-size:12px;">
                        
                                 <div class="form-group" style="color:#b2b2b2">
                                <table width="100%">
                                    <tr>
                                        <td width="50%">
                                            <label>Nome</label>
                                            <input type="text" class="form-control" name='new_nome' <? if (isset($reg_new_nome)) { ?> value="<? echo $reg_new_nome; ?>" <? } else { ?> value="" <? }; ?> placeholder="<? echo $user_info_public['firstname']; ?>" disabled style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                                        </td>
                                        <td width="50%">
                                            <label>Sobrenome</label>
                                            <input type="text" class="form-control" name='new_sobrenome' <? if (isset($reg_new_sobrenome)) { ?> value="<? echo $reg_new_sobrenome; ?>" <? } else { ?> value="" <? }; ?> placeholder="<? echo $user_info_public['lastname']; ?>" disabled style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group" style="color:#b2b2b2">
                                <label>Email</label><?php if (isset($reg_new_email_error)) {
                                                        echo $reg_new_email_error;
                                                    }; ?>
                                <input type="email" class="form-control" name='new_email' <? if (isset($reg_new_email)) { ?> value="<? echo $reg_new_email; ?>" <? } else { ?> value="" <? }; ?> placeholder="<?php echo $user_info_public['email']; ?>" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                            </div>
                            <div class="form-group" style="color:#b2b2b2">
                                <label>Senha</label>
                                <input type="text" class="form-control" name='new_password' <? if (isset($reg_new_password)) { ?> value="<? echo $reg_new_password; ?>" <? } else { ?> value="" <? }; ?> placeholder="*******" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                            </div>
                            <div class="box-divider m-a-0"></div> <br>
                            <center> INFORMAÇÕES DA CONTA <br><small style="color:gray;">Exibidas no  perfil publicamente</small></center>
                            <br>
                            <div class="form-group" style="color:#b2b2b2">
                                <table width="100%">
                                    <tr>
                                        <td width="50%">
                                            <label>WhatsApp</label>
                                            <input type="text" class="form-control" name='new_whatsapp' <? if (isset($reg_new_whatsapp)) { ?> value="<? echo $reg_new_whatsapp; ?>" <? } else { ?> value="<?php echo $user_info_public['whatsapp']; ?>" <? }; ?> placeholder="Não informado" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                                        </td>
                                        <td width="50%">
                                            <label>Telefone</label>
                                            <input type="text" class="form-control" name='new_telefone' <? if (isset($reg_new_telefone)) { ?> value="<? echo $reg_new_telefone; ?>" <? } else { ?> value="<?php echo $user_info_public['telefone'] ?>" <? }; ?> placeholder="Não informado" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group" style="color:#b2b2b2">
                                <label>Bio: <br><small style="color:gray;">Aparecerá abaixo da foto de perfil </small></label>
                                <input type="text" class="form-control" rows="2" name='new_bio' <? if (isset($reg_new_bio)) { ?> value="<? echo $reg_new_bio; ?>" <? } else { ?> value="<?php echo $user_info_public['bio'] ?>" <? }; ?> placeholder="Não informado" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                            </div>
                            <div class="form-group" style="color:#b2b2b2">
                                <label>Sobre: <br><small style="color:gray;">Descreva como é profissionalmente</small></label>
                                <input type="text" class="form-control" rows="2" name='new_sobre' <? if (isset($reg_new_sobre)) { ?> value="<? echo $reg_new_sobre; ?>" <? } else { ?> value="<?php echo $user_info_public['sobre'] ?>" <? }; ?> placeholder="Não informado" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                            </div>
                            <div class="form-group" style="color:#b2b2b2">
                                <table width="100%">
                                    <tr>
                                        <td width="50%">
                                            <label>Cachê</label>
                                            <input type="text" class="form-control" name='new_cache' <? if (isset($reg_new_cache)) { ?> value="<? echo $reg_new_cache; ?>" <? } else { ?> value="<?php echo $user_info_public['cache'] ?>" <? }; ?> placeholder="Não informado" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                                        </td>
                                        <td width="50%">
                                            <label>Modelo</label>


                                            <select name="new_acompanhante" class="form-control form-control-sm" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                                                <?php if ($user_info_public['acompanhante'] == 'LOIRA') { ?>
                                                    <option value="LOIRA">LOIRA *</font>
                                                    </option>
                                                    <option value="MORENA">MORENA</font>
                                                    </option>
                                                    <option value="RUIVA">RUIVA</option>
                                                    <option value="NEGRA">NEGRA</option>
                                                <?php } else if ($user_info_public['acompanhante'] == 'MORENA') { ?>
                                                    <option value="MORENA">MORENA *</font>
                                                    </option>
                                                    <option value="LOIRA">LOIRA </font>
                                                    </option>
                                                    <option value="RUIVA">RUIVA</option>
                                                    <option value="NEGRA">NEGRA</option>
                                                <?php } else if ($user_info_public['acompanhante'] == 'RUIVA') { ?>
                                                    <option value="RUIVA">RUIVA *</option>
                                                    <option value="MORENA">MORENA </font>
                                                    </option>
                                                    <option value="LOIRA">LOIRA </font>
                                                    </option>
                                                    <option value="NEGRA">NEGRA</option>
                                                <?php } else if ($user_info_public['acompanhante'] == 'NEGRA') { ?>
                                                    <option value="NEGRA">NEGRA *</option>
                                                    <option value="RUIVA">RUIVA </option>
                                                    <option value="MORENA">MORENA </font>
                                                    </option>
                                                    <option value="LOIRA">LOIRA </font>
                                                    </option>
                                                <?php } else { ?>
                                                    <option value="<?php $user_info_public['acompanhante']; ?>">SELECIONE </option>
                                                    <option value="LOIRA">LOIRA </font>
                                                    </option>
                                                    <option value="MORENA">MORENA</font>
                                                    </option>
                                                    <option value="RUIVA">RUIVA</option>
                                                    <option value="NEGRA">NEGRA</option>
                                                <?php } ?>
                                            </select>

                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group" style="color:#b2b2b2">
                                <table width="100%">
                                    <tr>
                                        <td width="50%">
                                            <label>Data de nascimento</label>
                                            <input type="date" class="form-control" name='new_idade' <? if (isset($reg_new_idade)) { ?> value="<? echo $reg_new_idade; ?>" <? } else { ?> value="<?php echo $user_info_public['idade'] ?>" <? }; ?> placeholder="Não informado" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                                        </td>
                                        <td width="50%">
                                            <label>Nacionalidade</label>
                                            <select name="new_nacionalidade" class="form-control form-control-sm" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">


                                                <option value="Brasil" selected="selected">Brasil</option>
                                                <option value="Afeganistão">Afeganistão</option>
                                                <option value="África do Sul">África do Sul</option>
                                                <option value="Albânia">Albânia</option>
                                                <option value="Alemanha">Alemanha</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antilhas Holandesas">Antilhas Holandesas</option>
                                                <option value="Antárctida">Antárctida</option>
                                                <option value="Antígua e Barbuda">Antígua e Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Argélia">Argélia</option>
                                                <option value="Armênia">Armênia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Arábia Saudita">Arábia Saudita</option>
                                                <option value="Austrália">Austrália</option>
                                                <option value="Áustria">Áustria</option>
                                                <option value="Azerbaijão">Azerbaijão</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrein">Bahrein</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benim">Benim</option>
                                                <option value="Bermudas">Bermudas</option>
                                                <option value="Bielorrússia">Bielorrússia</option>
                                                <option value="Bolívia">Bolívia</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Brunei">Brunei</option>
                                                <option value="Bulgária">Bulgária</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Butão">Butão</option>
                                                <option value="Bélgica">Bélgica</option>
                                                <option value="Bósnia e Herzegovina">Bósnia e Herzegovina</option>
                                                <option value="Cabo Verde">Cabo Verde</option>
                                                <option value="Camarões">Camarões</option>
                                                <option value="Camboja">Camboja</option>
                                                <option value="Canadá">Canadá</option>
                                                <option value="Catar">Catar</option>
                                                <option value="Cazaquistão">Cazaquistão</option>
                                                <option value="Chade">Chade</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Chipre">Chipre</option>
                                                <option value="Colômbia">Colômbia</option>
                                                <option value="Comores">Comores</option>
                                                <option value="Coreia do Norte">Coreia do Norte</option>
                                                <option value="Coreia do Sul">Coreia do Sul</option>
                                                <option value="Costa do Marfim">Costa do Marfim</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Croácia">Croácia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Dinamarca">Dinamarca</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Egito">Egito</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Emirados Árabes Unidos">Emirados Árabes Unidos</option>
                                                <option value="Equador">Equador</option>
                                                <option value="Eritreia">Eritreia</option>
                                                <option value="Escócia">Escócia</option>
                                                <option value="Eslováquia">Eslováquia</option>
                                                <option value="Eslovênia">Eslovênia</option>
                                                <option value="Espanha">Espanha</option>
                                                <option value="Estados Unidos">Estados Unidos</option>
                                                <option value="Estônia">Estônia</option>
                                                <option value="Etiópia">Etiópia</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Filipinas">Filipinas</option>
                                                <option value="Finlândia">Finlândia</option>
                                                <option value="França">França</option>
                                                <option value="Gabão">Gabão</option>
                                                <option value="Gana">Gana</option>
                                                <option value="Geórgia">Geórgia</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Granada">Granada</option>
                                                <option value="Gronelândia">Gronelândia</option>
                                                <option value="Grécia">Grécia</option>
                                                <option value="Guadalupe">Guadalupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernesei">Guernesei</option>
                                                <option value="Guiana">Guiana</option>
                                                <option value="Guiana Francesa">Guiana Francesa</option>
                                                <option value="Guiné">Guiné</option>
                                                <option value="Guiné Equatorial">Guiné Equatorial</option>
                                                <option value="Guiné-Bissau">Guiné-Bissau</option>
                                                <option value="Gâmbia">Gâmbia</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungria">Hungria</option>
                                                <option value="Ilha Bouvet">Ilha Bouvet</option>
                                                <option value="Ilha de Man">Ilha de Man</option>
                                                <option value="Ilha do Natal">Ilha do Natal</option>
                                                <option value="Ilha Heard e Ilhas McDonald">Ilha Heard e Ilhas McDonald</option>
                                                <option value="Ilha Norfolk">Ilha Norfolk</option>
                                                <option value="Ilhas Cayman">Ilhas Cayman</option>
                                                <option value="Ilhas Cocos (Keeling)">Ilhas Cocos (Keeling)</option>
                                                <option value="Ilhas Cook">Ilhas Cook</option>
                                                <option value="Ilhas Feroé">Ilhas Feroé</option>
                                                <option value="Ilhas Geórgia do Sul e Sandwich do Sul">Ilhas Geórgia do Sul e Sandwich do Sul</option>
                                                <option value="Ilhas Malvinas">Ilhas Malvinas</option>
                                                <option value="Ilhas Marshall">Ilhas Marshall</option>
                                                <option value="Ilhas Menores Distantes dos Estados Unidos">Ilhas Menores Distantes dos Estados Unidos</option>
                                                <option value="Ilhas Salomão">Ilhas Salomão</option>
                                                <option value="Ilhas Virgens Americanas">Ilhas Virgens Americanas</option>
                                                <option value="Ilhas Virgens Britânicas">Ilhas Virgens Britânicas</option>
                                                <option value="Ilhas Åland">Ilhas Åland</option>
                                                <option value="Indonésia">Indonésia</option>
                                                <option value="Inglaterra">Inglaterra</option>
                                                <option value="Índia">Índia</option>
                                                <option value="Iraque">Iraque</option>
                                                <option value="Irlanda do Norte">Irlanda do Norte</option>
                                                <option value="Irlanda">Irlanda</option>
                                                <option value="Irã">Irã</option>
                                                <option value="Islândia">Islândia</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Itália">Itália</option>
                                                <option value="Iêmen">Iêmen</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japão">Japão</option>
                                                <option value="Jersey">Jersey</option>
                                                <option value="Jordânia">Jordânia</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Laos">Laos</option>
                                                <option value="Lesoto">Lesoto</option>
                                                <option value="Letônia">Letônia</option>
                                                <option value="Libéria">Libéria</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lituânia">Lituânia</option>
                                                <option value="Luxemburgo">Luxemburgo</option>
                                                <option value="Líbano">Líbano</option>
                                                <option value="Líbia">Líbia</option>
                                                <option value="Macau">Macau</option>
                                                <option value="Macedônia">Macedônia</option>
                                                <option value="Madagáscar">Madagáscar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Maldivas">Maldivas</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Malásia">Malásia</option>
                                                <option value="Marianas Setentrionais">Marianas Setentrionais</option>
                                                <option value="Marrocos">Marrocos</option>
                                                <option value="Martinica">Martinica</option>
                                                <option value="Mauritânia">Mauritânia</option>
                                                <option value="Maurícia">Maurícia</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Moldávia">Moldávia</option>
                                                <option value="Mongólia">Mongólia</option>
                                                <option value="Montenegro">Montenegro</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Moçambique">Moçambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="México">México</option>
                                                <option value="Mônaco">Mônaco</option>
                                                <option value="Namíbia">Namíbia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Nicarágua">Nicarágua</option>
                                                <option value="Nigéria">Nigéria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Noruega">Noruega</option>
                                                <option value="Nova Caledônia">Nova Caledônia</option>
                                                <option value="Nova Zelândia">Nova Zelândia</option>
                                                <option value="Níger">Níger</option>
                                                <option value="Omã">Omã</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestina">Palestina</option>
                                                <option value="Panamá">Panamá</option>
                                                <option value="Papua-Nova Guiné">Papua-Nova Guiné</option>
                                                <option value="Paquistão">Paquistão</option>
                                                <option value="Paraguai">Paraguai</option>
                                                <option value="País de Gales">País de Gales</option>
                                                <option value="Países Baixos">Países Baixos</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Polinésia Francesa">Polinésia Francesa</option>
                                                <option value="Polônia">Polônia</option>
                                                <option value="Porto Rico">Porto Rico</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Quirguistão">Quirguistão</option>
                                                <option value="Quênia">Quênia</option>
                                                <option value="Reino Unido">Reino Unido</option>
                                                <option value="República Centro-Africana">República Centro-Africana</option>
                                                <option value="República Checa">República Checa</option>
                                                <option value="República Democrática do Congo">República Democrática do Congo</option>
                                                <option value="República do Congo">República do Congo</option>
                                                <option value="República Dominicana">República Dominicana</option>
                                                <option value="Reunião">Reunião</option>
                                                <option value="Romênia">Romênia</option>
                                                <option value="Ruanda">Ruanda</option>
                                                <option value="Rússia">Rússia</option>
                                                <option value="Saara Ocidental">Saara Ocidental</option>
                                                <option value="Saint Martin">Saint Martin</option>
                                                <option value="Saint-Barthélemy">Saint-Barthélemy</option>
                                                <option value="Saint-Pierre e Miquelon">Saint-Pierre e Miquelon</option>
                                                <option value="Samoa Americana">Samoa Americana</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="Santa Helena, Ascensão e Tristão da Cunha">Santa Helena, Ascensão e Tristão da Cunha</option>
                                                <option value="Santa Lúcia">Santa Lúcia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serra Leoa">Serra Leoa</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Singapura">Singapura</option>
                                                <option value="Somália">Somália</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Suazilândia">Suazilândia</option>
                                                <option value="Sudão">Sudão</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Suécia">Suécia</option>
                                                <option value="Suíça">Suíça</option>
                                                <option value="Svalbard e Jan Mayen">Svalbard e Jan Mayen</option>
                                                <option value="São Cristóvão e Nevis">São Cristóvão e Nevis</option>
                                                <option value="São Marino">São Marino</option>
                                                <option value="São Tomé e Príncipe">São Tomé e Príncipe</option>
                                                <option value="São Vicente e Granadinas">São Vicente e Granadinas</option>
                                                <option value="Sérvia">Sérvia</option>
                                                <option value="Síria">Síria</option>
                                                <option value="Tadjiquistão">Tadjiquistão</option>
                                                <option value="Tailândia">Tailândia</option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tanzânia">Tanzânia</option>
                                                <option value="Terras Austrais e Antárticas Francesas">Terras Austrais e Antárticas Francesas</option>
                                                <option value="Território Britânico do Oceano Índico">Território Britânico do Oceano Índico</option>
                                                <option value="Timor-Leste">Timor-Leste</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Toquelau">Toquelau</option>
                                                <option value="Trinidad e Tobago">Trinidad e Tobago</option>
                                                <option value="Tunísia">Tunísia</option>
                                                <option value="Turcas e Caicos">Turcas e Caicos</option>
                                                <option value="Turquemenistão">Turquemenistão</option>
                                                <option value="Turquia">Turquia</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Ucrânia">Ucrânia</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Uruguai">Uruguai</option>
                                                <option value="Uzbequistão">Uzbequistão</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Vaticano">Vaticano</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Vietname">Vietname</option>
                                                <option value="Wallis e Futuna">Wallis e Futuna</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                                <option value="Zâmbia">Zâmbia</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group" style="color:#b2b2b2">
                                <table width="100%">
                                    <tr>
                                        <td width="50%">
                                            <label>Idiomas</label>
                                            <input type="text" class="form-control" name='new_idiomas' <?php if (isset($reg_new_idiomas)) { ?> value="<?php echo $reg_new_idiomas; ?>" <? } else { ?> value="<?php echo $user_info_public['idiomas'] ?>" <?php }; ?> placeholder="Não informado" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                                        </td>
                                        <td width="50%">
                                            <label>Localização</label>
                                            <select name="new_localizacao" class="form-control form-control-sm" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                                                <?php if ($user_info_public['localizacao'] == 'SP') { ?>
                                                    <option value="SP">São Paulo *</option>
                                                <?php } else { ?>
                                                    <option value="SP">São Paulo</font>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group" style="color:#b2b2b2">


                                <table width="100%">
                                    <tr>
                                        <td width="50%">
                                            <label>Dominatrix</label>
                                            <select name="new_dominatrix" class="form-control form-control-sm" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                                                <?php if ($user_info_public['dominatrix'] == 'SIM') { ?>
                                                    <option value="SIM">SIM *</option>
                                                    <option value="NAO">NÃO</font>
                                                    </option>
                                                <?php } else if ($user_info_public['dominatrix'] == 'NAO') { ?>
                                                    <option value="NAO">NÃO *</font>
                                                    </option>
                                                    <option value="SIM">SIM</option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $user_info_public['dominatrix']; ?>">SELECIONE</font>
                                                    </option>
                                                    <option value="NAO">NÃO</font>
                                                    </option>
                                                    <option value="SIM">SIM</option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td width="50%">
                                            <label>Massagem tantrica</label>
                                            <select name="new_massagem_tantrica" class="form-control form-control-sm" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                                                <?php if ($user_info_public['massagem_tantrica'] == 'SIM') { ?>
                                                    <option value="SIM">SIM *</option>
                                                    <option value="NAO">NÃO</font>
                                                    </option>
                                                <?php } else if ($user_info_public['massagem_tantrica'] == 'NAO') { ?>
                                                    <option value="NAO">NÃO *</font>
                                                    </option>
                                                    <option value="SIM">SIM</option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $user_info_public['massagem_tantrica']; ?>">SELECIONE</font>
                                                    </option>
                                                    <option value="NAO">NÃO</font>
                                                    </option>
                                                    <option value="SIM">SIM</option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr style="">
                                        <td width="50%">
                                            <label>Tatuadas</label>
                                            <select name="new_tatuadas" class="form-control form-control-sm" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                                                <?php if ($user_info_public['tatuadas'] == 'SIM') { ?>
                                                    <option value="SIM">SIM *</option>
                                                    <option value="NAO">NÃO</font>
                                                    </option>
                                                <?php } else if ($user_info_public['tatuadas'] == 'NAO') { ?>
                                                    <option value="NAO">NÃO *</font>
                                                    </option>
                                                    <option value="SIM">SIM</option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $user_info_public['tatuadas']; ?>">SELECIONE</font>
                                                    </option>
                                                    <option value="NAO">NÃO</font>
                                                    </option>
                                                    <option value="SIM">SIM</option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td width="50%">
                                            <label>Suggar Baby</label>
                                            <select name="new_suggar_baby" class="form-control form-control-sm" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                                                <?php if ($user_info_public['suggar_baby'] == 'SIM') { ?>
                                                    <option value="SIM">SIM *</option>
                                                    <option value="NAO">NÃO</font>
                                                    </option>
                                                <?php } else if ($user_info_public['suggar_baby'] == 'NAO') { ?>
                                                    <option value="NAO">NÃO *</font>
                                                    </option>
                                                    <option value="SIM">SIM</option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $user_info_public['suggar_baby']; ?>">SELECIONE</font>
                                                    </option>
                                                    <option value="NAO">NÃO</font>
                                                    </option>
                                                    <option value="SIM">SIM</option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="50%">
                                            <label>Menage</label>
                                            <select name="new_menage" class="form-control form-control-sm" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                                                <?php if ($user_info_public['menage'] == 'SIM') { ?>
                                                    <option value="SIM">SIM *</option>
                                                    <option value="NAO">NÃO</font>
                                                    </option>
                                                <?php } else if ($user_info_public['menage'] == 'NAO') { ?>
                                                    <option value="NAO">NÃO *</font>
                                                    </option>
                                                    <option value="SIM">SIM</option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $user_info_public['menage']; ?>">SELECIONE</font>
                                                    </option>
                                                    <option value="NAO">NÃO</font>
                                                    </option>
                                                    <option value="SIM">SIM</option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td width="50%">
                                            <label>Desp. Solteiro</label>
                                            <select name="new_desp_solteiro" class="form-control form-control-sm" style="height: 30px;  border-radius:5px; background-color:#2d2d2d; font-size:12px;">
                                                <?php if ($user_info_public['desp_solteiro'] == 'SIM') { ?>
                                                    <option value="SIM">SIM *</option>
                                                    <option value="NAO">NÃO</font>
                                                    </option>
                                                <?php } else if ($user_info_public['desp_solteiro'] == 'NAO') { ?>
                                                    <option value="NAO">NÃO *</font>
                                                    </option>
                                                    <option value="SIM">SIM</option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $user_info_public['desp_solteiro']; ?>">SELECIONE</font>
                                                    </option>
                                                    <option value="NAO">NÃO</font>
                                                    </option>
                                                    <option value="SIM">SIM</option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
 
                               
                             
                            <div class="form-group" style="color:#b2b2b2"> 
                              <input type="text" class="form-control" name="cad_detalhes_id" value="<?php echo $user_info_public['id'];?>" hidden >  
                            <button type="submit" name="editarContaPerfil"   value="salvar" class="btn btn-sm btn-block white" disabled style="color:white; background-color:green; font-size:12px;"> <font size="2px"> SALVAR </font></button>
                            
                            <?php echo $messageEditAccount ?>
                            
                            
                             </div>
                           
                        </form>    
                                 </td> 
                            </tr>
                        </table> 
                                 </div>   
                                   <div class="col-sm-3 col-lg-3">
                                   <table style="width:100%; border:1px solid #242424; background-color:#1b1b1b; text-align:center;">
                            <tr>
                                <td style="height: 40px; width:50%;border:1px solid #242424;  "> ALTERAR DIAS  </td> 
                            </tr>
                            <tr> 
                               <td style="height: 40px; width:50%;border:1px solid #242424; padding: 8px;"> 
        <form method="POST"  action="cad_detalhes.php?cad_detalhes_id=<?php echo $user_info_public['id'];?>" enctype="multipart/form-data" autocomplete="off" id="ConfigCad" style="font-size:12px;">
          <div class="form-group row"> 
   <label class="col-sm-12">
       <input type="text" name="adm_adc_qtd_dias" class="form-control" placeholder="INFORME A QTD TOTAL"    style="border-radius:5px;">
   </div>
 <input type="text" class="form-control" name="adm_alt_id_user_adc" value="<?php echo $user_info_public['id'];?>" hidden >  
<label class="col-sm-12">
    <button type="submit" name="update_qtd_dias_adc" value="adm_adc_dias" class="btn btn-sm btn-block white" style=" color:white; background-color:green; font-size:12px;"> <font size="2px"> DEFINIR </font></button>
</label>
 
  
            
        </form>                         
   
 
 
                                
                                
                                </td> 
                            </tr>
                        </table> 
                        
 

                                 </div> 
                               
               </div> 
         </div>
         <div class="tab-pane" id="tab-002">  
           <div class="col-sm-12 col-lg-12"> 
            <div class="box-body">
		 
					    <div class="box-divider m-a-0"></div>
					    <div class="nav-active-border b-danger top box" style="border-color: red; ">
                        <div class="nav nav-md" >
                           <ul class="nav " style="justify-content: center;display: flex;">
                              <a class="nav-link active" href data-toggle="tab" data-target="#tab4" style="width: 49%; " >
                                 <center><i class="fa fa-camera" ></i> <br><small><font size="1px">FOTOS</font></small> </center>
                              </a> 
                              <a class="nav-link" href data-toggle="tab" data-target="#tab7" style="width: 49%; " >
                                 <center><i class="fa fa-youtube-play"></i><br><small><font size="1px">VÍDEOS</font></small> </center>
                              </a> 
                           </ul>
                        </div>
                     </div>
                     <div class="box-divider m-a-0"></div>
					    <div class="tab-content" >
					       
                  <div class="tab-pane animated fadeIn text-muted active" id="tab4" >
                     <!-- galeria de fotos -->  
                     <main class="main" >
                        <?php 
                           $user_info_public_ROW = $user_info_public['id'];
                           $sql = "SELECT * FROM fotos_videos WHERE id_user = '$user_info_public_ROW' AND tipo ='FP' "; 
                           $result = $db->prepare($sql);
                           $result->execute();
                           while ($row = $result->fetch()) { ?>
                                 <figure class="figure"style="margin:2px;" >
                           <a href="./files/midia/<?php echo $row['file_path'];?>" target="_blank" >    
                           <img class="figure-img" src="./files/midia/<?php echo $row['file_path'];?>" >  
                           </a>
                        </figure>
                             <?php }  ?>
                      
                        
                     </main> 
                     <!-- galeria de fotos -->
                  </div>  
                  
                   <div class="tab-pane animated fadeIn text-muted " id="tab7">
                     <div class="box-header">
                        <style>
                            .p-a-sm {
   padding: 0.0rem !important;  
}
                        </style> 
                        
                         Em desenvolvimento. adicionarei nos próximos dias.
                       
                     </div>
                  </div>
                  
               </div>
					    
					    
			    
			    
            
				</div> 
				</div>
				
				 	
         </div>
         <div class="tab-pane" id="tab-003">
            <div class="p-a-md dker _600"><i class="material-icons md-24"></i> HITÓRICO DE PAGAMENTOS <br><br><div class="box-divider m-a-0 red"></div> </div>
            <div  class="p-a-md col-md-12 ng-pristine ng-valid">
            
            
            
             <table class="table table-bordered" style="background-color: #1f1f1fc2; border:1px solid #111111;">
          <thead>
            <tr style="border:1px solid #111111;">   
                 <th   style="border:1px solid #111111;"><font color="#981d1d">DATA</font></th>
                 <th  style="border:1px solid #111111;"><font color="#981d1d">PLANO</font></th>  
                 <th  style="border:1px solid #111111;"><font color="#981d1d">VALOR</font></th>
                  <th  style="border:1px solid #111111;"><font color="#981d1d">STATUS</font></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($consultaPagamentos as $pagamento){     
            ?>
          <tr >  
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
         <?php }    ?>
          </tbody>
        </table> 
            
            
            </div>
         </div>
         <div class="tab-pane" id="tab-004"> 
            <div  class="p-a-md col-md-12 ng-pristine ng-valid">
                 <div class="col-sm-12 col-lg-4">
                   <table style="width:100%; border:1px solid #242424; background-color:#1b1b1b; text-align:center;">
                            <tr> 
                                <td style="height: 40px; width:50%;border:1px solid #242424;  "> 
                                
                               VÍDEO DE VERIFICAÇÃO
                                </td> 
                            </tr>
                            <tr>  
                               <td style="height: 40px; width:50%;border:1px solid #242424; padding: 8px;"> 
                                
                               <a href="./files/docs/<?php echo $user_info_public['video_verificacao'];?>" target="_blank">
                    <video src="./files/docs/<?php echo $user_info_public['video_verificacao'];?>"  alt="" class="img-responsive" style="border: 5px solid #262626;"></video>
                     
                </a>
                </td>
                              
                                
                            </tr>
                        </table>    
                     
                 </div>
                 <div class="col-sm-12 col-lg-4">
                   <table style="width:100%; border:1px solid #242424; background-color:#1b1b1b; text-align:center;">
                            <tr> 
                                <td style="height: 40px; width:50%;border:1px solid #242424;  "> 
                                
                               DOC. FRENTE
                                </td> 
                            </tr>
                            <tr>  
                               <td style="height: 40px; width:50%;border:1px solid #242424; padding: 8px;"> 
                                
                              <a href="./files/docs/<?php echo $user_info_public['doc_frente'];?>" target="_blank">
                    <img src="./files/docs/<?php echo $user_info_public['doc_frente'];?>"  alt="" class="img-responsive" style="border: 5px solid #262626;">
                </a>
                </td>
                              
                                
                            </tr>
                        </table>    
                     
                 </div>
                 <div class="col-sm-12 col-lg-4">
                   <table style="width:100%; border:1px solid #242424; background-color:#1b1b1b; text-align:center;">
                            <tr> 
                                <td style="height: 40px; width:50%;border:1px solid #242424;  "> 
                                
                               DOC. VERSO
                                </td> 
                            </tr>
                            <tr>  
                               <td style="height: 40px; width:50%;border:1px solid #242424; padding: 8px;"> 
                                
                          <a href="./files/docs/<?php echo $user_info_public['doc_verso'];?>" target="_blank">
                    <img src="./files/docs/<?php echo $user_info_public['doc_verso'];?>"  alt="" class="img-responsive" style="border: 5px solid #262626;">
                </a>
                </td>
                              
                                
                            </tr>
                        </table>    
                     
                 </div>
               
                        
                
                
                 
            </div>
         </div> 
      </div> 
   </div>
   <div class="col-sm-3 col-lg-2" style="padding-left:5px;">
    
    
     <table style="width:100%; border:1px solid #242424; background-color:#151515; text-align:center;">
                            <tr> 
                                <td style="height: 40px; width:50%;border:1px solid #242424;  "> 
                                
                                <table style="border:1px solid #242424; width:100%;">
                                    <tbody><tr>
                                        <td style="border-top:0px; text-align:center;">
                                     <br>
                                            <img src="./files/profile/<?php echo $user_info_public['profile_photo']; ?>" style=" border-radius:50px; border:1px solid red; max-width: 100%; object-fit: cover;  width: 90px;  height: 90px;"> 
                                <br><br>
                                <b><?php echo $user_info_public['firstname'];?> <?php echo $user_info_public['lastname'];?></b>
                                <br><br>
                                                           
                                     
                                        </td>
                                    </tr>
                                </tbody></table>
                                
                                
                                </td> 
                            </tr>
                            <tr>  
                               <td style="height: 40px; width:50%;border:1px solid #242424; padding: 8px;"> 
                                
                                <BR>
                                    <div class="p-y">
      <div class="nav-active-border left b-danger" style="border-left-color:red; text-align:left;">
            <ul class="nav nav-sm">
               <li class="nav-item"><a class="nav-link block active" href="" data-toggle="tab" data-target="#tab-001"><i class="fa fa-cogs" style="font-size:20px;"></i>  CONFIGURAÇÕES </a> </li>
               <li class="nav-item"><a class="nav-link block" href="" data-toggle="tab" data-target="#tab-002"><i class="fa fa-camera" style="font-size:20px;"></i>  GALERIA </a></li>
               <li class="nav-item"><a class="nav-link block" href="" data-toggle="tab" data-target="#tab-003"><i class="material-icons md-24"></i> PAGAMENTOS</a></li>
               <li class="nav-item"><a class="nav-link block" href="" data-toggle="tab" data-target="#tab-004"><i class="fa fa-list-alt" style="font-size:20px;"></i> DOCUMENTOS </a></li> 
            </ul>
       
      </div>
      
   </div>
   <a href="../perfil/<?echo $user_info_public['username'];?>" target="_blank" class="btn btn-sm warn" style="width:120px; background-color:#2f2f2f; font-size:11px; "><i class="material-icons md-24"></i>  VER PERFIL</a>
                                
                                 </td>
                              
                                
                            </tr>
                        </table> 
    
    
   
</div>
   
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