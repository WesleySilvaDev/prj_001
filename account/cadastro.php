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
                                 <font size="2px"> TERMOS & POLÍTICAS DE PRIVACIDADE </font>
                              </div>
                              <div class="row-row dker">
                                 <div class="row-body">
                                    <div class="row-inner">
                                       <div class="p-a-md">
                                          <div class="m-b">
                                             <font size="2px" color="gray"> <small> 
Oi! Fico feliz em ter seu interesse! Antes de usar nossos serviços, reserve um tempo para ler nossos Termos de Uso e Serviço e entender as regras que regem nosso relacionamento com você. Abaixo, vamos esclarecer alguns pontos que julgamos importantes. 

Se você tiver alguma dúvida sobre algum ponto discutido ou não abordado neste documento, sinta-se à vontade para nos contatar em contato@nossolove.com.<br><br>

1. Definição: Nesta ferramenta, entendemos as seguintes expressões de acordo com as seguintes definições:<br> 

Nosso Love: nossolove PROVEDOR DE CONTEUDO NA INTERNET LTDA, sociedade empresarial de responsabilidade limitada, inscrita no CNPJ sob o n°. 37.426.982/0001-98, com sede na cidade de São Paulo/SP, na Avenida Paulista, n° 171, Edf. D. Pedro I de Alcanta - Pavimento 04 SALA E3 VG, CEP 01.311-904.

USUÁRIOS:<br>

a. Visitante: Pessoa física cadastrada na plataforma para acessar conteúdos publicitários fornecidos pelos anunciantes na plataforma.<br>

b. ANUNCIANTE: A pessoa física cadastrada na plataforma, por meio do uso da plataforma, divulgará seu anúncio ao visitante.<br>

PLATAFORMA: Sistema de aplicações web em que é alocado espaço publicitário para anúncios, onde todos os usuários podem visualizar anúncios publicados por ANUNCIANTES cadastrados na plataforma Nosso Love.<br>

Tratamento de dados: toda operação que o Nosso Love realiza com relação aos dados pessoais do usuário de acordo com o artigo 5º inciso X da Lei nº 13.709 de 2018, tais como operações que envolvam a coleta, produção, recepção, classificação, uso, acesso, reprodução, transmissão , distribuir, processar, arquivar, armazenar, apagar, avaliar ou controlar informações, modificar, comunicar, transmitir, disseminar ou extrair.<br>
<br>
2. ADESÃO:<br>
Este documento define as condições de uso do serviço da PLATAFORMA e é um contrato entre o usuário e o Nosso Love. AO USAR OS SERVIÇOS DISPONÍVEIS PELA PLATAFORMA, VOCÊ CONCORDA EXPRESSAMENTE COM TODOS OS TERMOS E CONDIÇÕES CONTIDOS NESTE DOCUMENTO E COM AS LEIS APLICÁVEIS A ESTA ESPÉCIE.<br>
Você entende e concorda que Nosso Love levará em consideração sua utilização dos serviços prestados, ou seja, sua aceitação destes termos e todas as demais disposições legais relacionadas a esta espécie.<br>

Ao aceitar os termos deste instrumento, o usuário autoriza expressamente o tratamento de seus dados para garantir a manutenção e bom desempenho da funcionalidade da plataforma.<br><br>

Ao fazê-lo, o usuário concorda integralmente em compartilhar os dados coletados e processados pelo Nosso Love com outras empresas pertencentes ao seu grupo econômico ou seus prestadores de serviços de acordo com os termos desta ferramenta.<br><br>

SE VOCÊ NÃO CONCORDA COM OS TERMOS AQUI, NÃO ACESSE, VISUALIZE, BAIXE OU USE QUALQUER PÁGINA, CONTEÚDO, INFORMAÇÃO OU SERVIÇOS DA NOSSO LOVE DE QUALQUER FORMA.<br><br>

Estes termos podem ser lidos na plataforma a qualquer momento em https://nossolove.com/terms.php<br><br>

3. Quem nós somos e o que nós fazemos:<br>
A Nosso Love é uma empresa privada que disponibiliza uma plataforma web através do link https://nossolove.com/ com atribuição de espaço para publicidade. Nela, os ANUNCIANTES exibem seu anúncio e adicionam informações que julgam relevantes ao conteúdo do anúncio, para que os visitantes possam pesquisar na PLATAFORMA para encontrar anúncios que se encaixem no perfil desejado.<br>

4. Condições Gerais de Uso:<br>
Os usuários declaram que atendem aos seguintes pré-requisitos para utilização da plataforma:<br>

(I) Ser maior de idade e absolutamente capaz.<br><br>

(II) Ter a capacidade de se comprometer com estes termos e fornecer todas as informações necessárias para se registrar. Declaração de que esses serviços são prestados de forma idônea e verdadeira e estão sujeitos a responsabilidade civil e criminal.<br><br>

(III) Ter um número de celular e endereço de e-mail válidos, Nosso Love pode entrar em contato com você, se necessário.<br><br>

