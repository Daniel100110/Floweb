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
    <link rel="stylesheet" href="../css/css_f04.css">
  </head>
  <script>
    function mostrar_alta() {
      if (document.getElementById('alta').style.display === 'block') {
        document.getElementById('img_alta').style.display = 'block';
        document.getElementById('alta').style.display = 'none';
        document.getElementById('img_baja').style.display = 'block';
        document.getElementById('baja').style.display = 'none';
        document.getElementById('img_consulta').style.display = 'block';
        document.getElementById('consulta').style.display = 'none';
        document.getElementById('img_modificacion').style.display = 'block';
        document.getElementById('modificacion').style.display = 'none';
      } else {
        document.getElementById('img_alta').style.display = 'block';
        document.getElementById('alta').style.display = 'block';
        document.getElementById('img_baja').style.display = 'none';
        document.getElementById('baja').style.display = 'none';
        document.getElementById('img_consulta').style.display = 'none';
        document.getElementById('consulta').style.display = 'none';
        document.getElementById('img_modificacion').style.display = 'none';
        document.getElementById('modificacion').style.display = 'none';
      }
    }
    function mostrar_baja() {
      if (document.getElementById('baja').style.display === 'block') {
        document.getElementById('img_alta').style.display = 'block';
        document.getElementById('alta').style.display = 'none';
        document.getElementById('img_baja').style.display = 'block';
        document.getElementById('baja').style.display = 'none';
        document.getElementById('img_consulta').style.display = 'block';
        document.getElementById('consulta').style.display = 'none';
        document.getElementById('img_modificacion').style.display = 'block';
        document.getElementById('modificacion').style.display = 'none';
      } else {
        document.getElementById('img_alta').style.display = 'none';
        document.getElementById('alta').style.display = 'none';
        document.getElementById('img_baja').style.display = 'block';
        document.getElementById('baja').style.display = 'block';
        document.getElementById('img_consulta').style.display = 'none';
        document.getElementById('consulta').style.display = 'none';
        document.getElementById('img_modificacion').style.display = 'none';
        document.getElementById('modificacion').style.display = 'none';
      }
    }
    function mostrar_consulta() {
      if (document.getElementById('consulta').style.display === 'block') {
        document.getElementById('img_alta').style.display = 'block';
        document.getElementById('alta').style.display = 'none';
        document.getElementById('img_baja').style.display = 'block';
        document.getElementById('baja').style.display = 'none';
        document.getElementById('img_consulta').style.display = 'block';
        document.getElementById('consulta').style.display = 'none';
        document.getElementById('img_modificacion').style.display = 'block';
        document.getElementById('modificacion').style.display = 'none';
      } else {
        document.getElementById('img_alta').style.display = 'none';
        document.getElementById('alta').style.display = 'none';
        document.getElementById('img_baja').style.display = 'none';
        document.getElementById('baja').style.display = 'none';
        document.getElementById('img_consulta').style.display = 'block';
        document.getElementById('consulta').style.display = 'block';
        document.getElementById('img_modificacion').style.display = 'none';
        document.getElementById('modificacion').style.display = 'none';
      }
    }
    function mostrar_modificacion() {
      if (document.getElementById('modificacion').style.display === 'block') {
        document.getElementById('img_alta').style.display = 'block';
        document.getElementById('alta').style.display = 'none';
        document.getElementById('img_baja').style.display = 'block';
        document.getElementById('baja').style.display = 'none';
        document.getElementById('img_consulta').style.display = 'block';
        document.getElementById('consulta').style.display = 'none';
        document.getElementById('img_modificacion').style.display = 'block';
        document.getElementById('modificacion').style.display = 'none';
      } else {
        document.getElementById('img_alta').style.display = 'none';
        document.getElementById('alta').style.display = 'none';
        document.getElementById('img_baja').style.display = 'none';
        document.getElementById('baja').style.display = 'none';
        document.getElementById('img_consulta').style.display = 'none';
        document.getElementById('consulta').style.display = 'none';
        document.getElementById('img_modificacion').style.display = 'block';
        document.getElementById('modificacion').style.display = 'block';
      }
    }
  </script>
  <body>
    <?php
      include '../head/header.php';
      include '../nav/nav_on.php';
      include 'funciones_f04.php';
      ?>
    <div class="container" style="margin-top: 1%;">
      <div class="row">

        <div id="img_alta" class="col-sm-6 col-md-4 col-lg-6">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" colspan="4" style="text-align:center; color:gray;">
                  <h2>Dar de Alta</h2>
                </th>
              </tr>
            </thead>
          </table>
          <center><button onclick="mostrar_alta()"><img class="img-fluid img-thumbnail" src="../imagenes/alta.jpg"></button></center>
        </div>
        <div id="img_consulta" class="col-sm-6 col-md-4 col-lg-6">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" colspan="4" style="text-align:center; color:gray;">
                  <h2>Consultar</h2>
                </th>
              </tr>
            </thead>
          </table>
          <center><button onclick="mostrar_consulta()"><img class="img-fluid img-thumbnail" src="../imagenes/consulta.jpg"></button></center>
        </div>
        <div id="img_baja" class="col-sm-6 col-md-4 col-lg-6">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" colspan="4" style="text-align:center; color:gray;">
                  <h2>Dar de Baja</h2>
                </th>
              </tr>
            </thead>
          </table>
          <center><button onclick="mostrar_baja()"><img class="img-fluid img-thumbnail" src="../imagenes/baja.jpg"></button></center>
        </div>
        <div id="img_modificacion" class="col-sm-6 col-md-4 col-lg-6">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" colspan="4" style="text-align:center; color:gray;">
                  <h2>Modificar</h2>
                </th>
              </tr>
            </thead>
          </table>
          <center><button onclick="mostrar_modificacion()"><img class="img-fluid img-thumbnail" src="../imagenes/modificacion.jpg"></button></center>
        </div>

        <div id="alta" class="col-sm-6 col-md-4 col-lg-6">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" colspan="4" style="text-align:center; color:gray;">
                  <h2>-</h2>
                </th>
              </tr>
            </thead>
          </table>
          <form method="post" enctype="multipart/form-data">
            <table class="table">
              <tr>
                <td><label>Número del producto:</label></td>
                <td></label><input type="number" name="no_producto"><br></td>
              </tr>
              <tr>
                <td><label>Nombre del producto:</label></td>
                <td><input type="text" name="nom_producto" /><br></td>
              </tr>
              <tr>
                <td><label>Precio del producto:</label></td>
                <td><input type="number" name="precio_producto"><br></td>
              </tr>
              <tr>
                <td><label>Cantidad del producto:</label></td>
                <td><input type="number" name="cantidad_producto"><br></td>
              </tr>
              <tr>
                <td><label>Status del producto:</label></td>
                <td><input type="text" name="status_producto"><br></td>
              </tr>
              <tr>
                <td><label>Imagen del producto: </label></td>
                <td><input type="file" name="img" /><br /></td>
              </tr>
              <tr>
                <td colspan="2"><input type="submit" onclick="insertar_producto();" value="Dar de alta"></td>
              </tr>
            </table>
          </form>
          <br>
        </div>
        <div id="consulta" class="col-sm-6 col-md-4 col-lg-6">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" colspan="4" style="text-align:center; color:gray;">
                  <h2>-</h2>
                </th>
              </tr>
            </thead>
          </table>
          <table class="table">
            <?php
              consultar_producto();
              ?>
          </table>
        </div>
        <div id="baja" class="col-sm-6 col-md-4 col-lg-6">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" colspan="4" style="text-align:center; color:gray;">
                  <h2>-</h2>
                </th>
              </tr>
            </thead>
          </table>
          <form method="post" enctype="multipart/form-data">
            <table class="table">
              <tr>
                <td><label>Número del producto:</label></td>
                <td></label><input type="number" name="no_producto_b" /><br /></td>
              </tr>
              <tr>
                <td></label><input type="submit" onclick="borrar_producto();" value="Dar de baja" /><br /></td>
              </tr>
            </table>
          </form>
        </div>
        <div id="modificacion" class="col-sm-6 col-md-4 col-lg-6">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" colspan="4" style="text-align:center; color:gray;">
                  <h2>-</h2>
                </th>
              </tr>
            </thead>
          </table>
          <form method="post" enctype="multipart/form-data">
            <table class="table">
              <tr>
                <td><label>Número del producto:</label></td>
                <td></label><input type="number" name="no_producto_m" /><br /></td>
              </tr>
              <tr>
                <td><label>Nombre del producto:</label></td>
                <td><input type="text" name="nom_producto_m" /><br /></td>
              </tr>
              <tr>
                <td><label>Precio del producto:</label></td>
                <td><input type="number" name="precio_producto_m" /><br /></td>
              </tr>
              <tr>
                <td><label>Cantidad del producto:</label></td>
                <td><input type="number" name="cantidad_producto_m" /><br /></td>
              </tr>
              <tr>
                <td><label>Status del producto:</label></td>
                <td><input type="text" name="status_producto_m" /><br /></td>
              </tr>
              <tr>
                <td><label>Imagen del producto: </label></td>
                <td><input type="file" name="imgs" /><br /></td>
              </tr>
              <tr>
                <td colspan="2"><input type="submit" value="Modificar"></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
    <script>
      function insertar_producto() {
        alert('<?php insertar_producto(); ?>');
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
  header("location:index.php");
}
?>