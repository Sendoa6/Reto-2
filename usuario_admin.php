<?php
session_start();

// Verificar si la variable de sesión 'empleado' está definida
if (isset($_SESSION['empleado'])) {
    if ($_SESSION['empleado'] === true) {
        echo 'Es empleado';
    } else {
        echo 'No es empleado';
    }
} else {
    echo 'No se ha establecido el estado de empleado';
}
?>
