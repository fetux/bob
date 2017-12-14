<?php

	if (isset($_POST))
	{

		if($_POST["nombre"]!="" && $_POST["tel"]!="" && $_POST["mail"]!="")
		{
			$fecha = date("d-M-y H:i");
			//$mymail = "pedidos@bobmilanga.com.ar";
      if ($_POST['sucursal'] == 1) {
        $mymail = "avellaneda@bobmilanga.com";
        $sucursal = "Avellaneda 2553";
      } else if ($_POST['sucursal'] == 2){
        $mymail = "tejedor@bobmilanga.com";
        $sucursal = "Av. Tejedor 707";
      }
			$subject = "Nuevo pedido desde el sitio Bob Milanga!";

			$contenido = "SOLICITUD DE PEDIDO \n";
			$contenido .= "------------------------------\n";
			$contenido .= "$sucursal\n";
			$contenido .= "\n";
			$contenido .= "\n";
			$contenido .= "Datos: \n";
			$contenido .= "-------- \n";
			$contenido .= "\n";
			$contenido .= "Nombre: " .$_POST['nombre']. "\n";
			$contenido .= "\n";
      if ($_POST['delivery'] === 'true') {
        $contenido .= "Direccion de entrega: " .$_POST['direccion']."\n";
      } else {
        $contenido .= "Retira en Sucursal.\n";
      }
			$contenido .= "\n";
			$contenido .= "Telefono: " .$_POST['tel']. "\n";
			$contenido .= "\n";
			$contenido .= "Correo electronico: " .$_POST['mail']. "\n";
			$contenido .= "\n";

			$contenido .= "Pedido: \n";
			$contenido .= "---------- \n";
			$contenido .= $_POST['pedido']. "\n";
			$contenido .= "\n";
			$contenido .= "\n";
			$contenido .= "Comentarios:\n";
			$contenido .= $_POST['comentarios']."\n\n";
			$contenido .= "Pedido el ".$fecha." desde www.bobmilanga.com.ar";

			$header = "From: ".$_POST['mail']."\n";
			$header .= "X-Mailer:PHP/".phpversion()."\n";
			$header .= "Mime-Version: 1.0\n";
			$header .= "Content-Type: text/plain";
			mail($mymail, $subject, utf8_decode($contenido) ,$header);

			//MAIL PARA EL CLIENTE

			$subject = "Pedido ON-LINE desde BobMilanga.com";
			$contenido = "Hemos recibido tu pedido!\n\n";

			$contenido .= "Datos: \n";
			$contenido .= "-------- \n";
			$contenido .= "\n";
			$contenido .= "Nombre: " .$_POST['nombre']. "\n";
			$contenido .= "\n";
			$contenido .= "Telefono: " .$_POST['tel']. "\n";
			$contenido .= "\n";
			$contenido .= "Correo electronico: " .$_POST['mail']. "\n";
			$contenido .= "\n";
      if ($_POST['delivery'] === 'true') {
        $contenido .= "Direccion de entrega: " .$_POST['direccion']."\n";
      } else {
        $contenido .= "Retira en: $sucursal.\n";
      }
			$contenido .= "\n";
			$contenido .= "Pedido: \n";
			$contenido .= "---------- \n";
			$contenido .= $_POST['pedido']. "\n";
			$contenido .= "\n";
			$contenido .= "\n";
			$contenido .= "Comentarios:\n";
			$contenido .= $_POST['comentarios']."\n\n";
			$contenido .= "Pedido el ".$fecha." desde www.bobmilanga.com.ar";
			$contenido .= "\n\n";
			$contenido .= "Si pagaste tambien ON-LINE recibiras un correo de MercadoPago.\n";
			$contenido .= "Además deberás recibir otro correo nuestro confirmando que hemos recibido correctamente el pago.\n";
			$contenido .= "Cualquier duda no dudes en comunicarte telefonicamente al 493-7040.\n";
			$contenido .= "\n";
			$contenido .= "Muchas Gracias!\n";
			$contenido .= "Que disfrutes tu comida!\n";
			$contenido .= "Saludos!\n";
			$contenido .= "Bob.-\n";

			$header = "From: pedidos@bobmilanga.com\n";
			$header .= "X-Mailer:PHP/".phpversion()."\n";
			$header .= "Mime-Version: 1.0\n";
			$header .= "Content-Type: text/plain";
			mail($_POST['mail'], $subject, utf8_decode($contenido) ,$header);


			echo "<div style='height:100%;margin:0;text-align: center;background-color: #FFF380;font-family: simplicity;'>";
			echo "";
			echo "<p style='padding-top:35px;'><b>El pedido se envi&oacute; con &eacute;xito!</b></p>";

      if ($_POST['delivery'] === 'true') {


        // Mensaje segun el horario del pedido
        $horaAct = date("H");
        $minAct = date("m");


        if($horaAct >= 0 && $horaAct <12)
        {
          echo "<p><b>Entre las 12:20 hs y las 12:50 hs llegara tu pedido.</b></p>";
        }
        elseif($horaAct >= 12 && $horaAct < 15)
        {
          echo "<p><b>Dentro de los 50 minutos llegara tu pedido.</b></p>";
        }
        elseif($horaAct >= 15 && $horaAct < 20)
        {
          echo "<p><b> Entre las 20:20 hs y las 20:50 hs llegara su pedido.</b></p>";
        }
        elseif($horaAct >= 20 && $horaAct <=23)
        {
          if($horaAct != 23 || $minAct <= 30)
          {
            echo "<p><b>Dentro de los 50 minutos llegara tu pedido.</b></p>";
          }
          else {
            echo "<p><b>Sin embargo, los pedidos se envían hasta las 23:30</b></p>";
          }
        }
      } else {
        echo "<p><b>Puedes retirar tu peidido en ".$sucursal." dentro de 40 minutos.</b></p>";

      }
      echo "<p><b>Muchas gracias.</b></p>";
      echo "";
      echo "</div>";
		}
		else
			{
			echo "<div style='height:100%;margin:0;text-align: center;background-color: #FFF380;font-family: simplicity;'>";
			echo "";
			echo "<p style='padding-top:35px;'><b>Ocurrió un error al enviar el pedido.</b></p>";
			echo "<p><b>Intente nuevamente.</b></p>";
			echo "";
			echo "</div>";
			}
	}

?>