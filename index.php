<?php
session_start();

include "config/config.php";

if (isset($_SESSION['user_id']) && $_SESSION !== null) {
  header("location: dashboard.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" sizes="16x16 32x32" href="images/favicon-blco.png">

  <title>Tickets Moma</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="css/fontawesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/fontawesome/css/solid.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="css/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="css/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <!-- <link href="css/custom.min.css" rel="stylesheet"> -->
  <link href="css/master.css" rel="stylesheet">

</head>

<body class="container-log center-h center-v">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="child">
      <div class="card">

        <section class="card-body">
          <form action="action/login.php" method="post">
            <img src="images/favicon.png" alt="img login" class="img-log-tickets" style="height:200px;">
            <div class="mx-auto text-center">
              <h3 class="titulo-tickets">Iniciar Sesión</h3>
              <?php
              $invalid = sha1(md5("Email o contraseña invalidos"));
              if (isset($_GET['invalid']) && $_GET['invalid'] == $invalid) {
                echo "<div class='alert alert-danger alert-dismissible fade-in text-center mx-auto' role='alert'>
                <strong>Error!</strong> Email o contraseña invalidos
                </div>";
              }
              ?>
            </div>
            <div class="pt-2">
              <div class="input-tickets input_user">
                <input type="text" name="email" class="form-control input-log-tickets" placeholder="Correo Electrónico">
                <?php if (isset($array_errors) && isset($array_errors['itxt_login_username'])) { ?>
                  <label class="error">
                    <?= $array_errors['itxt_login_username'] ?></label>
                <?php
                } ?>
              </div>
            </div>
            <div class="pt-2">
              <div class="input-tickets input_psw">
                <input type="password" name="password" class="form-control input-log-tickets" placeholder="Contraseña">
                <?php if (isset($array_errors) && isset($array_errors['itxt_login_clave'])) { ?>
                  <label class="error">
                    <?= $array_errors['itxt_login_clave'] ?></label>
                <?php
                } ?>
              </div>
            </div>
            <div class="pt-2">
              <div class="mx-auto text-center">
                <button type="submit" name="token" value="Login" class="btn btn-default">Iniciar sesion</button>
              </div>
            </div>
            <div class="pt-2">
              <div class="mx-auto text-center">
                <small><a class="reset_pass" href="#">Olvidaste Tu contraseña?</a></small>
              </div>
            </div>
      </div>
      </form>
      </section>
    </div>
  </div>

  </div>
</body>

</html>