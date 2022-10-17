<?php
    session_start();
 
require '../vendor/autoload.php';
 
$publicKey = "TEST-37b81424-2b8b-42f7-b0cd-99c217a90c92";   

MercadoPago\SDK::initialize();

$config = MercadoPago\SDK::config();
  

$config->set('ACCESS_TOKEN', 'TEST-2890745158985823-020512-56ae931e86fd1e2c45639fbec6053575-1066494810');   