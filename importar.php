<?php
$conn = mysqli_connect("localhost", "root", "", "login_register_db");

// Verifica si se ha subido un archivo
if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
    // Ruta temporal del archivo subido
    $archivoTmp = $_FILES['archivo']['tmp_name'];

    // Intenta cargar el XML desde el archivo subido
    if ($xml = simplexml_load_file($archivoTmp)) {
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
        echo "<script>alert('Información insertada o actualizada correctamente en la tabla LIBROS');</script>";
        header("Refresh: 0.1; url=bienvenida.php");
    } else {
        echo "<script>alert('Error al cargar el archivo XML. Asegúrate de que sea válido.');</script>";
        header("Refresh: 0.1; url=bienvenida.php");
    }
} else {
    echo "<script>alert('No se ha subido ningún archivo o ha ocurrido un error.');</script>";
    header("Refresh: 0.1; url=bienvenida.php");
}
?>
