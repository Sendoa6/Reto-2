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
  <link rel="stylesheet" href="prestamos.css">
  <title>Préstamos</title>
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
      <a class="ventana" href="index.php"> Inicio</a>
      <a class="ventana" href="Conocenos.php"> Conócenos</a>
      <a class="ventana" href="CatalogoDeLibros.php"> Catálogo de Libros</a>
      <a class="ventanaactual" href="Prestamos.php"> Préstamos</a>
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

  <main>
    <h1>Registrar Préstamo</h1>
    <form class="prestamoform" id="prestamoForm" action="registro_prestamos.php" method="post">
      <label for="ID">ID del libro:</label><br>
      <input type="text" id="ID" name="ID" required><br><br>

      <label for="fecha">Fecha de préstamo:</label><br>
      <input type="date" id="fecha" name="fecha" required><br><br>

      <input type="submit" value="Registrar Préstamo">
    </form>

    <details>
      <summary><h1 class="prestamos">Préstamos de Biblioteca</h1></summary>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Incluir la conexión
          include 'conexiones.php';

          // Verificar si la conexión es exitosa
          if (!$conexion) {
              die("Error al conectar a la base de datos: " . mysqli_connect_error());
          }

          // Consulta para obtener los datos de los préstamos
          $query = "SELECT e.ID_ejemplar, l.titulo, a.nombre, a.apellidos FROM ejemplares e INNER JOIN libros l ON e.ID_libro = l.ID_libro INNER JOIN libauto li ON l.ID_libro = li.ID_libro INNER JOIN autores a ON li.ID_autor = a.ID_autor ORDER BY e.ID_ejemplar ASC";



          $result = mysqli_query($conexion, $query);

          // Verificar si hay resultados
          if ($result && mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($row['ID_ejemplar']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['titulo']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['nombre'].$row['apellidos']) . "</td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='3'>No hay préstamos registrados.</td></tr>";
          }

          // Cerrar la conexión
          mysqli_close($conexion);
          ?>
        </tbody>
      </table>
    </details>
  </main>

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
