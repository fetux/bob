<?php

include 'cnx.php';
require_once "lib/mercadopago.php";

$mp = new MP("1054682133403267", "2X1k2Zx5h1iMl1zgwfNIZB3RqZcVIFrx");

// Get the payment and the corresponding merchant_order reported by the IPN.
if($_GET["topic"] == 'payment'){
	$payment_info = $mp->get("/collections/notifications/" . $_GET["id"]);
	$merchant_order_info = $mp->get("/merchant_orders/" . $payment_info["response"]["collection"]["merchant_order_id"]);
// Get the merchant_order reported by the IPN.
} else if($_GET["topic"] == 'merchant_order'){
	$merchant_order_info = $mp->get("/merchant_orders/" . $_GET["id"]);
}

if ($merchant_order_info["status"] == 200) {
	// If the payment's transaction amount is equal (or bigger) than the merchant_order's amount you can release your items
	$paid_amount = 0;

	foreach ($merchant_order_info["response"]["payments"] as  $payment) {
		if ($payment['status'] == 'approved'){
			$paid_amount += $payment['transaction_amount'];
		}
	}

	if($paid_amount >= $merchant_order_info["response"]["total_amount"]){
		if(count($merchant_order_info["response"]["shipments"]) > 0) { // The merchant_order has shipments
			if($merchant_order_info["response"]["shipments"][0]["status"] == "ready_to_ship"){
				print_r("Totally paid. Print the label and release your item.");
			}
		} else { // The merchant_order don't has any shipments
			print_r("Totally paid. Release your item.");


			$p = $payment_info['response']['collection'];

			$sql = "INSERT INTO pagos (	payment_id,
										date_created,
										date_approved,
										payer_id,
										payer_first_name,
										payer_last_name,
										payer_phone,
										payer_identification,
										payer_email,
										transaction_amount,
										net_received_amount,
										status,
										reason
										) VALUES (

										'".$p['id']."',
										'".$p['date_created']."',
										'".$p['date_approved']."',
										'".$p['payer']['id']."',
										'".$p['payer']['first_name']."',
										'".$p['payer']['last_name']."',
										'".$p['payer']['phone']['area_code']." ".$p['payer']['phone']['number']."',
										'".$p['payer']['identification']['number']."',
										'".$p['payer']['email']."',
										'".$p['transaction_amount']."',
										'".$p['net_received_amount']*0.9."',
										'".$p['status']."',
										'".$p['reason']."'
				)";

			$reason_array = $p['reason'].split('|');
      $sucursal = $reason_array[1];

      if ($sucursal == 'Avellaneda 2553') {
        $mymail = "avellaneda@bobmilanga.com";
      } elseif ($sucursal == 'Av. Tejedor 707') {
        $mymail = "tejedor@bobmilanga.com";
      }
			$res = mysql_query($sql);


			$fecha = date("d-M-y H:i");
			//$mymail = "fetudaguerre@gmail.com";
			$subject = "Nuevo pago desde el sitio Bob Milanga!";

			$contenido = "PAGO DE PEDIDO ONLINE\n";
			$contenido .= "------------------------------\n";
			$contenido .= "\n";
			$contenido .= "\n";
			$contenido .= "Realizado el ".$fecha."\n";
			//$contenido .= "Para ver la información del pago: http://www.bobmilanga.com/receive-ipn.php?id=".$_POST['id'];


			$contenido .= "Aprobado el $p['date_approved']\n":
			$contenido .= "ID del comprador: $p['payer']['id']\n";
			$contenido .= "Nombre completo: $p['payer']['first_name'] $p['payer']['last_name']\n";
			$contenido .= "Telefono: $p['payer']['phone']['area_code'] $p['payer']['phone']['number']\n";
			$contenido .= "Correo electrónico: $p['payer']['email']\n";
			$contenido .= "Monto transacción $p['transaction_amount']\n";
			$contenido .= "Monto neto recibido $p['net_received_amount']*0.9\n":
			$contenido .= "Estado: $p['status']\n";
			$contenido .= "Razón: $p['reason']\n"


			$header = "From: pagos@bobmilanga.com"."\r\n";
			$header .= 'Bcc: fetudaguerre@gmail.com' . "\r\n";
			$header .= "X-Mailer:PHP/".phpversion()."\r\n";
			$header .= "Mime-Version: 1.0\r\n";
			$header .= "Content-Type: text/plain";
			mail($mymail, $subject, utf8_decode($contenido) ,$header);




		}
	} else {
		print_r("Not paid yet. Do not release your item.");
	}
}
?>



<!--
<?php

include 'cnx.php';

/**
 * MercadoPago SDK
 * Receive IPN
 * @date 2012/03/29
 * @author hcasatti
 */
// Include Mercadopago library
require_once ('lib/mercadopago.php');


