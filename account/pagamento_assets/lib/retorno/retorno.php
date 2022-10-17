
<?php

require '../pagamento/Config/config.php';
  
	$transaction = MercadoPago\Payment::find_by_id($_GET['id']);

	$NumPedido = $transaction->external_reference;
	$TransacaoID = $transaction->id;
	$Referencia = $transaction->description;
	$TipoFrete = "";
	$ValorFrete = $transaction->shipping_amount;
	$Extras = 0;
	$DataTransacao = $transaction->date_created;
	$TipoPagamento = $transaction->payment_type_id;
	$BancoBandeira = $transaction->payment_method_id;
	$StatusTransacao = $transaction->status; 
	$DataUltModificacao = $transaction->date_last_updated;
	$DetalheStatus = $transaction->status_detail;

	$ValorBruto = $transaction->transaction_amount;
	$ValorDesconto = $transaction->coupon_amount;  
	$ValorLiquido = $transaction->transaction_details->net_received_amount;
	$ValorTaxas = $transaction->fee_details[0]->amount;  
	$LinkPagamento = $transaction->transaction_details->external_resource_url;  

	$CliNome = $transaction->payer->first_name . " " . $transaction->payer->last_name;
	$CliEmail = filter_var($transaction->payer->email, FILTER_SANITIZE_EMAIL);
	$CliNumberCellPhone = "11999999999";  

	$Parcelas = $transaction->installments;
	$ncartao =  $transaction->token;

	$DataOrdem = "" . $DataHora[0] . " " . $Hora . "";

	$myfile = fopen("mercadopago.log", "a") or die("falha ao gerar arquivo!");
	fwrite($myfile, "transacaoid: " . $TransacaoID . "\n");
	fwrite($myfile, "numpedido: " . $NumPedido . "\n");
	fwrite($myfile, "referencia: " . $Referencia . "\n");
	fwrite($myfile, "valorfrete: " . $ValorFrete . "\n");
	fwrite($myfile, "datatransacao: " . $DataTransacao . "\n");
	fwrite($myfile, "tipopagamento: " . $TipoPagamento . "\n");
	fwrite($myfile, "bancobandeira: " . $BancoBandeira . "\n");
	fwrite($myfile, "status: " . $StatusTransacao . "\n");
	fwrite($myfile, "ultmodificacao: " . $DataUltModificacao . "\n");
	fwrite($myfile, "detalhestatus: " . $DetalheStatus . "\n");
	fwrite($myfile, "valorbruto: " . $ValorBruto . "\n");
	fwrite($myfile, "valordesconto: " . $ValorDesconto . "\n");
	fwrite($myfile, "valorliquido: " . $ValorLiquido . "\n");
	fwrite($myfile, "valortaxas: " . $ValorTaxas . "\n");
	fwrite($myfile, "link: " . $LinkPagamento . "\n");
	fwrite($myfile, "clinome: " . $CliNome . "\n");
	fwrite($myfile, "cliemail: " . $CliEmail . "\n");
	fwrite($myfile, "parcelas: " . $Parcelas . "\n\n"); 
	fwrite($myfile, "-------------------------------------------\n\n");
	fclose($myfile);
	
	
	




