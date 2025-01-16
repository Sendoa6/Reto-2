<?php
    session_start();
    include 'Conexiones.php';

    // Verificar conexión
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Obtener datos del formulario
    $id_prestamo = $_POST['ID']; // ID del préstamo ingresado por el usuario
    $fecha_devolucion = $_POST['fecha'];

    // Verificar que el préstamo exista en la base de datos
    $sql = "SELECT fecha_limite, ID_usuario FROM prestamos WHERE id_prestamo = '$id_prestamo'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        // Si el préstamo existe
        $fila = mysqli_fetch_assoc($resultado);
        $fecha_limite = $fila['fecha_limite']; // Fecha límite del préstamo
        $id_usuario = $fila['ID_usuario']; // ID del usuario asociado al préstamo

        // Actualizar la tabla Prestamos con la fecha de devolución
        $sql_update = "UPDATE prestamos SET fecha_devolucion = '$fecha_devolucion' WHERE ID_prestamo = '$id_prestamo'";
        if (mysqli_query($conexion, $sql_update)) {
            // Verificar si la devolución es posterior a la fecha límite
            $fecha_devolucion_dt = new DateTime($fecha_devolucion);
            $fecha_limite_dt = new DateTime($fecha_limite);
                if ($fecha_devolucion_dt > $fecha_limite_dt) {
                    // Incrementar el total de penalizaciones en la tabla Usuarios
                    $sql_penalizacion = "UPDATE usuarios SET total_penalizaciones = total_penalizaciones + 1 WHERE ID_usuario = '$id_usuario'";
                    mysqli_query($conexion, $sql_penalizacion);
                }
                echo "<script type='text/javascript'>alert('La devolución del préstamo se ha registrado correctamente.');</script>";
                header("Refresh: 0.1; url=devolver_prestamos.php");
        } else {
            echo "Error al registrar la devolución: " . mysqli_error($conexion);
        }
    } else {
        // Si no se encuentra el préstamo
        echo "No se encontró ningún préstamo con el ID proporcionado.";
    }
    // Cerrar la conexión
    mysqli_close($conexion);
?>
