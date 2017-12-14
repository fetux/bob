<?php

include 'init.php';

if ($_SESSION['logueado'] == 'salir'){ session_unset(); session_destroy(); header('Location: index.php'); die;}  


include 'header.php';

 
if ($_SESSION['logueado']=='ok') {
	include 'menu.html';
}
else
{
	include 'login_form.html';
}

include 'footer.php'?>