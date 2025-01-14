<?php

    session_start();
    include 'Conexiones.php';

    $ID_Ejemplar = $_POST["ID"];
    $fecha_prestamo = $_POST["fecha"];
    $fecha = $_POST["fecha"];
    $fecha = new DateTime($fecha);
    $fecha->modify('+3 months');
    $fecha_limite = $fecha->format('Y-m-d');
    $fecha_devolucion;

    if (isset($_SESSION['ID_usuario'])) {
        $userId = $_SESSION['ID_usuario'];

        echo "El ID del usuario es: " . $userId;
    } else {
        echo "No hay usuario logueado.";
    }

?>