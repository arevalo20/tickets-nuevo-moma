<?php
session_start();
include "config/config.php";
if (!isset($_SESSION['user_id']) && $_SESSION['user_id'] == null) {
  header("location: index.php");
}
?>

<?php
$id = $_SESSION['user_id'];
$query = mysqli_query($con, "SELECT * from user where id=$id");
while ($row = mysqli_fetch_array($query)) {
  $username = $row['username'];
  $name = $row['name'];
  $email = $row['email'];
  $profile_pic = $row['profile_pic'];
  $created_at = $row['created_at'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title . " " . $name; ?> </title>

  <!-- Bootstrap -->
  <!-- <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- <link href="css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- Font Awesome -->
  <!-- <link href="css/font-awesome/css/solid.min.css" rel="stylesheet"> -->
  <script src="https://kit.fontawesome.com/56ccb7ed33.js" crossorigin="anonymous"></script>
  <!-- NProgress -->
  <link href="css/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="css/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="css/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="css/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="css/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="css/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="css/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  <!-- jQuery custom content scroller -->
  <link href="css/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet" />

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

  <link rel="icon" sizes="16x16 32x32" href="images/favicon-blco.png">

  <!-- bootstrap-daterangepicker -->
  <link href="css/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- <link href="css/styles.min.css" rel="stylesheet"> -->
  <link href="css/styles.min.css" rel="stylesheet">

  <link href="css/master-panel.css" rel="stylesheet">

  <!-- MICSS button[type="file"] -->
  <link rel="stylesheet" href="css/micss.css">

</head>

<body class="nav-md sb-nav-fixed">
  <?php require_once "header.php"; ?>

  <div id="layoutSidenav">