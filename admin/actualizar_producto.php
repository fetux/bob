<?php
include_once 'init.php';
switch ($_POST['del_sal']){
	
	case 'delivery':
		$sql = "UPDATE precios_deliv_prod
					SET id_categoria='{$_POST['categoria']}',
						descripcion='{$_POST['descripcion']}',
						importe='{$_POST['importe']}'
					WHERE id='{$_POST['id']}'";
		break;
	case 'salon':
		$sql = "UPDATE precios_salon_prod
					SET importe='{$_POST['importe']}'
					WHERE id='{$_POST['id']}'";
		break;
}

if (mysql_query($sql))
	echo $_POST['id'].'-success';
else
	echo 'error';


?>