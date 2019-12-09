<?php
if (isset($_SESSION['login_user'])) {
  header("location:home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>[00] Inicio de sesión</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">
  <link rel="icon" type="image/png" href="./img/icono.png">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    html,
    body {
      height: 100%;
    }

    body {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
    }

    .form-signin .checkbox {
      font-weight: 400;
    }

    .form-signin .form-control {
      position: relative;
      box-sizing: border-box;
      height: auto;
      padding: 10px;
      font-size: 16px;
    }

    .form-signin .form-control:focus {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
  </style>
</head>

<body>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-4">
        <form class="form-signin" method="post">
          <img class="mb-4" src="./img/logo.png" alt="" width="100%" height="85px">
          <br>
          <center><span>Inicio de sesión</span></center>
          <span>Correo:</span>
          <input type="text" class="form-control" name="correo_cuenta" requiered>
          <span class="focus-input100"></span>
          <span>Contraseña:</span>
          <input type="password" class="form-control" name="contra_cuenta" required>
          <label>Tipo de acceso:</label>
          <select class="form-control" name="no_acceso" required>
            <option value=1>Cliente</option>
            <option value=2>Empleado</option>
            <option value=3>Gerente</option>
            <optgroup label="Desarrolladores">
              <option value=4>Administrador de TI</option>
            </optgroup>
          </select>
          <br>
          <input name="submit" type="submit" class="btn btn-lg btn-primary btn-block" value="Iniciar">
          <br>
          <center><a href="register.php">
              <font color="purple">Registrarse</font>
            </a></center>
        </form>
      </div>
      <div class="col-sm-4">
      </div>
    </div>
  </div>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
  $logIn_connect = mysqli_connect("localhost", "root", "", "floweb");
  session_start();
  $logIn_correo_01 = $_POST['correo_cuenta'];
  $logIn_contra_01 = $_POST['contra_cuenta'];
  $logIn_acceso_01 = $_POST['no_acceso'];
  $_SESSION['login_user'] = $logIn_correo_01;
  $logIn_sql_02 = mysqli_query($logIn_connect, "SELECT no_acceso FROM cuenta WHERE correo_cuenta='$logIn_correo_01' and contra_cuenta='$logIn_contra_01' and no_acceso='$logIn_acceso_01' and status_cuenta='Desconectado'");
  $logIn_sql_03 = mysqli_query($logIn_connect, "UPDATE cuenta SET status_cuenta = 'Conectado' WHERE correo_cuenta = '$logIn_correo_01'");
    if (mysqli_num_rows($logIn_sql_02) != 0) {
      switch ($logIn_acceso_01) {
        case 4:
          $logIn_connect->query($logIn_sql_03);
          echo "<script>swal('¡Bienvenido!', '¡Datos correctos!', 'success');</script>";
          echo "<script language='javascript' type='text/javascript'>" .
            "location.href='./abcm_usuarios/F07.php'" .
            "</script>";
          break;
        case 1:
          $logIn_connect->query($logIn_sql_03);
          echo "<script>swal('¡Bienvenido!', '¡Datos correctos!', 'success');</script>";
          echo "<script language='javascript' type='text/javascript'>" .
            "location.href='./proceso_de_venta/F01.php'" .
            "</script>";
          break;
        case 2:
          $logIn_connect->query($logIn_sql_03);
          echo "<script>swal('¡Bienvenido!', '¡Datos correctos!', 'success');</script>";
          echo "<script language='javascript' type='text/javascript'>" .
            "location.href='./abcm_productos/F08.php'" .
            "</script>";
          break;
        case 3:
          $logIn_connect->query($logIn_sql_03);
          echo "<script>swal('¡Bienvenido!', '¡Datos correctos!', 'success');</script>";
          echo "<script language='javascript' type='text/javascript'>" .
            "location.href='./reportes/F05.php'" .
            "</script>";
          break;
        default:
          echo "<script>swal('¡Error!', '¡Elija un tipo de acceso valido!', 'error');</script>";
          break;
      }
    } else {
      echo "<script>swal('¡Credenciales invalidas!', '¡La cuenta no existe o no coincide con el tipo de acceso!', 'info');</script>";
    }
}
?>