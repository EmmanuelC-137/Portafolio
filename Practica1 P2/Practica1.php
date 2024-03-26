<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Formulario datos</title>
		<style>
			body {
			    font-family: Arial, sans-serif;
			    margin: 0;
			    padding: 0;
			}
			h1 {
			    text-align: center;
			    margin-top: 50px;
			}
			div {
			    width: 50%;
			    margin: 0 auto;
			    border: 1px solid #ccc;
			    padding: 20px;
			    border-radius: 5px;
			    margin-top: 20px;
			}
			p {
			    margin-bottom: 10px;
			}
		</style>
	</head>

	<body>
		<h1>Resultados del formulario</h1>
		<div>
			<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					// Obtiene los valores del formulario
					$nombre = $_POST["nombre"];
					$ap = $_POST["Ap"];
					$am = $_POST["Am"];
					$nomusu = $_POST["usuario"];
					$pas = $_POST["passw"];
					$fna = $_POST["Fechan"];
					$pais = $_POST["pais"];
					$ciudad = $_POST["ciudad"];
					$calle = $_POST["calle"];
					$nocas = $_POST["No"];
					$col = $_POST["Col"];
					$mail = $_POST["email"];
					$rfc = $_POST["rfc"];
					$cp = $_POST["cp"];

					// Muestra los datos del formulario
					echo "<p>Nombre: $nombre</p>";
					echo "<p>Apellido Paterno: $ap</p>";
					echo "<p>Apellido Materno: $am</p>";
					echo "<p>Nombre de usuario: $nomusu</p>";
					echo "<p>Contraseña: $pas</p>";
					echo "<p>Fecha de nacimiento: $fna</p>";
					echo "<p>País: $pais</p>";
					echo "<p>Ciudad: $ciudad</p>";
					echo "<p>Calle: $calle</p>";
					echo "<p>Número de casa: $nocas</p>";
					echo "<p>Colonia: $col</p>";
					echo "<p>Correo electrónico: $mail</p>";
					echo "<p>RFC: $rfc</p>";
					echo "<p>Código postal: $cp</p>";
				} else {
					// Si no se ha enviado el formulario, muestra un mensaje de error
					echo "<p>No se han recibido datos del formulario.</p>";
				}
			?>
		</div>
	</body>
</html>