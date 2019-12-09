
<?php
function consultar_cuenta()
{
    include '../db/conexion.php';
    $f07_cc_sql_01 = "select * from pedido";
    $f07_cc_res_01 = $conn->query($f07_cc_sql_01);
    $nombre_ciudad="";

    if ($f07_cc_res_01->num_rows > 0) {
        while ($row = $f07_cc_res_01->fetch_assoc()) {
            $ciudad = $row['ciudad_persona'];
            switch ($ciudad) {
                case 0:
                    $nombre_ciudad="Tijuana";
                    break;
                case 1:
                    $nombre_ciudad="Rosarito";
                    break;
                case 2:
                    $nombre_ciudad="Tecate";
                    break;
                case 3:
                    $nombre_ciudad="Mexicali";
                    break;
                case 4:
                    $nombre_ciudad="Ensenada";
                    break;
            }
            echo
                "<tr>" .
                    "<th scope='row'>" .
                    $row['no_pedido'] .
                    "</th>" .
                    "<td>" .
                    $row['lista_productos'] .
                    "</td>" .
                    "<td>" .
                    $row['subtotal_pedido'] .
                    "</td>" .
                    "<td>" .
                    $row['iva_pedido'] .
                    "%</td>" .
                    "<td>" .
                    $row['total_pedido'] .
                    "</td>" .
                    "<td>" .
                    $row['nom_persona'] .
                    "</td>" .
                    "<td>" .
                    $row['tel_persona'] .
                    "</td>" .
                    "<td>" .
                    $row['dir1_persona'] .
                    "</td>" .
                    "<td>" .
                    $row['dir2_persona'] .
                    "</td>" .
                    "<td>" .
                    $row['estado_persona'] .
                    "</td>" .
                    "<td>" .
                    $nombre_ciudad .
                    "</td>" .
                    "<td>" .
                    $row['cp_persona'] .
                    "</td>" .
                    "</tr>";
        }
    } else { }
    $conn->close();
}
?>