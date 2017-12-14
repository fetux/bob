<?php
if (isset($_POST['promo']))
{
?>
<div class="tab-pane" id="sabor-bebida">
	<h3>Selecciona una opcion...</h3>
	<div class="text-center">
		<label class="radio-inline">
			<input type="radio" id="rb1" name="sabor" value="Pepsi"> Pepsi
		</label>
		<label class="radio-inline">
			<input type="radio" id="rb2" name="sabor" value="Pepsi Light"> Pepsi Light
		</label>
		<label class="radio-inline">
			<input type="radio" id="rb3" name="sabor" value="7Up"> 7Up
		</label>
		<a data-precio="0" data-type="suma" data-desc=" " data-promo="<?=$_POST['promo']?>" id="finSabor" class="btn btn-medium btn-warning btn-bobmilanga" href="<?=$_POST['next']?>">CONTINUAR</a>
	</div>
</div>
<?php	
}
else
{
?>	
<div class="tab-pane" id="sabor-bebida">
	<h3>Selecciona una opcion...</h3>
	<div class="text-center">
		<label class="radio-inline">
			<input type="radio" id="rb1" name="sabor" value="Pepsi"> Pepsi
		</label>
		<label class="radio-inline">
			<input type="radio" id="rb2" name="sabor" value="Pepsi Light"> Pepsi Light
		</label>
		<label class="radio-inline">
			<input type="radio" id="rb3" name="sabor" value="7Up"> 7Up
		</label>
		<a data-precio="0" data-type="suma" data-desc=" " id="finSabor" class="btn btn-medium btn-warning btn-bobmilanga" href="#bebida">CONTINUAR</a>
	</div>
</div>
<?php	
}


//sleep(3);
?>