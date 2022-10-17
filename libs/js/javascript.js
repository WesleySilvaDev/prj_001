$(function(){
	$("#pesquisa").keyup(function(){
		
		var pesquisa = $(this).val();
		
		if(pesquisa != ''){
			var dados = {
				palavra : pesquisa
			}		
			$.post('../../inc/busca.php', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos 
				$(".resultado").html(retorna);
			});
		}else{
			$(".resultado").html('');
		}		
	});
});