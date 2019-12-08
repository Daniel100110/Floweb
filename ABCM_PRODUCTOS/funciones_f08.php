<?php
  function consultar_producto(){
    include '../db/conexion.php';
    $f08_cp_sql_01= "select * from producto";
    $f08_cp_res_01 = $conn->query($f08_cp_sql_01);
    if ($f08_cp_res_01 -> num_rows > 0) {
      while ($row = $f08_cp_res_01 -> fetch_assoc()) {
        echo "".
        "<tr>".
          "<th>".
            "[" . $row['no_producto'] . "]".
          "</th>".
          "<td>".
            "<img class='img-thumbnail' src='../pictures/".$row['foto_producto']."' width='100px' heitgh='100px'>".
          "</td>".
          "<td>".
            $row['nom_producto'].
          "</td>".
          "<td>".
            "$".$row['precio_producto']."</td>".
          "<td>"
            .$row['cantidad_producto'].
          "</td>".
          "<td>".
            $row['status_producto'].
          "</td>".
        "</tr>";
      }
    }else{ 
    }
    $conn->close();
  }
  function insertar_producto(){
    include '../db/conexion.php';
      $f08_ip_01 = $_POST['nom_producto'];
      $f08_ip_02 = $_POST['cantidad_producto'];
      $f08_ip_03 = $_POST['precio_producto'];
      $f08_ip_04 = $_FILES['img']['name'];
      $f08_ip_05 = $_POST['status_producto'];
      $ruta = $_FILES['img']['tmp_name'];
      $destino="../pictures/".$f08_ip_04;
      if(copy($ruta, $destino))
      {
        $f08_sql_ip_01 = "insert into producto (nom_producto,cantidad_producto,precio_producto,foto_producto,status_producto) values ('$f08_ip_01','$f08_ip_02','$f08_ip_03','$f08_ip_04','$f08_ip_05');";
        if ($conn->query($f08_sql_ip_01)) {
          echo "<div class='alert alert-success' role='alert'>¡Registro agregado exitosamente!</div>";
        } else {
          echo "Error: ".$f08_sql_ip_01."<br>".$conn -> error;
        }
      }  
      $conn->close(); 
  }
  function borrar_producto(){
    include '../db/conexion.php';
    $f08_bp_01 = $_POST['no_producto_b'];
    $f08_bp_sql_01 = "select foto_producto from producto where no_producto='$f08_bp_01'";
    $f08_bp_res_01 = $conn -> query($f08_bp_sql_01);
      if ($f08_bp_res_01 -> num_rows > 0) {
        while ($row = $f08_bp_res_01 -> fetch_assoc()) {
          unlink('../pictures/'.$row['foto_producto']);
          $f08_bp_sql_02 = "delete from producto where no_producto='$f08_bp_01';";
          if ($conn -> query($f08_bp_sql_02)) {
          }else{  
          }
        }
      }else{
      }
    $conn->close(); 
  }
?>