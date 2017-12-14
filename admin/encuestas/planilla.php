<?php
include_once '../../cnx.php';
require_once '../../assets/vendor/odsPhpGenerator/ods.php';

$sql = "SELECT * FROM encuestas";
$res = mysql_query($sql);

$ods = new ods();
$table = new odsTable("Encuestas");

$style1 = new odsStyleTableCell();
$style1->setBackgroundColor('#008080');
$style1->setBorder('0.01cm solid #000000');
$style1->setTextAlign('center');
$style1->setFontSize('11pt');

$style2 = new odsStyleTableCell();
$style2->setBackgroundColor('#ffd42a');
$style2->setBorder('0.01cm solid #000000');
$style2->setTextAlign('center');
$style2->setFontSize('11pt');

$style3 = new odsStyleTableCell();
$style3->setBackgroundColor('#ff3e2a');
$style3->setBorder('0.01cm solid #000000');
$style3->setTextAlign('center');
$style3->setFontSize('11pt');

$style4 = new odsStyleTableCell();
$style4->setBackgroundColor('#71c837');
$style4->setBorder('0.01cm solid #000000');
$style4->setTextAlign('center');
$style4->setFontSize('11pt');

$style5 = new odsStyleTableCell();
$style5->setBackgroundColor('#c900ff');
$style5->setBorder('0.01cm solid #000000');
$style5->setTextAlign('center');
$style5->setFontSize('11pt');

$styleCenter = new odsStyleTableCell();
$styleCenter->setTextAlign('center');

$styleTotal = new odsStyleTableCell();
$styleTotal->setTextAlign('end');
$styleTotal->setBorder('0.01cm solid #000000');

$styleTotalR = new odsStyleTableCell();
$styleTotalR->setTextAlign('center');
$styleTotalR->setBorder('0.01cm solid #000000');


$styleColumn2 = new odsStyleTableColumn();
$styleColumn2->setColumnWidth('2cm');
$styleColumn25 = new odsStyleTableColumn();
$styleColumn25->setColumnWidth('2.5cm');
$styleColumn3 = new odsStyleTableColumn();
$styleColumn3->setColumnWidth('3cm');
$styleColumn35 = new odsStyleTableColumn();
$styleColumn35->setColumnWidth('3.5cm');
$styleColumn4 = new odsStyleTableColumn();
$styleColumn4->setColumnWidth('4cm');

$column = new odsTableColumn($styleColumn2);
$table->addTableColumn($column);
$column = new odsTableColumn($styleColumn4);
$table->addTableColumn($column);
$column = new odsTableColumn($styleColumn2);
$table->addTableColumn($column);
$column = new odsTableColumn($styleColumn25);
$table->addTableColumn($column);
$column = new odsTableColumn($styleColumn25);
$table->addTableColumn($column);
$column = new odsTableColumn($styleColumn25);
$table->addTableColumn($column);
$column = new odsTableColumn($styleColumn25);
$table->addTableColumn($column);
$column = new odsTableColumn($styleColumn25);
$table->addTableColumn($column);
$column = new odsTableColumn($styleColumn25);
$table->addTableColumn($column);
$column = new odsTableColumn($styleColumn35);
$table->addTableColumn($column);
$column = new odsTableColumn($styleColumn35);
$table->addTableColumn($column);
$column = new odsTableColumn($styleColumn2);
$table->addTableColumn($column);
$column = new odsTableColumn($styleColumn2);
$table->addTableColumn($column);
$column = new odsTableColumn($styleColumn2);
$table->addTableColumn($column);
$column = new odsTableColumn($styleColumn2);
$table->addTableColumn($column);
$column = new odsTableColumn($styleColumn2);
$table->addTableColumn($column);
$column = new odsTableColumn($styleColumn2);
$table->addTableColumn($column);
$column = new odsTableColumn($styleColumn2);
$table->addTableColumn($column);

$row = new odsTableRow();
$table->addRow($row);

//FILA 1

