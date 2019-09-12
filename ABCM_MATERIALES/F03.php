<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <title>CRUD MATERIALES</title>
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
      background-image: url('./IMAGENES/fondo1.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }

    #border3 {
      width: 330px;
      height: 330px;
      border: 10px outset green;
      border-radius: 100%;
      animation-name: giro;
      animation-duration: 25s;
      animation-iteration-count: infinite;
    }

    #border2 {
      width: 310px;
      height: 310px;
      border: 10px double red;
      border-radius: 100%;
      animation-name: giro;
      animation-duration: 20s;
      animation-iteration-count: infinite;
    }

    #border1 {
      width: 290px;
      height: 290px;
      border: 10px dashed #048998;
      border-radius: 100%;
      animation-name: giro;
      animation-duration: 15s;
      animation-iteration-count: infinite;
    }

    p {
      color: white;
    }
  </style>

</head>

<body style="background-color:#f6f5f5">

<header> <br> <br>
    <center>
      <h1 style="color:green">FloWeb</h1>
      <h6 style="color:red">Versión Alfa 1.05 </h6>
    </center>
    <br> <br>
  </header>
  <?php
  include '../NAVS/nav_empresa.php';
  ?>
  
  <div class="container-fluid" style="margin-top: 5%;">
    <div class="row">
      <div class="col-sm-4">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" colspan="4" style="text-align:center; color:gray;">
                <h2>Consultar</h2>
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
      </div>
      <div class="col-sm-4">
        <center>
          <div id="border3">
            <div id="border2">
              <div id="border1">
                <div id="border0">
                  <img src="../IMAGENES/Flor.png" style="width:95%;height:260px;border-radius: 100%;">
                </div>
              </div>
            </div>
          </div>
        </center>
        <form method="post">
          <div class="form-group">
            <label>Núm. de Material:</label><input class="form-control" type="text" id="no_material" name="no_material">
            <label>Nombre:</label><input class="form-control" type="text" id="nom_material" name="nom_material">
            <label>Cantidad:</label><input class="form-control" type="text" id="cant_material" name="cant_material">
          </div>
          <div class="form-group">
            <label>Status:</label>
            <select id="status_material" name="status_material" class="form-control">
              <option Selected value="Activo">Activo</option>
              <option value="Inactivo">Inactivo</option>
            </select>
          </div>
          <input type="submit" class="btn btn-info" onclick="this.form.action = '_modificarMaterial.php'" value="Modificar">
          <input type="submit" class="btn btn-primary" style="float:right;" onclick="this.form.action = '_insertarMaterial.php'" value="Agregar">
        </form>
        </form>
        <br> <br>
      </div>
      <div class="col-sm-4">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" colspan="4" style="text-align:center; color:gray;">
                <h2>Eliminar Material</h2>
              </th>
            </tr>
          </thead>
        </table>
        <form method="post">
          <div class="form-group">
            <label>Núm. de Material:</label><input class="form-control" type="text" id="no_material" name="no_material">
            <br>
            <input type="submit" class="btn btn-danger" onclick="this.form.action = '_borrarMaterial.php'" style="float:right;" value="Eliminar">
        </form>
      </div>
    </div>
  </div>

  <?php
  include '../FOOTER/footer.php';
  ?>
</body>

</html>