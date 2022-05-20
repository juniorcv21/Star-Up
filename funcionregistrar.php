<?php 
include("bd_chat.php");
//Definimos la zona horaria
ini_set('date.timezone', 'America/Lima');
if (isset($_POST['registrar'])) {
	//verifica si esta vacio uno de esos campos
	if (strlen($_POST['nombre'])>=1 && strlen($_POST['apellidos'])>=1 && strlen($_POST['edad'])>=1 && strlen($_POST['correo'])>=1 && strlen($_POST['contraseña'])>=1) {

		$nombre=trim($_POST['nombre']);
		$apellidos=trim($_POST['apellidos']);
		$edad=trim($_POST['edad']);
		$correo=trim($_POST['correo']);
		$contraseña=trim($_POST['contraseña']);
		$fechareg=date('d-m-Y h:i:s a',time());

		//Validar Correo @ valido
		if (filter_var(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $correo))) {

		//Consulta sql para insertar datos
		$insertar_dato = "INSERT INTO usuarios(nombre, apellidos, edad, correo, contraseña, fecha_reg) VALUES ('$nombre','$apellidos','$edad','$correo','$contraseña','$fechareg')";
		//Consulta sql para verificar correo repetitivo
		$correorepetido = "SELECT * FROM usuarios WHERE correo = '$correo'";
		//
		$verificar_correo = mysqli_query($conexion,$correorepetido);

		if (mysqli_num_rows($verificar_correo)>0) {
			?>
			<h3 class="error">¡CORREO ya regisrado, Intente con otro!</h3>
			<?php
			exit();
		}

		$resultado = mysqli_query($conexion,$insertar_dato);
		if ($resultado) {
			?>
			<h3 class="correcto">¡Se ha registrado Correctamente!</h3>
			<?php
		}else{
			?>
			<h3 class="error">¡Uups ha ocurrido un error!</h3>
			<?php
		}
			
		}else{
			?>
			<h3 class="error">¡Ingrese un correo Valido!</h3>
			<?php
		}

		
	}else{
		?>
			<h3 class="error">¡Porfavor complete todos los campos!</h3>
			<?php
	}
}
	
 ?>