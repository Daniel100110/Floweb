<?php
  function mostrar_producto(){
    include '../db/conexion.php';
    $sql_c = "select * from producto";
    $result_c = $conn->query($sql_c);
    if ($result_c->num_rows > 0) {
      while ($row = $result_c->fetch_assoc()) {
      echo
      '<div class="card mb-3 shadow-sm">'.
        '<form method="post">'.
          '<div class="card-header">'.
            '<input name="no_producto" type="number" value="'.$row['no_producto'].'" hidden>'.
            '<h4 class="my-0 font-weight-normal">'.$row['nom_producto'].'</h4>'.
          '</div>'.
          '<div class="card-body">'.
            '<h1 class="card-title pricing-card-title"><img class="animated infinite pulse delay-5s img-thumbnail" src="../pictures/'.$row['foto_producto'].'"></h1>'.
              'Precio: $'. $row['precio_producto'].'.00 MXN.'.
          '</div>'.
          "<input name='submit' type='submit' class='btn btn-lg btn-outline-success' value='Agregar al carrito'><br><br>" .
        "</form>" .
      '</div>';
      }
    } else { }
    $conn->close();
  }
  function mostrar_carrito(){
    include '../db/conexion.php';
    $correo_cuenta=$_SESSION['login_user'];
    $sql = "select * from carrito inner join producto on carrito.no_producto=producto.no_producto where correo_cuenta='$correo_cuenta'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo
                "<tr>" .
                  "<td>" .
                      $row['nom_producto'] .
                  "</td>" .
                  "<td>" .
                    $row['cantidad'] .
                  "</td>" .
                  "<td>$" .
                    $row['precio'] .
                  ".00</td>" .
                "</tr>";
        }
    } else { }
    $conn->close();
  }
?>