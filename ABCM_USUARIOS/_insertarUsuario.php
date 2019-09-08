<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>insertarUsuario</title>
</head>

<body>
  <?php
  include '../CONEXION/conexion.php';
  $a = $_POST['no_cuenta'];
  $b = $_POST['nom_usuario'];
  $c = $_POST['apll_paterno'];
  $d = $_POST['apll_materno'];
  $e = $_POST['tel_usuario'];
  $f = $_POST['dir_usuario'];
  $g = $_POST['correo_cuenta'];
  $h = $_POST['contra_cuenta'];
  $i = $_POST['no_acceso'];
  $j = $_POST['status_cuenta'];

  $sql = "insert into cuenta values ('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j');";
  $sql2 = "insert into carrito values ('$a','$a','DISPONIBLE');";

  if ($conn->query($sql) === TRUE) {
    echo "<div class='alert alert-success' role='alert'>¡Registro agregado exitosamente!</div>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  if ($conn->query($sql2) === TRUE) {
    echo "<div class='alert alert-success' role='alert'>¡Registro agregado exitosamente!</div>";
  } else {
    echo "Error: " . $sql2. "<br>" . $conn->error;
  }
  $conn->close();
  ?>
  <a href="F01.php">Regresar</a>
</body>

</html>