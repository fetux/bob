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

$fotos = paginado($_GET['p'],10,"id_galeria=1");
?>
<div class="row-fluid content">
	<div class="row-fluid">
		<h3>Delivery</h3>
	</div>
	<div class="row-fluid">
		<form id="uploadImage" action="upload.php" method="post" enctype='multipart/form-data'>
			<label>Seleccione un archivo:</label>
			<input id="imagen" name="imagen" type="file">
			<input id="gal" name="gal" value="delivery" type="hidden">
			<input type="submit" value="SUBIR IMAGEN">
		</form>
	</div>
	<div class="row-fluid">
		<table id="imagenes" class="table table-stripped table-hover">
			<thead>
				<th>#</th>
				<th>URL</th>
				<th>Preview</th>
				<th>Eliminar</th>
			</thead>
			<tbody>
				<?php foreach ($fotos->resultados as $row) :?>
					<tr id="<?=$row['id']?>">
						<td><?=$row['id']?></td>
						<td><a href="http://www.bobmilanga.com.ar/<?=$row['url']?>">www.bobmilanga.com.ar/<?=$row['url']?></a></td>
						<td class="text-center"><img src="/<?=$row['thumburl']?>"></td>
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
				
				if ($fotos->anterior) 
					echo '<a class="btn" href="?p='.$fotos->anterior.'"><i class="icon-chevron-left"></i></a>';
				
				for ($i=1; $i <= $fotos->paginas; $i++)
					if ($i == $fotos->actual)
						echo '<a class="btn btn-info" href="?p='.$i.'"><span>'.$i.'</span></a>';
					else
						echo '<a class="btn" href="?p='.$i.'"><span>'.$i.'</span></a>';
				
				if ($fotos->siguiente)
					echo '<a class="btn" href="?p='.$fotos->siguiente.'"><span><i class="icon-chevron-right"></i></span></a>';
				?>
			</div>
		</div>
	</div>
</div>