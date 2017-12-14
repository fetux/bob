<?php
include_once 'init.php';


$sql = "UPDATE config SET costo_delivery = {$_POST['costo']} WHERE id=1";

if (mysql_query($sql)) echo 'success'; else echo 'error';

?>