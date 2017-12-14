<?php
include 'cnx.php';

$sql = "SELECT * FROM precios_deliv_milas";
$res = mysql_query($sql);
$precios = array();
while ($row = mysql_fetch_assoc($res)) {
	$precios[] = $row;
}

$sql = "SELECT * FROM precios_deliv_prod WHERE en_stock=1";
$res = mysql_query($sql);
$guarniciones = array();
$sandwiches = array();
$bebidas = array();
$promos = array();
$agregados = array();
while ($row = mysql_fetch_assoc($res)) {
	switch ($row["id_categoria"]) {
		case '1' :
			$guarniciones[] = $row;
			break;
		case '2' :
			$sandwiches[] = $row;
			break;
		case '3' :
			$bebidas[] = $row;
			break;
		case '4' :
			$promos[] = $row;
			break;
		case '5' :
			$agregados[] = $row;
			break;
		default :
			break;
	}
}

include 'header.html';
?>
<div id="cartel-cerrado">MARTES<br />CERRADO</div>
<div id="loading"><img src="assets/img/ajax-loader2.gif" alt="Cargadno... Espere por favor" /></div>
<div class="content">
	<div class="row-fluid text-center">
		<h4>Clickea en las distintas categorias para a&ntilde;adir items a tu pedido.</h4>
	</div>
	<div class="row-fluid">
		<ul id="menu-pedido">
			<li class="span1"></li>
			<li class="span2">
				<div class="circle-active"></div><span>milanesas</span>
			</li>
			<li class="span2">
				<div class="circle"></div><span>sandwiches</span>
			</li>
			<li class="span2">
				<div class="circle"></div><span>guarniciones</span>
			</li>
			<li class="span2">
				<div class="circle"></div><span>promociones</span>
			</li>
			<li class="span2">
				<div class="circle"></div><span>bebidas</span>
			</li>
			<li class="span1"></li>
		</ul>
	</div>
	<!-- MILANESAS -->
	<div class="row-fluid tab-content">
		<div class="tab-pane active" id="milanesa" data-selected="">
			<h3>Qu&eacute; milanesa quer&eacute;s?</h3>
			<div class="text-center">
				<!-- AQUÍ SE CARGAN DINAMICAMENTE LAS MILANESAS -->
			</div>
		</div>
		<div class="tab-pane" id="combinar">
			<h3>Queres combinar variedades?</h3>
			<div class="text-center">
				<a data-type="nosuma" class="btn btn-large btn-warning btn-bobmilanga" href="#primeravar">SI</a>
				<a data-type="nosuma" class="btn btn-large btn-warning btn-bobmilanga" href="#unavariedad">NO</a>
			</div>
		</div>
		<div class="tab-pane" id="primeravar">
			<h3>Eleg&iacute; la primer variedad</h3>
			<div class="text-center">
				<a data-type="nosuma" class="btn btn-large btn-warning btn-bobmilanga" href="#segundavar">Sola</a>
				<!-- AQUÍ SE CARGAN DINAMICAMENTE LAS DEMAS VARIEDADES DEPENDIENDO DE LA MILANESA ELEJIDA -->
			</div>
		</div>
		<div class="tab-pane" id="segundavar">
			<h3>Ahora la segunda...</h3>
			<div class="text-center">
				<a data-type="nosuma" class="btn btn-large btn-warning btn-bobmilanga" href="#milanesa">Sola</a>
				<!-- AQUÍ SE CARGAN DINAMICAMENTE LAS DEMAS VARIEDADES DEPENDIENDO DE LA MILANESA ELEJIDA -->
			</div>
		</div>
		<div class="tab-pane" id="unavariedad">
			<h3>Eleg&iacute; la variedad</h3>
			<div class="text-center">
				<a data-type="nosuma" class="btn btn-large btn-warning btn-bobmilanga" href="#milanesa">Sola</a>
				<!-- AQUÍ SE CARGAN DINAMICAMENTE LAS DEMAS VARIEDADES DEPENDIENDO DE LA MILANESA ELEJIDA -->
			</div>
		</div>
		<div class="tab-pane" id="mediavariedad">
			<h3>Eleg&iacute; la variedad</h3>
			<div class="text-center">
				<a data-type="nosuma" class="btn btn-large btn-warning btn-bobmilanga" href="#milanesa">Sola</a>
				<!-- AQUÍ SE CARGAN DINAMICAMENTE LAS DEMAS VARIEDADES DEPENDIENDO DE LA MILANESA ELEJIDA -->
			</div>
		</div>

		<!-- FIN MILANESAS -->

		<!-- SANDWICHES -->
		<!--<div class="row-fluid content-sandwiches hide">-->

		<div class="tab-pane" id="sandwich">
			<h3>¿Qu&eacute; preferis?</h3>
			<div class="text-center">
				<?php
				foreach ($sandwiches as $sandwich) {
					echo '<a data-type="suma" data-precio="' . $sandwich['importe'] . '" data-desc="' . $sandwich['descripcion'] . '" class="btn btn-large btn-warning btn-bobmilanga" href="#agregados">' . $sandwich['descripcion'] . '</a>';
				}
				?>
			</div>
		</div>
		<div class="tab-pane" id="agregados">
			<h3>¿Qu&eacute; le agregas?</h3>
			<div class="text-center">
				<label class="checkbox inline">
					<input type="checkbox" id="cb1" data-precio="<?= $agregados[0]['importe'] ?>" value="Lechuga">
					Lechuga </label>
				<label class="checkbox inline">
					<input type="checkbox" id="cb2" data-precio="<?= $agregados[0]['importe'] ?>" value="Tomate">
					Tomate </label>
				<label class="checkbox inline">
					<input type="checkbox" id="cb3" data-precio="<?= $agregados[0]['importe'] ?>" value="Huevo">
					Huevo </label>
				<label class="checkbox inline">
					<input type="checkbox" id="cb4" data-precio="<?= $agregados[1]['importe'] ?>" value="Jamón">
					Jamón </label>
				<label class="checkbox inline">
					<input type="checkbox" id="cb4" data-precio="<?= $agregados[1]['importe'] ?>" value="Queso">
					Queso </label>
				<label class="checkbox inline">
					<input type="checkbox" id="cb5" data-precio="<?= $agregados[1]['importe'] ?>" value="Panceta">
					Panceta </label>
				<a data-precio="0" data-type="nosuma" data-desc=" " id="finAgregados" class="btn btn-medium btn-warning btn-bobmilanga" href="#sandwich">CONTINUAR</a>
			</div>
		</div>
		<!--</div>-->

		<!-- FIN SANDWICHES -->
		<!-- GUARNICIONES -->

		<div class="tab-pane" id="guarnicion">
			<a href="#guarnicion"></a>
			<h3>¿Con qu&eacute; lo acompa&ntilde;as?</h3>
			<div class="text-center">

				<!-- AQUÍ SE CARGAN DINÁMICAMENTE LAS GUARNICIONES -->

			</div>
		</div>
		<!-- AQUÍ SE CARGAN DINAMICAMENTE LAS OPCIONES DE LAS GUARNICIONES -->

		<!-- FIN GUARNICIONES -->

		<!-- PROMOCIONES -->
		<!--<div class="row-fluid content-promociones hide">-->

		<div class="tab-pane" id="promocion">
			<h3>Aprovecha estas promos!</h3>
			<div class="text-center">
				<a href="#promocion"></a>

				<?php
				foreach ($promos as $promo) {
					switch($promo[id]) {
						case 12 :
							echo '<a data-promo="1" data-precio="' . $promo['importe'] . '" data-type="suma" data-desc="' . $promo['descripcion'] . '" class="btn btn-large btn-warning btn-bobmilanga" href="#primeravar">' . $promo['descripcion'] . '</a>';
							break;
						case 13 :
							echo '<a data-promo="2" data-precio="' . $promo['importe'] . '" data-type="suma" data-desc="' . $promo['descripcion'] . '" class="btn btn-large btn-warning btn-bobmilanga" href="#milanesa">' . $promo['descripcion'] . '</a>';
							break;
						case 14 :
							echo '<a data-promo="3" data-precio="' . $promo['importe'] . '" data-type="suma" data-desc="' . $promo['descripcion'] . '" class="btn btn-large btn-warning btn-bobmilanga" href="#milanesa">' . $promo['descripcion'] . '</a>';
							break;
					}
				}
				?>

				<!--
				<a class="btn btn-large btn-bobmilanga" href="#promocion">Promo 1 Delivery (4 pers.) - milanesa Bob Milanga - variedad a elección + 2 guarniciones + cerveza Quilmes o gaseosa.</a>
				<a class="btn btn-large btn-bobmilanga" href="#milanesa">Promo 2 Delivery (1 pers.) - variedad de 1 a 6 + guarnición</a>
				<a class="btn btn-large btn-bobmilanga" href="#milanesa">Promo 3 Delivery (1 pers.) 1/2 nalga o pollo + guarnición</a>
				-->
			</div>
		</div>
		<!--</div>-->

		<!-- FIN PROMOCIONES -->
		<!-- BEBIDAS -->

		<div class="tab-pane" id="bebida">
			<h3>¿Y para tomar?</h3>
			<a href="#bebida"></a>
			<div class="text-center">
				<!-- AQUI SE CARGAN DINÁMICMENTE LAS BEBIDAS -->
			</div>
		</div>

		<!-- FIN BEBIDAS -->
	</div>

	<div class="row-fluid">

		<div id="mesa" class="span6 pull-left">
			
				<img src="assets/img/mesa_si.jpg" style="z-index:-99999" width="400" >
			
		</div>

		<div id="tabla-detalle" class="span6 pull-right">
			<h4>Tus &iacute;tems seleccionados:</h4s>
			<table id="detalle" class="table table-hover table-condensed">
				<thead>
					<tr>
						<th>#</th>
						<th>item</th>
						<th>valor</th>
						<th>total</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
			<div class="btn-group pull-right">
				<button id="resetear" class="btn btn-small btn-warning btn-bobmilanga">
					REINICIAR
				</button>
				<button id="finalizar" class="btn btn-small btn-warning btn-bobmilanga">
					FINALIZAR
				</button>
			</div>
		</div>
	</div>

