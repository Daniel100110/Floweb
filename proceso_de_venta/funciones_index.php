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
                "<input name='no_producto' type='number' value='" . $row['no_producto'] . "' hidden>" .
                "<img class='img-thumbnail' src='../pictures/" . $row['foto_producto'] . "'>" .
                "<br><br>" .
                "<center>" . $row['nom_producto'] . "<br>" .
                  "Precio: $" . $row['precio_producto'] . " mxn.<br><br>" .
                  "<input name='submit' type='submit' value='Agregar al carrito'>" .
                "</center>" .
              "</form>" .
            "</div>" .
          "</div>";
      }
    } else { }
    $conn->close();
  }
  function mostrar_carrito(){
    include '../db/conexion.php';
    $correo=$_SESSION['login_user'];
    $sql = "";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo
                "<tr>" .
                  "<td>" .
                      $row['nom_producto'] .
                  "</td>" .
                  "<td>" .
                    $row['cantidad_producto'] .
                  "</td>" .
                  "<td>" .
                    $row['precio_producto'] .
                  "</td>" .
                "</tr>";
        }
    } else { }
    $conn->close();
  }
?>