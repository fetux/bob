<?php

include '../../cnx.php';
if(isset($_POST)) {
	//*************************
	//Envio el cupón de descuento por correo electrónico
	//*************************
	
	$img = imagecreatefromjpeg('../../assets/img/cupones/cupon-descuento.jpg');
	$color = imagecolorallocate($img, 0, 0, 0);
	imagestring($img, 5, 100, 60, $_POST['nombre-cliente'], $color);
	imagestring($img, 5, 500, 35,$_POST['cliente'], $color);
	$fecha = new DateTime();	
	$intervalo = new DateInterval('P1M');
	$fecha->add($intervalo);
	imagestring($img, 5, 435, 360, $fecha->format('d-m-Y'), $color);
	//header('Content-type: image/png');
	imagejpeg($img,'../../assets/img/cupones/'.$_POST['cliente'].'.jpg');
	
	
	
	
	if($_POST['mail']) {
		
		$fecha = date("d-M-y H:i");
		$to = $_POST['mail'];
		$subject = "Ganaste un descuento en Bob Milanga!";
		
		$contenido = "<html><head></head><body>";
		$contenido = "<h4>TE INVITAMOS A BOB MILANGA! </h4>";
		$contenido .= "<h4>-------------------------------</h4>";
		$contenido .= "<br/>";
		$contenido .= "<br/>";
		$contenido .= "<h5>Ganaste un cup&oacute;n de descuento del 20%!!</h5>";
		$contenido .= "<h3>Si la imagen no carga automáticamente, hacé click en el siguiente enlace para verla.</h3>";
		$contenido .= "<a href='http://www.bobmilanga.com.ar/assets/img/cupones/{$_POST['cliente']}.jpg'>Ver mi cup&oacute;n</a>";
		$contenido .= "<img src='http://www.bobmilanga.com.ar/assets/img/logo_bobmilanga.png' />";	
		$contenido .= "<p>Cup&oacute;n de descuento enviado el ".$fecha." desde www.bobmilanga.com.ar<p>";
		$contenido .= "</body></html>";
		$header = "From: Bob Milanga Milaneseria <bob@bobmilanga.com.ar>\n";
		$header .= "X-Mailer:PHP/".phpversion()."\n";
		$header .= "Mime-Version: 1.0\n";
		$header .= "Content-Type: text/html;charset=ISO-8859-1\r\n";
		mail($to, $subject, utf8_decode($contenido) ,$header);
	}
	
	
	
	
	$sql = "INSERT INTO encuestas (id_cliente,nombre,direccion,pedidos,temperatura,calidad,espera,precio,milas)
				VALUES(
				{$_POST['cliente']},
				'{$_POST['nombre-cliente']}',
				'{$_POST['direccion']}',
				{$_POST['pedidos']},
				{$_POST['temp']},
				{$_POST['calidad']},
				{$_POST['tiempoespera']},
				{$_POST['precio']},
				{$_POST['diasdemilanesas']}
				)";
	mysql_query($sql);
	mysql_insert_id();
	echo 'ok';
}
?>