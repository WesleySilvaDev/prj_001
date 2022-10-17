$(document).ready(function(){
    
    var container        = $('.flex-shrink-0');
    var form_fechar_pedido = container.find('#form_fechar_pedido');
    var btn_pagar_boleto = form_fechar_pedido.find('#btn-pagar-boleto');

    btn_pagar_boleto.on('click', function(event){
        event.preventDefault();

        btn_pagar_boleto.attr("disabled", true);

        var mensagem_boleto  = form_fechar_pedido.find('#mensagem-boleto');
        var nome_sender_b    = form_fechar_pedido.find('#b_nome_sender').val();
        var email_sender_b   = form_fechar_pedido.find('#b_email_sender').val();
        var nasc_sender_b    = form_fechar_pedido.find('#b_nasc_sender').val();
        var cpf_sender_b     = form_fechar_pedido.find('#b_cpf_sender').val();
        var cel_sender_b     = form_fechar_pedido.find('#b_cel_sender').val();
        var cep_b            = form_fechar_pedido.find('#b_cep').val();
        var end_b            = form_fechar_pedido.find('#b_end').val();
        var nro_b            = form_fechar_pedido.find('#b_nro').val();
        var complemento_b    = form_fechar_pedido.find('#b_complemento').val();
        var bairro_b         = form_fechar_pedido.find('#b_bairro').val();
        var uf_b             = form_fechar_pedido.find('#b_uf').val();
        var cidade_b         = form_fechar_pedido.find('#b_cidade').val();
        var valorTotal       = form_fechar_pedido.find('#input-total').val();
        var sexo_sender_b    = form_fechar_pedido.find('#b_sexo').val();

        if (nome_sender_b == '' || nome_sender_b.length < 3) {
            mensagem_boleto.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o seu Nome corretamente</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            return;
        }
        else if (email_sender_b == '' || !validateEmail(email_sender_b)) {
            mensagem_boleto.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo E-mail corretamente</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            return;
        }
        else if (cpf_sender_b == '') {
            mensagem_boleto.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo CPF do comprador corretamente</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            return;
        }
        else if (nasc_sender_b == '' || nasc_sender_b.length < 10) {
            mensagem_boleto.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo Nascimento do Comprador</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            return;
        }
        else if (cel_sender_b == '') {
            mensagem_boleto.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo Celular do comprador corretamente</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            return;
        }
        else if (cep_b == '' || cep_b.length < 9) {
            mensagem_boleto.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo de CEP</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            return;
        }
        else if (end_b == '' || end_b.length < 3) {
            mensagem_boleto.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo de Endere&ccedil;o</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            return;
        }
        else if (nro_b == '') {
            mensagem_boleto.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo de N&uacute;mero (Endere&ccedil;o)</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            return;
        }
        else if (bairro_b == '' || bairro_b.length < 2) {
            mensagem_boleto.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo de Bairro</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            return;
        }
        else if (cidade_b == '' || cidade_b.length < 2) {
            mensagem_boleto.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo de Cidade</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            return;
        }
        else {

            $('#processando').css('display', 'block');

            var d = nasc_sender_b.split("/");

            $.ajax({
                url: 'pagamento/boleto.php',
                type: 'POST',
                data: 'valorTotal='+valorTotal+'&nome='+nome_sender_b
                      +'&cpf='+cpf_sender_b+'&email='+email_sender_b,
                beforeSend: function(){
                    $('#processando').html('<div class="card card-processando">'
                                        + '<div class="card-body">'
                                        + '<i class="fa fa-spinner fa-w-16 fa-spin fa-lg"></i>'
                                        + '&nbsp; Aguarde enquanto estamos gerando o boleto.'
                                        + '</div></div>');
                },
                success: function(data){
                    if(data != "erro") {
                        //fbq('track', 'Purchase', {value:valorTotal,currency:'BRL'});

                        var result = data;
                        var rs = result.split(';');
                        var link = rs[0];
                        var transacao = rs[1];

                        $('#processando').html('<div class="card card-processando">'
                                              +'<p class="text-center alert alert-success">'
                                              +'<span style="font-size:1.2rem;">'
                                              +'<i class="fas fa-check-circle"></i> '
                                              +'<b>Boleto Pronto</b></span><br />'
                                              +' ID da transa&ccedil;&atilde;o<br />#'+transacao+'<br /><br />'
                                              +' Ap&oacute;os a confirma&ccedil;&atilde;o do pagamento,'
                                              +' voc&ecirc; receber&aacute; um email'
                                              +' de efetiva&ccedil;&atilde;o da sua compra e seus'
                                              +' produto entregues. Obrigado!</p>'
                                              +'<div class="card-body text-center" style="margin-top:10px;">'
                                              +'<i class="fa fa-print"></i> '
                                              +'&nbsp; <b><a id="btnBoleto" target="_blank" href='+link+'>'
                                              +'Ver e Imprimir Boleto</a></b>'
                                              +'</div></div>');
                    } else {

                        $('#processando').html('<div class="card card-processando">'
                                                +'<div class="card-body">'
                                                +'<i class="fa fa-warning"></i>'
                                                +'<b>Pagamento indispon&iacute;vel no momento,'
                                                +' tente novamente mais tarde.</b>'
                                                +'</div></div>');

                        setTimeout(function () {
                            window.location.replace("/index.php");
                        }, 5000);
                    }
                },
                error: function (response) {
                    var errosCartao = mostrarErros(response);
                    $('#processando').css('display', 'none');
                    mensagem_boleto.html(errosCartao);
                    btn_pagar_boleto.attr("disabled", false);
                }
            });
        }
    });
});