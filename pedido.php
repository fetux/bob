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

$sql3 = "SELECT costo_delivery FROM config";
$res3 = mysql_query($sql3);
$config = mysql_fetch_assoc($res3);



include 'header.php';
?>

<style>


.pac-container {
  z-index: 99999;
}
</style>
<div id="cartel-cerrado" data-esmartes="<?= date("N") == 2 ? 'si' : 'no'?>">MARTES.<BR/>CERRADO</div>
<div id="loading"><img src="assets/img/ajax-loader2.gif" alt="Cargando... Espere por favor" /></div>

<div class="sm-content-margin hidden-xs"></div>
<div class="xs-content-margin"></div>

	<div class="container">

		<div class="row font-simplicity">
			<div class="col-xs-12" >
				<h4 class="text-center">Clickea en las distintas categorias para a&ntilde;adir items a tu pedido.</h4>
			</div>
		</div>

		<div class="row font-simplicity">
			<ul id="menu-pedido">
				<div class="col-sm-1 hidden-xs"> </div>

				<div class="col-xs-4 col-sm-2">
					<li><div class="circle-active"> </div><span>milanesas</span></li>
				</div>
				<div class="col-xs-4 col-sm-2">
					<li><div class="circle"> </div><span>sandwiches</span></li>
				</div>
				<div class="col-xs-4 col-sm-2">
					<li><div class="circle"> </div><span>guarniciones</span></li>
				</div>

				<div class="col-xs-2 visible-xs-block"> </div>

				<div class="col-xs-4 col-sm-2">
					<li><div class="circle"> </div><span>promociones</span></li>
				</div>
				<div class="col-xs-4 col-sm-2">
					<li><div class="circle"> </div><span>bebidas</span></li>
				</div>
				<div class="col-sm-1 hidden-xs"> </div>
				<div class="col-xs-2 visible-xs-block"> </div>
			</ul>
		</div><!--end row -->

		<div class="row font-simplicity">

			<div class="col-xs-12">
				<!-- MILANESAS -->
				<div class="tab-content">
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

			</div><!--end col -->

		</div><!-- end row -->

		<div class="row">

			<div class="col-xs-12 col-sm-6">

				<div class="row">

					<div class="col-xs-1"> </div>

					<div class="col-xs-10">

						<div id="mesa">
							<img class="img-responsive" src="assets/img/mesa_si.jpg" style="z-index:-999">
						</div>

						<div class="mesa-reservation-margin"></div>

					</div>

					<div class="col-xs-1"> </div>

				</div>





			</div><!--end col -->



			<div class="col-xs-12 col-sm-6">

				<div id="tabla-detalle">
					<h4 class="font-simplicity">Tus &iacute;tems seleccionados</h4>
					<table id="detalle" class="table table-hover table-condensed table-responsive">
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
					<div class="btn-group pull-right font-simplicity">
						<button id="resetear" class="btn btn-small btn-warning btn-bobmilanga">
							REINICIAR
						</button>
						<button id="finalizar" class="btn btn-small btn-warning btn-bobmilanga">
							FINALIZAR
						</button>
					</div>
				</div>

			</div><!--end col -->

		</div><!--end row -->

	</div><!--end container -->


