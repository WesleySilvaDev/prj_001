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
   $form = new Form;
      
   if($user_info['grupo'] == 'DEVELOPER' or $user_info['grupo'] =='ADMIN'){
       
   }else{
       header("Location: index.php");
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
              
              <li class="active">
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
              <li class="">
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
                  <img src="img/COR.png" alt="." style="margin-top:8px; height:45px "class="logoMobile" style=""  > <br>
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
		<div class="col-sm-12 col-md-5 col-lg-4">
			<div class="row">
				<div class="col-xs-6">
			        <div class="box p-a">
			          <div class="pull-left m-r">
			          	<i class="material-icons md-24" style="font-size:35px;"></i>
			          </div>
			          <div class="clear">
			          	<div class="text-muted">Modelos</div>
			            <h4 class="m-a-0 text-md _600"><a href><?=$configs->getAllRegisters();?></a></h4>
			          </div>
			        </div>
			    </div>
			    <div class="col-xs-6">
			        <div class="box p-a">
			          <div class="pull-left m-r">
			          	<i class="material-icons md-24" style="font-size:35px;"></i>
			          </div>
			          <div class="clear">
			          	<div class="text-muted">Cadastros</div>
			            <h4 class="m-a-0 text-md _600"><a href><?=$configs->getRegistersPending();?></a></h4>
			          </div>
			        </div>
			    </div>
			    <div class="col-xs-12">
			        <div class="box p-a">
			          <div class="pull-left m-r">
			          	<i class="material-icons md-24" style="font-size:35px;"></i>
			          </div>
			          <div class="clear">
			          	<div class="text-muted">Pagamentos recusados</div>
			            <h4 class="m-a-0 text-md _600"><a href>0</a></h4>
			          </div>
			        </div>
			    </div>
			    <div class="col-xs-12">
			        <div class="box p-a">
			          <div class="pull-left m-r">
			          	<i class="fa fa-credit-card" style="font-size:25px;"></i>
			          </div>
			          <div class="clear">
			          	<div class="text-muted">Assinaturas ativas</div>
			            <h4 class="m-a-0 text-md _600"><a href><?=$configs->getSignatures();?></a></h4>
			          </div>
			        </div>
			    </div> 
		    </div>
	    </div>
	    <div class="col-sm-12 col-md-7 col-lg-8">
	    	<div class="row-col box dark bg">
		        <div class="col-sm-8">
	        		<div class="box-header">
			          <h3>Acessos</h3>
			          <small>Histórico de acessos ultimos 7 dias</small>
			        </div>
			        <div class="box-body">
			            <div ui-jp="plot" ui-refresh="app.setting.color" ui-options="
			              [
			                { 
			                  data: [[1, 6.1], [2, 6.3], [3, 6.4], [4, 6.6], [5, 7.0], [6, 7.7], [7, 8.3]], 
			                  points: { show: true, radius: 0}, 
			                  splines: { show: true, tension: 0.45, lineWidth: 2, fill: 0 } 
			                },
			                { 
			                  data: [[1, 5.5], [2, 5.7], [3, 6.4], [4, 7.0], [5, 7.2], [6, 7.3], [7, 7.5]], 
			                  points: { show: true, radius: 0}, 
			                  splines: { show: true, tension: 0.45, lineWidth: 2, fill: 0 } 
			                }
			              ], 
			              {
			                colors: ['#0cc2aa','#fcc100'],
			                series: { shadowSize: 3 },
			                xaxis: { show: true, font: { color: '#ccc' }, position: 'bottom' },
			                yaxis:{ show: true, font: { color: '#ccc' }},
			                grid: { hoverable: true, clickable: true, borderWidth: 0, color: 'rgba(120,120,120,0.5)' },
			                tooltip: true,
			                tooltipOpts: { content: '%x.0 is %y.4',  defaultTheme: false, shifts: { x: 0, y: -40 } }
			              }
			            " style="height:162px" >
			            </div>
			        </div>
		        </div> 
		    </div>
	    </div>
	</div>
	<div class="row">
	    
	    
	    <div class="col-md-6 col-xl-12">
	        <div class="box">
	          <div class="box-header">
	            <h3>TOP Models</h3>
	            <small>Histórico de perfils mais vistos</small>
	          </div> 
	          <div class="box-body">
	            <div ui-jp="plot" ui-refresh="app.setting.color" ui-options="
	              [
	                { data: [[1, 2], [2, 4], [3, 5], [4, 7], [5, 6], [6, 4], [7, 5], [8, 4]] },
	                { data: [[1, 2], [2, 3], [3, 2], [4, 5], [5, 4], [6, 3], [7, 4], [8, 2]] }
	              ], 
	              {
	                bars: { show: true, fill: true,  barWidth: 0.3, lineWidth: 2, order: 1, fillColor: { colors: [{ opacity: 0.2 }, { opacity: 0.2}] }, align: 'center'},
	                colors: ['#0cc2aa','#fcc100'],
	                series: { shadowSize: 3 },
	                xaxis: { show: true, font: { color: '#ccc' }, position: 'bottom' },
	                yaxis:{ show: true, font: { color: '#ccc' }},
	                grid: { hoverable: true, clickable: true, borderWidth: 0, color: 'rgba(120,120,120,0.5)' },
	                tooltip: true,
	                tooltipOpts: { content: '%x.0 is %y.4',  defaultTheme: false, shifts: { x: 0, y: -40 } }
	              }
	            " style="height:200px" >
	            </div>
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