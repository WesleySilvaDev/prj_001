<?php ob_start() ?>
<?php

ini_set('display_errors', 0);
include_once "Config/config.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Cache-Control: no-cache, must-revalidate");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
 
$now = date('Y-m-d H:i:s'); 

  
if (isset($_POST['tokenCartao'])) {

 
    $NumPedido = date("y").date("z").substr(crc32(time()), 5);

     
    $payment = new MercadoPago\Payment();
    $payment->transaction_amount = (float)$_POST['valorTotal'];
    $payment->token = $_POST['tokenCartao']; 
    $payment->description = "ASSINATURA";  
    $payment->installments = (int)$_POST['parcelas'];
    $payment->payment_method_id = $_POST['cartao'];
    $payment->issuer_id = (int)$_POST['bandeira'];
    $payment->external_reference = $NumPedido;  
    $payment->statement_descriptor = "NOSSOLOVE"; 
    $payment->notification_url = "https://www.nossolove.com/account/mercadopago/retorno/retorno.php";  
    //$payment->binary_mode = false;

    $preference = new MercadoPago\Preference();

    $items = array();
      
    $items[0]['id']           = 100;
    $items[0]['title']        = "ASSINATURA";
    $items[0]['unit_price']   = (float)$_POST['valorTotal'];
    $items[0]['currency_id']  = "BRL";
    $items[0]['quantity']     = 1;

    $payer = new MercadoPago\Payer();
    $payer->email = $_POST['email'];

    $preference->items = array($items);
    $preference->payer = $payer;
    $preference->save();

    $payment->payer = $payer;
    $payment->save();

    if($payment->error){
        $f = fopen('mercadopago.log', 'a');  
        fwrite($f, "".chr(13)."".chr(10)."");  
        fwrite($f, var_export($payment, true)); 
        fwrite($f, "".chr(13)."".chr(10)."".chr(13)."".chr(10)."");  
        fclose($f);
    }

    session_regenerate_id();
    echo "".$payment->status.";".$payment->status_detail.";".$payment->id."";

} else {
    echo "0;tokenCartao";
}