<?php
	include("bd_chat.php");
	session_start();
	$correo = $_POST['correo'];
	$contraseña = $_POST['contraseña'];

	//Verificamos si hay algun usuario registrado con esos datos
	$consulta = "SELECT * FROM usuarios where correo = '$correo' and contraseña = '$contraseña'";

	$resultado = mysqli_query($conexion,$consulta);
	$filas = mysqli_num_rows($resultado);
	$datos = mysqli_fetch_array($resultado);
	

	if ($filas) {
		
		$_SESSION['id'] = $datos['id'];
	//Actualizar el estado a online
		$conestado = "UPDATE usuarios SET estado='1' WHERE id = '".$_SESSION['id']."'";
		$enlinea = mysqli_query($conexion,$conestado);
		//hacemos llamado al nombre del usuario para representarlo despues
		$usuario_sql = "SELECT nombre AS 'nombre' FROM usuarios where correo = '$correo' and contraseña = '$contraseña'";
		$usuario_consul = mysqli_query($conexion,$usuario_sql);
		$usuario = mysqli_fetch_array($usuario_consul);

		
		$_SESSION['nombreusuario'] = $usuario['nombre'];
		header("location:principal.php");
		
	}else{
		?>
		<?php
		include("loguearse.php");
		?>
		<h3 class="error">¡Datos No validos!</h3>
		<?php
	}
	mysqli_free_result($resultado);
	mysqli_close($conexion);