<!DOCTYPE html>

<html lang="en">
    <head>
        <?php
            include './head/head.php';
        ?>
        <title>[F05]CRUD MATERIALES</title>
        <link rel="stylesheet" href="./css/css_f05.css">
    </head>

    <body>
        <?php
            include './head/header.php';
            include './nav/nav_empresa.php';
            include './proceso_de_venta/metodos_f05.php';
            ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9">
                    <div class='row'>
                        <?php
                            include './conexion/conexion.php';
                            $sql = "select * from producto";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo
                                    "<div class='col-sm-3' style='border: 1px solid black; width:150px;
                                    height:300px; margin: 10px;'>" .
                                    "<form method='post' action='_insertarCarrito.php'>" .
                                    "<input type='hidden' id='no_producto' name='no_producto' style='width:0px;height:0px;' value='" . $row['no_producto'] . "'></input></center><br/>" .
                                    "<center>" . $row['nom_producto'] . "</center>" .
                                            "<center><img src ='../ABCM_PRODUCTOS/upload/" . $row['foto_producto'] . "' class='img-thumbnail' width='130px' />" .
                                            "<br/><br/>$" . $row['precio_producto'] . "<br/><br/>" .
                                            "<input type='number' id='cantidad' name='cantidad' placeholder='Cantidad' style='width:70%;float:left;height:35px;'></input>" .
                                            // "<input class='btn btn-primary' type='submit' value='' style='float:left;height:35px;'></input>".
                                            "<button class='btn btn-primary' type='submit' style='float:left;height:35px;'><i class='fas fa-angle-double-right'></i></button>" .
                                            "</form>" .
                                            "</div>";
                                }
                            } else { }
                            $conn->close();
                            ?>
                    </div>
                </div>
                <div class="col-sm-3" style="background-color:gray;">
                    <br>
                    <img class='img-thumbnail' src="./imagenes/bolsa.jpg">
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
                    <br/>
                    <br/>
                    <button class="btn btn-success" onclick="location.href='./proceso_de_compra/fx.php'" style="float:right;">Pagar</button>
                    <br><br>
                </div>
            </div>
        </div>
        <script>
        </script>
        <?php
            include './footer/footer.php';
        ?>
    </body>
</html>
