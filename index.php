<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PROJECT</title>
    <link rel = "stylesheet" type = "text/css" href = "css/stylo.css">
</head>
<body> 
  <h1>CRUD</h1> 
  <table>
    <tr>
      <th>ID</th>
      <th>NOMBRE</th>
      <th>CANTIDAD</th>
      <th>UNIDAD</th>
      <!-- <th>PROMEDIO ACTUAL</th> -->
      <!-- <th>FECHA DE INGRESO</th> -->
    </tr>
    <?php

      // variables para la conexion //
      $host = "localhost";
      $usuario = "root";
      $contraseña = ".Root123";
      $nombrebd = "trabajo_extra";

      // conexion bd // 
      $con = mysqli_connect($host,$usuario,$contraseña,$nombrebd);
      if(!$con){ 
        // si la conexion de error ejecutara esto //
        echo "Ocurrio un error en la conexion ala base de datos";
      } 
      // echo "la conexion se establecio con exito";

      // crear consulta //
      $consulta = "SELECT * FROM materias_primas";

      $resultado = mysqli_query($con, $consulta); 
      if(mysqli_num_rows($resultado) > 0){
      while($row=mysqli_fetch_assoc($resultado)){
        echo "<tr>";
        echo '<td>'.$row['id'].'</br>';
        echo '<td>'.$row['nombre'].'</br>';
        echo '<td>'.$row['cantidad'].'</br>';
        echo '<td>'.$row['unidad_de_medidas'].'</br>';
        // echo '<td>'.$row['PROMEDIO_ACTUAL'].'</br>';
        // echo '<td>'.$row['FECHA_INGRESO'].'</br>';
        echo  "</tr>";
      }

      } else{
        echo "no existe registro";
      }

    ?> 
  </table>
</body>
</html>
