<?php
  function test_crear_carrito(){
        try {
        include '../CONEXION/conexion.php';
        $no_carrito = 4.6;
        $no_cuenta = 1;
        $status_carrito = 'DISPONIBLE';
        test_crear_carrito($no_carrito,$no_cuenta,$status_carrito);
        
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

  function test_insertar_carrito(){
    try {
      include '../CONEXION/conexion.php'; //Se incluye la conexión a la base de datos.
      $no_carrito_producto = 2;
      $no_producto = 3;
      $cantidad = 6;
      $no_carrito = 1;
      test_insertar_carrito($no_carrito_producto,$no_producto,$cantidad,$no_carrito);
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