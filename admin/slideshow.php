<?php
include 'init.php';
if ($_SESSION['logueado']!='ok') { header('Location: index.php'); die; }
include 'header.php';
include 'menu.html';

$sql = "SELECT * FROM imagenes WHERE id_galeria=3";
$res = mysql_query($sql);
$imagenes = array();
while($row = mysql_fetch_assoc($res)){
	$imagenes[] = $row;
}



?>

<h3>Slideshow</h3>
<form id="uploadImage" action="upload.php" method="post" enctype='multipart/form-data'>
	<input id="imagen" name="imagen" type="file">
	<input id="gal" name="gal" value="slideshow" type="hidden">
	<input type="submit" value="SUBIR IMAGEN">
</form>
<table id="slideshow" class="table table-stripped table-hover">
	<thead>
		<th>#</th>
		<th>URL</th>
		<th>Preview</th>
		<th>Eliminar</th>
	</thead>
	<tbody>
		<?php foreach ($imagenes as $row) :?>
			<tr id="<?=$row['id']?>">
				<td><?=$row['id']?></td>
				<td><?=$row['url']?></td>
				<td class="text-center"><img src="<?=$row['url']?>" width="100"></td>
				<td class="text-center"><a class="eliminar" href="#"><strong>x</strong></a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>