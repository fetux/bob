<?php
include 'init.php';
if ($_SESSION['logueado']!='ok') { header('Location: index.php'); die; }
include 'header.php';
include 'menu.html';


$sql = "SELECT * FROM precios_salon_prod";
$res = mysql_query($sql);
$precios = array();
while($row = mysql_fetch_assoc($res)){
	$precios[] = $row;
}

$sql = "SELECT * FROM categorias_salon_prod";
$res = mysql_query($sql);
$cat = array();
while($row = mysql_fetch_assoc($res)){
	$cat[] = $row;
}

?>
<div class="row-fluid content">
	<div class="row-fluid">
		<h3>Otros productos</h3>
		<h4>Precios de Productos para Salon</h4>
	</div>
	<div class="row-fluid">
		<table id="precios_salon" class="table table-stripped table-hover">
			<thead>
				<th>Id</th>
				<th>Categor&iacute;a</th>
				<th>Descripci&oacute;n</th>
				<th>Importe</th>
				<!--<th>Stock</th>-->
			</thead>
			<tbody>
				<?php foreach ($precios as $row) :?>
					<tr id="<?=$row['id']?>">
						<td><?=$row['id']?></td>
						<td><?=$cat[$row['id_categoria']-1]['nombre']?></td>
						<td><?=$row['descripcion']?></td>
						<td><?=$row['importe']?></td>
						<!--<td><input type="checkbox" <?php if ($row['en_stock']) echo 'checked'?></td>-->
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<!-- FORMULARIO DE EDICIÓN -->
<div id="edit-form" class="modal hide fade">
	<form class="form-horizontal">
		<h4 id="titulo" class="text-center"></h4>
		<input id="del_sal" name="del_sal" type="hidden" value="salon"/>
		<input id="id" name="id" type="hidden" value=""/>
    	<div class="control-group">
    		<label class="control-label" for="categoria">Categoría</label>
    		<div class="controls">
    			<select id="categoria" name="categoria" disabled="">
    				<?php foreach ($cat as $c) echo '<option value="'.$c['id'].'">'.$c['nombre'].'</option>'; ?>
    			</select>
    		</div>
    	</div>
    	<div class="control-group">
    		<label class="control-label" for="decripcion">Descripción</label>
    		<div class="controls">
    		    	<input id="descripcion" name="descripcion" type="text" disabled="">
    		</div>
    	</div>
    	<div class="control-group">
    		<label class="control-label" for="importe">Importe</label>
    		<div class="controls">
    			<div class="input-prepend input-append">
		    	<span class="add-on">$</span>
		    	<input class="span1" id="importe" name="importe" type="text">
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
		
		$('table#precios_salon tr').click(function(){
			$('#id').val($(this).attr("id"));
			
			var datos = $(this).find('td');
			console.log($(datos[0]).html());
			
			$('#titulo').html('Editando el producto # '+$(datos[0]).html());
			
			$("#categoria option").filter(function() {
			    //may want to use $.trim in here
			    return $(this).html() == $(datos[1]).html(); 
			}).prop('selected', true);
			
		
			$('#descripcion').val($(datos[2]).html());
			$('#importe').val($(datos[3]).html());
			$('#edit-form').modal();
		});
		
		
		$("#actualizar").click(function(e) {
			
			e.preventDefault();
			
			
			console.log('actualizando');
			$.post('actualizar_producto.php',$("#edit-form form").serialize(),function(data){
				console.log('resultado: ');
				console.log(data);
				data=data.split('-');
				console.log(data);
				if (data[1]=='success'){
					var datos = $('table#precios_salon').find('tr[id="'+data[0]+'"] td');
					console.log(datos);
					//$(datos[1]).html($('#categoria option:selected').html());
					//$(datos[2]).html($('#descripcion').val());
					$(datos[3]).html($('#importe').val());
					$('#edit-form').modal('hide');
				}
				
				
			});
			
		});
	});
	
</script>