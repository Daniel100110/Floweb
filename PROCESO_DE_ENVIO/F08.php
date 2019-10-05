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
        <title>[F03]CRUD MATERIALES</title>
        <link rel="stylesheet" href="../css/css_f03.css">
    </head>

    <body>
        <?php
            include '../head/header.php';
            include '../nav/nav_empresa.php';
            include 'metodos_f08.php';
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <br>
                    <center>
                        <img src="../IMAGENES/mensajero.gif"><br />
                        Gracias por su compra <br />
                        Su pedido se le entregara en los proximos 3 dias habiles<br /> <br>
                        <button class="btn btn-success" onclick="location.href='../PROCESO_DE_VENTA/fx.php'"">Siguiente</button>
                </center>
            </div>
        </div>
        <script></script>
        <?php
            include '../footer/footer.php';
        ?>
    </body>
</html>

<?php 
    }
    if (!$_SESSION['login_user']) {
        header("location:../index.php");
    }
?>