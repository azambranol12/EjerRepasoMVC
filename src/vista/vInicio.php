<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form action="#" method="post">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" placeholder="Introduce tu usuario" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Introduce tu contraseña" required>

            <button type="submit" class="btn-login">Entrar</button>
        </form>
        <p>¿No tienes cuenta?<a href="index.php?c=Inicio&m=inscripcion"> Registrarse</a></p>
    </div>
</body>
</html>