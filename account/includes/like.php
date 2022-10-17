<?php
include_once("controller.php");
error_reporting(0);


if(isset($_GET['like'])){
    
    $userLike = $_GET['like'];
    $_SESSION['verificarLike'][$userLike] = 'liked';
    $like00 = $db->prepare("UPDATE users SET likes = (likes+1) WHERE username = '$userLike'");
    $like00->execute();

    
}elseif(isset($_GET['unlike'])){
    $userUnlike =  $_GET['unlike'];
    unset($_SESSION['verificarLike'][$userUnlike]);
    $like01 = $db->prepare("UPDATE users SET likes = (likes-1) WHERE username = '$userUnlike'");
    $like01->execute();
    
}

