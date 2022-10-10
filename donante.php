<?php
$response = '';
    // (A) PROCESS RESERVATIONs



if (isset($_POST["link"])) {
	require "2-reserve.php";
	if ($_RSV->save($_POST["monto"],
		$_POST["bloques"],
		$_POST["don_name"],
		$_POST["don_telefono"],
		$_POST["don_mail"],
		$_POST["don_link"],
		$_POST["publicidad"])) {
		echo "<div class='ok'>Donation saved.</div>";
/*
	$user_email = $_POST['i_mail'];
	$user_name=$_POST['i_name'];
	$user_start=$_POST['i_start'];
	$user_end=$_POST['i_end'];
	$to      = $user_email;
	// Mail from
	$from    = 'gutete@gutetesurveys.com';
	// Mail subject
	$subject = 'Tu pequecita está confirmada';
	// Mail headers
	$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'Return-Path: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
	ob_start();
	include 'email-template.php';
	$email_template = ob_get_clean();
	if (mail($to, $subject, $email_template, $headers)) {
		// Success
		$response = '<img src="asf.png" id="imgpremio" class="survey-form">';		
	} else {
		// Fail
		$response = '<h3>Error!</h3><p>Message could not be sent! Please check your mail server settings!</a>';
	}

} 
else { echo "<div class='err'>".$_RSV->error."</div>"; }
*/
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,minimum-scale=1">
	<title>Donativos Entrepeques</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>
</head>
<body>
	


	<form class="survey-form" method="post" target="_self" action="" id="res_form">
		<h1> <img src="https://entrepequestienda.com/wp-content/uploads/2020/12/logo-entre-peques.jpg" id="imgprinc"></h1>
		<div class="steps">
			<div class="step current"></div>
			<div class="step"></div>
			<div class="step"></div>
		</div>
		<!-- Primera Sección -->

		<div class="step-content current" data-step="1">
			<div class="fields" id="Prods">


				<!-- Pregunta 3 -->	
				<!-- Pregunta 4 -->	

				<div>
					
					<!-- Pregunta 3 -->	
					<p></p>
					<div class="form-group">
						<label class="control-label">Monto del donativo</label>
						<input id="colorful" class="form-control prods_amount" type="number" value="10" min="10" step="10" name="monto" />
					</div>
					<p>Bloques reservados</p>
					<div class="group">
						<input type="text"  name="bloques">


					</div>	
				</div>
			</div>

			<!-- Bot[on] -->	
			<div class="buttons">
				<a href="#" class="btn" data-set-step="2">Siguiente</a>
			</div>
		</div>

		<!-- Sección 5-->
		<div class="step-content" data-step="2">
			<div class="fields">


				<label for="res_name">Nombre</label>
				<div class="field">
					<i class="fas fa-envelope"></i>
					<input type="text" id="idname" required name="don_name" placeholder="Pequenombre"/>
				</div>


				<label for="res_tel">Teléfono de contacto</label>
				<div class="field">
					<i class="fas fa-envelope"></i>
					<input type="tel" required name="don_telefono" id="tel" placeholder="solo te llamaremos si es necesario" maxlength="10" minlength="10" />
				</div>



				<label for="email">Correo Electrónico</label>
				<div class="field">
					<i class="fas fa-envelope"></i>
					<input id="email" type="email" name="don_mail" placeholder="Tu e-mail" required>
				</div>

				<label for="email">Link</label>
				<div class="field">
					<i class="fas fa-envelope"></i>
					<input id="email" type="email" name="don_link" value="Sin link" required>
				</div>
				<label><input type="checkbox" id="cbox1" value="first_checkbox" name="publicidad">¿Quieres recibir publicidad?</label>


				<div class="buttons">
					<a href="#" class="btn alt" data-set-step="1">Anterior</a>

					<input type="submit" class="btn" name="submit" value="Reservar" id="checkBtn" >
				</div>
			</div>
		</div>

		<!-- page 6 -->

		<div class="step-content" data-step="3">
			<div class="result"><?=$response?></div>
		</div>


	</form>


	<script>


		function qualcontrol (){

			var quality = document.querySelectorAll('.freq');
			var check_complete =0;
			quality.forEach(element => {
				if (element.value == 1){
					alert("Solo compramos productos en buena y excelente condición");
					element.value=2;
				}
			}
			);



		}

		function refresh_calendar(){
			var dummy=document.getElementById('calendar-es').value;
			var dummy2=document.getElementById('calendar-es');
			dummy2.value=dummy;
		}


		function convertDate(inputFormat) {
			function pad(s) { return (s < 10) ? '0' + s : s; }
			var d = new Date(inputFormat);
			var d2= [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('-');
			var d5="00";

			var d3= [pad(d.getHours()), pad(d.getMinutes()), d5].join(':');

			var d4= d2 + ' ' + d3 ;
			return d4
		}

		var sum;
		var dateobjform;
		var start2;
		var endobj;
		var dateobjform2;
		var dateobjstart;
		var ropam50;

		function timeformat(){
			ropam50=0;

			$('.prod_selection').each(function(){
				if (this.value.includes("Ropa")){
					ropam50+=1;
				}
			});



			var day = document.getElementById('calendar-es').value;
			var hourmin = $("input[type='radio'][name='res_time']:checked").val();
			var timestring=  hourmin;
			var dateobj= day + ' ' + timestring ;
			document.getElementById('eventTime2').value=dateobj;
			var date = day;
			var datearray = date.split("-");
			var newdate = datearray[1] + '/' + datearray[0] + '/' + datearray[2];
			var date2obj= newdate + ' ' + timestring ;
			dateobjform= new Date(date2obj);
			dateobjform2= new Date(date2obj);
			dateobjstart=new Date(date2obj);

			console.log(ropam50);


			if ((sum>15 && ropam50==0)||(sum>50 && ropam50!=0)){



				start2 = new Date (dateobjform.setMinutes(dateobjform.getMinutes() + 45));
				endobj = new Date (dateobjform2.setMinutes(dateobjform2.getMinutes() + 90));
				var et1=convertDate(endobj);
				document.getElementById('endTime2').value=et1;



			}else{

				endobj = new Date (dateobjform.setMinutes(dateobjform.getMinutes() + 45));
				var et1=convertDate(endobj);
				document.getElementById('endTime2').value=et1;
			}

		}

		$('#res_form').submit(function() {
    // DO STUFF...
    if (sum>15){
    	var CDname = document.getElementById('idname').value;
    	var CDmail = document.getElementById('email').value;
    	var CDtel = document.getElementById('tel').value;
    	document.getElementById('i_name').value=[CDname,CDname];
    	document.getElementById('i_mail').value=[CDmail,CDmail];
    	document.getElementById('i_tel').value=[CDtel,CDtel];
    	document.getElementById('i_start').value=[dateobjstart.valueOf(),start2.valueOf()];
    	document.getElementById('i_end').value=[endobj.valueOf(),endobj.valueOf()];	
    }else{
    	var CDname = document.getElementById('idname').value;
    	var CDmail = document.getElementById('email').value;
    	var CDtel = document.getElementById('tel').value;
    	document.getElementById('i_name').value=[CDname];
    	document.getElementById('i_mail').value=[CDmail];
    	document.getElementById('i_tel').value=[CDtel];
    	document.getElementById('i_start').value=[dateobjstart.valueOf()];
    	document.getElementById('i_end').value=[endobj.valueOf()];	
    }
    return true;
});




		var res = [];
	var JRL; //Juguetes o Ropa Cita Larga
	function checkAv(selected_day) {
		sum=0;
		JRL=0;
		$('.prods_amount').each(function(){
			sum += parseFloat(this.value);
		});
		$('.prod_selection').each(function(){
			if ((this.value.includes("Ropa") && sum>50)||(this.value.includes("Juguete") && sum>15)){
				JRL+=1;
			}
		});
		console.log(JRL);

		res = [];
		$.ajax({
			type: "GET",
			url: "AvailableTimes.php?selected_day="+selected_day,   
			dataType: 'JSON',            
			success: function(data){


				var data = JSON.stringify(data);
				var obj = JSON.parse(data);
				for(var i in obj){
					res.push(obj[i]);
				}
				$("#cboxes").empty();

				var horarios = res;


				var myDiv = document.getElementById("cboxes");
				if (JRL==0){
					if (sum>15){
						var lasttime = ["10:45:00",  "11:30:00",  "12:15:00",  "13:00:00", "16:00:00", "16:45:00"];
						horarios = horarios.filter(element => lasttime.includes(element));
					}
					if (horarios.length>0){
						for (var i = 0; i < horarios.length; i++) {
							var radio = document.createElement("input");
							var label = document.createElement("label");
							radio.name = "res_time";
							radio.type = "radio";
							radio.id = i;
							radio.value = horarios[i];
							label.name
							label.for=i;
							label.innerHTML = horarios[i];
							myDiv.appendChild(radio);
							myDiv.appendChild(label);
							//label.appendChild(document.createTextNode(horarios[i]));
							label.innerHTML = horarios[i];
						}
						
						$("#cboxes").on("change","input",function()
						{
							timeformat();
						});}
						else{
							var cancel = document.createElement("p");
							cancel.innerHTML="<br> No hay horarios disponibles";
							myDiv.appendChild(cancel);
						}


					}else if(JRL!=0 ) {
						var no_dispo = ["10:45:00","16:00:00","16:45:00"];
						var intersection = horarios.filter(element => no_dispo.includes(element));
						if (intersection.length>0){
							for (var i = 0; i < intersection.length; i++) {
								var radio = document.createElement("input");
								var label = document.createElement("label");
								radio.name = "res_time";
								radio.type = "radio";
								radio.id = i;
								radio.value = intersection[i];
								label.name
								label.for=i;
								label.innerHTML = intersection[i];
								myDiv.appendChild(radio);
								myDiv.appendChild(label);
							//label.appendChild(document.createTextNode(horarios[i]));
							label.innerHTML = intersection[i];
						}
						
						$("#cboxes").on("change","input",function()
						{
							timeformat();
						});}
						else{
							var cancel = document.createElement("p");
							cancel.innerHTML="<br> No hay horarios disponibles";
							myDiv.appendChild(cancel);
						}
					}
					else{
						var cancel = document.createElement("p");
						cancel.innerHTML="<br> No hay horarios disponibles";
						myDiv.appendChild(cancel);
					}
				}
			});
	}
</script>



<script>
	const setStep = step => {
		document.querySelectorAll(".step-content").forEach(element => element.style.display = "none");
		document.querySelector("[data-step='" + step + "']").style.display = "block";
		document.querySelectorAll(".steps .step").forEach((element, index) => {
			index < step-1 ? element.classList.add("complete") : element.classList.remove("complete");
			index == step-1 ? element.classList.add("current") : element.classList.remove("current");
		});
	};
	document.querySelectorAll("[data-set-step]").forEach(element => {
		element.onclick = event => {

			var selected_cats = document.querySelectorAll('.prod_selection');
			var check_complete =0;
			selected_cats.forEach(element => {
				if (element.selectedIndex == 0){
					alert("Por favor selecciona los productos faltantes");
					check_complete=1;
				}
			}
			);

			if (check_complete==0){
				event.preventDefault();
				setStep(parseInt(element.dataset.setStep));
			}



		};
	});
	<?php if (!empty($_POST)): ?>
		setStep(3);
	<?php endif; ?>
</script>

<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js" ></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<script src="bootstrap-number-input.js" ></script>
<script>
// Remember set you events before call bootstrapSwitch or they will fire after bootstrapSwitch's events
$("[name='checkbox2']").change(function() {
	if(!confirm('Do you wanna cancel me!')) {
		this.checked = true;
	}
});

$('#after').bootstrapNumber();
$('#colorful').bootstrapNumber({
	upClass: 'success',
	downClass: 'danger'
});
</script>

<script>

	function addInput(){
		var newdiv = document.createElement('div');
        //newdiv.id = dynamicInput[counter];
        newdiv.innerHTML = `
        De esta lista, ¿cuál es el juego que más te gusta? <input type='button' value='X' onClick='removeInput(this);'>
        <div>
        <select name="prod_selection" id="prod_selection" class="prod_selection" style="text-align: center;" required>

        <option  selected value>Nuestras categorías</option>
        <option value="Accesorios de recámara">Accesorios de recámara</option>
        <option value="Alimentación" disabled>Alimentación No estamos comprando por el momento</option>
        <option value="Andaderas y brincolines" disabled>Andaderas y brincolines No estamos comprando por el momento</option>
        <option value="Bañeras, bañitos y tinas" disabled>Bañeras, bañitos y tinas No estamos comprando por el momento</option>
        <option value="Bicis y montables">Bicis y montables</option>
        <option value="Calzado para niña">Calzado para niña</option>
        <option value="Calzado para niño">Calzado para niño</option>
        <option value="Caminadoras y montables de bebé" disabled>Caminadoras y montables de bebé No estamos comprando por el momento</option>
        <option value="Cangureras, fular y mochilas" disabled>Cangureras, fular y mochilas No estamos comprando por el momento</option>
        <option value="Carriolas">Carriolas</option>
        <option value="Cunas" disabled>Cunas No estamos comprando por el momento</option>
        <option value="Colechos">Colechos</option>
        <option value="Disfraces">Disfraces</option>
        <option value="Donas y almohadas" disabled>Donas y almohadas No estamos comprando por el momento</option>
        <option value="Exctractores de leche" disabled>Exctractores de leche No estamos comprando por el momento</option>
        <option value="Gimnasios y tapetes" disabled>Gimnasios y tapetes No estamos comprando por el momento</option>
        <option value="Juegos de jardín">Juegos de jardín</option>
        <option value="Juguetes">Juguetes</option>
        <option value="Libros y rompecabezas">Libros y rompecabezas</option>
        <option value="Mecedoras" disabled>Mecedoras No estamos comprando por el momento</option>
        <option value="Columpios">Columpios</option>
        <option value="Mesas y centros de actividades" disabled>Mesas y centros de actividades No estamos comprando por el momento</option>
        <option value="Monitores Video">Monitores Video</option>
        <option value="Otro categoria" disabled>Otro categoria No estamos comprando por el momento</option>
        <option value="Otros accesorios" disabled>Otros accesorios No estamos comprando por el momento</option>
        <option value="Otros de hogar y baño" disabled>Otros de hogar y baño No estamos comprando por el momento</option>
        <option value="Otros de paseo" disabled>Otros de paseo No estamos comprando por el momento</option>
        <option value="Para los biberones" disabled>Para los biberones No estamos comprando por el momento</option>
        <option value="Pañaleras" disabled>Pañaleras No estamos comprando por el momento</option>
        <option value="Procesadores de alimentos" disabled>Procesadores de alimentos No estamos comprando por el momento</option>
        <option value="Ropa para bebes o niñas">Ropa para bebes o niñas</option>
        <option value="Ropa para bebes o niños">Ropa para bebes o niños</option>
        <option value="Ropa para mujeres o de maternidad" disabled>Ropa para mujeres o de maternidad No estamos comprando por el momento</option>
        <option value="Seguridad">Seguridad</option>
        <option value="Sillas para auto">Sillas para auto</option>
        <option value="Sillas para comer">Sillas para comer</option>

        </select>
        </div>
        <!-- Pregunta 3 -->	
        <p></p>
        <div class="form-group">
        <label class="control-label">Cantidad de productos</label>
        <input id="colorful" class="form-control prods_amount" type="number" value="1" min="1" />
        </div>
        <p>Calidad de uso del producto</p>
        <div class="group">
        <input type="range" name="Frequency" class="freq" id="Frecuencia" min="1" max="3" value="2" step="1" onchange="qualcontrol()" />

        <div class="rating-footer">
        <span>Bajo</span>
        <span>Bueno</span>
        <span>Excelente</span>
        </div>


        </div>`
        document.getElementById('Prods').appendChild(newdiv);
    }

    function removeInput(btn){
    	btn.parentNode.remove();
    }

</script>

</body>
</html>