Nosso Love é apenas uma plataforma de alocação de espaço publicitário e sua responsabilidade limita-se ao correto funcionamento da plataforma e sua funcionalidade, não sendo de acordo com este instrumento Nosso Love se responsabiliza por: <br>
(i) qualquer negociação realizada entre usuários; <br>
(ii) verificação dos anunciantes (3) A qualidade do anúncio; <br>
(IV) A execução de qualquer pagamento acordado entre os usuários; (7) Quaisquer outras ações ou fatos decorrentes das ações dos usuários.<br><br>

Nosso Love permite que visitantes e anunciantes entrem em contato diretamente sem qualquer intervenção, seja na negociação ou na execução do conteúdo negociado, Nosso Love não é intermediário ou fornecedor de qualquer serviço ou produto anunciado na plataforma, nem este Empregador/ representante/agente de qualquer anunciante da lista.<br>

Nosso Love não é afiliado a anunciantes cadastrados e Nosso Love não se responsabiliza por quaisquer danos que os anunciantes possam causar aos visitantes ou terceiros por sua conduta através da Plataforma.<br>

Da mesma forma, Nosso Love não tem relação com visitantes cadastrados e Nosso Love não se responsabiliza por quaisquer danos que possam ser causados a anunciantes ou terceiros pelas ações dos visitantes através da plataforma.<br>

O Nosso Love não medeia quaisquer negociações que possam ocorrer entre os usuários e é o único responsável por ajustar as condições de negócios por eles contratadas, tais como valor, qualidade, forma, duração e outros pontos que julguem necessários.<br>

O Nosso Love não intervém em quaisquer negociações que possam resultar entre usuários e é o único responsável por ajustar quaisquer condições para a condução das negociações praticadas, tais como valor, qualidade, forma, duração e outros pontos que julgar necessários.<br>

Ao se cadastrar, os usuários poderão utilizar todos os recursos disponíveis na plataforma e, portanto, declaram que leram, entenderam e aceitaram todos os dispositivos contidos nestes termos de uso.<br>

Por não constar de uma transação que possa ser firmada entre usuários, Nosso Love não pode obrigar os usuários a cumprir obrigações que possam ter na negociação.<br>

Os usuários comprometem-se a usar as funções da plataforma de boa fé, de acordo com as leis, ética e boas práticas existentes.<br>

O usuário reconhece expressamente que, por meio desta ferramenta, obtém uma licença do Nosso Love para uso da plataforma, a qual é intransferível durante o período de cumprimento deste contrato, e que é proibido sublicenciar os termos de uso no país ou no exterior , e em caso de desacordo com o disposto neste instrumento Utilize a plataforma abaixo.<br>

Os usuários são os únicos responsáveis pela segurança de suas senhas e do uso de seus cadastros na plataforma, portanto, aconselhamos que não compartilhem tais informações com terceiros, caso essas informações sejam perdidas ou hackeadas por qualquer motivo, os usuários devem passar imediatamente para contato @nossolove.com Notifica Nosso Love para resolver o problema.<br>

Somente o usuário é responsável por quaisquer danos causados a terceiros, outros usuários, a plataforma ou o próprio Nosso Love devido ao uso das funcionalidades da plataforma.<br>

Os usuários não devem usar a Plataforma para qualquer finalidade ou meio ilegal, difamatório, discriminatório, abusivo, ofensivo, ofensivo, prejudicial, vexatório, enganoso, calunioso, violento, ou para assediar, ameaçar ou usar identidades falsas, ou seja, qualquer desculpa para uso que possa possa prejudicar o Nosso Love, outros usuários ou terceiros.<br>

Em nenhuma hipótese a OUR LOVE será responsável por quaisquer danos causados aos usuários devido à indisponibilidade temporária da plataforma.<br>

O Usuário deve possuir todos os softwares e hardwares necessários para acessar a Plataforma, incluindo, mas não se limitando a um computador/dispositivo móvel com acesso à internet, sendo o Nosso Love o único responsável por disponibilizar a Plataforma ao Usuário nos termos deste instrumento.<br>

A utilização da plataforma pelos utilizadores está condicionada ao seu registo prévio e ao cumprimento das disposições contidas neste documento.<br><br>

5. CADASTRO:<br>
Nosso Love oferece serviços para pessoas absolutamente capazes.<br>

Para que um anunciante se cadastre na plataforma, ele deve fornecer ao Nosso Love os seguintes dados: nome, unidade, número do CPF, foto clara do documento de identificação (frente e verso), vídeo de apresentação do anunciante, celular.<br>

Para que os visitantes possam se cadastrar na plataforma, eles devem fornecer ao Nosso Love seu endereço de e-mail.<br>

Para o uso normal da plataforma, os usuários devem se cadastrar e preencher todos os dados exigidos pela plataforma no momento do cadastro.<br>

Fornecer, atualizar e garantir a veracidade dos dados cadastrais é de responsabilidade exclusiva do usuário, não responsabilizando o Nosso Love por qualquer tipo de responsabilidade civil e criminal por dados inverídicos, incorretos ou incompletos fornecidos pelo usuário.<br>

