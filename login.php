<?php
  if (isset($_SESSION['login_user'])) {
    header("location:home.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form method="post" class="login100-form validate-form">
          <span class="login100-form-title p-b-34">Inicio de sesión</span>
          <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
            <input class="input100" type="text" name="correo_cuenta" placeholder="User name">
            <span class="focus-input100"></span>
          </div>
          <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
            <input id="password" class="input100" type="password" name="contra_cuenta" placeholder="Password">
            <span class="focus-input100"></span>
          </div>
          <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
            <label class="input100" style="text-align:right;">Tipo de acceso:</label>
          </div>
          <select class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" id="no_acceso" name="no_acceso">
            <option value=0>Administrador de TI</option>
            <option value=1>Cliente</option>
            <option value=2>Empleado</option>
            <option value=3>Gerente</option>
          </select>
          <div class="container-login100-form-btn">
            <input name="submit" type="submit" value="Iniciar" class="login100-form-btn">
          </div>
          <div class="w-full text-center p-t-27 p-b-239">
          </div>
          <div class="w-full text-center">
            <a href="#" class="txt3">
              Registrarse
            </a>
          </div>
        </form>
        <div class="login100-more" style="background-image: url('./imagenes/fondo_01.jpg');"></div>
      </div>
    </div>
  </div>
</body>

</html>

<?php
  if (isset($_POST['submit'])) {
    $connect = mysqli_connect("localhost", "root", "", "floweb");
    session_start();
    $correo_cuenta = $_POST['correo_cuenta'];
    $contra_cuenta = $_POST['contra_cuenta'];
    $no_acceso = $_POST['no_acceso'];

    $_SESSION['login_user'] = $correo_cuenta;
    $query = mysqli_query($connect, "SELECT no_acceso FROM cuenta WHERE correo_cuenta='$correo_cuenta' and contra_cuenta='$contra_cuenta' and no_acceso='$no_acceso'");
    if (mysqli_num_rows($query) != 0) {

      switch ($no_acceso) {
        case 0:
          echo "<script language='javascript' type='text/javascript'>".
                  "location.href='./abcm_usuarios/F01.php'".
                "</script>";
        break;   
        case 1:
            echo "<script language='javascript' type='text/javascript'>".
                    "location.href='./proceso_de_venta/index.php'".
                  "</script>";
        break;
        case 2:
            echo "<script language='javascript' type='text/javascript'>".
                    "location.href='./abcm_productos/F04.php'".
                  "</script>";
        break;
        case 3:
          echo "<script language='javascript' type='text/javascript'>".
                  "location.href='./reportes/F09.php'".
                "</script>";
        break;          
        default:
            echo "<script type='text/javascript'>alert('User Name Or Password Invalid!')</script>";
            break;
    }
  }
}
?>