$row = new odsTableRow();

$cell = new odsTableCellString('# Cliente',$styleCenter);
$cell->setNumberRowsSpanned(2);
$row->addCell($cell);

$cell = new odsTableCellString('Dirección',$styleCenter);
$cell->setNumberRowsSpanned(2);
$row->addCell($cell);

$cell = new odsTableCellString('Pedidos',$styleCenter);
$cell->setNumberRowsSpanned(2);
$row->addCell($cell);


$cell = new odsTableCellString('Temperatura del producto',$style1);
$cell->setNumberColumnsSpanned(3);
$row->addCell($cell);

$cell = new odsTableCellString('Calidad del producto',$style2);
$cell->setNumberColumnsSpanned(3);
$row->addCell($cell);

$cell = new odsTableCellString('Tiempo que espero el pedido',$style3);
$cell->setNumberColumnsSpanned(2);
$row->addCell($cell);

$cell = new odsTableCellString('Precio del producto',$style4);
$cell->setNumberColumnsSpanned(3);
$row->addCell($cell);

$cell = new odsTableCellString('Veces por semana que come milanesa',$style5);
$cell->setNumberColumnsSpanned(4);
$row->addCell($cell);

$table->addRow($row);

//FILA 2

$row = new odsTableRow();

$row->addCell(new odsCoveredTableCell());
$row->addCell(new odsCoveredTableCell());
$row->addCell(new odsCoveredTableCell());

$row->addCell(new odsTableCellString('Caliente',$style1));
$row->addCell(new odsTableCellString('Frío',$style1));
$row->addCell(new odsTableCellString('A veces f/c',$style1));

$row->addCell(new odsTableCellString('Muy bueno',$style2));
$row->addCell(new odsTableCellString('Aceptable',$style2));
$row->addCell(new odsTableCellString('Malo',$style2));

$row->addCell(new odsTableCellString('A tiempo',$style3));
$row->addCell(new odsTableCellString('Fuera de tiempo',$style3));

$row->addCell(new odsTableCellString('Barato',$style4));
$row->addCell(new odsTableCellString('En precio',$style4));
$row->addCell(new odsTableCellString('Caro',$style4));

$row->addCell(new odsTableCellString('- 1 vez',$style5));
$row->addCell(new odsTableCellString('Una vez',$style5));
$row->addCell(new odsTableCellString('+ 1 vez',$style5));
$row->addCell(new odsTableCellString('No sabe',$style5));

$table->addRow($row);

//RESTO DE LAS FILAS CARGADAS DESDE LA BASE DE DATOS
$cant = 0;
while($r=mysql_fetch_assoc($res)){
		
	$cant++;
	
	$row = new odsTableRow();

	$row->addCell(new odsTableCellString(mb_strtoupper($r['id_cliente'])));
	$row->addCell(new odsTableCellString($r['direccion']));
	$row->addCell(new odsTableCellString($r['pedidos'],$styleCenter));
	
	switch ($r['temperatura']) {
		case '1':
			$row->addCell(new odsTableCellFloat('1',$styleCenter));
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellEmpty());
			break;
		case '2':
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellFloat('1',$styleCenter));
			$row->addCell(new odsTableCellEmpty());
			break;
		case '3':
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellFloat('1',$styleCenter));
			break;
		
		default:
			break;
	}
	switch ($r['calidad']) {
		case '1':
			$row->addCell(new odsTableCellFloat('1',$styleCenter));
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellEmpty());
			break;
		case '2':
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellFloat('1',$styleCenter));
			$row->addCell(new odsTableCellEmpty());
			break;
		case '3':
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellFloat('1',$styleCenter));
			break;
		
		default:
			break;
	}
	switch ($r['espera']) {
		case '1':
			$row->addCell(new odsTableCellFloat('1',$styleCenter));
			$row->addCell(new odsTableCellEmpty());
			break;
		case '2':
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellFloat('1',$styleCenter));
			break;
		default:
			break;
	}
	switch ($r['precio']) {
		case '1':
			$row->addCell(new odsTableCellFloat('1',$styleCenter));
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellEmpty());
			break;
		case '2':
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellFloat('1',$styleCenter));
			$row->addCell(new odsTableCellEmpty());
			break;
		case '3':
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellFloat('1',$styleCenter));
			break;
		
		default:
			break;
	}
	switch ($r['milas']) {
		case '1':
			$row->addCell(new odsTableCellFloat('1',$styleCenter));
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellEmpty());
			break;
		case '2':
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellFloat('1',$styleCenter));
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellEmpty());
			break;
		case '3':
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellFloat('1',$styleCenter));
			$row->addCell(new odsTableCellEmpty());
			break;
		case '4':
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellEmpty());
			$row->addCell(new odsTableCellFloat('1',$styleCenter));
		default:
			break;
	}
	
	$table->addRow($row);
}

