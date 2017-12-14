<?php
include 'init.php';
if ($_SESSION['logueado']!='ok') { header('Location: index.php'); die; }

if (isset($_POST['id'])) {
	$sql = "SELECT * FROM imagenes WHERE id=".$_POST['id'];
	$row = mysql_fetch_assoc(mysql_query($sql));

	unlink("../".$row['url']);

	$sql = "DELETE FROM imagenes WHERE id=".$_POST['id'];
	mysql_query($sql);
}
?>