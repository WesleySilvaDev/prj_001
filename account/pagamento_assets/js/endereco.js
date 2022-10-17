function buscaCEP(cep, complemento) {
	if(cep == '' || cep == '_____-___') cep = '99999999';

	//Express&atilde;o regular para validar o CEP.
	var validacep = /^[0-9]{5}-[0-9]{3}$/;

	//Valida o formato do CEP.
	if(validacep.test(cep)) {
		$.ajax({
			url: '//viacep.com.br/ws/' + cep + '/json',
			data: {
				cep: cep
			},
			type: 'GET',
			dataType: 'json',
			success: function (response) {
				if (!response.cep) {
					resp = {};
					resp.success = false;
					resp.erro_descricao = 'CEP n\u00E3o Encontrado';
					resp.cep = resp.logradouro = resp.localidade = resp.bairro = resp.uf = '';

					document.getElementById('end' + complemento).readOnly = false;
					document.getElementById('uf' + complemento).readOnly = false;
					document.getElementById('uf' + complemento).disabled = false;
					
					document.getElementById('b_end' + complemento).readOnly = false;
					document.getElementById('b_uf' + complemento).readOnly = false;
                    document.getElementById('b_uf' + complemento).disabled = false;

					document.getElementById('p_end' + complemento).readOnly = false;
					document.getElementById('p_uf' + complemento).readOnly = false;
                    document.getElementById('p_uf' + complemento).disabled = false;
                    
					window.alert(resp.erro_descricao);
					
				} else if (response.logradouro == '') {
					document.getElementById('end' + complemento).readOnly = false;
					document.getElementById('uf' + complemento).readOnly = true;
					document.getElementById('uf' + complemento).disabled = true;

					document.getElementById('end' + complemento).value = '';
					document.getElementById('uf' + complemento).value = response.uf;

					document.getElementById('b_end' + complemento).readOnly = false;
					document.getElementById('b_uf' + complemento).readOnly = true;
					document.getElementById('b_uf' + complemento).disabled = true;

					document.getElementById('b_end' + complemento).value = '';
					document.getElementById('b_uf' + complemento).value = response.uf;

					document.getElementById('p_end' + complemento).readOnly = false;
					document.getElementById('p_uf' + complemento).readOnly = true;
					document.getElementById('p_uf' + complemento).disabled = true;

					document.getElementById('p_end' + complemento).value = '';
					document.getElementById('p_uf' + complemento).value = response.uf;

					if (document.getElementById('uf' + complemento) 
						|| document.getElementById('b_uf' + complemento)
						|| document.getElementById('p_uf' + complemento)) 
					{
						document.getElementById('uf' + complemento).value = response.uf;
						document.getElementById('b_uf' + complemento).value = response.uf;
						document.getElementById('p_uf' + complemento).value = response.uf;
					}

					document.getElementById('cidade' + complemento).value = response.localidade;
					document.getElementById('bairro' + complemento).value = response.bairro;

					document.getElementById('b_cidade' + complemento).value = response.localidade;
					document.getElementById('b_bairro' + complemento).value = response.bairro;

					document.getElementById('p_cidade' + complemento).value = response.localidade;
					document.getElementById('p_bairro' + complemento).value = response.bairro;

					if (document.getElementById('nro' + complemento) 
						|| document.getElementById('b_nro' + complemento)
						|| document.getElementById('p_nro' + complemento)) 
					{
						document.getElementById('nro' + complemento).value = '';
						document.getElementById('b_nro' + complemento).value = '';
						document.getElementById('p_nro' + complemento).value = '';
					}

					if (document.getElementById('complemento' + complemento) 
						|| document.getElementById('b_complemento' + complemento)
						|| document.getElementById('p_complemento' + complemento)) 
					{
						document.getElementById('complemento' + complemento).value = '';
						document.getElementById('b_complemento' + complemento).value = '';
						document.getElementById('p_complemento' + complemento).value = '';
					}
                    
				} else {

					document.getElementById('end' + complemento).readOnly = true;
					document.getElementById('uf' + complemento).readOnly = true;
					document.getElementById('uf' + complemento).disabled = true;

					document.getElementById('end' + complemento).value = response.logradouro;
					document.getElementById('uf' + complemento).value = response.uf;

					document.getElementById('b_end' + complemento).readOnly = true;
					document.getElementById('b_uf' + complemento).readOnly = true;
					document.getElementById('b_uf' + complemento).disabled = true;

					document.getElementById('b_end' + complemento).value = response.logradouro;
					document.getElementById('b_uf' + complemento).value = response.uf;

					document.getElementById('p_end' + complemento).readOnly = true;
					document.getElementById('p_uf' + complemento).readOnly = true;
					document.getElementById('p_uf' + complemento).disabled = true;

					document.getElementById('p_end' + complemento).value = response.logradouro;
					document.getElementById('p_uf' + complemento).value = response.uf;

					if (document.getElementById('uf' + complemento) 
						|| document.getElementById('b_uf' + complemento)
						|| document.getElementById('p_uf' + complemento)) 
					{
						document.getElementById('uf' + complemento).value = response.uf;
						document.getElementById('b_uf' + complemento).value = response.uf;
						document.getElementById('p_uf' + complemento).value = response.uf;
					}

					document.getElementById('cidade' + complemento).value = response.localidade;
					document.getElementById('bairro' + complemento).value = response.bairro;

					document.getElementById('b_cidade' + complemento).value = response.localidade;
					document.getElementById('b_bairro' + complemento).value = response.bairro;

					document.getElementById('p_cidade' + complemento).value = response.localidade;
					document.getElementById('p_bairro' + complemento).value = response.bairro;

					if (document.getElementById('nro' + complemento) 
						|| document.getElementById('b_nro' + complemento)
						|| document.getElementById('p_nro' + complemento)) 
					{
						document.getElementById('nro' + complemento).value = '';
						document.getElementById('b_nro' + complemento).value = '';
						document.getElementById('p_nro' + complemento).value = '';
					}

					if (document.getElementById('complemento' + complemento) 
						|| document.getElementById('b_complemento' + complemento)
						|| document.getElementById('p_complemento' + complemento)) 
					{
						document.getElementById('complemento' + complemento).value = '';
						document.getElementById('b_complemento' + complemento).value = '';
						document.getElementById('p_complemento' + complemento).value = '';
					}
				}

				if (!response.cep && resp.success == false) {
					var str = document.getElementById(cep).value;
					var n = str.replace(/\w/i, "");
					if (n != '') {
						document.getElementById('end' + complemento).readOnly = false;
						document.getElementById('uf' + complemento).readOnly = false;
						document.getElementById('uf' + complemento).disabled = false;

						document.getElementById('b_end' + complemento).readOnly = false;
						document.getElementById('b_uf' + complemento).readOnly = false;
						document.getElementById('b_uf' + complemento).disabled = false;

						document.getElementById('p_end' + complemento).readOnly = false;
						document.getElementById('p_uf' + complemento).readOnly = false;
						document.getElementById('p_uf' + complemento).disabled = false;
						resp.erro_descricao += '\n CEP n\u00E3o Encontrado';
					}
					window.alert(resp.erro_descricao);
				}
			},
			failure: function (response) {
				var str = document.getElementById(cep).value;
				var n = str.replace(/\w/i, "");
				if (n != '') {
					document.getElementById('end' + complemento).readOnly = false;
					document.getElementById('uf' + complemento).readOnly = false;
					document.getElementById('uf' + complemento).disabled = false;

					document.getElementById('b_end' + complemento).readOnly = false;
					document.getElementById('b_uf' + complemento).readOnly = false;
					document.getElementById('b_uf' + complemento).disabled = false;

					document.getElementById('p_end' + complemento).readOnly = false;
					document.getElementById('p_uf' + complemento).readOnly = false;
					document.getElementById('p_uf' + complemento).disabled = false;
					window.alert('Problemas com a conex\u00E3o.\nPor favor, digite o CEP corretamente.');
				}
			}
		});
	} else {
		window.alert('Por favor, digite o CEP corretamente.');
	}
}