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
    $fecha_devolucion; //Esta fecha de momento será null

    //Si usuario esta con la sesion iniciada...
    if (isset($_SESSION['ID_usuario'])) {
        $userId = $_SESSION['ID_usuario']; //...se almacena el id usuario en una variable
        echo "El ID del usuario es: " . $userId;

    // CONSULTA PARA CONTAR PENALIZACIONES
        $sql = " SELECT COUNT(*) AS penalizaciones FROM Penalizaciones p JOIN Prestamos pr ON p.ID_Penalizacion = pr.ID_Penalizacion WHERE pr.ID_Usuario = $userId ";-
        $result = mysqli_query($conexion, $sql);  //Guarda eñ resultado en result(hace un insert)
        $row = mysqli_fetch_assoc($result); //Crea un array

        // Comprobar si el usuario tiene 3 o mas penalizaciones
        if ($row['penalizaciones'] >= 3) {
            echo "El usuario tiene 3 o más penalizaciones y no puede realizar préstamos.";
            mysqli_close($conexion); //Si se da el caso no puede realizar un registro y finaliza el programa
            exit(); // Finaliza la ejecución del script
        }

        // REGISTRAR EL PRÉSTAMO en la base de datos
        $sqlInsert = "INSERT INTO Prestamos (Fecha_Prestamo, Fecha_Limite, Fecha_Devolucion, ID_Usuario, ID_Ejemplar, ID_Penalizacion)
        VALUES ('$fecha_prestamo', '$fecha_limite', $fecha_devolucion, $userId, $ID_Ejemplar, NULL)";

        //Comprueba si se ha registrado el registro correctamente, mostrando mensajes
        if (mysqli_query($conexion, $sqlInsert)) {
            echo "Préstamo registrado exitosamente.";
        } else {
            echo "Error al registrar el préstamo: " . mysqli_error($conexion);
        }


    } else {
        echo "No hay usuario logueado.";
    }


?>