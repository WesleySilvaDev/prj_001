<?php
$url = "https" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$verifica = substr ('acorpanhantes', $url);
 
if ($verifica !== false) {
    $retorno = "../";
}
?>
<div class="menu-block ">
         <div class="menu-inner-w" >
            <div class="logo">
               <a href="<?=$retorno;?>index.php">
                  <img src="<?=$retorno;?>assets/imagens/logo/COR.png" alt="" class="lazyloaded" data-ll-status="loaded">
                  <noscript><img src="<?=$retorno;?>assets/imagens/logo/COR.png" alt=""></noscript>
               </a>
            </div>
            <div class="menu-activated-on-hover menu-w">
               <div class="os_menu karivarin">
                  <ul id="menu-side-menu" class="menu">
                     <li is_parent class=' menu-item menu-item-type-post_type menu-item-object-page' style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><a href="<?=$retorno;?>index.php">INICIAL</a></li>
                     <li is_parent class=' menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children'>
                        <a href="#" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">ACOMPANHANTES</a>
                        <ul class="sub-menu" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #151515;" >
                           <li  is_child class=' menu-item menu-item-type-post_type menu-item-object-page'><a href="<?=$retorno;?>acompanhantes/todas">TODAS</a></li>
                           <?php foreach ($consultaAcompanhantes as $acompanhantes) { ?>
                               <li  is_child class=' menu-item menu-item-type-post_type menu-item-object-page'><a href="<?=$retorno;?>acompanhantes/<?=utf8_encode($acompanhantes['url_acompanhantes']);?>"><?=utf8_encode($acompanhantes['acompanhantes']);?></a></li>
                           <?php } ?>
                        </ul>
                     </li>
                     <li is_parent class=' menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children'>
                        <a href="#" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">CATEGORIAS</a>
                        <ul class="sub-menu" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #151515;" > 
                           <?php foreach ($consultaCategorias as $categorias) {  ?>
                                <li  is_child class=' menu-item menu-item-type-post_type menu-item-object-page'>
                                    <a href="<?=$retorno;?>categorias/<?=$categorias['url_categoria'];?>"> 
                                        <?php 
                                        if($categorias['categoria'] == 'massagem_tantrica'){  echo 'MASSAGEM TANTRICA';  }
                                        else if($categorias['categoria'] == 'suggar_baby'){  echo 'SUGGAR BABY';   } 
                                        else if($categorias['categoria'] == 'desp_solteiro'){  echo'DESPEDIDA DE SOLTEIRO';  }  
                                        else {
                                        echo utf8_encode($categorias['categoria']);
                                        }
                                        ?> 
                                        </a>
                                </li>
                           <?php } ?>
                        </ul>
                     </li>
                        <li is_parent class=' menu-item menu-item-type-post_type menu-item-object-page' style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"> 
                         <a href="" data-toggle="modal" data-target="#modal-contato"> CONTATO</a></li> 
                        
                       
                  </ul>
               </div>
            </div>
            <div class="tnp tnp-subscription">
             </div>
          <div class="tnp tnp-subscription">
<form method="get" action="<?=$retorno;?>search.php" id="form-pesquisar" autocomplete="off">

<input type="hidden" name="nlang" value="">
<div class="tnp-field tnp-field-email">
<table>
  <tbody><tr>
    <th><input class="tnp-email" type="text" placeholder="Nome da modelo" value="" name="s" id="s" style="height: 35px; border-radius: 5px 0px 0px 5px" ></th>
    <th><input class="tnp-submit" type="submit" value="PESQUISAR" style="height: 35px; border-radius: 0px 5px 5px 0px"></th>
  </tr>
  </tbody></table>
</div>
</form>


 

