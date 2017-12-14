<?php
	include 'cnx.php';

$sql = "SELECT * FROM stock_variedades WHERE en_stock=1";
$res = mysql_query($sql);
$variedades = array();
while($row = mysql_fetch_assoc($res)){
	$variedades[] = $row;	
}

$sql = "SELECT * FROM precios_deliv_milas";
$res = mysql_query($sql);
$precios = array();
while($row = mysql_fetch_assoc($res)){
	$precios[] = $row;	
}


$milas = array('media_nop','media_nop','media_nop','nalga','pollo','peceto','merluza','bob_milanga','calabaza');
$milanesa = $_POST['milanesa']-1;
$milanesa = $milas[$milanesa];

if(isset($_POST['promo']))
{
	switch($_POST['promo']){
		
		case 1:
			foreach ($variedades as $variedad) {
				switch($variedad['id']){
					case 1:
					case 2:
						echo '<a 
								data-toggle="tooltip" 
								data-title="'.$variedad['descripcion'].'" 
								data-id="'.$variedad['id'].'" 
								data-precio="0" 
								data-type="suma"
								data-promo="'.$_POST['promo'].'" 
								data-desc="'.$variedad['nombre'].'" 
								class="btn btn-large btn-warning btn-bobmilanga" 
								href="'.$_POST['next'].'"
								>'.$variedad['nombre'].'</a>';
						break;
					case 3:
					case 4:
					case 5:
						echo '<a 
								data-toggle="tooltip" 
								data-title="'.$variedad['descripcion'].'" 
								data-id="'.$variedad['id'].'" 
								data-precio="0" 
								data-type="suma" 
								data-promo="'.$_POST['promo'].'"
								data-desc="'.$variedad['nombre'].'" 
								class="btn btn-large btn-warning btn-bobmilanga" 
								href="'.$_POST['next'].'"
								>'.$variedad['nombre'].'</a>';
						break;	
					case 6:
					case 7:
					case 8:
						echo '<a 
								data-toggle="tooltip" 
								data-title="'.$variedad['descripcion'].'" 
								data-id="'.$variedad['id'].'" 
								data-precio="0" 
								data-type="suma" 
								data-promo="'.$_POST['promo'].'"
								data-desc="'.$variedad['nombre'].'" 
								class="btn btn-large btn-warning btn-bobmilanga" 
								href="'.$_POST['next'].'"
								>'.$variedad['nombre'].'</a>';
						break;
					case 9:
					case 10:
					case 11:
						echo '<a 
								data-toggle="tooltip" 
								data-title="'.$variedad['descripcion'].'" 
								data-id="'.$variedad['id'].'" 
								data-precio="0" 
								data-type="suma" 
								data-promo="'.$_POST['promo'].'"
								data-desc="'.$variedad['nombre'].'" 
								class="btn btn-large btn-warning btn-bobmilanga" 
								href="'.$_POST['next'].'"
								>'.$variedad['nombre'].'</a>';
						break;
					case 12:
					case 13:
					case 14:
					case 15:
						echo '<a 
								data-toggle="tooltip" 
								data-title="'.$variedad['descripcion'].'" 
								data-id="'.$variedad['id'].'" 
								data-precio="0" 
								data-type="suma" 
								data-promo="'.$_POST['promo'].'"
								data-desc="'.$variedad['nombre'].'" 
								class="btn btn-large btn-warning btn-bobmilanga" 
								href="'.$_POST['next'].'"
								>'.$variedad['nombre'].'</a>';
						break;
					
				}					
			}	
			break;
		
		case 2:
			foreach ($variedades as $variedad) {
				switch($variedad['id']){
					case 1:
					case 2:
					case 3:
					case 4:
					case 5:
						echo '<a 
								data-toggle="tooltip" 
								data-title="'.$variedad['descripcion'].'" 
								data-id="'.$variedad['id'].'" 
								data-precio="0" 
								data-type="suma"
								data-promo="'.$_POST['promo'].'" 
								data-desc="'.$variedad['nombre'].'" 
								class="btn btn-large btn-warning btn-bobmilanga" 
								href="'.$_POST['next'].'"
								>'.$variedad['nombre'].'</a>';
						break;	
				}
			}
			break;
	}
}
else
{
	foreach ($variedades as $variedad) {
		switch($variedad['id']){
			case 1:
			case 2:
				echo '<a 
						data-toggle="tooltip" 
						data-title="'.$variedad['descripcion'].'" 
						data-id="'.$variedad['id'].'" 
						data-precio="'.$precios[1][$milanesa]/$_POST['cantVar'].'" 
						data-type="suma"
						data-promo="'.$_POST['promo'].'" 
						data-desc="'.$variedad['nombre'].'" 
						class="btn btn-large btn-warning btn-bobmilanga" 
						href="'.$_POST['next'].'"
						>'.$variedad['nombre'].'</a>';
				break;
			case 3:
			case 4:
			case 5:
				echo '<a 
						data-toggle="tooltip" 
						data-title="'.$variedad['descripcion'].'" 
						data-id="'.$variedad['id'].'" 
						data-precio="'.$precios[2][$milanesa]/$_POST['cantVar'].'" 
						data-type="suma" 
						data-promo="'.$_POST['promo'].'"
						data-desc="'.$variedad['nombre'].'" 
						class="btn btn-large btn-warning btn-bobmilanga" 
						href="'.$_POST['next'].'"
						>'.$variedad['nombre'].'</a>';
				break;	
			case 6:
			case 7:
			case 8:
				echo '<a 
						data-toggle="tooltip" 
						data-title="'.$variedad['descripcion'].'" 
						data-id="'.$variedad['id'].'" 
						data-precio="'.$precios[3][$milanesa]/$_POST['cantVar'].'" 
						data-type="suma" 
						data-promo="'.$_POST['promo'].'"
						data-desc="'.$variedad['nombre'].'" 
						class="btn btn-large btn-warning btn-bobmilanga" 
						href="'.$_POST['next'].'"
						>'.$variedad['nombre'].'</a>';
				break;
			case 9:
			case 10:
			case 11:
				echo '<a 
						data-toggle="tooltip" 
						data-title="'.$variedad['descripcion'].'" 
						data-id="'.$variedad['id'].'" 
						data-precio="'.$precios[4][$milanesa]/$_POST['cantVar'].'" 
						data-type="suma" 
						data-promo="'.$_POST['promo'].'"
						data-desc="'.$variedad['nombre'].'" 
						class="btn btn-large btn-warning btn-bobmilanga" 
						href="'.$_POST['next'].'"
						>'.$variedad['nombre'].'</a>';
				break;
			case 12:
			case 13:
			case 14:
			case 15:
				echo '<a 
						data-toggle="tooltip" 
						data-title="'.$variedad['descripcion'].'" 
						data-id="'.$variedad['id'].'" 
						data-precio="'.$precios[5][$milanesa]/$_POST['cantVar'].'" 
						data-type="suma" 
						data-promo="'.$_POST['promo'].'"
						data-desc="'.$variedad['nombre'].'" 
						class="btn btn-large btn-warning btn-bobmilanga" 
						href="'.$_POST['next'].'"
						>'.$variedad['nombre'].'</a>';
				break;
			
		}					
	}	
}

//sleep(3);
?>