
  <?php

    function insertarUsuario(){
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
      
        $sql = "insert into cuenta values ('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j');";
        $sql2 = "insert into carrito values ('$a','$a','DISPONIBLE');";
      
        if ($conn->query($sql) === TRUE) {
          echo "<div class='alert alert-success' role='alert'>¡Registro agregado exitosamente!</div>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        if ($conn->query($sql2) === TRUE) {
          echo "<div class='alert alert-success' role='alert'>¡Registro agregado exitosamente!</div>";
        } else {
          echo "Error: " . $sql2. "<br>" . $conn->error;
        }
        $conn->close();
    }

    function borrarUsuario(){
        include '../CONEXION/conexion.php';
        $a = $_POST['no_cuenta'];
      
        $sql = "delete from cuenta where no_cuenta = '$a'";
      
        if ($conn->query($sql) === TRUE) {
          echo "<div class='alert alert-success' role='alert'>¡Registro borrado exitosamente!</div>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    
    function modificarUsuario(){
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
    }

    function insertarAcceso(){
        include '../CONEXION/conexion.php';
        $a = $_POST['no_acceso'];
        $b = $_POST['tipo_acceso'];
        $c = $_POST['status_acceso'];
      
        $sql = "insert into acceso values ('$a','$b','$c');";
      
        if ($conn->query($sql) === TRUE) {
          echo "<div class='alert alert-success' role='alert'>¡Registro agregado exitosamente!</div>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    function borrarAcceso(){
        include '../conexion/conexion.php';
        $no_acceso = $_POST['no_acceso'];

        $sql = "delete from acceso where no_acceso = '$no_acceso'";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>¡Registro borrado exitosamente!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    function modificarAcceso(){
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
    }

  ?>
