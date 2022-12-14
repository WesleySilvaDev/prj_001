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
                header("Location: admin.php");
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
       <script>
         if ( window.history.replaceState ) {3
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
   <body class="pace-done grey" style="background-color: #0d0d0d;">
      <div class="app" id="app"> 
      <div id="content" class="app-content box-shadow-z0" role="main">
      <div class="app-header white box-shadow" style="background-color: #000000;">
            
         </div> 
      <div ui-view class="app-body" id="view">
         <!-- ############ PAGE START-->
         <div class="padding" style="margin-top: -60px; background-color: #0d0d0d;">
           <table style="width:100%">
                                      <tr> 
                                          <td  style="width:100%; text-align:center;">
                                             <a href="index.php">
                         <img src="../account/img/COR.png" alt="." style="margin-top:8px; margin-left:-19px; height:45px " style=""  ><br>
                     <font size="2" color="gray" style="font-family: Abhaya Libre Regular; margin-left:-19px;">As melhores acompanhantes de luxo</font> 
                     </a>  
                                          </td>  
                                      </tr>
                                  </table>
                      
                     <?php
                        // TERMOS 
                        if($user_info['termos_aceitos']=='NAO'){?>
                        
                     <div class="tab-content " style="border-color: red; ">
                         
                        <div class="tab-pane animated fadeIn text-muted active" id="tab1" aria-expanded="true" >
                           <div class="box row-col" style="min-height:450px">
                              <div class="box-header b-b">
                                 <font size="2px"> TERMOS & POL??TICAS DE PRIVACIDADE </font>
                              </div>
                              <div class="row-row dker">
                                 <div class="row-body">
                                    <div class="row-inner">
                                       <div class="p-a-md">
                                          <div class="m-b">
                                             <font size="2px" color="gray"> <small> 
Oi! Fico feliz em ter seu interesse! Antes de usar nossos servi??os, reserve um tempo para ler nossos Termos de Uso e Servi??o e entender as regras que regem nosso relacionamento com voc??. Abaixo, vamos esclarecer alguns pontos que julgamos importantes. 

Se voc?? tiver alguma d??vida sobre algum ponto discutido ou n??o abordado neste documento, sinta-se ?? vontade para nos contatar em contato@nossolove.com.<br><br>

1. Defini????o: Nesta ferramenta, entendemos as seguintes express??es de acordo com as seguintes defini????es:<br> 

Nosso Love: nossolove PROVEDOR DE CONTEUDO NA INTERNET LTDA, sociedade empresarial de responsabilidade limitada, inscrita no CNPJ sob o n??. 37.426.982/0001-98, com sede na cidade de S??o Paulo/SP, na Avenida Paulista, n?? 171, Edf. D. Pedro I de Alcanta - Pavimento 04 SALA E3 VG, CEP 01.311-904.

USU??RIOS:<br>

a. Visitante: Pessoa f??sica cadastrada na plataforma para acessar conte??dos publicit??rios fornecidos pelos anunciantes na plataforma.<br>

b. ANUNCIANTE: A pessoa f??sica cadastrada na plataforma, por meio do uso da plataforma, divulgar?? seu an??ncio ao visitante.<br>

PLATAFORMA: Sistema de aplica????es web em que ?? alocado espa??o publicit??rio para an??ncios, onde todos os usu??rios podem visualizar an??ncios publicados por ANUNCIANTES cadastrados na plataforma Nosso Love.<br>

Tratamento de dados: toda opera????o que o Nosso Love realiza com rela????o aos dados pessoais do usu??rio de acordo com o artigo 5?? inciso X da Lei n?? 13.709 de 2018, tais como opera????es que envolvam a coleta, produ????o, recep????o, classifica????o, uso, acesso, reprodu????o, transmiss??o , distribuir, processar, arquivar, armazenar, apagar, avaliar ou controlar informa????es, modificar, comunicar, transmitir, disseminar ou extrair.<br>
<br>
2. ADES??O:<br>
Este documento define as condi????es de uso do servi??o da PLATAFORMA e ?? um contrato entre o usu??rio e o Nosso Love. AO USAR OS SERVI??OS DISPON??VEIS PELA PLATAFORMA, VOC?? CONCORDA EXPRESSAMENTE COM TODOS OS TERMOS E CONDI????ES CONTIDOS NESTE DOCUMENTO E COM AS LEIS APLIC??VEIS A ESTA ESP??CIE.<br>
Voc?? entende e concorda que Nosso Love levar?? em considera????o sua utiliza????o dos servi??os prestados, ou seja, sua aceita????o destes termos e todas as demais disposi????es legais relacionadas a esta esp??cie.<br>

Ao aceitar os termos deste instrumento, o usu??rio autoriza expressamente o tratamento de seus dados para garantir a manuten????o e bom desempenho da funcionalidade da plataforma.<br><br>

Ao faz??-lo, o usu??rio concorda integralmente em compartilhar os dados coletados e processados pelo Nosso Love com outras empresas pertencentes ao seu grupo econ??mico ou seus prestadores de servi??os de acordo com os termos desta ferramenta.<br><br>

SE VOC?? N??O CONCORDA COM OS TERMOS AQUI, N??O ACESSE, VISUALIZE, BAIXE OU USE QUALQUER P??GINA, CONTE??DO, INFORMA????O OU SERVI??OS DA NOSSO LOVE DE QUALQUER FORMA.<br><br>

Estes termos podem ser lidos na plataforma a qualquer momento em https://nossolove.com/terms.php<br><br>

3. Quem n??s somos e o que n??s fazemos:<br>
A Nosso Love ?? uma empresa privada que disponibiliza uma plataforma web atrav??s do link https://nossolove.com/ com atribui????o de espa??o para publicidade. Nela, os ANUNCIANTES exibem seu an??ncio e adicionam informa????es que julgam relevantes ao conte??do do an??ncio, para que os visitantes possam pesquisar na PLATAFORMA para encontrar an??ncios que se encaixem no perfil desejado.<br>

4. Condi????es Gerais de Uso:<br>
Os usu??rios declaram que atendem aos seguintes pr??-requisitos para utiliza????o da plataforma:<br>

(I) Ser maior de idade e absolutamente capaz.<br><br>

(II) Ter a capacidade de se comprometer com estes termos e fornecer todas as informa????es necess??rias para se registrar. Declara????o de que esses servi??os s??o prestados de forma id??nea e verdadeira e est??o sujeitos a responsabilidade civil e criminal.<br><br>

(III) Ter um n??mero de celular e endere??o de e-mail v??lidos, Nosso Love pode entrar em contato com voc??, se necess??rio.<br><br>

Nosso Love ?? apenas uma plataforma de aloca????o de espa??o publicit??rio e sua responsabilidade limita-se ao correto funcionamento da plataforma e sua funcionalidade, n??o sendo de acordo com este instrumento Nosso Love se responsabiliza por: <br>
(i) qualquer negocia????o realizada entre usu??rios; <br>
(ii) verifica????o dos anunciantes (3) A qualidade do an??ncio; <br>
(IV) A execu????o de qualquer pagamento acordado entre os usu??rios; (7) Quaisquer outras a????es ou fatos decorrentes das a????es dos usu??rios.<br><br>

Nosso Love permite que visitantes e anunciantes entrem em contato diretamente sem qualquer interven????o, seja na negocia????o ou na execu????o do conte??do negociado, Nosso Love n??o ?? intermedi??rio ou fornecedor de qualquer servi??o ou produto anunciado na plataforma, nem este Empregador/ representante/agente de qualquer anunciante da lista.<br>

Nosso Love n??o ?? afiliado a anunciantes cadastrados e Nosso Love n??o se responsabiliza por quaisquer danos que os anunciantes possam causar aos visitantes ou terceiros por sua conduta atrav??s da Plataforma.<br>

Da mesma forma, Nosso Love n??o tem rela????o com visitantes cadastrados e Nosso Love n??o se responsabiliza por quaisquer danos que possam ser causados a anunciantes ou terceiros pelas a????es dos visitantes atrav??s da plataforma.<br>

O Nosso Love n??o medeia quaisquer negocia????es que possam ocorrer entre os usu??rios e ?? o ??nico respons??vel por ajustar as condi????es de neg??cios por eles contratadas, tais como valor, qualidade, forma, dura????o e outros pontos que julguem necess??rios.<br>

O Nosso Love n??o interv??m em quaisquer negocia????es que possam resultar entre usu??rios e ?? o ??nico respons??vel por ajustar quaisquer condi????es para a condu????o das negocia????es praticadas, tais como valor, qualidade, forma, dura????o e outros pontos que julgar necess??rios.<br>

Ao se cadastrar, os usu??rios poder??o utilizar todos os recursos dispon??veis na plataforma e, portanto, declaram que leram, entenderam e aceitaram todos os dispositivos contidos nestes termos de uso.<br>

Por n??o constar de uma transa????o que possa ser firmada entre usu??rios, Nosso Love n??o pode obrigar os usu??rios a cumprir obriga????es que possam ter na negocia????o.<br>

Os usu??rios comprometem-se a usar as fun????es da plataforma de boa f??, de acordo com as leis, ??tica e boas pr??ticas existentes.<br>

O usu??rio reconhece expressamente que, por meio desta ferramenta, obt??m uma licen??a do Nosso Love para uso da plataforma, a qual ?? intransfer??vel durante o per??odo de cumprimento deste contrato, e que ?? proibido sublicenciar os termos de uso no pa??s ou no exterior , e em caso de desacordo com o disposto neste instrumento Utilize a plataforma abaixo.<br>

Os usu??rios s??o os ??nicos respons??veis pela seguran??a de suas senhas e do uso de seus cadastros na plataforma, portanto, aconselhamos que n??o compartilhem tais informa????es com terceiros, caso essas informa????es sejam perdidas ou hackeadas por qualquer motivo, os usu??rios devem passar imediatamente para contato @nossolove.com Notifica Nosso Love para resolver o problema.<br>

Somente o usu??rio ?? respons??vel por quaisquer danos causados a terceiros, outros usu??rios, a plataforma ou o pr??prio Nosso Love devido ao uso das funcionalidades da plataforma.<br>

Os usu??rios n??o devem usar a Plataforma para qualquer finalidade ou meio ilegal, difamat??rio, discriminat??rio, abusivo, ofensivo, ofensivo, prejudicial, vexat??rio, enganoso, calunioso, violento, ou para assediar, amea??ar ou usar identidades falsas, ou seja, qualquer desculpa para uso que possa possa prejudicar o Nosso Love, outros usu??rios ou terceiros.<br>

Em nenhuma hip??tese a OUR LOVE ser?? respons??vel por quaisquer danos causados aos usu??rios devido ?? indisponibilidade tempor??ria da plataforma.<br>

O Usu??rio deve possuir todos os softwares e hardwares necess??rios para acessar a Plataforma, incluindo, mas n??o se limitando a um computador/dispositivo m??vel com acesso ?? internet, sendo o Nosso Love o ??nico respons??vel por disponibilizar a Plataforma ao Usu??rio nos termos deste instrumento.<br>

A utiliza????o da plataforma pelos utilizadores est?? condicionada ao seu registo pr??vio e ao cumprimento das disposi????es contidas neste documento.<br><br>

5. CADASTRO:<br>
Nosso Love oferece servi??os para pessoas absolutamente capazes.<br>

Para que um anunciante se cadastre na plataforma, ele deve fornecer ao Nosso Love os seguintes dados: nome, unidade, n??mero do CPF, foto clara do documento de identifica????o (frente e verso), v??deo de apresenta????o do anunciante, celular.<br>

Para que os visitantes possam se cadastrar na plataforma, eles devem fornecer ao Nosso Love seu endere??o de e-mail.<br>

Para o uso normal da plataforma, os usu??rios devem se cadastrar e preencher todos os dados exigidos pela plataforma no momento do cadastro.<br>

Fornecer, atualizar e garantir a veracidade dos dados cadastrais ?? de responsabilidade exclusiva do usu??rio, n??o responsabilizando o Nosso Love por qualquer tipo de responsabilidade civil e criminal por dados inver??dicos, incorretos ou incompletos fornecidos pelo usu??rio.<br>

A Nosso Love reserva-se o direito de utilizar todos os meios v??lidos e poss??veis para identificar os seus anunciantes e solicitar outros dados e documentos que considere relevantes para a verifica????o das informa????es prestadas. Nesse caso, a utiliza????o da plataforma pelo anunciante est?? condicionada ao envio de quaisquer documentos solicitados.<br>

Nosso Love reserva-se o direito de suspender tempor??ria ou permanentemente o usu??rio respons??vel pelo cadastro sem pr??vio aviso caso o cadastro seja considerado como contendo dados falsos ou inver??dicos. Em caso de suspens??o, o usu??rio n??o ter?? direito a qualquer indeniza????o ou compensa????o de qualquer natureza por perdas e danos, lucros cessantes ou danos morais.<br>

O usu??rio tem livre acesso ??s informa????es coletadas pelo Nosso Love e informa????es sobre o tratamento dos dados, mediante solicita????o para contato@nossolove.com ou por meio de seu cadastro na plataforma, podendo solicitar sua exclus??o a qualquer momento.<br>

O objetivo da coleta de dados do usu??rio ?? identific??-lo e capacit??-lo a utilizar a plataforma corretamente, desta forma o Nosso Love poder?? garantir a qualidade do servi??o licenciado.<br>

Os usu??rios podem exercer o direito de n??o fornecer dados ao Nosso Love a qualquer momento. No entanto, neste caso, Nosso Love n??o tem obriga????o de fornecer aos usu??rios a funcionalidade de qualquer plataforma.<br>

Ao concordar com os termos desta ferramenta, o utilizador declara expressamente que entende que a recolha dos seus dados ?? essencial para o bom funcionamento da plataforma, autorizando desde j?? o Nosso Love para o tratamento de dados.<br>

?? expressamente proibida a cria????o de m??ltiplos registos por utilizador na plataforma. No caso de m??ltiplos cadastros por um ??nico usu??rio, Nosso Love reserva-se o direito, a seu exclusivo crit??rio, de desabilitar todos os cadastros existentes sob aquele nome de usu??rio sem compensa????o e sem pr??vio consentimento ou comunica????o, podendo n??o aceitar o estabelecido no novo cadastro usu??rio da plataforma.<br>

Os usu??rios acessar??o seu cadastro na plataforma com login e senha, comprometendo-se a n??o notificar terceiros sobre esses dados e a assumir total responsabilidade pelo seu uso.<br>

Os usu??rios se comprometem a notificar imediatamente o Nosso Love sobre qualquer uso n??o autorizado de sua conta atrav??s dos canais de contato mantidos pelo Nosso Love na Plataforma. O usu??rio ser?? o ??nico respons??vel pelas a????es realizadas em sua conta, pois o acesso s?? ?? poss??vel mediante o uso de sua senha propriet??ria.<br>

O Usu??rio compromete-se a notificar imediatamente o Nosso Love atrav??s dos canais de contato mantidos pelo Nosso Love na Plataforma, caso outros usu??rios tomem conhecimento de quaisquer viola????es que possam causar danos ao Usu??rio da Plataforma, este ??ltimo, Nosso Love ou outros terceiros.<br>

Em nenhuma circunst??ncia o cadastro do usu??rio ser?? transferido, vendido, alugado ou transferido de outra forma. <br>

Os usu??rios n??o podem usar apelidos na Plataforma que sejam semelhantes ao nome Nosso Love, nem usar apelidos que sugiram ou impliquem que esteja relacionado ao Nosso Love. <br>

Nosso Love poder??, a seu exclusivo crit??rio, excluir, desabilitar, limitar o uso do Servi??o, suspender por tempo indeterminado, bloquear cadastros de usu??rios considerados ofensivos ou violar os termos desta Ferramenta, sem aviso pr??vio ou indeniza????o ou legisla????o vigente.<br>

Nosso Love se reserva o direito de n??o permitir que usu??rios que tenham sido cancelados, desabilitados, bloqueados, exclu??dos ou suspensos da plataforma se registrem novamente. N??o ?? permitida a cria????o de novos cadastros por quem cancelar, bloquear, desabilitar, excluir ou suspender o cadastro original por viola????o da pol??tica da PLATAFORMA ou da legisla????o vigente.<br>

Nosso Love reserva-se o direito de recusar unilateralmente qualquer solicita????o de cadastro de um usu??rio na plataforma e de cancelar, desabilitar, bloquear, excluir ou suspender o uso de um cadastro previamente aceito sem pr??vio aviso, consentimento ou compensa????o.<br>

Ao concordar com esta ferramenta, o usu??rio declara estar ciente de que ?? o ??nico respons??vel pelo seu cadastro e que qualquer dano causado pela inser????o de informa????es desatualizadas, imprecisas ou inver??dicas n??o pode ser atribu??do ao Nosso Love ou PLATAFORMA.<br>

6. DAS FUNCIONALIDADES:
Nosso Love pode editar e/ou excluir recursos existentes e adicionar novos recursos ?? Plataforma a qualquer momento, sem aviso pr??vio ou compensa????o.<br>

7. DAS OBRIGA????ES DOS USU??RIOS:
Os usu??rios comprometem-se a atualizar seus dados cadastrais e ser notificados de quaisquer altera????es verificadas, principalmente seus dados de pagamento, bem como seus endere??os de e-mail e telefone, que ser??o o principal canal de comunica????o entre o Nosso Love e os usu??rios.<br>

Os usu??rios declaram entender que a plataforma n??o possui rela????o com outros usu??rios, sejam eles visitantes ou anunciantes, e, portanto, todo e qualquer problema transacional causado por an??ncios gerados pela plataforma somente poder?? ser resolvido pelos respectivos usu??rios.<br>

Os usu??rios s??o os ??nicos respons??veis pelas escolhas de outros usu??rios, negocia????es, reajustes de pre??os, formas de pagamento e seus respectivos contratos.

Os usu??rios s??o os ??nicos respons??veis pela veracidade dos dados que relatam na plataforma, sendo a Nosoe a ??nica respons??vel por alocar espa??o para a implementa????o de an??ncios e verificar os arquivos enviados pelos usu??rios. Em nenhuma hip??tese os usu??rios ser??o respons??veis perante o Nosso Love por informa????es falsas inseridas por outros usu??rios na plataforma, devendo tamb??m informar ao Nosso Love sobre qualquer informa????o falsa que identifiquem na plataforma.<br>
<br>
8. M??TODOS DE PAGAMENTO:<br>
a) Cart??o de Cr??dito VISA;<br>

b) Cart??o de Cr??dito MASTERCARD;<br>

