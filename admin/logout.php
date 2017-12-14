<?php
session_start();
if ($_SESSION['logueado']=='ok')
	$_SESSION['logueado']='salir';
header('Location: index.php');
?>