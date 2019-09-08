<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>modificarUsuario</title>
</head>

<body>
  <?php
  include '../CONEXION/conexion.php';
  $a = $_POST['no_cuenta'];
  $b = $_POST['nom_usuario'];
  $c = $_POST['apll_paterno'];
  $d = $_POST['apll_materno'];
  $e = $_POST['tel_usuario'];
  $f = $_POST['dir_usuario'];
  $g = $_POST['correo_cuenta'];
  $h = $_POST['contra_cuenta'];
  $i = $_POST['no_acceso'];
  $j = $_POST['status_cuenta'];

  try {
    if (empty($a)) {
      echo "<div class='alert alert-danger' role='alert'>¡Error!</div>";
    } else {
      if (empty($b)) { } else {
        $sql = "update cuenta set no_cuenta='$b' where no_cuenta='$a'";
        if ($conn->query($sql) === TRUE) {
          echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
        } else {
          echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
        }
      }
      if (empty($c)) { } else {
        $sql = "update cuenta set nom_usuario='$c' where no_cuenta='$a'";
        if ($conn->query($sql) === TRUE) {
          echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
        } else {
          echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
        }
      }
      if (empty($d)) { } else {
        $sql = "update cuentas set apll_paterno='$d' where no_cuenta='$a'";
        if ($conn->query($sql) === TRUE) {
          echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
        } else {
          echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
        }
      }
      if (empty($e)) { } else {
        $sql = "update cuentas set tel_usuario='$e' where no_cuenta='$a'";
        if ($conn->query($sql) === TRUE) {
          echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
        } else {
          echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
        }
      }
      if (empty($f)) { } else {
        $sql = "update cuentas set dir_usuario='$f' where no_cuenta='$a'";
        if ($conn->query($sql) === TRUE) {
          echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
        } else {
          echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
        }
      }
      if (empty($g)) { } else {
        $sql = "update cuentas set correo_cuenta='$g' where no_cuenta='$a'";
        if ($conn->query($sql) === TRUE) {
          echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
        } else {
          echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
        }
      }
      if (empty($h)) { } else {
        $sql = "update cuentas set contra_cuenta='$h' where no_cuenta='$a'";
        if ($conn->query($sql) === TRUE) {
          echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
        } else {
          echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
        }
      }
      if (empty($i)) { } else {
        $sql = "update cuentas set no_acceso='$i' where no_cuenta='$a'";
        if ($conn->query($sql) === TRUE) {
          echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
        } else {
          echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
        }
      }
      if (empty($j)) { } else {
        $sql = "update cuentas set status_cuenta='$j' where no_cuenta='$a'";
        if ($conn->query($sql) === TRUE) {
          echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
        } else {
          echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
        }
      }
    }
  } catch (Exception $e) {
    echo "<div class='alert alert-danger' role='alert'>¡Error!</div>";
  }

  ?>
  <a href="F01.php">Regresar</a>
</body>

</html>