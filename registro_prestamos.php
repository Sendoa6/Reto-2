<?php
    //Comprobar si hay una sesion iniciada
    session_start();
    //Conectar con conexiones
    include 'Conexiones.php';

    //Si la sesión no está iniciada te envía a iniciar sesión
    if(!isset($_SESSION['usuario'])){
        echo "<script type='text/javascript'>  window.location = 'Formulario1.php'; </script>";
        session_destroy();
        die();
    }

    //Guardar los datos añadidos en el formulario
    $ID_Ejemplar = $_POST["ID"]; //ID ejemplar
    $fecha_prestamo = $_POST["fecha"]; //Fecha en la que se registra el préstamo
    $fecha = $_POST["fecha"]; //Fecha en otra variable (como string)
    $fecha = new DateTime($fecha); //Pasar la variable fecha de string tipo date
    $fecha->modify('+3 months'); //sumarle 3 meses a esta fecha para conseguir la fecha limite
    $fecha_limite = $fecha->format('Y-m-d'); //Establecer el formato de fecha en dias meses y años.
    $fecha_devolucion = null; //Esta fecha de momento será null

    //Si usuario esta con la sesion iniciada...
    if (isset($_SESSION['ID_usuario'])) {
        $userId = $_SESSION['ID_usuario']; //...se almacena el id usuario en una variable

    // CONSULTA PARA CONTAR PENALIZACIONES
    $query = "SELECT total_penalizaciones FROM usuarios WHERE ID_usuario = '$userId'";


    $result = mysqli_query($conexion, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        // Verificar el total de penalizaciones
        if ($row['total_penalizaciones'] >= 3) {
            echo "El usuario tiene 3 o más penalizaciones y no puede realizar préstamos.";
            mysqli_close($conexion); // Cierra la conexión a la base de datos
            exit(); // Finaliza el script
        }
    } else {
        echo "Error: No se pudo encontrar al usuario en la base de datos.";
        mysqli_close($conexion);
        exit();
    }

        
    // Manejar correctamente fecha_devolucion si es null
    $fecha_devolucion_sql = is_null($fecha_devolucion) ? "NULL" : "'$fecha_devolucion'";

    // REGISTRAR EL PRÉSTAMO en la base de datos
    $sqlInsert = "INSERT INTO prestamos (fecha_prestamo, fecha_limite, fecha_devolucion, id_usuario, id_ejemplar) VALUES ('$fecha_prestamo', '$fecha_limite', $fecha_devolucion_sql, $userId, $ID_Ejemplar)";



    //Comprueba si se ha registrado el registro correctamente, mostrando mensajes
    if (mysqli_query($conexion, $sqlInsert)) {
        echo "Préstamo registrado exitosamente.";
        header("Refresh: 0.1; url=index.php");
    } else {
        echo "Error al registrar el préstamo: " . mysqli_error($conexion);
    }
}
?>