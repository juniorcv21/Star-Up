<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CHAT-FIRE</title>
	<link rel="stylesheet" type="text/css" href="estilos/estilo.css?2">
</head>
<body>

<form method="POST" class="form2" action="registrarse.php">
		<h1>¡ REGISTRO !</h1>

		<input type="text" name="nombre"
		placeholder="Nombre">
		<input type="text" name="apellidos"
		placeholder="Apellidos">
		<input type="number" name="edad"
		placeholder="Edad"><br><br>
		Cuenta:
		<input type="text" id="correo" name="correo"
		placeholder="example@gmail.com">

		<div id="contenedor_contraseña"><input type="password" name="contraseña" id="contraseña" 
		placeholder="Contraseña">
		<div id="cont_ojo"><img src="image/mostrar.png?2" id="boton"></div></div>
		<br><br><br>

		<button id="buttonregistro" type="submit" name="registrar">
			Registrarse
		</button><br><br>

		<a href="loguearse.php">LOGIN</a>

	</form>
	<?php 
	include("funcionregistrar.php");
	 ?>

</body>
<script type="text/javascript" src="js/mostrarocultarcontra.js"></script>
</html>