c) Cart??o de Cr??dito AMERICAN EXPRESS;<br>

d) Cart??o de Cr??dito DINERS CLUB;<br>

e) Cart??o de Cr??dito ELO;<br>

f) Cart??o de Cr??dito DISCOVER;<br>

g) Boleto banc??rio;<br>

h) Pix.<br>

Para processar pagamentos com cart??o de cr??dito, o usu??rio precisa cadastrar os seguintes dados na plataforma com o cart??o de cr??dito selecionado:<br>

a) Nome do titular do Cart??o de Cr??dito;<br>

b) N??mero do Cart??o de Cr??dito;<br>

c) Bandeira do Cart??o de Cr??dito;<br>

d) Vencimento do Cart??o de Cr??dito (M??s e Ano);<br>

e) N??mero de seguran??a do Cart??o de Cr??dito.<br>

Os pagamentos ser??o processados atrav??s da plataforma https://www.mercadopago.com.br/ e todos os usu??rios tamb??m devem ler e aceitar os Termos de Uso e Servi??o da Plataforma Mercado Pago atrav??s do endere??o eletr??nico: https://moip.com.br/document/<br>

Ao celebrar um contrato com a plataforma, por meio de cart??o de cr??dito ou pagamento de boleto, o usu??rio indica expressamente que leu e aceitou esta ferramenta, bem como os termos de uso do site https://www.mercadopago.com.br/ e todas as condi????es no servi??o/plataforma espec??fico.<br>

