<?php
include 'cnx.php';
include 'header.php';

$sql = "SELECT * FROM imagenes WHERE id_galeria='4' order by id";
$res = mysql_query($sql);
$images = array();
while ($row = mysql_fetch_assoc($res)){
	$images[]= $row;
}

?>
<div class="sm-content-margin hidden-xs"></div>
<div class="xs-content-margin"></div>

<div class="container font-simplicity">
	<div class="row">

		<div class="col-xs-12">
			<h2>Elegí una de nuestras promos!</h2>
		</div>

	</div>

	<?php for ($i=0; $i < count($images); ) : ?>

	<div class="row">

		<div class="col-xs-12 col-sm-4" >
			<a class='promos' href='<?=$images[$i]['url']?>'><img class="img-responsive" src="<?=$images[$i++]['url']?>" /></a>
		</div>
        <?php  if (isset($images[$i])): ?>
		<div class="col-xs-12 col-sm-4" >
				<a class='promos' href='<?=$images[$i]['url']?>'><img class="img-responsive" src="<?=$images[$i++]['url']?>" /></a>
		</div>
            <?php  if (isset($images[$i])): ?>
    		<div class="col-xs-12 col-sm-4">
    				<a class='promos' href='<?=$images[$i]['url']?>'><img class="img-responsive" src="<?=$images[$i++]['url']?>" /></a>
    		</div>
            <?php endif; ?>
        <?php endif; ?>

	</div>
<?php endfor; ?>
</div>

<?php include 'footer.php'; ?>

<script>
$(document).ready(function(){
    jQuery('a.promos').colorbox({scalePhotos:'true',maxWidth:'100%'});
});
</script>