A Nosso Love reserva-se o direito de utilizar todos os meios válidos e possíveis para identificar os seus anunciantes e solicitar outros dados e documentos que considere relevantes para a verificação das informações prestadas. Nesse caso, a utilização da plataforma pelo anunciante está condicionada ao envio de quaisquer documentos solicitados.<br>

Nosso Love reserva-se o direito de suspender temporária ou permanentemente o usuário responsável pelo cadastro sem prévio aviso caso o cadastro seja considerado como contendo dados falsos ou inverídicos. Em caso de suspensão, o usuário não terá direito a qualquer indenização ou compensação de qualquer natureza por perdas e danos, lucros cessantes ou danos morais.<br>

O usuário tem livre acesso às informações coletadas pelo Nosso Love e informações sobre o tratamento dos dados, mediante solicitação para contato@nossolove.com ou por meio de seu cadastro na plataforma, podendo solicitar sua exclusão a qualquer momento.<br>

O objetivo da coleta de dados do usuário é identificá-lo e capacitá-lo a utilizar a plataforma corretamente, desta forma o Nosso Love poderá garantir a qualidade do serviço licenciado.<br>

Os usuários podem exercer o direito de não fornecer dados ao Nosso Love a qualquer momento. No entanto, neste caso, Nosso Love não tem obrigação de fornecer aos usuários a funcionalidade de qualquer plataforma.<br>

Ao concordar com os termos desta ferramenta, o utilizador declara expressamente que entende que a recolha dos seus dados é essencial para o bom funcionamento da plataforma, autorizando desde já o Nosso Love para o tratamento de dados.<br>

É expressamente proibida a criação de múltiplos registos por utilizador na plataforma. No caso de múltiplos cadastros por um único usuário, Nosso Love reserva-se o direito, a seu exclusivo critério, de desabilitar todos os cadastros existentes sob aquele nome de usuário sem compensação e sem prévio consentimento ou comunicação, podendo não aceitar o estabelecido no novo cadastro usuário da plataforma.<br>

Os usuários acessarão seu cadastro na plataforma com login e senha, comprometendo-se a não notificar terceiros sobre esses dados e a assumir total responsabilidade pelo seu uso.<br>

Os usuários se comprometem a notificar imediatamente o Nosso Love sobre qualquer uso não autorizado de sua conta através dos canais de contato mantidos pelo Nosso Love na Plataforma. O usuário será o único responsável pelas ações realizadas em sua conta, pois o acesso só é possível mediante o uso de sua senha proprietária.<br>

O Usuário compromete-se a notificar imediatamente o Nosso Love através dos canais de contato mantidos pelo Nosso Love na Plataforma, caso outros usuários tomem conhecimento de quaisquer violações que possam causar danos ao Usuário da Plataforma, este último, Nosso Love ou outros terceiros.<br>

Em nenhuma circunstância o cadastro do usuário será transferido, vendido, alugado ou transferido de outra forma. <br>

Os usuários não podem usar apelidos na Plataforma que sejam semelhantes ao nome Nosso Love, nem usar apelidos que sugiram ou impliquem que esteja relacionado ao Nosso Love. <br>

Nosso Love poderá, a seu exclusivo critério, excluir, desabilitar, limitar o uso do Serviço, suspender por tempo indeterminado, bloquear cadastros de usuários considerados ofensivos ou violar os termos desta Ferramenta, sem aviso prévio ou indenização ou legislação vigente.<br>

Nosso Love se reserva o direito de não permitir que usuários que tenham sido cancelados, desabilitados, bloqueados, excluídos ou suspensos da plataforma se registrem novamente. Não é permitida a criação de novos cadastros por quem cancelar, bloquear, desabilitar, excluir ou suspender o cadastro original por violação da política da PLATAFORMA ou da legislação vigente.<br>

Nosso Love reserva-se o direito de recusar unilateralmente qualquer solicitação de cadastro de um usuário na plataforma e de cancelar, desabilitar, bloquear, excluir ou suspender o uso de um cadastro previamente aceito sem prévio aviso, consentimento ou compensação.<br>

Ao concordar com esta ferramenta, o usuário declara estar ciente de que é o único responsável pelo seu cadastro e que qualquer dano causado pela inserção de informações desatualizadas, imprecisas ou inverídicas não pode ser atribuído ao Nosso Love ou PLATAFORMA.<br>

6. DAS FUNCIONALIDADES:
Nosso Love pode editar e/ou excluir recursos existentes e adicionar novos recursos à Plataforma a qualquer momento, sem aviso prévio ou compensação.<br>

7. DAS OBRIGAÇÕES DOS USUÁRIOS:
Os usuários comprometem-se a atualizar seus dados cadastrais e ser notificados de quaisquer alterações verificadas, principalmente seus dados de pagamento, bem como seus endereços de e-mail e telefone, que serão o principal canal de comunicação entre o Nosso Love e os usuários.<br>

Os usuários declaram entender que a plataforma não possui relação com outros usuários, sejam eles visitantes ou anunciantes, e, portanto, todo e qualquer problema transacional causado por anúncios gerados pela plataforma somente poderá ser resolvido pelos respectivos usuários.<br>

Os usuários são os únicos responsáveis pelas escolhas de outros usuários, negociações, reajustes de preços, formas de pagamento e seus respectivos contratos.

