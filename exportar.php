<?php
$conn = mysqli_connect("localhost", "root", "", "login_register_db");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM libros";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {

    $xml = new SimpleXMLElement('<libros></libros>');

    while($libro = $resultado->fetch_assoc()) {
        $nodo = $xml->addChild('libro');

        $nodo->addChild('titulo', isset($libro['titulo']) ? $libro['titulo'] : '');
        $nodo->addChild('ISBN', isset($libro['ISBN']) ? $libro['ISBN'] : '');
        $nodo->addChild('numero_copias', isset($libro['numero_copias']) ? $libro['numero_copias'] : '');
        $nodo->addChild('genero', isset($libro['genero']) ? $libro['genero'] : '');
        $nodo->addChild('imagen_url', isset($libro['imagen_url']) ? $libro['imagen_url'] : '');
    }

    $archivoXML = 'libros_exportados.xml';

    $xml->asXML($archivoXML);

    echo "Datos exportados correctamente a $archivoXML";
} else {
    echo "No se encontraron libros en la base de datos.";
}

$conn->close();
?>
