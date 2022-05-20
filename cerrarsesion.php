<?php
include "bd_chat.php";

	session_start();
	//Actualizar el estado a ofline
		$conestado = "UPDATE usuarios SET estado='0' WHERE id = '".$_SESSION['id']."'";
		$enlinea = mysqli_query($conexion,$conestado) or mysql_error($conexion);

	session_destroy();
	header("Location: loguearse.php");
?>

