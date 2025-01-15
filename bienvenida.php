<?php

    session_start();
    if(!isset($_SESSION['usuario'])){
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
      <a href="index.php"> Inicio</a>
      <a href="Conocenos.html"> Conocenos</a>
      <a href="CatalogoDeLibros.php"> Catalogo de Libros</a>
      <a href="Prestamos.php"> Prestamos</a>
      <a href="Formulario1.php"> Iniciar Sesion</a>
      <form action="bienvenida.php" method="post">
      <a class=perfil href="bienvenida.php"><img class="imgperfil" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeVg9KLX4bqxbJvgDoC8zXQGIWrrb1fcPsYQ&s" 
      alt="img"></a>
   </form>
   </nav>
  </header>

  <h1> MI PERFIL</h1>
  <br>
  <div class="cajaperfil">
  <img class="imgperfil2" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeVg9KLX4bqxbJvgDoC8zXQGIWrrb1fcPsYQ&s" 
  alt="img"></a>
  <a href="">Cambiar icono</a>
  </div>
  <div>
    <?php 
    echo "Usuario: " .(string)$_SESSION['usuario'] . "<br>";
    echo "ID Usuario: " .$_SESSION['ID_usuario'] . "<br>";
    echo "Nombre: " . (string)$_SESSION['nombre'] . "<br>";
    echo "Apellido: " .(string)$_SESSION['apellidos'] . "<br>";
    echo "Telefono: ". $_SESSION['telefono'] . "<br>";
    echo "Corre Electronico: ". (string)$_SESSION['correo'] . "<br>";
    echo "NumeroSS: ". $_SESSION['NumeroSS'] . "<br>";

    print_r($_SESSION);

    ?>
  </div>
    <br>
    <br>
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