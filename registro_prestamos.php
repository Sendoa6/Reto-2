<?php

    include 'Conexiones.php';

    $ID = $_POST["ID"];
    $nombre = $_POST["nombre"];
    $password = $_POST["password"];
    $password = hash('sha512', $password);
    $fecha = $_POST["fecha"];

    $query = "INSERT INTO prestamos(ID,nombre,password,correo,nombre_usuario,contrasena,contrasena2) VALUES ('$nombre','$apellido','$telefono','$Correo','$username','$password','$password2')";
    
    if ($password2 != $password){
        echo "<script type='text/javascript'>alert('Dato Incorrecto');</script>";
        header("Refresh: 0.1; url=RegistroFRM.php");
        exit;
    }
    if (!is_numeric($telefono) && strlen($telefono) != 9){
        echo "<script type='text/javascript'>alert('Dato Incorrecto');</script>";
        header("Refresh: 0.1; url=RegistroFRM.php");
        exit;
    }
    if (strpos($Correo, '@') == false && strpos($Correo, '.') == false) {
        echo "<script type='text/javascript'>alert('Dato Incorrecto');</script>";
        header("Refresh: 0.1; url=RegistroFRM.php");
        exit;
    }


    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre_usuario='$username' ");
    if (mysqli_num_rows($verificar_usuario) > 0){
        echo "<script type='text/javascript'>alert('Este usuario ya está en uso, intenta con uno diferente');</script>";
        header("Refresh: 0.1; url=RegistroFRM.php");
        exit();
    }    
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$Correo' ");
    if (mysqli_num_rows($verificar_correo) > 0){
        echo "<script type='text/javascript'>alert('Este correo ya está en uso, intenta con uno diferente');</script>";
        header("Refresh: 0.1; url=RegistroFRM.php");
        exit();
    }   

    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar){
        echo "<script type='text/javascript'>alert('Usuario creado correctamente');</script>";
        header("Refresh: 0.1; url=index.html");
    }

    mysqli_close($conexion);

?>