Os usuários são os únicos responsáveis pela veracidade dos dados que relatam na plataforma, sendo a Nosoe a única responsável por alocar espaço para a implementação de anúncios e verificar os arquivos enviados pelos usuários. Em nenhuma hipótese os usuários serão responsáveis perante o Nosso Love por informações falsas inseridas por outros usuários na plataforma, devendo também informar ao Nosso Love sobre qualquer informação falsa que identifiquem na plataforma.<br>
<br>
8. MÉTODOS DE PAGAMENTO:<br>
a) Cartão de Crédito VISA;<br>

b) Cartão de Crédito MASTERCARD;<br>

c) Cartão de Crédito AMERICAN EXPRESS;<br>

d) Cartão de Crédito DINERS CLUB;<br>

e) Cartão de Crédito ELO;<br>

f) Cartão de Crédito DISCOVER;<br>

g) Boleto bancário;<br>

h) Pix.<br>

Para processar pagamentos com cartão de crédito, o usuário precisa cadastrar os seguintes dados na plataforma com o cartão de crédito selecionado:<br>

a) Nome do titular do Cartão de Crédito;<br>

b) Número do Cartão de Crédito;<br>

c) Bandeira do Cartão de Crédito;<br>

d) Vencimento do Cartão de Crédito (Mês e Ano);<br>

e) Número de segurança do Cartão de Crédito.<br>

Os pagamentos serão processados através da plataforma https://www.mercadopago.com.br/ e todos os usuários também devem ler e aceitar os Termos de Uso e Serviço da Plataforma Mercado Pago através do endereço eletrônico: https://moip.com.br/document/<br>

Ao celebrar um contrato com a plataforma, por meio de cartão de crédito ou pagamento de boleto, o usuário indica expressamente que leu e aceitou esta ferramenta, bem como os termos de uso do site https://www.mercadopago.com.br/ e todas as condições no serviço/plataforma específico.<br>

Quaisquer disputas sobre pagamentos efetuados através da plataforma https://www.mercadopago.com.br/ somente poderão ser resolvidas entre o usuário e o Mercado Pago e Nosso Love não será responsável pelo processamento de pagamentos efetuados através da plataforma Mercado Pago.<br>

A plataforma Mercado Pago poderá cobrar taxas pelo seu uso, sendo que o valor cobrado pelo WireCard fica a critério exclusivo do usuário.<br>

O Nosso Love é o único responsável pela exclusão dos dados de pagamento fornecidos pelo usuário de seu próprio banco de dados, e declara que o usuário está ciente de que Nosso Love não é responsável por facilitar a exclusão desses dados do banco de dados WireCard.<br>

9. POLÍTICA DE PRIVACIDADE E DO TRATAMENTO DOS DADOS:
Durante a utilização da plataforma pelo usuário, Nosso Love coletará e armazenará informações fornecidas pelo usuário de acordo com os termos desta ferramenta, bem como informações geradas automaticamente como características do dispositivo de acesso, navegador, logs de acesso ao aplicativo (IP, com data e hora), informações visitadas, telas visitadas, dados de geolocalização, histórico de aplicativos, etc., são armazenados em bancos de dados e cookies do navegador.<br>

Os dados que o Nosso Love recolhe dos utilizadores através da utilização da plataforma serão utilizados para prestar o serviço de forma adequada, para melhorar a navegação do utilizador e para fins publicitários e estatísticos.<br>

Os dados que o Nosso Love recolhe dos utilizadores através da utilização da plataforma serão utilizados para prestar serviços adequados, melhorar a navegação do utilizador e para fins publicitários e estatísticos.<br>

O usuário declara que compreende, aceita e concorda com o tratamento de todos os dados coletados por meio da plataforma pelo Nosso Love ou por terceiros conforme artigo 5º inciso X da Lei nº 13.709 de 2018, a saber:<br>

(i) a AWS que pode ser contatada por meio do legal@aws.com;<br>

(ii) a Mixpanel que pode ser contatada por meio do support@mixpanel.com;<br>

(iii) a HotJar que pode ser contatada por meio do legal@hotjar.com;<br>

(iv) a Google Analytics que pode ser contatada por meio do suport@google.com;<br>

(v) Sentry que pode ser contatada por meio do support@sentry.io;<br>

(vi) Segment; e, que pode ser contatada por meio do legal@segment.com;<br>

(vii) Movi Desk que pode ser contatada por meio do atendimento@movidesk.com.<br>

Todos os dados fornecidos pelos usuários ao Nosso Love por meio da utilização da plataforma serão considerados confidenciais pelo Nosso Love, que se compromete a envidar todos os esforços para manter a segurança de seus sistemas sob a custódia de tais dados, de acordo com as disposições de segurança do Decreto Norma nº 8.771/2016, como:<br>

(i) criptografar os dados coletados usando métodos padrão do setor, além de outras formas padrão de criptografia, para garantir sua inviolabilidade;<br>

(ii) utilizar softwares de alta tecnologia para impedir o acesso não autorizado a sistemas considerados ambientes controlados e seguros;<br>

