<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/muskizlogo.png" type="image/x-icon">
    <title>Inicio sesion - Biblioteca</title>
    <link rel="stylesheet" href="EstilosFormulario.css">
</head>
<body>
    <div class="caja"> <!-- Para reservar el espacio para el formulario -->
        <div class="caja-form"> <!-- Para la estructura de la caja -->
            <img src="media/muskizlogo.png" alt="BibliotecaMuskiz"><!-- Insertar imagen -->
        
            <h2>Inicio de Sesión</h2>
            <form action="login_usuario.php" method="post"> <!-- form, es para recopilar datos, action redirige los datos a donde quieras, 
                                            el "#" hace que no se envien los datos recopilados a ningun lugar externo sino que se quedaran en esta pagina ya que no disponemos de php, method define como se envian los datos, 
                                            post hace que los datos del formulario se envían de manera segura en el cuerpo de la solicitud, sin ser visibles en la URL.-->

                <label for="username_login">Nombre de Usuario:</label>
                <input type="text" id="username_login" name="username_login" required>  <!-- Required para que el campo sea obligatorio y text para que te deje escribir en forma de texto -->

                <label for="password_login">Contraseña:</label>
                <input type="password" id="password_login" name="password_login" required>  <!-- Password para que al escribir no se vea la contraseña -->
                <button  type="submit">Iniciar Sesión</button><!-- para hacer un boton que haga la funcion de enviar -->
            </form>
            ¿Nuevo usuario? <a href="RegistroFRM.php"> Registrate aqui.</a><br> <!-- Redirigir hacia otro html -->
            Volver a la <a href="index.php">página principal.</a>
        </div>
    </div>
</body>
</html>