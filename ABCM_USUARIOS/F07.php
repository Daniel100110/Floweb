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
    <title>[F07] A.B.C.M Usuarios</title>
    <link rel="stylesheet" href="../css/css_f01.css">
  </head>

  <body>
    <?php
      include '../head/header.php';
      include '../nav/nav_on.php';
      include 'funciones_f07.php';
      ?>
    <div class="container-fluid" style="margin-top: 5%;">
      <div class="row">
        <div class="col-sm-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" colspan="11" style="text-align:center; color:gray;">
                  <h2>Usuarios</h2>
                </th>
              </tr>
            </thead>
            <thead>
              <tr>
                <th scope="col">Correo</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Tipo de acceso</th>
                <th scope="col">Estado</th>
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
      <div class="row">
          <div class="col-sm-6">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" colspan="4" style="text-align:center; color:gray;">
                    <h2>Accesos</h2>
                  </th>
                </tr>
              </thead>
              <thead>
                <tr>
                  <th scope="col">Núm. de Acceso</th>
                  <th scope="col">Tipo de acceso</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  consultar_acceso_01();
                  ?>
              </tbody>
            </table>
          </div>
          <div class="col-sm-6">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" colspan="4" style="text-align:center; color:gray;">
                  <h2>Agregar / Modificar usuarios</h2>
                </th>
              </tr>
            </thead>
          </table>
          <form method="post">
            <div class="form-group">
              <label>Correo:</label><input class="form-control" type="email" name="no_cuenta_i">
              <label>contraseña:</label><input class="form-control" type="password" name="nom_completo_i">
              <label>Tipo de acceso:</label>
              <select name="no_acceso_i" class="form-control">
                <?php
                  consultar_acceso_02();
                  ?>
              </select>
              <label>Status:</label>
              <select name="status_cuenta_i" class="form-control">
                <option Selected value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
              </select>
            </div>
            <input type="submit" class="btn btn-primary" style="float:right;" onclick="insertar_usuario();" value="Aceptar">
          </form>
          <br>
          <br>
          <hr>
          <a style="float: right;" href="../login.php">Regresar</a>
        </div>
      </div>
    </div>
    <script>
      function insertar_usuario() {
        alert('<?php insertar_usuario(); ?>');
      }

      function borrar_acceso() {
        alert('<?php borrar_usuario(); ?>');
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
  header("location:../login.php");
}
?>