(iii) O acesso controlado aos locais de armazenamento de dados pessoais é limitado a pessoal previamente autorizado e certificado, comprometendo-se a manter tais dados confidenciais, inclusive mediante a assinatura de acordos de confidencialidade;<br>

(iv) aplicar mecanismos de autenticação aos registros de acesso que possibilitem a personalização dos responsáveis pelo tratamento e acesso aos dados coletados em decorrência do uso da Plataforma; (v) anonimizar os dados do usuário ao compartilhar dados do usuário com terceiros que não sejam parceiros do Nosso Amor e,<br>

(vi) De acordo com o artigo 13 do Decreto nº 8.771/2016, manter uma lista indicando o tempo, duração, identidade e arquivos de destino dos funcionários ou responsáveis pelo acesso, com base nos registros de conexão e acesso ao aplicativo.<br>

Os dados do usuário coletados pelo Nosso Love através do uso da PLATAFORMA poderão ser compartilhados com terceiros nos seguintes casos:<br>

(i) proteger os interesses do Nosso Love em caso de conflito, incluindo ações judiciais;<br>

(ii) no caso de transações e mudanças societárias envolvendo Nosso Love, caso em que a transferência de dados é necessária para a continuidade dos serviços prestados por meio da Plataforma;<br>

(iii) uma ordem judicial ou um pedido de uma autoridade administrativa com autoridade legal para fazê-lo.<br>

A Nosso Love garante ao USUÁRIO, no que diz respeito ao processamento de dados pessoais, os seguintes direitos:<br>

(i) confirmar a existência de tratamento dos seus dados pessoais;<br>

(ii) solicitar acesso aos seus dados coletados pela PLATAFORMA por meio de seu próprio login ou pelo e-mail contato@nossolove.com;<br>

(iii) corrigir seus dados se estiverem incompletos, imprecisos ou desatualizados;<br>

(iv) bloquear ou excluir dados desnecessários, excessivos ou processados em violação à legislação brasileira aplicável;<br>

(v) fornecer a portabilidade dos dados pessoais para si ou para terceiros mediante solicitação expressa do usuário ao Nosso Love via contato@nossolove.com;<br>

(vi) apagamento dos dados pessoais processados com o seu consentimento, desde que não haja decisão judicial para registrá-los no Nosso Love;<br>

(vii) obter informações sobre entidades públicas ou privadas com quem Nosso Love compartilha seus dados; e,<br>

(viii) informações sobre as possibilidades e consequências de não fornecer o consentimento do usuário.<br>

Os usuários podem enviar um e-mail para contato@nossolove.com com dúvidas e/ou solicitações relacionadas aos seus dados pessoais.<br>

A Nosso Love compromete-se a eliminar os dados pessoais recolhidos dos utilizadores:<br>

(i) quando a finalidade para a qual foram coletados for atingida; ou, quando não forem mais necessários ou relevantes para o escopo da finalidade, de acordo com a finalidade descrita nestes Termos de Uso e Política de Privacidade;<br>

(ii) quando o usuário retirar seu consentimento, quando necessário, solicitando a exclusão do Nosso Love via contato@nossolove.com; ou,<br>

(iii) se determinado pela autoridade competente.<br>

Mesmo após desabilitar o cadastro de um usuário na plataforma, o Nosso Love pode reter alguns dados, como o CPF do usuário, apenas para verificar se algum usuário banido está tentando um novo cadastro.<br>

10. Licença para uso de imagens<br>
O usuário autoriza o Nosso Love a utilizar suas imagens, seja em formato de foto ou vídeo, em anúncios inseridos na plataforma de forma gratuita, irrestrita, irrevogável e irretratável, o que não implica em qualquer violação de seus direitos de imagem.<br>

11. Disposições gerais:<br>
Qualquer termo ou condição deste instrumento, que seja considerado inválido ou inválido por qualquer tribunal ou tribunal por qualquer motivo, não afetará a validade dos outros termos destes termos, que permanecerão em pleno vigor e efeito e vinculativos, tendo o maior impacto sobre ele.<br>

A falha do Nosso Love em fazer valer qualquer direito ou disposição destes Termos não constituirá uma renúncia à capacidade deste último de exercer seus direitos periodicamente dentro do prazo legal.<br>

Todos os materiais, patentes, marcas, registros, nomes de domínio, nomes, privilégios, criações, imagens, e todos os direitos e direitos conexos relativos à Plataforma, desenvolvida por Nosso LOVE MODEL, são e continuarão sendo de propriedade única e exclusiva de Nosso Love , concorda que o Usuário não se envolverá em nenhum ato ou fato que de alguma forma prejudique os direitos aqui estabelecidos e não reivindicará nenhum direito ou privilégio.<br>

Nosso Love pode fazer alterações neste instrumento a qualquer momento, bastando publicar uma versão revisada em nosso site. Por isso, recomendamos vivamente que visite sempre esta seção do nosso website e que a leia regularmente. No entanto, para promover um bom relacionamento, também publicaremos um aviso sobre essas mudanças.<br>

