<?php
//Definimos la zona horaria
ini_set('date.timezone', 'America/Lima');
if (isset($_POST['enviar'])) {
	if (strlen($_POST['mensaje'])>=1){
		include("bd_chat.php");
		session_start();
		$nombre=$_SESSION['nombreusuario'];
		$mensaje = $_POST['mensaje'];

		//Obtener el Id_usuario para la tabla chat global
		$sqlite = "SELECT * FROM usuarios WHERE nombre='$nombre';";
			$resultado = mysqli_query($conexion,$sqlite);
		if (mysqli_num_rows($resultado)>0) {
			$mostrar=mysqli_fetch_array($resultado);
			$id_usuario = $mostrar['id'];}



		//Consulta para insertar los mens a BD
		$consulta = "INSERT INTO chatglobal(nombre, mensaje, id_usuario) VALUES ('$nombre','$mensaje','$id_usuario')";

		//ejecutamos la consulta en la BD
		$ejecutar = mysqli_query($conexion,$consulta);
		if ($ejecutar) {
			header("location:chatglobal.php");
		}else{
			?>
			<h3 class="error">¡Algo salio mal!</h3>
			<?php
		}

	}else{
		header('location:chatglobal.php');
		?>
		<?php
	}
}

?>