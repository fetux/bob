<?php


if(isset($_POST)){
	include 'init.php';
	
	foreach ($_POST['ids'] as $id) {
		
		mysql_query("UPDATE pagos SET status = 'cash pending' WHERE payment_id = ".$id);
		
	}
	
	
	$fecha = date("d-M-y H:i");
	//ANTERIOR $mymail = "pedidos@bobmilanga.com.ar";
	$mymail = "fetudaguerre@gmail.com";
	$subject = "Solicitud de Cobro:  BobMilanga.com";
	
	$contenido = "SOLICITUD DE COBRO\n";
	$contenido .= "------------------------------\n";
	$contenido .= "\n";
	$contenido .= "\n";
	$contenido .= "TOTAL A COBRAR: ".$_POST['total']."\n";
	
	$contenido .= "Payment IDs\n\n";
	foreach ($_POST['ids'] as $id) {
		$contenido .= $id."\n";
	}
	$contenido .= "\n";
	$contenido .= "\n";
	$contenido .= "Realizado el ".$fecha."\n";
	
	
	
	$header = "From: cobros@bobmilanga.com"."\n";
	$header .= "X-Mailer:PHP/".phpversion()."\n";
	$header .= "Mime-Version: 1.0\n";
	$header .= "Content-Type: text/plain";
	mail($mymail, $subject, utf8_decode($contenido) ,$header);
	
	header("Location: pagos.php");
}
