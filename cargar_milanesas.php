<?php
	include 'cnx.php';

$sql = "SELECT * FROM stock_milanesas WHERE en_stock=1";
$res = mysql_query($sql);
$milanesas = array();
while($row = mysql_fetch_assoc($res)){
	$milanesas[] = $row;	
}

$sql = "SELECT * FROM precios_deliv_milas";
$res = mysql_query($sql);
$precios = array();
while($row = mysql_fetch_assoc($res)){
	$precios[] = $row;	
}

switch($_POST['promo'])
{
	case 2:
		foreach ($milanesas as $mila) {
			switch ($mila['id']){
				case 1:
				case 2:
				//case 3:	
					echo '<a 
							data-id="'.$mila['id'].'" 
							data-precio="0" 
							data-type="suma"
							data-promo="'.$_POST['promo'].'"  
							data-desc="'.$mila['nombre'].'" 
							class="btn btn-large btn-warning btn-bobmilanga" 
							href="'.$_POST['next'].'"
							>'.$mila['nombre'].'</a>';
					break;
			}
		}
		break;
	case 3:
		foreach ($milanesas as $mila) {
			switch ($mila['id']){
				case 1:
				case 2:
				//case 3:	
					echo '<a 
							data-id="'.$mila['id'].'" 
							data-precio="0" 
							data-type="suma"
							data-promo="'.$_POST['promo'].'"  
							data-desc="'.$mila['nombre'].'" 
							class="btn btn-large btn-warning btn-bobmilanga" 
							href="'.$_POST['next'].'"
							>'.$mila['nombre'].'</a>';
					break;
			}
		}
		break;
	default:
		foreach ($milanesas as $mila) {
			switch ($mila['id']){
				case 1:
				case 2:
				case 3:	
					echo '<a 
							data-id="'.$mila['id'].'" 
							data-precio="'.$precios[0]['media_nop'].'" 
							data-type="suma" 
							data-desc="'.$mila['nombre'].'" 
							class="btn btn-large btn-warning btn-bobmilanga" 
							href="#mediavariedad"
							>'.$mila['nombre'].'</a>';
					break;
				case 4:
					echo '<a 
							data-id="'.$mila['id'].'" 
							data-precio="'.$precios[0]['nalga'].'" 
							data-type="suma" 
							data-desc="'.$mila['nombre'].'" 
							class="btn btn-large btn-warning btn-bobmilanga" 
							href="#combinar"
							>'.$mila['nombre'].'</a>';
					break;
				case 5:
					echo '<a 
							data-id="'.$mila['id'].'" 
							data-precio="'.$precios[0]['pollo'].'" 
							data-type="suma" 
							data-desc="'.$mila['nombre'].'" 
							class="btn btn-large btn-warning btn-bobmilanga" 
							href="#combinar"
							>'.$mila['nombre'].'</a>';
					break;
				case 6:
					echo '<a 
							data-id="'.$mila['id'].'" 
							data-precio="'.$precios[0]['peceto'].'" 
							data-type="suma" 
							data-desc="'.$mila['nombre'].'" 
							class="btn btn-large btn-warning btn-bobmilanga" 
							href="#combinar"
							>'.$mila['nombre'].'</a>';
					break;
				case 7:
					echo '<a 
							data-id="'.$mila['id'].'" 
							data-precio="'.$precios[0]['merluza'].'" 
							data-type="suma" 
							data-desc="'.$mila['nombre'].'" 
							class="btn btn-large btn-warning btn-bobmilanga" 
							href="#combinar"
							>'.$mila['nombre'].'</a>';
					break;
				case 8:
					echo '<a 
							data-id="'.$mila['id'].'" 
							data-precio="'.$precios[0]['bob_milanga'].'" 
							data-type="suma" 
							data-desc="'.$mila['nombre'].'" 
							class="btn btn-large btn-warning btn-bobmilanga" 
							href="#combinar"
							>'.$mila['nombre'].'</a>';
					break;
				case 9:
					echo '<a 
							data-id="'.$mila['id'].'" 
							data-precio="'.$precios[0]['calabaza'].'" 
							data-type="suma" 
							data-desc="'.$mila['nombre'].'" 
							class="btn btn-large btn-warning btn-bobmilanga" 
							href="#unavariedad"
							>'.$mila['nombre'].'</a>';
						break;
			}
		}
		break;
}
		
//sleep(3);
?>