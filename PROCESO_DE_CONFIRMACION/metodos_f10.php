<?php

  include '../CONEXION/conexion.php';
  // $a = $_POST['no_cliente'];
  $c = $_POST['subtotal'];
  $d = $_POST['iva'];
  $e = $_POST['total'];

  $sql = "insert into pedido values (1,1,'$c',1,'$e','Pagado');";

  if ($conn->query($sql) === TRUE) {
    echo "<div class='alert alert-success' role='alert'>¡Registro agregado exitosamente!</div>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();


  ?>
