<?php
session_start();
if (isset($_SESSION['login_user'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>[F01] Proceso de venta</title>
        <?php
            include '../head/head.php';
            ?>

    <body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <?php
            include '../head/header.php';
            include '../nav/nav_on.php';
            include 'funciones_f01.php';
            ?>
        <div class="features-boxed">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <br>
                        <div class="card-deck mb-3 text-center">
                            <?php
                                mostrar_producto();
                                ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <br>
                        <img class='img-thumbnail' src="../img/carrito.jpg">
                        <br /> <br />
                        <table width='100%' style="background-color:white;text-align:center;">
                            <thead>
                                <tr>
                                    <th colspan="4" style="text-align:center;">Lista de compras</th>
                                </tr>
                                <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                </tr>
                            </thead>
                            <tr>
                                <?php
                                    mostrar_carrito();
                                    ?>
                        </table>
                        <br>
                        <br>
                        <button class="btn btn-primary" onclick="siguiente();" style="float:right;">Continuar</button>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        <?php
            if (isset($_POST['submit'])) {
                include '../db/conexion.php';
                $correo_cuenta = $_SESSION['login_user'];
                $no_producto = $_POST['no_producto'];
                $status_carrito = "En proceso";
                $cantidad = 0;
                $cantidadProductos = 0;
                $precio = 0;
                $precio_verdadero = 0;
                $existe = false;

                $sql = "select count(carrito.no_producto) from carrito";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $cantidadProductos = $row['count(carrito.no_producto)'];
                    }
                } else { }

                $sql = "select cantidad from carrito inner join producto on carrito.no_producto=producto.no_producto where carrito.correo_cuenta='$correo_cuenta' and carrito.no_producto='$no_producto'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $cantidad = $row['cantidad'];
                        $existe = true;
                    }
                } else {
                    $existe = false;
                }

                if ($existe) {
                    $sql2 = "select * from producto where no_producto='$no_producto'";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0) {
                        while ($row = $result2->fetch_assoc()) {
                            $GLOBALS["precio"] = $row['precio_producto'];
                        }
                    } else { }
                    $cantidad = ((int) $cantidad) + 1;
                    $precio_verdadero = ((int) $cantidad) * ((int) $precio);
                    $sql_insert = "update carrito set cantidad='$cantidad', precio='$precio_verdadero' where correo_cuenta='$correo_cuenta' and no_producto='$no_producto'";
                    if ($conn->query($sql_insert)) {
                        echo "<script>swal('¡Producto actualizado!', '¡Se ha actualizado la cantidad de productos!', 'success');</script>";
                    } else {
                        echo "<script>swal('¡Error!', '¡No se ha podido agregar el producto!', 'error');</script>";
                    }
                } else {
                    echo $cantidadProductos;
                    $sql2 = "select precio_producto from producto where no_producto='$no_producto'";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0) {
                        while ($row = $result2->fetch_assoc()) {
                            $GLOBALS["precio"] = $row['precio_producto'];
                        }
                    } else { }

                    $sql_insert = "insert into carrito values ('$correo_cuenta','$no_producto',1,'$precio','En proceso');";
                    if ($conn->query($sql_insert)) {
                        echo "<script>swal('¡Producto agregado!', '¡Se ha agregado exitosamente al carrito!', 'success');</script>";
                    } else {
                        echo "<script>swal('¡Error!', '¡No se ha podido agregar el producto!', 'error');</script>";
                    }
                }

                $conn->close();
            }
            ?>
    </body>
    <script>
        function siguiente() {
            <?php siguiente(); ?>
        }
    </script>
        <?php
            include '../footer/footer.php';
            ?>
    </html>
<?php
}
if (!$_SESSION['login_user']) {
    header("location:../login.php");
}
?>