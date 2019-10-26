<!DOCTYPE html>

<html lang="en">

<head>
    <?php
    include './head/head.php';
    ?>
    <link rel="stylesheet" href="./css/css_f05.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <?php
    include './head/header.php';
    include './nav/nav_off.php';
    include './proceso_de_venta/metodos_f05.php';
    ?>
    <div class="features-boxed">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="row justify-content-center features">
                        <div class="col-sm-6 col-md-5 col-lg-4 item">
                            <div class="box">
                                <img src="./imagenes/rosas.jpg" class="img-thumbnail">
                                <h3 class="name">Rosas</h3>
                                <p class="description">$100 mxm</p>
                                <a href="#">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <br>
                    <img class='img-thumbnail' src="./imagenes/carrito.jpg">
                    <br /> <br />
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
                            include './conexion/conexion.php';
                            $sql = "select * from pedido";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo
                                        "<tr>" .
                                            "<td>" .
                                            $row['no_producto'] .
                                            "</td>" .
                                            "<td>" .
                                            $row['nom_producto'] .
                                            "</td>" .
                                            "<td>$" .
                                            $row['precio_producto'] .
                                            " dollar(s)</td>" .
                                            "<td>" .
                                            $row['cantidad'] .
                                            "</td>" .
                                            "</tr>";
                                }
                            } else { }
                            $conn->close();
                            ?>
                    </table>
                    <br />
                    <br />
                    <button class="btn btn-success" onclick="location.href='./proceso_de_compra/fx.php'" style="float:right;">Pagar</button>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
    </script>
    <?php
    include './footer/footer_index.php';
    ?>
</body>

</html>