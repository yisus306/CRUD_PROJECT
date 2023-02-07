<?php
  include "config.php";

  $conn = mysqli_connect($host, $usuario, $contrasena, $nombrebd);
  if(!$conn){
    die("la conexion a fallado tio");
  }
  
  if(isset($_POST['idalumno']) && isset($_POST['prom_actual']) && isset($_POST['nombre']) && isset($_POST['apellido_paterno']) && isset($_POST['apellido_materno']) && isset($_POST['fecha_ingreso'])){

    // Tomar variables del formulario
    $idalumno = $_POST["idalumno"];
    $nombre = $_POST["nombre"];
    $apellidoPaterno = $_POST["apellido_paterno"];
    $apellidoMaterno= $_POST["apellido_materno"];
    $promActual = $_POST["prom_actual"];
    $fechaIngreso = $_POST["fecha_ingreso"];

    $sql = "UPDATE alumnos SET NOMBRE='$nombre', APELLIDO_PATERNO='$apellidoPaterno', APELLIDO_MATERNO='$apellidoMaterno', PROMEDIO_ACTUAL=$promActual, FECHA_INGRESO='$fechaIngreso' WHERE alumnos.ID = $idalumno";

    if(mysqli_query($conn, $sql)){

      // Si el alumno se creo con exito
      echo json_encode(array("estado" => "ok"));
    }else{
      echo json_encode(array("estado" => "error", "resultado" => "Error al guardar los datos"));
    }

  }else{

    echo json_encode('No existe');

  }

  mysqli_close($conn)
?>
