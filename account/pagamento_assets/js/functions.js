$('[data-tools=tooltip]').tooltip();

$('[data-mascara="decimal"]').mask('AAA,AA', {
    reverse: true,
    'translation': {
        A: { pattern: /[0-9]/ },
    }
});

/* --------------------------------------------------------------------------------------- */
var maskBehaviorPhone = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00000';
},
    optionsPhone = {
        onKeyPress: function (val, e, field, optionsPhone) {
            field.mask(maskBehaviorPhone.apply({}, arguments), optionsPhone);
        }
    };

$('[data-mascara="telefone"]').mask(maskBehaviorPhone, optionsPhone);

/* --------------------------------------------------------------------------------------- */
var maskBehaviorCpfCnpj = function (val) {
    return val.replace(/\D/g, '').length <= 11 ? '000.000.000-00#' : '00.000.000/0000-00';
},
    optionsCpfCnpj = {
        onKeyPress: function (val, e, field, optionsCpfCnpj) {
            field.mask(maskBehaviorCpfCnpj.apply({}, arguments), optionsCpfCnpj);
        }
    };

$('[data-mascara="cpf_cnpj"]').mask(maskBehaviorCpfCnpj, optionsCpfCnpj);

$('[data-mascara="valor"]').mask('000000000000.00', { reverse: true });

$('[data-mascara="hora"]').mask('00:00');

$('[data-mascara="cep"]').mask('00.000-000');
$('[data-mascara="dv"]').mask('00');
$('[data-mascara="agencia"]').mask('000000');
$('[data-mascara="conta"]').mask('000000');
$('[data-mascara="cep2"]').mask('00000-000');
$('[data-mascara="numero"]').mask('0000000');
$('[data-mascara="cpf"]').mask('000.000.000-00');
$('[data-mascara="cartao"]').mask('0000 0000 0000 0000');

function pad(n, width, z) {
    z = z || '0';
    n = n + '';
    return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

function msg(msg, status) {

    var tipo = 'error';

    if (status >= 200 && status <= 201) {
        var tipo = 'success';
    } else if (status == 100) {
        var tipo = 'info';
    } else if (status == 422) {
        var tipo = 'warning';
    } else if (status == 500 || status == 502) {
        var tipo = 'error';
    }

    toastr.options = {
        "escapeHtml ": true,
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    return toastr[tipo](msg)
}