$mp = new MP('1054682133403267', '2X1k2Zx5h1iMl1zgwfNIZB3RqZcVIFrx');
//$mp->sandbox_mode(FALSE);
// Get the payment reported by the IPN. Glossary of attributes response in https://developers.mercadopago.com
$payment_info = $mp->get_payment_info($_GET["id"]);





// Show payment information
if ($payment_info["status"] == 200) {





    //print_r($payment_info["response"]);

	echo '<h2>'.$payment_info["response"]['collection']['reason'].'</h2>';

	echo '<h3>Datos del pago</h3>';
	echo 'ID: '.$payment_info["response"]['collection']['id'].'<br />';
	echo 'Fecha creaci&oacute;n: '.$payment_info["response"]['collection']['date_created'].'<br />';
	echo 'Fecha aprobaci&oacute;n: '.$payment_info["response"]['collection']['date_approved'].'<br />';
	echo '<h3>Datos del comprador</h3>';
	echo 'ID: '.$payment_info["response"]['collection']['payer']['id'].'<br />';
	echo 'Nombre y Apellido: '.$payment_info["response"]['collection']['payer']['first_name'].' '.$payment_info["response"]['collection']['payer']['last_name'].'<br />';
	echo 'Tel&eacute;fono: '.$payment_info["response"]['collection']['payer']['phone']['area_code'].' '.$payment_info["response"]['collection']['payer']['phone']['number'].'<br />';
	echo 'DNI: '.$payment_info["response"]['collection']['payer']['identification']['number'].'<br />';
	echo 'Correo electr&oacute;nico: '.$payment_info["response"]['collection']['payer']['email'].'<br />';

	echo '<h4>Total transacci&oacute;n: '.$payment_info["response"]['collection']['transaction_amount'].'</h4>';
	echo '<h5>Total neto recibido: '.$payment_info["response"]['collection']['net_received_amount']*0.9.'</h5>';
	echo '<h6>Estado: '.$payment_info["response"]['collection']['status'].'</h6	>';

	$pos1 = strpos($payment_info["response"]['collection']['reason'], '(');
	$len = strpos($payment_info["response"]['collection']['reason'], ')') - $pos1 - 1;
	$mail = substr($payment_info["response"]['collection']['reason'],$pos1+1,$len);


	$len = strpos($payment_info["response"]['collection']['reason'], '(') - 30;

	$cliente = substr($payment_info["response"]['collection']['reason'],30, $len);

	$pos1 = strpos($payment_info["response"]['collection']['reason'], ') de ') + 5;

	$dir = substr($payment_info["response"]['collection']['reason'],$pos1);


	echo '<form action="envia_confirmacion_pago.php" method="post">';
	echo '<input type="hidden" name="cliente" value="'.$cliente.'">';
	echo '<input type="hidden" name="mail" value="'.$mail.'">';
	echo '<input type="hidden" name="dir" value="'.$dir.'">';
	echo '<button type="submit">Enviar confirmacion a '.$cliente.'</button>';
	echo '</form>';
}




if (isset($_POST)){


	$payment_info = $mp->get_payment_info($_POST["id"]);

	$p = $payment_info['response']['collection'];


	//$sql = "INSERT INTO pagos (payment_id,date_created) VALUES (".$p['id'].",'".$p['date_created']."')";


	$sql = "INSERT INTO pagos (	payment_id,
								date_created,
								date_approved,
								payer_id,
								payer_first_name,
								payer_last_name,
								payer_phone,
								payer_identification,
								payer_email,
								transaction_amount,
								net_received_amount,
								status,
								reason
								) VALUES (

								'".$p['id']."',
								'".$p['date_created']."',
								'".$p['date_approved']."',
								'".$p['payer']['id']."',
								'".$p['payer']['first_name']."',
								'".$p['payer']['last_name']."',
								'".$p['payer']['phone']['area_code']." ".$p['payer']['phone']['number']."',
								'".$p['payer']['identification']['number']."',
								'".$p['payer']['email']."',
								'".$p['transaction_amount']."',
								'".$p['net_received_amount']*0.9."',
								'".$p['status']."',
								'".$p['reason']."'
		)";



	$res = mysql_query($sql);


	$fecha = date("d-M-y H:i");
	//$mymail = "pedidos@bobmilanga.com.ar";
	$mymail = "fetudaguerre@gmail.com";
	$subject = "Nuevo pago desde el sitio Bob Milanga!";

	$contenido = "PAGO DE PEDIDO ONLINE\n";
	$contenido .= "------------------------------\n";
	$contenido .= "\n";
	$contenido .= "\n";
	$contenido .= "Realizado el ".$fecha."\n";
	$contenido .= "Para ver la información del pago: http://www.bobmilanga.com/receive-ipn.php?id=".$_POST['id'];

	$header = "From: pagos@bobmilanga.com"."\n";
	$header .= "X-Mailer:PHP/".phpversion()."\n";
	$header .= "Mime-Version: 1.0\n";
	$header .= "Content-Type: text/plain";
	mail($mymail, $subject, utf8_decode($contenido) ,$header);

}
?>
-->
