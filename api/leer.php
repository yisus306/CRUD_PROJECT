<?php
  
  include 'config.php';
  $conn = mysqli_connect($host, $usuario, $contrasena, $nombrebd);

  if(!$conn){
    echo 'hubo un problema con la conexion';
  }

  $sql = "SELECT * FROM alumnos";
  $resultado = mysqli_query($conn, $sql);

  if(mysqli_num_rows($resultado) > 0){
    $arregloResult = array();

    while($row = mysqli_fetch_assoc($resultado)){
      $arregloResult[] = $row;
    }

    echo json_encode($arregloResult);

  }else{
    echo 'Algo salio mal';
  }

  mysqli_close($conn);

?>
