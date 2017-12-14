<?php

	if (isset($_POST)) 
	{
		
		if($_POST["mail"]!="" && $_POST["dir"]!="" && $_POST["cliente"]!="")
		{
			$fecha = date("d-M-y H:i");
			
			
			$subject = "Hemos recibio el pago en Bob Milanga!";
			
			$contenido = "CONFIRMACIÓN DE PAGO \n";
			$contenido .= "------------------------------\n";
			$contenido .= "\n";
			$contenido .= "\n";
			$contenido .= "Estimado ".$_POST['cliente'].",\n";
			$contenido .= "Este correo es solo para confirmarle que hemos recibido su pago y que su pedido esta siendo atendido.\n";
			$contenido .= "\n";
			$contenido .= "Muchas gracias por su compra!\n";
			
			$contenido .= "Cualquier duda no dudes en comunicarte telefonicamente al 493-7040.\n";
			$contenido .= "Confirmado el ".$fecha." desde www.bobmilanga.com\n";
			
			$header = "From: pagos@bobmilanga.com\n";
			$header .= "X-Mailer:PHP/".phpversion()."\n";
			$header .= "Mime-Version: 1.0\n";
			$header .= "Content-Type: text/plain";
			mail($_POST['mail'], $subject, utf8_decode($contenido) ,$header);
			
			echo "Se envio el mail de confirmaci&oacute;n. Ya puedes cerrar esta ventana.";
		}
	}
?>