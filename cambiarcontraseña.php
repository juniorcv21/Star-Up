<?php

if (isset($_POST['newcontra'])) {
	if (strlen($_POST['correocont'])>=1 && strlen($_POST['contraact'])>=1 && strlen($_POST['contranew'])>=1){
		include("bd_chat.php");
		session_start();
		$correo=$_POST['correocont'];
		$contraact=$_POST['contraact'];
		$contranew = $_POST['contranew'];

	//Verificamos la cuenta es valida
	$consulta = "SELECT * FROM usuarios where correo = '$correo' and contraseña = '$contraact'";
	$resultado = mysqli_query($conexion,$consulta);
	$filas = mysqli_num_rows($resultado);

	if ($filas) {
		$sqlcambio = "UPDATE usuarios SET contraseña='$contranew' WHERE correo='$correo' AND contraseña='$contraact';";
		$cambioaceptado = mysqli_query($conexion,$sqlcambio);
		if ($cambioaceptado) {
			?><script type="text/javascript">
				alert("Cambio generado");
				location.href="chatglobal.php";
			</script>
			<?php
		}else{
			?><script type="text/javascript">
				alert("Uups ! ocurrio un error ...");
				location.href="chatglobal.php";
			</script>
			<?php
		}
	}else{
			?><script type="text/javascript">
				alert("¡ Datos no validos !");
				location.href="chatglobal.php";
			</script>
			<?php
		}

	}else{
			?><script type="text/javascript">
				alert("Complete los campos necesarios para los cambios");
				location.href="chatglobal.php";
			</script>
			<?php
		}
}

?>