</div>
           
                 
                <div class="menu-search-form-w hide-on-narrow-screens"> 
               <a href="<?php echo$retorno?>account/logout.php"  class="btn btn-danger" style="height: 35px; border-radius:5px; margin-top:2px; background-color:#2f2f2f; border-color: #2f2f2f;"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> MINHA CONTA </a>     
            </div>
              
         </div>
      </div>
      <!-- # DESKTOP TOP MENU  -->
      
      
      
      <!--  MOBILE  TOP MENU -->
      <div class="menu-toggler-w" style="background-color: #000000; border-bottom: 1px solid #282828;  line-height:8px; padding-bottom:0px;"  >
         <a href="#" class="menu-toggler"> 
         <img src="<?=$retorno;?>assets/imagens/menu.png" alt="" style="height: 35px; margin-top:-10px;">
         <span class="menu-toggler-label">Menu</span>  
         </a>
         <a href="<?=$retorno;?>index.php" class="logo">
            <img src="<?=$retorno;?>assets/imagens/logo/COR.png" alt="" class="lazyloaded" data-ll-status="loaded"  style="height: 45px; margin-left:-27px;"> 
            <center><font size="2" color="gray" style=" line-height:20px;  margin-left:-27px; font-family: Abhaya Libre Regular;">As melhores acompanhantes de luxo</font></center>
         </a>
         <div class="menu-search-form-w hide-on-narrow-screens" style="margin-top:-13px;">
          <a data-toggle="modal" data-target="#modal-pesquisar" style="text-decoration: none; color:white;"> <i class="os-new-icon os-new-icon-search" style="font-size:30px;  cursor:pointer;margin-left: -20px;"></i> </a>
                
            </div>
      </div>
      <div class="mobile-menu-w" style="background-color: #000000; ">
         <div class="karivarin mobile-menu menu-activated-on-click">
            <ul id="menu-side-menu" class="menu" style="">
                     <li is_parent class=' menu-item menu-item-type-post_type menu-item-object-page' style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;text-align: left;">
                         <a href="<?=$retorno;?>index.php">INICIAL</a>
                     </li>
                     
                     <li is_parent class=' menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children' style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: left;">
                            <a href="#" >ACOMPANHANTES</a>
                                <ul class="sub-menu"  style=" background-color: #0e0e0e;" >
                                    <li  is_child class=' menu-item menu-item-type-post_type menu-item-object-page'>  
                                        <a href="<?=$retorno;?>acompanhantes/todas"> - TODAS</a> 
                                    </li>
                                    <?php foreach ($consultaAcompanhantesMobile as $acompanhantesM) { ?>
                                    <li  is_child class=' menu-item menu-item-type-post_type menu-item-object-page'>  
                                        <a href="<?=$retorno;?>acompanhantes/<?=utf8_encode($acompanhantesM['url_acompanhantes']);?>"> - 
                                            <?=utf8_encode($acompanhantesM['acompanhantes']);?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                     </li>  
                     
                     <li is_parent class=' menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children' style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: left;">
                            <a href="#" >CATEGORIAS</a>
                                <ul class="sub-menu" style=" background-color: #0e0e0e;" > 
                                    <?php foreach ($consultaCategoriasMobile as $categoriasM) {  ?>
                                <li  is_child class=' menu-item menu-item-type-post_type menu-item-object-page' >
                                    <a href="<?=$retorno;?>categorias/<?=$categoriasM['url_categoria'];?>"> -
                                        <?php 
                                        if($categoriasM['categoria'] == 'massagem_tantrica'){  echo 'MASSAGEM TANTRICA';  }
                                        else if($categoriasM['categoria'] == 'suggar_baby'){  echo 'SUGGAR BABY';   } 
                                        else if($categoriasM['categoria'] == 'desp_solteiro'){  echo'DESPEDIDA DE SOLTEIRO';  }  
                                        else {
                                        echo utf8_encode(strtoupper($categoriasM['categoria']));
                                        }
                                        ?> 
                                        </a>
                                </li>
                           <?php } ?>
                        </ul>
                     </li> 
                    
                       <li is_parent class="menu-item menu-item-type-post_type menu-item-object-page" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: left;"><a href=" <?php echo $retorno?>account/logout.php">MINHA CONTA</a></li> 
                      
                    
                      
                      
                 
                      
                
          
                        
                     
                     
                    
                  </ul>
         </div>
      </div>
      <!-- # MOBILE TOP MENU  -->
      <div class="sidebar-main-toggler">
         <i class="os-new-icon os-new-icon-grid"></i> 
      </div>
 
      

      