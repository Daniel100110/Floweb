<?php
session_start();
if (isset($_SESSION['login_user'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php
            include '../head/head.php';
            ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>

    <body>
        <?php
            include '../head/header.php';
            include '../nav/nav_on.php';
            include 'funciones_index.php';
            ?>
        <div class="features-boxed">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <br>
                        <div class="row justify-content-center features">
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
                                    // mostrar_carrito();
                                    ?>
                        </table>
                        <br />
                        <br />
                        <button class="btn btn-success" onclick="location.href='../proceso_de_pago/F06.php'" style="float:right;">Pagar</button>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        <?php
            include '../footer/footer.php';
            ?>
        <?php
            if (isset($_POST['submit'])) {
                include '../db/conexion.php';

                $correo_cuenta = $_SESSION['login_user'];
                $no_producto = $_POST['no_producto'];
                $precio = 12;
                $cantidad = 1;
                $status_carrito = "En proceso";

                $sql = "insert into carrito values ('$correo_cuenta', '$no_producto','$cantidad','$precio','$status_carrito');";
                if ($conn->query($sql)) {
                    echo "<script>swal('¡Gracias!', '¡Producto agregado exitosamente!', 'success');</script>";
                } else {
                    echo "<script>swal('¡Error!', '¡Error al agregar producto!', 'error');</script>";
                }
                $conn->close();
            }
            ?>
    </body>

    </html>
<?php
}
if (!$_SESSION['login_user']) {
    header("location:../index.php");
}
?>