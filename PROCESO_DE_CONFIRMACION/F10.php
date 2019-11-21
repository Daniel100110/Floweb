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
        include '../nav/nav_on.php';
        // include 'metodos_f10.php';
    ?>
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-4">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No.deCarrito</th>
              <th scope="col">Nombre</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Precio</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include '../db/conexion.php';
            $sql = "select * from carrito inner join carrito_producto on carrito.no_carrito=carrito_producto.no_carrito inner join producto on carrito_producto.no_producto=producto.no_producto";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <th scope='row'>" . $row['no_carrito'] . "</th>" .
                  "<td>" . $row['nom_producto'] . "</td>" .
                  "<td>" . $row['cantidad'] . " pieza(s)</td>" .
                  "<td>" . $row['precio_producto'] . "$ dolar(es)</td>
                </tr>";
              }
            } else { }
            $conn->close();
            ?>
          </tbody>
        </table>

        <form method="post" action="_insertarPedido.php">
        <?php
        $var1 = 0;
        $var2 = 0;

            include '../db/conexion.php';
            $sql = "select sum(producto.precio_producto*carrito_producto.cantidad) as b from carrito_producto inner join producto on carrito_producto.no_producto=producto.no_producto";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo"Subtotal: <input  id='subtotal' name='subtotal' type='number' value='".$row['b']."' >"."$ dollar(es).</input><br>";
                $var1=$row['b'];
            }
            } else { }

            $sql2 = "select cantidad_iva from iva where no_iva=1";
            $result = $conn->query($sql2);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo"Iva: <input id='iva' name='iva' type='number' value='0.".$row['cantidad_iva']."' >"."</input>%.<br>";
                $var2=$row['cantidad_iva'];
            }
            } else { }
            $conn->close();
            echo "Total:"."<input id='total' name='total' value='".($var1+(($var1*$var2)/100))."' >$ dollar(es)."."</input>";
            ?>
            <br>
            <br>
            <button type="submit">Confirmar pedido</button>
        </form>

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
    header("location:../login.php");
  }
?>