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
	foreach ($guarniciones as $guarnicion) {
	switch ($guarnicion['id']){
		case 1:
			echo '<a
					data-id="'.$guarnicion['id'].'"
					data-type="nosuma" 
					data-precio="0" 
					data-desc="'.$guarnicion['descripcion'].'" 
					data-promo="'.$_POST['promo'].'" 
					class="btn btn-large btn-warning btn-bobmilanga" 
					href="#pure-opcion"
					>'.$guarnicion['descripcion'].'</a>';
			break;
		case 2:
		case 3:
			echo '<a 
					data-id="'.$guarnicion['id'].'"
					data-type="nosuma" 
					data-precio="0" 
					data-desc="'.$guarnicion['descripcion'].'" 
					data-promo="'.$_POST['promo'].'" 
					class="btn btn-large btn-warning btn-bobmilanga" 
					href="#pob-opcion"
					>'.$guarnicion['descripcion'].'</a>';
			break;
		case 5:
			echo '<a 
					data-id="'.$guarnicion['id'].'"
					data-type="nosuma" 
					data-precio="0" 
					data-desc="'.$guarnicion['descripcion'].'" 
					class="btn btn-large btn-warning btn-bobmilanga" 
					href="#ensalada-opcion"
					>'.$guarnicion['descripcion'].'</a>';
			break;
			/* NO CARGA las empanadas ni LA TORTILLA DE PAPAS EN LA PROMOCION
		case 6:
			echo '<a 
					data-type="nosuma" 
					data-precio="0" 
					data-desc="'.$guarnicion['descripcion'].'" 
					data-promo="'.$_POST['promo'].'" 
					class="btn btn-large btn-warning btn-bobmilanga" 
					href="#empanada-opcion"
					>'.$guarnicion['descripcion'].'</a>';
			break;
		
		
		default:
			echo '<a 
					data-type="suma" 
					data-precio="0" 
					data-desc="'.$guarnicion['descripcion'].'" 
					data-promo="'.$_POST['promo'].'" 
					class="btn btn-large btn-warning btn-bobmilanga" 
					href="'.$_POST['next'].'"
					>'.$guarnicion['descripcion'].'</a>';
			break;
		 * 
		 */		
		}
	}
}
else
{
	foreach ($guarniciones as $guarnicion) {
		switch ($guarnicion['id']){
			case 1:
				echo '<a 
						data-id="'.$guarnicion['id'].'"
						data-type="nosuma" 
						data-precio="'.$guarnicion['importe'].'" 
						data-desc="'.$guarnicion['descripcion'].'" 
						class="btn btn-large btn-warning btn-bobmilanga" 
						href="#pure-opcion"
						>'.$guarnicion['descripcion'].'</a>';
				break;
			case 2:
			case 3:
				echo '<a
						data-id="'.$guarnicion['id'].'" 
						data-type="nosuma" 
						data-precio="'.$guarnicion['importe'].'" 
						data-desc="'.$guarnicion['descripcion'].'" 
						class="btn btn-large btn-warning btn-bobmilanga" 
						href="#pob-opcion"
						>'.$guarnicion['descripcion'].'</a>';
				break;
			case 5:
				echo '<a 
						data-id="'.$guarnicion['id'].'"
						data-type="nosuma" 
						data-precio="'.$guarnicion['importe'].'" 
						data-desc="'.$guarnicion['descripcion'].'" 
						class="btn btn-large btn-warning btn-bobmilanga" 
						href="#ensalada-opcion"
						>'.$guarnicion['descripcion'].'</a>';
				break;
			case 6:
				echo '<a 
						data-id="'.$guarnicion['id'].'"
						data-type="nosuma" 
						data-precio="'.$guarnicion['importe'].'" 
						data-desc="'.$guarnicion['descripcion'].'" 
						class="btn btn-large btn-warning btn-bobmilanga" 
						href="#empanada-opcion"
						>'.$guarnicion['descripcion'].'</a>';
				break;
			default:
				echo '<a 
						data-id="'.$guarnicion['id'].'"
						data-type="suma" 
						data-precio="'.$guarnicion['importe'].'" 
						data-desc="'.$guarnicion['descripcion'].'" 
						class="btn btn-large btn-warning btn-bobmilanga" 
						href="#guarnicion"
						>'.$guarnicion['descripcion'].'</a>';
				break;		
		}
	}
}


//sleep(3);
?>