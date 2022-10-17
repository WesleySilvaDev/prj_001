$(document).ready(function(){

     var container = $('.flex-shrink-0');
     var form_fechar_pedido = container.find('#form_fechar_pedido');
     var btn_fechar_pedido = form_fechar_pedido.find('#btn-fechar-pedido');
     var statusFechamentoPedido = container.find('#status-fechar-pedido');

     var sexo_sender = form_fechar_pedido.find('#sexo').val();

     btn_fechar_pedido.on('click', function(event){
    
         
                    
        fbq('track', 'AddPaymentInfo');

        $('#btn-fechar-pedido').attr("disabled", true);
        $('#processando').css('display', 'block');

        event.preventDefault();

        var valorTotal   = form_fechar_pedido.find('#input-total').val();

        var nome_sender  = form_fechar_pedido.find('#nome_sender').val();
        var email_sender = form_fechar_pedido.find('#email_sender').val();
        var nasc_sender  = form_fechar_pedido.find('#nasc_sender').val();
        var cpf_sender   = form_fechar_pedido.find('#cpf_sender').val();
        var cel_sender   = form_fechar_pedido.find('#cel_sender').val();
        var cep          = form_fechar_pedido.find('#cep').val();
        var end          = form_fechar_pedido.find('#end').val();
        var nro          = form_fechar_pedido.find('#nro').val();
        var complemento  = form_fechar_pedido.find('#complemento').val();
        var bairro       = form_fechar_pedido.find('#bairro').val();
        var uf           = form_fechar_pedido.find('#uf').val();
        var cidade       = form_fechar_pedido.find('#cidade').val();
        var numero        = form_fechar_pedido.find('#numero').val();
 
        var bandeira = $('#bandeira').val();

        numeroParcelas = $('#parcelas').val().split("-"); // separa a parcela do valor total
        numeroParcelas = numeroParcelas[0]; // seleciona o numero da parcela

        if (nome_sender == '' || nome_sender.length < 3) {
            statusFechamentoPedido.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o seu Nome corretamente</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            $('#processando').attr("style", "display: none !important");
            return;
        }
        else if (email_sender == '' || !validateEmail(email_sender)) {
            statusFechamentoPedido.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo E-mail corretamente</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            $('#processando').attr("style", "display: none !important");
            return;
        }
        else if (cpf_sender == '') {
            statusFechamentoPedido.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo CPF do comprador corretamente</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            $('#processando').attr("style", "display: none !important");
            return;
        }
        else if (nasc_sender == '' || nasc_sender.length < 10) {
            statusFechamentoPedido.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo Nascimento do Comprador</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            $('#processando').attr("style", "display: none !important");
            return;
        }
        else if (cel_sender == '') {
            statusFechamentoPedido.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo Celular do comprador corretamente</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            $('#processando').attr("style", "display: none !important");
            return;
        }
        else if (numeroParcelas == '' || numeroParcelas == 0) {
            statusFechamentoPedido.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                                        'Selecione a parcela do cart&atilde;o</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            $('#processando').attr("style", "display: none !important");
            return;
        }
        else if (cep == '' || cep.length < 9) {
            statusFechamentoPedido.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo de CEP</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            $('#processando').attr("style", "display: none !important");
            return;
        }
        else if (end == '' || end.length < 3) {
            statusFechamentoPedido.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo de Endere&ccedil;o</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            $('#processando').attr("style", "display: none !important");
            return;
        }
        else if (nro == '') {
            statusFechamentoPedido.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo de N&uacute;mero (Endere&ccedil;o)</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            $('#processando').attr("style", "display: none !important");
            return;
        }
        else if (bairro == '' || bairro.length < 2) {
            statusFechamentoPedido.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo de Bairro</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            $('#processando').attr("style", "display: none !important");
            return;
        }
        else if (cidade == '' || cidade.length < 2) {
            statusFechamentoPedido.html('<div style="margin-top:10px;height:auto;" class="ui red message">' +
                'Preencha o campo de Cidade</div>');
            $('#btn-fechar-pedido').attr("disabled", false);
            $('#processando').attr("style", "display: none !important");
            return;
        }
        else {

            pegarToken();

            // pegar token
            function pegarToken(){
                  var form = document.querySelector('#form_fechar_pedido');
                  Mercadopago.createToken(form, tokenHandler);
            }
    
            function tokenHandler(status, response) {
                if (status != 200 && status != 201) {
                    var errosCartao = mostrarErros(response.cause[0].code);
                    statusFechamentoPedido.html(errosCartao);
                    $('#btn-fechar-pedido').attr("disabled", false);
                    $('#processando').attr("style", "display: none !important");
                } else {
                    //console.log("tokenHandler");
                    var form = document.querySelector('#form_fechar_pedido');
                    //Cria um input
                    var card = document.createElement('input');
                    card.setAttribute('name', "token");
                    card.setAttribute('type', "hidden");
                    card.setAttribute('value', response.id);
                    form.appendChild(card);
    
                    fecharPedido(valorTotal,numeroParcelas,bandeira,response.id);
                }
            };
     
            // fechar o pedido
            function fecharPedido(totalPagamento,parcelas,bandeira,token){
    
                $('#processando').html('<p class="text-center">'
                +'<i class="fa fa-spinner fa-spin" style="width:32px;float:left;margin-right:10px;" ></i>'
                +' Aguarde enquanto verificamos os dados fornecidos' 
                +' do seu cart&atilde;o.</p>');

                var d = nasc_sender.split("/");
                var birthday = d[2]+'-'+d[1]+'-'+d[0];
                
                // fechamento mercadopago 
                
             
                $.ajax({
                    url: 'pagamento/fechar_pedido.php',
                    type: 'POST',
                    data: 'tokenCartao='+token+'&cartao='+bandeira+'&parcelas='+parcelas+'&valorTotal='+totalPagamento+'&email='+email_sender,
                    
                    // Os demais campos não são necessários enviar para o fechamento do pedido
                    // pode adicionar um ajax antes desde para fazer o cadastro do usuário
                    // utilizando os dados que vieram do formulário.

                    beforeSend: function(){
                        $('#processando').html('<div style="margin-top:10px;" class="ui success message">'
                        +'<i class="fa fa-spinner fa-spin" style="width:32px;float:left;margin-right:10px;" ></i>'
                        +' Aguarde enquanto verificamos os dados fornecidos do seu'
                        +' cart&atilde;o.</div>');
                    },
                    success: function(data){
    
                        var result = data;
                        var rs = result.split(';');
                        var status = rs[0];
                        var detalhe = rs[1];
                        var transacao = rs[2];
    
                        if(status == 'in_process'){
                            fbq('track', 'Purchase', {value:totalPagamento,currency:'BRL'});
    
                            $('#processando').html('<p class="text-center alert alert-info">'
                                                +'<b>Seu pedido foi processado.</b><br />'
                                                +' Seu pagamento est&aacute; em '
                                                +'<b>an&aacute;lise</b>. Quando o banco'
                                                +' liberar o pagamento voc&ecirc;'
                                                +' ser&aacute; notificado e seu(s)'
                                                +' produto(s) liberado(s). Obrigado!</p>');
    
                        } else if(status == 'approved'){
                             
                  
                            fbq('track', 'Purchase', {value:totalPagamento,currency:'BRL'});
                                
                                

                                window.location.replace("index.php?approved="+transacao);
                           
    
                        
                            
                        } else if(status == 'rejected'){
                            fbq('track', 'PurchaseCanceled', {value:totalPagamento,currency:'BRL'});
                            var erroCartao = printaErro(detalhe);
                            var erro = mostrarErros(detalhe);
                            statusFechamentoPedido.html(erro);
    
                            $('#processando').html('<p class="text-center alert alert-danger">'
                                                +'<b>Seu pedido n&atilde;o foi aprovado.</b>'
                                                +'<br /> Verifique poss&iacute;veis dados'
                                                +' divergentes ou consulte a administradora'
                                                +' do seu cart&atilde;o. <br />'
                                                +' ('+erroCartao+')</p>');
    
                            setTimeout(function(){
                                window.location.replace("/index.php");
                            }, 10000);
    
                        } else { //aqui exibe o erro
                            
                            var erroCartao = mostrarErros(detalhe);
                            statusFechamentoPedido.html(erroCartao);
                            $('#processando').html(erroCartao);
    
                            setTimeout(function(){
                                window.location.replace("/index.php");
                            }, 10000);
                        }
                    }
                });
                
                
                
            }
        }
     });
});