Este documento constitui o pleno entendimento entre o usuário e o Nosso Love e é regido pelas leis do Brasil, sendo o foro da Cidade de São Paulo/SP escolhido como o único foro competente para dirimir as questões decorrentes deste documento, renunciando expressamente a qualquer outro jurisdição. , por mais privilegiado que seja.<br>

12. Política de nomes:<br>
12.1 Deve conter de 5 a 18 caracteres.<br>

12.2 Símbolos não são permitidos.<br>

12.3 Números não são permitidos.<br>

12.4 Ameaças não são permitidas.<br>

12.5. Não são permitidos xingamentos, apelidos, tratamentos sexistas ou racistas.<br>

12.6. Degradar alguém para conteúdo abusivo degradante não é permitido.<br>

12.7. Conteúdo que incite medo não é permitido.<br>

12.8 Não é permitida a divulgação de outras mídias ou redes sociais.<br>

12.9. Não é permitida a divulgação de datas, locais ou períodos de tempo.<br>

Qualquer nome não coberto pela nossa política de nomes será penalizado.<br>

Termos e Condições de Assinatura do Contrato<br>
Por um lado, são partes deste instrumento a Nosso Love PROVEDOR DE CONTEÚDO NA INTERNET LTDA, sociedade anônima sediada na Av. Paulista, 171, Edifício D. Pedro I de Alcântara, PVMTO 04, Sala E3 VG, 01.311-904 , inscrito no CNPJ/MF ou CPF/MF sob o número 37.181.811/0001-46, doravante denominado Nosso Amor e, por outro lado, no cadastro eletrônico da pessoa física ou jurídica identificada pelo seu código de assinante, doravante referido como para assinantes.<br>

1. Objetivo dos termos e condições:<br>
O objetivo desta ferramenta é determinar os termos e condições dos contratos celebrados entre o Nosso Love e os assinantes (contratantes) para entrar em planos importantes na busca na plataforma Nosso Love.<br>

1.1 Informações disponíveis aos assinantes no site www.nossolove.com<br>

2. Código de assinatura:<br>
Nosso Love concederá ao ASSINANTE um "Código de Assinante" para identificar o ASSINANTE através do Atendimento Nosso Love, este será o Código de Identificação do Usuário - ID AD. Os assinantes podem encontrá-lo ao confirmar seu pedido e entregar produtos/serviços aos assinantes.<br>

3. Entrega:<br>
A entrega do produto/serviço terá início assim que o contrato for assinado e o pagamento confirmado.<br>

4. Assine o contrato:<br>
Preços, Formas de Pagamento: O contrato do assinante deve ser celebrado através do site Nosso Love, que incluirá todos os planos de assinatura disponíveis e suas condições específicas.<br>

4.1. Dado que as condições específicas do site (valor, prazos, condições de pagamento, etc.) serão parte integrante desta ferramenta, o assinante deverá escolher o plano de assinatura que deseja assinar.<br>

4.2. Para todos os fins legais, o Assinante expressamente declara e garante que:<br>

(I) ter capacidade legal para firmar este documento e utilizar o produto/serviço;<br>

(II) A confirmação de que este documento foi formalizado, vinculante para as partes e confirmado por contrato, será feito clicando no espaço reservado para este documento no site Nosso Love.<br>

4.3 Como contraprestação para efeito deste contrato, o Assinante deverá pagar ao Nosso Love o valor correspondente ao plano contratual de acordo com a seleção feita no ato da compra e válida no momento da compra.<br>

4.4 A forma de pagamento será selecionada pelo Assinante no site do programa selecionado, que também inclui a frequência de pagamento e quaisquer penalidades aplicáveis.<br>

4.5 Nosso Love reserva-se o direito de reajustar unilateralmente o valor de seus planos e assinaturas sem prévio aviso, mantendo as condições contratuais por prazo determinado e por prazo limitado, enquanto vigorar o prazo.<br>

5. Banco de dados:<br>
O assinante declara estar ciente de que, após a celebração do contrato de assinatura de um produto/serviço, esse produto/serviço passará a fazer parte do banco de dados Nosso Love, por meio do qual poderá receber informações do Nosso Love. Caso o subscritor não esteja interessado em receber esta informação, pode simplesmente informar o Serviço de Apoio ao Cliente Nosso Love desta decisão para assegurar que tem o direito de manifestar a sua oposição.<br>

5.1. Nosso Love garante a inviolabilidade e confidencialidade dos dados cadastrais de todos os seus assinantes. Todas as suas informações são armazenadas no banco de dados do Nosso Love com os mais rígidos padrões de segurança e processadas de acordo com as leis aplicáveis e a Seção 10 dos Termos de Uso da Plataforma. As informações pessoais não serão fornecidas a terceiros em nenhuma circunstância. Objetos de serviços não relacionados a estes Termos, objetos desta Ferramenta, a menos que autorizados pelo Assinante.<br>

6. Serviços de assinatura:<br>
Nosso Love oferece atendimento ao cliente assinante e está disponível através do e-mail contato@nossolove.com<br>

7. Prazo:<br>
O termo pode ser assinado por um período de até 30 dias, sujeito à escolha do assinante no site Nosso Love, prorrogado por igual período mediante renovação conveniente conforme procedimento previsto no item a seguir.<br>

