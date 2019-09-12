<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include '../HEADERS/head.php';
  ?>
  <link rel="stylesheet" type="text/css" href="../CSS/css_f01.css">
</head>

<body>
  <header> <br> <br>
    <center>
      <h1 style="color:green">FloWeb</h1>
      <h6 style="color:red">Versión Alfa 1.01</h6>
    </center>
    <br> <br>
  </header>
  <?php
  include '../NAVS/nav_empresa.php';
  ?>

  <body style="background-color:#f6f5f5">
    <div class="container-fluid" style="margin-top: 5%;">
      <div class="row">
        <div class="col-sm-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" colspan="11" style="text-align:center; color:gray;">
                  <h2>Consultas</h2>
                </th>
              </tr>
            </thead>
            <thead>
              <tr>
                <th scope="col">Núm. de Cuenta</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido paterno</th>
                <th scope="col">Apellido materno</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Dirección</th>
                <th scope="col">Correo</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Nivel de Acceso</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../CONEXION/conexion.php';
              $sql = "select * from cuenta";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo
                    "<tr>
                 <th scope='row'>" . $row['no_cuenta'] .
                      "</th>" .
                      "<td>" . $row['nom_usuario'] . "</td>" .
                      "<td>" . $row['apll_paterno'] . "</td>" .
                      "<td>" . $row['apll_materno'] . "</td>" .
                      "<td>" . $row['tel_usuario'] . " </td>" .
                      "<td>" . $row['dir_usuario'] . " </td>" .
                      "<td>" . $row['correo_cuenta'] . " </td>" .
                      "<td>" . $row['contra_cuenta'] . " </td>" .
                      "<td>" . $row['no_acceso'] . " </td>" .
                      "<td>" . $row['status_cuenta'] . " </td>" .
                      "</tr>";
                }
              } else { }
              $conn->close();
              ?>
            </tbody>
          </table>
          <br> <br>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-6">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" colspan="4" style="text-align:center; color:gray;">
                      <h2>Accesos</h2>
                    </th>
                  </tr>
                </thead>
              </table>
              <form method="post">
                <div class="form-group">
                  <label>Núm. de acceso:</label><input class="form-control" type="text" id="no_acceso" name="no_acceso">
                  <label>Tipo de acceso:</label><input class="form-control" type="text" id="tipo_acceso" name="tipo_acceso">
                  <label>Status:</label>
                  <select id="status_acceso" name="status_acceso" class="form-control">
                    <option Selected value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                  </select>
                </div>
                <input type="submit" class="btn btn-danger" onclick="this.form.action = '_borrarAcceso.php'" value="Borrar">
                <input type="submit" class="btn btn-info" onclick="this.form.action = '_modificarAcceso.php'" value="Modificar">
                <input type="submit" class="btn btn-primary" style="float:right;" onclick="this.form.action = '_insertarAcceso.php'" value="Agregar">
              </form>
            </div>
            <div class="col-sm-6">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" colspan="4" style="text-align:center; color:gray;">
                      <h2>Accesos</h2>
                    </th>
                  </tr>
                </thead>
                <thead>
                  <tr>
                    <th scope="col">Núm. de Acceso</th>
                    <th scope="col">Tipo de acceso</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include '../CONEXION/conexion.php';
                  $sql = "select * from acceso";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<tr>
                <th scope='row'>" . $row['no_acceso'] . "</th>" .
                        "<td>" . $row['tipo_acceso'] . "</td>" .
                        "<td>" . $row['status_acceso'] . "</td>
                </tr>";
                    }
                  } else { }
                  $conn->close();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <br><br>
          <center>
            <div id="border3">
              <div id="border2">
                <div id="border1">
                  <div id="border0">
                    <img src="../IMAGENES/usuario1.png" style="width:100%;height:100%;border-radius: 100%;">
                  </div>
                </div>
              </div>
            </div>
          </center>
          <br> <br>
          <table class="table">
            <thead>
              <tr>
                <th scope="col" colspan="4" style="text-align:center; color:gray;">
                  <h2>Eliminar usuarios</h2>
                </th>
              </tr>
            </thead>
          </table>
          <form action="_borrarUsuario.php" method="post">
            <div class="form-group">
              <label>Número de la cuenta:</label><input class="form-control" type="text" id="no_cuenta" name="no_cuenta">
              <br>
              <input type="submit" class="btn btn-danger" style="float:right;" value="Eliminar">
          </form>
          <br><br>
          <hr>
        </div>
      </div>
      <div class="col-sm-6">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" colspan="4" style="text-align:center; color:gray;">
                <h2>Agregar / Modificar usuarios</h2>
              </th>
            </tr>
          </thead>
        </table>
        <form method="post">
          <div class="form-group">
            <label>Núm. de cuenta:</label><input class="form-control" type="number" id="no_cuenta" name="no_cuenta">
            <label>Nombre(s):</label><input class="form-control" type="text" id="nom_usuario" name="nom_usuario">
            <label>Apellido paterno:</label><input class="form-control" type="text" id="apll_paterno" name="apll_paterno">
            <label>Apellido materno:</label><input class="form-control" type="text" id="apll_materno" name="apll_materno">
            <label>Teléfono:</label><input class="form-control" type="text" id="tel_usuario" name="tel_usuario">
            <label>Dirección:</label><input class="form-control" type="text" id="dir_usuario" name="dir_usuario">
            <label>Correo electronico:</label><input class="form-control" type="email" id="correo_cuenta" name="correo_cuenta">
            <label>Contraseña:</label><input class="form-control" type="password" id="contra_cuenta" name="contra_cuenta">
            <label>Tipo de acceso:</label>
            <select id="no_acceso" name="no_acceso" class="form-control">
              <?php
              include '../CONEXION/conexion.php';
              $sql = "select * from acceso";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<option value=" . $row['no_acceso'] . ">" . $row['tipo_acceso'] . "</option>";
                }
              } else { }
              $conn->close();
              ?>
            </select>
            <label>Status:</label>
            <select id="status_cuenta" name="status_cuenta" class="form-control">
              <option Selected value="Activo">Activo</option>
              <option value="Inactivo">Inactivo</option>
            </select>
          </div>
          <input type="submit" class="btn btn-primary" style="float:right;" onclick="this.form.action = '_insertarUsuario.php'" value="Agregar">
          <input type="submit" class="btn btn-info" style="float:right;" onclick="this.form.action = '_modificarUsuario.php'" value="Modificar">
        </form>
        <br /> <br />
        <hr>
        <a class="btn btn-warning" style="width:100%;" href='../REPORTES/fx.php'>Reportes de compra</a>
      </div>
    </div>
    </div>
<?php
include '../FOOTER/footer.php';
?>
  </body>
</html>