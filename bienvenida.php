<?php
    session_start();
    include 'Conexiones.php';
    if (!isset($_SESSION['usuario'])) {
        session_destroy();
        header("Location: Formulario1.php");
        exit();
    }
    
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
    <link rel="stylesheet" href="EstilosBienvenida.css">
    <title>Bienvenida</title>
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
    <nav>
    <a class="ventana" href="index.php">Inicio</a>
    <a class="ventana" href="Conocenos.php">Conocenos</a>
    <a class="ventana" href="CatalogoDeLibros.php">Catalogo de Libros</a>
    <a class="ventana" href="Prestamos.php">Prestamos</a>
    <a class="ventana" href="juego.php">Juegos</a>
    <?php
      if (!isset($_SESSION['usuario'])) {
      echo '<a class="ventanaactual" href="Formulario1.php">Iniciar Sesión</a>';
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

    <?php if (!isset($_SESSION['usuario'])): ?>
        <a href="Formulario1.php">Iniciar Sesion</a>
    <?php else: ?>
    <?php endif; ?>
</nav>  
  </header>
<div class="cuerpo">
  <h1> MI PERFIL</h1>
  <br>
  <div class="cajaperfil">
    <img class="imgperfil2" src="<?php echo htmlspecialchars($foto_perfil); ?>" alt="Foto de perfil">
    <a href="CambioFoto.html">Cambiar foto</a><br><br><br><br>
  </div>
  <div class="botonesempleados">
    <?php
      if ($_SESSION['empleado']){
        echo'<a class="empleadoslink" href="devolver_prestamos.php">Devolver Prestamos</a>';
        echo'<a class="empleadoslink" href="RegistroLibros.php">Registrar libros</a>';
      }
      ?>
    </div>
  <div class="cajadatos">
    <?php
    if ($_SESSION['empleado']==TRUE) {
      echo "<p>EMPLEADO </p><br>";
    }else{
      echo "<p>NO EMPLEADO </p><br>";
    }
    echo "<p>Usuario: " .(string)$_SESSION['usuario'] . "</p><br>";
    echo "<p>ID Usuario: " .$_SESSION['ID_usuario'] . "</p><br>";
    echo "<p>Nombre: " . (string)$_SESSION['nombre'] . "</p><br>";
    echo "<p>Apellido: " .(string)$_SESSION['apellidos'] . "</p><br>";
    echo "<p>Telefono: ". $_SESSION['telefono'] . "</p><br>";
    echo "<p>Corre Electronico: ". (string)$_SESSION['correo'] . "</p><br>";
    echo "<p>NumeroSS: ". $_SESSION['NumeroSS'] . "</p><br>";
    ?>
    <a href="cerrar_sesion.php"><p>Cerrar sesión</p></a>
  </div>
  <details>
      <summary><h1 class="prestamos">Préstamos actuales de mi perfil</h1></summary>
      <table>
        <thead>
          <t>
            <th>ID_prestamo</th>
            <th>Titulo del libro</th>
            <th>Fecha del Prestamo</th>
            <th>Fecha Limite del prestamo</th>
          </t>
        </thead>
        <body>
          <?php
          // Incluir la conexión
          include 'conexiones.php';

          // Verificar si la conexión es exitosa
          if (!$conexion) {
              die("Error al conectar a la base de datos: " . mysqli_connect_error());
          }

          // Consulta para obtener los datos de los préstamos
          $query = "SELECT p.ID_prestamo, l.titulo, p.fecha_prestamo, p.fecha_limite FROM prestamos p INNER JOIN ejemplares e ON e.ID_ejemplar = p.ID_ejemplar INNER JOIN libros l ON l.ID_libro = e.ID_libro WHERE p.ID_usuario = '$ID_usuario' ORDER BY p.ID_prestamo ASC";


          $result = mysqli_query($conexion, $query);

          // Verificar si hay resultados
          if ($result && mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($row['ID_prestamo']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['titulo']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['fecha_prestamo']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['fecha_limite']) . "</td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='4'>No hay préstamos registrados.</td></tr>";
          }

          // Cerrar la conexión
          mysqli_close($conexion);
          ?>
        </body>
      </table>
    </details>
    <br>
    <br>
</div>
    <footer>
    <p class="footer">&copy; 2024 Muskizko Liburutegia. Todos los derechos reservados.</p>
    <p class="footer">
      <a href="https://facebook.com" target="_blank">Facebook</a> |
      <a href="https://twitter.com" target="_blank">Twitter</a> |
      <a href="https://instagram.com" target="_blank">Instagram</a>
    </p>
    <p class="footer">
      <a href="https://maps.app.goo.gl/edZ15iYRnLJY2kUx6" target="_blank">📍🌍Localización y horarios</a>|
      <a href="mailto:contacto@misitioweb.com">Contáctanos</a>
    </p>
  </footer>
</body>
</html>