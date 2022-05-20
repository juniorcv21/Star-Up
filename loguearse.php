<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LOGUEARSE</title>
	<link rel="stylesheet" type="text/css" href="estilos/estilo.css?3">
</head>
<body>
	<div id="logoconsulta"><img src="estilos/fondos/consultaPe.png"></div></div>

	<form method="POST" action="validarusuario.php">
		<h1>¡ LOGUEARSE !</h1>
		<br><br>
		<input type="text" name="correo"
		placeholder="example@gmail.com">

		<div id="contenedor_contraseña"><input type="password" name="contraseña" id="contraseña" 
		placeholder="Contraseña">
		<div id="cont_ojo"><img src="image/mostrar.png" id="boton"></div></div>
		<br><br><br>
		<button id="buttonLoguear" type="submit" name="registrar">
			<span id="span1"></span>
			<span id="span2"></span>
			<span id="span3"></span>
			<span id="span4"></span>
			Entrar
		</button><br><br>
		<a href="registrarse.php">REGISTRARSE</a>
	</form>

</body>
<script type="text/javascript" src="js/mostrarocultarcontra.js"></script>
</html>