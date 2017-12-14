<?php
include 'init.php';
if ($_SESSION['logueado']!='ok') { header('Location: index.php'); die; }
include 'header.php';
include 'menu.html';


$sql = "SELECT * FROM precios_deliv_milas";
$res = mysql_query($sql);
$precios = array();
while($row = mysql_fetch_assoc($res)){
	$precios[] = $row;
}

$sql = "SELECT * FROM stock_milanesas";
$res = mysql_query($sql);
$milas = array();
while($row = mysql_fetch_assoc($res)){
	$milas[] = $row;
}

$sql = "SELECT * FROM stock_variedades";
$res = mysql_query($sql);
$variedades = array();
while($row = mysql_fetch_assoc($res)){
	$variedades[] = $row;
}

?>
<div class="row-fluid content">
	<div class="row-fluid">
		<h3>Milanesas</h3>
		<h4>Precios Milanesas por variedades</h4>
	</div>
	<div class="row-fluid">
		<table id="precios" class="table table-stripped table-hover">
			<thead>
				<th>Variedades</th>
				<th>1/2 Pollo-Nalga</th>
				<th>Nalga</th>
				<th>Pollo</th>
				<th>Peceto</th>
				<th>Merluza</th>
				<th>Bob Milanga</th>
				<th>Calabaza</th>
			</thead>
			<tbody>
				<?php foreach ($precios as $row) :?>
					<tr id="<?=$row['id']?>">
						<td><?=$row['descripcion']?></td>
						<td><?=$row['media_nop']?></td>
						<td><?=$row['nalga']?></td>
						<td><?=$row['pollo']?></td>
						<td><?=$row['peceto']?></td>
						<td><?=$row['merluza']?></td>
						<td><?=$row['bob_milanga']?></td>
						<td><?=$row['calabaza']?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div class="row-fluid">
		<h4>Stock Milanesas</h4>
	</div>
	<div class="row-fluid">
		<table id="stock-mila" class="table table-stripped tale-hover">
			<thead>
				<th>Milanesa</th>
				<th>¿Hay stock?</th>
			</thead>
			<tbody>
				<?php foreach ($milas as $row) :?>
					<tr id="<?=$row['id']?>">
						<td><?=$row['nombre']?></td>
						<td><input type="checkbox" <?php if ($row['en_stock']) echo 'checked'?>></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div class="row-fluid">
		<h4>Stock Variedades</h4>
	</div>
	<div class="row-fluid">
		<table id="stock-var" class="table table-stripped tale-hover">
			<thead>
				<th>Variedad</th>
				<th>¿Hay stock?</th>
			</thead>
			<tbody>
				<?php foreach ($variedades as $row) :?>
					<tr id="<?=$row['id']?>">
						<td><?=$row['descripcion']?></td>
						<td><input type="checkbox" <?php if ($row['en_stock']) echo 'checked'?>></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<!-- FORMULARIO DE EDICIÓN -->
