<?php
  function mostrar_producto(){
    include './db/conexion.php';
    $sql_c = "select * from producto";
    $result_c = $conn->query($sql_c);
    if ($result_c->num_rows > 0) {
      while ($row = $result_c->fetch_assoc()) {
        echo 
          "<div class='col-sm-7 col-md-6 col-lg-5 item'>" .
            "<div class='box'>" .
              "<form method='post'>" .
                "<input id='".$row['no_producto'] ."' type='number' value='" . $row['no_producto'] . "' hidden></input>" .
                "<img class='img-thumbnail' src='./imagenes/" . $row['foto_producto'] . "' class='img-thumbnail'>" .
                "<br><br>" .
                "<center>" .
                  $row['nom_producto'] . "</br>" .
                  "Precio: $" . $row['precio_producto'] . " mxn.</br><br>" .
                  "<input type='submit' onclick='agregar_a_carrito();' value='Agregar al carrito'></input>" .
                "</center>" .
              "</form>" .
            "</div>" .
          "</div>";
      }
    } else { }
    $conn->close();
  }
  function agregar_a_carrito(){
        include './db/conexion.php';


        $sql_cc='select no_pedido';
        $sql_ccc='select ';

        $no_pedido = 1;//arreglar
        
        $no_producto = $_POST['no_producto'];
        $cantidad = 1;
        $no_carrito = 1;
        $sql = "insert into pedido values ('$no_pedido', '$no_producto','$cantidad','$no_carrito');";
        if ($conn->query($sql)) {
          echo "¡Registro agregado exitosamente!";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
  }
?>