<?php
include 'init.php';
if ($_SESSION['logueado']!='ok') { header('Location: index.php'); die; }
include 'header.php';
include 'menu.html';


$sql = "SELECT * FROM precios";
$res = mysql_query($sql);
$precios = array();
while($row = mysql_fetch_assoc($res)){
	$precios[] = $row;
}

$sql = "SELECT * FROM milanesas";
$res = mysql_query($sql);
$milas = array();
while($row = mysql_fetch_assoc($res)){
	$milas[] = $row;
}

$sql = "SELECT * FROM variedades";
$res = mysql_query($sql);
$variedades = array();
while($row = mysql_fetch_assoc($res)){
	$variedades[] = $row;
}

?>
<h3>Milanesas</h3>
<h4>Precios Milanesas por variedades</h4>
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
<h4>Stock Milanesas</h4>

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


<h4>Stock Variedades</h4>

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

<div id="edit-form" class="modal hide fade">
	
	
	<form class="form-horizontal">
		<h4 id="descripcion" class="text-center"></h4>
		<input id="id" name="id" type="hidden" value=""/>
    	<div class="control-group">
    		<label class="control-label" for="media">1/2 Nalga - Pollo</label>
    		<div class="controls">
    			<div class="input-prepend input-append">
			    	<span class="add-on">$</span>
			    	<input class="span1" id="media" type="text">
			    	<span class="add-on">.00</span>
			    </div>
    		</div>
    	</div>
    	<div class="control-group">
    		<label class="control-label" for="nalga">Nalga</label>
    		<div class="controls">
    			<div class="input-prepend input-append">
			    	<span class="add-on">$</span>
			    	<input class="span1" id="nalga" type="text">
			    	<span class="add-on">.00</span>
			    </div>
    		</div>
    	</div>
    	<div class="control-group">
    		<label class="control-label" for="pollo">Pollo</label>
    		<div class="controls">
    			<div class="input-prepend input-append">
		    	<span class="add-on">$</span>
		    	<input class="span1" id="pollo" type="text">
		    	<span class="add-on">.00</span>
		    </div>
    		</div>
    	</div>
    	<div class="control-group">
    		<label class="control-label" for="peceto">Peceto</label>
    		<div class="controls">
    			<div class="input-prepend input-append">
			    	<span class="add-on">$</span>
			    	<input class="span1" id="peceto" type="text">
			    	<span class="add-on">.00</span>
			    </div>
    		</div>
    	</div>
    	<div class="control-group">
    		<label class="control-label" for="merluza">Merluza</label>
    		<div class="controls">
    			<div class="input-prepend input-append">
			    	<span class="add-on">$</span>
			    	<input class="span1" id="merluza" type="text">
			    	<span class="add-on">.00</span>
			    </div>
    		</div>
    	</div>
    	<div class="control-group">
    		<label class="control-label" for="bob_milanga">Bob Milanga</label>
    		<div class="controls">
    			<div class="input-prepend input-append">
			    	<span class="add-on">$</span>
			    	<input class="span1" id="bob_milanga" type="text">
			    	<span class="add-on">.00</span>
			    </div>
    		</div>
    	</div>
    	<div class="control-group">
    		<label class="control-label" for="calabaza">Calabaza</label>
    		<div class="controls">
    			<div class="input-prepend input-append">
			    	<span class="add-on">$</span>
			    	<input class="span1" id="calabaza" type="text">
			    	<span class="add-on">.00</span>
			    </div>
    		</div>
    	</div>
    	<div class="control-group">
    		<div class="controls">
    			<button type="submit" class="btn btn-warning">Guardar</button>
    		</div>
	    </div>
    </form>
</div>


    



<?php include 'footer.php'; ?>
<script>

	$(document).ready(function(){
		
		$('table#precios tr').click(function(){
			$('#id').val($(this).attr("id"));
			
			var filas = $(this).find('td');
			console.log($(filas[0]).html());
			
			$('#descripcion').html($(filas[0]).html()); //Esta es la descripción (variedades)
			$('#media').val($(filas[1]).html());
			$('#nalga').val($(filas[2]).html());
			$('#pollo').val($(filas[3]).html());
			$('#peceto').val($(filas[4]).html());
			$('#merluza').val($(filas[5]).html());
			$('#bob_milanga').val($(filas[6]).html());
			$('#calabaza').val($(filas[7]).html());
			
			$('#edit-form').modal();
		});
	});
	
</script>