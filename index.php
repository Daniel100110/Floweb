<?php
if (isset($_SESSION['login_user'])) {
  header("location:home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login V17</title>
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
          <span class="login100-form-title p-b-34">
            Inicio de sesión
          </span>

          <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
            <input id="username" class="input100" type="text" name="username" placeholder="User name">
            <span class="focus-input100"></span>
          </div>
          <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
            <input id="password" class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
          <label class="input100" style="text-align:right;">Tipo de acceso:</label>
          </div>

          <select class="wrap-input100 rs2-wrap-input100 validate-input m-b-20">
            <option value="A">Administrador</option>
            <option value="B">Empleado</option>
          </select>

          <div class="container-login100-form-btn">
            <input name="submit" type="submit" value="Iniciar" class="login100-form-btn">
          </div>

          <div class="w-full text-center p-t-27 p-b-239">
            <span class="txt1">
              Recuperar contraseña
            </span>

            <a href="#" class="txt2">
              correo / contraseña
            </a>
          </div>

          <div class="w-full text-center">
            <a href="#" class="txt3">
              Registrarse
            </a>
          </div>
        </form>

        <div class="login100-more" style="background-image: url('./IMAGENES/[pp]fondo.jpg');"></div>
      </div>
    </div>
  </div>

</body>

</html>

<?php
if (isset($_POST['submit'])) {
  $connect = mysqli_connect("localhost","root","","floweb2");
  session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];
  $_SESSION['login_user'] = $username;
  $query = mysqli_query($connect, "SELECT username FROM logs WHERE username='$username' and password='$password'");
  if (mysqli_num_rows($query) != 0) {
    echo "<script language='javascript' type='text/javascript'> location.href='./abcm_materiales/F03.php' </script>";
  } else {
    echo "<script type='text/javascript'>alert('User Name Or Password Invalid!')</script>";
  }
}
?>