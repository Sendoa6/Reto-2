<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "usuario", "contraseña", "base_datos");

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se envió una foto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['foto'])) {
    $id_usuario = 1; // ID del usuario actual (puedes obtenerlo de una sesión)
    $foto_seleccionada = $_POST['foto']; // URL de la foto seleccionada

    // Actualizar la columna foto_perfil en la base de datos
    $sql = "UPDATE usuarios SET foto_perfil = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $foto_seleccionada, $id_usuario);

    if ($stmt->execute()) {
        echo "¡Foto de perfil actualizada con éxito!";
    } else {
        echo "Error al actualizar la foto: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "usuario", "contraseña", "base_datos");

// Obtener la foto del usuario
$id_usuario = 1; // ID del usuario actual (puedes obtenerlo de una sesión)
$sql = "SELECT foto_perfil FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$stmt->bind_result($foto_perfil);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!-- Mostrar la foto -->
<img src="<?php echo htmlspecialchars($foto_perfil); ?>" alt="Foto de perfil" width="150">
