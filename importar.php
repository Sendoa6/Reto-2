<?php
$conn = mysqli_connect("localhost", "root", "", "login_register_db");

if (file_exists('libros.xml')) {
    $xml = simplexml_load_file("libros.xml");

    foreach ($xml->children() as $libros) {
        $titulo = $libros->titulo;
        $isbn = $libros->isbn;
        $numero_copias = $libros->numero_copias;
        $genero = $libros->genero;
        $imagen_url = $libros->imagen_url;

        $sql = "INSERT INTO libros (titulo, isbn, numero_copias, genero, imagen_url) 
                VALUES ('$titulo', '$isbn', '$numero_copias', '$genero', '$imagen_url')
                ON DUPLICATE KEY UPDATE 
                titulo='$titulo', numero_copias='$numero_copias', genero='$genero', imagen_url='$imagen_url'";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo "Error al insertar: " . mysqli_error($conn) . "<br>";
        }
    }

    mysqli_close($conn);
    echo "<h2>Información insertada o actualizada correctamente en la tabla LIBROS</h2>";
} else {
    echo "No se ha encontrado el documento";
}
?>
