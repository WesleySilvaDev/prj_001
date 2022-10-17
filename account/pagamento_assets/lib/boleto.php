<?php ob_start() ?>
<?php

ini_set('display_errors', 0);
include_once "Config/config.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Cache-Control: no-cache, must-revalidate");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

$now = date('Y-m-d H:i:s');

$cpf = str_replace("-", "", $_POST['cpf']);
$cpf = filter_var($cpf, FILTER_SANITIZE_NUMBER_INT);

$partes = explode(' ', $_POST['nome']);
$primeiroNome = array_shift($partes);
$ultimoNome = array_pop($partes);

//ARRAY PAGTO

    $NumPedido = date("y").date("z").substr(crc32(time()), 5);

    $payment = new MercadoPago\Payment();
    $payment->transaction_amount = (float)$_POST['valorTotal'];
    $payment->description = "SITE"; // descrição do pedido
    $payment->payment_method_id = "bolbradesco"; // não mudar (só existe esta opção para boleto)
    $payment->external_reference = $NumPedido;
    $payment->notification_url = "https://www.nossolove.com/account/mercadopago/retorno/retorno.php"; // retorno automático na pasta /retorno

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
        "type" => "CPF",
        "number" => $cpf
    );

    $preference->items = array($items);
    $preference->payer = $payer;
    $preference->save();

    $payment->payer = $payer;
    $payment->save();

    if($payment->error){
        $f = fopen('mercadopago.log', 'a'); # o "a" é para ele "appendar" o conteúdo, ou seja, colocar ao final
        fwrite($f, "".chr(13)."".chr(10).""); # escrevendo a mensagem, mais uma quebra de linha
        fwrite($f, var_export($payment, true)); # imprime os dados no arquivo de log
        fwrite($f, "".chr(13)."".chr(10)."".chr(13)."".chr(10).""); # um espaço para separar as ocorrencias
        fclose($f);

        echo "erro";
    } else {
        echo "".$payment->transaction_details->external_resource_url.";".$payment->id."";
    }