8. Procedimento de atualização:<br>
Nosso Love possui um processo de renovação programado, específico para assinantes, para garantir renovações fáceis e ágeis.<br>

8.1. Caso a renovação não seja do interesse do assinante, ele pode responder pelo e-mail contato@nossolove.com ou entrar em contato com o atendimento ao cliente Nosso Love<br>

9. Cancelamento:<br>
O Nosso Love garante aos assinantes que esta ferramenta pode ser cancelada a qualquer momento, mediante prévio aviso do assinante e de acordo com o disposto nos termos de uso da plataforma.<br>

10. Rescisão:<br>
A parte inadimplente pode cancelar a assinatura e rescindir o instrumento se a parte inadimplente não remediar a inadimplência após notificação.<br>

10.1. Caso o assinante não pague o valor devido no prazo especificado no aviso enviado pelo Nosso Love, a ferramenta poderá ser encerrada e a entrega do produto/serviço imediatamente suspensa.<br>

11. Alterações nos Termos e Condições:<br>
Quaisquer alterações que afetem o encargo financeiro dos assinantes serão feitas mediante comunicação prévia com os assinantes, podendo os assinantes acordar por qualquer meio disponível, renegociar tais alterações, ou qualquer das partes poderá condená-lo caso não cheguem a um acordo.<br>

