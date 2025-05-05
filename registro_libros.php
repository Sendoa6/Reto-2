<?php
    /*Comprobar si la sesión está iniciada*/
    session_start();
    /*Conectar con conexiones*/
    include 'Conexiones.php';

    /*Recoger en variables los datos rellenados en el formulario*/
    $ISBN = $_POST["ISBN"];
    $titulo = $_POST["titulo"];
    $copias = $_POST["copias"];
    $genero = $_POST["genero"];
    $url = $_POST["url"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];


    // Inserts guardados en variables "Query"
    $query = "INSERT INTO libros(titulo,ISBN,numero_copias,genero,imagen_url,fecha_agregado) VALUES ('$titulo','$ISBN','$copias','$genero','$url',CURDATE())";
    $query2 = "INSERT INTO autores(nombre,apellidos) VALUES ('$nombre','$apellidos')";

    //Conexion a la base de datos y ejecución de los inserts 
    $ejecutar = mysqli_query($conexion, $query);
    $ejecutar = mysqli_query($conexion, $query2);

    // Variables para conseguir los id de libros y autores
    $datos_libros = "SELECT ID_libro FROM libros WHERE ISBN = '$ISBN'";
    $datos_autores = "SELECT ID_autor FROM autores WHERE nombre = '$nombre' AND apellidos = '$apellidos'";

    //Conexion a la base de datos y ejecucion de los selects
    $execute1 = mysqli_query($conexion, $datos_libros);
    $execute2 = mysqli_query($conexion, $datos_autores);
    
    //Si funciona el execute1 y hay un registro o mas dentro del execute1...
    if ($execute1 && mysqli_num_rows($execute1) > 0) {
        $datos_libros_db = mysqli_fetch_assoc($execute1); //...se guardan los datos en esta variable...
        $ID_libros = $datos_libros_db['ID_libro']; //...y se obtiene el id_libro a partir de esta
    }   
    //lo mismo con los autores 
    if ($execute2 && mysqli_num_rows($execute2) > 0) {
        $datos_autores_db = mysqli_fetch_assoc($execute2);
        $ID_autores = $datos_autores_db['ID_autor'];
    }  

    //ahora que tenemos los id de libros y autores se inserta con un query en libauto
    $query3 = "INSERT INTO libauto(ID_libro,ID_autor) VALUES ('$ID_libros','$ID_autores')";
    //Conexion a la base de datos y ejecucion de los insert
    $ejecutar = mysqli_query($conexion, $query3);

    $query4 = "INSERT INTO ejemplares(estado_fisico,ID_libro) VALUES ('Buen estado','$ID_libros')";
    $ejecutar = mysqli_query($conexion, $query4);

    //Si se ha ejecutado correctamente muestra un mensaje 
    if ($ejecutar){
        echo "<script type='text/javascript'>alert('Libro introducido correctamente a la base de datos');</script>";
        header("Refresh: 0.1; url=index.php");
    }

    //Cerrar la base de datos
    mysqli_close($conexion);

?>