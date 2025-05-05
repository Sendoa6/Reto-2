<?php
// Conecta con la base de datos MySQL (servidor, usuario, contraseña, base de datos)
$conn = mysqli_connect("localhost", "root", "", "login_register_db");

// Verifica si hubo un error en la conexión
if ($conn->connect_error) {
    // Si falla la conexión, muestra el mensaje de error y termina la ejecución
    die("Conexión fallida: " . $conn->connect_error);
}

// Define una consulta SQL para seleccionar todos los registros de la tabla 'libros'
$sql = "SELECT * FROM libros";
// Ejecuta la consulta y guarda el resultado
$resultado = $conn->query($sql);

// Verifica si hay registros devueltos
if ($resultado->num_rows > 0) {

    // Crea un nuevo objeto SimpleXMLElement como raíz con el nodo <libros>
    $xml = new SimpleXMLElement('<libros></libros>');

    // Itera sobre cada fila del resultado como un arreglo asociativo
    while($libro = $resultado->fetch_assoc()) {
        // Añade un nuevo nodo <libro> dentro del nodo raíz <libros>
        $nodo = $xml->addChild('libro');

        // Añade los campos como subnodos dentro de <libro>
        // Se usa isset por si acaso algún campo no está presente
        $nodo->addChild('titulo', isset($libro['titulo']) ? $libro['titulo'] : '');
        $nodo->addChild('ISBN', isset($libro['ISBN']) ? $libro['ISBN'] : '');
        $nodo->addChild('numero_copias', isset($libro['numero_copias']) ? $libro['numero_copias'] : '');
        $nodo->addChild('genero', isset($libro['genero']) ? $libro['genero'] : '');
        $nodo->addChild('imagen_url', isset($libro['imagen_url']) ? $libro['imagen_url'] : '');
    }

    // Define el nombre del archivo donde se guardará el XML
    $archivoXML = 'libros_exportados.xml';

    // Guarda el contenido del objeto XML en el archivo especificado
    $xml->asXML($archivoXML);

    // Muestra un mensaje de éxito al usuario
    echo "Datos exportados correctamente a $archivoXML";
} else {
    // Si no se encontraron registros, muestra un mensaje indicándolo
    echo "No se encontraron libros en la base de datos.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
