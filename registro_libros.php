<?php

    session_start();
    include 'Conexiones.php';

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $Correo = $_POST["Correo"];
    $username = $_POST["username"];


    $query = "INSERT INTO usuarios(nombre,apellidos,telefono,correo,nombre_usuario,contrasena,contrasena2,NumeroSS) VALUES ('$nombre','$apellido','$telefono','$Correo','$username','$password','$password2','$NumeroSS')";

?>