Quaisquer disputas sobre pagamentos efetuados atrav??s da plataforma https://www.mercadopago.com.br/ somente poder??o ser resolvidas entre o usu??rio e o Mercado Pago e Nosso Love n??o ser?? respons??vel pelo processamento de pagamentos efetuados atrav??s da plataforma Mercado Pago.<br>

A plataforma Mercado Pago poder?? cobrar taxas pelo seu uso, sendo que o valor cobrado pelo WireCard fica a crit??rio exclusivo do usu??rio.<br>

O Nosso Love ?? o ??nico respons??vel pela exclus??o dos dados de pagamento fornecidos pelo usu??rio de seu pr??prio banco de dados, e declara que o usu??rio est?? ciente de que Nosso Love n??o ?? respons??vel por facilitar a exclus??o desses dados do banco de dados WireCard.<br>

9. POL??TICA DE PRIVACIDADE E DO TRATAMENTO DOS DADOS:
Durante a utiliza????o da plataforma pelo usu??rio, Nosso Love coletar?? e armazenar?? informa????es fornecidas pelo usu??rio de acordo com os termos desta ferramenta, bem como informa????es geradas automaticamente como caracter??sticas do dispositivo de acesso, navegador, logs de acesso ao aplicativo (IP, com data e hora), informa????es visitadas, telas visitadas, dados de geolocaliza????o, hist??rico de aplicativos, etc., s??o armazenados em bancos de dados e cookies do navegador.<br>

Os dados que o Nosso Love recolhe dos utilizadores atrav??s da utiliza????o da plataforma ser??o utilizados para prestar o servi??o de forma adequada, para melhorar a navega????o do utilizador e para fins publicit??rios e estat??sticos.<br>

Os dados que o Nosso Love recolhe dos utilizadores atrav??s da utiliza????o da plataforma ser??o utilizados para prestar servi??os adequados, melhorar a navega????o do utilizador e para fins publicit??rios e estat??sticos.<br>

O usu??rio declara que compreende, aceita e concorda com o tratamento de todos os dados coletados por meio da plataforma pelo Nosso Love ou por terceiros conforme artigo 5?? inciso X da Lei n?? 13.709 de 2018, a saber:<br>

(i) a AWS que pode ser contatada por meio do legal@aws.com;<br>

(ii) a Mixpanel que pode ser contatada por meio do support@mixpanel.com;<br>

