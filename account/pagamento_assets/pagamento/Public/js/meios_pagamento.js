$(document).ready(function(){
    
    var container = $('.flex-shrink-0');
    var form_fechar_pedido = container.find('#form_fechar_pedido');
 
    $('#numero').keyup(function (){
        var cartao = '';

        if($('#numero').val() != ''){
            if($('#numero').val().length >= 6){
                var nroCard = $('#numero').val();
                nroCard = nroCard.replace(" ", ""); // retira o primeiro espaço
                nroCard = nroCard.replace(" ", ""); // retira o segundo espaço
                nroCard = nroCard.replace(" ", ""); // retira o terceiro espaço
                $('#numberCard').val(nroCard);  
                
                var cpfDono = $('#cpf_dono').val();
                cpfDono = cpfDono.replace(".", ""); // retira o primeiro ponto
                cpfDono = cpfDono.replace(".", ""); // retira o segundo ponto
                cpfDono = cpfDono.replace("-", ""); // retira o hifen
                $('#numCPF').val(cpfDono);

                var bin = getBin();

                Mercadopago.getPaymentMethod({
                    "bin": bin
                }, setPaymentMethodInfo);
            }
        }

        function getBin() {
            var numero = $('#numero').val();
            numero = numero.replace(" ", "");
            numero = numero.replace("_", "");
            return numero.substring(0,6);
        }

        function setPaymentMethodInfo(status, response) {
            if (status == 200) {
                //EXECUTA ALGUMAS OPERAÇÕES ESSENCIAIS PARA O PAGAMENTO COMO DETERMINAR OS DETALHES DO MEIO DE PAGAMENTO SELECIONADO COMO POR EXEMPLO BANDEIRA DO CARTÃO DE CRÉDITO
                var form = document.querySelector('#form_fechar_pedido');
                var totalPagamento = $('#input-total').val();
                var methodId = response[0].id;

                if (document.querySelector("input[name=paymentMethodId]") == null) {
                    //cria um hidden
                    var paymentMethod = document.createElement('input');
                    paymentMethod.setAttribute('id', "paymentMethodId");
                    paymentMethod.setAttribute('name', "paymentMethodId");
                    paymentMethod.setAttribute('type', "hidden");
                    paymentMethod.setAttribute('value', methodId);
                    form.appendChild(paymentMethod);
                } else {
                    document.querySelector("input[name=paymentMethodId]").value = methodId;
                }
                
                
                cartao = methodId;
                $("#numero").css('background', "url("+response[0].secure_thumbnail+") 98% 50% no-repeat");
                $("#bandeira").val(cartao);

                Mercadopago.getInstallments({
                    "bin": getBin(),
                    "amount": totalPagamento
                }, setInstallmentInfo);
            }
        };

        function setInstallmentInfo(status, response) {

            var selectorInstallments = document.querySelector("#form_fechar_pedido #parcelas"),
                fragment = document.createDocumentFragment();
            selectorInstallments.options.length = 0;

            if (response.length > 0) {
                var option = new Option("Selecione a parcela", ''),
                    payerCosts = response[0].payer_costs;
                fragment.appendChild(option);

                for (var i = 0; i < payerCosts.length; i++) {
                    if(i==0 || payerCosts[i].total_amount >= 100){
                        option = new Option(payerCosts[i].recommended_message || payerCosts[i].installments, payerCosts[i].installments + '-' + payerCosts[i].total_amount);
                        fragment.appendChild(option);
                    }
                }

                selectorInstallments.appendChild(fragment);
                selectorInstallments.removeAttribute('disabled');
            }
        };
    });

    $('#form_fechar_pedido select[name=qtd_parc]').on('change', function () {
        var retorno = this.value.split("-");
        var v = retorno[1].toString();
        $('#input-total').val(v);
    });
        
 });
