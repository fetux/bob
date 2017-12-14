<?php include 'header.php'; ?>

	<div class="sm-content-margin hidden-xs"></div>
	<div class="xs-content-margin"></div>

	<div class="container font-simplicity">
		<div class="row"> 
			<div class="col-xs-12 col-sm-6" >
					<h3>Acercate al sal&oacute;n o llamanos!</h3>
					<address>
					    <strong>Bob Milanga Milanesería</strong><br>
						    Avellaneda 2553<br>
						    Mar del Plata, Argentina.<br>
						    <abbr title="Phone">Tel:</abbr> (0223)4937040<br>
						    <abbr title="Phone">Tel:</abbr> (0223)6285248<br>
						    <a href="mailto:info@bobmilanga.com.ar">info@bobmilanga.com.ar</a>
					</address>
     				
     				
     				<h3>Envianos un mensaje!</h3>
     				
     				<form method="post" action="contacto.php">
					  <div class="form-group">
					    <label for="inputEmail">Correo electr&oacute;nico</label>
					    <div class="input-prepend">
							<span class="add-on"><i class="icon-envelope"></i></span>
							<input class="form-control" name="email" id="inputEmail" type="email">
						</div>
					    <!--<input type="email" class="form-control" id="inputEmail1">-->
					  </div>
					  <div class="form-group">
					    <label for="text">Escriba su mensaje</label>
					    <textarea class="form-control" name="mensaje" id="text" rows="5"></textarea>
					  </div>
					  
					  <button name="submit" type="submit" class="btn btn-warning">Enviar</button>
					</form>
     				
     						
				</div>
			<?php
			if(isset($_POST['submit'])) {
				//*************************
				//Envio el formulario por correo electrónico
				//*************************
				if($_POST['email'] && $_POST['mensaje']) {
					
					$fecha = date("d-M-y H:i");
					$mymail = "info@bobmilanga.com.ar";
					$subject = "Contacto desde el sitio Bob Milanga";
					
					$contenido = "CONTACTO DESDE EL SITIO WEB. \n";
					$contenido .= "---------------------------\n";
					$contenido .= "\n";
					$contenido .= "\n";
					$contenido .= "Datos: \n";
					$contenido .= "****** \n";
					$contenido .= "\n";
					$contenido .= "Correo electronico: " .$_POST['email']. "\n";
					$contenido .= "\n";
					$contenido .= "Mensaje: \n";
					$contenido .= "******** \n";
					$contenido .= $_POST['mensaje']. "\n";
					$contenido .= "\n";		
					$contenido .= "Enviado el ".$fecha." desde www.bobmilanga.com.ar";
					
					$header = "From: ".$_POST['email']."\n";
					$header .= "X-Mailer:PHP/".phpversion()."\n";
					$header .= "Mime-Version: 1.0\n";
					$header .= "Content-Type: text/plain";
					mail($mymail, $subject, utf8_decode($contenido) ,$header);
					echo "<p><b>El mensaje se envió con éxito.</b></p>";
				} 
				else 
				{
					echo '<p style=color:red;><b>Complete todos los datos por favor.</b></p>'; 
				}
			}
			?>


				<div class="col-xs-12 col-sm-6" >
					<h3>Encontranos en el mapa!</h3>
					<!--<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ar/maps?f=q&amp;source=s_q&amp;hl=es-419&amp;geocode=&amp;q=Avellaneda+2553,+Mar+del+Plata,+Buenos+Aires&amp;aq=0&amp;oq=avellaneda+2553,+ma&amp;sll=-38.020548,-57.589079&amp;sspn=0.281285,0.676346&amp;ie=UTF8&amp;hq=&amp;hnear=Avellaneda+2553,+Mar+del+Plata,+Buenos+Aires&amp;t=m&amp;z=14&amp;iwloc=A&amp;ll=-38.010936,-57.555367&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com.ar/maps?f=q&amp;source=embed&amp;hl=es-419&amp;geocode=&amp;q=Avellaneda+2553,+Mar+del+Plata,+Buenos+Aires&amp;aq=0&amp;oq=avellaneda+2553,+ma&amp;sll=-38.020548,-57.589079&amp;sspn=0.281285,0.676346&amp;ie=UTF8&amp;hq=&amp;hnear=Avellaneda+2553,+Mar+del+Plata,+Buenos+Aires&amp;t=m&amp;z=14&amp;iwloc=A&amp;ll=-38.010936,-57.555367" style="color:#0000FF;text-align:left">Ver mapa más grande</a></small>-->
					<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.openstreetmap.org/export/embed.html?bbox=-57.56080627441406%2C-38.01372981713378%2C-57.550978660583496%2C-38.00867483548895&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/><small><a href="http://www.openstreetmap.org/#map=17/-38.01120/-57.55589">Ver mapa más grande</a></small>
				</div>

			</div>
			
		</div>
		





<?php include 'footer.php'; ?>