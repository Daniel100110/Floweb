<?php
  function mostrar_producto(){
    include '../db/conexion.php';
    $f01_sql_01 = "select * from producto";
    $f01_res_01 = $conn->query($f01_sql_01);
    if ($f01_res_01 -> num_rows > 0) {
      while ($row = $f01_res_01 -> fetch_assoc()) {
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
    $f01_cc_01 = $_SESSION['login_user'];
    $f01_sql_02 = "select * from carrito inner join producto on carrito.no_producto=producto.no_producto where correo_cuenta='$f01_cc_01'";
    $f01_res_02 = $conn -> query($f01_sql_02);
    if ($f01_res_02 -> num_rows > 0) {
        while ($row = $f01_res_02->fetch_assoc()) {
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
  function siguiente(){
    include '../db/conexion.php';
    $f01_pa_sql_01 = "select * from carrito";
    $f01_pa_res_01 = $conn->query($f01_pa_sql_01);
    if ($f01_pa_res_01 -> num_rows > 0) {
      echo "location.href='../proceso_de_pago/F02.php'";
    } else {
      echo "swal('¡Error!', '¡No ha añadido productos!', 'error');";
    }
    $conn->close();
  }
?>
