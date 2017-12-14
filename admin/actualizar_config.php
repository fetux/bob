<?php
include_once 'init.php';


$sql = "UPDATE config SET mercadopago = NOT mercadopago WHERE id=1";

if (mysql_query($sql)) echo 'success'; else echo 'error';

?>