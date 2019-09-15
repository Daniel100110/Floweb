<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Inicio</title>
    <link rel="stylesheet" href="../css/css_f02.css">

</head>

<body style="background-color:#f6f5f5">

    <header>
        <div id="navbarHeader" style="
            background-color:#048998;       
            background-image: url('../IMAGENES/fondo1.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        ">
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
                    <strong style="color:white;">Inicio</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <h3><i class="fas fa-bars" style="color:white;"></i></h3>
                    </span>
                </button>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-4">
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
      </div>
    </div>
    </div>
    
    <?php
        include '../FOOTER/footer.php';
    ?>
    
</body>
</html>