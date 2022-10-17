<?php ob_start() ?>
<?php

ini_set('display_errors', 0);
include_once "Config/config.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Cache-Control: no-cache, must-revalidate");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

$now = date('Y-m-d H:i:s');

$cep          = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);
$address      = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$number       = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);
$complement   = filter_input(INPUT_POST, 'complement', FILTER_SANITIZE_STRING);
$neighborhood = filter_input(INPUT_POST, 'neighborhood', FILTER_SANITIZE_STRING);
$city         = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$uf           = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);

$cpf = str_replace("-", "", $_POST['cpf']);
$cpf = filter_var($cpf, FILTER_SANITIZE_NUMBER_INT);

$partes = explode(' ', $_POST['name']);
$primeiroNome = array_shift($partes);
$ultimoNome = array_pop($partes);

$NumPedido = date("y").date("z").substr(crc32(time()), 5);

//aqui começa a parte do Mercado Pago
$payment = new MercadoPago\Payment();
$payment->transaction_amount = (float)$_POST['valorTotal'];
$payment->description = "SITE"; // descrição do pedido
$payment->payment_method_id = "pix";
$payment->external_reference = $NumPedido; // número do pedido
$payment->notification_url = "https://www.nossolove.com/account/mercadopago/retorno/retorno.php"; // retorno automático na pasta /retorno
$payment->date_of_expiration = date('Y-m-d\TH:i:s.000P', strtotime('+20 minutes', strtotime($now))); // tempo em que o QR-Code está válido para pagamento (neste caso está definido em 20 minutos)

$preference = new MercadoPago\Preference();

$items = array();

// Montagem de produtos dentro do pedido. Caso queira colocar mais de um produto, repita os parâmetros
// aumentando o índice do array. Ex: $items[1]['id'] ... $items[2]['id'] etc 
// a soma dos produtos, deve ser igual ao valor total ($_POST['valorTotal'])

$items[0]['id']           = 100;
$items[0]['title']        = "Nome do Produto";
$items[0]['unit_price']   = (float)$_POST['valorTotal'];
$items[0]['currency_id']  = "BRL";
$items[0]['quantity']     = 1;

$payer = new MercadoPago\Payer();
$payer->email = $_POST['email'];
$payer->first_name = $primeiroNome;
$payer->last_name = $ultimoNome;
$payer->identification = array( 
    "type" => 'CPF',
    "number" => $cpf
);
$payer->address = array( 
    "zip_code" => $cep,
    "street_name" => $address,
    "street_number" => $number,
    "neighborhood" => $neighborhood,
    "city" => $city,
    "federal_unit" => $uf
);

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

    echo "0;Pagamento indisponivel no momento, tente novamente mais tarde";
} else {
    session_regenerate_id();
    echo "".$payment->status.";".$payment->status_detail.";"
            .$payment->id.";".$payment->transaction_details->total_paid_amount.";"
            .$payment->_last->point_of_interaction->transaction_data->qr_code_base64.";"
            .$payment->_last->point_of_interaction->transaction_data->qr_code."";
}