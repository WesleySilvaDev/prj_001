<?php
	include_once('config.php'); 
	$s = $_POST['palavra'];
    $consultaUsuariosPesquisa = $pdo->query("SELECT * FROM users WHERE  firstname LIKE '%$s%' " );

    foreach($consultaUsuariosPesquisa as $users) {
    $id_username = $users['username'];
    $firstname =     $users['firstname'];
    $lastname =     $users['lastname'];
    $foto = $users['profile_photo'];
    
    echo '<div class="autosuggest-items-shadow"></div>
           <div class="autosuggest-items">
              <a href="" class="autosuggest-item">
                 <div class="autosuggest-item-media-w">
                    <div class="autosuggest-item-media-thumbnail fader-activator" style="background-image:url(); background-size: cover;"></div>
                 </div>
                 <h5 class="autosuggest-item-title">'.$firstname.'</h5>
              </a>
           </div>';
    
    }
        