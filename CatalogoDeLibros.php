<?php
session_start();
include 'Conexiones.php';
$foto_perfil = 'ruta/a/imagen/por/defecto.jpg';

if (isset($_SESSION['ID_usuario'])) {
    $ID_usuario = $_SESSION['ID_usuario'];

    $sql = "SELECT foto_perfil FROM usuarios WHERE ID_usuario = ?";
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $ID_usuario);
        $stmt->execute();
        $stmt->bind_result($foto_perfil);

        if ($stmt->fetch()) {
        } else {
            $foto_perfil = 'ruta/a/imagen/por/defecto.jpg';
        }

        $stmt->close();
    } else {
        $foto_perfil = 'ruta/a/imagen/por/defecto.jpg';
    }

    $conexion->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media\muskizlogo.png" type="image/x-icon">
    <title>Catalogo</title>
    <link rel="stylesheet" href="CatalogoDeLibros.css">
</head>
<body> 
    <!-- Encabezado -->
    <header>
        <nav class="libreria">
            <img class="logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgwIRrFipHhzib2ULMT65_BOWt4EEIxC5SIg&s" alt="Logo ayuntamiento muskiz" height="85" width="85">
            <ul id="uno">
                <li>Biblioteca Municipal de Muskiz</li>
                <li>Muskizko Udal Liburutegia</li>
            </ul>
        </nav>
        <nav class="ventanas">
            <a class="ventana" href="index.php">Inicio</a>
            <a class="ventana" href="Conocenos.php">Conocenos</a>
            <a class="ventanaactual" href="CatalogoDeLibros.php">Catalogo de Libros</a>
            <a class="ventana" href="Prestamos.php">Prestamos</a>
            <a class="ventana" href="juego.php">Juegos</a>
            <?php
      if (!isset($_SESSION['usuario'])) {
      echo '<a class="ventana" href="Formulario1.php">Iniciar Sesión</a>';
      }
      ?>
            <?php //Codigo PHP
            if ($_SESSION==TRUE) {
        
        echo '<form action="bienvenida.php" method="post">';
        echo '<a class="perfil" href="bienvenida.php">';
        echo '<img class="imgperfil" src="' . htmlspecialchars($foto_perfil) . '" alt="Foto de perfil">';
        echo '</a>';
        echo '</form>';
       }
        ?>
        </nav>
    </header>
    <div class="cuerpo">
        <h1>Nuestro catálogo</h1>
        <br>
        <div class="tabs">
        <?php
            include 'Conexiones.php';

            // Verificar la conexión
            if (!$conexion) {
                die("Error de conexión a la base de datos: " . mysqli_connect_error());
            }

            // Consulta para obtener los libros con sus géneros, autores e imágenes
            $sql = "SELECT libros.titulo, autores.nombre AS Autor_Nombre, autores.apellidos AS Autor_Apellidos, libros.imagen_url, libros.genero FROM libros INNER JOIN libauto ON libros.ID_libro = libauto.ID_libro INNER JOIN autores ON libauto.ID_autor = autores.ID_autor ORDER BY libros.genero";


            // Ejecutar la consulta
            $resultado = mysqli_query($conexion, $sql);

            if (!$resultado) {
                die("Error en la consulta: " . mysqli_error($conexion));
            }

            // Organizar los libros por género
            $generos = [];
            while ($libro = mysqli_fetch_assoc($resultado)) {
                $generos[$libro['genero']][] = $libro;
            }


            $contador = 1;  // Inicia el contador en 1

            foreach ($generos as $genero => $librosPorGenero) {
                echo "<h2>" . htmlspecialchars($genero) . "</h2>";
                echo '<input type="radio" id="tab'.$contador.'" name="tab">';
                echo '<label for="tab' .$contador. '" class="tab-label">Ver ' . htmlspecialchars($genero) . '</label>';
                echo '<div class="tab-content" id="content'.$contador.'">';
                echo '<ul>';
                
                foreach ($librosPorGenero as $libro) {
                    echo '<li>';
                    echo '<p><strong>Título:</strong> ' . htmlspecialchars($libro['titulo']) . '</p>';
                    echo '<p><strong>Autor:</strong> ' . htmlspecialchars($libro['Autor_Nombre']) . ' ' . htmlspecialchars($libro['Autor_Apellidos']) . '</p>';
                    echo '<img src="' . htmlspecialchars($libro['imagen_url']) . '" alt="' . htmlspecialchars($libro['titulo']) . '" width="40%">';
                    echo '</li>';
                }
                echo '</ul>';
                echo '</div>';
                $contador++;  // Aumenta el contador
            }


            // Cerrar la conexión
            mysqli_close($conexion);
        ?>
        </div>
        <br>
    </div>
    <footer>
        <p>&copy; 2024 Muskizko Liburutegia. Todos los derechos reservados.</p>
        <p>
            <a href="https://facebook.com" target="_blank">Facebook</a> |
            <a href="https://twitter.com" target="_blank">Twitter</a> |
            <a href="https://instagram.com" target="_blank">Instagram</a>
        </p>
        <p>
            <a href="https://maps.app.goo.gl/edZ15iYRnLJY2kUx6" target="_blank">📍🌍Localización y horarios</a> |
            <a href="mailto:contacto@misitioweb.com">Contáctanos</a>
        </p>
    </footer>
</body>
</html>
