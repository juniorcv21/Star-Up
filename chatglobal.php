<?php
	include("bd_chat.php");
	session_start();
	$usuario=$_SESSION['nombreusuario'];
	$inocognita=0;
	//Validar actividad del usuario
	if (!$usuario) {
		header("location: loguearse.php");
	}
	$chatp=false;

	function chatpersonal(){
		$chatp = true;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CHAT</title>
	<link rel="stylesheet" type="text/css" href="estilos/estilochat.css?2">
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>

	<script src="js/actualizarpag.js" type="text/javascript"></script>
	<script src="js/cambiarchat.js" type="text/javascript"></script>


</head>
<body>
<div id="mayor">
	<h1>Esperamos que la estes pasando bien&nbsp; <span class="iluminacion"><?php echo $usuario;?> &nbsp;&nbsp;🔥</span> <a href="cerrarsesion.php">Salir</a> </h1>

</div>

<div id="principal" class="principal">
	<div class="hijoslados">
		<div class="hijoizq" id="usuarios">
			<h2>USUARIOS REGISTRADOS:</h2><br>
		<?php
			$sql = "SELECT * FROM usuarios;";
			$resultado = mysqli_query($conexion,$sql);
		if (mysqli_num_rows($resultado)>0) {
			while ($mostrar=mysqli_fetch_array($resultado)) {
		?>
		
		<span id="<?php echo($mostrar['correo'])?>" name="" class="usuariosregistrados">
		👤 <?php echo $mostrar['nombre'];?>
		<?php echo $mostrar['apellidos'];?>
		</span>
		<?php 
	}}else{?>
		<h2 style="color: #AFAFAF;margin: 15px;font-size: 15px;">Aun no hay Usuarios Registrados...</h2>
		<?php
	}
	?>
	</div>
	<div id="cambiarcontraseña">
		<h3>Cambiar Contraseña</h3>
		<form method="POST" action="cambiarcontraseña.php">

			<input class="inpcontra" name="correocont" type="text" placeholder="Ingrese correo @">
			<input class="inpcontra" name="contraact" type="password" placeholder="Ingrese contraseña actual">
			<input class="inpcontra" name="contranew" type="password" placeholder="Ingrese contraseña nueva">
			<button id="enviarnewcont" type="submit" name="newcontra">
			Enviar
		</button>

		</form>
	</div>

	</div>

	<div class="hijosmm" id="contenedorchat">
		<h2>CHAT GLOBAL</h2>

		<div class="hijosm" id="chats">

		<?php
		
			$consultachatgeneral = "SELECT * FROM chatglobal ORDER BY id DESC LIMIT 7";
		

			$resultado = mysqli_query($conexion,$consultachatgeneral);
		if (mysqli_num_rows($resultado)>0) {
			while ($mostrar=mysqli_fetch_array($resultado)) {
		?>

		<div class="cajachat">
		<span class="spanchat" style="width: 20%;"><h4 style="text-shadow: 0 0 10px #f59622,0 0 20px #f59622, 0 0 30px #f59622;"><?php echo $mostrar['nombre'] ?></h4></span>

		<span class="spanchat" style="color: #848484; width: 70%;"><h4 style="font-size: 15px;"><?php echo $mostrar['mensaje'];?></h4></span>

		<span class="spanchat" style="float: right; width: 15%;font-size: 12px;
		"><h5 style="position: relative;
		top: 60%;"><?php echo date('g:i:a',strtotime($mostrar['fechachat']));?></h5></span>
	</div>
	<?php 
	}}else{?>
		<h2 style="color: #AFAFAF;margin-top: 33%;font-size: 20px;">Aun no hay mensajes disponibles...</h2>
		<?php
	}
	?>

		</div>

		<form method="POST" action="mensajebd.php">
		<textarea placeholder="Ingrese mensaje..." name="mensaje"></textarea>
		<button id="enviar" type="submit" name="enviar">
			<span id="span1"></span>
			<span id="span2"></span>
			<span id="span3"></span>
			<span id="span4"></span>
			Enviar
		</button>
	</form>	
	<?php  include ('mensajebd.php'); ?>
</div>
<div class="hijoslados">
	<div class="hijoder" id="registrouser">
		<h2>Reporte de Usuarios</h2><br>
		<h5>Los 3 usuarios mas activos:</h5>
		<table>
			<tr>
				<th>NOMBRE</th>
				<th>APELLIDOS</th>
				<th>#MSJ</th>
			</tr>
		<?php
		$sqlite = "SELECT usuarios.nombre, usuarios.apellidos, COUNT( chatglobal.nombre ) AS total FROM  chatglobal
			INNER JOIN usuarios ON chatglobal.id_usuario = usuarios.id
			GROUP BY chatglobal.nombre ORDER BY total DESC LIMIT 3;";
			$resultado = mysqli_query($conexion,$sqlite);
		if (mysqli_num_rows($resultado)>0) {
			while ($mostrar=mysqli_fetch_array($resultado)) {
			?>
			<tr>
			<td><?php echo $mostrar['nombre']; ?></td>
			<td><?php echo $mostrar['apellidos']; ?></td>
			<td><?php echo $mostrar['total']; ?></td>
		</tr>
		<?php 
	}}else{?>
		<h2 style="color: #AFAFAF;margin-top: 25%;font-size: 20px;">No hay registros disponibles...</h2>
		<?php
	}
	?>
	</table><br><br>
	<h3>Estados de Usuarios</h3>
	<table>
			<tr>
				<th>USUARIO</th>
				<th>ESTADO</th>
			</tr>
		<?php
		$sqlite2 = "SELECT * FROM usuarios ORDER BY estado DESC;";
		$resultado2 = mysqli_query($conexion,$sqlite2);
		if (mysqli_num_rows($resultado2)>0) {
			while ($mostrar=mysqli_fetch_array($resultado2)) {
			?>
			<tr>
			<td><?php echo $mostrar['nombre']." ".$mostrar['apellidos'] ?></td>
			<td><?php 
				if ($mostrar['estado']==1) {
					echo "🟢";
				}else{
					echo "🔴";
				}
			?></td>
		</tr>
		<?php 
	}}else{?>
		<h2 style="color: #AFAFAF;margin-top: 25%;font-size: 20px;">No hay registros disponibles...</h2>
		<?php
	}
	?>
	</table>
	</div>
</div>
</div>

</body>
</html>