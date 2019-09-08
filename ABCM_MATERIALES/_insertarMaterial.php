<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>insertarMaterial</title>
</head>

<body>
  <?php
  include '../CONEXION/conexion.php';
  $a = $_POST['no_material'];
  $b = $_POST['nom_material'];
  $c = $_POST['cant_material'];
  $d = $_POST['status_material'];

  $sql = "insert into material values ('$a ','$b','$c','$d');";

  if ($conn->query($sql) === TRUE) {
    echo "<div class='alert alert-success' role='alert'>¡Registro agregado exitosamente!</div>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
  ?>
  <a href="F03.php">Regresar</a>
</body>

</html>