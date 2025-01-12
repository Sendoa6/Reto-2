<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        echo "<script type='text/javascript'>alert('Por favor debes de iniciar sesion'); window.location = 'index.html'; </script>";
        session_destroy();
        die();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
</head>
<body>
    <h1> Has iniciado sesion</h1>
    <a href="cerrar_sesion.php">Cerrar sesión</a>
</body>
</html>