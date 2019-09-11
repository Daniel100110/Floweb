<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>insertarFabricacion</title>
</head>

<body>
  <?php
  $no_carrito_producto = 2;
  $no_producto = 3;
  $cantidad = 6;
  $no_carrito = 1;
  test_insertar_carrito($no_carrito_producto,$no_producto,$cantidad,$no_carrito);

  function test_insertar_carrito($no_carrito_producto,$no_producto,$cantidad,$no_carrito)
  {
    try {
      include '../CONEXION/conexion.php'; //Se incluye la conexión a la base de datos.
      $sql = "insert into carrito_producto values ($no_carrito_producto,$no_producto,$cantidad,$no_carrito);";

      if ($conn->query($sql) === TRUE) {
        echo "¡Registro agregado exitosamente!";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    } catch (exception $e) {
      echo "Los valores ingresados no son los correctos.";
    }
    $conn->close();
  }
  ?>
  <a href="fx.php">Regresar</a>

</body>

</html>