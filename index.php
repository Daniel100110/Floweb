<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include './head/head.php';
    ?>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <?php
    include './head/header.php';
    include './nav/nav_off.php';
    include 'funciones_index.php';
    ?>
    <div class="features-boxed">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="row justify-content-center features">
                            <?php
                            mostrar_producto();
                            ?>
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
                            include './db/conexion.php';
                            $sql = "select * from pedido inner join producto on pedido.no_producto = producto.no_producto";
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
    function agregar_a_carrito() {
        alert('<?php agregar_a_carrito(); ?>');
    }
    </script>
    <?php
    include './footer/footer_index.php';
    ?>
</body>
</html>