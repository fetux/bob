<?php
include '../init.php';
if ($_SESSION['logueado']!='ok') { header('Location: ../index.php'); die; }
include '../header.php';
include '../menu.html';

?>
<div class="row-fluid content">
	<div class="row-fluid">
		<div class="span4 offset4">
			<button id="iniciar" class="btn btn-block btn-primary" type="button">INICIAR ENCUESTA</button>
			<a id="descargar" class="btn btn-block btn-primary" href="planilla.php">DESCARGAR PLANILLA DE RESULTADOS</a>
		</div>
	</div>
	
	<div class="row-fluid">
		<div class="span8 offset2">
			
			<ul class="nav nav-tabs" id="encuesta">
				<li class="active"><a href="#temperatura">Temperatura</a></li>
				<li><a href="#calidad">Calidad</a></li>	
				<li><a href="#tiempoespera">Tiempo de espera</a></li>
				<li><a href="#precios">Precios</a></li>
				<li><a href="#diasdemilanesas">Dias de milanesas</a></li>
				<li><a href="#enviarcupon">Enviar cupon</a></li>
			</ul>
			
		 	<form class="form-horizontal" method="post">
		 		    <div class="row-fluid form-inline" style="margin-bottom:40px;">
		 		    	<input name="nombre-cliente" type="text" class="span4" placeholder="Nombre y Apellido">
					    <input name="cliente" type="text" class="span4" placeholder="N° de cliente">
					    <input name="direccion" type="text" class="span5" placeholder="Dirección">
					    <input name="pedidos" type="text" class="span3" placeholder="Pedidos">
				    </div>
		 		
				<div class="text-center tab-content">
					<div class="tab-pane active" id="temperatura">
						<p class="text-center"><strong>1. Temperatura del producto</strong></p>
						<div class="text-center control-group">
							<label class="text-center radio">
								<input class="text-center" type="radio" name="temp" value="1">
								Caliente
							</label>
						</div>
						<div class="text-center control-group">
							<label class="radio">
								<input class="text-center" type="radio" name="temp" value="2">
								Frio
							</label>
						</div>
						<div class="text-center control-group">
							<label class="radio">
								<input class="text-center" type="radio" name="temp" value="3">
								A veces frio o caliente
							</label>
						</div>
						<a href="#calidad" class="btn btn-primary pull-right text-center" type="button">Siguiente</a>
					</div>
					<div class="tab-pane" id="calidad">
						<p class="text-center"><strong>2. Calidad del producto</strong></p>
						<div class="text-center control-group">
							<label class="radio">
								<input class="text-center" type="radio" name="calidad" value="1">
								Muy bueno
							</label>
						</div>
						<div class="text-center control-group">
							<label class="radio">
								<input class="text-center" type="radio" name="calidad" value="2">
								Aceptable
							</label>
						</div>
						<div class="text-center control-group">
							<label class="radio">
								<input class="text-center" type="radio" name="calidad" value="3">
								Malo
							</label>
						</div>
						
						<a id="inicio" href="#temperatura" class="btn btn-primary pull-left text-center" type="button">Anterior</a>
						<a href="#tiempoespera" class="btn btn-primary pull-right text-center" type="button">Siguiente</a>
						
					</div>
					<div class="tab-pane" id="tiempoespera">
						<p class="text-center"><strong>3. Tiempo de espera del pedido</strong></p>
						<div class="text-center control-group">
							<label class="radio">
								<input class="text-center" type="radio" name="tiempoespera" value="1">
								A tiempo
							</label>
						</div>
						<div class="text-center control-group">
							<label class="radio">
								<input class="text-center" type="radio" name="tiempoespera" value="2">
								Fuera de tiempo
							</label>
						</div>				
						<a href="#calidad" class="btn btn-primary pull-left text-center" type="button">Anterior</a>
						<a href="#precios" class="btn btn-primary pull-right text-center" type="button">Siguiente</a>
					</div>
					
					<div class="tab-pane" id="precios">
					<p class="text-center"><strong>4. Precio del producto</strong></p>
						<div class="text-center control-group">
							<label class="radio">
								<input class="text-center" type="radio" name="precio" value="1">
								Barato
							</label>
						</div>
						<div class="text-center control-group">
							<label class="radio">
								<input class="text-center" type="radio" name="precio" value="2">
								En precio
							</label>
						</div>
						<div class="text-center control-group">
							<label class="radio">
								<input class="text-center" type="radio" name="precio" value="3">
								Caro
							</label>
						</div>
						
						<a href="#tiempoespera" class="btn btn-primary pull-left text-center" type="button">Anterior</a>
						<a href="#diasdemilanesas" class="btn btn-primary pull-right text-center" type="button">Siguiente</a>
					</div>
					<div class="tab-pane" id="diasdemilanesas">
						<p class="text-center"><strong>5. Dias de milanesas por semana</strong></p>
						<div class="text-center control-group">
							<label class="radio">
								<input class="text-center" type="radio" name="diasdemilanesas" value="1">
								Menos de una vez
							</label>
						</div>
						<div class="text-center control-group">
							<label class="radio">
								<input class="text-center" type="radio" name="diasdemilanesas" value="2">
								Una vez
							</label>
						</div>
						<div class="text-center control-group">
							<label class="radio">
								<input class="text-center" type="radio" name="diasdemilanesas" value="3">
								Mas de dos veces
							</label>
						</div>
						<div class="text-center control-group">
							<label class="radio">
								<input class="text-center" type="radio" name="diasdemilanesas" value="4">
								No sabe
							</label>
						</div>
						<a href="#precios" class="btn btn-primary pull-left text-center" type="button">Anterior</a>
						<a href="#enviarcupon" class="btn btn-primary pull-right text-center" type="button">Siguiente</a>
					</div>
					<div class="tab-pane" id="enviarcupon">
						<p class="text-center"><strong>6. Enviar cupon de descuento</strong></p>
						    
					    <div class="text-center control-group">
						    <label class="control-label text-center" for="mail">Correo electrónico</label>
							<div class="controls">
							    <input class="span9" type="text" id="mail" name="mail" placeholder="alguien@undominio.com">
					    	</div>
					    </div>
						<a href="#diasdemilanesas" class="text-center btn-primary pull-left" type="button">Anterior</a>
						<button id="finalizar" type="submit" class="btn btn-primary pull-right">Finalizar Encuesta</button>								
					</div>
					
				</div>
			</form>
		</div>
	</div>
