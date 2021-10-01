$(function(){

	//Menu
	//Abrir e Fechar
	windowSize = $(window)[0].innerWidth;

	if(windowSize <= 768)
		var openMenu = false;
	else
		var openMenu = true;

	$('.btn-menu').click(function(){
		if(openMenu){
			//Fechar
			$('.menu').css('left','-300px');
			$('header').css('width','100%');
			$('.content').css('width','100%');

			openMenu = false;
		}else{
			//Abrir
			$('.menu').css('left','0');
			$('header').css('width','calc(100% - 300px)');
			$('.content').css('width','calc(100% - 300px)');

			openMenu = true;
		}
	})

	//Listas Menu
	$('.menu h3').click(function(){
		let open = $(this).attr('aberto');
		let ref = $(this).attr('ref');

		if(open == 'true'){
			//Fechar
			$('div[ref='+ref+']').removeClass('open');
			$(this).removeClass('select');

			$(this).attr('aberto','false');
		}else{
			//Abrir
			$('div[ref='+ref+']').addClass('open');
			$(this).addClass('select');

			$(this).attr('aberto','true');
		}
	})

	//Lista menu Atual
	var titulo = $('li.select').attr('titulo');

	$('h3[ref='+titulo+']').addClass('atual');
	$('h3[ref='+titulo+']').addClass('select');

	$('h3[ref='+titulo+']').attr('aberto','true');
	
	$('div[ref='+titulo+']').addClass('open');

	function addAlert(tipo,mensagem){
		$('.wraper-alert').html('');
		$('.wraper-alert]').prepend('<div class="alert '+data['tipo']+'">'+data['mensagem']+'</div><!--alert-->');
		setTimeout(function(){
			$('.wraper-alert] .alert').animate({'opacity':'0'});
		},3000)
	}

	var form;
	$('.ajax').click(function(){
		form = $(this).parent().parent().parent().find('.wraper-alert');
	})

	function boxAlert(tipo,mensagem){
		form.html('<div class="alert '+tipo+'">'+mensagem+'</div><!--alert-->');
		setTimeout(function(){
			form.find('.alert').animate({'opacity':'0'});
		},3000)
	}

	$('.ajax').ajaxForm({
		dataType: 'json',
		success: function(data){
			boxAlert(data['tipo'],data['mensagem']);
		}
	})

})