<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexiones</title>
</head>
<body>
<?php
$host = 'localhost'; // Cambia según tu servidor
$dbname = 'mi_base_datos';
$user = 'root'; // Usuario de tu base de datos
$password = ''; // Contraseña del usuario

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>

</body>
</html>