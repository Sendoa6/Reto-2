<?php
session_start();
include 'Conexiones.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['foto'])) {
    if (isset($_SESSION['ID_usuario'])) {
        $ID_usuario = $_SESSION['ID_usuario'];
    } else {
        echo "No se ha encontrado el ID del usuario en la sesión.";
        exit();
    }

    $foto_seleccionada = $_POST['foto'];

    echo "Foto seleccionada: " . htmlspecialchars($foto_seleccionada) . "<br>";

    if (!$conexion) {
        die("Error en la conexión: " . mysqli_connect_error());
    }

    $sql = "UPDATE usuarios SET foto_perfil = ? WHERE ID_usuario = ?";
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("si", $foto_seleccionada, $ID_usuario);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "¡Foto de perfil actualizada con éxito!<br>";
                header("Location: bienvenida.php");
                exit();
            } else {
                echo "No se encontraron filas para actualizar. ¿Es el ID correcto?<br>";
            }
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error . "<br>";
        }

        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conexion->error . "<br>";
    }

    $conexion->close();
} else {
    echo "No se ha recibido ninguna foto.<br>";
}
?>