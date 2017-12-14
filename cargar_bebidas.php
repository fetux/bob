<?php
	include 'cnx.php';

$sql = "SELECT * FROM precios_deliv_prod WHERE en_stock=1";
$res = mysql_query($sql);
$guarniciones = array();
$sandwiches = array();
$bebidas = array();
$promos = array();
$agregados = array();
while($row = mysql_fetch_assoc($res)){
		switch ($row["id_categoria"]) {
			case '1': $guarniciones[] = $row;
				break;
			case '2': $sandwiches[] = $row;
				break;
			case '3': $bebidas[] = $row;
				break;
			case '4': $promos[] = $row;
				break;
			case '5': $agregados[] = $row;
				break;
			default:
				
				break;
		}
}

if (isset($_POST['promo']))
{
	foreach ($bebidas as $bebida) {
		echo '<a 
				data-type="nosuma" 
				data-precio="0" 
				data-desc="'.$bebida['descripcion'].'"
				data-promo="'.$_POST['promo'].'" 
				class="btn btn-large btn-warning btn-bobmilanga" 
				href="#sabor-bebida"
				>'.$bebida['descripcion'].'</a>';
	}
}
else
{
	foreach ($bebidas as $bebida) {
		echo '<a 
				data-type="nosuma" 
				data-precio="'.$bebida['importe'].'" 
				data-desc="'.$bebida['descripcion'].'" 
				class="btn btn-large btn-warning btn-bobmilanga" 
				href="#sabor-bebida"
				>'.$bebida['descripcion'].'</a>';
	}
}

//sleep(3);
?>