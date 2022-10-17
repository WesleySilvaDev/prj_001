<?php
include_once("includes/controller.php");
if(!$session->logged_in){ 
header("Location: ".$configs->homePage());
    exit;
}   
?>
<!-- Site Navigation -->
<nav class="scroll nav-active-red" >
   <ul class="nav" ui-nav>
      <li class="nav-header hidden-folded">
         <small class="text-muted">Menu</small>
      </li>
      <li <?php if($pagename == 'account') { echo 'class="active"'; } ?> >
         <a onclick="location.href='account.php';"> <span class="nav-icon"> <i class="fa fa-user"></i></span> <span class="nav-text">Perfil</span> </a>
      </li>
      <li <?php if($pagename == 'planos') { echo 'class="active"'; } ?>>
         <a onclick="location.href='planos.php';"> <span class="nav-icon" > <i class="fa fa-bullhorn"></i></span> <span class="nav-text">Planos</span> </a>
      </li>
      <li <?php if($pagename == 'pagamentos') { echo 'class="active"'; } ?>>
         <a onclick="location.href='pagamentos.php';"> <span class="nav-icon" > <i class="fa fa-money"></i></i></span> <span class="nav-text">Assinaturas e Pagamentos</span> </a>
      </li>
      <li >
         <a href="../index.php" > <span class="nav-icon"> <i class="fa fa-mail-reply"></i></i></span> <span class="nav-text">Voltar ao site</span> </a>
      </li>
      <li class="nav-header hidden-folded">
         <small class="text-muted">
            <div class="box-divider m-a-0"></div>
         </small>
      </li>
      <li class="hidden-folded" > 
         <a href="logout.php?path=login" >  <span class="nav-icon"><i class="fa fa-power-off"></i></span> <span class="nav-text">Sair</span> </a>
      </li>
      <?php if ($session->isSuperAdmin()){ ?>
      <?php } ?>
   </ul>
</nav>
  
<!-- END Site Navigation -->
