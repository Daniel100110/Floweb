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
        <title>[F02] Proceso de pago</title>
        <link rel="stylesheet" href="../css/css_f06.css">
    </head>

    <body>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <?php
            include '../head/header.php';
            include '../nav/nav_on.php';
            include 'funciones_f02.php';
            ?>
        <div class="container">
            <br><br>
            <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                    <form id="form" method="POST">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Tu carrito</span>
                            <span class="badge badge-secondary badge-pill"><?php ver_num_productos(); ?></span>
                        </h4>
                        <ul class="list-group mb-3">
                            <?php ver_carrito(); ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Subtotal:</strong>
                                <span><?php ver_subtotal(); ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Iva:</strong>
                                <span>8%</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Total (MXN):</strong>
                                <span><?php ver_total(); ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Saldo:</strong>
                                <span><?php ver_saldo(); ?></span>
                            </li>
                        </ul>
                        <input name="pagar" class="btn btn-success btn-lg btn-block" type="submit" value="Pagar"><br>
                        <input name="cancelar" class="btn btn-danger btn-lg btn-block" type="submit" value="Cancelar">
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
                                    <input name="nom_persona" id="nom_persona" type="text" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Teléfono celular (opcional):</label>
                                    <input name="tel_persona" id="tel_persona" type="tel" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="address">Dirección:</label>
                                    <input name="dir1_persona" id="dir1_persona" type="text" class="form-control" placeholder="Ejemplo: colonia, calle, número exterior." required>
                                </div>
                                <div class="mb-3">
                                    <label>Dirección detallada:</label>
                                    <input name="dir2_persona" id="dir2_persona" type="text" class="form-control" placeholder="Ejemplo: número, color de la casa, referencias como tiendas o locales." Required>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <label>Estado:</label>
                                        <select name="estado_persona" id="estado_persona" class="custom-select d-block w-100" required>
                                            <option value="Baja California">Baja California</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Ciudad:</label>
                                        <select name="ciudad_persona" id="ciudad_persona" class="custom-select d-block w-100" required>
                                            <option value="Tijuana">Tijuana</option>
                                            <option value="Rosarito">Rosarito</option>
                                            <option value="Tecate">Tecate</option>
                                            <option value="Mexicali">Mexicali</option>
                                            <option value="Ensenada">Ensenada</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label>Código Postal:</label>
                                        <input name="cp_persona" id="cp_persona" type="number" class="form-control" required>
                                    </div>
                                </div>
                                <hr>
                                <table>
                                    <tr>
                                        <td><input name="datos" id="datos" type="submit" class="btn btn-outline-warning btn-lg btn-block" value="Guardar dirección"></td>
                                    </tr>
                                    <tr></tr>
                            </form>
                            </form>
                            <button id="info" name="info" class="btn btn-outline-info" onclick="mostrarDatos();">Usar mi direccion</button>
                        </div>
                    </div>
            </div>
        </div>
        </div>
        <script>
            function mostrarDatos() {
                <?php mostrarDatos(); ?>
                document.getElementById("ciudad_persona").item(<?php mostrarCiudad(); ?>).selected = 'selected';
            }
        </script>
        <?php
            if (isset($_POST['pagar'])) {
                include '../db/conexion.php';
                $f02_p_correo = $_SESSION['login_user'];
                $f02_p_lista_productos = get_productos();
                $f02_p_subtotal = get_subtotal();
                $f02_p_iva = 8;
                $f02_p_total = get_total();
                $f02_p_saldo = get_saldo();
                $nom_persona = $_POST['nom_persona'];
                $tel_persona = $_POST['tel_persona'];
                $dir1_persona = $_POST['dir1_persona'];
                $dir2_persona = $_POST['dir2_persona'];
                $estado_persona = $_POST['estado_persona'];
                $ciudad_persona = $_POST['ciudad_persona'];
                $cp_persona = $_POST['cp_persona'];

                if ($f02_p_saldo >= $f02_p_total) {
                    $f02_p_sql_01 = "select * from pedido where pedido.correo_cuenta='$f02_p_correo'";
                    $f02_p_res_01 = $conn->query($f02_p_sql_01);
                    if ($f02_p_res_01 -> num_rows > 0) {
                        echo "<script language='javascript' type='text/javascript'>" .
                            "location.href='../proceso_de_envio/F03.php'" .
                            "</script>";
                    } else {
                        $f02_p_res_02 = "insert into pedido (correo_cuenta,lista_productos,subtotal_pedido,iva_pedido,total_pedido,nom_persona,tel_persona,dir1_persona,dir2_persona,estado_persona,ciudad_persona,cp_persona) values ('$f02_p_correo','$f02_p_lista_productos','$f02_p_subtotal','$f02_p_iva','$f02_p_total','$nom_persona','$tel_persona','$dir1_persona','$dir2_persona','$estado_persona','$ciudad_persona','$cp_persona');";
                        if ($conn->query($f02_p_res_02)) {
                            $nuevo_saldo =  $f02_p_saldo - $f02_p_total;
                            $f02_p_sql_03 = "update cuenta set saldo_cuenta = '$nuevo_saldo' where correo_cuenta='$f02_p_correo';";
                            $conn->query($f02_p_sql_03 );
                            echo "<script language='javascript' type='text/javascript'>" .
                                "location.href='../proceso_de_envio/F03.php'" .
                                "</script>";
                        } else {
                            echo "<script>swal('¡Error!', '¡No se ha agregado!', 'error');</script>";
                        }
                    }
                } else {
                    echo "<script>swal('¡Fondos insuficientes!', '¡Su saldo es menor que el total a pagar!', 'error');</script>";
                }
                $conn->close();
            }
            if (isset($_POST['datos'])) {
                include '../db/conexion.php';
                $correo_06 = $_SESSION['login_user'];
                $nom_persona = $_POST['nom_persona'];
                $tel_persona = $_POST['tel_persona'];
                $dir1_persona = $_POST['dir1_persona'];
                $dir2_persona = $_POST['dir2_persona'];
                $estado_persona = $_POST['estado_persona'];
                $ciudad_persona = $_POST['ciudad_persona'];
                $cp_persona = $_POST['cp_persona'];

                $sql_06 = "select * from datosPersonales where correo_cuenta='$correo_06'";
                $result_06 = $conn->query($sql_06);
                if ($result_06->num_rows > 0) {
                    $sql_054 = "update datosPersonales set nom_persona='$nom_persona', tel_persona='$tel_persona', dir1_persona='$dir1_persona', dir2_persona='$dir2_persona', estado_persona='$estado_persona', ciudad_persona='$ciudad_persona', cp_persona='$cp_persona' where correo_cuenta='$correo_06'";
                    if ($conn->query($sql_054)) {
                        echo "<script>swal('¡Dirección actualizada!', '¡Se ha actualizado tu dirección!', 'success');</script>";
                    } else {
                        echo "<script>swal('¡No se ha actualizado tu información!', '¡Por favor, verificar que tu información es correcta!', 'error');</script>";
                    }
                } else {
                    $sql_07 = "insert into datosPersonales values ('$correo_06','$nom_persona','$tel_persona', '$dir1_persona','$dir2_persona','$estado_persona','$ciudad_persona','$cp_persona');";
                    if ($conn->query($sql_07)) {
                        echo "<script>swal('¡Dirección guardada!', '¡Se ha guardado tu dirección!', 'success');</script>";
                    } else {
                        echo "<script>swal('¡No se ha guardado tu dirección!', '¡Por favor, ingresa datos validos!', 'error');</script>";
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