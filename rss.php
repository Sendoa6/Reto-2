<?php
header('Content-Type: application/rss+xml; charset=UTF-8');
include('conexiones.php'); // Asegúrate de que $pdo esté definido aquí

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
        $stmt = $pdo->query("SELECT titulo, genero, imagen_url, fecha_agregado FROM libros ORDER BY fecha_agregado DESC LIMIT 10");

        while ($row = $stmt->fetch()) {
            $titulo = htmlspecialchars($row['titulo'], ENT_XML1, 'UTF-8');
            $genero = htmlspecialchars($row['genero'], ENT_XML1, 'UTF-8');
            $imagen = htmlspecialchars($row['imagen_url'], ENT_XML1, 'UTF-8');
            $fecha = date(DATE_RSS, strtotime($row['fecha_agregado']));
            $link = "http://localhost:3000/libro.php?titulo=" . urlencode($row['titulo']);
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
