<?php
  require_once '../vendor/autoload.php';

    MercadoPago\SDK::setAccessToken("TEST-2426877546667017-080302-84f6b39e357af40b7bc160f9b342c129-327336472");

 
   $merchant_order = null;
 
   switch($_GET["topic"]) {
       case "payment":
           $payment = MercadoPago\Payment::find_by_id($_GET["id"]);
           // Get the payment and the corresponding merchant_order reported by the IPN.
           $merchant_order = MercadoPago\MerchantOrder::find_by_id($_GET["id"]);
           http_responde_code(200);
            $f = fopen('aprovado.log', 'a');
        fwrite($f, "asdsadkasdlkasdlaskdl");
        //fwrite($f, $log_sms); # imprime os dados no arquivo de log
        fwrite($f, "" . chr(13) . "" . chr(10) . "===================================================================================" . chr(13) . "" . chr(10) . "" . chr(13) . "" . chr(10) . ""); # um espa�o para separar as ocorrencias
        fclose($f);
	    
	    
           break;
       case "merchant_order":
           $merchant_order = MercadoPago\MerchantOrder::find_by_id($_GET["id"]);
           break;
   }
 
   $paid_amount = 0;
   foreach ($merchant_order->payments as $payment) {  
       if ($payment['status'] == 'approved'){
           $paid_amount += $payment['transaction_amount'];
             $f = fopen('aprovado.log', 'a');
        fwrite($f, "asdsadkasdlkasdlaskdl");
        //fwrite($f, $log_sms); # imprime os dados no arquivo de log
        fwrite($f, "" . chr(13) . "" . chr(10) . "===================================================================================" . chr(13) . "" . chr(10) . "" . chr(13) . "" . chr(10) . ""); # um espa�o para separar as ocorrencias
        fclose($f);
       }
   }
  
   // If the payment's transaction amount is equal (or bigger) than the merchant_order's amount you can release your items
   if($paid_amount >= $merchant_order->total_amount){
       if (count($merchant_order->shipments)>0) { // The merchant_order has shipments
           if($merchant_order->shipments[0]->status == "ready_to_ship") {
               print_r("Totally paid. Print the label and release your item.");
           }
       } else { // The merchant_order don't has any shipments
           print_r("Totally paid. Release your item.");
       }
   } else {
       print_r("Not paid yet. Do not release your item.");
   }
  
?>