(iii) a HotJar que pode ser contatada por meio do legal@hotjar.com;<br>

(iv) a Google Analytics que pode ser contatada por meio do suport@google.com;<br>

(v) Sentry que pode ser contatada por meio do support@sentry.io;<br>

(vi) Segment; e, que pode ser contatada por meio do legal@segment.com;<br>

(vii) Movi Desk que pode ser contatada por meio do atendimento@movidesk.com.<br>

Todos os dados fornecidos pelos usu??rios ao Nosso Love por meio da utiliza????o da plataforma ser??o considerados confidenciais pelo Nosso Love, que se compromete a envidar todos os esfor??os para manter a seguran??a de seus sistemas sob a cust??dia de tais dados, de acordo com as disposi????es de seguran??a do Decreto Norma n?? 8.771/2016, como:<br>

(i) criptografar os dados coletados usando m??todos padr??o do setor, al??m de outras formas padr??o de criptografia, para garantir sua inviolabilidade;<br>

(ii) utilizar softwares de alta tecnologia para impedir o acesso n??o autorizado a sistemas considerados ambientes controlados e seguros;<br>

(iii) O acesso controlado aos locais de armazenamento de dados pessoais ?? limitado a pessoal previamente autorizado e certificado, comprometendo-se a manter tais dados confidenciais, inclusive mediante a assinatura de acordos de confidencialidade;<br>

(iv) aplicar mecanismos de autentica????o aos registros de acesso que possibilitem a personaliza????o dos respons??veis pelo tratamento e acesso aos dados coletados em decorr??ncia do uso da Plataforma; (v) anonimizar os dados do usu??rio ao compartilhar dados do usu??rio com terceiros que n??o sejam parceiros do Nosso Amor e,<br>

(vi) De acordo com o artigo 13 do Decreto n?? 8.771/2016, manter uma lista indicando o tempo, dura????o, identidade e arquivos de destino dos funcion??rios ou respons??veis pelo acesso, com base nos registros de conex??o e acesso ao aplicativo.<br>

Os dados do usu??rio coletados pelo Nosso Love atrav??s do uso da PLATAFORMA poder??o ser compartilhados com terceiros nos seguintes casos:<br>

(i) proteger os interesses do Nosso Love em caso de conflito, incluindo a????es judiciais;<br>

(ii) no caso de transa????es e mudan??as societ??rias envolvendo Nosso Love, caso em que a transfer??ncia de dados ?? necess??ria para a continuidade dos servi??os prestados por meio da Plataforma;<br>

(iii) uma ordem judicial ou um pedido de uma autoridade administrativa com autoridade legal para faz??-lo.<br>

A Nosso Love garante ao USU??RIO, no que diz respeito ao processamento de dados pessoais, os seguintes direitos:<br>

(i) confirmar a exist??ncia de tratamento dos seus dados pessoais;<br>

(ii) solicitar acesso aos seus dados coletados pela PLATAFORMA por meio de seu pr??prio login ou pelo e-mail contato@nossolove.com;<br>

(iii) corrigir seus dados se estiverem incompletos, imprecisos ou desatualizados;<br>

(iv) bloquear ou excluir dados desnecess??rios, excessivos ou processados em viola????o ?? legisla????o brasileira aplic??vel;<br>

(v) fornecer a portabilidade dos dados pessoais para si ou para terceiros mediante solicita????o expressa do usu??rio ao Nosso Love via contato@nossolove.com;<br>

(vi) apagamento dos dados pessoais processados com o seu consentimento, desde que n??o haja decis??o judicial para registr??-los no Nosso Love;<br>

(vii) obter informa????es sobre entidades p??blicas ou privadas com quem Nosso Love compartilha seus dados; e,<br>

(viii) informa????es sobre as possibilidades e consequ??ncias de n??o fornecer o consentimento do usu??rio.<br>

Os usu??rios podem enviar um e-mail para contato@nossolove.com com d??vidas e/ou solicita????es relacionadas aos seus dados pessoais.<br>

A Nosso Love compromete-se a eliminar os dados pessoais recolhidos dos utilizadores:<br>

(i) quando a finalidade para a qual foram coletados for atingida; ou, quando n??o forem mais necess??rios ou relevantes para o escopo da finalidade, de acordo com a finalidade descrita nestes Termos de Uso e Pol??tica de Privacidade;<br>

(ii) quando o usu??rio retirar seu consentimento, quando necess??rio, solicitando a exclus??o do Nosso Love via contato@nossolove.com; ou,<br>

(iii) se determinado pela autoridade competente.<br>

Mesmo ap??s desabilitar o cadastro de um usu??rio na plataforma, o Nosso Love pode reter alguns dados, como o CPF do usu??rio, apenas para verificar se algum usu??rio banido est?? tentando um novo cadastro.<br>

10. Licen??a para uso de imagens<br>
O usu??rio autoriza o Nosso Love a utilizar suas imagens, seja em formato de foto ou v??deo, em an??ncios inseridos na plataforma de forma gratuita, irrestrita, irrevog??vel e irretrat??vel, o que n??o implica em qualquer viola????o de seus direitos de imagem.<br>

11. Disposi????es gerais:<br>
Qualquer termo ou condi????o deste instrumento, que seja considerado inv??lido ou inv??lido por qualquer tribunal ou tribunal por qualquer motivo, n??o afetar?? a validade dos outros termos destes termos, que permanecer??o em pleno vigor e efeito e vinculativos, tendo o maior impacto sobre ele.<br>

A falha do Nosso Love em fazer valer qualquer direito ou disposi????o destes Termos n??o constituir?? uma ren??ncia ?? capacidade deste ??ltimo de exercer seus direitos periodicamente dentro do prazo legal.<br>

Todos os materiais, patentes, marcas, registros, nomes de dom??nio, nomes, privil??gios, cria????es, imagens, e todos os direitos e direitos conexos relativos ?? Plataforma, desenvolvida por Nosso LOVE MODEL, s??o e continuar??o sendo de propriedade ??nica e exclusiva de Nosso Love , concorda que o Usu??rio n??o se envolver?? em nenhum ato ou fato que de alguma forma prejudique os direitos aqui estabelecidos e n??o reivindicar?? nenhum direito ou privil??gio.<br>

Nosso Love pode fazer altera????es neste instrumento a qualquer momento, bastando publicar uma vers??o revisada em nosso site. Por isso, recomendamos vivamente que visite sempre esta se????o do nosso website e que a leia regularmente. No entanto, para promover um bom relacionamento, tamb??m publicaremos um aviso sobre essas mudan??as.<br>

Este documento constitui o pleno entendimento entre o usu??rio e o Nosso Love e ?? regido pelas leis do Brasil, sendo o foro da Cidade de S??o Paulo/SP escolhido como o ??nico foro competente para dirimir as quest??es decorrentes deste documento, renunciando expressamente a qualquer outro jurisdi????o. , por mais privilegiado que seja.<br>

12. Pol??tica de nomes:<br>
12.1 Deve conter de 5 a 18 caracteres.<br>

12.2 S??mbolos n??o s??o permitidos.<br>

12.3 N??meros n??o s??o permitidos.<br>

12.4 Amea??as n??o s??o permitidas.<br>

12.5. N??o s??o permitidos xingamentos, apelidos, tratamentos sexistas ou racistas.<br>

12.6. Degradar algu??m para conte??do abusivo degradante n??o ?? permitido.<br>

12.7. Conte??do que incite medo n??o ?? permitido.<br>

