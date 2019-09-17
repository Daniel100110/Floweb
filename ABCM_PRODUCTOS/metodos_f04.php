<?php
    function borrar_producto(){
    include '../conexion/conexion.php';
      $a = $_POST['no_producto'];
      $sql = "delete from producto where no_producto= '$a'";
      if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>¡Registro borrado exitosamente!</div>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
        $conn->close();
    }

    function insertar_fabricacion(){
    include '../conexion/conexion.php';
      $a = $_POST['no_lista'];
      $b = $_POST['no_material'];
      $c = $_POST['cant_material'];
      $d = $_POST['no_producto'];
      $sql = "insert into fabricacion values ('$a','$b','$c','$d');";
      if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>¡Registro agregado exitosamente!</div>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
    }

    function insertar_producto(){
    include '../conexion/conexion.php';
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
    }

    function modificar_fabricacion(){
    include '../CONEXION/conexion.php';
      $a = $_POST['no_lista'];
      $b = $_POST['no_material'];
      $c = $_POST['cant_material'];
      $d = $_POST['no_producto'];

      try {
        if (empty($a)) {
          echo "<div class='alert alert-danger' role='alert'>¡Error!</div>";
        } else {
          if (empty($b)) { } else {
            $sql = "update fabricacion set no_material='$b' where no_lista='$a'";
            if ($conn->query($sql) === TRUE) {
              echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
            } else {
              echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
            }
          }
          if (empty($c)) { } else {
            $sql = "update fabricacion set cant_material='$c' where no_lista='$a'";
            if ($conn->query($sql) === TRUE) {
              echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
            } else {
              echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
            }
          }
          if (empty($d)) { } else {
            $sql = "update fabricacion set no_producto='$d' where no_lista='$a'";
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
    }

    function modificar_producto(){
    include '../CONEXION/conexion.php';
      $a = $_POST['no_producto'];
      $b = $_POST['nom_producto'];
      $c = $_POST['status_producto'];
      try {
        if (empty($a)) {
          echo "<div class='alert alert-danger' role='alert'>¡Error!</div>";
        } else {
          if (empty($b)) { } else {
            $sql = "update producto set nom_producto='$b' where no_producto='$a'";
            if ($conn->query($sql) === TRUE) {
              echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
            } else {
              echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
            }
          }
          if (empty($c)) { } else {
            $sql = "update producto set status_producto='$c' where no_producto='$a'";
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
    }
?>
