<?php
    function consultar_producto(){
      include '../db/conexion.php';
      $sql_c = "select * from producto";
      $result_c = $conn->query($sql_c);
      if ($result_c->num_rows > 0) {
        while ($row = $result_c->fetch_assoc()) {
          echo "<tr>
            <th>[" . $row['no_producto'] . "]</th>" .
            "<td><img class='img-thumbnail' src='../pictures/".$row['foto_producto']."' width='100px' heitgh='100px'></td>" .
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
        $b = $_POST['nom_producto'];
        $c = $_POST['cantidad_producto'];
        $d = $_POST['precio_producto'];
        $e = $_FILES['img']['name'];
        $f = $_POST['status_producto'];
        $ruta=$_FILES['img']['tmp_name'];
        $destino="../pictures/".$e;
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
      include '../db/conexion.php';
      $no_producto_b = $_POST['no_producto_b'];

      $sql_b = "select foto_producto from producto where no_producto='$no_producto_b'";
      $result_b = $conn->query($sql_b);
        if ($result_b->num_rows > 0) {
          while ($row = $result_b->fetch_assoc()) {
              unlink('../pictures/'.$row['foto_producto']);
              $sql_b2 = "delete from producto where no_producto='$no_producto_b';";
              if ($conn->query($sql_b2)) {
              } else {}
          }
        } else {}
      $conn->close(); 
    }
?>