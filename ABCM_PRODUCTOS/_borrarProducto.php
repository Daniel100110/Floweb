<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>BorrarArreglo</title>
  </head>
  <body>
    <?php
      include '../CONEXION/conexion.php';
      $a = $_POST['no_producto'];

      $sql = "delete from producto where no_producto= '$a'";

      if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>¡Registro borrado exitosamente!</div>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
        $conn->close();
    ?>
    <a href="F04.php">Regresar</a>
  </body>
</html>
