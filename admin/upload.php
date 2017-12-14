<?php
include 'init.php';
include_once '../assets/vendor/phpThumbnailer/ThumbLib.inc.php';

if ($_SESSION['logueado']!='ok') { header('Location: index.php'); die; }
		/*var_dump($_FILES);
		var_dump($_POST);*/
if (isset($_POST)){
	$id = uniqid();
	if ($_POST["gal"]=="fotos"){
		$dest = '../uploads/fotos/'.$id.'.'.pathinfo($_FILES["imagen"]["name"],PATHINFO_EXTENSION);
		$thumbdest = '../uploads/fotos/'.$id.'-thumb.'.pathinfo($_FILES["imagen"]["name"],PATHINFO_EXTENSION);

		$sql = "INSERT INTO imagenes (id_galeria,url,thumburl) VALUES (2,'".substr($dest, 3)."','".substr($thumbdest, 3)."')";
		if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $dest)){
			//Redimensiono la imagen y creo el thumbnail
			$thumb = PhpThumbFactory::create($dest);
			$thumb->resize(800, 600);
			$thumb->save($dest);
			$thumb->adaptiveResize(120, 120);
			$thumb->save($thumbdest);
			//Inserto la información en la base de datos
			mysql_query($sql);
			mysql_insert_id();
			//Redirijo la pagina
			header('Location: fotos.php');
		}
		else {
			echo "<p class='label label-important'>Error al subir la foto!</p>";
			echo "<a href='fotos.php'>Volver</a>";
		}
	}
	elseif($_POST["gal"]=="dibujos") {
		$dest = '../uploads/dibujos/'.$id.'.'.pathinfo($_FILES["imagen"]["name"],PATHINFO_EXTENSION);
		$thumbdest = '../uploads/dibujos/'.$id.'-thumb.'.pathinfo($_FILES["imagen"]["name"],PATHINFO_EXTENSION);

		$sql = "INSERT INTO imagenes (id_galeria,url,thumburl) VALUES (3,'".substr($dest, 3)."','".substr($thumbdest, 3)."')";
		if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $dest)){
			//Redimensiono la imagen y creo el thumbnail
			$thumb = PhpThumbFactory::create($dest);
			$thumb->resize(800, 600);
			$thumb->save($dest);
			$thumb->resize(150, 150);
			$thumb->save($thumbdest);
			//Inserto la información en la base de datos
			mysql_query($sql);
			mysql_insert_id();
			//Redirijo la pagina
			header('Location: dibujos.php');
		}
		else {
			echo "<p class='label label-important'>Error al subir el dibujo!</p>";
			echo "<a href='dibujos.php'>Volver</a>";
			}
		}
	elseif($_POST["gal"]=="delivery") {
	$dest = '../uploads/delivery/flyer.jpg';
	$thumbdest = '../uploads/delivery/flyer-thumb.jpg';

	$sql = "DELETE FROM imagenes WHERE id_galeria=1";
	mysql_query($sql);

	$sql = "INSERT INTO imagenes (id_galeria,url,thumburl) VALUES (1,'".substr($dest, 3)."','".substr($thumbdest, 3)."')";
	$res = move_uploaded_file($_FILES["imagen"]["tmp_name"], $dest);
	if ($res){
		//Redimensiono la imagen y creo el thumbnail
		$thumb = PhpThumbFactory::create($dest);
		$thumb->resize(800, 600);
		$thumb->save($dest);
		$thumb->resize(150, 150);
		$thumb->save($thumbdest);
		//Inserto la información en la base de datos
		mysql_query($sql);
		mysql_insert_id();
		//Redirijo la pagina
		header('Location: delivery.php');
	}
		else {
			echo "<p class='label label-important'>Error al subir la imagen de delivery!</p>";
			echo "<a href='delivery.php'>Volver</a>";
			}
		}
	elseif($_POST["gal"]=="promociones") {
	$dest = '../uploads/promociones/'.$id.'.'.pathinfo($_FILES["imagen"]["name"],PATHINFO_EXTENSION);
    $thumbdest = '../uploads/promociones/'.$id.'-thumb.'.pathinfo($_FILES["imagen"]["name"],PATHINFO_EXTENSION);

	$sql = "INSERT INTO imagenes (id_galeria,url,thumburl) VALUES (4,'".substr($dest, 3)."','".substr($thumbdest, 3)."')";
	$res = move_uploaded_file($_FILES["imagen"]["tmp_name"], $dest);
	if ($res){
		//Redimensiono la imagen y creo el thumbnail
		$thumb = PhpThumbFactory::create($dest);
		$thumb->resize(800, 600);
		$thumb->save($dest);
		$thumb->resize(150, 150);
		$thumb->save($thumbdest);
		//Inserto la información en la base de datos
		mysql_query($sql);
		mysql_insert_id();
		//Redirijo la pagina
		header('Location: promociones.php');
	}
		else {
			echo "<p class='label label-important'>Error al subir la imagen de promocion!</p>";
			echo "<a href='promociones.php'>Volver</a>";
			}
		}

}
?>