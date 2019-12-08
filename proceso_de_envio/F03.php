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
        <title>[F03] Proceso de envío</title>
        <link rel="stylesheet" href="../css/css_f03.css">
    </head>
    <body>
        <?php
            include '../head/header.php';
            include '../nav/nav_on.php';
            include 'funciones_f03.php';
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <br>
                    <center>
                        <img src="../img/mensajero.gif"><br />
                        Gracias por su compra <br />
                        Su pedido se le entregara en los proximos 3 dias habiles<br /> <br>
                        <button class="btn btn-success" onclick="location.href='../proceso_de_venta/F01.php'"">Siguiente</button>
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
    header("location:../login.php");
}
?>