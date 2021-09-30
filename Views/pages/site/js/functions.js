$(function(){

	//Menu Responsivo
	var menuOpen = false;
	$('.icon-menu i').click(function(){

		if (menuOpen){
			$('nav.mobile').hide();
			$('i.fa-times').hide();
			menuOpen = false;
		}else{
			$('nav.mobile').show();
			$('i.fa-times').show();
			menuOpen = true;
		}
	})

	//Animação Formuçarios
	$('input,textarea').click(function(){
		$(this).parent().find('label').css('top','-25px');
		$(this).parent().find('label').css('left','0');
		$(this).parent().find('label').css('color','#fff');
	})

	$('input,textarea').keyup(function(){
		$(this).parent().find('label').css('top','-25px');
		$(this).parent().find('label').css('left','0');
		$(this).parent().find('label').css('color','#fff');
	})

	$('input,textarea').focusout(function(){
		if($(this).val() == ''){
			$(this).parent().find('label').css('top','12px');
			$(this).parent().find('label').css('left','12px');
			$(this).parent().find('label').css('color','#333');
		}
	})

	//Scroll Top
	$('nav a,.banner a').click(function(){
		let href = $(this).attr('href');
		if($('.'+href).length == 1){
			let top = $('.'+href).offset().top

			$('.mobile').fadeOut();
			$('i.fa-times').hide();
			$('html,body').animate({'scrollTop':top},800)

			menuOpen = false;
			return false;
		}
	})

	//Ajax
	$('.ajax').ajaxForm({
		dataType: 'json',
		beforeSend: function(){
			// Animação Form
			$('.ajax').animate({'opacity':'0.4'});
			$('.ajax').find('input,textarea').attr('disabled','true');

			//Show Callback Load
			$('.overlay-callback').show();
			$('.callback').show();
		},
		success: function(data){
			// Animação Form
			$('.ajax').animate({'opacity':'1'});
			$('.ajax').find('input,textarea').removeAttr('disabled');

			//Show Callback
			$('.callback img').fadeOut();
			if(data['resultado'] == true){
				// Icone
				$('.icon .fa-check').show();

				// Mensagem
				$('.mensagem').html(data['mensagem']);

				//FadeIn
				$('.icon').fadeIn(600);
				$('.mensagem').fadeIn(600);
				$('.callback a').fadeIn(600);	
				$('.ajax')[0].reset();
			}else{
				// Icone
				$('.icon .fa-times').show();

				// Mensagem
				$('.mensagem').html(data['mensagem']);

				// FadeIn
				$('.icon').fadeIn(600);
				$('.mensagem').fadeIn(600);
				$('.callback a').fadeIn(600);				
			}
		}
	})

	$('.callback a').click(function(){
		$('.icon').hide();
		$('.mensagem').hide();
		$('.overlay-callback').hide();
		$('.callback a').hide();	
		$('.callback').hide();
	})

	//Mask Form
	$('input[name=telefone]').mask('(00) 00000-0000');
})