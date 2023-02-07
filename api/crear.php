<?php 

  include "config.php";
  
  // Creamos la conexion
  $conn = mysqli_connect($host, $usuario, $contrasena, $nombrebd);
  
  // Verificamos la conexion si fue exitosa
  if(!$conn){
    echo json_encode("La conexion ala base de datos fallo");
  }


  if(isset($_POST['prom_actual']) && isset($_POST['nombre']) && isset($_POST['apellido_paterno']) && isset($_POST['apellido_materno']) && isset($_POST['fecha_ingreso'])){

    // Tomar variables del formulario
    $nombre = $_POST["nombre"];
    $apellidoPaterno = $_POST["apellido_paterno"];
    $apellidoMaterno= $_POST["apellido_materno"];
    $promActual = $_POST["prom_actual"];
    $fechaIngreso = $_POST["fecha_ingreso"];

    $sql = "INSERT INTO alumnos (NOMBRE, APELLIDO_PATERNO, APELLIDO_MATERNO, PROMEDIO_ACTUAL, FECHA_INGRESO) VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', $promActual, '$fechaIngreso')";

    if(mysqli_query($conn, $sql)){

      // Si el alumno se creo con exito
      $id = mysqli_insert_id($conn);

      echo json_encode(array("estado" => "ok", "resultado" => $id));

    }else{
      echo json_encode(array("estado" => "error", "resultado" => "Error al guardar los datos"));
    }

  }else{

    echo json_encode('No existe');

  }
  // Cerrar la conexion ala base de datos;
  mysqli_close($conn);

?>