</div><!-- FIN CONTENT -->

<div id="ticket" class="modal-ticket modal hide fade">

	<div class="modal-header">
		<!--<a type="a" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>-->
	</div>
	<div class="modal-body">
		<h5 class="text-center">Bob Milanga Milanesería</h5>
		<h6 class="text-center">Orden de Pedido</h6>
		<h6 class="text-center">-----------------------------------------</h6>
		<button id="cancelar" class="btn-bobmilanga btn btn-small btn-warning">
			Volver
		</button>
		<button id="confirmar" class="btn-bobmilanga btn btn-small btn-warning">
			Confirmar pedido
		</button>
		</span>
	</div>
	<div class="modal-footer">

	</div>
</div>

<div id="ticket-confirmar" class="modal-ticket modal hide fade">

	<div class="modal-header">
		<!--<a type="a" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>-->
	</div>
	<div class="modal-body">
		<h5 class="text-center">Bob Milanga Milanesería</h5>
		<h6 class="text-center">Completá tus datos</h6>
		<h6 class="text-center">-----------------------------------------</h6>

		<form id="form-pedido">
			<div class="control-group">
				<div class="controls">
					<input class="input-block-level" placeholder="Nombre" type="text" id="nombre" name="nombre" required title="Complete con su nombre por favor." x-moz-errormessage="Complete con su nombre por favor.">
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<input class="input-block-level" placeholder="Dirección" type="text" id="dir" name="dir" required title="Necesitamos una direción a donde enviar el pedido." x-moz-errormessage="Necesitamos una direción a donde enviar el pedido.">
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<input class="input-block-level" placeholder="Teléfono" type="number" id="tel" name="tel" required title="El teléfono es necesario si necesitamos confirmar el pedido." x-moz-errormessage="El teléfono es necesario si necesitamos confirmar el pedido.">
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<input class="input-block-level" placeholder="Correo electronico" type="email" id="mail" name="mail" required title="Por favor ingrese una dirección de correo electrónico." x-moz-errormessage="Por favor ingrese una dirección de correo electrónico.">
				</div>
			</div>

			<!--Input oculto para enviar el detalle del pedido -->
			<input type="hidden" id="detalle-pedido" name="pedido">

			<div class="control-group">
				<div class="controls text-center">
					<button id="confirmar2" class="btn btn-small btn-warning btn-bobmilanga">
						Confirmar
					</button>
				</div>
			</div>

		</form>
	</div>
	<div class="modal-footer">

	</div>
</div>

<div id="ticket-resultado" class="modal-ticket modal hide fade">

	<div class="modal-header">
		<!--<a type="a" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>-->
	</div>
	<div class="modal-body text-center">
		<button class="btn btn-small btn-warning btn-bobmilanga" id="gracias">
			Gracias!
		</button>
	</div>
	<div class="modal-footer">

	</div>
</div>

<div id="itemAgregado" class="modal-ticket modal hide fade">

	<div class="modal-header">
		<!--<a type="a" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>-->
	</div>
	<div class="modal-body text-center">
		<h4>Ítem agregado con éxito!</h4>
		<a id="continuar" class="btn btn-small btn-warning btn-bobmilanga">Continuar con el pedido</a>
	</div>
	<div class="modal-footer">

	</div>
</div>

<?php
include 'footer.html';
?>