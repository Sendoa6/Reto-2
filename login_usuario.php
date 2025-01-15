<?php
session_start();

include 'Conexiones.php';

// Recibir los datos del formulario y limpiarlos
$username_login = mysqli_real_escape_string($conexion, $_POST['username_login']);
$password_login = mysqli_real_escape_string($conexion, $_POST['password_login']);
$password_login = hash('sha512', $password_login); // Asegúrate de que coincida con lo almacenado en la base de datos

// Consulta para validar el login y obtener datos del usuario, incluido el NumeroSS
$query = "SELECT ID_usuario, nombre_usuario, NumeroSS FROM usuarios WHERE nombre_usuario = '$username_login' AND contrasena = '$password_login' LIMIT 1";
$datos_usuario = "SELECT * FROM usuarios WHERE ID_usuario = $id_usuario";

$result = mysqli_query($conexion, $query);
$datos = mysqli_query($conexion, $datos_usuario);

if ($datos && mysqli_num_rows($datos) > 0) {
    $datos_usuarioo = mysqli_fetch_assoc($datos);
    $_SESSION['nombre'] = $datos_usuario['nombre'];
    $_SESSION['apellidos'] = $datos_usuario['apellidos'];
    $_SESSION['telefono'] = $datos_usuario['telefono']; 
    $_SESSION['correo'] = $datos_usuario['correo'];
}

// Verificar si el usuario existe
if ($result && mysqli_num_rows($result) > 0) {
    $datos_usuario = mysqli_fetch_assoc($result);
    
    // Guardar datos del usuario en la sesión
    $_SESSION['usuario'] = $datos_usuario['nombre_usuario'];
    $_SESSION['ID_usuario'] = $datos_usuario['ID_usuario'];
    $_SESSION['NumeroSS'] = $datos_usuario['NumeroSS'];

    
    // Verificar si el usuario tiene un Número de Seguridad Social válido
    if (!empty($datos_usuario['NumeroSS']) && $datos_usuario['NumeroSS'] !== 'NULL') {
        $_SESSION['empleado'] = true;
    } else {
        $_SESSION['empleado'] = false;
    }

    // Redirigir a la página de bienvenida
    header("location: bienvenida.php");
    exit();
} else {
    // Si el usuario no existe o la contraseña es incorrecta
    echo "<script type='text/javascript'>
        alert('Usuario o contraseña incorrectos. Intenta de nuevo.');
        window.location.href = 'Formulario1.php';
    </script>";
    exit();
}
?>
