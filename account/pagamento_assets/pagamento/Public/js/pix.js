$(document).ready(function(){

    var container          = $('.flex-shrink-0');
    var form_fechar_pedido = container.find('#form_fechar_pedido');
    var btn_pagar_pix      = form_fechar_pedido.find('#btn-pagar-pix');

    btn_pagar_pix.on('click', function(event){
        event.preventDefault();

        btn_pagar_pix.attr("disabled", true);

        var valorTotal       = form_fechar_pedido.find('#input-total').val();
        var mensagem_pix     = form_fechar_pedido.find('#mensagem-pix');
        var nome_sender_p    = form_fechar_pedido.find('#p_nome_sender').val();
        var email_sender_p   = form_fechar_pedido.find('#p_email_sender').val();
        var nasc_sender_p    = form_fechar_pedido.find('#p_nasc_sender').val();
        var cpf_sender_p     = form_fechar_pedido.find('#p_cpf_sender').val();
        var cel_sender_p     = form_fechar_pedido.find('#p_cel_sender').val();
        var cep_p            = form_fechar_pedido.find('#p_cep').val();
        var end_p            = form_fechar_pedido.find('#p_end').val();
        var nro_p            = form_fechar_pedido.find('#p_nro').val();
        var complemento_p    = form_fechar_pedido.find('#p_complemento').val();
        var bairro_p         = form_fechar_pedido.find('#p_bairro').val();
        var uf_p             = form_fechar_pedido.find('#p_uf').val();
        var cidade_p         = form_fechar_pedido.find('#p_cidade').val();
        var sexo_sender_p    = form_fechar_pedido.find('#p_sexo').val();

        if (nome_sender_p == '' || nome_sender_p.length <= 3) {
            mensagem_pix.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o seu Nome corretamente</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            return;
        }
        else if (email_sender_p == '' || !validateEmail(email_sender_p)) {
            mensagem_pix.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo E-mail corretamente</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            return;
        }
        else if (cpf_sender_p == '') {
            mensagem_pix.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo CPF do comprador corretamente</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            return;
        }
        else if (nasc_sender_p == '' || nasc_sender_p.length < 10) {
            mensagem_pix.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo Nascimento do Comprador</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            return;
        }
        else if (cel_sender_p == '') {
            mensagem_pix.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo Celular do comprador corretamente</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            return;
        }
        else if (cep_p == '' || cep_p.length < 9) {
            mensagem_pix.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo de CEP</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            return;
        }
        else if (end_p == '' || end_p.length < 3) {
            mensagem_pix.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo de Endere&ccedil;o</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            return;
        }
        else if (nro_p == '') {
            mensagem_pix.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo de N&uacute;mero (Endere&ccedil;o)</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            return;
        }
        else if (bairro_p == '' || bairro_p.length < 2) {
            mensagem_pix.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo de Bairro</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            return;
        }
        else if (cidade_p == '' || cidade_p.length < 2) {
            mensagem_pix.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo de Cidade</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            return;
        }
        else {

            $('#processando').css('display', 'block');
            fbq('track', 'AddPaymentInfo');
            
            var d = nasc_sender_p.split("/");
            var birthday = d[2]+'-'+d[1]+'-'+d[0];
    
            $.ajax({
                url: 'pagamento/pix.php',
                type: 'POST',
                data: 'valorTotal='+valorTotal+'&name='+nome_sender_p+'&email='+email_sender_p
                        +'&cpf='+cpf_sender_p+'&gender='+sexo_sender_p+'&birthday='+birthday
                        +'&phone='+cel_sender_p+'&cep='+cep_p+'&address='+end_p+'&number='+nro_p
                        +'&complement='+complemento_p+'&neighborhood='+bairro_p
                        +'&city='+cidade_p+'&uf='+uf_p,
                beforeSend: function(){
                    $('#processando').html('<div class="card card-processando">'
                                        + '<div class="card-body">'
                                        + '<i class="fa fa-spinner fa-w-16 fa-spin fa-lg"></i>'
                                        + '&nbsp; Aguarde enquanto estamos gerando o pix.'
                                        + '</div></div>');
                },
                success: function(data){
                    //fbq('track', 'Purchase', {value:valorTotal,currency:'BRL'});

                    var result = data;
                    var rs = result.split(';');
                    //var status = rs[0];
                    //var status_detail = rs[1];
                    //var idTransacao = rs[2];
                    //var valorTotal = rs[3];
                    var qr_base64 = rs[4];
                    var qr_code = rs[5];

                    if(rs[0] != "0"){
                        $('#processando').html('<b>Abra o app do seu banco ou institui&ccedil;&atilde;o'
                                                +' financeira e entre no ambiente Pix</b><br /><br />'
                                                +' <ul><li>Escolha a op&ccedil;&atilde;o pagar com QR-Code e escaneie o c&oacute;digo abaixo ou copie o c&oacute;digo em texto e cole em seu app.</li>'
                                                +' <li>Confirme as informa&ccedil;&otilde;es e finalize a compra.</li>'
                                                +' <li>Voc&ecirc; receber&aacute; uma notifica&ccedil;&atilde;o com a confirma&ccedil;&atilde;o do pagamento e dos titulos adquiridos.</li>'
                                                +' <li>Este QR-Code tem validade de 20 minutos, efetue o pagamento da reserva antes que expire.</li></ul>'
                                                +' <img src="data:image/png;base64,'+qr_base64+'" style="width: 80%;max-width: 250px;"><br /><br />'
                                                +' <b>Ou copie o c&oacute;digo PIX e cole em seu app na op&ccedil;&atilde;o "Pix copia e cola":</b>'
                                                +' <div class="row">'
                                                +' <div class="col-sm-9">'
                                                +' <div class="input-group mb-3">'
                                                +' <label for="pi9" class="input-group-prepend">'
                                                +' <span class="badge">'
                                                +' <i class="far fa-copy"></i>'
                                                +' </span>'
                                                +' </label>'
                                                +' <input readonly="readonly" type="text" onclick="copyPix(this)" value="'+qr_code+'" id="pi9" class="form-control">'
                                                +' </div>'
                                                +' </div>'
                                                +' </div>');
                    } else { //aqui exibe o erro
    
                        var erroCartao = mostrarErros(rs[1]);
                        mensagem_pix.html(erroCartao);
                        $('#processando').html(erroCartao);

                        setTimeout(function(){
                            window.location.replace("/index.php");
                        }, 10000);
                    }
                }
            });
        }
    });
});