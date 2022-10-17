<?php

include_once("includes/controller.php");
error_reporting(0);
$user_info = $functions->getUserInfo($session->username);
$plan_info = $functions->getPlan($_SESSION['plan_id']);
var_dump($_SESSION['plan_id']);

if (!isset($_SESSION['plan_id'])) {
  header("Location: account.php");
}




?>
<html lang="pt-br" class="h-100">

<head>
  <meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Pagamento</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <link sizes="32x32" href="imagens/favicon.png" rel="icon">
  <meta name="title" content="" />
  <meta content="pt-br" http-equiv="Content-Language">
  <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://nossolove.com/account/pagamento_assets/css/app.css">
  <link rel="stylesheet" href="https://nossolove.com/account/pagamento_assets/assets/temas/site/css/tema.css?v=1.9">
  <link rel="stylesheet" href="https://nossolove.com/account/pagamento_assets/css/floating-labels.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="https://nossolove.com/account/pagamento_assets/assets/temas/painel/looper/vendor/open-iconic/css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="https://nossolove.com/account/pagamento_assets/assets/temas/painel/looper/vendor/fontawesome/css/all.css">
  <link rel="stylesheet" href="https://nossolove.com/account/pagamento_assets/pagamento/Public/css/semantic.min.css">
  <link rel="stylesheet" href="https://nossolove.com/account/pagamento_assets/pagamento/Public/css/tab.min.css">

  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  
  <style type="text/css">
    #form_fechar_pedido fieldset p label span.error {
      color: red;
    }

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
      background-color: #f4f4f4 !important;
      border-top: 1px solid #cfcfcf;
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
    <img src="https://nossolove.com/account/pagamento_assets/assets/imagens/mercado-pago-logo.png" height="45px">
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
  <div id="processando" style="display: none !important;" class="d-flex justify-content-center align-items-start pt-4">
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
  <div id="app" style="<?= $display; ?>">
    <main id="conteudo" class="flex-shrink-0">
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
                              <td style="width:100%; font-size:13px;">
                                <b><?php echo  $user_info['firstname'] . ' ' . $user_info['lastname']; ?></b> <br><br>
                                EMAIL: <?php echo  $user_info['email']; ?>
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
                              <td style="width:70%; color: #44C485;"><b><?= $plan_info['nomePlano']; ?></b></td>
                              <td style="width:30%; color:#44C485; text-align: right;"><b>RS  <?=number_format($plan_info['valorPlano'],2,",",",");?></b></td>
                            </tr>
                          </table>
                          <table>
                            <tr>
                              <td  style="width:100%;color:gray; font-size:12px;"> 
                              <hr>
                              <span style="font-size:15px; color:#44C485;" ;>
                                  <center> PROMOÇÃO </center>
                                  AO ASSINAR ESSE PLANO VOCÊ GANHA 21 DIAS DE TESTE GRÁTIS!
                              </span> 
                              <hr>
                               -  Após isso renovação semanal automática. <br>
                               -  Cancele ou altere o plano no fim de cada período da assinatura.<br>
                               -  Será cobrado uma taxa de R$ 1,00 ( um real ) para ativação da assinatura.<br>
                               <br>
                               <span style="color:gray; font-size:11px;">  
                               Ao confirmar pagamento, o valor de <b>R$  <?=number_format($plan_info['valorPlano'],2,",",",");?></b> será cobrado em seu cartão, dando início a sua assinatura. Seus dados serão utilizados de forma totalmente segura para: Identificar seu perfil, histórico de pagamentos e renovação automática de assinatura.
                               <br><br>
                               Você também pode alterar ou cancelar seu Plano e Assinatura a qualquer momento acessando o menu assinaturas em seu perfil. 
                               </span>
                            </td>
                            </tr>
                          </table>
                          <hr>
                          <div class="field" style=" ">
                            <center><a onclick="history.back()" class="ui button" style=" height:35px; border-radius: 20px;"> VOLTAR</a></center>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
                          <?php 
                            if (isset($_SESSION['alert']) == "success") {
                            ?>
                            <script>
                                Swal.fire({
                                  title: 'Pedido aprovado!',
                                  icon: 'success',
                                  html:<?=$_SESSION['msg'];?>,
                                  showCloseButton: false,
                                  showCancelButton: false,
                                  focusConfirm: false,
                                  confirmButtonText:'Continuar',
                                  allowOutsideClick: false,
                                  allowEscapeKey: false
                                }).then(function() {
                                    window.location = "pagamento_mp/controllers/redirect.php";
                               })    
                            </script>
                            <?php 
                            }
                            if(isset($_SESSION['msg'])) {
                              echo '<div class="alert alert-'.$_SESSION['alert'].'">'.$_SESSION['msg'].'</div>';
                              echo '<script>';
                              echo "Swal.fire(
                                  '',
                                  '".$_SESSION['msg']."',
                                  '".$_SESSION['alert']."'
                                )";
                              echo '</script>';
                              unset($_SESSION['msg']);
                            }
                            ?>
                          <form method="post" action="pagamento_mp/controllers/PaymentController.php?plan_id=<?=$_SESSION['plan_id'];?>" id="pay" name="pay" class="form" autocomplete="off" required>
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
                                
                                <table width="100%">
                                  <tr>
                                    <td style="text-align:center;"> <img src="https://nossolove.com/account/pagamento_assets/assets/imagens/bandeiras-mp-1.png" height="38px"> </td>
                                  </tr>
                                </table>
                                <hr>
                                <div class="field" style="margin-bottom:10px;">
                                  <label for="email" class="form-label">Email</label>
                                  <input type="email" class="form-control" id="email" name="email" placeholder="you@email.com" value="<?=$user_info['email'];?>" readonly>
                                  <input type="hidden" id="plan" value="<?=$_SESSION['plan_id'];?>" readonly>
                                </div>  
                                <div class="field" style="font-size: 14px;display:inline-block;" hidden>
                                  <label for="docType">ㅤ</label>
                                  <select id="docType" class="form-control dropdown" data-checkout="docType" disabled></select>
                                </div>
                                
                                <div class="field" style="margin-bottom:10px;">
                                  <label for="docNumber">Número do documento:</label>
                                  <input type="tel" class="form-control" id="docNumber" data-checkout="docNumber" name="docNumber" maxlength="11" placeholder="CPF" required onkeypress="return event.charCode >= 48 && event.charCode <= 57" required />
                                </div>
                                <div class="field" style="margin-bottom:10px;">
                                  <label class="form-text text-gray" for="numero">Nome do Titular:</label>
                                 <input type="text" id="cardholderName" class="form-control" data-checkout="cardholderName" name="cardholderName" placeholder="" required />
                                </div>
                                <div class="field" style="margin-bottom:10px;">
                                  <label class="form-text text-gray" for="numero">N&uacute;mero do cart&atilde;o</label>
                                  <input type="text" id="cardNumber" class="form-control" data-checkout="cardNumber" name="cardNumber" placeholder="0000 0000 0000 0000" required />
                                  
                                </div>
                                <div class="field col-3" style="margin-bottom:10px;display:inline-block;padding-left:0;     padding-right: 0px;">
                                  <label class="form-text text-gray" for="validade_mes">Validade</label>
                                  <select  id="cardExpirationMonth" required="required" class="form-control dropdown" name="cardExpirationMonth" data-checkout="cardExpirationMonth" placeholder="11" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off>
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
                                  <select id="cardExpirationYear" required="required" class="form-control dropdown" name="cardExpirationYear" data-checkout="cardExpirationYear"  autocomplete=off>
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
                                  <input class="form-control" type="tel" id="securityCode" maxlength="4" placeholder="Verificador" name="securityCode" required="required" data-checkout="securityCode" placeholder="123" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off required>
                                  <span class="ccv"></span>
                                </div>
                            
                                <div class="field" style="margin-bottom:10px;">
                                  <label class="form-text text-gray" for="parcelas">Parcelas</label>
                                  <select id="installments" class="form-control dropdown" class="form-control" name="installments">
                                    <option value="">Digite o n&uacute;mero do cart&atilde;o</option>
                                  </select>
                                </div>
                                
                                
                                
                                <div class="ui divider"></div>
                                
                                <input type="hidden" name="amount" value="<?=$_SESSION['valor_plano'];?>" id="amount" />
                                <input type="hidden" name="description" />
                                <input type="hidden" name="paymentMethodId" /> 
                
                                <div class="field" style="margin-bottom:10px;">
                                  <button type="submit" class="ui green button" id="btn-fechar-pedido"  id="pagar" onclick="scard()" tabindex="0" style="margin-bottom:20px;">Confirmar Pagamento</button>
                                  <span style="color:gray; font-size:11px;">
                                    <center>
                                      Ao clicar no botão <b> Confirmar pagamento </b> será cobrado R$ <?=number_format($plan_info['valorPlano'],2,",",",");?> em seu cartão.
                                    </center>
                                  </span>
                                </div>
                                
                                
                              </div>
                            </div>
                          </div>
                          </form>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </main>
  </div>
  <footer style="">
    <div class="container p-2">
      <div class="row">
        <div class="col-12 col-sm-12">
          <table style="width:100%; text-align:center;">
            <tr>
              <td style="width:50%; font-size:12px; color:gray; ">
                <img src="https://nossolove.com/account/pagamento_assets/assets/imagens/selo-seguro.png" height="120px;">
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
  <script src="js/functions.js?v=<?= rand(1, 99999999); ?>"></script>

</body>

</html>