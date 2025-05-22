<?php
// Conexión a la base de datos MySQL
$conn = mysqli_connect("localhost", "root", "", "login_register_db");

// Verifica si se ha subido un archivo y no hubo errores al subirlo
if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
    // Guarda la ruta temporal del archivo subido
    $archivoTmp = $_FILES['archivo']['tmp_name'];

    // Intenta cargar el archivo XML
    if ($xml = simplexml_load_file($archivoTmp)) {
        // Recorre cada hijo del nodo raíz del XML (cada <libro>)
        foreach ($xml->children() as $libros) {
            // Obtiene los valores de cada elemento del libro
            $titulo = $libros->titulo;
            $isbn = $libros->isbn;
            $numero_copias = $libros->numero_copias;
            $genero = $libros->genero;
            $imagen_url = $libros->imagen_url;

            // Consulta SQL para insertar o actualizar el libro en la base de datos
            $sql = "INSERT INTO libros (titulo, isbn, numero_copias, genero, imagen_url) 
                    VALUES ('$titulo', '$isbn', '$numero_copias', '$genero', '$imagen_url')
                    ON DUPLICATE KEY UPDATE 
                    titulo='$titulo', numero_copias='$numero_copias', genero='$genero', imagen_url='$imagen_url'";

            // Ejecuta la consulta SQL
            $result = mysqli_query($conn, $sql);

            // Si ocurre un error, lo muestra
            if (!$result) {
                echo "Error al insertar: " . mysqli_error($conn) . "<br>";
            }
        }

        // Cierra la conexión a la base de datos
        mysqli_close($conn);

        // Muestra mensaje de éxito con JavaScript y redirige
        echo "<script>alert('Información insertada o actualizada correctamente en la tabla LIBROS');</script>";
        header("Refresh: 0.1; url=bienvenida.php");
    } else {
        // Si el XML no se pudo cargar, muestra un mensaje de error
        echo "<script>alert('Error al cargar el archivo XML. Asegúrate de que sea válido.');</script>";
        header("Refresh: 0.1; url=bienvenida.php");
    }
} else {
    // Si no se subió ningún archivo o hubo un error en la subida
    echo "<script>alert('No se ha subido ningún archivo o ha ocurrido un error.');</script>";
    header("Refresh: 0.1; url=bienvenida.php");
}
?>
