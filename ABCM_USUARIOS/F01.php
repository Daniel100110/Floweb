<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <title>CRUD USUARIOS</title>
  <link rel="icon" href="logo.png">
  <style media="screen">
    @keyframes giro {
      50% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    footer {
      background-image: url('../IMAGENES/fondo1.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }

    #border3 {
      width: 330px;
      height: 330px;
      border: 10px outset black;
      border-radius: 100%;
      animation-name: giro;
      animation-duration: 25s;
      animation-iteration-count: infinite;
    }

    #border2 {
      width: 310px;
      height: 310px;
      border: 10px double #3bb4c1;
      border-radius: 100%;
      animation-name: giro;
      animation-duration: 20s;
      animation-iteration-count: infinite;
    }

    #border1 {
      width: 290px;
      height: 290px;
      border: 10px dashed red;
      border-radius: 100%;
      animation-name: giro;
      animation-duration: 15s;
      animation-iteration-count: infinite;
    }

    p {
      color: white;
    }

    table {
      font-size: 12px;
    }
  </style>
</head>

<body style="background-color:#f6f5f5">

  <header>
    <div id="navbarHeader" style="background-color:#048998;       
      background-image: url('../IMAGENES/fondo1.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <br>
            <h4 class="text-white"><a href="../index.php"><span style="color:white;">Floweb<br><h6>Alfa</h6></span></a></h4>
            <p class="text-muted">
              <br>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar" style="background-color:#7fe7cc;">
      <div class="container d-flex justify-content-between">
        <a href="#" class="navbar-brand d-flex align-items-center">
          <strong style="color:white;">Usuarios</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
            <h3><i class="fas fa-bars" style="color:white;"></i></h3>
          </span>
        </button>
      </div>
    </div>
  </header>
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
      <br/>      <br/>
      <hr>
    <a class="btn btn-warning" style="width:100%;" href='../REPORTES/fx.php'>Reportes de compra</a>
  </div>
  </div>
  </div>

  <!-- Footer -->
  <footer class="page-footer font-small teal pt-4">

    <!-- Footer Text -->
    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row" style="background-color:#5D6D7E;      
      background-image: url('../IMAGENES/fondo1.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">

                    <!-- Content -->
                    <h5 class="text-uppercase font-weight-bold">
                        <span style="background-color:white;"><br>Equipo Núm.#2</span></h5>
                    <p>Abundiz Muro Laura Lizzeth</p>
                    <p>Ibarra Contreras Daniel Alejandro</p>
                    <p>Manuel Martinez Maya</p>
                    <p>Talamantes Jim Erik</p>

                </div>

                <!-- Grid column -->
                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-6 mb-md-0 mb-3">

                    <!-- Content -->
                    <h5 class="text-uppercase font-weight-bold">
                        <span style="background-color:white;"><br>UABC</h5></span>
                    <p>Facultad de Contaduría y Administración</p>
                    <p>Licenciatura de informática</p>
                    <p>Ingeniería de Software / Herramientas de código abierto</p>
                    <p>Proyecto Final</p>

                </div>
                <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Text -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="background-color:#048998; color:white;">©2019 Floweb
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>