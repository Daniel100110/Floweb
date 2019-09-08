<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>insertarPlanta</title>
</head>

<body>
  <?php
  include '../CONEXION/conexion.php';
  $a = $_POST['no_producto'];
  $b = $_FILES['myfile']['name'];
  $c = $_POST['nom_producto'];
  $d = $_POST['precio_producto'];
  $e = $_POST['cantidad_producto'];
  $f = $_POST['status_producto'];

  $sql = "insert into producto values ('$a ','$b','$c','$d','$e','$f');";

  if (isset($_FILES) && isset($_FILES['myfile']) && !empty($_FILES['myfile']['name'] && !empty($_FILES['myfile']['tmp_name']))) {
    //Hemos recibido el fichero
    //Comprobamos que es un fichero subido por PHP, y no hay inyección por otros medios
    if (!is_uploaded_file($_FILES['myfile']['tmp_name'])) {
      echo "Error: El fichero encontrado no fue procesado por la subida correctamente";
      exit;
    }
    $source = $_FILES['myfile']['tmp_name'];
    $destination = __DIR__ . '/upload/' . $_FILES['myfile']['name'];

    if (is_file($destination)) {
      echo "Error: Ya existe almacenado un fichero con ese nombre";
      @unlink(ini_get('upload_tmp_dir') . $_FILES['myfile']['tmp_name']);
      exit;
    }

    if (!@move_uploaded_file($source, $destination)) {
      echo "Error: No se ha podido mover el fichero enviado a la carpeta de destino";
      @unlink(ini_get('upload_tmp_dir') . $_FILES['myfile']['tmp_name']);
      exit;
    }
    echo "Fichero subido correctamente a: " . $destination;
  }

  if ($conn->query($sql) === TRUE) {
    echo "<div class='alert alert-success' role='alert'>¡Registro agregado exitosamente!</div>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
  ?>
  <a href="F04.php">Regresar</a>
</body>

</html>