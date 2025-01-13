<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        echo "<script type='text/javascript'>alert('Por favor debes de iniciar sesion'); window.location = 'index.php'; </script>";
        session_destroy();
        die();
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
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgwIRrFipHhzib2ULMT65_BOWt4EEIxC5SIg&s" alt="Logo ayuntamiento muskiz" height="85" width="85">
      <ul id="uno">
        <li><b>Biblioteca Municipal de Muskiz</b></li>
        <li><b>Muskizko Udal Liburutegia</b></li>
      </ul>
    </nav>
    <nav>
      <a href="index.php"> Inicio</a>
      <a href="Conocenos.html"> Conocenos</a>
      <a href="CatalogoDeLibros.html"> Catalogo de Libros</a>
      <a href="Prestamos.php"> Prestamos</a>
      <a href="Formulario1.php"> Iniciar Sesion</a>
   </nav>
   <form action="miPerfil.php" method="post">
       <a class=perfil href="miPerfil.php">Mi perfil</a>
   </form>
 
  </header>
  <h1> MI PERFIL</h1>
    <a href="cerrar_sesion.php">Cerrar sesión</a>
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