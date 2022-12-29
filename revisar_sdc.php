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

$idsoli = $_REQUEST["id"];

include "dml/select_soli_sdc.php";

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
    <title>Revisar Solicitud | SDC</title>
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
          <h1><i class="fa fa-edit"></i> Solicitud de Compra #<?php echo $idsoli ?></h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="estado_sdc.php"><i class="fa fa-arrow-left"></i></a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="widget-small <?php echo $estadocolor ?>"><i class="<?php echo $estadoicon ?>"></i>
            <div class="info">
              <h4><b><?php echo $estadotittle ?></b></h4>
              <p><?php echo $estadoinfo ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <?php
          //MSJ DE INFORMACION SOBRE UPDATE/DELETE DE SOLICITUD Y PRODUCTOS
          if (isset($_GET["updatesoli"])) {
            $updatesoli=$_GET["updatesoli"];
          }else{
            $updatesoli="";
          }

          if ($updatesoli=="true") {
            echo "<div class='alert alert-dismissible alert-success'><button class='close' type='button' data-dismiss='alert'>×</button><strong>Actualización Correcta!</strong> La Solicitud de Compra se ha actualizado correctamente.</div>";
          }else if ($updatesoli=="false") {
            echo "<div class='alert alert-dismissible alert-danger'><button class='close' type='button' data-dismiss='alert'>×</button><strong>Error al Actualizar!</strong> La Solicitud de Compra no se ha actualizado.</div>";
          }

          if (isset($_GET["updateprod"])) {
            $updateprod=$_GET["updateprod"];
          }else{
            $updateprod="";
          }

          if ($updateprod=="true") {
            echo "<div class='alert alert-dismissible alert-success'><button class='close' type='button' data-dismiss='alert'>×</button><strong>Actualización Correcta!</strong> El Producto seleccionado se ha actualizado correctamente.</div>";
          }else if ($updateprod=="false") {
            echo "<div class='alert alert-dismissible alert-danger'><button class='close' type='button' data-dismiss='alert'>×</button><strong>Error al Actualizar!</strong> El Producto seleccionado no se ha actualizado.</div>";
          }

          if (isset($_GET["deleteprod"])) {
            $deleteprod=$_GET["deleteprod"];
          }else{
            $deleteprod="";
          }

          if ($deleteprod=="true") {
            echo "<div class='alert alert-dismissible alert-success'><button class='close' type='button' data-dismiss='alert'>×</button><strong>Eliminado Correctamente!</strong> El Producto seleccionado se ha eliminado correctamente.</div>";
          }else if ($deleteprod=="false") {
            echo "<div class='alert alert-dismissible alert-danger'><button class='close' type='button' data-dismiss='alert'>×</button><strong>Error al Eliminar!</strong> El Producto seleccionado no se ha eliminado.</div>";
          }
          
          ?>
        </div>
        <div class="col-md-12">
          <?php
          if (isset($notainfo)) {
            echo $notainfo;
          }       
          ?>
        </div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <h3 class="tile-title">Productos Solicitados</h3>
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>PRODUCTO</th>
                      <th>DESCRIPCIÓN</th>
                      <th>CANTIDAD</th>
                      <th>PRECIO REF.</th>
                      <th>MODIFICAR</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php include "dml/select_prod_sdc.php"; ?>      
                  </tbody>
                </table>
                <div class="tile-footer">
                  <form method="post">
                    <button class="btn btn-primary" name="btn_editar_sdc" type="submit" <?php echo $disablebtnupdate ?> >Actualizar Solicitud</button>
                    <button class="btn btn-danger" name="btn_eliminar_sdc" type="submit" <?php echo $disablebtndelete ?> >Cancelar Solicitud</button>
                  </form>
                </div>             
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
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
  </body>
</html>