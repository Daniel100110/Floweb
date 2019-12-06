<?php
if (isset($_SESSION['login_user'])) {
  header("location:home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Floweb</title>
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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict'

      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation')

        // Loop over them and prevent submission
        Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault()
              event.stopPropagation()
            }
            form.classList.add('was-validated')
          }, false)
        })
      }, false)
    }())
  </script>
  <?php
  if (isset($_POST['submit'])) {
    include './db/conexion.php';
    $correo_cuenta = $_POST['correo_cuenta'];
    $contra_cuenta = $_POST['contra_cuenta'];
    $contra_cuenta2 = $_POST['contra_cuenta2'];
    $no_acceso = 1;
    $status_cuenta = "offline";
    if (strcmp($contra_cuenta, $contra_cuenta2) === 0) {
      $sql = "insert into cuenta values ('$correo_cuenta','$contra_cuenta','$no_acceso','$status_cuenta');";
      if ($conn->query($sql)) {
        echo "<script>swal('¡Bienvenido!', '¡Cuenta creada exitosamente!', 'success');</script>";
      } else {
        echo "<script>swal('¡La cuenta ya existe!', '¡La cuenta ya existe o falta un campo!', 'error');</script>";
      }
      $conn->close();
    } else {
      echo "<script>swal('¡Error!', '¡Las contraseñas no coinciden!', 'error');</script>";
    }
  }
  ?>
</body>

</html>