var erros = new Array();
erros['token'] = 'Ooops! Houve uma falha. (token)';
erros['pending_contingency'] = 'Estamos processando o pagamento. Em at&eacute; 2 dias &uacute;teis informaremos por e-mail o resultado.';
erros['pending_review_manual'] = 'Estamos processando o pagamento. Em at&eacute; 2 dias &uacute;teis informaremos por e-mail se foi aprovado ou se precisamos de mais informa&ccedil;&otilde;es.';
erros['cc_rejected_bad_filled_card_number'] = 'Confira o n&uacute;mero do cart&atilde;o.';
erros['cc_rejected_bad_filled_date']='Confira a data de validade.';
erros['cc_rejected_bad_filled_other']='Confira os dados.';
erros['cc_rejected_bad_filled_security_code']='Confira o c&oacute;digo de seguran&ccedil;a.';
erros['cc_rejected_blacklist']='N&atilde;o conseguimos processar seu pagamento.';
erros['cc_rejected_call_for_authorize']='Voc&ecirc; deve autorizar sua bandeira ao pagamento do valor deste pedido.';
erros['cc_rejected_card_disabled']='Ligue para sua bandeira para ativar seu cart&atilde;o. O telefone est&aacute; no verso do seu cart&atilde;o.';
erros['cc_rejected_card_error']='N&atilde;o conseguimos processar seu pagamento.';
erros['cc_rejected_duplicated_payment']='Voc&ecirc; j&aacute; efetuou um pagamento com esse valor. Caso precise pagar novamente, utilize outro cart&atilde;o ou outra forma de pagamento.';
erros['cc_rejected_high_risk']='Seu pagamento foi recusado. Escolha outra forma de pagamento. Recomendamos meios de pagamento em dinheiro.';
erros['cc_rejected_insufficient_amount']='Limite insuficiente.';
erros['cc_rejected_invalid_installments']='Seu cart&atilde;o n&atilde;o processa pagamentos parcelados.';
erros['cc_rejected_max_attempts']='Voc&ecirc; atingiu o limite de tentativas permitido. Escolha outro cart&atilde;o ou outra forma de pagamento.';
erros['cc_rejected_other_reason']='Seu banco n&atilde;o processou seu pagamento.';
erros[205]='Digite o n&uacute;mero do seu cart&atilde;o.';
erros[208]='Escolha um m&ecirc;s.';
erros[209]='Escolha um ano.';
erros[212]='Informe seu documento.';
erros[213]='Informe seu documento.';
erros[214]='Informe seu documento.';
erros[220]='Informe seu banco emissor.';
erros[221]='Digite o nome e sobrenome.';
erros[224]='Digite o c&oacute;digo de seguran&ccedil;a.';
erros['E301']='H&aacute; algo de errado com esse n&uacute;mero. Digite novamente.';
erros['E302']='Confira o c&oacute;digo de seguran&ccedil;a.';
erros[316]='Por favor, digite um nome v&aacute;lido.';
erros[322]='Confira seu documento.';
erros[323]='Confira seu documento.';
erros[324]='Confira seu documento.';
erros[325]='Confira a data.';
erros[326]='Confira a data.';
erros[106]='N&atilde;o pode efetuar pagamentos a usu&aacute;rios de outros pa&iacute;ses.';
erros[109]='Seu cart&atilde;o n&atilde;o processa pagamentos parcelados.';
erros[126]='N&atilde;o conseguimos processar seu pagamento.';
erros[129]='Seu cart&atilde;o n&atilde;o processa pagamentos para o valor selecionado.';
erros[145]='N&atilde;o conseguimos processar seu pagamento.';
erros[150]='Voc&ecirc; n&atilde;o pode efetuar pagamentos.';
erros[151]='Voc&ecirc; n&atilde;o pode efetuar pagamentos.';
erros[160]='N&atilde;o conseguimos processar seu pagamento.';
erros[204]='Sua bandeira n&atilde;o est&aacute; dispon&iacute;vel neste momento. Escolha outro cart&atilde;o ou outra forma de pagamento.';
erros[801]='Voc&ecirc; efetuou um pagamento no mesmo valor alguns minutos atr&aacute;s. Tente novamente em alguns minutos.';

function mostrarErros(response){
    var errosCartao = '';
        errosCartao = erros[response];
        
    return errosCartao == undefined ? 
    '<div style="margin:10px 0;height:auto;" class="ui red message">'+response+'</div>' :
    '<div style="margin:10px 0;height:auto;" class="ui red message">'+errosCartao+'</div>';
}

function printaErro(response){
    var errosCartao = '';
    errosCartao = erros[response];
    return errosCartao;
}

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validateCPF(val){
    if (val.length == 14) {
        var cpf = val.trim;
     
        cpf = cpf.toString().replace(/\./g, "");
        cpf = cpf.toString().replace("-", "");
        cpf = cpf.split("");
        
        var v1 = 0;
        var v2 = 0;
        var aux = false;
        
        for (var i = 1; cpf.length > i; i++) {
            if (cpf[i - 1] != cpf[i]) {
                aux = true;   
            }
        } 
        
        if (aux == false) {
            return false; 
        } 
        
        for (var i = 0, p = 10; (cpf.length - 2) > i; i++, p--) {
            v1 += cpf[i] * p; 
        } 
        
        v1 = ((v1 * 10) % 11);
        
        if (v1 == 10) {
            v1 = 0; 
        }
        
        if (v1 != cpf[9]) {
            return false; 
        } 
        
        for (var i = 0, p = 11; (cpf.length - 1) > i; i++, p--) {
            v2 += cpf[i] * p; 
        } 
        
        v2 = ((v2 * 10) % 11);
        
        if (v2 == 10) {
            v2 = 0; 
        }
        
        if (v2 != cpf[10]) {
            return false; 
        } else {   
            return true; 
        }
    }
}