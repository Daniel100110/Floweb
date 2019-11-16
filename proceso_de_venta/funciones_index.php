<?php
  function mostrar_producto(){
    include '../db/conexion.php';
    $sql_c = "select * from producto";
    $result_c = $conn->query($sql_c);
    if ($result_c->num_rows > 0) {
      while ($row = $result_c->fetch_assoc()) {
        echo 
          "<div class='col-sm-7 col-md-6 col-lg-5 item'>" .
            "<div class='box'>" .
              "<form method='post'>" .
                "<input name='no_producto' type='number' value='" . $row['no_producto'] . "' hidden></input>" .
                "<img class='img-thumbnail' src='../pictures/" . $row['foto_producto'] . "' class='img-thumbnail'>" .
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
    include '../db/conexion.php';
    $no_producto = $_POST['no_producto'];
    $correo=$_SESSION['login_user'];
    $status_carrito="En proceso";

    $sql_a = "select no_cuenta from cuenta where correo_cuenta = '$correo'";
    $result_a = $conn->query($sql_a);
    if ($result_a->num_rows > 0) {
      while ($row = $result_a->fetch_assoc()) {
        $no_cuenta=$row['no_cuenta'];
      }
      $sql_a2 = "insert into carrito values ('$no_cuenta', '$no_producto','$status_carrito');";
        if ($conn->query($sql_a2)) {
          echo "¡Registro agregado exitosamente!";
        } else {
        }
    } else { }
    $conn->close();
  }
  function mostrar_carrito(){
    include '../db/conexion.php';
    $sql = "select * from carrito";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo
                "<tr>" .
                  "<td>" .
                      $row['no_cuenta'] .
                  "</td>" .
                  "<td>" .
                    $row['no_producto'] .
                  "</td>" .
                  "<td>" .
                    $row['status_carrito'] .
                  "</td>" .
                "</tr>";
        }
    } else { }
    $conn->close();
  }
?>