<?php include 'header.php'; ?>

<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
    <li data-target="#myCarousel" data-slide-to="5"></li>
    <li data-target="#myCarousel" data-slide-to="6"></li>
    <li data-target="#myCarousel" data-slide-to="7"></li>
    <li data-target="#myCarousel" data-slide-to="8"></li>
    <li data-target="#myCarousel" data-slide-to="9"></li>
    <li data-target="#myCarousel" data-slide-to="10"></li>

    <li data-target="#myCarousel" data-slide-to="12"></li>
    <li data-target="#myCarousel" data-slide-to="13"></li>
    <li data-target="#myCarousel" data-slide-to="14"></li>
    <li data-target="#myCarousel" data-slide-to="15"></li>
    <li data-target="#myCarousel" data-slide-to="16"></li>
    <li data-target="#myCarousel" data-slide-to="17"></li>
    <li data-target="#myCarousel" data-slide-to="18"></li>
    <li data-target="#myCarousel" data-slide-to="19"></li>

  </ol>
<div class="carousel-inner">
	<div class="active item">
    	<img src="assets/img/salon/1.redimensionado.jpg" width="100%"/>
    </div>
    <div class="item">
		<img src="assets/img/salon/2.redimensionado.jpg" width="100%"/>
	</div>
	<div class="item">
		<img src="assets/img/salon/3.redimensionado.jpg" width="100%"/>
	</div>
	<div class="item">
		<img src="assets/img/salon/4.redimensionado.jpg" width="100%"/>
	</div>
	<div class="item">
		<img src="assets/img/salon/5.redimensionado.jpg" width="100%"/>
	</div>
	<div class="item">
		<img src="assets/img/salon/6.redimensionado.jpg" width="100%"/>
	</div>
	<div class="item">
		<img src="assets/img/salon/7.redimensionado.jpg" width="100%"/>
	</div>
	<div class="item">
		<img src="assets/img/salon/8.redimensionado.jpg" width="100%"/>
	</div>
	<div class="item">
		<img src="assets/img/salon/9.redimensionado.jpg" width="100%"/>
	</div>
	<div class="item">
		<img src="assets/img/salon/10.redimensionado.jpg" width="100%"/>
	</div>



	<div class="item">
		<img src="assets/img/salon/12.redimensionado.jpg" width="100%"/>
	</div>
	<div class="item">
		<img src="assets/img/salon/13.redimensionado.jpg" width="100%"/>
	</div>
	<div class="item">
		<img src="assets/img/salon/14.redimensionado.jpg" width="100%"/>
	</div>
	<div class="item">
		<img src="assets/img/salon/15.redimensionado.jpg" width="100%"/>
	</div>
	<div class="item">
		<img src="assets/img/salon/16.redimensionado.jpg" width="100%"/>
	</div>
	<div class="item">
		<img src="assets/img/salon/17.redimensionado.jpg" width="100%"/>
	</div>
	<div class="item">
		<img src="assets/img/salon/18.redimensionado.jpg" width="100%"/>
	</div>
	<div class="item">
		<img src="assets/img/salon/19.redimensionado.jpg" width="100%"/>
	</div>
	<div class="item">
		<img src="assets/img/salon/20.redimensionado.jpg" width="100%"/>
	</div>


</div>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div><!-- /.carousel -->


<div class="container font-simplicity">

	<div class="row">
		<div class="col-xs-12">
			<h1 class="text-center">Conoc&eacute; el salón de Bob Milanga!</h1>
		</div>
	</div>

	<div class="row">

		<div class="col-xs-12 col-sm-6">
			<h2>Ven&iacute; a comer en Bob Milanga!</h2>
			<p>Vas disfrutar de unas exquisitas milanesas en nuestro c&aacute;lido sal&oacute;n!</p>
			<p>Te esperamos con tu familia y amigos todos los d&iacute;as salvo los martes que Bob descansa!</p>
			<p>Aprovecha y mir&aacute; nuestras <a href="promociones.php">promociones</a> imperdibles!</p>
			<div class="hidden-xs">
				<h3>¿Quéres conocer los precios del sal&oacute;n?</h3>
				<p>Hace click en la carta a la derecha o hace click <a id="lk-carta" href="#">ac&aacute;</a></p>
			</div>
			<h3>¿Sab&eacute;s como llegar?</h3>
			<p>Mir&aacute; <a href="contacto.php">ac&aacute;</a> y encontr&aacute;s la direcci&oacute;n, el tel&eacute;fono y un mapa!</p>
		</div>

		<div class="col-xs-12 col-sm-6">
			<img src="assets/img/cocinando.png" class="img-responsive">

		</div>
	</div>

</div>



	<div id="btn-carta" class="hidden-xs">
		<img src="assets/img/menu/01cartita.png" alt="Menú"/>
	</div>

<?php include 'footer.php'; ?>

<script>
$(document).ready(function(){
	$('#btn-carta, #lk-carta').click(function(){
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
	$('#btn-carta').hover(
			function(){
				//$(this).css('left','-5%');
				$(this).animate({right: "-1%"},500);

			},
			function(){
				//$(this).css('left','-10%');
				$(this).animate({right: "-5%"},500);
			}
		);

	//$('#magazine').turn({gradients: true, acceleration: true});
});

</script>
