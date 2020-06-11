<?php

//upd user by abisoft https://github.com/amnersaucedososa
session_start();

if (empty($_POST['mod_name'])) {
	$errors[] = "Nombre vacío";
} else if (empty($_POST['mod_email'])) {
	$errors[] = "Correo Vacio vacío";
} else if ($_POST['mod_status'] == "") {
	$errors[] = "Selecciona el estado";
} else if ($_POST['mod_tipouser'] == "") {
	$errors[] = "Selecciona el tipo de usuario";
} else if (
	!empty($_POST['mod_name']) &&
	!empty($_POST['mod_email']) &&
	$_POST['mod_tipouser'] != "" &&
	$_POST['mod_status'] != ""
) {

	include "../config/config.php"; //Contiene funcion que conecta a la base de datos

	$username = $_POST["mod_username"];
	$name = mysqli_real_escape_string($con, (strip_tags($_POST["mod_name"], ENT_QUOTES)));
	$email = $_POST["mod_email"];
	$password = mysqli_real_escape_string($con, (strip_tags(sha1(md5($_POST["password"])), ENT_QUOTES)));
	$status = intval($_POST['mod_status']);
	$tipouser = intval($_POST['mod_tipouser']);
	$id = $_POST['mod_id'];

	$sql = "UPDATE user SET name=\"$name\", email=\"$email\", is_active=$status, tipouser=$tipouser WHERE id=$id";
	$query_update = mysqli_query($con, $sql);
	if ($query_update) {
		$messages[] = "Datos actualizados satisfactoriamente.";

		// update password by abisoft
		if ($_POST["password"] != "") {
			$update_passwd = mysqli_query($con, "UPDATE user SET password=\"$password\" where id=$id");
			if ($update_passwd) {
				$messages[] = " Y la Contraseña ah sido actualizada.";
			}
		}
	} else {
		$errors[] = "Lo siento algo ha salido mal intenta nuevamente." . mysqli_error($con);
	}
} else {
	$errors[] = "Error desconocido.";
}

if (isset($errors)) {

?>
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Error!</strong>
		<?php
		foreach ($errors as $error) {
			echo $error;
		}
		?>
	</div>
<?php
}
if (isset($messages)) {

?>
	<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>¡Bien hecho!</strong>
		<?php
		foreach ($messages as $message) {
			echo $message;
		}
		?>
	</div>
<?php
}

?>