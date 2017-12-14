<?php
if (isset($_POST['promo']))
{
?>
<div class="tab-pane" id="pure-opcion">
	<h3>¿De que prefer&iacute;s el pur&eacute;?</h3>
	<div class="text-center">
		<label class="radio-inline">
			<input type="radio" id="rb1" name="pure" value="papa"> Papa
		</label>
		<label class="radio-inline">
			<input type="radio" id="rb2" name="pure" value="calabaza"> Calabaza
		</label>
		<label class="radio-inline">
			<input type="radio" id="rb3" name="pure" value="mixto"> Mixto
		</label>
		<a data-precio="0" data-promo="<?=$_POST['promo']?>" data-type="suma" data-precio="0" data-desc=" " id="finPure" class="btn btn-medium btn-warning btn-bobmilanga" href="<?= $_POST['next'] ?>">CONTINUAR</a>
	</div>
</div>
<div class="tab-pane" id="pob-opcion">
	<?php if($_POST['promo'] == 1) : ?>
	
	<h3>¿Queres la porci&oacute;n entera?</h3>
	<div class="text-center">
		<label class="radio-inline">
			<input type="radio" id="rb1" name="porcion" value="1"> Si
		</label>
		<label class="radio-inline">
			<input type="radio" id="rb2" name="porcion" value="2"> No, media esta bien
		</label>
		<a data-precio="0" data-promo="<?=$_POST['promo']?>" data-type="suma" data-precio="0" data-desc=" " id="finPorcion" class="btn btn-medium btn-warning btn-bobmilanga" href="<?= $_POST['next'] ?>">CONTINUAR</a>
	</div>
	<?php else : ?>
	
	<div class="text-center">
		<p><b>Las promociones se entregan con media guarnici&oacute;n</b></p>
		<input type="hidden" id="rb2" name="porcion" value="2" selected>
		<a data-precio="0" data-promo="<?=$_POST['promo']?>" data-type="suma" data-precio="0" data-desc=" " id="finPorcion" class="btn btn-medium btn-warning btn-bobmilanga" href="<?= $_POST['next'] ?>">CONTINUAR</a>
	</div>
	
	
	<?php endif; ?>
</div>
<div class="tab-pane" id="ensalada-opcion">
	<h3>¿Que le agregas a la ensalada?</h3>
	<div class="text-center">
		<label class="checkbox-inline">
			<input type="checkbox" id="cb1" value="Lechuga"> Lechuga
		</label>
		<label class="checkbox-inline">
			<input type="checkbox" id="cb2" value="Choclo"> Choclo
		</label>
		<label class="checkbox-inline">
			<input type="checkbox" id="cb3" value="Tomate"> Tomate
		</label>
		<label class="checkbox-inline">
			<input type="checkbox" id="cb4" value="Zanahoria"> Zanahoria
		</label>
		<label class="checkbox-inline">
			<input type="checkbox" id="cb4" value="Cebolla"> Cebolla
		</label>
		<label class="checkbox-inline">
			<input type="checkbox" id="cb5" value="Huevo"> Huevo
		</label>
		<label class="checkbox-inline">
			<input type="checkbox" id="cb5" value="Remolacha"> Remolacha
		</label>
		<a data-precio="0" data-promo="<?=$_POST['promo']?>" data-type="suma" data-desc=" " id="finEnsalada" class="btn btn-medium btn-warning btn-bobmilanga" href="<?= $_POST['next'] ?>">CONTINUAR</a>
	</div>
</div>
<div class="tab-pane" id="empanada-opcion">
	<h3>¿De que prefer&iacute;s tu empanada?</h3>
	<div class="text-center">
		<label class="radio-inline">
			<input type="radio" id="rb1" name="empanada" value="jyq"> Jam&oacute;n y Queso
		</label>
		<label class="radio-inline">
			<input type="radio" id="rb2" name="empanada" value="carne"> Carne cortada a cuchillo
		</label>
		<a data-precio="0" data-promo="<?=$_POST['promo']?>" data-type="suma" data-precio="0" data-desc=" " id="finEmpanada" class="btn btn-medium btn-warning btn-bobmilanga" href="<?= $_POST['next'] ?>">CONTINUAR</a>
	</div>
</div>

<?php	
}
else
{
?>	
<div class="tab-pane" id="pure-opcion">
	<h3>¿De que prefer&iacute;s el pur&eacute;?</h3>
	<div class="text-center">
		<label class="radio-inline">
			<input type="radio" id="rb1" name="pure" value="papa"> Papa
		</label>
		<label class="radio-inline">
			<input type="radio" id="rb2" name="pure" value="calabaza"> Calabaza
		</label>
		<label class="radio-inline">
			<input type="radio" id="rb3" name="pure" value="mixto"> Mixto
		</label>
		<a data-precio="0" data-type="suma" data-precio="0" data-desc=" " id="finPure" class="btn btn-medium btn-warning btn-bobmilanga" href="#guarnicion">CONTINUAR</a>
	</div>
</div>
<div class="tab-pane" id="pob-opcion">
	<h3>¿Queres la porci&oacute;n entera?</h3>
	<div class="text-center">
		<label class="radio-inline">
			<input type="radio" id="rb1" name="porcion" value="1"> Si
		</label>
		<label class="radio-inline">
			<input type="radio" id="rb2" name="porcion" value="2"> No, media esta bien
		</label>
		<a data-precio="0" data-type="suma" data-precio="0" data-desc=" " id="finPorcion" class="btn btn-medium btn-warning btn-bobmilanga" href="#guarnicion">CONTINUAR</a>
	</div>
</div>
<div class="tab-pane" id="ensalada-opcion">
	<h3>¿Que le agregas a la ensalada?</h3>
	<div class="text-center">
		<label class="checkbox-inline">
			<input type="checkbox" id="cb1" value="Lechuga"> Lechuga
		</label>
		<label class="checkbox-inline">
			<input type="checkbox" id="cb2" value="Choclo"> Choclo
		</label>
		<label class="checkbox-inline">
			<input type="checkbox" id="cb3" value="Tomate"> Tomate
		</label>
		<label class="checkbox-inline">
			<input type="checkbox" id="cb4" value="Zanahoria"> Zanahoria
		</label>
		<label class="checkbox-inline">
			<input type="checkbox" id="cb4" value="Cebolla"> Cebolla
		</label>
		<label class="checkbox-inline">
			<input type="checkbox" id="cb5" value="Huevo"> Huevo
		</label>
		<label class="checkbox-inline">
			<input type="checkbox" id="cb5" value="Remolacha"> Remolacha
		</label>
		<a data-precio="0" data-type="suma" data-desc=" " id="finEnsalada" class="btn btn-medium btn-warning btn-bobmilanga" href="#guarnicion">CONTINUAR</a>
	</div>
</div>
<div class="tab-pane" id="empanada-opcion">
	<h3>¿De que prefer&iacute;s tu empanada?</h3>
	<div class="text-center">
		<label class="radio-inline">
			<input type="radio" id="rb1" name="empanada" value="jyq"> Jam&oacute;n y Queso
		</label>
		<label class="radio-inline">
			<input type="radio" id="rb2" name="empanada" value="carne"> Carne cortada a cuchillo
		</label>
		<a data-precio="0" data-type="suma" data-precio="0" data-desc=" " id="finEmpanada" class="btn btn-medium btn-warning btn-bobmilanga" href="#guarnicion">CONTINUAR</a>
	</div>
</div>
<?php	
}


//sleep(3);
?>