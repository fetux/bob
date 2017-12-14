<?php

require_once ('lib/mercadopago.php');
//$mp = new MP('1054682133403267', '2X1k2Zx5h1iMl1zgwfNIZB3RqZcVIFrx');
$mp = new MP('3893355310750601', '9E5J20xqCY5h9Z2jWGahFkPHdTAaHPOl');
//$mp->sandbox_mode(TRUE);


$preference_data = array(
    "items" => array(
       array(
           "title" => "BobMilanga.com | "+ $_POST['sucursal'] +" | Cliente: ".$_POST['comprador']." <".$_POST['mail']."> - ".$_POST['direccion'],
           "quantity" => 1,
           "currency_id" => "ARS",
           "unit_price" => floatval($_POST['total'])
       )
    ),

	"payment_methods" => array (
		"excluded_payment_methods" => array (
			array(
				"id" => "pagofacil"
			),
			array(
				"id" => "redlink"
			),
			array(
				"id" => "rapipago"
			),
			array(
				"id" => "bapropagos"
			)
		),
        "excluded_payment_types" => array(
			array(
				"id" => "ticket",
				"id" => "bank_transfer",
           		"id" => "atm",
            	"id" => "debit_card"
			)
		),
        "installments" => 12
    )

);
$preference = $mp->create_preference($preference_data);

echo $preference['response']['sandbox_init_point'];

?>