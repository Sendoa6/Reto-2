<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/muskizlogo.png" type="image/x-icon">
    <title>Registro de usuarios - Biblioteca</title>
    <link rel="stylesheet" href="EstilosFormulario.css">
</head>
<body>
    <div class="caja"> <!-- Para reservar el espacio para el formulario -->
        <div class="caja-form"> <!-- Para la estructura de la caja -->
            <img src="media/muskizlogo.png" alt="BibliotecaMuskiz"> <!-- Insertar imagen -->
            <h2>Registro de Usuario</h2>
            <form action="registro_usuario.php" method="post"><!-- form, es para recopilar datos, action redirige los datos a donde quieras, 
                el "#" hace que no se envien los datos recopilados a ningun lugar externo sino que se quedaran en esta pagina ya que no disponemos de php, method define como se envian los datos, 
                post hace que los datos del formulario se envían de manera segura en el cuerpo de la solicitud, sin ser visibles en la URL.-->
                
                <!-- <label for="id_usuario">ID Usuario</label>
                <input type="text" id="id_usuario" name="id_usuario" disabled> --->

                <!-- <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" required> -->

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required> <!-- Required para que el campo sea obligatorio y text para que te deje escribir en forma de texto -->

                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>

                <label for="telefono">Telefono:</label>
                <input type="text" id="telefono" name="telefono" required>

                <label for="telefono">Correo Electronico:</label>
                <input type="text" id="Correo" name="Correo" required>

                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required><!-- Password para que al escribir no se vea la contraseña -->

                <label for="password">Repite la contraseña:</label>
                <input type="password" id="password2" name="password2" required><!-- Password para que al escribir no se vea la contraseña -->

                <label for="username">Numero Seguridad Social (Si eres empleado):</label>
                <input type="text" id="NumeroSS" name="NumeroSS">

                <button type="submit">Registrarse</button>
                Volver al <a href="Formulario1.php"> inicio de sesion.</a><br> <!-- Redirigir hacia otro html -->
                Volver a la <a href="index.php">página principal.</a>
            </form>
        </div>

       
    </div>
</body>
</html>
