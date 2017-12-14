<?php
include_once 'cnx.php';

$sql = "SELECT * FROM precios_salon_milas";
$res = mysql_query($sql);
$milas = array();
while($row = mysql_fetch_assoc($res))
	$milas[] = $row;

$sql = "SELECT * FROM precios_salon_prod";
$res = mysql_query($sql);
$degustar = array();
$guarniciones = array();
$ensaladas = array();
$carnes = array();
$sandwiches = array();
$postres = array();
$bebidas = array();
$cervezas = array();
while($row = mysql_fetch_assoc($res)){
	switch($row['id_categoria']){
		case '1':
			$degustar[]=$row;
			break;
		case '3':
			$guarniciones[]=$row;
			break;
		case '4':
			$ensaladas[]=$row;
			break;
		case '5':
			$carnes[]=$row;
			break;
		case '6':
			$sandwiches[]=$row;
			break;
		case '7':
			$postres[]=$row;
			break;
		case '8':
			$bebidas[]=$row;
			break;
		case '9':
			$cervezas[]=$row;
			break;
	}
}

?>

<div id='magazine'>
	<div class="pag1">
		<img src="assets/img/pasalapagina.png" id="pasalapagina" />	
	</div>
	
	<div class="pag2"><!--POSEE EL FONDO UNICAMENTE--></div>	
	<div class="pag3"><!--POSEE EL FONDO UNICAMENTE--></div>
	
	<div class="pag4">
		<table id="degustar">
			<tbody>
				<?php 
					$i=0;
					foreach ($degustar as $row) {
						echo '<tr class="row'.++$i.'">';
						echo 	'<td class="col1">'.$row['importe'].'</td>';
						echo '</tr>';
					}
				?>
				<!--
				<tr class="row1">
					<td class="col1">1</td>
				</tr>
				<tr class="row2">
					<td class="col1">1</td>
				</tr>	
				<tr class="row3">
					<td class="col1">1</td>
				</tr>
				<tr class="row4" >
					<td class="col1">1</td>
				</tr>
				<tr class="row5">
					<td class="col1">1</td>
				</tr>
				<tr class="row6">
					<td class="col1">1</td>
				</tr>
				<tr class="row7">
					<td class="col1">1</td>
				</tr>
				<tr class="row8">
					<td class="col1">1</td>
				</tr>
				<tr class="row9">
					<td class="col1">1</td>
				</tr>
				<tr class="row10">
					<td class="col1">1</td>
				</tr>
				-->
			</tbody>			
		</table>
	</div>
	
	<div class="pag5"><!--POSEE EL FONDO UNICAMENTE--></div>
	
	<div class="pag6">
		<table id="guarniciones">
				<tbody>
					<?php 
						$i=0;
						foreach ($guarniciones as $row) {
							echo '<tr class="row'.++$i.'">';
							echo 	'<td class="col1">'.$row['importe'].'</td>';
							echo '</tr>';
						}
					?>
					<!--
					<tr class="row1">
						<td class="col1">1</td>
					</tr>
					<tr class="row2">
						<td class="col1">1</td>						
					</tr>	
					<tr class="row3">
						<td class="col1">1</td>
					</tr>
					<tr class="row4">
						<td class="col1">1</td>
					</tr>
					<tr class="row5">
						<td class="col1">1</td>
					</tr>
					-->
				</tbody>
		</table>
	</div>
	
	<div class="pag7">
		<table id="milanesas">
			<tbody>
				<?php
				
					function escribeFila(&$num,$veces,$row){
						for ($i=0; $i < $veces; $i++) { 
							echo '<tr class="row'.++$num.'">';
							echo 	'<td class="col1">'.$row['media_nop'].'</td>';
							echo 	'<td class="col2">'.$row['nalga'].'</td>';
							echo 	'<td class="col3">'.$row['pollo'].'</td>';
							echo 	'<td class="col4">'.$row['peceto'].'</td>';
							echo 	'<td class="col5">'.$row['merluza'].'</td>';
							echo 	'<td class="col6">'.$row['bob_milanga'].'</td>';
							echo 	'<td class="col7">'.$row['calabaza'].'</td>';
							echo '</tr>';
						}
					}
					$i=0;$num=0;
					foreach ($milas as $row) {
						//var_dump($row);
						switch ($i++){
							case '0':
								escribeFila($num,1,$row);
								break;
							case '1':
								escribeFila($num,2,$row);
								break;
							case '2':
								escribeFila($num,3,$row);
								break;
							case '3':
								escribeFila($num,3,$row);
								break;
							case '4':
								escribeFila($num,3,$row);
								break;
							case '5':
								escribeFila($num,4,$row);
								break;
						}
						
						
					}
				?>
				<!--
				<tr class="row1">
					<td class="col1">1</td><td class="col2">1</td><td class="col3">1</td><td class="col4">1</td><td class="col5">1</td><td class="col6">1</td><td class="col7">1</td>
				</tr>
				<tr class="row2">
					<td class="col1">1</td><td class="col2">1</td><td class="col3">1</td><td class="col4">1</td><td class="col5">1</td><td class="col6">1</td><td class="col7">1</td>
				</tr>
				<tr class="row3">
					<td class="col1">1</td><td class="col2">1</td><td class="col3">1</td><td class="col4">1</td><td class="col5">1</td><td class="col6">1</td><td class="col7">1</td>
				</tr>
				<tr class="row4">
					<td class="col1">1</td><td class="col2">1</td><td class="col3">1</td><td class="col4">1</td><td class="col5">1</td><td class="col6">1</td><td class="col7">1</td>
				</tr>
				<tr class="row5">
					<td class="col1">1</td><td class="col2">1</td><td class="col3">1</td><td class="col4">1</td><td class="col5">1</td><td class="col6">1</td><td class="col7">1</td>
				</tr>
				<tr class="row6">
					<td class="col1">1</td><td class="col2">1</td><td class="col3">1</td><td class="col4">1</td><td class="col5">1</td><td class="col6">1</td><td class="col7">1</td>
				</tr>
				<tr class="row7">
					<td class="col1">1</td><td class="col2">1</td><td class="col3">1</td><td class="col4">1</td><td class="col5">1</td><td class="col6">1</td><td class="col7">1</td>
				</tr>
				<tr class="row8">
					<td class="col1">1</td><td class="col2">1</td><td class="col3">1</td><td class="col4">1</td><td class="col5">1</td><td class="col6">1</td><td class="col7">1</td>
				</tr>
				<tr class="row9">
					<td class="col1">1</td><td class="col2">1</td><td class="col3">1</td><td class="col4">1</td><td class="col5">1</td><td class="col6">1</td><td class="col7">1</td>
				</tr>
				<tr class="row10">
					<td class="col1">1</td><td class="col2">1</td><td class="col3">1</td><td class="col4">1</td><td class="col5">1</td><td class="col6">1</td><td class="col7">1</td>
				</tr>
				<tr class="row11">
					<td class="col1">1</td><td class="col2">1</td><td class="col3">1</td><td class="col4">1</td><td class="col5">1</td><td class="col6">1</td><td class="col7">1</td>
				</tr>
				<tr class="row12">
					<td class="col1">1</td><td class="col2">1</td><td class="col3">1</td><td class="col4">1</td><td class="col5">1</td><td class="col6">1</td><td class="col7">1</td>
				</tr>
				<tr class="row13">
					<td class="col1">1</td><td class="col2">1</td><td class="col3">1</td><td class="col4">1</td><td class="col5">1</td><td class="col6">1</td><td class="col7">1</td>
				</tr>
				<tr class="row14">
					<td class="col1">1</td><td class="col2">1</td><td class="col3">1</td><td class="col4">1</td><td class="col5">1</td><td class="col6">1</td><td class="col7">1</td>
				</tr>
				<tr class="row15">
					<td class="col1">1</td><td class="col2">1</td><td class="col3">1</td><td class="col4">1</td><td class="col5">1</td><td class="col6">1</td><td class="col7">1</td>
				</tr>
				<trclass="row16">
					<td class="col1">1</td><td class="col2">1</td><td class="col3">1</td><td class="col4">1</td><td class="col5">1</td><td class="col6">1</td><td class="col7">1</td>
				</tr>
				-->
			</tbody>
		</table>
			
		<table id="ensaladas">
			<tbody>
				<?php 
					$i=0;
					foreach ($ensaladas as $row) {
						echo '<tr class="row'.++$i.'">';
						echo 	'<td class="col1">'.$row['importe'].'</td>';
						echo '</tr>';
					}
				?>
				<!--
				<tr class="row1">
					<td class="col1">1</td>
				</tr>
				<tr class="row2">
					<td class="col1">1</td>
				</tr>
				<tr class="row3">
					<td class="col1">1</td>
				</tr>
				<tr class="row4">
					<td class="col1">1</td>
				</tr>
				<tr class="row5">
					<td class="col1">1</td>
				</tr>
				-->	
			</tbody>	
		</table>
	</div>
	
	<div class="pag8">
		<table id="carnes">
			<tbody>
				<?php 
					$i=0;
					foreach ($carnes as $row) {
						echo '<tr class="row'.++$i.'">';
						echo 	'<td class="col1">'.$row['importe'].'</td>';
						echo '</tr>';
					}
				?>
				<!--
				<tr class="row1">
					<td class="col1">1</td>
				</tr>
				<tr class="row2">
					<td class="col1">1</td>
				</tr>
				<tr class="row3">
					<td class="col1">1</td>
				</tr>
				-->
			</tbody>
		</table>
		
		<table id="sandwiches">
			<tbody>
				<?php 
					$i=0;
					foreach ($sandwiches as $row) {
						echo '<tr class="row'.++$i.'">';
						echo 	'<td class="col1">'.$row['importe'].'</td>';
						echo '</tr>';
					}
				?>
				<!--
				<tr class="row1">
					<td class="col1">1</td>
				</tr>
				<tr class="row2">
					<td class="col1">1</td>
				</tr>
				<tr class="row3">
					<td class="col1">1</td>
				</tr>
				<tr class="row4">
					<td class="col1">1</td>
				</tr>
				-->
			</tbody>
		</table>
		
		<table id="postres">
			<tbody>
				<?php 
					$i=0;
					foreach ($postres as $row) {
						echo '<tr class="row'.++$i.'">';
						echo 	'<td class="col1">'.$row['importe'].'</td>';
						echo '</tr>';
					}
				?>
				<!--
				<tr class="row1">
					<td class="col1">1</td>
				</tr>
				<tr class="row2">
					<td class="col1">1</td>
				</tr>
				<tr class="row3">
					<td class="col1">1</td>
				</tr>
				<tr class="row4">
					<td class="col1">1</td>
				</tr>
				<tr class="row5">
					<td class="col1">1</td>
				</tr>
				<tr class="row6">
					<td class="col1">1</td>
				</tr>
				<tr class="row7">
					<td class="col1">1</td>
				</tr>
				<tr class="row8">
					<td class="col1">1</td>
				</tr>
				-->
			</tbody>
		</table>
	</div>
	
	<div class="pag9"><!--POSEE EL FONDO UNICAMENTE--></div>
	<div class="pag10" >
		<table id="bebidas">
			<tbody>
				<?php 
					
					for ($i=0,$row=0; $i < count($bebidas); $i++) { 
						echo '<tr class="row'.++$row.'">';
						echo 	'<td class="col1">'.$bebidas[$i]['importe'].'</td>';
						if ($row == 2 || $row == 7 || $row == 11){
							$i++;
							echo '<td class="col2">'.$bebidas[$i]['importe'].'</td>';
							}
						echo '</tr>';
					}
					
				?>
				<!--
				<tr class="row1">
					<td class="col1">1</td>
				</tr>
				<tr class="row2">
					<td class="col1">1</td><td class="col2">1</td>
				</tr>
				<tr class="row3">
					<td class="col1">1</td>
				</tr>
				<tr class="row4">
					<td class="col1">1</td>
				</tr>
				<tr class="row5">
					<td class="col1">1</td>
				</tr>
				<tr class="row6">
					<td class="col1">1</td>
				</tr>
				<tr class="row7">
					<td class="col1">1</td><td class="col2">1</td>
				</tr>
				<tr class="row8">
					<td class="col1">1</td>
				</tr>
				<tr class="row9">
					<td class="col1">1</td>
				</tr>
				<tr class="row10">
					<td class="col1">1</td>
				</tr>
				<tr class="row11">
					<td class="col1">1</td><td class="col2">1</td>
				</tr>
				<tr class="row12">
					<td class="col1">1</td>
				</tr>
				<tr class="row13">
					<td class="col1">1</td>
				</tr>
				<tr class="row14">
					<td class="col1">1</td>
				</tr>
				<tr class="row15">
					<td class="col1">1</td>
				</tr>
				<tr class="row16">
					<td class="col1">1</td>
				</tr>
				<tr class="row17">
					<td class="col1">1</td>
				</tr>
				<tr class="row18">
					<td class="col1">1</td>
				</tr>
				-->
			</tbody>
		</table>
	</div>
	
	<div class="pag11" >
		<table id="cervezas">
			<tbody>
				<?php 
					$i=0;
					foreach ($cervezas as $row) {
						echo '<tr class="row'.++$i.'">';
						echo 	'<td class="col1">'.$row['importe'].'</td>';
						echo '</tr>';
					}
				?>
				<!--
				<tr class="row1">
					<td class="col1">1</td>
				</tr>
				<tr class="row2">
					<td class="col1">1</td>
				</tr>
				<tr class="row3">
					<td class="col1">1</td>
				</tr>
				<tr class="row4">
					<td class="col1">1</td>
				</tr>
				<tr class="row5">
					<td class="col1">1</td>
				</tr>
				<tr class="row6">
					<td class="col1">1</td>
				</tr>
				-->
			</tbody>
		</table>
	</div>
	
	<div class="pag12"><!--POSEE EL FONDO UNICAMENTE--></div>
	
</div>

<script>
	$('#magazine').turn({gradients: true, acceleration: true});
</script>