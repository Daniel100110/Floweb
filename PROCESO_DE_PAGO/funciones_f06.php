<?php
function consultar_cuenta(){
      include '../db/conexion.php';
      $correo=$_SESSION['login_user'];
      $sqlc_01 = "select * from cuenta where correo_cuenta='$correo'";
      $result = $conn->query($sqlc_01);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo  
          "<form>".
            "<th scope='row'>". 
            "<input value='". $row['no_cuenta'] ."' readonly='readonly'></input><br>".
            "<input value='" . $row['nom_completo'] . "' readonly='readonly'></input><br>" .
            "<input value='" . $row['tel_usuario'] . "' readonly='readonly'></input><br>" .
            "<input value='" . $row['dir_usuario'] . "' readonly='readonly'></input><br>" .
            "<input value='" . $row['saldo_usuario'] . "' readonly='readonly'></input><br>" .
            "<input value='" . $row['no_cuenta'] . "' readonly='readonly'></input><br>" .
            "<input value='" . $row['num_producto'] . "' readonly='readonly'></input><br>" .
            "<input value='" . $row['cant_producto'] . "' readonly='readonly'></input><br>" . 
            "<input value='" . $row['precio_unit_producto'] . "' readonly='readonly'></input><br>" .
            "<input value='" . $row['status_cuenta'] . "' readonly='readonly'></input><br>" .
            "<input value='" . $row['status_cuenta'] . "' readonly='readonly'></input><br>" .
            "<input value='" . $row['status_cuenta'] . "' readonly='readonly'></input><br>" .
          "</form>";
        }
      } else { }
      $conn->close();
    }

function ver_carrito(){
  include '../db/conexion.php';
  $correo=$_SESSION['login_user'];
  $sqlc_01 = "select * from carrito inner join producto on carrito.no_producto=producto.no_producto";
  $result = $conn->query($sqlc_01);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "<li class='list-group-item d-flex justify-content-between lh-condensed'>".
      "<div>".
          "<h6 class='my-0'>".$row['nom_producto']."</h6>".
          "<small class='text-muted'>☆☆☆☆☆ </small>".
      "</div>".
      "<span class='text-muted'>".$row['precio_producto']."</span>".
    "</li>";

    }
  } else { }
  $conn->close();
}

    ?>