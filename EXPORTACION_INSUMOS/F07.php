<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Inicio</title>
    <link rel="stylesheet" href="./CSS/css_f07.css">
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
              <th scope="col">No_de_pedido</th>
              <th scope="col">No_de_carrito</th>
              <th scope="col">Nombre del cliente</th>
              <th scope="col">Direccion</th>
              <th scope="col">Subtotal</th>
              <th scope="col">Iva</th>
              <th scope="col">Total</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include '../CONEXION/conexion.php';
            $sql = "select * from pedido inner join iva on pedido.no_iva=iva.no_iva inner join carrito on pedido.no_carrito=carrito.no_carrito inner join cuenta on cuenta.no_cuenta=carrito.no_cuenta";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <th scope='row'>"
                . $row['no_pedido'] . "</th>" .
                "<td>" . $row['no_carrito'] . "</td>" .
                "<td>" . $row['apll_paterno']." ".$row['apll_materno']." ".$row['nom_usuario'] . "</td>" .
                "<td>" . $row['dir_usuario'] . "</td>" .
                "<td>" . $row['precio_subtotal'] . "</td>" .
                "<td>" . $row['cantidad_iva'] . "%</td>".
                  "<td>" . $row['precio_total'] . "</td>".
                  "<td>" . $row['status_pedido'] . "</td>".
                "</tr>";
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