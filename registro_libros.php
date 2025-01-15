<?php

    session_start();
    include 'Conexiones.php';

    $ISBN = $_POST["ISBN"];
    $titulo = $_POST["titulo"];
    $copias = $_POST["copias"];
    $genero = $_POST["genero"];
    $url = $_POST["url"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];



    $query = "INSERT INTO libros(titulo,ISBN,numero_copias,genero,imagen_url) VALUES ('$titulo','$ISBN','$copias','$genero','$url')";
    $query2 = "INSERT INTO autores(nombre,apellidos) VALUES ('$nombre','$apellidos')";


    $ejecutar = mysqli_query($conexion, $query);
    $ejecutar = mysqli_query($conexion, $query2);


    $datos_libros = "SELECT ID_libro FROM libros WHERE ISBN = '$ISBN'";
    $datos_autores = "SELECT ID_autor FROM autores WHERE nombre = '$nombre' AND apellidos = '$apellidos'";

    $execute1 = mysqli_query($conexion, $datos_libros);
    $execute2 = mysqli_query($conexion, $datos_autores);
    
    if ($execute1 && mysqli_num_rows($execute1) > 0) {
        $datos_libros_db = mysqli_fetch_assoc($execute1);
        $ID_libros = $datos_libros_db['ID_libro'];
    }   
    if ($execute2 && mysqli_num_rows($execute2) > 0) {
        $datos_autores_db = mysqli_fetch_assoc($execute2);
        $ID_autores = $datos_autores_db['ID_autor'];
    }  

    $query3 = "INSERT INTO libauto(ID_libro,ID_autor) VALUES ('$ID_libros','$ID_autores')";
    $ejecutar = mysqli_query($conexion, $query3);

    if ($ejecutar){
        echo "<script type='text/javascript'>alert('Libro introducido correctamente a la base de datos');</script>";
        header("Refresh: 0.1; url=index.php");
    }

    mysqli_close($conexion);

?>