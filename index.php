<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Iniciar Sesión | SDC</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>SDC</h1>
      </div>
      <div class="login-box">
        
        <form class="login-form" action="dml/validacion_login.php">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>INICIAR SESIÓN</h3>
          <div class="form-group">
            <label class="control-label">USUARIO</label>
            <input class="form-control" type="text" placeholder="Ingresar nombre de usuario" autofocus name="txt_user">
          </div>
          <div class="form-group">
            <label class="control-label">CLAVE</label>
            <input class="form-control" type="password" placeholder="Ingresar clave" name="txt_pass">
          </div>

          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>ENTRAR</button>
          </div>
          <br>
          <?php
          if (isset($_GET["error"])) {
          $error=$_GET["error"];
          }else{
          $error="";
          }

          if ($error==true) {    
            echo "<div class='alert alert-dismissible alert-danger'><button class='close' type='button' data-dismiss='alert'>×</button>Usuario o Clave Incorrecta.</div>";
          }else{
          echo "";
          }
          ?>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>