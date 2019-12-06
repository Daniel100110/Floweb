<?php
  function consultar_cuenta(){
    include '../db/conexion.php';
      $correo_01 = $_SESSION['login_user'];
      $sql_01 = "select * from cuenta where correo_cuenta='$correo_01'";
      $result_01 = $conn -> query($sql_01);
      if ($result_01 -> num_rows > 0) {
        while ($row = $result_01 -> fetch_assoc()) {
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
      $correo_02 = $_SESSION['login_user'];
      $sql_02 = "select * from carrito inner join producto on carrito.no_producto = producto.no_producto where carrito.correo_cuenta='$correo_02'";
      $result_02 = $conn->query($sql_02);
      if ($result_02 -> num_rows > 0)
      {
        while ($row = $result_02 -> fetch_assoc())
        {
          $precio_02 = $row['precio'];
          $float_p_02 = floatval($precio_02);
          $english_format_02 = number_format($float_p_02, 2, '.', ',');
          echo 
          "<li class='list-group-item d-flex justify-content-between lh-condensed'>".
            "<div>".
              "<h6 class='my-0'>".$row['nom_producto']."</h6>".
            "</div>".
            "<span class='text-muted'>$".$english_format_02."</span>".
          "</li>";
        }
      }
      else{}
    $conn->close();
  }

  function ver_num_productos(){
    include '../db/conexion.php';
    $correo_03 = $_SESSION['login_user'];
    $sql_03 = "select count(no_producto) from carrito where carrito.correo_cuenta='$correo_03'";
    $result_03 = $conn->query($sql_03);
    if ($result_03 -> num_rows > 0) {
      while ($row = $result_03 -> fetch_assoc()) {
        echo $row['count(no_producto)'];
      }
    } else { }
    $conn->close();
  }

  function ver_subtotal(){
    include '../db/conexion.php';
    $correo_04 = $_SESSION['login_user'];
    $sql_04 = "select sum(precio) from carrito where carrito.correo_cuenta='$correo_04'";
    $result_04 = $conn -> query($sql_04);
    if ($result_04 -> num_rows > 0) {
      while ($row = $result_04 -> fetch_assoc()) {
        $sum_precio_04 = $row['sum(precio)'];
        $float_p_04 = floatval($sum_precio_04);
        $english_f_04 = number_format($float_p_04, 2, '.', ',');
        echo "$".$english_f_04;
      }
    } else{}
    $conn->close();
  }

  function ver_total(){
    include '../db/conexion.php';
    $correo_05 = $_SESSION['login_user'];
    $sql_05 = "select sum(precio) from carrito where carrito.correo_cuenta='$correo_05'";
    $result_05 = $conn -> query($sql_05);
    if ($result_05 -> num_rows > 0) {
      while ($row = $result_05 -> fetch_assoc()) {
        $sum_precio_05 = $row['sum(precio)']*1.16;
        $float_p_05 = floatval($sum_precio_05);
        $english_f_05 = number_format($float_p_05, 2, '.', ',');
        echo "$".$english_f_05;
      }
    } else{}
    $conn->close();
  }

  function ver_saldo(){
    include '../db/conexion.php';
    $correo_06 = $_SESSION['login_user'];
    $sql_06 = "select saldo_persona from datosPersonales inner join cuenta on cuenta.correo_cuenta=datosPersonales.correo_cuenta where cuenta.correo_cuenta='$correo_06'";
    $result_06 = $conn->query($sql_06);
    if ($result_06 -> num_rows > 0) {
      while ($row = $result_06 -> fetch_assoc()) {
        $sum_precio_06 = $row['saldo_persona'];
        $float_p_06 = floatval($sum_precio_06);
        $english_f_06 = number_format($float_p_06, 2, '.', ',');
        echo "$".$english_f_06;
      }
    } else { }
    $conn->close();
  }

  function get_subtotal(){
    include '../db/conexion.php';
    $correo_04 = $_SESSION['login_user'];
    $sql_04 = "select sum(precio) from carrito where carrito.correo_cuenta='$correo_04'";
    $result_04 = $conn -> query($sql_04);
    if ($result_04 -> num_rows > 0) {
      while ($row = $result_04 -> fetch_assoc()) {
        $sum_precio_04 = $row['sum(precio)'];
      }
    } else{}
    $conn->close();
    return $sum_precio_04;
  }

  function get_total(){
    include '../db/conexion.php';
    $correo_04 = $_SESSION['login_user'];
    $sql_04 = "select sum(precio) from carrito where carrito.correo_cuenta='$correo_04'";
    $result_04 = $conn -> query($sql_04);
    if ($result_04 -> num_rows > 0) {
      while ($row = $result_04 -> fetch_assoc()) {
        $total= $row['sum(precio)']*1.16;
      }
    } else{}
    $conn->close();
    return $total;
  }

  function get_productos(){
    include '../db/conexion.php';
    $correo_x = $_SESSION['login_user'];
    $i=1; $lista="";
    $sql_x = "select count(producto.no_producto) from producto inner join carrito on producto.no_producto = carrito.no_producto where carrito.correo_cuenta='$correo_x'";
    $result_x = $conn -> query($sql_x);
    if ($result_x -> num_rows > 0) {
      while ($row = $result_x -> fetch_assoc()) {
        $num_productos = $row['count(producto.no_producto)'];
      }
    } else{}
    $sql_x2 = "select producto.nom_producto from producto inner join carrito on producto.no_producto = carrito.no_producto where carrito.correo_cuenta='$correo_x'";
    $result_x2 = $conn -> query($sql_x2);
    if ($result_x2 -> num_rows > 0) {
      while ($row = $result_x2 -> fetch_assoc()) {
        if($i<$num_productos){
          $lista=$lista.$row['nom_producto'].", ";
        }
        else{
          $lista=$lista.$row['nom_producto'].".";
        }
        $i++;
      }
    } else{}
    $conn->close();
    return $lista;
  }