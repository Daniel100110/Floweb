<?php

    function consultar_producto(){
      include '../db/conexion.php';
      $sql_c = "select * from producto";
      $result_c = $conn->query($sql_c);
      if ($result_c->num_rows > 0) {
        while ($row = $result_c->fetch_assoc()) {
          echo "<tr>
            <th>[" . $row['no_producto'] . "]</th>" .
            "<td><img class='img-thumbnail' src='../imagenes/" . $row['foto_producto'] . "' width='100px' heitgh='100px'></td>" .
            "<td>" . $row['nom_producto'] . "</td>" .
            "<td>$" . $row['precio_producto'] . "</td>" .
            "<td>" . $row['cantidad_producto'] . "</td>" .
            "<td>" . $row['status_producto'] . "</td>" .
            "</tr>";
        }
      } else { }
      $conn->close();
    }
    
    function insertar_producto(){
      include '../db/conexion.php';
        $a = $_POST['no_producto'];
        $b = $_FILES['img']['name'];
        $c = $_POST['nom_producto'];
        $d = $_POST['precio_producto'];
        $e = $_POST['cantidad_producto'];
        $f = $_POST['status_producto'];
        $ruta=$_FILES['img']['tmp_name'];
        $destino="../imagenes/".$b;
        if(copy($ruta,$destino))
        {
          $sql = "insert into producto values ('$a','$b','$c','$d','$e','$f');";
          if ($conn->query($sql)) {
            echo "<div class='alert alert-success' role='alert'>¡Registro agregado exitosamente!</div>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }  
        $conn->close(); 
    }

    function modificar_producto(){
    }

    function borrar_producto(){
    }
?>