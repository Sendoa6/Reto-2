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
  <title>Sobre Nosotros</title>
  <link rel="icon" href="media/muskizlogo.png" type="image/x-icon">
  <link rel="stylesheet" href="estilosconocenos.css">
</head>
<body> 
    <header>
        <nav>
          <img class="logo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgwIRrFipHhzib2ULMT65_BOWt4EEIxC5SIg&s" alt="Logo ayuntamiento muskiz" height="85" width="85">
          <ul id="uno">
            <li>Biblioteca Municipal de Muskiz</li>
            <li>Muskizko Udal Liburutegia</li>
          </ul>
        </nav>
        <nav  class="ventanas">
          <a class="ventana" href="index.php"> Inicio</a>
          <a class="ventanaactual" href="Conocenos.php"> Conocenos</a>
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

  <div class="cuerpo">
    <div class="cuerpo2">
      <h1> Sobre nosotros </h1>

      <div class="grid-container">
        <!-- Primer elemento con imagen y detalles -->
        <div class="grid-item">
            <details>
                <summary>Sobre Nosotros</summary>
                <br><p>Somos un grupo de cinco jóvenes desarrolladores web, unidos por una visión común: crear 
                  experiencias digitales funcionales, innovadoras y efectivas.</p>
                  
                  <p>Nos caracteriza el entusiasmo y las ganas de aprender constantemente para adaptarnos a las 
                  nuevas tecnologías y necesidades del mercado. Creemos en el trabajo en equipo, en la creatividad, 
                  y en la importancia de construir soluciones centradas en el usuario. Estamos aquí para ayudarte a 
                  llevar tu idea al siguiente nivel. ¡Construyamos juntos!</p>
            </details>
            <br>
            <img src="https://i.pinimg.com/originals/69/02/ae/6902ae40734b1e2aed5ebb7e03f45cd0.jpg" alt="Nosotros" width="300">
        </div>

        <!-- Segundo elemento con imagen y detalles -->
        <div class="grid-item">
            <details>
                <summary>Sobre ALT+F4</summary>
                <br><p>ALT+F4 surgio en clase, mientras los cinco integrantes del grupo, Ane, Mikel, Sendoa, Marcos y Julen 
                  cursabamos Desarrollo de Aplicaciones Web en CF Somorrostro. Cuando el profesor nos junto a los cinco 
                  por primera vez apenas nos conociamos, pero enseguida vimos que nuestra union tenia mucho potencial 
                  ya que teniamos tanto las ideas como la capacidad para llevar a cabo casi cualquier proyecto que se 
                  nos pudiera cruzar, por eso cuando terminamos el grado seguimos trbajando juntos y creamos ALT+F4, 
                  empresa de soluciones tecnilogicas para pequeñas empresas.</p>
            </details>
            <br>
            <img src="media/logoALTF4.png" alt="logoALTF4" width="300">
        </div>

        <!-- Tercer elemento con imagen y detalles -->
        <div class="grid-item">
            <details>
                <summary>Sobre Muskiz</summary>
                <br><p>Muskiz es un municipio en la comarca de Encartaciones, en Bizkaia, rodeado de naturaleza y 
                  con una rica historia que combina tradiciones vascas y patrimonio industrial. Conocido por sus 
                  paisajes verdes y su cercanía a la costa, Muskiz es un lugar ideal para disfrutar tanto de la 
                  tranquilidad como de la cultura.</p>

                  <p>La Biblioteca Municipal de Muskiz es un espacio, diseñado para fomentar la 
                  lectura y el aprendizaje entre personas de todas las edades. Con una amplia colección de libros, 
                  revistas y material multimedia, la biblioteca también organiza actividades como talleres, 
                  cuentacuentos y clubes de lectura, creando un punto de encuentro cultural para la comunidad.</p>
            </details>
            <br>
            <img src="media/muskizlogo.png" alt="logomuskiz" width="200">
        </div>

        <!-- Cuarto elemento con imagen y detalles -->
        <div class="grid-item">
            <details>
                <summary>Sobre CF Somorrostro</summary>
                <br><p>El Centro de Formación Somorrostro, ubicado en Muskiz, es una institución educativa de 
                  referencia en Bizkaia, reconocida por su compromiso con la formación técnica y profesional de calidad.
                  Ofrece una amplia variedad de programas de Formación Profesional, en áreas como industria, energía, 
                  tecnología y servicios, adaptándose a las demandas del mercado laboral actual. Con modernas 
                  instalaciones y un enfoque práctico, el centro se dedica a preparar a sus estudiantes para el futuro, 
                  impulsando su desarrollo personal y profesional.</p>
            </details>
            <br>
            <img src="https://www.somorrostro.com/wp-content/uploads/2021/11/somo-2019-cuadrado.jpg" alt="imagenSomo" width="300">
        </div>
      </div>
    </div>
  </div>
<footer>
  <p>&copy; 2024 Muskizko Liburutegia. Todos los derechos reservados.</p>
  <p>
    <a href="https://facebook.com" target="_blank">Facebook</a> |
    <a href="https://twitter.com/bibmus" target="_blank">Twitter</a> |
    <a href="https://instagram.com/bibmus" target="_blank">Instagram</a>
  </p>
  <p>
    <a href="https://maps.app.goo.gl/edZ15iYRnLJY2kUx6" target="_blank">📍🌍Localización y horarios</a>|
    <a href="mailto:bibmus@gmail.com">Contáctanos</a>
  </p>
</footer>
</body>
</html>