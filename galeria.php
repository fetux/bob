<?php
include 'cnx.php';
include 'header.php';
include_once 'assets/vendor/phpThumbnailer/ThumbLib.inc.php';


if ($_GET['g']=='fotos') {
	$sql = "SELECT * FROM imagenes WHERE id_galeria='2'";
}
else
	if ($_GET['g']=='dibujos'){
		$sql = "SELECT * FROM imagenes WHERE id_galeria='3'";
		//echo 'si';
	}
	else {
		echo 'No se encontró la galeria.';
	}
//echo $sql;

$res = mysql_query($sql);
//print_r($res);
$images = array();
while ($row = mysql_fetch_assoc($res)){
	$images[]= $row;
}
?>


<div class="sm-content-margin hidden-xs"></div>
<div class="xs-content-margin"></div>

<div class="container font-simplicity">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
    		<h2>¿Todav&iacute;a no viniste a Bob Milanga y dejaste tu dibujo?</h2>
    		<h4>¿Qu&eacute; est&aacute;a esperando?</h4>
    		<p>Ven&iacute; a comer a nuestro <a href="salon.php">sal&oacute;n</a> y pedi una hoja en blanco y crayones para hacer tu dibujo!</p>


    		<h5>¿Preferis hacerlo en casa?</h5>
    		<p>Envianos tus dibujos a <a href="mailto:info@bobmilanga.com">info@bobmilanga.com</a></p>

    		<blockquote>"Los dibujos que mas me gustan son los que tienen mas colores!"</blockquote>
    		<cite>Bob</cite>
		</div>
		<div class="col-xs-12 col-sm-6">
			<img src="assets/img/bici.png" class="img-responsive">
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<h2>Estos son algunos de los dibujos que los chicos me han dejado!</h2>
		</div>
	</div>
</div>


			 <!-- Carousel
	    ================================================== -->
	    <div id="myCarousel" class="carousel slide" data-ride="carousel">
	      <!-- Indicators -->
	      <ol class="carousel-indicators">
	      	<?php

				for ($i=0; $i < count($images); $i++) {
					echo '<li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
				}
	      	?>

	      </ol>
	      <div class="carousel-inner">

	        <?php foreach ($images as $row) : ?>
				<div class="item">
		          <img class="img-responsive" src="<?=$row['url']?>">
		        </div>
			<?php endforeach; ?>



	      </div>
	      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
	      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	    </div><!-- /.carousel -->



<?php include 'footer.php'; ?>

<script>
$(document).ready(function(){
	$('#myCarousel .carousel-inner .item:first').addClass('active');
	$('#myCarousel .carousel-indicators li:first').addClass('active');
});
</script>
