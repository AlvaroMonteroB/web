<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    require 'conection.php';
    $nombre=$_POST["nombre"];
    $email=$_POST["email"];
    $mensaje=$_POST["mensaje"];

    $query="INSERT INTO contacto (nombre,email,mensaje) values ('$nombre','$email','$mensaje') ";
    if(mysqli_query($conexion,$query)){
        
    }else{
        mysqli_error($conexion);
    }
    mysqli_close($conexion);
    header("Location: contacto.html");
    exit();

}



?>