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
        <form action="index.php?c=Inicio&m=iniciarSesion" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" placeholder="Introduce tu usuario">

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Introduce tu contraseña">

            <button type="submit" class="btn-login">Entrar</button>
        </form>
    </div>
                <?php if (!empty($objControlador->mensaje)): ?>
                <div class="mensaje <?= $objControlador->errorTipo ?>">
                    <?= $objControlador->mensaje ?>
                </div>
            <?php endif; ?>

    <div class="button-container">
        <a href='index.php?c=Inicio&m=iniciarSesion'>VOLVER</a>
    </div>
</body>
</html>