12.8 N??o ?? permitida a divulga????o de outras m??dias ou redes sociais.<br>

12.9. N??o ?? permitida a divulga????o de datas, locais ou per??odos de tempo.<br>

Qualquer nome n??o coberto pela nossa pol??tica de nomes ser?? penalizado.<br>

Termos e Condi????es de Assinatura do Contrato<br>
Por um lado, s??o partes deste instrumento a Nosso Love PROVEDOR DE CONTE??DO NA INTERNET LTDA, sociedade an??nima sediada na Av. Paulista, 171, Edif??cio D. Pedro I de Alc??ntara, PVMTO 04, Sala E3 VG, 01.311-904 , inscrito no CNPJ/MF ou CPF/MF sob o n??mero 37.181.811/0001-46, doravante denominado Nosso Amor e, por outro lado, no cadastro eletr??nico da pessoa f??sica ou jur??dica identificada pelo seu c??digo de assinante, doravante referido como para assinantes.<br>

1. Objetivo dos termos e condi????es:<br>
O objetivo desta ferramenta ?? determinar os termos e condi????es dos contratos celebrados entre o Nosso Love e os assinantes (contratantes) para entrar em planos importantes na busca na plataforma Nosso Love.<br>

1.1 Informa????es dispon??veis aos assinantes no site www.nossolove.com<br>

2. C??digo de assinatura:<br>
Nosso Love conceder?? ao ASSINANTE um "C??digo de Assinante" para identificar o ASSINANTE atrav??s do Atendimento Nosso Love, este ser?? o C??digo de Identifica????o do Usu??rio - ID AD. Os assinantes podem encontr??-lo ao confirmar seu pedido e entregar produtos/servi??os aos assinantes.<br>

3. Entrega:<br>
A entrega do produto/servi??o ter?? in??cio assim que o contrato for assinado e o pagamento confirmado.<br>

4. Assine o contrato:<br>
Pre??os, Formas de Pagamento: O contrato do assinante deve ser celebrado atrav??s do site Nosso Love, que incluir?? todos os planos de assinatura dispon??veis e suas condi????es espec??ficas.<br>

4.1. Dado que as condi????es espec??ficas do site (valor, prazos, condi????es de pagamento, etc.) ser??o parte integrante desta ferramenta, o assinante dever?? escolher o plano de assinatura que deseja assinar.<br>

4.2. Para todos os fins legais, o Assinante expressamente declara e garante que:<br>

(I) ter capacidade legal para firmar este documento e utilizar o produto/servi??o;<br>

(II) A confirma????o de que este documento foi formalizado, vinculante para as partes e confirmado por contrato, ser?? feito clicando no espa??o reservado para este documento no site Nosso Love.<br>

4.3 Como contrapresta????o para efeito deste contrato, o Assinante dever?? pagar ao Nosso Love o valor correspondente ao plano contratual de acordo com a sele????o feita no ato da compra e v??lida no momento da compra.<br>

4.4 A forma de pagamento ser?? selecionada pelo Assinante no site do programa selecionado, que tamb??m inclui a frequ??ncia de pagamento e quaisquer penalidades aplic??veis.<br>

4.5 Nosso Love reserva-se o direito de reajustar unilateralmente o valor de seus planos e assinaturas sem pr??vio aviso, mantendo as condi????es contratuais por prazo determinado e por prazo limitado, enquanto vigorar o prazo.<br>

5. Banco de dados:<br>
O assinante declara estar ciente de que, ap??s a celebra????o do contrato de assinatura de um produto/servi??o, esse produto/servi??o passar?? a fazer parte do banco de dados Nosso Love, por meio do qual poder?? receber informa????es do Nosso Love. Caso o subscritor n??o esteja interessado em receber esta informa????o, pode simplesmente informar o Servi??o de Apoio ao Cliente Nosso Love desta decis??o para assegurar que tem o direito de manifestar a sua oposi????o.<br>

5.1. Nosso Love garante a inviolabilidade e confidencialidade dos dados cadastrais de todos os seus assinantes. Todas as suas informa????es s??o armazenadas no banco de dados do Nosso Love com os mais r??gidos padr??es de seguran??a e processadas de acordo com as leis aplic??veis e a Se????o 10 dos Termos de Uso da Plataforma. As informa????es pessoais n??o ser??o fornecidas a terceiros em nenhuma circunst??ncia. Objetos de servi??os n??o relacionados a estes Termos, objetos desta Ferramenta, a menos que autorizados pelo Assinante.<br>

6. Servi??os de assinatura:<br>
Nosso Love oferece atendimento ao cliente assinante e est?? dispon??vel atrav??s do e-mail contato@nossolove.com<br>

7. Prazo:<br>
O termo pode ser assinado por um per??odo de at?? 30 dias, sujeito ?? escolha do assinante no site Nosso Love, prorrogado por igual per??odo mediante renova????o conveniente conforme procedimento previsto no item a seguir.<br>

8. Procedimento de atualiza????o:<br>
Nosso Love possui um processo de renova????o programado, espec??fico para assinantes, para garantir renova????es f??ceis e ??geis.<br>

8.1. Caso a renova????o n??o seja do interesse do assinante, ele pode responder pelo e-mail contato@nossolove.com ou entrar em contato com o atendimento ao cliente Nosso Love<br>

9. Cancelamento:<br>
O Nosso Love garante aos assinantes que esta ferramenta pode ser cancelada a qualquer momento, mediante pr??vio aviso do assinante e de acordo com o disposto nos termos de uso da plataforma.<br>

10. Rescis??o:<br>
A parte inadimplente pode cancelar a assinatura e rescindir o instrumento se a parte inadimplente n??o remediar a inadimpl??ncia ap??s notifica????o.<br>

10.1. Caso o assinante n??o pague o valor devido no prazo especificado no aviso enviado pelo Nosso Love, a ferramenta poder?? ser encerrada e a entrega do produto/servi??o imediatamente suspensa.<br>

11. Altera????es nos Termos e Condi????es:<br>
Quaisquer altera????es que afetem o encargo financeiro dos assinantes ser??o feitas mediante comunica????o pr??via com os assinantes, podendo os assinantes acordar por qualquer meio dispon??vel, renegociar tais altera????es, ou qualquer das partes poder?? conden??-lo caso n??o cheguem a um acordo.<br>

