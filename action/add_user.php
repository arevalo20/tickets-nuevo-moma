<?php
session_start();
/*Inicia validacion del lado del servidor*/
if (empty($_POST['username'])) {
	$errors[] = "Nombre de usuario vacío";
} else if (empty($_POST['name'])) {
	$errors[] = "Nombre vacío";
} else if (empty($_POST['lastname'])) {
	$errors[] = "Apellidos vacío";
} else if (empty($_POST['email'])) {
	$errors[] = "Correo vacío";
} else if ($_POST['tipouser'] == "") {
	$errors[] = "Selecciona el tipo de usuario";
} else if ($_POST['status'] == "") {
	$errors[] = "Selecciona el estado";
} else if (empty($_POST['password'])) {
	$errors[] = "Contraseña vacío";
} else if (
	!empty($_POST['username']) &&
	!empty($_POST['name']) &&
	!empty($_POST['lastname']) &&
	$_POST['tipouser'] != "" &&
	$_POST['status'] != "" &&
	!empty($_POST['password'])
) {

	include "../config/config.php"; //Contiene funcion que conecta a la base de datos

	// escaping, additionally removing everything that could be (html/javascript-) code
	$username = mysqli_real_escape_string($con, (strip_tags($_POST["username"], ENT_QUOTES)));
	$name     = mysqli_real_escape_string($con, (strip_tags($_POST["name"], ENT_QUOTES)));
	$lastname = mysqli_real_escape_string($con, (strip_tags($_POST["lastname"], ENT_QUOTES)));
	$email    = $_POST["email"];
	$password = mysqli_real_escape_string($con, (strip_tags(sha1(md5($_POST["password"])), ENT_QUOTES)));

	$tipouser      = intval($_POST['tipouser']);
	$status      = intval($_POST['status']);
	$end_name    = $name . " " . $lastname;
	$created_at  = date("Y-m-d H:i:s");
	$user_id     = $_SESSION['user_id'];
	$profile_pic = "default.png";

	$is_admin = 0;
	if (isset($_POST["is_admin"])) {
		$is_admin = 1;
	}

	$sql = "INSERT INTO user (username, name, password, email, profile_pic, is_active, tipouser, created_at) VALUES ('$username', '$end_name','$password','$email','$profile_pic',$status, $tipouser,'$created_at')";
	$query_new_insert = mysqli_query($con, $sql);
	if ($query_new_insert) {
		$messages[] = "El usuario ha sido ingresado satisfactoriamente.";
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