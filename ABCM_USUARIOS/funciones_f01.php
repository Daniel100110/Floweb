
<?php
    function consultar_cuenta(){
      include '../db/conexion.php';
      $sqlc_01 = "select * from cuenta";
      $result = $conn->query($sqlc_01);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo  
          "<tr><th scope='row'>" . $row['no_cuenta'] .
            "</th>" . "<td>" . $row['nom_completo'] . "</td>" .
            "<td>" . $row['tel_usuario'] . "</td>" .
            "<td>" . $row['dir_usuario'] . "</td>" .
            "<td>" . $row['correo_cuenta'] . "</td>" .
            "<td>" . $row['contra_cuenta'] . "</td>" .
            "<td>" . $row['no_acceso'] . "</td>" .
            "<td>" . $row['status_cuenta'] . "</td>" . "</tr>";
        }
      } else { }
      $conn->close();
    }

    function consultar_acceso_01(){
      include '../db/conexion.php';
      $sqlca_01 = "select * from acceso";
      $result = $conn->query($sqlca_01);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr><th scope='row'>" . $row['no_acceso'] . "</th>" .
            "<td>" . $row['tipo_acceso'] . "</td>" .
            "<td>" . $row['status_acceso'] . "</td></tr>";
        }
      } else { }
      $conn->close();
    }

    function consultar_acceso_02(){
      include '../db/conexion.php';
      $sqlca_02 = "select * from acceso";
      $result = $conn->query($sqlca_02);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<option value=" . $row['no_acceso'] . ">" . $row['tipo_acceso'] . "</option>";
        }
      } else { }
      $conn->close();
    }

    function insertar_usuario(){
        include '../db/conexion.php';
        $no_cuenta_i = $_POST['no_cuenta_i'];
        $nom_completo_i = $_POST['nom_completo_i'];
        $tel_usuario_i = $_POST['tel_usuario_i'];
        $dir_usuario_i = $_POST['dir_usuario_i'];
        $correo_cuenta_i = $_POST['correo_cuenta_i'];
        $contra_cuenta_i = $_POST['contra_cuenta_i'];
        $no_acceso_i = $_POST['no_acceso_i'];
        $status_cuenta_i = $_POST['status_cuenta_i'];
        $sqli_01 = "insert into cuenta values ('$no_cuenta_i','$nom_completo_i','$tel_usuario_i','$dir_usuario_i', '$correo_cuenta_i','$contra_cuenta_i','$no_acceso_i','$status_cuenta_i');";
        $sqli_02 = "insert into carrito values ('$no_cuenta_i','$no_cuenta_i','$status_cuenta_i');";
        if ($conn->query($sqli_01) === TRUE) {} else {} $conn->close();
    }

    function insertar_acceso(){
      include '../db/conexion.php';
      $no_acceso_ii = $_POST['no_acceso_ii'];
      $tipo_acceso_ii = $_POST['tipo_acceso_ii'];
      $status_acceso_ii = $_POST['status_acceso_ii'];
    
      $sqlb_01 = "insert into acceso values ('$no_acceso_ii','$tipo_acceso_ii','$status_acceso_ii');";
    
      if ($conn->query($sqlb_01) === TRUE){}else{}$conn->close();
    }

    function borrar_acceso(){
        include '../db/conexion.php';
        $no_acceso_b = $_POST['no_acceso_b'];

        $sqlba_01 = "delete from acceso where no_acceso = '$no_acceso_b'";

        if ($conn->query($sqlba_01) === TRUE) {} else {}
        $conn->close();
    }

    function borrar_usuario(){
      include '../db/conexion.php';
      $no_cuenta_b_u = $_POST['no_cuenta_b_u'];
      $sqlb_01 = "delete from cuenta where no_cuenta = '$no_cuenta_b_u'";
      if ($conn->query($sqlb_01) === TRUE){}else{} $conn->close();
    }

    function modificar_acceso(){
        include '../db/conexion.php';
        $no_acceso_mm = $_POST['no_acceso_mm'];
        $tipo_acceso_mm = $_POST['tipo_acceso_mm'];
        $status_acceso_mm = $_POST['status_acceso_mm'];
      
        try {
          if (empty($no_acceso_mm)) {
          } else {
            if (empty($tipo_acceso_mm)) { } else {
              $sqlmm_01 = "update acceso set tipo_acceso='$tipo_acceso_mm' where no_acceso='$no_acceso_mm'";
              if ($conn->query($sqlmm_01) === TRUE) {
              } else {
              }
            }
            if (empty($status_acceso_mm)) { } else {
              $sqlmm_02 = "update acceso set status_acceso='$status_acceso_mm' where no_acceso='$no_acceso_mm'";
              if ($conn->query($sqlmm_02) === TRUE) {
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
      $no_cuenta_m = $_POST['no_cuenta_m'];
      $nom_completo_m = $_POST['nom_completo_m'];
      $tel_usuario_m = $_POST['tel_usuario_m'];
      $dir_usuario_m = $_POST['dir_usuario_m'];
      $correo_cuenta_m = $_POST['correo_cuenta_m'];
      $contra_cuenta_m = $_POST['contra_cuenta_m'];
      $no_acceso_m = $_POST['no_acceso_m'];
      $status_cuenta_m = $_POST['status_cuenta_m'];
      try {
        if (empty($no_cuenta_m)) {
          echo "<div class='alert alert-danger' role='alert'>¡Error!</div>";
        } else {
          if (empty($nom_completo_m)) { } else {
            $sqlm_01 = "update cuenta set nom_completo='$nom_completo_m' where no_cuenta='$no_cuenta_m'";
            if ($conn->query($sqlm_01) === TRUE) {
              echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
            } else {
              echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
            }
          }
          if (empty($tel_usuario_m)) { } else {
            $sqlm_02 = "update cuentas set tel_usuario='$e' where no_cuenta='$no_cuenta_m'";
            if ($conn->query($sqlm_02) === TRUE) {
              echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
            } else {
              echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
            }
          }
          if (empty($dir_usuario_m)) { } else {
            $sqlm_03 = "update cuentas set dir_usuario='$dir_usuario_m' where no_cuenta='$no_cuenta_m'";
            if ($conn->query($sqlm_03) === TRUE) {
              echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
            } else {
              echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
            }
          }
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