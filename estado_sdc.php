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
    <title>Estado Solicitud | SDC</title>
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
          <h1><i class="fa fa-check-square-o"></i> Revisa el Estado de tus Solicitudes de Compra</h1>
          <p></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php
          //MSJ DE INFORMACION SOBRE UPDATE/DELETE DE SOLICITUD Y PRODUCTOS
          if (isset($_GET["deletesoli"])) {
            $deletesoli=$_GET["deletesoli"];
          }else{
            $deletesoli="";
          }

          if ($deletesoli=="true") {
            echo "<div class='alert alert-dismissible alert-success'><button class='close' type='button' data-dismiss='alert'>×</button><strong>Eliminado Correctamente!</strong> La Solicitud de Productos se ha eliminado correctamente.</div>";
          }else if ($deletesoli=="false") {
            echo "<div class='alert alert-dismissible alert-danger'><button class='close' type='button' data-dismiss='alert'>×</button><strong>Error al Eliminar!</strong> La Solicitud de Productos no se ha eliminado.</div>";
          }

          if (isset($_GET["deleteprod"])) {
            $deleteprod=$_GET["deleteprod"];
          }else{
            $deleteprod="";
          }

          if ($deleteprod=="true") {
            echo "<div class='alert alert-dismissible alert-success'><button class='close' type='button' data-dismiss='alert'>×</button><strong>Eliminado Correctamente!</strong> El Producto seleccionado se ha eliminado correctamente. Al ser el último la Solicitud se ha eliminado.</div>";
          }

          ?>
        </div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>FECHA</th>
                      <th>HORA</th>
                      <th>CANTIDAD</th>
                      <th>PRECIO REF.</th>
                      <th>ESTADO</th>
                      <th>VER</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php include "dml/select_sdc.php"; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <!--<script type="text/javascript">$('#sampleTable').DataTable();</script>-->
    <script type="text/javascript">
      $(document).ready(function() {
        $('#sampleTable').DataTable( {
          "order": [[ 2, "desc" ]]
        } );
      } );
    </script>
  </body>
</html>