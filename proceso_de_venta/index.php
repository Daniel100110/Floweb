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
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/styles.css">
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
                                <th scope="col">Pedido</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Estado</th>
                            </tr>
                        </thead>
                        <tr>
                            <?php
                                mostrar_carrito();
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