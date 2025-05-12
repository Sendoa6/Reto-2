<?php
// Establece la conexión a la base de datos MySQL.
// Parámetros: servidor (localhost), usuario (root), contraseña (vacía), nombre de la base de datos (login_register_db)
$conn = mysqli_connect("localhost", "root", "", "login_register_db");

// Verifica si el archivo 'libros.xml' existe en el servidor
if (file_exists('libros.xml')) {
    // Carga el archivo XML y lo interpreta como un objeto SimpleXMLElement
    $xml = simplexml_load_file("libros.xml");

    // Itera por cada elemento hijo del XML (presumiblemente, cada <libro>)
    foreach ($xml->children() as $libros) {
        // Extrae los valores de cada subelemento dentro de <libro>
        $titulo = $libros->titulo;
        $isbn = $libros->isbn;
        $numero_copias = $libros->numero_copias;
        $genero = $libros->genero;
        $imagen_url = $libros->imagen_url;

        // Crea una consulta SQL para insertar los datos extraídos en la tabla 'libros'
        // Si ya existe un registro con la misma clave primaria (presumiblemente el ISBN),
        // entonces actualiza los campos correspondientes
        $sql = "INSERT INTO libros (titulo, isbn, numero_copias, genero, imagen_url) 
                VALUES ('$titulo', '$isbn', '$numero_copias', '$genero', '$imagen_url')
                ON DUPLICATE KEY UPDATE 
                titulo='$titulo', numero_copias='$numero_copias', genero='$genero', imagen_url='$imagen_url'";

        // Ejecuta la consulta SQL en la base de datos
        $result = mysqli_query($conn, $sql);

        // Si ocurre un error al ejecutar la consulta, se muestra un mensaje con el error
        if (!$result) {
            echo "Error al insertar: " . mysqli_error($conn) . "<br>";
        }
    }

    // Cierra la conexión con la base de datos
    mysqli_close($conn);

    // Muestra un mensaje de éxito al usuario
    echo "<h2>Información insertada o actualizada correctamente en la tabla LIBROS</h2>";
} else {
    // Si el archivo XML no existe, muestra un mensaje de error
    echo "No se ha encontrado el documento";
}
?>