$row = new odsTableRow();



$cell = new odsTableCellString('TOTAL:',$styleTotal);
$cell->setNumberColumnsSpanned(3);
$row->addCell($cell);

$cant += 3; // 4 desde donde empiezo -1;

$cell = new odsTableCellFloat(0,$styleTotalR);
$cell->setFormula("SUM([.D4:.D".$cant."])");
$row->addCell( $cell );

$cell = new odsTableCellFloat(0,$styleTotalR);
$cell->setFormula("SUM([.E4:.E".$cant."])");
$row->addCell( $cell );

$cell = new odsTableCellFloat(0,$styleTotalR);
$cell->setFormula("SUM([.F4:.F".$cant."])");
$row->addCell( $cell );

$cell = new odsTableCellFloat(0,$styleTotalR);
$cell->setFormula("SUM([.G4:.G".$cant."])");
$row->addCell( $cell );

$cell = new odsTableCellFloat(0,$styleTotalR);
$cell->setFormula("SUM([.H4:.H".$cant."])");
$row->addCell( $cell );

$cell = new odsTableCellFloat(0,$styleTotalR);
$cell->setFormula("SUM([.I4:.I".$cant."])");
$row->addCell( $cell );

$cell = new odsTableCellFloat(0,$styleTotalR);
$cell->setFormula("SUM([.J4:.J".$cant."])");
$row->addCell( $cell );

$cell = new odsTableCellFloat(0,$styleTotalR);
$cell->setFormula("SUM([.K4:.K".$cant."])");
$row->addCell( $cell );

$cell = new odsTableCellFloat(0,$styleTotalR);
$cell->setFormula("SUM([.L4:.L".$cant."])");
$row->addCell( $cell );

$cell = new odsTableCellFloat(0,$styleTotalR);
$cell->setFormula("SUM([.M4:.M".$cant."])");
$row->addCell( $cell );

$cell = new odsTableCellFloat(0,$styleTotalR);
$cell->setFormula("SUM([.N4:.N".$cant."])");
$row->addCell( $cell );

$cell = new odsTableCellFloat(0,$styleTotalR);
$cell->setFormula("SUM([.O4:.O".$cant."])");
$row->addCell( $cell );

$cell = new odsTableCellFloat(0,$styleTotalR);
$cell->setFormula("SUM([.P4:.P".$cant."])");
$row->addCell( $cell );

$cell = new odsTableCellFloat(0,$styleTotalR);
$cell->setFormula("SUM([.Q4:.Q".$cant."])");
$row->addCell( $cell );

$cell = new odsTableCellFloat(0,$styleTotalR);
$cell->setFormula("SUM([.R4:.R".$cant."])");
$row->addCell( $cell );

$table->addRow($row);

//AGREGAR TABLA Y EXPORTAR ARCHIVO

$ods->addTable($table);
$ods->setTitle("Bob Milanga - Encuestas");
$ods->downloadOdsFile("Resultado-Encuestas-BobMilanga-".date("d-m-Y").".ods");




?>