12. Jurisdição:<br>
Se necessário, os assinantes têm o direito de levar quaisquer dúvidas e problemas decorrentes deste instrumento ao tribunal da comarca do seu local de residência.<br>


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
                                 ao clicar no botão abaixo, você confirma que leu e aceita todos nossos termos e 
                                 políticas de privacidade citados acima. 
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
                                 <b><font color="green"size="2px" ><i class="fa fa-check-square-o"></i> VOCÊ ACEITOU OS TERMOS & POLÍTICAS DE PRIVACIDADE!</font> </b><br> 
                                 1° Etapa concluída com sucesso.
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
                                       <h2><font size="2px">2° ETAPA: CONFIRMAR IDENTIDADE </font></h2>
                                    </td>
                                 </tr>
                              </table>
                             
                              <br>
                              <font size="2px">   
                              1° VÍDEO DE VERIFICAÇÃO: <br>
                              <small>Grave um vídeo de no máximo 15 segundos usando a camera frontal, segurando o documento ao lado do rosto ( RG ou CNH ) e fale: 
                              <br>
                              ( Eu aceito os termos do site Nosso Love e permito a divulgação da minha mídia de fotos e vídeos )</small>
                              <br>
                              2° FOTO DA FRENTE DO DOCUMENTO: <br>
                              <small>Envie-nos uma foto de boa qualidade da frente do seu documento.</small>
                              <br>
                              3° FOTO DO VERSO DO DOCUMENTO: <br>
                              <small>Envie-nos uma foto de boa qualidade do verso do seu documento.</small>
                              </font>
                              <br>
                               <div class="box-divider m-a-0"></div>
                              <form method="POST" action="cadastro.php" enctype="multipart/form-data"> 
                                 <br>
                                 <?php echo $messageUpload1Erro ?>
                                 <div id="arquivoup"> 
                                    <font size="2px"> VÍDEO DE VERIFICAÇÃO:<br></font> 
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
                                        <h7 style="line-height: 0.5;"><font color="red" >PERFIL NÃO VERIFICADO, REENVIE OS DADOS.</font></h5> 
                                        <BR>
                                        <font size="2px"><?php echo $user_info['motivo_doc_recusado']; ?></font>
                                        
                                
                                       
                                        
                                      
                            </center>
                              
                           </div>
                            <small>
                           <div class="box-header">
                              <table style="width:98%">
                                 <tr>
                                    <td style="width:100%">
                                        
                                       <h2><font size="2px">2° ETAPA: CONFIRMAR IDENTIDADE </font></h2>
                                    </td>
                                 </tr>
                              </table>
                              <br>
                              <font size="2px">   
                              1° VÍDEO DE VERIFICAÇÃO: <br>
                              <small>Grave um vídeo de no máximo 15 segundos usando a camera frontal, segurando o documento ao lado do rosto ( RG ou CNH ) e fale: 
                              <br>
                              ( Eu aceito os termos do site Nosso Love e permito a divulgação da minha mídia de fotos e vídeos )</small>
                              <br>
                              2° FOTO DA FRENTE DO DOCUMENTO: <br>
                              <small>Envie-nos uma foto de boa qualidade da frente do seu documento.</small>
                              <br>
                              3° FOTO DO VERSO DO DOCUMENTO: <br>
                              <small>Envie-nos uma foto de boa qualidade do verso do seu documento.</small>
                              </font>
                              <br>
                               <div class="box-divider m-a-0"></div>
                              <form method="POST" action="cadastro.php" enctype="multipart/form-data">
                                 <br>
                                 <?php echo $messageUpload1Erro ?>
                                 <div id="arquivoup"> 
                                    <font size="2px"> VÍDEO DE VERIFICAÇÃO:<br></font> 
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
                        <h3><font size="2px"><b>3° ETAPA:</b> ENVIO DO MATERIAL DE MÍDIA </font></h3>
                        <small>Envie-nos o seu book de fotos profissionais que serão exibidos em seu perfil e divulgados em nosso site.</small>
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
                                 <font size="2px"><i class="fa fa-cloud-upload"></i><BR> ENVIAR MÍDIA</font></button>
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
                                        <h7 style="line-height: 0.5;"><font color="red" >PERFIL NÃO VERIFICADO, REENVIE OS DADOS.</font></h5> 
                                        <BR>
                                        <font size="2px"><?php echo $user_info['motivo_mid_recusada']; ?></font>
                                        
                                
                                       
                                        
                                      
                            </center>
                              
                           </div>
                            <small>
                     <div class="box-header" >
                        <h3><font size="2px"><b>3° ETAPA:</b> ENVIO DO MATERIAL DE MÍDIA </font></h3>
                        <small>Envie-nos o seu book de fotos e vídeo profissionais que serão exibidos em seu perfil e divulgados em nosso site.</small>
                     </div>
                     <div class="box-body">
                         
                       
                         
                         <?php echo $messageUploadMidiaERRO.'<br>'.$messageUploadMidia ?> 
                         
                        <form method="POST" action="cadastro.php" enctype="multipart/form-data">
                           <div id="multiple_upload">
                              <font size="2px"> BOOK DE FOTOS E VÍDEOS:<br></font> 
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
                                 <font size="2px"><i class="fa fa-cloud-upload"></i><BR> ENVIAR MÍDIA</font></button>
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
                                    
                                        <h5 style="line-height: 0.5;"><font color="orange" >AGUARDANDO ANÁLISE DE DADOS</font></h5> 
                                        <font size="2px"><smnall>Cadastro completo, agora é com a gente! </smnall></font>
                                        
                             
                              
                           </div>
                            <small>
                                  
                                  
                                  
               <BR>
                   <BR>
                       <BR>
            1° - TERMOS E POLÍTICAS DO CONTRATO :<br>
             <?php if($user_info['termos_aceitos']=='SIM'){?>
             <font color="green"><i class="fa fa-check-square-o"></i> Termos Aceitos.</font>  
           <?php }else{?>
               <font color=""><i class="fa fa-check-square-o"></i></font>
           <?php } ?>
            <div class="box-divider m-a-0"></div>
            
            
            
            2° - CONFIRMAR IDENTIDADE : <?php if($user_info['documentos_aceitos']=='RECUSADO'){?>  <font color="red"> <a href=""> > <u>VER MOTIVO</u> < </a></font> <?php }?><br> 
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
           
           
           3° - MATERIAL DE MÍDIA PROFISSIONAL : <?php if($user_info['midia_aceita']=='RECUSADO'){?>  <font color="red"> <a href=""> > <u>VER MOTIVO</u> < </a></font> <?php }?><br>                   
             
           <?php if($user_info['midia_aceita']=='CONFIRMADO'){?>
             <font color="green"><i class="fa fa-check-square-o"></i>Mídia Aceita.</font>  
           <?php }else if($user_info['midia_aceita']=='RECUSADO'){?>
             <font color="red"><i class="fa fa-close"></i> Mídia recusada.</font>  
           <?php }else if($user_info['midia_aceita']=='ANALISE'){?>
             <font color="orange"><i class="fa fa-check-square-o"></i> Mídia em analise...</font>  
           <?php }else{?>
               <font color=""><i class="fa fa-check-square-o"></i></font>
           <?php } ?>
           <div class="box-divider m-a-0"></div>
               <br>                
               
                    <font size="2px">
                    Nossa equipe verificará todos os seus dados. <br>
                Isso pode levar algumas horas,  nós avisarem a você quando seu perfil for verificado.
                        </font>
                 
                 </small>
                 <br><br>
                 <a href="account.php" class="btn-sm red  btn-block" style="background-color:white; color:black; border:0px;">
                                    <center><font size="2px"><i class="fa fa-reply"></i> <br> VOLTAR </font></center>
                                 </a>
           
                    
                    <?php }else{ ?>  
                    <BR>
    <div class="text-center">
      <h5 class="_700 m-b" >PARABÉNS!</h2>
      <h6 class="_700 m-b" style="color:#3e9a47;">SUA CONTA FOI VERIFICADA COM SUCESSO.</h2>
      <br>
     
      
      
       
     
    </div>  
                 
       <h7 class="m-b-md">
     <span style="color:#d53a3a;"> <b><?php echo  $user_info['firstname'].' '.$user_info['lastname'];?></b></span>, todas as estapas do seu cadastro foram concluídas com sucesso. Seus dados foram analisados e sua conta já está verificada. 
      <br><br>
      Para que você possa divulgar seu perfil e fotos em nosso site é necessário possuir uma <b><span style="color:#3e9a47;">ASSINATURA ATIVA</span></b> em algum dos nossos planos. 
      </h7>             
      <div class="text-center">
          <br>
       <a href="planos.php" class="btn rounded btn-outline b-danger text-red p-x-md m-y" style="border-color:red; color:;">VER PLANOS E PREÇOS</a>
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