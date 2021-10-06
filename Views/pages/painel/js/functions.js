$(function(){

	//Menu
	//Abrir e Fechar
	windowSize = $(window)[0].innerWidth;

	if(windowSize <= 1100)
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



	function boxAlert(form,tipo,mensagem){
		form.parent().find('.wraper-alert').html('<div class="alert '+tipo+'">'+mensagem+'</div><!--alert-->');
		setTimeout(function(){
			form.find('.alert').animate({'opacity':'0'});
		},3000)
	}

	$('form.ajax').on('submit',function(){
		var form = $(this);
		$.ajax({
			url:path+'Models/ajax/formAjax.php',
			method:'POST',
			dataType:'json',
			data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false 
		}).done(function(data){
			boxAlert(form,data['tipo'],data['mensagem']);
		});
		return false;
	})

})