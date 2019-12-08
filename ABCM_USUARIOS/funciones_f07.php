
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
      while ($row = $result->fetch_assoc()) {
        echo "<option value=" . $row['no_acceso'] . ">".
                $row['tipo_acceso'].
              "</option>";
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
  function insertar_acceso(){
    include '../db/conexion.php';
    $f07_ia_acceso_01 = $_POST['no_acceso_ii'];
    $f07_ia_tipo_acceso_01 = $_POST['tipo_acceso_ii'];
    $f07_ia_status_acceso_01 = $_POST['status_acceso_ii'];
    $f07_ia_sql_01 = "insert into acceso values ('$f07_ia_acceso_01','$f07_ia_tipo_acceso_01','$f07_ia_status_acceso_01');";
    if ($conn->query($f07_ia_sql_01) === TRUE){}else{}$conn->close();
  }
  function borrar_acceso(){
      include '../db/conexion.php';
      $f07_ba_acceso_01 = $_POST['no_acceso_b'];
      $f07_ba_sql_01 = "delete from acceso where no_acceso = '$f07_ba_acceso_01'";
      if ($conn->query($f07_ba_sql_01) === TRUE) {} else {}
      $conn->close();
  }
  function borrar_usuario(){
    include '../db/conexion.php';
    $f07_bu_cuenta_01 = $_POST['no_cuenta_b_u'];
    $f07_bu_sql_01 = "delete from cuenta where no_cuenta = '$f07_bu_cuenta_01'";
    if ($conn->query($f07_bu_sql_01) === TRUE){}else{} $conn->close();
  }
  function modificar_acceso(){
      include '../db/conexion.php';
      $f07_ma_acceso_01 = $_POST['no_acceso_mm'];
      $f07_ma_tipo_acceso_01 = $_POST['tipo_acceso_mm'];
      $f07_ma_status_01 = $_POST['status_acceso_mm'];
      try {
        if (empty($f07_ma_acceso_01)) {
        } else {
          if (empty($f07_ma_tipo_acceso_01)) { } else {
            $f07_ma_sql_01 = "update acceso set tipo_acceso='$f07_ma_tipo_acceso_01' where no_acceso='$f07_ma_status_01'";
            if ($conn->query($f07_ma_sql_01) === TRUE) {
            } else {
            }
          }
          if (empty($status_acceso_mm)) { } else {
            $f07_ma_sql_02 = "update acceso set status_acceso='$f07_ma_status_01' where no_acceso='$f07_ma_status_01'";
            if ($conn->query($f07_ma_sql_02) === TRUE) {
            } else {
            }
          }
        }
      } catch (Exception $e2) {
        echo "<div class='alert alert-danger' role='alert'>¡Error!</div>";
      }
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
        if (empty($correo_cuenta_m)) { } else {
          $sqlm_04 = "update cuentas set correo_cuenta='$correo_cuenta_m' where no_cuenta='$no_cuenta_m'";
          if ($conn->query($sqlm_04) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
          } else {
            echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
          }
        }
        if (empty($contra_cuenta_m)) { } else {
          $sqlm_05 = "update cuentas set contra_cuenta='$contra_cuenta_m' where no_cuenta='$no_cuenta_m'";
          if ($conn->query($sqlm_05) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
          } else {
            echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
          }
        }
        if (empty($no_acceso_m)) { } else {
          $sqlm_06 = "update cuentas set no_acceso='$no_acceso_m' where no_cuenta='$no_cuenta_m'";
          if ($conn->query($sqlm_06) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
          } else {
            echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
          }
        }
        if (empty($status_cuenta_m)) { } else {
          $sqlm_07 = "update cuentas set status_cuenta='$status_cuenta_m' where no_cuenta='$no_cuenta_m'";
          if ($conn->query($sqlm_07) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
          } else {
            echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
          }
        }
      }
    } catch (Exception $e) {
      echo "<div class='alert alert-danger' role='alert'>¡Error!</div>";
    }
  }
?>