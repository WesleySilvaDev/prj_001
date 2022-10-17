<?php  
if (isset($_GET['Plano'])) {
    
    $plano           = $_GET['Plano']; 
    include_once("includes/controller.php");    
    if(!$session->logged_in){   header("Location: login.php");  }else  { 
    
        if($plano=='TopModel') { $price_plano = 'price_1LCzV2Lh38GAmiSGGPwo0KVN'; }
        if($plano=='Premium')  { $price_plano = 'price_1LCzQtLh38GAmiSGpgzfWCZq'; }
        if($plano=='Basico')   { $price_plano = 'price_1LCzasLh38GAmiSGIk5xHbxd'; }
        
        
        include './stripe/stripe-php/init.php'; //require 'vendor/autoload.php'; 
        
        \Stripe\Stripe::setApiKey('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'); 
        
        header('Content-Type: application/json'); 
        
        $DOMAIN = 'https://nossolove.com/account'; 
        
        $checkout_session = \Stripe\Checkout\Session::create([
          'line_items' => [[ 
            'price' => $price_plano,
            'quantity' => 1,
          ]], 
         // 'mode' => 'payment',
          'mode' => 'subscription',
          'success_url' => $DOMAIN . '/account.php?ProcessPayment='.$plano,
          'cancel_url' => $DOMAIN . '/account.php',
        ]);
         
        header("HTTP/1.1 303 See Other");
        header("Location: " . $checkout_session->url);
    
        
    }        
                 
} 
     
     
     
