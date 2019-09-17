<?php
    function consultar_material(){
    include '../conexion/conexion.php';
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
    }

    function insertar_material(){
    include '../conexion/conexion.php';
        $no_material_i = $_POST['no_material_i'];
        $nom_material_i = $_POST['nom_material_i'];
        $cant_material_i = $_POST['cant_material_i'];
        $status_material_i = $_POST['status_material_i'];

        $sql = "insert into material values ('$no_material_i','$nom_material_i','$cant_material_i','$status_material_i');";
    
        if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>¡Registro agregado exitosamente!</div>";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    function modificar_material(){
    include '../conexion/conexion.php';
        $no_material_m = $_POST['no_material_m'];
        $nom_material_m = $_POST['nom_material_m'];
        $cant_material_m = $_POST['cant_material_m'];
        $status_material_m = $_POST['status_material_m'];
    
        try {
        if (empty($no_material_m)) {
            echo "<div class='alert alert-danger' role='alert'>¡Error!</div>";
        } else {
            if (empty($nom_material_m)) { } else {
            $sql = "update material set nom_material='$nom_material_m' where no_material='$no_material_m'";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
            }
            }
            if (empty($cant_material_m)) { } else {
            $sql = "update material set cant_material='$cant_material_m' where no_material='$no_material_m'";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
            }
            }
            if (empty($status_material_m)) { } else {
            $sql = "update material set status_material='$status_material_m' where no_material='$no_material_m'";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success' role='alert'>¡Registro actualizado exitosamente!</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>¡Error al actualizar el registro!</div>";
            }
            }
        }
        } catch (Exception $e) {
        echo "<div class='alert alert-danger' role='alert'>¡Error!</div>";
        }
    }
    
    function borrar_material(){
    include '../conexion/conexion.php';
            $no_material = $_POST['no_material'];
            $sql = "delete from material where no_material = '$no_material' ";
            if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>¡Registro borrado exitosamente!</div>";
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
        $conn->close();
    }
?>