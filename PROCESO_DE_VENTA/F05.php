<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Inicio</title>
    <link rel="stylesheet" href="../CSS/css_f05.css">
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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader"
                 aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <h3><i class="fas fa-bars" style="color:white;"></i></h3>
                    </span>
                </button>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-9">

                <div class='row'>
                    <?php
                    include '../CONEXION/conexion.php';
                    $sql = "select * from producto";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo
                                "<div class='col-sm-3' style='border: 1px solid black; border-radius:15px; width:150px;
                                 height:300px; margin: 10px;'>".
                                "<form method='post' action='_insertarCarrito.php'>".
                                "<input type='hidden' id='no_producto' name='no_producto' style='width:0px;height:0px;' value='".$row['no_producto'] ."'></input></center><br/>".
                                "<center>".$row['nom_producto']."</center>".
                                "<center><img src ='../ABCM_PRODUCTOS/upload/". $row['foto_producto'] ."' class='img-thumbnail' width='130px' />".
                                "<br/><br/>$". $row['precio_producto'] ."<br/><br/>" .
                                "<input type='number' id='cantidad' name='cantidad' placeholder='Cantidad' style='width:70%;float:left;height:35px;'></input>" .
                                // "<input class='btn btn-primary' type='submit' value='' style='float:left;height:35px;'></input>".
                                "<button class='btn btn-primary' type='submit' style='float:left;height:35px;'><i class='fas fa-angle-double-right'></i></button>".
                                "</form>".
                                "</div>";
                        }
                    } else { }
                    $conn->close();
                    ?>
                </div>
            </div>
                <div class="col-sm-3" style="background-color:gray;">
                <br>
                <img class='img-thumbnail' src="../IMAGENES/bolsa.jpg">
                <br/>                <br/>
                <table width='100%' style="background-color:white;text-align:center;">
                <thead>
                <tr>
                        <th colspan="4" style="text-align:center;">Lista de compras</th>
                    </tr>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                </thead>
                    <tr>
                        <?php
                            include '../CONEXION/conexion.php';
                            $sql = "select * from carrito_producto inner join producto on carrito_producto.no_producto=producto.no_producto";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo 
                                        "<tr>".
                                            "<td>".
                                            $row['no_producto'].
                                            "</td>".
                                            "<td>".
                                            $row['nom_producto'].
                                            "</td>".
                                            "<td>$".
                                            $row['precio_producto'].
                                            " dollar(s)</td>".
                                            "<td>".
                                            $row['cantidad'].
                                            "</td>".
                                        "</tr>";          
                                }
                            } else { }
                            $conn->close();
                            ?>
                    </table>
                    </br>
                    <br/>
                <button class="btn btn-success" onclick="location.href='../PROCESO_DE_COMPRA/fx.php'" style="float:right;">Pagar</button>
                <br><br>
                </div>
        </div>
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