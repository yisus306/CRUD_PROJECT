<?php

  include "config.php";

  $conn = mysqli_connect($host, $usuario, $contrasena, $nombrebd);

  if(!$conn){
    echo 'La conexion estubo mal';
  }

  if(isset($_POST['id'])){

    $id = $_POST['id'];

    $sql = "DELETE FROM alumnos WHERE alumnos.ID = $id";

    if(mysqli_query($conn, $sql)){
      echo json_encode('exito');
    }else{
      echo json_encode('Ocurrio un problema');
    }

  }else{
    echo json_encode("No existe el id");
  }

  mysqli_close($conn);

?>
