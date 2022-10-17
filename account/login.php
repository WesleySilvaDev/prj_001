<?php 
include_once("includes/controller.php");
$form = new Form; 
  if($session->logged_in){ 
          header("Location: index.php");   
  }else{
 
//var_dump($_SESSION); 
  } 
   
  
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <title>LOGIN </title>
  <meta name="description" content="As melhores acompanhantes de luxo" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="img/favicon.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="img/favicon.png">
  
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
 
</head>
<style>
    .col-sm-12 { 
        width: 110%;
    }
  </style>
<body class="pace-done grey" style="background-color: #000000;">
  <div class="app" id="app">

<!-- ############ LAYOUT START-->
  <div class="center-block w-xxl w-auto-xs p-y-md">
   <div class="navbar">
      <div class="pull-center">
        <a class="navbar-brand" href="../index.php"> 
         <img src="img/COR.png" alt="." class="" style="max-height:36px" > 
        </a> 
      </div>
    </div>

<div class="col-md-12">
      <div class="box" style="border-radius:10px;">
          <div class="b-b b-danger nav-active-red">
          <ul class="nav nav-tabs" style=" width:99%;"> 
            <li class="nav-item"  style=" width:49%; margin-left: 3px;">
              <a class="nav-link  <?php if (!isset($_GET['registro'])) {   echo'active'; }?>" href="login.php"data-toggle="tab" data-target="#tab4"><small><center>LOGIN</center></small></a>
            </li>
            <li class="nav-item"  style=" width:48%;">
              <a class="nav-link  <?php if (isset($_GET['registro'])) {   echo'active'; }?>" href="login.php?registro" href data-toggle="tab" data-target="#tab5"><small><center>CADASTRE-SE</center></small></a>
            </li> 
          </ul>
        </div>
         
         
        <div class="tab-content m-a-0">
  <div class="tab-pane animated fadeIn text-muted  <?php if (!isset($_GET['registro'])) {   echo'active'; }?>" id="tab4">
    <div class="box-header">
          <h2><center> LOGIN  </center></h2> 
          <small>  <? //var_dump($_SESSION);
          
           ?></small>
        </div>
        <div class="box-divider m-a-0"></div>
        <div class="box-body">
            <?php
                      if ($configs->getConfig('ACCOUNT_ACTIVATION') == 4){ 
                      } else if(isset($_SESSION['regsuccess'])){
                          
                          /* Registration is disabled */ 
                          if ($_SESSION['regsuccess']==6){
                              echo "<div class='login'><h6>O registro está desativado no momento!</h6>";
                              echo "<p>Nós lamentamos <strong>".$_SESSION['reguname']."</strong> mas o registro neste site está desativado no momento."
                              ."Tente novamente mais tarde ou entre em contato com a administração do site.</p></div>";
                               
                          /* Registration was successful */    
                          } else if($_SESSION['regsuccess']==0 || $_SESSION['regsuccess']==5) {
                              echo "<div class='login'><h6>Registrou-se com sucesso!!</h6>";
                              echo "<p>Obrigado  por se registrar em nosso site. Faça login!</p></div>";
                              
                          /* User Activation */  
                          } else if($_SESSION['regsuccess']==3){
                              echo "<div class='login'><h6>Registrou-se com sucesso!</h6>";
                              echo "<p>Obrigado<strong>".$_SESSION['reguname']."</strong>, sua conta foi criada. "
                              ."Um código de verificação foi enviado para o seu e-mail."
                              ."Por favor, verifique seu e-mail.</p></div>";
                          
                          /* Admin Activation */  
                          } else if($_SESSION['regsuccess']==4){
                              echo "<div class='login'><h6>Registrou-se com sucesso!</h6>";
                              echo "<p>Obrigado <strong>".$_SESSION['reguname']."</strong>, sua conta foi criada. "
                              ."Agora basta aguardar até que nossa equipe verifique as informações e ative sua conta. Você será informado por e-mail.</p></div>";
                          
                          /* Registration failed */
                          } else if ($_SESSION['regsuccess']==2){
                              echo "<div class='login'><h6>Ocorreu um erro ao registrar-se.</h6>";
                              echo "<p>Lamentamos, mas ocorreu um erro ao registrar-se <strong>".$_SESSION['reguname']."</strong>, "
                              ."por favor, tente novamente mais tarde.</p></div>";
                          }
                          unset($_SESSION['regsuccess']);
                          unset($_SESSION['reguname']);
                      } 
                      ?>
          <form name="form" action="includes/process.php" method="POST">
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Email" value="<?php echo Form::value("username"); ?>" style="height: 30px;  border-radius:5px;">
              <small><font color="red"><?php if(Form::error("username")) { echo "<div class='help-block' id='user-error'>".Form::error('username')."</div>"; } ?></font></small>
            </div> 
             
            <div class="form-group">
              <label for="exampleInputPassword1">Senha</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" value="<?php echo Form::value("password"); ?>" style="height: 30px;  border-radius:5px;">
              <small><font color="red"><?php if(Form::error("password")) { echo "<div class='help-block' id='pass-error'>".Form::error('password')."</div>"; } ?></font></small>
            </div>   
            <button type="submit" class="btn red btn-block m-b">Entrar</button>
             <input type="hidden" name="form_submission" value="login">
             <div class="box-divider  m-a-1"></div>
          <a href="../"  class="btn btn-sm red btn-block m-b" style="background-color: #1e1e1e;"><i class="fa fa-reply"  style=""></i> VOLTAR</a>
          </form>
           
         
          
        </div>
  </div>
  <div class="tab-pane animated fadeIn text-muted  <?php if (isset($_GET['registro'])) {   echo'active'; }?>" id="tab5">
   
          <?php
          if ($configs->getConfig('ACCOUNT_ACTIVATION') == 4){?>
                       <br><div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Registro Desabilitado!</h4>
  <p><font size="2px"><b>Lamentamos, mas no momento o registro de novas garotas está desativado.</font></p>
  <hr>
  <p class="mb-0"><font   size="2px">Tente novamente mais tarde, obrigado!</font></p>
  </div>    
        
        
        <?php  }else{?>
                   <div class="box-header">
          <h2><center> CADASTRE-SE  </center></h2> 
                  </div>  
                   <div class="box-divider m-a-0"></div>
        <div class="box-body">
           
          <form name="form" action="includes/process.php" method="POST">
            <div class="form-group"> 
            <?php  
            
            function id($qtd){
            $Caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUXYZ';
            $QuantidadeCaracteres = strlen($Caracteres);
            $QuantidadeCaracteres--; 
            $Hash=NULL;
            for($x=1;$x<=$qtd;$x++){
            $Posicao = rand(0,$QuantidadeCaracteres);
            $Hash .= substr($Caracteres,$Posicao,1);
            }
            return $Hash;
            }
            $username_generate = 'NL_'.id(13);
            ?>
              <input type="text" name="user" class="form-control" id="exampleInputEmail1" placeholder="Usuário  " value="<?php echo  $username_generate; ?>" style="height: 30px;  border-radius:5px;" hidden>
              <small><font color="red"><?php if(Form::error("user")) { echo "<div class='help-block' id='user-error'>".Form::error('user')."</div>"; } ?></font></small>
            </div>  
             <div class="form-group">
              <label for="exampleInputEmail1">Nome</label>
              <input type="text" name="firstname" class="form-control" id="exampleInputEmail1" placeholder="Nome" value="<?php echo Form::value("firstname"); ?>" style="height: 30px;  border-radius:5px;">
              <small><font color="red"><?php if(Form::error("firstname")) { echo "<div class='help-block' id='firstname-error'>".Form::error('firstname')."</div>"; } ?></font></small>
            </div> 
               <div class="form-group">
              <label for="exampleInputEmail1">Sobrenome</label>
              <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" placeholder="Sobrenome" value="<?php echo Form::value("lastname"); ?>" style="height: 30px;  border-radius:5px;">
              <small><font color="red"><?php if(Form::error("lastname")) { echo "<div class='help-block' id='lastname-error'>".Form::error('lastname')."</div>"; } ?></font></small>
            </div> 
             <div class="form-group">
              <label for="exampleInputEmail1">Email <small> </small></label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="<?php echo Form::value("email"); ?>" style="height: 30px;  border-radius:5px;">
              <small><font color="red"><?php if(Form::error("email")) { echo "<div class='help-block' id='email-error'>".Form::error('email')."</div>"; } ?></font></small>
            </div>
               <div class="form-group">
              <label for="exampleInputEmail1">Confirmar email </label>
              <input type="email" name="conf_email" class="form-control" id="exampleInputEmail1" placeholder="Confirmar email" value="<?php echo Form::value("conf_email"); ?>" style="height: 30px;  border-radius:5px;">
              <small><font color="red"><?php if(Form::error("email")) { echo "<div class='help-block' id='email-error'>".Form::error('email')."</div>"; } ?></font></small>
            </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Senha</label>
              <input type="password" name="pass" class="form-control" id="exampleInputEmail1" placeholder="Senha" value="<?php echo Form::value("pass"); ?>" style="height: 30px;  border-radius:5px;">
              <small><font color="red"><?php if(Form::error("pass")) { echo "<div class='help-block' id='pass-error'>".Form::error('pass')."</div>"; } ?></font></small>
            </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Confirmar senha</label>
              <input type="password" name="conf_pass" class="form-control" id="exampleInputEmail1" placeholder="Confirme a senha" value="<?php echo Form::value("conf_pass"); ?>" style="height: 30px;  border-radius:5px;">
              <small><font color="red"><?php if(Form::error("conf_pass")) { echo "<div class='help-block' id='pass-error'>".Form::error('conf_pass')."</div>"; } ?></font></small>
            </div>
                
       
                    <?php
                    if ($configs->getConfig('ENABLE_CAPTCHA')){
                        echo "<div class='g-recaptcha captchsize' data-siOtekey='6Lf4nUkUAAAAABquLdc-ll9icBH7xzK4GFjUfiI1'></div>";
                        if(Form::error("recaptcha")) { echo "<div class='help-block' id='email-error'>".Form::error('recaptcha')."</div>"; }
                    }
                    ?>      
                    
              <input type="hidden" name="form_submission" value="register">
                    
                    <div style='display:none; visibility:hidden;'><input type='text' name='killbill' maxlength='50' /></div>  
            <button type="submit" id="enviaDados" class="btn btn-block red m-b">CONFIRMAR CADASTRO</button>
             
          </form> 
        </div>
           
                   <?php }?>
        
  </div> 
</div>
      </div>
</div> 
  
            <!-- Activation -->
            <div class="form" id="form-activate" style="display: none">
                <?php if ((isset($_GET['mode'])) && ($_GET['mode'] == 'activate')) { $session->activateUser($_GET['user'], $_GET['activatecode']); } ?>
            </div>        
 
    <div class="p-v-lg text-center">
      <div class="m-b"><a ui-sref="access.forgot-password" class="text-primary _600">ﾠ</a></div>
    </div>
  </div>

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
