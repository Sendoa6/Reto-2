<?php
header('Content-Type: application/rss+xml; charset=UTF-8');

// Incluir la conexión a la base de datos
include('conexiones.php'); // Asegúrate de que la ruta sea correcta

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<rss version="2.0">
  <channel>
    <title>Novedades – Biblioteca</title>
    <link>https://www.tubiblioteca.com</link>
    <description>Últimos libros añadidos a la colección</description>
    <language>es-ES</language>

    <?php
    try {
        // Usamos la conexión desde conexiones.php
        $stmt = $pdo->query("SELECT titulo, genero, imagen_url, fecha_agregado FROM libros ORDER BY fecha_agregado DESC LIMIT 10");

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $titulo = htmlspecialchars($row['titulo'], ENT_XML1);
            $genero = htmlspecialchars($row['genero'], ENT_XML1);
            $imagen = htmlspecialchars($row['imagen_url'], ENT_XML1);
            $fecha = date(DATE_RSS, strtotime($row['fecha_agregado']));
            $link = $imagen ?: 'https://www.tubiblioteca.com'; // usar la imagen como enlace o poner uno genérico

            echo "
    <item>
      <title>$titulo</title>
      <link>$link</link>
      <description>Género: $genero</description>
      <pubDate>$fecha</pubDate>
      <guid>$link</guid>
    </item>";
        }
    } catch (PDOException $e) {
        echo "<!-- Error de conexión: " . $e->getMessage() . " -->";
    }
    ?>
  </channel>
</rss>
