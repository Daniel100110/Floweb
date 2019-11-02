<?php

  function mostrar_producto(){
    include './db/conexion.php';
    $sql_c = "select * from producto";
    $result_c = $conn->query($sql_c);
    if ($result_c->num_rows > 0) {
      while ($row = $result_c->fetch_assoc()) {
        echo "<div class='col-sm-7 col-md-6 col-lg-5 item'>" .
          "<div class='box'>" .
          "<form>" .
          "<input type='number' value='" . $row['no_producto'] . "' hidden></input>" .
          "<img class='img-thumbnail' src='./imagenes/" . $row['foto_producto'] . "' class='img-thumbnail'>" .
          "<br><br>" .
          "<center>" .
          $row['nom_producto'] . "</br>" .
          "Precio: $" . $row['precio_producto'] . " mxn.</br><br>" .
          "<input type='submit' onclick='agregar_a_carrito()' value='Agregar al carrito'></input>" .
          "</center>" .
          "</form>" .
          "</div>" .
          "</div>";
      }
    } else { }
    $conn->close();
  }

  function crear_carrito(){
    try {
      include '../CONEXION/conexion.php';
      test_crear_carrito($no_carrito, $no_cuenta, $status_carrito);

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

  function insertar_carrito(){
    try {
      include '../CONEXION/conexion.php'; //Se incluye la conexión a la base de datos.
      $no_carrito_producto = 2;
      $no_producto = 3;
      $cantidad = 6;
      $no_carrito = 1;
      test_insertar_carrito($no_carrito_producto, $no_producto, $cantidad, $no_carrito);
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