<div id="edit-form" class="modal hide fade">
	<form class="form-horizontal" method="post">
		<h4 id="descripcion" class="text-center"></h4>
		<input id="del_sal" name="del_sal" type="hidden" value="delivery"/>
		<input id="id" name="id" type="hidden" value=""/>
    	<div class="control-group">
    		<label class="control-label" for="media">1/2 Nalga - Pollo</label>
    		<div class="controls">
    			<div class="input-prepend input-append">
			    	<span class="add-on">$</span>
			    	<input class="span1" id="media" name="media" type="text">
			    	<span class="add-on">.00</span>
			    </div>
    		</div>
    	</div>
    	<div class="control-group">
    		<label class="control-label" for="nalga">Nalga</label>
    		<div class="controls">
    			<div class="input-prepend input-append">
			    	<span class="add-on">$</span>
			    	<input class="span1" id="nalga" name="nalga" type="text">
			    	<span class="add-on">.00</span>
			    </div>
    		</div>
    	</div>
    	<div class="control-group">
    		<label class="control-label" for="pollo">Pollo</label>
    		<div class="controls">
    			<div class="input-prepend input-append">
		    	<span class="add-on">$</span>
		    	<input class="span1" id="pollo" name="pollo" type="text">
		    	<span class="add-on">.00</span>
		    </div>
    		</div>
    	</div>
    	<div class="control-group">
    		<label class="control-label" for="peceto">Peceto</label>
    		<div class="controls">
    			<div class="input-prepend input-append">
			    	<span class="add-on">$</span>
			    	<input class="span1" id="peceto" name="peceto" type="text">
			    	<span class="add-on">.00</span>
			    </div>
    		</div>
    	</div>
    	<div class="control-group">
    		<label class="control-label" for="merluza">Merluza</label>
    		<div class="controls">
    			<div class="input-prepend input-append">
			    	<span class="add-on">$</span>
			    	<input class="span1" id="merluza" name="merluza" type="text">
			    	<span class="add-on">.00</span>
			    </div>
    		</div>
    	</div>
    	<div class="control-group">
    		<label class="control-label" for="bob_milanga">Bob Milanga</label>
    		<div class="controls">
    			<div class="input-prepend input-append">
			    	<span class="add-on">$</span>
			    	<input class="span1" id="bob_milanga" name="bob_milanga" type="text">
			    	<span class="add-on">.00</span>
			    </div>
    		</div>
    	</div>
    	<div class="control-group">
    		<label class="control-label" for="calabaza">Calabaza</label>
    		<div class="controls">
    			<div class="input-prepend input-append">
			    	<span class="add-on">$</span>
			    	<input class="span1" id="calabaza" name="calabaza" type="text">
			    	<span class="add-on">.00</span>
			    </div>
    		</div>
    	</div>
    	<div class="control-group">
    		<div class="controls">
    			<button id="actualizar" type="submit" class="btn btn-warning">Actualizar</button>
    		</div>
	    </div>
    </form>
</div>

<?php include 'footer.php'; ?>
<script>

	$(document).ready(function(){
		
		$('table#precios tr').click(function(){
			
			$('#id').val($(this).attr("id"));
			
			var datos = $(this).find('td');
			console.log($(datos[0]).html());
			
			$('#descripcion').html($(datos[0]).html()); //Esta es la descripción (variedades)
			$('#media').val($(datos[1]).html());
			$('#nalga').val($(datos[2]).html());
			$('#pollo').val($(datos[3]).html());
			$('#peceto').val($(datos[4]).html());
			$('#merluza').val($(datos[5]).html());
			$('#bob_milanga').val($(datos[6]).html());
			$('#calabaza').val($(datos[7]).html());
			
			$('#edit-form').modal();
		
		});
		
		
		$("#actualizar").click(function(e) {
			
			e.preventDefault();
			
			
			console.log('actualizando');
			$.post('actualizar_milanesa.php',$("#edit-form form").serialize(),function(data){
				console.log('resultado: ');
				console.log(data);
				data=data.split('-');
				console.log(data);
				if (data[1]=='success'){
					var datos = $('table#precios').find('tr[id="'+data[0]+'"] td');
					console.log(datos);
					$(datos[1]).html($('#media').val());
					$(datos[2]).html($('#nalga').val());
					$(datos[3]).html($('#pollo').val());
					$(datos[4]).html($('#peceto').val());
					$(datos[5]).html($('#merluza').val());
					$(datos[6]).html($('#bob_milanga').val());
					$(datos[7]).html($('#calabaza').val());
					$('#edit-form').modal('hide');
				}
				
				
			});
			
		});
		
		
		$('input[type="checkbox"]').on("click",function(){
			
			var en_stock = ($(this).is(':checked')) ? 1 : 0;	
			
			console.log('clickeo');
			console.log($(this).parents('table').attr('id'));
			console.log($(this).parents('tr').attr('id'));
			var table = $(this).parents('table').attr('id');
			var row = $(this).parents('tr').attr('id');
			$.post('actualizar_stock.php',{ table_id: table, row_id: row, stock: en_stock },function(data){
				console.log(data);
				//if (data=='success')
					//avisar que se actualizo con exito
			});
		
		});
		
	});
	
</script>