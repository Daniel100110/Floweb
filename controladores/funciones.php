<?php
        function insertar_usuario(){
            include './db/conexion.php';
            $correo_cuenta = $_POST['correo_cuenta'];
            $contra_cuenta = $_POST['contra_cuenta'];
            $no_acceso = 1;
            $status_cuenta = "offline";
            $sql = "insert into cuenta values ('$correo_cuenta','$contra_cuenta','$no_acceso','$status_cuenta');";
            if ($conn->query($sql)) {
                echo "<script>swal('¡Bienvenido!', '¡Datos correctos!', 'success');</script>";
            } else {
                echo "<script>swal('¡Credenciales invalidas!', '¡La cuenta no existe o no coincide con el tipo de acceso!', 'info');</script>";
            } $conn->close();
        }
    ?>