</div>		
<!-- ANUNCIO ENCUESTA EXITOSA -->
<div id="anuncio"class="modal hide fade">
    <div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    	<h3>La encuesta se realizo con éxito!</h3>
    </div><!--
    <div class="modal-body">
    	<p>Estamos trabajando para darte una experiencia única al realizar pedidos!</p>
    	<p>Volvé pronto!</p>
    	<p><strong>Bob.</strong></p>
    </div>-->
    <div class="modal-footer">
    	<a href="#" class="btn btn-primary">Aceptar!</a>
    </div>
</div>
<?php include 'footer.php' ?>
<script>

$(document).ready(function(){
    
    $('#anuncio .btn').click(function(){
		$('#anuncio').modal('hide');
	});
    
    $('#encuesta a').click(function (e) {
	    e.preventDefault();
	    $(this).tab('show');
	});
	 
	$('.tab-content a').click(function (e) {
	    e.preventDefault();
	    $(this).tab('show');
	}); 
	
	$('#encuesta').hide();
	$('#encuesta + form').hide();
	
	$('#iniciar').click(function(){
		$(this).hide();
		$('#descargar').hide();
		$('#encuesta + form').reset();
		$('#irinicio').click();
		$('#encuesta + form').show();
	});
	
	$('#finalizar').click(function(e){
		e.preventDefault();
		$.post('procesa_encuesta.php',$('#encuesta + form').serialize())
			.done(function(data){
					console.log(data);
					if (data == 'ok'){
						//alert("La encuesta se realizó con éxito!");
						$('#anuncio').modal();
						$('#iniciar').show();
						$('#descargar').show();
						$('#encuesta + form').hide();
						//window.location = '/admin/encuestas';
					}
			});
	});
});
</script>