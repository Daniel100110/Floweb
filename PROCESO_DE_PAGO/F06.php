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
        <title>[F06]CRUD MATERIALES</title>
        <link rel="stylesheet" href="../css/css_f06.css">
    </head>

    <body>
        <?php
            include '../head/header.php';
            include '../nav/nav_empresa.php';
            include 'metodos_f06.php';
        ?>
        <div class="container-fluid">
            <div class="row">
            <div class="">
                <h1>Metodo de pago</h1>
                <button onclick="location.href='../PROCESO_DE_CONFIRMACION/fx.php'">
                        <center><h1><i class="far fa-money-bill-alt"></i></h1></center>
                    </button>
                    <button onclick="location.href='../PROCESO_DE_CONFIRMACION/fx.php'">
                        <center><h1><i class="fab fa-cc-paypal"></i></h1></center>
                    </button>
            </div>
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