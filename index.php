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
  <link rel="icon" href="media/muskizlogo.png" type="image/x-icon">
  <title>Inicio</title>
  <link rel="stylesheet" href="EstilosIndex.css">
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
      <a class="ventana" href="Formulario1.php"> Iniciar Sesion</a>
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

  <div class="cuerpo">
    <main>
    <div class="bienvenidos">
      <img class="imagenbiblio" id="bibliotecamuskiz" src="media/UdaletxeaII.jpeg" alt="Biblioteca Municipal de Muskiz">
      <img class="imagenbiblio2" id="ayuntamientomuskiz" src="media/Ayuntamiento2.jpg" alt="Ayuntamiento de Muskiz">
      <br>
      <h2>BIENVENIDOS A LA BIBLIOTECA DE MUSKIZ</h2>
      <p id="txtbienvenida">
        Descubre un mundo de conocimiento, inspiración y aprendizaje en la Biblioteca de Muskiz. Aquí encontrarás una amplia colección de libros y recursos digitales 
        para todas las edades. Nuestro objetivo es ofrecerte un espacio abierto y accesible donde puedas disfrutar de la lectura, la investigación y la cultura. Explora nuestras 
        secciones y consulta el catálogo en línea. <b>¡Te invitamos a formar parte de esta experiencia literaria y educativa en Muskiz!</b>
      </p>
    </div>
    <h3 id="titlrecomendaciones">Nuestras Recomendaciones</h3>
      <table>
        <caption class="txtrecomendacion"><u>Infantil y Juvenil</u></caption>
          <tr>
            <td><a href="CatalogoDeLibros.php"><img class="geronimo" src="media/Geronimo_Stilton.jpg" alt="Geronimo_Stilton" height="400" width="400"></a></td>
            <td><a href="CatalogoDeLibros.php"><img class="calzoncillos" src="media/Capitan_Calzoncillos.jpeg" alt="Capitan capitan-calzoncillos" height="400" width="400"></a></td>
            <td><a href="CatalogoDeLibros.php"><img class="diariogreg" src="media/Diario_de_Greg.jpg" alt="Diario de Greg" height="400" width="400"></a></td>
          </tr>
          <tr>
            <td class="titllibros">Geronimo Stilton</td>
            <td class="titllibros">Capitan Calzoncillos</td>
            <td class="titllibros">Diario de Greg</td>
          </tr>
      </table>
      <table>
        <caption class="txtrecomendacion"><u>Adultos</u></caption>
          <tr>
            <td><a href="CatalogoDeLibros.php"><img class="mistborn" src="media/Mistborn.jpeg" alt="Mistborn" height="400" width="400"></a></td>
            <td><a href="CatalogoDeLibros.php"><img class="juegodetronos" src="media/JuegoDeTronos.jpg" alt="Game of Thrones" height="400" width="400"></a></td>
            <td><a href="CatalogoDeLibros.php"><img class="anillos" src="media/El_Señor_de_Los_Anillos.jpg" alt="El señor de los anillos" height="400" width="400"></a></td>
          </tr>
          <tr>
            <td class="titllibros">Mistborn</td>
            <td class="titllibros">Juego de Tronos</td>
            <td class="titllibros">El Señor de Los Anillos</td>
          </tr>
      </table>
    </main>
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