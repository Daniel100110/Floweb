<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Inicio</title>
    <link rel="icon" href="logo.png">
    <style media="screen">
        p {
            color: white;
        }
    </style>

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
              <th scope="col">No.deCarrito</th>
              <th scope="col">Nombre</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Precio</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include '../CONEXION/conexion.php';
            $sql = "select * from carrito inner join carrito_producto on carrito.no_carrito=carrito_producto.no_carrito inner join producto on carrito_producto.no_producto=producto.no_producto";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <th scope='row'>" . $row['no_carrito'] . "</th>" .
                  "<td>" . $row['nom_producto'] . "</td>" .
                  "<td>" . $row['cantidad'] . " pieza(s)</td>" .
                  "<td>" . $row['precio_producto'] . "$ dolar(es)</td>
                </tr>";
              }
            } else { }
            $conn->close();
            ?>
          </tbody>
        </table>

        <form method="post" action="_insertarPedido.php">
        <?php
        $var1 = 0;
        $var2 = 0;

            include '../CONEXION/conexion.php';
            $sql = "select sum(producto.precio_producto*carrito_producto.cantidad) as b from carrito_producto inner join producto on carrito_producto.no_producto=producto.no_producto";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo"Subtotal: <input  id='subtotal' name='subtotal' type='number' value='".$row['b']."' >"."$ dollar(es).</input><br>";
                $var1=$row['b'];
            }
            } else { }

            $sql2 = "select cantidad_iva from iva where no_iva=1";
            $result = $conn->query($sql2);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo"Iva: <input id='iva' name='iva' type='number' value='0.".$row['cantidad_iva']."' >"."</input>%.<br>";
                $var2=$row['cantidad_iva'];
            }
            } else { }
            $conn->close();
            echo "Total:"."<input id='total' name='total' value='".($var1+(($var1*$var2)/100))."' >$ dollar(es)."."</input>";
            ?>
            <br>
            <br>
            <button type="submit">Confirmar pedido</button>
        </form>

      </div>

    </div>
    </div>

    <!-- Footer -->
    <footer class="page-footer font-small teal pt-4">

        <!-- Footer Text -->
        <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row" style="
                    background-color:#5D6D7E;      
                    background-image: url('../IMAGENES/fondo1.jpg');
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    background-size: cover;
                ">

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