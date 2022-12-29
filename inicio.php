<?php
session_start();
include ("con_mysql.php");

$iduser = $_SESSION['id'];
$user = $_SESSION['user'];
$tipo = $_SESSION['tipo'];
$nombre = $_SESSION['nombre'];
$area = $_SESSION['area'];

if ($tipo <> '1') {
  echo "<script>window.location='logout.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Inicio | SDC</title>
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar -->
    <?php
    include "include/_navbar.php";
    ?>
    <!-- Sidebar menu-->
    <?php
    switch ($tipo) {
      case '1':
      include "include/_sidebar1.php";
        break;

        case '2':
      include "include/_sidebar2.php";
        break;

        case '3':
      include "include/_sidebar3.php";
        break;
      
      default:
      echo "<script>window.location='logout.php'</script>";
        break;
    }
    ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-home"></i> Bienvenid@ a Sistema Solicitud de Compra</h1>
          <p></p>
        </div>
      </div>
      <!--MAIN-->
      <?php
    switch ($tipo) {
      case '1':
      include "include/_main1.php";
        break;

        case '2':
      include "include/_main2.php";
        break;

        case '3':
      include "include/_main3.php";
        break;
      
      default:
      echo "<script>window.location='logout.php'</script>";
        break;
    }
    ?>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
  </body>
</html>