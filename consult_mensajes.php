<!DOCTYPE html>
<html>
<head>
  <title>Elamigos Games</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  
  <header>
    <a href="inicio.html">
      <img src="logo.jpg" alt="Logo de la Empresa" width="200" height="100" >
    </a>
    <nav>
        <ul>
          <li><a href="admin.html">Pagina principal de administracion</a></li>
        </ul>
      </nav>
    <h1>Consulta de mensajes a la empresa</h1>
    <?php
      if (isset($_GET['resultado'])) {
            $resultado = $_GET['resultado'];
          
            // Aquí puedes utilizar el valor obtenido como desees
            if ($resultado == 1) {
              echo "La operación de eliminación se completó correctamente.";
            }elseif($resultado==2){
              echo "Indice no valido.";
            }
      }
      require 'conection.php';
      $query='SELECT * FROM contacto ';
      $filas=mysqli_query($conexion,$query);
      $num_reg=mysqli_num_rows($filas);
      if (mysqli_num_rows($filas) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>NOMBRE</th>";
        echo "<th>CORREO</th>";
        echo "<th>MENSAJE</th>";
        echo "</tr>";
        $valores=array();
        while ($fila = mysqli_fetch_assoc($filas)) {
            $id = $fila["id_contacto"];
            array_push($valores,$id);
            $email = $fila["email"];
            $nombre = $fila["nombre"];
            $mensaje = $fila["mensaje"];
    
            echo "<tr>";
            echo "<td>$id |</td>";
            echo "<td>$nombre |</td>";
            echo "<td>$email  |</td>";
            echo "<td>$mensaje</td>";
            echo "</tr>";
        }
    
        echo "</table>";
    } else {
        echo "No se encontraron resultados.";
    }

    mysqli_close($conexion);
    
    ?>

  <?php $numeros_str=implode(',',$valores);?>
<form action="delete.php" method="POST">
    <label for="id">ID de registro a eliminar:</label>
    <input type="number" id="idd" name="id" placeholder="Ingresa el id" required>
    <input type="hidden" name="table_name" value="contacto">
    <input type="hidden" name="register_size" value=<?php echo $num_reg?>>
    <input type="hidden" name="numbers_list" value=<?php echo $numeros_str?>>
    <input type="hidden" name="url" value="consult_mensajes.php">
    <button type="submit" onclick="validateForm()">Eliminar</button>
  </form>
  





  

</body>
</html>