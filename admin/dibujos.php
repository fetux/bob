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
    $tabla = 'imagenes';
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

$dibujos = paginado($_GET['p'],10,"id_galeria=3");
?>
<div class="row-fluid content">
	<div class="row-fluid">
		<h3>Dibujos</h3>
	</div>
	<div clas="row-fluid">
		<form id="uploadImage" action="upload.php" method="post" enctype='multipart/form-data'>
			<label>Seleccione un archivo:</label>
			<input id="imagen" name="imagen" type="file">
			<input id="gal" name="gal" value="dibujos" type="hidden">
			<input type="submit" value="SUBIR DIBUJO">
		</form>
	</div>
	<div class="row-fluid">
		<table id="dibujos" class="table table-stripped table-hover">
			<thead>
				<th>#</th>
				<th>URL</th>
				<th>Preview</th>
				<th>Eliminar</th>
			</thead>
			<tbody>
				<?php foreach ($dibujos->resultados as $row) :?>
					<tr id="<?=$row['id']?>">
						<td><?=$row['id']?></td>
						<td><?=$row['url']?></td>
						<td class="text-center"><img src="/<?=$row['url']?>" width="100"></td>
						<td class="text-center"><a data-id="<?=$row['id']?>" class="eliminar" href="#"><strong>x</strong></a></td>
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
				
				if ($dibujos->anterior) 
					echo '<a class="btn" href="?p='.$dibujos->anterior.'"><i class="icon-chevron-left"></i></a>';
				
				for ($i=1; $i <= $dibujos->paginas; $i++)
					if ($i == $dibujos->actual)
						echo '<a class="btn btn-info" href="?p='.$i.'"><span>'.$i.'</span></a>';
					else
						echo '<a class="btn" href="?p='.$i.'"><span>'.$i.'</span></a>';
				
				if ($dibujos->siguiente)
					echo '<a class="btn" href="?p='.$dibujos->siguiente.'"><span><i class="icon-chevron-right"></i></span></a>';
				?>
			</div>
		</div>
	</div>
</div>