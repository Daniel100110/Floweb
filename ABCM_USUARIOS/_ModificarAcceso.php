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
  $a = $_POST['no_acceso'];
  $b = $_POST['tipo_acceso'];
  $c = $_POST['status_acceso'];

  try {
    if (empty($a)) {
      echo "<div class='alert alert-danger' role='alert'>¡Error!</div>";
    } else {
      if (empty($b)) { } else {
        $sql = "update acceso set tipo_acceso='$b' where no_acceso='$a'";
        if ($conn->query($sql) === TRUE) {
          echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
        } else {
          echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
        }
      }
      if (empty($c)) { } else {
        $sql = "update acceso set status_acceso='$c' where no_acceso='$a'";
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