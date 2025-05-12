<?php
// Conecta con la base de datos MySQL
$conn = mysqli_connect("localhost", "root", "", "login_register_db");

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL
$sql = "SELECT * FROM libros";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    // Crea el XML
    $xml = new SimpleXMLElement('<catalogo></catalogo>');

    while($libro = $resultado->fetch_assoc()) {
        $nodo = $xml->addChild('libro');
        $nodo->addChild('titulo', isset($libro['titulo']) ? $libro['titulo'] : '');
        $nodo->addChild('ISBN', isset($libro['ISBN']) ? $libro['ISBN'] : '');
        $nodo->addChild('numero_copias', isset($libro['numero_copias']) ? $libro['numero_copias'] : '');
        $nodo->addChild('genero', isset($libro['genero']) ? $libro['genero'] : '');
        $nodo->addChild('imagen_url', isset($libro['imagen_url']) ? $libro['imagen_url'] : '');
    }

    // Configura las cabeceras para descargar el XML
    header('Content-Type: application/xml');
    header('Content-Disposition: attachment; filename="libros_exportados.xml"');
    echo $xml->asXML();
} else {
    // Muestra mensaje si no hay datos
    echo "No se encontraron libros en la base de datos.";
}

// Cierra la conexión
$conn->close();
?>
