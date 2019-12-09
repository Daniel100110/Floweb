<?php
session_start();
if (isset($_SESSION['login_user'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>[00] Cupones</title>
        <?php
            include '../head/head.php';
            ?>
    </head>

    <body>
        <?php
            include '../head/header.php';
            include 'nav_on.php';
            ?>
        <section>
            <form method="post">
                <label>Ingrese codigo: </label>
                <input id="codigo" name="codigo" type="text">
                <input id="cupon" name="cupon" type="submit" value="Reclamar">
            </form>
            <a href="../proceso_de_venta/F01.php">Regresar</a>
        </section>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <?php
            if (isset($_POST['cupon'])) {
                include '../db/conexion.php';
                $c_codigo_cupon_01 = $_POST['codigo'];
                $c_sql_01 = "select * from cupones where status_cupon = 'Canjeable' and codigo_cupon = '$c_codigo_cupon_01'";
                $c_sql_02 = "update cupones set status_cupon = 'Canjeado' where codigo_cupon = '$c_codigo_cupon_01'";
                $c_res_01 = $conn->query($c_sql_01);
                if ($c_res_01 -> num_rows > 0) {
                    $conn->query($c_sql_02);
                    echo "<script>swal('¡Cupon canjeado!', '¡El dinero se ha agregado a tu cuenta!', 'success');</script>";
                } else {
                    echo "<script>swal('¡Cupon no valido!', '¡No existe el cupon o ya ha sdio canjeado!', 'error');</script>";
                }
                $conn->close();
            }
            ?>
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