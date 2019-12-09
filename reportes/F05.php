<?php
session_start();
if (isset($_SESSION['login_user'])) {
  ?>

  <!DOCTYPE html>

  <html lang="en">

  <head>
    <title>[F05] Reportes</title>
    <?php
      include '../head/head.php';
      ?>
    <link rel="stylesheet" href="../css/css_f09.css">
  </head>

  <body>
    <?php
      include '../head/header.php';
      include '../nav/nav_on.php';
      include 'funciones_f05.php';
      ?>
    <div class="container-fluid" style="margin-top: 5%;">
      <div class="row">
        <div class="col-sm-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" colspan="11" style="text-align:center; color:gray;">
                  <h2>Pedidos</h2>
                </th>
              </tr>
            </thead>
            <thead>
              <tr>
                <th scope="col">Numero de pedido</th>
                <th scope="col">lista_productos</th>
                <th scope="col">subtotal</th>
                <th scope="col">iva</th>
                <th scope="col">total</th>
                <th scope="col">nombre</th>
                <th scope="col">telefono</th>
                <th scope="col">direccion 1</th>
                <th scope="col">direccion 2</th>
                <th scope="col">Estado</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Codigo postal</th>
              </tr>
            </thead>
            <tbody>
              <?php
                consultar_cuenta();
                ?>
            </tbody>
          </table>
          <br><br>
        </div>
      </div>
    </div>
    <script>
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