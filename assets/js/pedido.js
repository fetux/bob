
/*
 * Borrar las variedades de un determinado container
 * Se esopera que el container contenga un etiquetas <a> dentro de un <div>.
 * Estas etiquetas <a> son contadas como variedades
 * La primera que se encuentra no se remueve.
 */
$.fn.borrarVariedades = function(container) {
	var variedadesCargadas = $(container+' div a');
	console.log(variedadesCargadas.length);
	if (variedadesCargadas.length > 1) {
		var i = 0;
		variedadesCargadas.each(function() {
			//Elimino todas menos la primera que es la variedad SOLA
			//console.log($(this));
			if (i != 0)
				$(this).remove();
			i++;
			});
	}
};


/*
 * Cargar dinamicamente las variedades
 */
$.fn.cargarVariedades = function(container,milanesa,cantVar,next,promo) {
	if(promo != undefined)
	{
		console.log("detecto promo");
			var datos = {
				milanesa : milanesa,
				cantVar : cantVar,
				next : next,
				promo : promo
			};
	}
	else
	{
			var datos = {
				milanesa : milanesa,
				cantVar : cantVar,
				next : next
			};
	}

	$.post('cargar_variedades.php', datos, function(response) {
		//console.log(response);
		$(container+' div').append(response);
		$('a.btn').tooltip();
	});
};

/*
 * Cargar dinamicamente las milanesas
 */
$.fn.cargarMilanesas = function(next,promo,f) {
	if(promo != undefined)
	{
		var datos = {
			next : next,
			promo : promo
		};
	}
	else
	{
		var datos = {};
	}
	$.post('cargar_milanesas.php', datos, function(response) {
		//console.log(response);
		$('#milanesa div').append(response);
	});
	if (typeof f == "function") f();
};

$.fn.borrarMilanesas = function(){

	var milanesasCargadas = $('#milanesa div a');
	console.log(milanesasCargadas.length);
	if (milanesasCargadas.length > 0) {
		milanesasCargadas.each(function() {
			//console.log($(this));
			$(this).remove();
		});
	}
};

/*
 *  Cargar dinamicamente las guarniciones
 */
$.fn.cargarGuarniciones = function(next,promo) {
	if (promo != undefined)
	{
		var datos = {
			next: next,
			promo: promo
		};
	}
	else
	{
		var datos = {};
	}
	$.post('cargar_guarniciones.php', datos, function(response) {
		//console.log(response);
		$('#guarnicion div').append(response);
	});
};

/*
 *  Cargar dinamicamente las guarniciones
 */
$.fn.cargarGuarnicionesOp = function(next,promo) {
	if (promo != undefined)
	{
		var datos = {
			next: next,
			promo: promo
		};
	}
	else
	{
		var datos = {};
	}
	$.post('cargar_guarniciones-op.php', datos, function(response) {
		//console.log(response);
		$('#guarnicion').after(response);
	});
};

$.fn.borrarGuarniciones = function() {
	var guarnicionesCargadas = $('#guarnicion div a');
	console.log(guarnicionesCargadas.length);
	if (guarnicionesCargadas.length > 0) {
		guarnicionesCargadas.each(function() {
			//console.log($(this));
			$(this).remove();
		});
	}
};

$.fn.borrarGuarnicionesOp = function() {
	$('#pure-opcion').remove();
	$('#pob-opcion').remove();
	$('#ensalada-opcion').remove();
	$('#empanada-opcion').remove();
};

$.fn.cargarBebidasOp = function(next,promo) {
	if (promo != undefined)
	{
		var datos = {
			next: next,
			promo: promo
		};
	}
	else
	{
		var datos = {};
	}
	$.post('cargar_bebidas-op.php', datos, function(response) {
		//console.log(response);
		$('#bebida').after(response);
	});
};

$.fn.cargarBebidas = function(next,promo) {
	if (promo != undefined)
	{
		var datos = {
			next: next,
			promo: promo
		};
	}
	else
	{
		var datos = {};
	}
	$.post('cargar_bebidas.php', datos, function(response) {
		//console.log(response);
		$('#bebida div').append(response);
	});
};

$.fn.borrarBebidas = function() {
	var bebidasCargadas = $('#bebida div a');
	console.log(bebidasCargadas.length);
	if (bebidasCargadas.length > 0) {
		bebidasCargadas.each(function() {
			//console.log($(this));
			$(this).remove();
		});
	}
};

$.fn.borrarBebidasOp = function() {
	$('#sabor-bebida').remove();
};

  var DELIVERY;
  var SUCURSAL = 0;
  var DIR_CALLE;
  var DIR_NUMERO;
  var DIR_PISO;
  var DIR_DEPTO;
  var DIRECCION;

  var placeSearch, autocomplete;

  function initAutocomplete() {
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    autocomplete = new google.maps.places.Autocomplete(
        (document.getElementById('dirCalleNum')),
        {
          types: ['geocode'],
          componentRestrictions: {country: 'ar'},
          bounds: new google.maps.LatLngBounds({lat: -38.038487, lng: -57.610685}, {lat: -37.944660, lng: -57.512690}),
          strictBounds: true,
        }
      );

    // When the user selects an address from the dropdown, populate the address
    // fields in the form.
    autocomplete.addListener('place_changed', fillInAddress);
  }

  function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();
    console.log(place);

    $('#address-message').hide();
    $('#address-continue').hide();
    $('#local-continue').hide();
    $('input[name="optionsLocal"]').prop('checked', false);

    SUCURSAL = 0;

    if (place.address_components[0].types[0] !== "street_number") {
      $('#dirCalleNum').val(place.address_components[0].short_name);
      $('#address-message').html("La dirección debe contener Calle y Número.");
      $('#address-message').show()
      return false;
    }

    DIR_CALLE = place.address_components[1].short_name;
    DIR_NUMERO = place.address_components[0].long_name;

    $('#dirCalleNum').val(DIR_CALLE + " " + DIR_NUMERO);

  DIR_PISO = $('#dirPiso').val();
  DIR_DEPTO = $('#dirDepto').val();

  DIRECCION = DIR_CALLE +" "+DIR_NUMERO+" "+DIR_PISO+" "+DIR_DEPTO;

    "Zona Constitución"
    var constitucion = new google.maps.Polygon({
      paths: [
        {lat: -37.980125, lng: -57.582244}, // Luro y Champagnat
        {lat: -37.971946, lng: -57.576351}, // Champagnat e Ituzaingo
        {lat: -37.956550, lng: -57.580235},  // Champagnat y Av Paolera
        {lat: -37.943857, lng: -57.570048}, // Av Paolera y Av Estrada
        {lat: -37.958854, lng: -57.540107}, // Av Estrada y la Costa
        {lat: -38.000914, lng: -57.541666}, // Av Luro y la Costa
        {lat: -37.980125, lng: -57.582244} // Luro y Champagnat
      ]
    });

    "Zona Avellaneda"
    var avellaneda = new google.maps.Polygon({
      paths: [
        {lat: -38.038779, lng: -57.544702}, // JB Justo y la Costa
        {lat: -38.006970, lng: -57.587193}, // JB Justo y Jara
        {lat: -37.971946, lng: -57.566401}, // Jara y Libertad
        {lat: -37.992258, lng: -57.545214},  // Libertad y la Costa
        {lat: -38.015741, lng: -57.514529}, // El Mar
        {lat: -38.038779, lng: -57.544702}, // JB Justo y la Costa
      ]
    });

      var address = new google.maps.LatLng(
        place.geometry.location.lat(),
        place.geometry.location.lng()
      );

      if (constitucion.contains(address)) {
        SUCURSAL = 2;
        DELIVERY = true;
        $('#help-geolocation').html("Sucursal: Av. Tejedor 707");
      }

      if (avellaneda.contains(address)) {
        SUCURSAL = 1;
        DELIVERY = true;
        $('#help-geolocation').html("Sucursal: Avellaneda 2553");
      }

      if (SUCURSAL == 0) {
        $('#address-message').html("Lo sentimos, la direcci&oacute;n esta fuera de la zona de Reparto");
        $('#address-message').show();
        return false;
      }

      $('#address-continue').html("Enviarmelo a "+ DIRECCION);
      $('#address-continue').show();



  }

  // Bias the autocomplete object to the user's geographical location,
  // as supplied by the browser's 'navigator.geolocation' object.
  function geolocate() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var geolocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        var circle = new google.maps.Circle({
          center: geolocation,
          radius: position.coords.accuracy
        });
        autocomplete.setBounds(circle.getBounds());
      });
    }
  }