<div id="address-modal" class="modal fade">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
  		<h2 class="text-center">Bob Milanga en casa!</h2>
      </div>
      <div class="modal-body  text-center">
        <div class="row">
          <div class="col-xs-12">
            <h4 class="text-center">Quiero que me env&iacute;en el pedido</h4>
              <h6><b>Env&iacute;o $ 20</b></h6>
          </div>
        </div>
          <div class="row">

            <form>
              <div id="locationField">
                <div class="col-xs-12 col-md-8">
                  <div class="form-group">
                    <label class="sr-only" for="dirCalleNum">Direcci&oacute;n</label>
                    <input class="form-control" id="dirCalleNum" placeholder="Calle y Numero. Ej: Formosa 180"
                         onFocus="geolocate()" type="text"></input>
                    <span id="help-geolocation" class="help-block"></span>
                  </div>
                </div>
              </div>

              <div class="col-xs-6 col-md-2">
                <div class="form-group">
                  <label class="sr-only" for="dirPiso">Piso</label>
                  <input class="form-control" id="dirPiso" placeholder="Piso" type="text"></input>
                </div>
              </div>

              <div class="col-xs-6 col-md-2">
                <div class="form-group">
                  <label class="sr-only" for="dirDepto">Depto</label>
                  <input class="form-control" id="dirDepto" placeholder="Depto" type="text"></input>
                </div>
              </div>
            </form>
          </div>
          <div class="row">
            <p id="address-message" style="display:none"> </p>
            <button id="address-continue" class="btn-bobmilanga btn btn-small btn-warning" style="display:none;margin-top:15px;"></button>
          </div>
    <hr />
    <div class="row">
      <div class="col-xs-12">
        <h4 div class="text-center">Prefiero pasarlo a buscar</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <span class="help-block">Seleccione la Sucursal</span>
        <div class="radio-inline">
          <label>
            <input type="radio" name="optionsLocal" id="optionsLocalAvellaneda" value="1">
            Avellaneda 2553
          </label>
        </div>
        <div class="radio-inline">
          <label>
            <input type="radio" name="optionsLocal" id="optionsLocalConst" value="2">
            Tejedor 707
          </label>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <button id="local-continue" class="btn-bobmilanga btn btn-small btn-warning" style="display:none;"></button>
      </div>
    </div>
  </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="ticket" class="modal-ticket modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
  		<!-- background css -->
      </div>
      <div class="modal-body  text-center">
        <h5 class="text-center">Bob Milanga Milanesería</h5>
		<h6 class="text-center">Orden de Pedido</h6>
		<h6 class="text-center">-----------------------------------------</h6>
		<button id="cancelar" class="btn-bobmilanga btn btn-small btn-warning">Volver</button>
		<button id="confirmar" class="btn-bobmilanga btn btn-small btn-warning">Confirmar pedido</button>
      </div>
      <div class="modal-footer">
      	<!-- background css -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="ticket-confirmar" class="modal-ticket modal fade">
  <div class="modal-dialog modal-sm"> <!-- -->
    <div class="modal-content">
      <div class="modal-header">
        <!-- background css  -->
      </div>
      <div class="modal-body  text-center">
        <h5 class="text-center">Bob Milanga Milanesería</h5>
		<h6 class="text-center">Completá tus datos</h6>
		<h6 class="text-center">-----------------------------------------</h6>

		<form id="form-pedido">
			<input class="form-control" placeholder="Nombre" type="text" id="nombre" name="nombre" required title="Complete con su nombre por favor." x-moz-errormessage="Complete con su nombre por favor.">
      <!--
            <p class="help-block"><b>Zona Reparto:</b> Av. J.B Justo - Av. Jara - Av. Libertad - Av. P.P Ramos</p>
			<div class="checkbox"><label><input type="checkbox" id="envio" name="envio"> Enviarmelo a mi dirección</label></div>
			<div id="costo_delivery" style="display: none">Costo de envio: $ <span><?=$config['costo_delivery']?></span></div>
			<label disabled for="comentarios">Dirección de envío:</label>
			<div class="row">
				<div class="col-xs-8">
					<input disabled class="form-control" placeholder="Calle" type="text" id="dir_calle" name="dir_calle" title="Necesitamos una direción a donde enviar el pedido." x-moz-errormessage="Necesitamos una direción a donde enviar el pedido.">
				</div>
				<div class="col-xs-4">
					<input disabled class="form-control" placeholder="N°" type="text" id="dir_numero" name="dir_numero" title="Necesitamos una direción a donde enviar el pedido." x-moz-errormessage="Necesitamos una direción a donde enviar el pedido.">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<input disabled class="form-control" placeholder="Piso" type="text" id="dir_piso" name="dir_piso" >
				</div>
				<div class="col-xs-6">
					<input disabled class="form-control" placeholder="Depto" type="text" id="dir_depto" name="dir_depto" >
				</div>
			</div>
    -->
			<br />
			<input class="form-control" placeholder="Teléfono" type="number" id="tel" name="tel" required title="El teléfono es necesario si necesitamos confirmar el pedido." x-moz-errormessage="El teléfono es necesario si necesitamos confirmar el pedido.">
			<input class="form-control" placeholder="Correo electronico" type="email" id="mail" name="mail" required title="Por favor ingrese una dirección de correo electrónico." x-moz-errormessage="Por favor ingrese una dirección de correo electrónico.">
			<!--Input oculto para enviar el detalle del pedido -->
			<label for="comentarios">Comentarios:</label>
			<textarea class="form-control" id="comentarios" name="comentarios" rows="4"></textarea>
			<input type="hidden" id="detalle-pedido" name="pedido">
			<button id="confirmar2" class="btn btn-small btn-warning btn-bobmilanga">Confirmar</button>
		</form>

      </div>
      <div class="modal-footer">
        <!-- background css -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="ticket-resultado" class="modal-ticket modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <!-- background css -->
      </div>
      <div class="modal-body text-center">
        <button class="btn btn-small btn-warning btn-bobmilanga" id="gracias">Gracias</button>

        <?php
        	$sql2 = "SELECT mercadopago FROM config WHERE id=1";
			$res2 = mysql_query($sql2);
			$row = mysql_fetch_assoc($res2);
        	if ($row['mercadopago'] == 1) : ?>
        		<button class="btn btn-small btn-warning btn-bobmilanga" id="pagar-ahora"> Pago con tarjeta</button>
        	<?php endif; ?>
      </div>
      <div class="modal-footer">
        <!-- background css -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="ticket-payment" class="modal-ticket modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- background css -->
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <!-- background css -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div id="itemAgregado" class="modal-ticket modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> <!--hice un cambio!! -->
      <div class="modal-header">

      </div>
      <div class="modal-body text-center">
        <h4>Ítem agregado con éxito!</h4>
		<a id="continuar" class="btn btn-small btn-warning btn-bobmilanga">Continuar con el pedido</a>
      </div>
      <div class="modal-footer">

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="condicionPago" class="modal-ticket modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content"> <!--hice un cambio!! -->
      <div class="modal-header">

      </div>
      <div class="modal-body text-center">
        <h4>Deberá presentar la tarjeta utilizada para hacer la compra junto con el documento del titular al momento de recibir el pedido, de lo contrario el pedido no podrá ser entregado. Muchas gracias.</h4>
		<a id="continuarCondicionPago" class="btn btn-small btn-warning btn-bobmilanga" data-url="">Continuar</a>
      </div>
      <div class="modal-footer">

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<?php
include 'footer.php';
?>