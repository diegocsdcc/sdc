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
$idprod = $_REQUEST["idprod"];

include "dml/update_prod_sdc.php";

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
          <h1><i class="fa fa-edit"></i> Modificar Producto Solicitado</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="javascript: history.go(-1)"><i class="fa fa-arrow-left"></i></a></li>
        </ul>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form method="post">
              <div class='row'>
                <div class='col-lg-12'>
                  <h4 class='mb-3 line-head' id='buttons'>Producto Seleccionado</h4>
                </div>
                <div class='col-lg-6'>
                  <div class='form-group'>
                  <label class='col-form-label' for='inputDefault'>Nombre Producto</label>
                  <input class='form-control' id='inputDefault' name='txt_nombre' type='text' required value='<?php echo $value_nombre ?>'>
                </div>
                <div class='form-group'>
                  <label for='exampleTextarea'>Descripción Producto</label>
                  <textarea class='form-control' id='exampleTextarea' name='txt_descr' rows='4' maxlength='400'><?php echo $value_descr ?></textarea>
                </div>
              </div>
              <div class='col-lg-4 offset-lg-1'>
                <div class='form-group'>
                  <label class='control-label'>Cantidad</label>
                  <div class='form-group'>
                    <div class='input-group'>
                      <input class='form-control' id='exampleInputAmount' name='txt_cantidad' type='number' onKeyPress='if(this.value.length==3) return false;' min='1' required value='<?php echo $value_cantidad ?>'>
                    </div>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='control-label'>Precio Referencia</label>
                  <div class='form-group'>
                    <div class='input-group'>
                      <div class='input-group-prepend'>
                        <span class='input-group-text'>$</span>
                      </div>
                      <input class='form-control' id='exampleInputAmount' name='txt_precio' type='text' onkeyup='miles(this)' onchange='miles(this)' onKeyPress='if(this.value.length==7) return false;' min='0' required value='<?php echo $value_precio ?>'>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" name="btn_editar" type="submit">Modificar Producto</button>
              <button class="btn btn-danger" name="btn_eliminar" type="submit">Eliminar Producto</button>
            </div>
            </form>
          </div>
        </div>
      </div>

    </main>
    <script type="text/javascript" src="js/funciones.js"></script>
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