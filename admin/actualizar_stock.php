<?php
include_once 'init.php';

switch ($_POST['table_id']){
	
	case 'stock-mila':
		$sql = "UPDATE stock_milanesas
					SET en_stock='{$_POST['stock']}'
					WHERE id='{$_POST['row_id']}'";
		break;
	case 'stock-var':
		$sql = "UPDATE stock_variedades
					SET en_stock='{$_POST['stock']}'
					WHERE id='{$_POST['row_id']}'";
		break;
}
echo $sql;
if (mysql_query($sql)) echo 'success'; else echo 'error';

?>