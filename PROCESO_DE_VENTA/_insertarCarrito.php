<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>insertarFabricacion</title>
</head>

<body>
  <?php
  include '../CONEXION/conexion.php';
  // $a = $_POST['no_cliente'];
  $b = $_POST['no_producto'];
  $c = $_POST['cantidad'];

  $sql = "insert into carrito_producto values (1,'$b','$c',1);";

  if ($conn->query($sql) === TRUE) {
    echo "<div class='alert alert-success' role='alert'>¡Registro agregado exitosamente!</div>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
  ?>
  <a href="fx.php">Regresar</a>
</body>

</html>