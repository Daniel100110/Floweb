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
    <title>[F07]CRUD MATERIALES</title>
    <link rel="stylesheet" href="../css/css_f07.css">
  </head>
  
  <body>
    <?php
        include '../head/header.php';
        include '../nav/nav_empresa.php';
        include 'metodos_f07.php';
    ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No_de_pedido</th>
                <th scope="col">No_de_carrito</th>
                <th scope="col">Nombre del cliente</th>
                <th scope="col">Direccion</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Iva</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include '../CONEXION/conexion.php';
                $sql = "select * from pedido inner join iva on pedido.no_iva=iva.no_iva inner join carrito on pedido.no_carrito=carrito.no_carrito inner join cuenta on cuenta.no_cuenta=carrito.no_cuenta";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                <th scope='row'>"
                      . $row['no_pedido'] . "</th>" .
                      "<td>" . $row['no_carrito'] . "</td>" .
                      "<td>" . $row['apll_paterno'] . " " . $row['apll_materno'] . " " . $row['nom_usuario'] . "</td>" .
                      "<td>" . $row['dir_usuario'] . "</td>" .
                      "<td>" . $row['precio_subtotal'] . "</td>" .
                      "<td>" . $row['cantidad_iva'] . "%</td>" .
                      "<td>" . $row['precio_total'] . "</td>" .
                      "<td>" . $row['status_pedido'] . "</td>" .
                      "</tr>";
                  }
                } else { }
                $conn->close();
                ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
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