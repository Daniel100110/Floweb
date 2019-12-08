<?php
  if (isset($_SESSION['login_user'])) {
    header("location:home.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>[00] Registro</title>
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
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-4">
        <form class="needs-validation" method="post">
          <img class="mb-4" src="./img/logo.png" alt="" width="100%" height="100px">
          <br>
          <center><span>Registro de cuenta</span></center>
          <span>Correo:</span>
          <input type="email" class="form-control" name="correo_cuenta" required>
          <div class="invalid-feedback">El campo es obligatorio.</div>
          <span>Contraseña:</span>
          <input type="password" class="form-control" name="contra_cuenta" required>
          <div class="invalid-feedback">El campo es obligatorio.</div>
          <span>Confirmar contraseña:</span>
          <input type="password" class="form-control" name="contra_cuenta2" required>
          <div class="invalid-feedback">El campo es obligatorio.</div>
          <br>
          <input name="submit" type="submit" class="btn btn-lg btn-warning btn-block" value="Crear cuenta">
          <br>
          <center><a href="login.php">Iniciar sesión</a></center>
        </form>
      </div>
      <div class="col-sm-4">
      </div>
    </div>
  </div>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <?php
    if (isset($_POST['submit'])) {
      include './db/conexion.php';
      $reg_correo_01 = $_POST['correo_cuenta'];
      $reg_contra_01 = $_POST['contra_cuenta'];
      $reg_contra_02 = $_POST['contra_cuenta2'];
      $reg_acceso_01 = 1;
      $reg_status_01 = "Desconectado";
      $reg_saldo_01 = 0;
      if (strcmp($reg_contra_01, $reg_contra_02) === 0) {
        $sql = "insert into cuenta values ('$reg_correo_01','$reg_contra_01','$reg_acceso_01','$reg_saldo_01','$reg_status_01');";
        if ($conn->query($sql)) {
          echo  "<script>".
                  "swal('¡Bienvenido!', '¡Cuenta creada exitosamente!', 'success');".
                "</script>";
        } else {
          echo "<script>".
                  "swal('¡La cuenta ya existe!', '¡La cuenta ya existe o falta un campo!', 'error');".
                "</script>";
        }
        $conn->close();
      } else {
        echo "<script>"."
                swal('¡Error!', '¡Las contraseñas no coinciden!', 'error');".
              "</script>";
      }
    }
  ?>
</body>
</html>