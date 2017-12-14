$(document).ready(function(){
	
	$("#login").submit(function(e){
		e.preventDefault();
		data = "user="+$('input[name="user"]').val()+"&passwd="+$('input[name="passwd"]').val();
		$.ajax({
			type: "POST",
			url: "login.php",
			data: data,
			success: function(response){
				switch (response){
					case 'logueado': 		window.location = "index.php";
											break;
									
					case 'error passwd': 	$('<div class="error alert alert-error"></div>').appendTo('#login');
											$('.error').html("USUARIO Y/O CONTRASEÑA INCORRECTOS");
											break;
											
					case 'error login': 	$('.error').html("USUARIO Y/O CONTRASEÑA INCORRECTOS");
											break;
				}
			}
		});
	});
	
});