12. Jurisdi????o:<br>
Se necess??rio, os assinantes t??m o direito de levar quaisquer d??vidas e problemas decorrentes deste instrumento ao tribunal da comarca do seu local de resid??ncia.<br>


                                             </small></font>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="box-footer b-t">
                                 <?php
                                    if($user_info['termos_aceitos']=='NAO'){?>
                                 <small><font color="" size="2px">
                                 <b><?php echo  $user_info['firstname'].' '.$user_info['lastname'];?></b> 
                                 ao clicar no bot??o abaixo, voc?? confirma que leu e aceita todos nossos termos e 
                                 pol??ticas de privacidade citados acima. 
                                 </font></small>
                                 <br> 
                                 <br>
                                 <form action="cadastro.php" method="POST">
                                    <input type="hidden" name="termosAcpt"  value="1">   
                                    <center> 
                                       <button class="btn btn-sm red" name="form_submission" value="editAccount_termos" style="background-color:red; border:0px;">
                                       <font size="2px"> SIM, EU LI E ACEITO.</font></button>
                                       <a href="account.php"class="btn btn-sm red" style="background-color:white; color:black; border:0px;">
                                       <font size="2px"> VOLTAR</font></a>
                                    </center>
                                 </form>
                                 <?php }else{?>
                                 <small><font color="gray" > 
                                 <b><font color="green"size="2px" ><i class="fa fa-check-square-o"></i> VOC?? ACEITOU OS TERMOS & POL??TICAS DE PRIVACIDADE!</font> </b><br> 
                                 1?? Etapa conclu??da com sucesso.
                                 </font></small>
                                 <br> 
                                 <br>
                                 <?php } ?>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php }else // ENVIAR DOC
                    if($user_info['documentos_aceitos']=='0'){ ?> 
                        <div class="tab-pane animated fadeIn text-muted active" id="tab1" aria-expanded="true" >
                           <div class="box-header">
                              <table style="width:98%">
                                 <tr>
                                    <td style="width:100%">
                                       <h2><font size="2px">2?? ETAPA: CONFIRMAR IDENTIDADE </font></h2>
                                    </td>
                                 </tr>
                              </table>
                             
                              <br>
                              <font size="2px">   
                              1?? V??DEO DE VERIFICA????O: <br>
                              <small>Grave um v??deo de no m??ximo 15 segundos usando a camera frontal, segurando o documento ao lado do rosto ( RG ou CNH ) e fale: 
                              <br>
                              ( Eu aceito os termos do site Nosso Love e permito a divulga????o da minha m??dia de fotos e v??deos )</small>
                              <br>
                              2?? FOTO DA FRENTE DO DOCUMENTO: <br>
                              <small>Envie-nos uma foto de boa qualidade da frente do seu documento.</small>
                              <br>
                              3?? FOTO DO VERSO DO DOCUMENTO: <br>
                              <small>Envie-nos uma foto de boa qualidade do verso do seu documento.</small>
                              </font>
                              <br>
                               <div class="box-divider m-a-0"></div>
                              <form method="POST" action="cadastro.php" enctype="multipart/form-data"> 
                                 <br>
                                 <?php echo $messageUpload1Erro ?>
                                 <div id="arquivoup"> 
                                    <font size="2px"> V??DEO DE VERIFICA????O:<br></font> 
                                    <input type="file" name="uploadedFile1" id="upload1" style="cursor:pointer; width:100%;height:30px;" />
                                    <input type="text" id="texto1" value="<?php echo $messageUpload1;  ?>" disabled/>
                                 </div>
                                 <br>
                                 <?php echo $messageUpload2Erro ?>
                                 <div id="arquivoup"> 
                                    <font size="2px"> FOTO DA FRENTE DO DOCUMENTO:<br></font> 
                                    <input type="file" name="uploadedFile2" id="upload2" style="cursor:pointer; width:100%"/>
                                    <input type="text" id="texto2" value="<?php echo $messageUpload2;  ?>" disabled/>
                                 </div>
                                 <br>
                                 <?php echo $messageUpload3Erro ?>
                                 <div id="arquivoup"> 
                                    <font size="2px"> FOTO DO VERSO DO DOCUMENTO:<br></font> 
                                    <input type="file" name="uploadedFile3" id="upload3" style="cursor:pointer; width:100%"/>
                                    <input type="text" id="texto3" value="<?php echo $messageUpload3;  ?>" disabled/>
                                 </div>
                                 <br>  
                                 <button type="submit" name="uploadBtn" value="confirm_identidade" class="btn-sm red  btn-block" style="background-color:red; border:0px;">
                                    <center><font size="2px"><i class="fa fa-cloud-upload"></i><BR> ENVIAR </font></center>
                                 </button>
                                 <a href="account.php" class="btn-sm red  btn-block" style="background-color:white; color:black; border:0px;">
                                    <center><font size="2px"><i class="fa fa-reply"></i> <br> VOLTAR </font></center>
                                 </a>
                              </form>
                              
                           </div>
                        </div> 
                    <?php }else    // DOC RECUSADO, REENVIAR
                    if($user_info['documentos_aceitos']=='RECUSADO'){ ?>
                    
                     <div class="box-header" >
                            <center> 
                                <BR>
                                        <h7 style="line-height: 0.5;"><font color="red" >PERFIL N??O VERIFICADO, REENVIE OS DADOS.</font></h5> 
                                        <BR>
                                        <font size="2px"><?php echo $user_info['motivo_doc_recusado']; ?></font>
                                        
                                
                                       
                                        
                                      
                            </center>
                              
                           </div>
                            <small>
                           <div class="box-header">
                              <table style="width:98%">
                                 <tr>
                                    <td style="width:100%">
                                        
                                       <h2><font size="2px">2?? ETAPA: CONFIRMAR IDENTIDADE </font></h2>
                                    </td>
                                 </tr>
                              </table>
                              <br>
                              <font size="2px">   
                              1?? V??DEO DE VERIFICA????O: <br>
                              <small>Grave um v??deo de no m??ximo 15 segundos usando a camera frontal, segurando o documento ao lado do rosto ( RG ou CNH ) e fale: 
                              <br>
                              ( Eu aceito os termos do site Nosso Love e permito a divulga????o da minha m??dia de fotos e v??deos )</small>
                              <br>
                              2?? FOTO DA FRENTE DO DOCUMENTO: <br>
                              <small>Envie-nos uma foto de boa qualidade da frente do seu documento.</small>
                              <br>
                              3?? FOTO DO VERSO DO DOCUMENTO: <br>
                              <small>Envie-nos uma foto de boa qualidade do verso do seu documento.</small>
                              </font>
                              <br>
                               <div class="box-divider m-a-0"></div>
                              <form method="POST" action="cadastro.php" enctype="multipart/form-data">
                                 <br>
                                 <?php echo $messageUpload1Erro ?>
                                 <div id="arquivoup"> 
                                    <font size="2px"> V??DEO DE VERIFICA????O:<br></font> 
                                    <input type="file" name="uploadedFile1" id="upload1" readonly="readonly" />
                                    <input type="text" id="texto1" value="<?php echo $messageUpload1;  ?>" readonly="readonly"/>
                                 </div>
                                 <br>
                                 <?php echo $messageUpload2Erro ?>
                                 <div id="arquivoup"> 
                                    <font size="2px"> FOTO DA FRENTE DO DOCUMENTO:<br></font> 
                                    <input type="file" name="uploadedFile2" id="upload2" readonly="readonly"/>
                                    <input type="text" id="texto2" value="<?php echo $messageUpload2;  ?>" readonly="readonly"/>
                                 </div>
                                 <br>
                                 <?php echo $messageUpload3Erro ?>
                                 <div id="arquivoup"> 
                                    <font size="2px"> FOTO DO VERSO DO DOCUMENTO:<br></font> 
                                    <input type="file" name="uploadedFile3" id="upload3"readonly="readonly" />
                                    <input type="text" id="texto3" value="<?php echo $messageUpload3;  ?>"readonly="readonly"/>
                                 </div>
                                 <br>  
                                 <button type="submit" name="uploadBtn" value="confirm_identidade" class="btn-sm red  btn-block" style="background-color:red; border:0px;">
                                    <center><font size="2px"><i class="fa fa-cloud-upload"></i><BR> ENVIAR </font></center>
                                 </button>
                                 <a href="account.php" class="btn-sm red  btn-block" style="background-color:white; color:black; border:0px;">
                                    <center><font size="2px"><i class="fa fa-reply"></i> <br> VOLTAR </font></center>
                                 </a>
                              </form>
                              
                           </div>
                      
                    <?php }else 
                    if ( $user_info['midia_aceita'] == '0' ){?>
                        
                    <style> 
                        @import url('http://fonts.googleapis.com/css?family=Open+Sans');
                        p, ol, #message {
                        font-family:'Open Sans';
                        }
                        #multiple_upload {
                        position:relative; border:0px; background:#1b1b1b; color:white;  padding:5px; width:100%; border:1px solid #2f2f2f 
                        }
                        #uploadChange {
                        position:absolute;
                        top:2px;
                        left:0;
                        opacity:0.01;
                        border:none;
                        width:355px;
                        padding:10px;
                        z-index:1;
                        cursor:pointer
                        }
                        #message {
                        border:0px; background:#2f2f2f; color:white;  padding:5px; width:100%; font-size: 12px ; text-align:left;
                        }
                        #botao {
                        border:1px solid #ff7b00;
                        background:#ff7b00;
                        color:#ffffff;
                        font-family:'Open Sans';
                        font-size:15px;
                        font-weight:bold;
                        padding:12px 28px;
                        margin:4px 8px;
                        }
                        #multiple_upload:hover > #botao {
                        background:#662f00;
                        border-color:#662f00;
                        } 
                        #lista ol {
                        margin-left: -60px; 
                        }
                        #lista ol li {
                        padding:5px;
                        display:block;
                        clear:left;
                        margin-bottom:2px;
                        }
                        #lista ol li.item_grey{
                        }
                         
                        img.item {
                        }
                        img.item {
                        max-width: 100%;
                        max-height: 100%;
                        }
                        .box-images {
                        height: 30px;
                        width: 30px;
                        background-color: #eee;
                        border:1px solid #eee;
                        margin-bottom:15px;
                        /* Centralizando imagens */
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        float:left;
                        margin:0 10px 20px 0;
                        }
                     </style>
                     <script>
                        $(function(){
                        $('#uploadChange').on('change',function() {
                            var id = $(this).attr('id');
                           var totalFiles = $(this).get(0).files.length;
                           if(totalFiles == 0) {
                             $('#message').text('( Clique aqui para procurar na galeria )' );
                           }
                           if ( totalFiles > 1) {
                            $('#message').text( totalFiles+' arquivos selecionados ( clique para selecionar mais )' );
                           } else {
                            $('#message').text( totalFiles+' arquivo selecionado ( clique para selecionar mais )' );
                           }
                              var htm='<ol>';
                            for (var i=0; i < totalFiles; i++) {
                                var c = (i % 2 == 0) ? 'item_white' : 'item_grey';
                                var arquivo = $(this).get(0).files[i];
                                var fileV = new readFileView(arquivo, i);
                                htm += '<li class="'+c+'"><div class="box-images"><img class="item" data-img="'+i+'" data-id="'+id+'" border="0"></div><span>'+arquivo.name+'</li>'+"\n";
                            }
                           htm += '</ol>';
                              $('#lista').html(htm);
                            
                        });
                        
                        });
                        
                        function readFileView(file, i) {
                        
                        var reader = new FileReader();
                        reader.onload = function (e) {
                          $('[data-img="'+i+'"]').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(file);
                        }
                        
                      
                     </script>
                     <div class="box-header" >
                        <h3><font size="2px"><b>3?? ETAPA:</b> ENVIO DO MATERIAL DE M??DIA </font></h3>
                        <small>Envie-nos o seu book de fotos profissionais que ser??o exibidos em seu perfil e divulgados em nosso site.</small>
                     </div>
                     <div class="box-body">
                         
                       
                         
                         <?php echo $messageUploadMidiaERRO.'<br>'.$messageUploadMidia ?> 
                         
                        <form method="POST" action="cadastro.php" enctype="multipart/form-data">
                           <div id="multiple_upload">
                              <font size="2px"> BOOK DE FOTOS PROFISSIONAIS:<br></font> 
                              <input type="file" multiple="multiple" name="arquivo[]" id="uploadChange" readonly="readonly"/>
                              <div id="message">( Clique aqui para procurar na galerias )</div>
                           </div>
                           <br>
                           <div class="box row-col" style="min-height:300px">
                              <div class="row-row dker">
                                 <div class="row-body">
                                    <div class="row-inner">
                                       <div class="p-a-md">
                                          <div class="m-b">
                                             <font size="2px" color="gray">
                                                <div id="lista"> </div>
                                             </font>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <br> 
                           </div> 
                           <center> 
                                 <button class="btn btn-sm red btn-block" type="submit" name="uploadBtn" value="mat_midia"  style="background-color:red; border:0px;">
                                 <font size="2px"><i class="fa fa-cloud-upload"></i><BR> ENVIAR M??DIA</font></button>
                                 <a href="account.php" class="btn-sm red  btn-block" style="background-color:white; color:black; border:0px;">
                                    <center><font size="2px"><i class="fa fa-reply"></i> <br> VOLTAR </font></center>
                                 </a>
                              </center>
                        </form>
                        
                        
                        
                     </div>    
                        
                        
                        
                   <?php }else // MIDIA RECUSADA REENVIAR
                    if($user_info['midia_aceita']=='RECUSADO'){ ?>
                    
                    <style> 
                        @import url('http://fonts.googleapis.com/css?family=Open+Sans');
                        p, ol, #message {
                        font-family:'Open Sans';
                        }
                        #multiple_upload {
                        position:relative; border:0px; background:#1b1b1b; color:white;  padding:5px; width:100%; border:1px solid #2f2f2f 
                        }
                        #uploadChange {
                        position:absolute;
                        top:2px;
                        left:0;
                        opacity:0.01;
                        border:none;
                        width:355px;
                        padding:10px;
                        z-index:1;
                        cursor:pointer
                        }
                        #message {
                        border:0px; background:#2f2f2f; color:white;  padding:5px; width:100%; font-size: 12px ; text-align:left;
                        }
                        #botao {
                        border:1px solid #ff7b00;
                        background:#ff7b00;
                        color:#ffffff;
                        font-family:'Open Sans';
                        font-size:15px;
                        font-weight:bold;
                        padding:12px 28px;
                        margin:4px 8px;
                        }
                        #multiple_upload:hover > #botao {
                        background:#662f00;
                        border-color:#662f00;
                        } 
                        #lista ol {
                        margin-left: -60px; 
                        }
                        #lista ol li {
                        padding:5px;
                        display:block;
                        clear:left;
                        margin-bottom:2px;
                        }
                        #lista ol li.item_grey{
                        }
                         
                        img.item {
                        }
                        img.item {
                        max-width: 100%;
                        max-height: 100%;
                        }
                        .box-images {
                        height: 30px;
                        width: 30px;
                        background-color: #eee;
                        border:1px solid #eee;
                        margin-bottom:15px;
                        /* Centralizando imagens */
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        float:left;
                        margin:0 10px 20px 0;
                        }
                     </style>
                     <script>
                        $(function(){
                        $('#uploadChange').on('change',function() {
                            var id = $(this).attr('id');
                           var totalFiles = $(this).get(0).files.length;
                           if(totalFiles == 0) {
                             $('#message').text('( Clique aqui para procurar na galeria )' );
                           }
                           if ( totalFiles > 1) {
                            $('#message').text( totalFiles+' arquivos selecionados ( clique para selecionar mais )' );
                           } else {
                            $('#message').text( totalFiles+' arquivo selecionado ( clique para selecionar mais )' );
                           }
                              var htm='<ol>';
                            for (var i=0; i < totalFiles; i++) {
                                var c = (i % 2 == 0) ? 'item_white' : 'item_grey';
                                var arquivo = $(this).get(0).files[i];
                                var fileV = new readFileView(arquivo, i);
                                htm += '<li class="'+c+'"><div class="box-images"><img class="item" data-img="'+i+'" data-id="'+id+'" border="0"></div><span>'+arquivo.name+'</li>'+"\n";
                            }
                           htm += '</ol>';
                              $('#lista').html(htm);
                            
                        });
                        
                        });
                        
                        function readFileView(file, i) {
                        
                        var reader = new FileReader();
                        reader.onload = function (e) {
                          $('[data-img="'+i+'"]').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(file);
                        }
                        
                      
                     </script>
                     <div class="box-header" >
                            <center> 
                                <BR>
                                        <h7 style="line-height: 0.5;"><font color="red" >PERFIL N??O VERIFICADO, REENVIE OS DADOS.</font></h5> 
                                        <BR>
                                        <font size="2px"><?php echo $user_info['motivo_mid_recusada']; ?></font>
                                        
                                
                                       
                                        
                                      
                            </center>
                              
                           </div>
                            <small>
                     <div class="box-header" >
                        <h3><font size="2px"><b>3?? ETAPA:</b> ENVIO DO MATERIAL DE M??DIA </font></h3>
                        <small>Envie-nos o seu book de fotos e v??deo profissionais que ser??o exibidos em seu perfil e divulgados em nosso site.</small>
                     </div>
                     <div class="box-body">
                         
                       
                         
                         <?php echo $messageUploadMidiaERRO.'<br>'.$messageUploadMidia ?> 
                         
                        <form method="POST" action="cadastro.php" enctype="multipart/form-data">
                           <div id="multiple_upload">
                              <font size="2px"> BOOK DE FOTOS E V??DEOS:<br></font> 
                              <input type="file" multiple="multiple" name="arquivo[]" id="uploadChange" readonly="readonly"/>
                              <div id="message">( Clique aqui para procurar na galeria )</div>
                           </div>
                           <br>
                           <div class="box row-col" style="min-height:300px">
                              <div class="row-row dker">
                                 <div class="row-body">
                                    <div class="row-inner">
                                       <div class="p-a-md">
                                          <div class="m-b">
                                             <font size="2px" color="gray">
                                                <div id="lista"> </div>
                                             </font>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <br> 
                           </div>
                           <center> 
                                 <button class="btn btn-sm red btn-block" type="submit" name="uploadBtn" value="mat_midia"  style="background-color:red; border:0px;">
                                 <font size="2px"><i class="fa fa-cloud-upload"></i><BR> ENVIAR M??DIA</font></button>
                                 <a href="account.php" class="btn-sm red  btn-block" style="background-color:white; color:black; border:0px;">
                                    <center><font size="2px"><i class="fa fa-reply"></i> <br> VOLTAR </font></center>
                                 </a>
                              </center>
                        </form>
                        
                        
                        
                     </div>  
                     
                     <?php }else// ANALISE DE DADOS
                    if(($user_info['documentos_aceitos']=='ANALISE') or ($user_info['midia_aceita']=='ANALISE')){ ?>
                    
                     
                           <div class="box-header" >
                            <center> 
                                <BR>
                                    
                                        <h5 style="line-height: 0.5;"><font color="orange" >AGUARDANDO AN??LISE DE DADOS</font></h5> 
                                        <font size="2px"><smnall>Cadastro completo, agora ?? com a gente! </smnall></font>
                                        
                             
                              
                           </div>
                            <small>
                                  
                                  
                                  
               <BR>
                   <BR>
                       <BR>
            1?? - TERMOS E POL??TICAS DO CONTRATO :<br>
             <?php if($user_info['termos_aceitos']=='SIM'){?>
             <font color="green"><i class="fa fa-check-square-o"></i> Termos Aceitos.</font>  
           <?php }else{?>
               <font color=""><i class="fa fa-check-square-o"></i></font>
           <?php } ?>
            <div class="box-divider m-a-0"></div>
            
            
            
            2?? - CONFIRMAR IDENTIDADE : <?php if($user_info['documentos_aceitos']=='RECUSADO'){?>  <font color="red"> <a href=""> > <u>VER MOTIVO</u> < </a></font> <?php }?><br> 
            <?php if($user_info['documentos_aceitos']=='CONFIRMADO'){?>
             <font color="green"><i class="fa fa-check-square-o"></i> Documentos aceitos.</font>  
           <?php }else if($user_info['documentos_aceitos']=='RECUSADO'){?>
             <font color="red"><i class="fa fa-close"></i> Documentos recusados.</font>  
           <?php }else if($user_info['documentos_aceitos']=='ANALISE'){?>
             <font color="orange"><i class="fa fa-check-square-o"></i> Documentos em analise...</font>  
           <?php }else{?>
               <font color=""><i class="fa fa-check-square-o"></i></font>
           <?php } ?>
           <div class="box-divider m-a-0"></div>
           
           
           3?? - MATERIAL DE M??DIA PROFISSIONAL : <?php if($user_info['midia_aceita']=='RECUSADO'){?>  <font color="red"> <a href=""> > <u>VER MOTIVO</u> < </a></font> <?php }?><br>                   
             
           <?php if($user_info['midia_aceita']=='CONFIRMADO'){?>
             <font color="green"><i class="fa fa-check-square-o"></i>M??dia Aceita.</font>  
           <?php }else if($user_info['midia_aceita']=='RECUSADO'){?>
             <font color="red"><i class="fa fa-close"></i> M??dia recusada.</font>  
           <?php }else if($user_info['midia_aceita']=='ANALISE'){?>
             <font color="orange"><i class="fa fa-check-square-o"></i> M??dia em analise...</font>  
           <?php }else{?>
               <font color=""><i class="fa fa-check-square-o"></i></font>
           <?php } ?>
           <div class="box-divider m-a-0"></div>
               <br>                
               
                    <font size="2px">
                    Nossa equipe verificar?? todos os seus dados. <br>
                Isso pode levar algumas horas,  n??s avisarem a voc?? quando seu perfil for verificado.
                        </font>
                 
                 </small>
                 <br><br>
                 <a href="account.php" class="btn-sm red  btn-block" style="background-color:white; color:black; border:0px;">
                                    <center><font size="2px"><i class="fa fa-reply"></i> <br> VOLTAR </font></center>
                                 </a>
           
                    
                    <?php }else{ ?>  
                    <BR>
    <div class="text-center">
      <h5 class="_700 m-b" >PARAB??NS!</h2>
      <h6 class="_700 m-b" style="color:#3e9a47;">SUA CONTA FOI VERIFICADA COM SUCESSO.</h2>
      <br>
     
      
      
       
     
    </div>  
                 
       <h7 class="m-b-md">
     <span style="color:#d53a3a;"> <b><?php echo  $user_info['firstname'].' '.$user_info['lastname'];?></b></span>, todas as estapas do seu cadastro foram conclu??das com sucesso. Seus dados foram analisados e sua conta j?? est?? verificada. 
      <br><br>
      Para que voc?? possa divulgar seu perfil e fotos em nosso site ?? necess??rio possuir uma <b><span style="color:#3e9a47;">ASSINATURA ATIVA</span></b> em algum dos nossos planos. 
      </h7>             
      <div class="text-center">
          <br>
       <a href="planos.php" class="btn rounded btn-outline b-danger text-red p-x-md m-y" style="border-color:red; color:;">VER PLANOS E PRE??OS</a>
       <br>
       <a href="index.php" class="btn-sm red  btn-block" style="background-color:white; color:black; border:0px;">
                                    <center><font size="2px"><i class="fa fa-reply"></i> <br> VOLTAR </font></center>
                                 </a>
        </div>
        <?php }?>
           
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