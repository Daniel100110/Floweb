
<?php
  function consultar_cuenta(){
    include '../db/conexion.php';
    $f07_cc_sql_01 = "select * from cuenta inner join acceso on cuenta.no_acceso =  acceso.no_acceso";
    $f07_cc_res_01 = $conn->query($f07_cc_sql_01);
    if ($f07_cc_res_01 -> num_rows > 0) {
      while ($row = $f07_cc_res_01 -> fetch_assoc()) {
        echo  
        "<tr>".
          "<th scope='row'>".
            $row['correo_cuenta'].
          "</th>". 
          "<td>". 
            $row['contra_cuenta'].
          "</td>".
          "<td>".
            $row['tipo_acceso'].
          "</td>".
          "<td>".
            $row['status_cuenta'].
          "</td>". 
        "</tr>";
      }
    } else { }
    $conn->close();
  }
  function consultar_acceso_01(){
    include '../db/conexion.php';
    $f07_ca_sql_01 = "select * from acceso";
    $f07_ca_res_01 = $conn->query($f07_ca_sql_01);
    if ($f07_ca_res_01 -> num_rows > 0) {
      while ($row = $f07_ca_res_01 -> fetch_assoc()) {
        echo "<tr>".
                "<th scope='row'>".
                  $row['no_acceso'].
                "</th>".
                "<td>".
                  $row['tipo_acceso'].
                "</td>".
                "<td>".
                  $row['status_acceso'].
                "</td>". 
              "</tr>";
      }
    } else { }
    $conn->close();
  }
  function consultar_acceso_02(){
    include '../db/conexion.php';
    $f07_ca_sql_02 = "select * from acceso";
    $f07_ca_res_02 = $conn->query($f07_ca_sql_02);
    if ($f07_ca_res_02 -> num_rows > 0) {
      while ($row = $f07_ca_res_02->fetch_assoc()) {
        echo "<option value=".$row['no_acceso'].">".$row['tipo_acceso']."</option>";
      }
    } else { }
    $conn->close();
  }
  function insertar_usuario(){
      include '../db/conexion.php';
      $f07_iu_correo_01 = $_POST['no_cuenta_i'];
      $f07_iu_contra_01 = $_POST['nom_completo_i'];
      $f07_iu_acceso_01 = $_POST['tel_usuario_i'];
      $f07_iu_saldo_01 = $_POST['dir_usuario_i'];
      $f07_iu_status_01 = "Desconectado";
      $f07_iu_sql_01 = "insert into cuenta values ('$f07_iu_correo_01','$f07_iu_contra_01','$f07_iu_acceso_01','$f07_iu_saldo_01', '$f07_iu_status_01');";
      if ($conn->query($f07_iu_sql_01) === TRUE) {} else {} $conn->close();
  }
  function borrar_usuario(){
    include '../db/conexion.php';
    $f07_bu_cuenta_01 = $_POST['no_cuenta_b_u'];
    $f07_bu_sql_01 = "delete from cuenta where no_cuenta = '$f07_bu_cuenta_01'";
    if ($conn->query($f07_bu_sql_01) === TRUE){}else{} $conn->close();
  }
  function modificar_usuario(){
    include '../db/conexion.php';
    $f07_mu_correo_01 = $_POST['no_cuenta_m'];
    $f07_mu_contra_01 = $_POST['nom_completo_m'];
    $f07_mu_acceso_01 = $_POST['tel_usuario_m'];
    $f07_mu_saldo_01 = $_POST['dir_usuario_m'];
    $f07_mu_status_01 = "Desconectado";
    try {
      if (empty($f07_mu_correo_01)) {
        echo "<div class='alert alert-danger' role='alert'>¡Error!</div>";
      } else {
        if (empty($contra_cuenta_m)) { } else {
          $f07_mu_sql_01 = "update cuentas set contra_cuenta='$f07_mu_contra_01' where correo_cuenta='$f07_mu_correo_01'";
          if ($conn->query($f07_mu_sql_01) === TRUE) {
          } else {
          }
        }
        if (empty($f07_mu_acceso_01)) { } else {
          $f07_mu_sql_02 = "update cuentas set no_acceso='$f07_mu_acceso_01' where correo_cuenta='$f07_mu_correo_01'";
          if ($conn->query($f07_mu_sql_02) === TRUE) {
          } else {
          }
        }
        if (empty($f07_mu_saldo_01)) { } else {
          $f07_mu_sql_03 = "update cuentas set no_acceso='$f07_mu_saldo_01' where correo_cuenta='$f07_mu_correo_01'";
          if ($conn->query($f07_mu_sql_03) === TRUE) {
          } else {
          }
        }
        if (empty($f07_mu_status_01)) { } else {
          $f07_mu_sql_04 = "update cuentas set status_cuenta='$f07_mu_status_01' where correo_cuenta='$f07_mu_correo_01'";
          if ($conn->query($f07_mu_sql_04) === TRUE) {
          } else {
          }
        }
      }
    } catch (Exception $e) {
      echo "<div class='alert alert-danger' role='alert'>¡Error!</div>";
    }
  }
?>