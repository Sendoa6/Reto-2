<?php

    session_start();
    if(!isset($_SESSION['empleado'])){
        echo "<script type='text/javascript'>  window.location = 'Formulario1.php'; </script>";
        session_destroy();
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Libros</title>
    <link rel="icon" href="media\muskizlogo.png" type="image/x-icon">
    <link rel="stylesheet" href="RegistroLibros.css">
</head>
<body>
    <header>
        <nav class="header-1">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgwIRrFipHhzib2ULMT65_BOWt4EEIxC5SIg&s" alt="Logo ayuntamiento muskiz" height="85" width="85">
          <ul id="uno">
            <li><b>Biblioteca Municipal de Muskiz</b></li>
            <li><b>Muskizko Udal Liburutegia</b></li>
          </ul>
        </nav>
        <nav>
          <a class="ventana" href="index.php"> Inicio</a>
          <a class="ventana" href="Conocenos.html"> Conocenos</a>
          <a class="ventana" href="CatalogoDeLibros.php"> Catalogo de Libros</a>
          <a class="ventana" href="Prestamos.php"> Prestamos</a>
          <a class="ventana" href="Formulario1.php"> Iniciar Sesion</a>
          <form action="bienvenida.php" method="post">
            <a class=perfil href="bienvenida.php"><img class="imgperfil" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeVg9KLX4bqxbJvgDoC8zXQGIWrrb1fcPsYQ&s" 
            alt="img"></a>
          </form>
       </nav>
    </header>
    <div class="cuerpo">
      <br>
      <h1>Regitrar libros al catálogo</h1>
      <br>

      <form class="registrolibro" id="RegistarLibro" action="registro_libros.php" method="post">
          <label for="ISBN">ISBN del libro:</label><br>
          <input type="text" id="ISBN" name="ISBN" required><br><br>
            
          <label for="titulo">Título del libro:</label><br>
          <input type="text" id="titulo" name="titulo" required><br><br>

          <label for="copias">Número de copias:</label><br>
          <input type="text" id="copias" name="copias" required><br><br>

          <label for="genero">Género del libro:</label><br>
          <select id="genero" name="genero" required>
            <option value="" disabled selected>Seleccione un género</option>
            <option value="fantasia">Fantasía</option>
            <option value="Drama">Drama</option>
            <option value="Terror">Terror</option>
            <option value="romance">Romance</option>
            <option value="biografia">Biografía</option>
            <option value="ingles">Ingles</option>
            <option value="infantil">Infantil</option>
            <option value="autoayuda">Autoayuda</option>
          </select><br><br>

          <label for="url">Url de imagen del libro:</label><br>
          <input type="text" id="url" name="url" required><br><br>
            
          <input type="submit" value="Registrar libro">
      </form>
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
          <a href="https://maps.app.goo.gl/edZ15iYRnLJY2kUx6" target="_blank">📍🌍Localización y horarios</a>|
          <a href="mailto:contacto@misitioweb.com">Contáctanos</a>
        </p>
    </footer>
</body>
</html>