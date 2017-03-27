

//função para mostrar botão 'ant' e 'prox'
$(function(){
    $("#show").click(function(){
        $("#ant,#prox").show();
    });
});

//funções para os botões de 'prev' e 'next' da questão
$(function(){

	var iterator = 0;
	$('body').on('click', '#next', function(e){
		e.preventDefault();
		iterator ++;
		var qQuestoes = ($('.questao').length-1);
		if(iterator == qQuestoes){
			$(this).attr('id','fim');
			$(this).addClass('fim');
			$(this).text('Fim');
		}
			$('.questao').hide();
			$('.questao:eq('+iterator+')').show();
		return false;
	});


	$('body').on('click', '#prev', function(e){
		e.preventDefault();
		var qQuestoes = ($('.questao').length-1);
		if(iterator == qQuestoes){
		$('#fim').removeClass('fim');
		$('#fim').text('Next');
		$('#fim').attr('id', 'next');
	}
	iterator--;
	if(iterator < 0){
		iterator = 0;
	}
		$('.questao').hide();
		$('.questao:eq('+iterator+')').show();
	return false;
	});
});

//funções para os botões de 'anterior' e 'próximo' da prova
$(function(){

	var iterator = 0;
	$('body').on('click', '#prox', function(e){
		e.preventDefault();
		iterator ++;
		var qProvas = ($('.prova').length-1);
		if(iterator == qProvas){
			$(this).attr('id','ultima');
			$(this).addClass('ultima');
			$(this).text('Última');
		}
			$('.prova').hide();
			$('.prova:eq('+iterator+')').show();
		return false;
	});


	$('body').on('click', '#ant', function(e){
		e.preventDefault();
		var qProvas = ($('.prova').length-1);
		if(iterator == qProvas){
		$('#ultima').removeClass('ultima');
		$('#ultima').text('Próxima');
		$('#ultima').attr('id', 'prox');
	}
	iterator--;
	if(iterator < 0){
		iterator = 0;
	}
		$('.prova').hide();
		$('.prova:eq('+iterator+')').show();
	return false;
	});
});




