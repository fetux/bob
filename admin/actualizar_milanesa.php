<?php
//var_dump($_POST);
include_once 'init.php';
switch ($_POST['del_sal']){
	
	case 'delivery':
		$sql = "UPDATE precios_deliv_milas
					SET media_nop='{$_POST['media']}',
						nalga='{$_POST['nalga']}',
						pollo='{$_POST['pollo']}',
						peceto='{$_POST['peceto']}',
						merluza='{$_POST['merluza']}',
						bob_milanga='{$_POST['bob_milanga']}',
						calabaza='{$_POST['calabaza']}'
					WHERE id='{$_POST['id']}'";
		break;
	case 'salon':
		$sql = "UPDATE precios_salon_milas
					SET media_nop='{$_POST['media']}',
						nalga='{$_POST['nalga']}',
						pollo='{$_POST['pollo']}',
						peceto='{$_POST['peceto']}',
						merluza='{$_POST['merluza']}',
						bob_milanga='{$_POST['bob_milanga']}',
						calabaza='{$_POST['calabaza']}'
					WHERE id='{$_POST['id']}'";
		break;
}

//echo $sql;

if (mysql_query($sql))
	echo $_POST['id'].'-success';
	//echo 'success-'.$_POST['id'].'-'.$_POST['id'].'-'$_POST['id'].'-'$_POST['id'].'-'$_POST['id'].'-'$_POST['id'].'-'$_POST['bob_milanga'].'-'$_POST['calabaza'].'-';
else
	echo 'error';

?>