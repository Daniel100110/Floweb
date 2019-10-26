<?php
  session_start();
  if (isset($_SESSION['login_user'])) {
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <?php
        include '../head/head.php';
    ?>
    <title>[F03]CRUD MATERIALES</title>
    <link rel="stylesheet" href="../css/css_f04.css">
  </head>

  <body>
    <?php
        include '../head/header.php';
        include '../nav/nav_on.php';
        include 'metodos_f04.php';
    ?>
    <div class="container-fluid" style="margin-top: 5%;">
      <div class="row">
        <div class="col-sm-3">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" colspan="4" style="text-align:center; color:gray;">
                  <h2>Materiales</h2>
                </th>
              </tr>
            </thead>
            <thead>
              <tr>
                <th scope="col">Núm. de Material</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../CONEXION/conexion.php';
              $sql = "select * from material";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                  <th scope='row'>" . $row['no_material'] . "</th>" .
                    "<td>" . $row['nom_material'] . "</td>" .
                    "<td>" . $row['cant_material'] . "</td>" .
                    "<td>" . $row['status_material'] . "</td>
                  </tr>";
                }
              } else { }
              $conn->close();
              ?>
            </tbody>
          </table>
          <br>
          <table class="table">
            <thead>
              <tr>
                <th scope="col" colspan="4" style="text-align:center; color:gray;">
                  <h2>Agregar arreglo</h2>
                </th>
              </tr>
            </thead>
          </table>
          <?php

          echo '<html><head></head><body>';
          echo '<form method="post" action="_insertarProducto.php" enctype="multipart/form-data">';
          echo 'id: <input type="number" id="no_producto" name="no_producto" /><br />';
          echo 'nombre: <input type="text" id="nom_producto" name="nom_producto" /><br />';
          echo 'precio: <input type="number" id="precio_producto" name="precio_producto" /><br />';
          echo 'cantidad: <input type="number" id="cantidad_producto" name="cantidad_producto" /><br />';
          echo 'status: <input type="text" id="status_producto" name="status_producto" /><br />';
          echo 'Fichero a recibir: <input type="file" id="myfile" name="myfile" /><br />';
          echo '<input type="submit" value="Enviar">';
          echo '</form>';

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
            echo "Fichero subido correctamente";
          }
          ?>

          <br>
        </div>
        <div class="col-sm-6">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" colspan="4" style="text-align:center;color:gray;">
                  <h2>Fabricación</h2>
                </th>
              </tr>
              <tr>
                <th scope="col" colspan="2" style="text-align:right;color:gray;">
                  <h2>Materiales requeridos</h2>
                </th>
                <th scope="col" colspan="1" style="text-align:right;color:gray;">
                  <h2> = </h2>
                </th>
                <th scope="col" colspan="1" style="color:gray;">
                  <h2>Arreglo</h2>
                </th>
              </tr>
            </thead>
            <thead>
              <tr>
                <th scope="col">Número de lista</th>
                <th scope="col">Número de material</th>
                <th scope="col">Cantidad de material</th>
                <th scope="col">Número de arreglo</th>
              <tr>
            </thead>
            <tbody>

              <?php
              include '../conexion/conexion.php';
              $sql = "select * from fabricacion";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo
                    "<tr>
                    <th scope='row'>" . $row['no_lista'] . "</th>" .
                      "<td>" . $row['no_material'] . "</td>" .
                      "<td>" . $row['cant_material'] . "</td>" .
                      "<td>" . $row['no_producto'] . "</td>" .
                      "</tr>";
                }
              } else { }
              $conn->close();
              ?>
            </tbody>
          </table>
          <div class="row">
            <div class="col-sm-7">
              <center>
                <div id="border3">
                  <div id="border2">
                    <div id="border1">
                      <div id="border0">
                        <img src="../imagenes/rosas.jpg" style="width:100%;border-radius: 100%;">
                      </div>
                    </div>
                  </div>
                </div>
              </center>
            </div>
            <div class="col-sm-5">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" colspan="4" style="text-align:center; color:gray;">
                      <h2>Elementos requeridos</h2>
                    </th>
                  </tr>
                </thead>
              </table>
              <form method="post">
                <div class="form-group">
                  <label>Núm. de lista:</label><input class="form-control" type="text" id="no_lista" name="no_lista">
                  <label>Núm. de material:</label><input class="form-control" type="text" id="no_material" name="no_material">
                  <label>cantidad de materiales:</label><input class="form-control" type="text" id="cant_material" name="cant_material">
                  <label>Num de arreglo:</label><input class="form-control" type="text" id="no_arreglo" name="no_arreglo">
                </div>
                <input type="submit" class="btn btn-info" onclick="this.form.action = '_modificarFabricacion.php'" value="Modificar">
                <input type="submit" class="btn btn-primary" style="float:right" onclick="this.form.action = '_insertarFabricacion.php'" value="Agregar">
              </form><br> <br>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" colspan="4" style="text-align:center; color:gray;">
                  <h2>Arreglos</h2>
                </th>
              </tr>
            </thead>
            <thead>
              <tr>
                <th scope="col">Núm. de arreglo</th>
                <th scope="col">Nombre del arreglo</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../CONEXION/conexion.php';
              $sql = "select * from producto";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                  <th scope='row'>" . $row['no_producto'] . "</th>" .
                    "<td>" . $row['nom_producto'] . "</td>" .
                    "<td>" . $row['status_producto'] . "</td>" .
                    "</tr>";
                }
              } else { }
              $conn->close();
              ?>
            </tbody>
          </table>
          <table class="table">
            <thead>
              <tr>
                <th scope="col" colspan="4" style="text-align:center; color:gray;">
                  <h2>Eliminar arreglo</h2>
                </th>
              </tr>
            </thead>
          </table>
          <form method="post">
            <div class="form-group">
              <label>Número del arreglo:</label><input class="form-control" type="text" id="no_arreglo" name="no_arreglo">
              <br>
              <input type="submit" class="btn btn-danger" onclick="this.form.action = '_borrarArreglo.php'" style="float:right;" value="Eliminar">
              <br><br>
          </form>
        </div>
      </div>
    </div>
    <script></script>
    <?php
        include '../footer/footer.php';
    ?>
  </body>
</html>

<?php
  }
  if (!$_SESSION['login_user']) {
    header("location:../index.php");
  }
?>