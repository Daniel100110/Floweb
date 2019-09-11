<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>insertarFabricacion</title>
</head>

<body>
  <?php
  $no_carrito = 4.6;
  $no_cuenta = 1;
  $status_carrito = 'DISPONIBLE';
  test_crear_carrito($no_carrito,$no_cuenta,$status_carrito);

  function test_crear_carrito($no_carrito,$no_cuenta,$status_carrito)
  {
    try {
      include '../CONEXION/conexion.php';
      $sql = "insert into carrito values ($no_carrito,$no_cuenta,'$status_carrito');";

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
