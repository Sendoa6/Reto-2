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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JUEGO DE MEMORIA</title>
  <link rel="stylesheet" href="juego.css">
</head>
<body>
<header>
    <nav class="header-1">
      <img class="logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgwIRrFipHhzib2ULMT65_BOWt4EEIxC5SIg&s" alt="Logo ayuntamiento muskiz" height="85" width="85">
      <ul id="uno">
        <li><b>Biblioteca Municipal de Muskiz</b></li>
        <li><b>Muskizko Udal Liburutegia</b></li> 
      </ul>
    </nav>
    <nav class="ventanas">
      <a class="ventanaactual" href="index.php"> Inicio</a>
      <a class="ventana" href="Conocenos.php"> Conocenos</a>
      <a class="ventana" href="CatalogoDeLibros.php"> Catalogo de Libros</a>
      <a class="ventana" href="Prestamos.php"> Prestamos</a>
      <a class="ventana" href="juego.php">Juegos</a>
      <?php
      if (!isset($_SESSION['usuario'])) {
      echo '<a class="ventana" href="Formulario1.php">Iniciar Sesión</a>';
      }
      ?>
     <?php
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
  <div class ="cuerpo">
  <h1>JUEGO DE MEMORIA</h1>
  <div id="game-board" class="game-board"></div>
  <script src="juego.js"></script>
  </div>
  <footer>
    <p>&copy; 2024 Muskizko Liburutegia. Todos los derechos reservados.</p>
    <p>
      <a href="https://facebook.com" target="_blank">Facebook</a> |
      <a href="https://twitter.com" target="_blank">Twitter</a> |
      <a href="https://instagram.com" target="_blank">Instagram</a>
    </p>
    <p>
      <a href="https://maps.app.goo.gl/edZ15iYRnLJY2kUx6" target="_blank">📍🌍Localización y horarios</a>|
      <a href="mailto:contacto@misitioweb.com">Contáctanos</a>
    </p>
  </footer>
</body>
</html>
