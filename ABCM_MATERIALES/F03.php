<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <title>[F03]CRUD MATERIALES</title>
  <link rel="stylesheet" href="../CSS/css_f03.css">
</head>

<head>
  <?php
    include '../head/head.php';
  ?>
  <link rel="stylesheet" type="text/css" href="../CSS/css_f01.css">
  </head>

  <body>
  <?php
      include '../head/header.php';
      include '../nav/nav_empresa.php';
      include 'metodos_f03.php';
  ?>
  <div class="container-fluid" style="margin-top: 5%;">
    <div class="row">
      <div class="col-sm-4">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" colspan="4" style="text-align:center; color:gray;">
                <h2>Consultar</h2>
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
              consultar_material();
            ?>
          </tbody>
        </table>
      </div>
      <div class="col-sm-4">
        <center>
          <div id="border3">
            <div id="border2">
              <div id="border1">
                <div id="border0">
                  <img src="../IMAGENES/Flor.png" style="width:95%;height:260px;border-radius: 100%;">
                </div>
              </div>
            </div>
          </div>
        </center>
        <form method="post" id="form1">
          <div class="form-group">
            <label>Núm. de Material:</label><input class="form-control" type="text" id="no_material_i" name="no_material_i">
            <label>Nombre:</label><input class="form-control" type="text" id="nom_material_i" name="nom_material_i">
            <label>Cantidad:</label><input class="form-control" type="text" id="cant_material_i" name="cant_material_i">
          </div>
          <div class="form-group">
            <label>Status:</label>
            <select id="status_material_i" name="status_material_i" class="form-control">
              <option Selected value="Activo">Activo</option>
              <option value="Inactivo">Inactivo</option>
            </select>
          </div>
          <!-- <input type="submit" class="btn btn-info" onclick = "modificar_material();" value="Modificar"> -->
          <input type="submit" class="btn btn-primary" onclick = "insertar_material();" style="float:right;" value="Agregar">
        </form>
        </form>
        <br> <br>
      </div>
      <div class="col-sm-4">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" colspan="4" style="text-align:center; color:gray;">
                <h2>Eliminar Material</h2>
              </th>
            </tr>
          </thead>
        </table>
        <form method="post">
          <div class="form-group">
            <label>Núm. de Material:</label><input class="form-control" type="text" id="no_material" name="no_material">
            <br>
            <input type="submit" class="btn btn-danger" onclick = "borrar_material();" style="float:right;" value="Eliminar">
        </form>
      </div>
    </div>
  </div>
  <script>
  function consultar_material(){
    alert('<?php consultar_material(); ?>');s
  }
  function insertar_material(){
    alert('<?php insertar_material(); ?>');s
  }
  function modificar(){
    alert('<?php modificar_material(); ?>');s
  }
  function borrar_material(){
    alert('<?php borrar_material(); ?>');s
  }
  </script>
  <?php
  include '../FOOTER/footer.php';
  ?>
</body>

</html>