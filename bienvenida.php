<?php
    session_start();
    
    if (!isset($_SESSION['usuario'])) {
        session_destroy(); // Destruir cualquier sesión residual
        header("Location: Formulario1.php"); // Redirigir al formulario de inicio de sesión
        exit();
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
    <a href="index.php">Inicio</a>
    <a href="Conocenos.html">Conocenos</a>
    <a href="CatalogoDeLibros.php">Catalogo de Libros</a>
    <a href="Prestamos.php">Prestamos</a>

    <?php if (!isset($_SESSION['usuario'])): ?>
        <a href="Formulario1.php">Iniciar Sesion</a>
    <?php else: ?>
        <form action="bienvenida.php" method="post">
        <a class="perfil" href="bienvenida.php">
          <img class="imgperfil" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeVg9KLX4bqxbJvgDoC8zXQGIWrrb1fcPsYQ&s" alt="Perfil">
        </a>
      </form>
    <?php endif; ?>
</nav>
  </header>

  <h1> MI PERFIL</h1>
  <br>
  <div class="cajaperfil">
  <img class="imgperfil2" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeVg9KLX4bqxbJvgDoC8zXQGIWrrb1fcPsYQ&s"
  alt="img"></a> 
  <a href="CambioFoto.html">Cambiar foto</a><br><br><br><br>
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
    <br>
    <br>
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