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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>

    <body>
        <?php
            include '../head/header.php';
            include '../nav/nav_on.php';
            include 'funciones_f06.php';
            ?>
        <div class="container">
            <br><br>
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Tu carrito</span>
                        <span class="badge badge-secondary badge-pill"><?php ver_num_productos(); ?></span>
                    </h4>
                    <form method="POST">
                        <ul class="list-group mb-3">
                            <?php ver_carrito(); ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Subtotal:</strong>
                                <span><?php ver_subtotal();?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Iva:</strong>
                                <span>8%</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Total (MXN):</strong>
                                <span><?php ver_total();?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Saldo:</strong>
                                <span><?php ver_saldo();?></span>
                            </li>
                        </ul>
                        <input name="submit2" class="btn btn-success btn-lg btn-block" type="submit" value="Pagar"><br>
                    </form>
                </div>
                <div class="col-md-8 order-md-1">
                    <div class="card p-2">
                        <h4 class="mb-3">
                            <center>Dirección de envio</center>
                        </h4>
                        <hr class="mb-3">
                        <form method="post">
                            <div class="mb-3">
                                <label>Nombre:</label>
                                <input name="nom_persona" type="text" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Teléfono celular (opcional):</label>
                                <input name="tel_persona" type="tel" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="address">Dirección:</label>
                                <input name="dir1_persona" type="text" class="form-control" placeholder="Ejemplo: colonia, calle, número exterior." required>
                            </div>
                            <div class="mb-3">
                                <label>Dirección detallada:</label>
                                <input name="dir2_persona" type="text" class="form-control" placeholder="Ejemplo: número, color de la casa, referencias como tiendas o locales." Required>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label>Estado:</label>
                                    <select name="estado_persona" class="custom-select d-block w-100" required>
                                        <option value="Baja California">Baja California</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Ciudad:</label>
                                    <select name="ciudad_persona" class="custom-select d-block w-100" required>
                                        <option value="Tijuana">Tijuana</option>
                                        <option value="Rosarito">Rosarito</option>
                                        <option value="Tecate">Tecate</option>
                                        <option value="Mexicali">Mexicali</option>
                                        <option value="Ensenada">Ensenada</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Código Postal:</label>
                                    <input name="cp_persona" type="text" class="form-control" required>
                                </div>
                            </div>
                            <input name="submit" type="submit" class="btn btn-outline-warning btn-lg btn-block" value="Guardar información">
                        </form>
                        <form>
                            <!-- <button type="submit" class="btn btn-outline-info">Usar mi dirección</button> -->
                        </form>
                    </div>
                    <br>
                    <div class="card p-2">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="materialGroupExample1" name="groupOfMaterialRadios">
                            <label class="form-check-label" for="materialGroupExample1">Saldo.</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="materialGroupExample2" name="groupOfMaterialRadios" checked>
                            <label class="form-check-label" for="materialGroupExample2">Paypal.</label>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <?php
            if (isset($_POST['submit'])) {
                include '../db/conexion.php';
                $correo_06 = $_SESSION['login_user'];
                $sql_06 = "select * from datosPersonales where correo_cuenta='$correo_06'";
                $result_06 = $conn -> query($sql_06);
                if ($result_06 -> num_rows > 0) 
                {
                  echo "<script>swal('¡El registro ya existe!', '¡No se ha agregado!', 'info');</script>";
                } 
                else 
                { 
                  $nom_persona = $_POST['nom_persona'];
                  $tel_persona = $_POST['tel_persona'];
                  $dir1_persona = $_POST['dir1_persona'];
                  $dir2_persona = $_POST['dir2_persona'];
                  $cp_persona = $_POST['cp_persona'];
                  $saldo_persona = 0;
                  $sql_07 = "insert into datosPersonales values ('$correo_06','$nom_persona','$tel_persona','$dir1_persona','$dir2_persona','$cp_persona','$saldo_persona');";
                    if ($conn->query($sql_07)) {
                      echo "<script>swal('¡Producto agregado!', '¡Se ha agregado!', 'success');</script>";
                    } else {
                      echo "<script>swal('¡Error!', '¡No se ha agregado!', 'error');</script>";
                    }
                }
                $conn->close();
            }

            if (isset($_POST['submit2'])) {
                include '../db/conexion.php';
                $correo_07 = $_SESSION['login_user'];
                $lista_productos=get_productos();
                $subtotal=get_subtotal();
                $iva=8;
                $total=get_total();

                $sql_07 = "select * from pedido where pedido.correo_cuenta='$correo_07'";
                $result_07 = $conn -> query($sql_07);
                if ($result_07 -> num_rows > 0) 
                {
                    echo "<script language='javascript' type='text/javascript'>" .
                    "location.href='../proceso_de_envio/F08.php'" .
                    "</script>";
                } 
                else 
                { 
                  $sql_08 = "insert into pedido (correo_cuenta,lista_productos,subtotal_pedido,iva_pedido,total_pedido) values ('$correo_07','$lista_productos','$subtotal','$iva','$total');";
                    if ($conn->query($sql_08)) {
                      echo "<script>swal('¡Pedido agregado!', '¡Se ha agregado!', 'success');</script>";
                      echo "<script language='javascript' type='text/javascript'>" .
                      "location.href='../proceso_de_envio/F08.php'" .
                      "</script>";
                    } else {
                      echo "<script>swal('¡Error!', '¡No se ha agregado!', 'error');</script>";
                    }
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