$(document).ready(function() {



	if ($('#cartel-cerrado').data('esmartes') == 'si')
	{
		$('#finalizar').attr("disabled", "disabled");
		$('#cartel-cerrado').show();
	}
  else {

    $('#help-geolocation').html("Escriba su direcci&oacute;n y <u>seleccione una opci&oacute;n</u> para que buscemos la sucursal mas cercana.");
      $('#address-modal').modal();
    $('#address-modal').on('hidden.bs.modal', function (e) {
      if (SUCURSAL == 0) {
        window.location.href = '/';
      }
    });

    $('#address-continue').click(function(){
      $('#address-modal').modal('hide');
    });

    $('#local-continue').click(function(){
      $('#address-modal').modal('hide');
    });

    $('#dirPiso').keyup(function(){
      DIR_PISO = $(this).val();
      DIRECCION = DIR_CALLE +" "+DIR_NUMERO+" "+DIR_PISO+" "+DIR_DEPTO;
      $('#address-continue').html("Enviarmelo a "+ DIRECCION);
    })

    $('#dirDepto').keyup(function(){
      DIR_DEPTO = $(this).val();
      DIRECCION = DIR_CALLE +" "+DIR_NUMERO+" "+DIR_PISO+" "+DIR_DEPTO;
      $('#address-continue').html("Enviarmelo a "+ DIRECCION);
    })



    $('input[name="optionsLocal"]').click(function(e){

      DELIVERY = false;
      $('#help-geolocation').html("Escriba su direcci&oacute;n y <u>seleccione una opci&oacute;n</u> para que buscemos la sucursal mas cercana.");

        $('#dirCalleNum').val("");
        $('#dirPiso').val("");
        $('#dirDepto').val("");
        $('#address-continue').hide();


        switch ($(this).val()) {
          case "2":
            $('#local-continue').html("Retiro en Av. Tejedor 707");
            SUCURSAL = 2;
            $('#local-continue').show();
            break;
          case "1":
            $('#local-continue').html("Retiro en Avellaneda 2553");
            SUCURSAL = 1;
            $('#local-continue').show();
            break;
        }

    })

  }


	// Cargo inicialmente las milanesas

	$.fn.cargarMilanesas();


	var s = ""; // String del pedido para enviarlo por correo electrónico.


	// Attach un Event Handler para cada vez que se haga click en una etiqueta <a> dentro
	// de un .tab-content
	// Es decir todos los botones (<a>) que representan items u opciones del pedido.
	$(document).on('click', '.tab-content a', function(e) {

		e.preventDefault(); // Evito que el hipervinculo realice su acción por defecto.

		// Hago scroll animado de la ventana para ubicarme en el encabezado <h4> del .content
		var offset = $(".container h4:first").offset().top;
		//console.log(offset);
		$('html, body').animate({scrollTop:offset}, 500);

		// Obtengo algunas variables del botón que acciono este evento
		var id = $(this).data('id');
		var precio = parseFloat($(this).data('precio'));
		var tipo = $(this).data('type');
		var descripcion = $(this).data('desc');
		var pane = $(this).parents('.tab-pane');
		var promo = $(this).data('promo');

		//VERIFICO A QUE PANEL PERTENECE EL BOTON APRETADO
		//PARA REALIZAR DISTINTAS TAREAS SEGUN CORRESPONDA
		switch(pane.attr('id')) {

			/**** MILANESAS ****/

			//PANEL DE MILANESA
			case 'milanesa':

				// Almaceno en data-selected el id de la milanesa elejida
				pane.data('selected', id);

				//Reinicio la mesa
				$('#mesa .mesa_bob').remove();
				$('#mesa .plato1').remove();
				//$('#mesa').append('<img class="mesa" src="/assets/img/mesa_si.jpg" width="400"/>');


				switch(promo){
					case 2:
						$.fn.borrarVariedades('#mediavariedad');
						$.fn.cargarVariedades('#mediavariedad',id,1,'#guarnicion',2);

						break;
					case 3:
						$.fn.borrarGuarniciones();
						$.fn.cargarGuarniciones('#promocion',3);
						$.fn.borrarGuarnicionesOp();
						$.fn.cargarGuarnicionesOp('#promocion',3);
						break;
				}


				console.log(id);


				// cargar la imagen de la milanesa seleccionada y cargo las variedades en el caso de las medias 1/2
				switch (id) {
					case 1: if (promo == undefined)
							{
								$.fn.borrarVariedades('#mediavariedad');
								$.fn.cargarVariedades('#mediavariedad',id,1,'#milanesa');
							}
							$('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaNalga/mediaNalga.png">');
							break;

					case 2: if (promo == undefined)
							{
								$.fn.borrarVariedades('#mediavariedad');
								$.fn.cargarVariedades('#mediavariedad',id,1,'#milanesa');
							}
							$('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPollo/mediaPollo.png">');
							break;

					case 3: if (promo == undefined)
							{
								$.fn.borrarVariedades('#mediavariedad');
								$.fn.cargarVariedades('#mediavariedad',id,1,'#milanesa');
							}
							$('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPeceto/mediaPeceto.png">');
							break;

					case 4: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalga/nalga.png">');
							break;
					case 5: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pollo/pollo.png">');
							break;
					case 6: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/peceto/peceto.png">');
							break;
					case 7: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluza/merluza.png">');
							break;
					case 8: $('#mesa').append('<img class="img-responsive mesa_bob" src="assets/img/mesa_bob.png">');
							$('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilanga/bobmilanga.png">');
							break;
					case 9: $.fn.borrarVariedades('#unavariedad');
							$.fn.cargarVariedades('#unavariedad',id,1,'#milanesa');
							$('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/calabaza/calabaza.png">');

						break;
				}

				break;

			// CASO DONDE ELIJE SI QUIERE COMBINAR VARIEDADES
			case 'combinar':

				//NO COMBINAR VARIEDADES ( 1 SOLA VARIEDAD)
				//CARGO LAS VARIEDADES PARA UNA MILANESA ENTERA
				if ($(this).attr('href') == "#unavariedad") {
					//PRIMERO BORRO LAS VARIEDADES QUE SE CARGARON ANTERIROMENTE (SI LAS HAY)
					$.fn.borrarVariedades("#unavariedad");

					//CARGAR DINAMICAMENTE LAS VARIEDADES DEPENDIENDO DE LA MILANESA ELEJIDA
					//SI NO ES UNA PROMOCION.
					$.fn.cargarVariedades('#unavariedad',$('#milanesa').data('selected'),1,'#milanesa');

				}

				//SI - COMBINAR DOS VARIEDADES
				//CARGO LAS VARIEDADES PARA LA PRIMERA MITAD DE LA MILANESA
				else if ($(this).attr('href') == "#primeravar") {
					//PRIMERO BORRO LAS VARIEDADES QUE SE CARGARON ANTERIROMENTE (SI LAS HAY)
					$.fn.borrarVariedades('#primeravar');
					//CARGAR DINAMICAMENTE LAS VARIEDADES DEPENDIENDO DE LA MILANESA ELEJIDA
					$.fn.cargarVariedades('#primeravar',$('#milanesa').data('selected'),2,'#segundavar');
				}
				break;

			// CASO DONDE SE ELIJIO LA PRIMERA VARIEDAD (ES EL CASO QUE QUIERE COMBINAR VARIEDADES)
			// AHORA CARGO LAS VARIEDADES PARA LA SEGUNDA MITAD DE LA MILANESA
			case 'primeravar':
				$.fn.borrarVariedades('#segundavar');
				if (promo == 1)
				{
					console.log("cargando segunda var para promo 1");
					$.fn.cargarVariedades('#segundavar',8,2,'#guarnicion',1);

				}
				else
				{
					$.fn.cargarVariedades('#segundavar',$('#milanesa').data('selected'),2,'#milanesa');
				}


				//----------------------------------------------------------------------------------------------
				//********************************************************************************* PRIMERA VARIEDAD
				//----------------------------------------------------------------------------------------------
				switch($('#milanesa').data('selected'))
				{
					//nalga con primera var
					case 4:
						switch (id)
						{
							case 1:	$('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaAcaballoA.png">');break;
							case 2: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaVerdurasA.png">');break;
							case 3: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaCapresseA.png">');break;
							case 4: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaFugazzetaA.png">');break;
							case 5: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaNapoA.png">');break;
							case 6: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaNapoJA.png">');break;
							case 7: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaVerdeoA.png">');break;
							case 8: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaAcelgaA.png">');break;
							case 9: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaCalabresaA.png">');break;
							case 10: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaCheddarA.png">');break;
							case 11: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaChampignonesA.png">');break;
							case 12: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaJamonCA.png">');break;
							case 13: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaEspecialA.png">');break;
							case 14: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMedia4qA.png">');break;
							case 15: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaMaestraA.png">');break;
						}
						break;
					//pollo con primera var
					case 5:
						switch (id)
						{
							case 1: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaAcaballoA.png">');break;
							case 2: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaVerdurasA.png">');break;
							case 3: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaCapresseA.png">');break;
							case 4: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaFugazzetaA.png">');break;
							case 5: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaNapoA.png">');break;
							case 6: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaNapoJA.png">');break;
							case 7: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaVerdeoA.png">');break;
							case 8: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaAcelgaA.png">');break;
							case 9: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaCalabresaA.png">');break;
							case 10: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaCheddarA.png">');break;
							case 11: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaChampignonesA.png">');break;
							case 12: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaJamonCA.png">');break;
							case 13: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaEspecialA.png">');break;
							case 14: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMedia4qA.png">');break;
							case 15: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaMaestraA.png">');break;
						}
						break;

					//peceto con primera var
					case 6:
						switch (id)
						{
							case 1: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaAcaballoA.png">');break;
							case 2: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaVerdurasA.png">');break;
							case 3: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaCapresseA.png">');break;
							case 4: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaFugazzetaA.png">');break;
							case 5: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaNapoA.png">');break;
							case 6: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaNapoJA.png">');break;
							case 7: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaVerdeoA.png">');break;
							case 8: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaAcelgaA.png">');break;
							case 9: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaCalabresaA.png">');break;
							case 10: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaCheddarA.png">');break;
							case 11: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaChampignonesA.png">');break;
							case 12: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaJamonCA.png">');break;
							case 13: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaEspecialA.png">');break;
							case 14: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMedia4qA.png">');break;
							case 15: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaMaestraA.png">');break;
						}
						break;

					//merluza con primera var
					case 7:
						switch (id)
						{
							case 1: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaAcaballoA.png">');break;
							case 2: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaVerdurasA.png">');break;
							case 3: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaCapresseA.png">');break;
							case 4: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaFugazzetaA.png">');break;
							case 5: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaNapoA.png">');break;
							case 6: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaNapoJA.png">');break;
							case 7: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaVerdeoA.png">');break;
							case 8: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaAcelgaA.png">');break;
							case 9: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaCalabresaA.png">');break;
							case 10: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaCheddarA.png">');break;
							case 11: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaChampignonesA.png">');break;
							case 12: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaJamonCA.png">');break;
							case 13: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaEspecialA.png">');break;
							case 14: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMedia4qA.png">');break;
							case 15: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaMaestraA.png">');break;
						}
						break;

					//bobmilanga con primera var
					case 8:
						switch (id)
						{
							case 1: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaAcaballoA.png">');break;
							case 2: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaVerdurasA.png">');break;
							case 3: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaCapresseA.png">');break;
							case 4: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaFugazzetaA.png">');break;
							case 5: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaNapoA.png">');break;
							case 6: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaNapoJA.png">');break;
							case 7: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaVerdeoA.png">');break;
							case 8: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaAcelgaA.png">');break;
							case 9: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaCalabresaA.png">');break;
							case 10: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaCheddarA.png">');break;
							case 11: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaChampignonesA.png">');break;
							case 12: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaJamonCA.png">');break;
							case 13: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaEspecialA.png">');break;
							case 14: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMedia4qA.png">');break;
							case 15: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaMaestraA.png">');break;
						}
						break;

				}
				break;


			// CASO DONDE SE ELIJIO LA SEGUNDA VARIEDAD
			// TERMINA DE PROCESAR EL ITEM
			case 'segundavar':

				if (promo == 1)
				{
					$.fn.borrarGuarniciones();
					$.fn.borrarGuarnicionesOp();
					$.fn.cargarGuarniciones('#guarnicion',1);
					$.fn.cargarGuarnicionesOp('#guarnicion',1);
				}


				//--------------------------------------------------------------------------------------------------
				//********************************************************************************* SEGUNDA VARIEDAD
				//---------------------------------------------------------------------------------------------------
				switch($('#milanesa').data('selected'))
				{
					//nalga con segunda var
					case 4:
						switch (id)
						{
							case 1: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaAcaballoB.png">');break;
							case 2: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaVerdurasB.png">');break;
							case 3: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaCapresseB.png">');break;
							case 4: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaFugazzetaB.png">');break;
							case 5: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaNapoB.png">');break;
							case 6: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaNapoJB.png">');break;
							case 7: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaVerdeoB.png">');break;
							case 8: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaAcelgaB.png">');break;
							case 9: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaCalabresaB.png">');break;
							case 10: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaCheddarB.png">');break;
							case 11: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaChampignonesB.png">');break;
							case 12: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaJamonCB.png">');break;
							case 13: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaEspecialB.png">');break;
							case 14: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMedia4qB.png">');break;
							case 15: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalgaMedia/nalgaMediaMaestraB.png">');break;
						}
						break;

					//pollo con segunda var
					case 5:
						switch (id)
						{
							case 1: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaAcaballoB.png">');break;
							case 2: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaVerdurasB.png">');break;
							case 3: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaCapresseB.png">');break;
							case 4: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaFugazzetaB.png">');break;
							case 5: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaNapoB.png">');break;
							case 6: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaNapoJB.png">');break;
							case 7: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaVerdeoB.png">');break;
							case 8: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaAcelgaB.png">');break;
							case 9: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaCalabresaB.png">');break;
							case 10: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaCheddarB.png">');break;
							case 11: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaChampignonesB.png">');break;
							case 12: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaJamonCB.png">');break;
							case 13: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaEspecialB.png">');break;
							case 14: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMedia4qB.png">');break;
							case 15: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/polloMedia/polloMediaMaestraB.png">');break;
						} break;

					//peceto con segunda var
					case 6:
						switch (id)
						{
							case 1: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaAcaballoB.png">');break;
							case 2: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaVerdurasB.png">');break;
							case 3: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaCapresseB.png">');break;
							case 4: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaFugazzetaB.png">');break;
							case 5: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaNapoB.png">');break;
							case 6: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaNapoJB.png">');break;
							case 7: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaVerdeoB.png">');break;
							case 8: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaAcelgaB.png">');break;
							case 9: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaCalabresaB.png">');break;
							case 10: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaCheddarB.png">');break;
							case 11: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaChampignonesB.png">');break;
							case 12: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaJamonCB.png">');break;
							case 13: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaEspecialB.png">');break;
							case 14: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMedia4qB.png">');break;
							case 15: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/pecetoMedia/pecetoMediaMaestraB.png">');break;
						}
						break;
					//merluza con segunda var
					case 7:
						switch (id)
						{
							case 1: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaAcaballoB.png">');break;
							case 2: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaVerdurasB.png">');break;
							case 3: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaCapresseB.png">');break;
							case 4: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaFugazzetaB.png">');break;
							case 5: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaNapoB.png">');break;
							case 6: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaNapoJB.png">');break;
							case 7: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaVerdeoB.png">');break;
							case 8: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaAcelgaB.png">');break;
							case 9: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaCalabresaB.png">');break;
							case 10: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaCheddarB.png">');break;
							case 11: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaChampignonesB.png">');break;
							case 12: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaJamonCB.png">');break;
							case 13: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaEspecialB.png">');break;
							case 14: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMedia4qB.png">');break;
							case 15: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluzaMedia/merluzaMediaMaestraB.png">');break;
						}
						break;

					//bobmilanga con segunda var
					case 8:
						switch (id)
						{
							case 1: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaAcaballoB.png">');break;
							case 2: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaVerdurasB.png">');break;
							case 3: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaCapresseB.png">');break;
							case 4: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaFugazzetaB.png">');break;
							case 5: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaNapoB.png">');break;
							case 6: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaNapoJB.png">');break;
							case 7: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaVerdeoB.png">');break;
							case 8: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaAcelgaB.png">');break;
							case 9: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaCalabresaB.png">');break;
							case 10: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaCheddarB.png">');break;
							case 11: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaChampignonesB.png">');break;
							case 12: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaJamonCB.png">');break;
							case 13: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaEspecialB.png">');break;
							case 14: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMedia4qB.png">');break;
							case 15: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilangaMedia/bobmilangaMediaMaestraB.png">');break;
						}
						break;
				}

				if (promo == undefined)
				{
					$('#itemAgregado').modal();
				}



				break;


			// CASO DONDE SE ELIJIO LA UNICA VARIEDAD (ES EL CASO QUE NO QUIERE COMBINAR)
			// TERMINA DE PROCESAR EL ITEM
			case 'unavariedad':

				//----------------------------------------------------------------------------------------------
				//********************************************************************************* UNA VARIEDAD
				//----------------------------------------------------------------------------------------------

				switch($('#milanesa').data('selected'))
				{

					//variedades de nalga y pollo
					case 4:
					case 5:
						switch (id)
						{
							case 1: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalga/nalgaAcaballo.png">');break;
							case 2: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalga/nalgaVerduras.png">');break;
							case 3: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalga/nalgaCapresse.png">');break;
							case 4: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalga/nalgaFugazzeta.png">');break;
							case 5: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalga/nalgaNapo.png">');break;
							case 6: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalga/nalgaNapoJ.png">');break;
							case 7: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalga/nalgaVerdeo.png">');break;
							case 8: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalga/nalgaAcelga.png">');break;
							case 9: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalga/nalgaCalabresa.png">');break;
							case 10: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalga/nalgaCheddar.png">');break;
							case 11: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalga/nalgaChampignones.png">');break;
							case 12: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalga/nalgaJamonC.png">');break;
							case 13: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalga/nalgaEspecial.png">');break;
							case 14: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalga/nalga4q.png">');break;
							case 15: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/nalga/nalgaMaestra.png">');break;
						} break;

					//variedades de peceto
					case 6:
						switch (id)
						{
							case 1: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/peceto/pecetoAcaballo.png">');break;
							case 2: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/peceto/pecetoVerduras.png">');break;
							case 3: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/peceto/pecetoCapresse.png">');break;
							case 4: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/peceto/pecetoFugazzeta.png">');break;
							case 5: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/peceto/pecetoNapo.png">');break;
							case 6: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/peceto/pecetoNapoJ.png">');break;
							case 7: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/peceto/pecetoVerdeo.png">');break;
							case 8: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/peceto/pecetoAcelga.png">');break;
							case 9: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/peceto/pecetoCalabresa.png">');break;
							case 10: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/peceto/pecetoCheddar.png">');break;
							case 11: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/peceto/pecetoChampignones.png">');break;
							case 12: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/peceto/pecetoJamonC.png">');break;
							case 13: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/peceto/pecetoEspecial.png">');break;
							case 14: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/peceto/peceto4q.png">');break;
							case 15: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/peceto/pecetoMaestra.png">');break;
						}
						break;

					//variedades de merluza
					case 7:
						switch (id)
						{
							case 1: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluza/merluzaAcaballo.png">');break;
							case 2: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluza/merluzaVerduras.png">');break;
							case 3: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluza/merluzaCapresse.png">');break;
							case 4: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluza/merluzaFugazzeta.png">');break;
							case 5: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluza/merluzaNapo.png">');break;
							case 6: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluza/merluzaNapoJ.png">');break;
							case 7: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluza/merluzaVerdeo.png">');break;
							case 8: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluza/merluzaAcelga.png">');break;
							case 9: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluza/merluzaCalabresa.png">');break;
							case 10: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluza/merluzaCheddar.png">');break;
							case 11: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluza/merluzaChampignones.png">');break;
							case 12: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluza/merluzaJamonC.png">');break;
							case 13: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluza/merluzaEspecial.png">');break;
							case 14: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluza/merluza4q.png">');break;
							case 15: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/merluza/merluzaMaestra.png">');break;
						}
						break;

					//variedades de bob milanga
					case 8:
						switch (id)
						{
							case 1: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilanga/bobmilangaAcaballo.png">');break;
							case 2: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilanga/bobmilangaVerduras.png">');break;
							case 3: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilanga/bobmilangaCapresse.png">');break;
							case 4: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilanga/bobmilangaFugazzeta.png">');break;
							case 5: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilanga/bobmilangaNapo.png">');break;
							case 6: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilanga/bobmilangaNapoJ.png">');break;
							case 7: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilanga/bobmilangaVerdeo.png">');break;
							case 8: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilanga/bobmilangaAcelga.png">');break;
							case 9: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilanga/bobmilangaCalabresa.png">');break;
							case 10: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilanga/bobmilangaCheddar.png">');break;
							case 11: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilanga/bobmilangaChampignones.png">');break;
							case 12: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilanga/bobmilangaJamonC.png">');break;
							case 13: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilanga/bobmilangaEspecial.png">');break;
							case 14: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilanga/bobmilanga4q.png">');break;
							case 15: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilanga/bobmilangaMaestra.png">');break;
						}
						break;

					//variedades de calabaza
					case 9:
						switch (id)
						{
							case 1: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/calabaza/calabazaAcaballo.png">');break;
							case 2: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/calabaza/calabazaVerduras.png">');break;
							case 3: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/calabaza/calabazaCapresse.png">');break;
							case 4: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/calabaza/calabazaFugazzeta.png">');break;
							case 5: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/calabaza/calabazaNapo.png">');break;
							case 6: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/calabaza/calabazaNapoJ.png">');break;
							case 7: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/calabaza/calabazaVerdeo.png">');break;
							case 8: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/calabaza/calabazaAcelga.png">');break;
							case 9: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/calabaza/calabazaCalabresa.png">');break;
							case 10: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/calabaza/calabazaCheddar.png">');break;
							case 11: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/calabaza/calabazaChampignones.png">');break;
							case 12: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/calabaza/calabazaJamonC.png">');break;
							case 13: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/calabaza/calabazaEspecial.png">');break;
							case 14: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/calabaza/calabaza4q.png">');break;
							case 15: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/calabaza/calabazaMaestra.png">');
								break;
						}
						break;

				}
				$('#itemAgregado').modal();
				break;

			// CASO DONDE SE ELIJIO LA MEDIA VARIEDAD
			// TERMINA DE PROCESAR EL ITEM
			case 'mediavariedad':
				//variedades de media nalga
				switch($('#milanesa').data('selected'))
				{
					//mediaNalga
					case 1:

						switch (id)
						{
							case 1: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaNalga/mediaNalgaAcaballo.png">');break;
							case 2: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaNalga/mediaNalgaVerduras.png">');break;
							case 3: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaNalga/mediaNalgaCapresse.png">'); break;
							case 4: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaNalga/mediaNalgaFugazzeta.png">'); break;
							case 5: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaNalga/mediaNalgaNapo.png">');break;
							case 6: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaNalga/mediaNalgaNapoJ.png">');break;
							case 7: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaNalga/mediaNalgaVerdeo.png">');break;
							case 8: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaNalga/mediaNalgaAcelga.png">');break;
							case 9: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaNalga/mediaNalgaCalabresa.png">');break;
							case 10: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaNalga/mediaNalgaCheddar.png">');break;
							case 11: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaNalga/mediaNalgaChampignones.png">');break;
							case 12: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaNalga/mediaNalgaJamonC.png">');break;
							case 13: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaNalga/mediaNalgaEspecial.png">');break;
							case 14: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaNalga/mediaNalga4q.png">');break;
							case 15: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaNalga/mediaNalgaMaestra.png">');break;
						}
						break;

					//mediaPollo
					case 2:

						switch (id)
						{
							case 1: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPollo/mediaPolloAcaballo.png">');break;
							case 2:	$('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPollo/mediaPolloVerduras.png">');break;
							case 3: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPollo/mediaPolloCapresse.png">');break;
							case 4: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPollo/mediaPolloFugazzeta.png">');break;
							case 5: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPollo/mediaPolloNapo.png">');break;
							case 6: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPollo/mediaPolloNapoJ.png">');break;
							case 7: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPollo/mediaPolloVerdeo.png">');break;
							case 8: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPollo/mediaPolloAcelga.png">');break;
							case 9: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPollo/mediaPolloCalabresa.png">');break;
							case 10: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPollo/mediaPolloCheddar.png">');break;
							case 11: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPollo/mediaPolloChampignones.png">');break;
							case 12: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPollo/mediaPolloJamonC.png">');break;
							case 13: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPollo/mediaPolloEspecial.png">');break;
							case 14: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPollo/mediaPollo4q.png">');break;
							case 15: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPollo/mediaPolloMaestra.png">');break;
						}
						break;

					//mediaPeceto
					case 3:

						switch (id)
						{
							case 1: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPeceto/mediaPecetoAcaballo.png">');break;
							case 2: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPeceto/mediaPecetoVerduras.png">');break;
							case 3: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPeceto/mediaPecetoCapresse.png">');break;
							case 4: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPeceto/mediaPecetoFugazzeta.png">');break;
							case 5: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPeceto/mediaPecetoNapo.png">');break;
							case 6: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPeceto/mediaPecetoNapoJ.png">');break;
							case 7: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPeceto/mediaPecetoVerdeo.png">');break;
							case 8: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPeceto/mediaPecetoAcelga.png">');break;
							case 9: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPeceto/mediaPecetoCalabresa.png">');break;
							case 10: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPeceto/mediaPecetoCheddar.png">');break;
							case 11: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPeceto/mediaPecetoChampignones.png">');break;
							case 12: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPeceto/mediaPecetoJamonC.png">');break;
							case 13: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPeceto/mediaPecetoEspecial.png">');break;
							case 14: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPeceto/mediaPeceto4q.png">');break;
							case 15: $('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/mediaPeceto/mediaPecetoMaestra.png">');break;
						}
						break;
				}


				$('#itemAgregado').modal();


				switch (promo){
					case 2:
						$.fn.borrarGuarniciones();
						$.fn.cargarGuarniciones('#promocion',2);
						$.fn.borrarGuarnicionesOp();
						$.fn.cargarGuarnicionesOp('#promocion',2);
						break;
				}

				break;
			/**** FIN MILANESAS ****/




			/***** SANDWICHES *****/

			// CASO DONDE SE ELIJIO EL SANDWICH
			// PREPARA EL HANDLER PARA PROCESAR LOS AGREGADOS
			case 'sandwich':

				$('#agregados input[type=checkbox]').on('click', function() {//Este handler luego lo elimino con .off() para que no se adjunte mas de una vez.
					//$('#agregados input[type=checkbox]').click(function(){

					if ($(this).is(":checked") == true) {

						$('#finAgregados').data('desc', $('#finAgregados').data('desc') + $(this).val() + ' ');
						$('#finAgregados').data("precio", parseInt($('#finAgregados').data("precio")) + parseInt($(this).data("precio")));
						console.log('agregados: ' + $('#finAgregados').data('desc'));
						console.log('Costo agregados: ' + $('#finAgregados').data("precio"));

						if ($('#finAgregados').data('precio') != 0)
							$('#finAgregados').data('type', 'suma');
					} else {

						$('#finAgregados').data('desc', $('#finAgregados').data('desc').replace($(this).val() + ' ', ''));
						$('#finAgregados').data("precio", parseInt($('#finAgregados').data("precio")) - parseInt($(this).data("precio")));
						console.log('agregados: ' + $('#finAgregados').data('desc'));
						console.log('Costo agregados:' + $('#finAgregados').data("precio"));

						if ($('#finAgregados').data('precio') == 0)
							$('#finAgregados').data('type', 'nosuma');
					}
				});


				$('#mesa .plato1').remove();
				//IF HAMBURGUESA O MILANESA
				if (descripcion=="Hamburguesa")
					$('#mesa').append('<img class="img-responsive plato1" src="assets/img/sandwiches/hamburguesa.png">');
				else if(descripcion=="Milanesa")
					$('#mesa').append('<img class="img-responsive plato1" src="assets/img/sandwiches/milanesa.png">');

				break;

			// CASO DONDE SE ELIJIERON LOS AGREGADOS DEL SANDWICH
			// TERMINA DE PROCESAR EL ITEM
			case 'agregados':
				// RESETEO LOS DATOS DE LOS AGREGADOS!
				// POR SI YA HABIA AGREGADO ALGUN SANDWICH AL PEDIDO
				$('#agregados input[type=checkbox]').each(function() {
					if ($(this).is(":checked") == true) {
						$(this).attr('checked', false);
					}
				});
				$('#finAgregados').data('precio', 0);
				$('#finAgregados').data('desc', ' ');
				$('#finAgregados').data('type', 'nosuma');
				$('#agregados input[type=checkbox]').off();
				//elimino el handler, porque en la iteracion se vuelve a agregar! Si no se ejecuta mas de una vez!


				$('#itemAgregado').modal();
				break;

			/***** FIN SANDWICHES *****/

			/***** GUARNICIONES *****/

			// CASO DONDE SE ELIJIO LA GUARNICION
			// DEPENDIENDO DE LA GUARNICION ELEJIDA SE PREPARAN LAS OPCIONES
			// SE PASA INFORMACIÓN AL PANEL CORRESPONDIENTE O TERMINA DE PROCESA EL ITEM
			case 'guarnicion':

				switch(descripcion) {
					case 'Puré':
						$('#finPure').data('precio', precio);
						$('#finPure').data('desc', descripcion);
						break;
					case 'Papas fritas':
					case 'Batatas fritas':

						//Le paso el id de este boton para luego saber en pob-opcion cual de las dos elijio
						$('#finPorcion').data('id', id);
						$('#finPorcion').data('precio', precio);
						$('#finPorcion').data('desc', descripcion);
						break;
					case 'Ensalada':
						$('#finEnsalada').data('precio', precio);
						$('#finEnsalada').data('desc', descripcion);
						break;
					case 'Empanada':
						$('#finEmpanada').data('precio', precio);
						$('#finEmpanada').data('desc', descripcion);
						break;
					default:
						$('#mesa .plato2').remove();
						//$('#mesa').append('<img src="/assets/img/mesa_si.jpg" width="400"/>');
						$('#mesa').append('<img class="img-responsive plato2" src="assets/img/guarniciones/tortilla.png">');
						$('#itemAgregado').modal();
						break;

				}


				switch(promo){
					case 1:
						cont++;
						if (descripcion == 'Tortilla de papa' && cont == 1)
						{
							$.fn.borrarGuarniciones();
							$.fn.borrarGuarnicionesOp();
							$.fn.cargarGuarniciones('#bebida',1);
							$.fn.cargarGuarnicionesOp('#bebida',1);
							$.fn.borrarBebidas();
							$.fn.borrarBebidasOp();
							$.fn.cargarBebidas('#promocion',1);
							$.fn.cargarBebidasOp('#promocion',1);
						}
						break;
					case 2:


						break;
				}




				break;

			// CASOS DONDE SE ELIJIO LA OPCION DE GUARNICION
			// TERMINA DE PROCESAR EL ITEM
			case 'pure-opcion':
				descripcion = descripcion + ' (' + $('#pure-opcion input[name=pure]:checked').val() + ')';
				//alert("Item agregado con exito!");
				if(promo == 1)
				{
					$.fn.borrarGuarniciones();
					$.fn.borrarGuarnicionesOp();
					$.fn.cargarGuarniciones('#bebida',1);
					$.fn.cargarGuarnicionesOp('#bebida',1);
					$.fn.borrarBebidas();
					$.fn.borrarBebidasOp();
					$.fn.cargarBebidas('#promocion',1);
					$.fn.cargarBebidasOp('#promocion',1);
				}
				$('#mesa .plato2').remove();
				//$('#mesa').append('<img src="/assets/img/mesa_si.jpg" width="400"/>');
				switch($('#pure-opcion input[name=pure]:checked').val()){
					case 'papa':  $('#mesa').append('<img class="img-responsive plato2" src="assets/img/guarniciones/purepapa.png">'); break;
					case 'calabaza':  $('#mesa').append('<img class="img-responsive plato2" src="assets/img/guarniciones/purecalabaza.png">'); break;
					case 'mixto':  $('#mesa').append('<img class="img-responsive plato2" src="assets/img/guarniciones/puremixto.png">'); break;
				}

				$('#itemAgregado').modal();
				break;
			case 'pob-opcion':

				if ($('#pob-opcion input[name=porcion]:checked').val() == 2) {
					precio = precio / 2;
					descripcion = descripcion + ' (1/2 porcion)';
				}
				//alert("Item agregado con exito!");
				if(promo == 1)
				{
					$.fn.borrarGuarniciones();
					$.fn.borrarGuarnicionesOp();
					$.fn.cargarGuarniciones('#bebida',1);
					$.fn.cargarGuarnicionesOp('#bebida',1);
					$.fn.borrarBebidas();
					$.fn.borrarBebidasOp();
					$.fn.cargarBebidas('#promocion',1);
					$.fn.cargarBebidasOp('#promocion',1);
				}
				$('#mesa .plato2').remove();
				//$('#mesa').append('<img src="/assets/img/mesa_si.jpg" width="400"/>');
				console.log('id: '+id);
				switch(id){

					case 2: $('#mesa').append('<img class="img-responsive plato2" src="assets/img/guarniciones/papas.png">'); break;
					case 3: $('#mesa').append('<img class="img-responsive plato2" src="assets/img/guarniciones/batatas.png">'); break;
					};


				$('#itemAgregado').modal();
				break;
			case 'ensalada-opcion':
				console.log($('#ensalada-opcion input:checked'));
				descripcion = descripcion + ' (';
				$('#ensalada-opcion input:checked').each(function() {
					descripcion = descripcion + $(this).val() + ' ';
				});
				descripcion = descripcion + ')';
				//alert("Item agregado con exito!");
				if(promo == 1)
				{
					$.fn.borrarGuarniciones();
					$.fn.borrarGuarnicionesOp();
					$.fn.cargarGuarniciones('#bebida',1);
					$.fn.cargarGuarnicionesOp('#bebida',1);
					$.fn.borrarBebidas();
					$.fn.borrarBebidasOp();
					$.fn.cargarBebidas('#promocion',1);
					$.fn.cargarBebidasOp('#promocion',1);
				}
				$('#mesa .plato2').remove();
				//$('#mesa').append('<img src="/assets/img/mesa_si.jpg" width="400"/>');
				$('#mesa').append('<img class="img-responsive plato2" src="assets/img/guarniciones/tomate.png">');
				$('#mesa').append('<img class="img-responsive plato2" src="assets/img/guarniciones/cebolla.png">');
				$('#mesa').append('<img class="img-responsive plato2" src="assets/img/guarniciones/zanahoria.png">');
				$('#mesa').append('<img class="img-responsive plato2" src="assets/img/guarniciones/huevo.png">');
				$('#mesa').append('<img class="img-responsive plato2" src="assets/img/guarniciones/lechuga.png">');
				$('#mesa').append('<img class="img-responsive plato2" src="assets/img/guarniciones/rucula.png">');
				$('#itemAgregado').modal();
				break;
			case 'empanada-opcion':
				descripcion = descripcion + ' (' + $('#empanada-opcion input[name=empanada]:checked').val() + ')';
				//alert("Item agregado con exito!");
				if(promo == 1)
				{
					$.fn.borrarGuarniciones();
					$.fn.borrarGuarnicionesOp();
					$.fn.cargarGuarniciones('#bebida',1);
					$.fn.cargarGuarnicionesOp('#bebida',1);
					$.fn.borrarBebidas();
					$.fn.borrarBebidasOp();
					$.fn.cargarBebidas('#promocion',1);
					$.fn.cargarBebidasOp('#promocion',1);
				}
				$('#mesa .plato2').remove();
				//$('#mesa').append('<img class="mesa" src="/assets/img/mesa_si.jpg" width="400"/>');

				console.log($('#empanada-opcion input[name=empanada]:checked').val());
				switch($('#empanada-opcion input[name=empanada]:checked').val()){
					case 'jyq':  $('#mesa').append('<img class="img-responsive plato2" src="assets/img/guarniciones/empjyq.png">'); break;
					case 'carne':  $('#mesa').append('<img class="img-responsive plato2" src="assets/img/guarniciones/empanadaCarne.png">'); break;
				}

				break;
			/***** FIN GUARNICIONES *****/




			case 'promocion':
				switch(promo)
				{
					case 1:
						cont= 0;
						$('#milanesa').data('selected',8);
						$('#mesa').append('<img class="img-responsive mesa_bob" src="assets/img/mesa_bob.png">');
						$('#mesa').append('<img class="img-responsive plato1" src="assets/img/milanesas/bobmilanga/bobmilanga.png">');
						$.fn.borrarVariedades('#primeravar');
						$.fn.cargarVariedades('#primeravar',8,2,'#segundavar',1);
						break;
					case 2:
						$.fn.borrarMilanesas();
						$.fn.cargarMilanesas('#mediavariedad',2);
						//$.fn.borrarVariedades('#mediavariedad');
						//$.fn.cargarVariedades('#mediavariedad',1,1,'#guarnicion',2);
						break;
					case 3:
						$.fn.borrarMilanesas();
						$.fn.cargarMilanesas('#guarnicion',3);
				}


				break;




			/***** BEBIDAS *****/

			// CASO DONDE SE ELIJIO LA BEBIDA
			// SE PASA LA INFORMACIÓN AL PANEL DE SABOR
			case 'bebida':

				$('#finSabor').data('precio', precio);
				$('#finSabor').data('desc', descripcion);
				break;

			// CASO DONDE SE ELIJIO EL SABOR DE LA BEBIDA
			// TERMINA DE PROCESAR EL ITEM
			case 'sabor-bebida':
				//$('#finSabor').data('desc',$('#finSabor').data('desc')+' ('+$('#sabor-bebida input[name=sabor]').val()+')');
				// lo anterior no funciona porque ya se definio la variable descripcion y luego se usa con el contenido que ya tenia
				// hay que usar la variable descripcion en este caso.
				descripcion = descripcion + ' (' + $('#sabor-bebida input[name=sabor]:checked').val() + ')';
				//console.log($('#finSabor').data('desc'));
				//alert("Item agregado con exito!");
				break;
			/***** FIN BEBIDAS *****/
		}




		//AGREGAR ITEM A LA TABLA DE PEDIDO SI CORRESPONDE
		if (tipo == 'suma')
		{

			//Calcular numero de item
			var item_numero = $('#detalle tbody tr').length + 1;

			//Calcular precio total actual del pedido
			var totalAct = 0;
			$('#detalle tbody tr td:last').each(function() {
				totalAct += parseFloat($(this).html());
			});

			//Insertar el nuevo item
			var row = $('<tr></tr>').appendTo('#detalle tbody');
			$('<td></td>').html(item_numero).appendTo(row);
			$('<td></td>').html(descripcion).appendTo(row);
			$('<td></td>').html(precio).appendTo(row);
			$('<td></td>').html(totalAct + precio).appendTo(row);

			//Crear string del item pedido para mandar por mail

			s += descripcion + " " + precio + "\n";
		}

		//avanzar al siguiente paso
		$(this).tab('show');
	});


//OTRAS ACCIONES //////////////////////////////////////////7


  $('#address-continue').click(function(e)
	{
		//e.preventDefault();
    $('#address').modal('hide');

  });

	$('#continuar').click(function(e)
	{
		e.preventDefault();
		$('#itemAgregado').modal('hide');
	});


	$('#resetear').click(function(e)
	{
		e.preventDefault();
		window.location = "/pedido.php";
	});

	$('#finalizar').click(function(e)
	{
		//e.preventDefault();
		//var items = $('#detalle').clone();
		$('#cancelar').before($('#detalle').clone());
		$('#ticket').modal();
	});

	$('#confirmar').click(function(e)
	{
		e.preventDefault();
		//var items = $('#detalle').clone();
		//$('#cancelar').before(items);
		$('#ticket').modal('hide');
		$('#ticket-confirmar').modal();
	});

	$('#envio').change(function(){

		if ($(this).prop('checked')){
			$('#dir_calle').prop('disabled',false);
			$('#dir_calle').prop('required',false);
			$('#dir_numero').prop('disabled',false);
			$('#dir_numero').prop('required',false);
			$('#dir_piso').prop('disabled',false);
			$('#dir_depto').prop('disabled',false);
			$('#costo_delivery').show();
		} else {
			$('#dir_calle').prop('disabled',true);
			$('#dir_numero').prop('disabled',true);
			$('#dir_piso').prop('disabled',true);
			$('#dir_depto').prop('disabled',true);
			$('#costo_delivery').hide();
		}

	});

	$("#form-pedido").submit(function(e)
	{
		e.preventDefault();
    //ocultar el ticket-confirmar
    $('#ticket-confirmar').modal('hide');
    $("html, body").animate({ scrollTop: 0 }, "slow");
    var costo_envio = 0;
    var direccion;
    if (DELIVERY == true) {
      costo_envio = 20;
    }

		s += "\nTotal: $"+ (parseFloat($('#detalle tbody tr td:last').html()) + parseFloat(costo_envio));
		$('#detalle-pedido').val(s);
		console.log(s);
		datos = $('#form-pedido').serialize();
    console.log(datos);
    datos += '\&delivery=' + encodeURI(DELIVERY);
    datos += '\&sucursal=' + encodeURI(SUCURSAL);
    if (DIRECCION !== undefined) {
      datos += '\&direccion=' + encodeURI(DIRECCION);
    }
		console.log(datos);
		$.post('envia_pedido.php', datos, function(response)
		{
			$('#ticket-resultado .modal-body').prepend(response);
			console.log('Total'+$('#detalle tbody tr td:last').html());
      var sucursal= '';
      if (SUCURSAL == 1) {
        sucursal = "Avellaneda 2553";
      } else if (SUCURSAL == 2){
        sucursal = "Av. Tejedor 707";
      }

      //var options = {'total': parseFloat($('#detalle tbody tr td:last').html()) + parseFloat(costo_envio),
      var options = {'total': 20,
												'comprador': $('#nombre').val(),
												'mail': $('#mail').val(),
                        'sucursal': SUCURSAL,
                      };
      if (DIRECCION !== undefined) {
        options.direccion = DIRECCION;
      }

			$.post('create_mp_preference.php', options, function(ref)
			{

				$('#continuarCondicionPago').data('url',ref);
				$('#ticket-resultado').modal();
			});

		});
	});

	$('#ticket-resultado').on('hidden', function()
	{
		window.location = "/pedido.php";
	});



	$('.modal-ticket #cancelar').click(function(e)
	{
		e.preventDefault();
		$('.modal-ticket').modal('hide');

	});

	$('.modal-ticket').on('hidden.bs.modal', function(e)
	{
		// do something…
		console.log('cerro modal');
		$('.modal-ticket').find('table').remove();
	});



	$('#gracias').click(function(e)
	{
		e.preventDefault();
		$('#ticket-resultado').modal('hide');
		$('#finalizar').attr("disabled", "disabled");

	});

  $('#pagar-ahora').click(function(e)
  {
    $('#condicionPago').modal();
  });


	$('#continuarCondicionPago').click(function(e)
	{
		//e.preventDefault();
    $('#condicionPago').modal('hide');
		$MPC.openCheckout ({
		    url: $(this).data('url'),
		    mode: "modal",
		    onreturn: function(data) {
		        // execute_my_onreturn (Only modal)

		        /* ESTO SE EJECUTA SI LA PERSONA CIERRA LA VENTANA DE PAGO
		        if (data.collection_status=='approved'){

				    alert ('Payment credited: '+data);

				} else if(data.collection_status=='pending'){

				    alert ('The user has not completed the payment');

				} else if(data.collection_status=='in_process'){

				    alert ('Payment is being reviewed');

				} else if(data.collection_status=='rejected'){

				    alert ('Payment was rejected, the user can retry payment');

				} else if(data.collection_status==null){

				    alert ('The user has not completed the payment process and no payment has been generated');

				}
		        */

		    }
		});
    $('#ticket-resultado').modal('hide');
		$('#finalizar').attr("disabled", "disabled");
	});




	//BOTONERA - ACTIVAR BOTON CORRESPONDIENTE AL SELECCIONADO
	$('#menu-pedido li').click(function()
	{

		console.log($(this).find('span').text());
		var option = $(this).find('span').text();
		switch (option)
		{

			case 'milanesas':
				$('.tab-content a[href="#milanesa"]').tab('show');
				$('#menu-pedido li div').removeClass('circle-active').addClass('circle');
				$(this).find('div').addClass('circle-active');
				$.fn.borrarMilanesas();
				$.fn.cargarMilanesas();
				break;
			case 'sandwiches':
				$('.tab-content a[href="#sandwich"]').tab('show');
				$('#menu-pedido li div').removeClass('circle-active').addClass('circle');
				$(this).find('div').addClass('circle-active');
				break;
			case 'guarniciones':
				$('.tab-content a[href="#guarnicion"]').tab('show');
				$('#menu-pedido li div').removeClass('circle-active').addClass('circle');
				$(this).find('div').addClass('circle-active');
				$.fn.borrarGuarniciones();
				$.fn.borrarGuarnicionesOp();
				$.fn.cargarGuarniciones();
				$.fn.cargarGuarnicionesOp();
				break;
			case 'promociones':
				$('.tab-content a[href="#promocion"]').tab('show');
				$('#menu-pedido li div').removeClass('circle-active').addClass('circle');
				$(this).find('div').addClass('circle-active');
				break;
			case 'bebidas':
				$('.tab-content a[href="#bebida"]').tab('show');
				$('#menu-pedido li div').removeClass('circle-active').addClass('circle');
				$(this).find('div').addClass('circle-active');
				$.fn.borrarBebidas();
				$.fn.borrarBebidasOp();
				$.fn.cargarBebidas();
				$.fn.cargarBebidasOp();
				break;
		}
	});


	$('.mesa-reservation-margin').css('height',$('#mesa img').css('height'));

	$(window).resize(function(){$('.mesa-reservation-margin').css('height',$('#mesa img').css('height'));});
	//$(document).resize(function(){$('.mesa-reservation-margin').css('height',$('#mesa img').css(height));});

});