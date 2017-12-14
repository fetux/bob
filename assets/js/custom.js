

$(document).ready(function(){
	
	
	
	$( document ).ajaxStart(function() {
		$("#loading").show();
	});
	
	$( document ).ajaxStop(function() {
		$("#loading").hide();
	});
				
	$('.carousel').carousel();
	
	var pathArray = window.location.pathname.split( '/' );
	console.log(pathArray);
	console.log(pathArray[pathArray.length - 1]);
	switch (pathArray[pathArray.length - 1])
	{
		case 'index.php':
			$('.hola').addClass('active');
			break;
		case 'salon.php':
			$('.salon').addClass('active');
			break;
		case 'pedido.php':
			$('.pedido').addClass('active');
			break;
		case 'promociones.php':
			$('.promociones').addClass('active');
			break;
		case 'galeria.php':
			$('.galeria').addClass('active');
			break;
		case 'contacto.php':
			$('.contacto').addClass('active');
			break;
		default:
			$('.hola').addClass('active');
			
	}
	
	
	
	$('#logo-site').mouseover(function(){
		$('#menu-btn').animate({top:'140px'},1000);
	});
	
	$('#logo-site').mouseout(function(){
		setTimeout(function(){
			$('#menu-btn').animate({top:'60px'},1000);
		},2000);
		
	});
	
	$('#menu-btn').click(function(){
		$.colorbox({
			href:"carta.php",
			scrolling:false,
			onClosed: function(){
				window.location = 'salon.php';
			},
			opacity: 0.6,
			scalePhotos: true,
			maxWidth: '100%'
			});
	});
	
});