<?php
    $lOut_connect = mysqli_connect("localhost", "root", "", "floweb");
    session_start();
    $lOut_cc_01 = $_SESSION['login_user'];
    $lOut_sql_01 = mysqli_query($lOut_connect, "UPDATE cuenta SET status_cuenta = 'Desconectado' WHERE correo_cuenta = '$lOut_cc_01'");
    $lOut_connect->query($lOut_sql_01);
    if(session_destroy()){
        header("Location: login.php");
    }
?>