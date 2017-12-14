<?php
include 'init.php';
if ($_SESSION['logueado']!='ok') { header('Location: index.php'); die; }
include 'header.php';
include 'menu.html';

/*
 *FUNCION paginado(numero_de_pagina,cantidad_de_entradas_por_pagina,filtro_where,filtro_order) 
 * 
 */
function paginado($pagina, $por_pagina, $where = "1=1", $order = 'id DESC') {
    $pagina = $pagina ? $pagina : 1;
    $pag = new Stdclass;
    $tabla = 'pagos';
    $desde = ($pagina-1) * $por_pagina;
    
    $contar = "SELECT COUNT(*) count FROM {$tabla} WHERE {$where}";
	$res = mysql_query($contar);
	$row = mysql_fetch_assoc($res);
    $total = $row['count'];
    $pag->total     = $total;
    $pag->paginas   = (int)ceil($total / $por_pagina);
    $pag->siguiente = ($pag->paginas > $pagina) ? $pagina+1 : false;
    $pag->anterior  = ($pagina > 1) ? $pagina-1 : false;
    $pag->actual    = $pagina;
    
    $sql = "SELECT * FROM {$tabla} WHERE {$where} ORDER BY {$order} LIMIT {$desde}, {$por_pagina}";
  	$res = mysql_query($sql);  
	while($row = mysql_fetch_assoc($res))
		$pag->resultados[] = $row;

    return $pag;
  }

$pagos = paginado($_GET['p'],10);

$sql = "SELECT payment_id, ROUND(SUM(net_received_amount),2) AS cash FROM pagos WHERE status = 'approved' AND date_approved <= DATE_SUB(NOW(),INTERVAL 2 WEEK)";
$res = mysql_query($sql);
$acobrar = mysql_fetch_assoc($res);

$sql2 = "SELECT payment_id FROM pagos WHERE status = 'approved' AND date_approved <= DATE_SUB(NOW(),INTERVAL 2 WEEK)";
$res2 = mysql_query($sql2);

while( $row = mysql_fetch_assoc($res2))
{
	$ids_acobrar[] = $row;
}
	
$sql3 = "SELECT * FROM config";
$res3 = mysql_query($sql3);
$config = mysql_fetch_assoc($res3);

?>
<div class="row-fluid content">
	<div class="row-fluid">
		<h3>Pagos</h3>
	</div>
	
	<div class="row-fluid">
		<label class="checkbox">
			<input id="switch" type="checkbox" <?php if ($config['mercadopago']) echo 'checked'?>> Habilitar Pagos On-Line
		</label>
	</div>
	
	<div class="row-fluid">
		<h4 class="pull-right">Disponible para cobrar $ <span id="cash"><?=(empty($acobrar['cash'])) ? '00.00' : $acobrar['cash'] ?></span></h4>
		<div class="clearfix"></div>
		<a href="#" id="modal-cobrar" class="btn btn-info pull-right <?=($acobrar['cash'] == 0) ? 'disabled': ''?>">Solicitar Cobro</a>
	</div>
	<div class="row-fluid">
		<table id="pagos" class="table table-stripped table-hover">
			<thead>
				<tr>
					<th colspan="3">Pago</th>
					<th colspan="5">Comprador</th>
					<th colspan="2">Montos</th>
					<th>Estado</th>
				</tr>
				<tr>
					<th>ID</th>
					<th>Creaci&oacute;n</th>
					<th>Aprobaci&oacute;n</th>
					<th>ID</th>
					<th>Nombre completo</th>
					<th>Tel&eacute;fono</th>
					<th>D.N.I</th>
					<th>Correo electr&oacute;nico</th>
					<th>Transacci&oacute;n</th>
					<th>Neto recibido</th>
					<th></th>
				</tr>				
				
			</thead>
			<tbody>
				<?php foreach ($pagos->resultados as $p) :?>
					<tr id="<?=$p['id']?>" data-reason="<?=$p['reason']?>">
						<td><?=$p['payment_id']?></td>
						<td><?=$p['date_created']?></td>
						<td><?=$p['date_approved']?></td>
						<td><?=$p['payer_id']?></td>
						<td><?=$p['payer_first_name']?> <?=$p['payer_last_name']?></td>
						<td><?=$p['payer_phone']?></td>
						<td><?=$p['payer_identification']?></td>
						<td><?=$p['payer_email']?></td>
						<td>$ <?=$p['transaction_amount']?></td>
						<td>$ <?=$p['net_received_amount']?></td>
						<td><?=$p['status']?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div class="row-fluid text-center">
		<div class="btn-toolbar">
			<div class="btn-group">
				<?php
				/*
				 * PAGINADOR
				 */
				
				if ($pagos->anterior) 
					echo '<a class="btn" href="?p='.$pagos->anterior.'"><i class="icon-chevron-left"></i></a>';
				
				for ($i=1; $i <= $pagos->paginas; $i++)
					if ($i == $pagos->actual)
						echo '<a class="btn btn-info" href="?p='.$i.'"><span>'.$i.'</span></a>';
					else
						echo '<a class="btn" href="?p='.$i.'"><span>'.$i.'</span></a>';
				
				if ($pagos->siguiente)
					echo '<a class="btn" href="?p='.$pagos->siguiente.'"><span><i class="icon-chevron-right"></i></span></a>';
				?>
			</div>
		</div>
	</div>
</div>


<div id="payment-detail" class="modal hide fade">
    <div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    	<h3>Detalle del pago <span id="payment-id"></span></h3>
    </div>
    <div class="modal-body">
    	<p id="payment-reason"></p>
    </div>
</div>

<div id="payment-cash" class="modal hide fade">
    <div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    	<h3>Solicitar cobro</h3>
    </div>
    <div class="modal-body">
    	<p>Dinero disponible para retirar $ <span id="payment-av-cash"></span></p>
    </div>
    <div class="modal-footer">
    	<form action="solicitar-cobro.php" method="POST">
    		<input type="hidden" name="total" value="">
    		<?php foreach ($ids_acobrar as $r) : ?>
    			<input type="hidden" name="ids[]" value="<?=$r['payment_id']?>">
    		<?php endforeach; ?>
    		<button type="submit" class="btn btn-default">COBRAR</button>
    	</form>
    </div>
    
</div>

<script>
	
	$(function(){
		
		$('tbody tr').click(function(){
			
			$('#payment-id').html($(this).attr('id')+'/'+$(this).find('td').first().html());
			$('#payment-reason').html($(this).data('reason'));
			
			$('#payment-detail').modal();
		});
		
		$('#modal-cobrar').click(function(e){
			
			e.preventDefault();
			
			if(!$(this).hasClass('disabled')){
				$('#payment-av-cash').html($('#cash').html());
				$('#payment-cash input[name="total"]').val($('#cash').html());
				$('#payment-cash').modal();	
			}
			
		});
		
		$('#switch').click(function(){
			
			$.post('actualizar_config.php',function(response){
				
				console.log(response);
				
			});
			
		});
		
		
	});
	
	
	
</script>
