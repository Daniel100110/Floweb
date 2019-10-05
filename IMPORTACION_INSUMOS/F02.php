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
    <title>[F02]CRUD MATERIALES</title>
    <link rel="stylesheet" href="../css/css_f03.css">
  </head>

  <body>
    <?php
        include '../head/header.php';
        include '../nav/nav_empresa.php';
        include 'metodos_f03.php';
    ?>
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-4">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" colspan="4" style="text-align:center; color:gray;">
                <h2>Materiales</h2>
              </th>
            </tr>
          </thead>
          <thead>
            <tr>
              <th scope="col">Núm. de Material</th>
              <th scope="col">Nombre</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include '../CONEXION/conexion.php';
            $sql = "select * from material";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <th scope='row'>" . $row['no_material'] . "</th>" .
                  "<td>" . $row['nom_material'] . "</td>" .
                  "<td>" . $row['cant_material'] . "</td>" .
                  "<td>" . $row['status_material'] . "</td>
                </tr>";
              }
            } else { }
            $conn->close();
            ?>
          </tbody>
        </table>
      </div>
    </div>
    
    <?php
        include '../FOOTER/footer.php';
    ?>   
  </body>
</html>

<?php
  } 
  if (!$_SESSION['login_user']) {
    header("location:../index.php");
  }
?>
