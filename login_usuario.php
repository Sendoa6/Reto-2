<?php 
    session_start();

    include 'Conexiones.php';

    $username_login = $_POST['username_login'];
    $password_login = $_POST['password_login'];
    $password_login = hash('sha512', $password_login);

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre_usuario='$username_login' and contrasena='$password_login'");

    if(mysqli_num_rows($validar_login) > 0){
        $datos_usuario = mysqli_fetch_assoc($validar_login);
        $_SESSION['usuario'] = $datos_usuario['nombre_usuario'];
        $_SESSION['ID_usuario'] = $datos_usuario['ID_usuario'];
        $_SESSION['telefono'] = $datos_usuario['telefono'];
        $_SESSION['nombre'] = $datos_usuario['nombre'];
        $_SESSION['apellido'] = $datos_usuario['apellido'];
        $_SESSION['correo'] = $datos_usuario['correo'];



        header("location: bienvenida.php");
        exit();
    }else{
        echo "<script type='text/javascript'>alert('Este usuario no existe, por favor pruebe otra vez');</script>";
        header("Refresh: 0.1; url=Formulario1.php");
        exit();
    }
?>