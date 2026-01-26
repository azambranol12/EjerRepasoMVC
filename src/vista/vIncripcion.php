<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="form-container">
        <form action="index.php?c=Incio&m=inicioSesion" method="get">
            
            <div class="field">
                <label for="usuario">Nombre usuario: (no se puede repetir)</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>

            <div class="field">
                <label for="nombre">Apellidos y Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="field">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="field">
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" required>
            </div>

            <div class="field">
                <label for="telefono">Teléfono: (si no se rellena se guarda el valor null)</label>
                <input type="tel" id="telefono" name="telefono">
            </div>

            <div class="field">
                <p>Deportes: (un alumno puede inscribirse en más de un deporte)</p>
                <label><input type="checkbox" name="deporte" value="futbol"> Fútbol</label><br>
                <label><input type="checkbox" name="deporte" value="baloncesto"> Baloncesto</label><br>
                <label><input type="checkbox" name="deporte" value="tenis"> Tenis de mesa</label>
            </div>

            <div class="field">
                <label>
                    Acepto las condiciones <input type="checkbox" name="condiciones" required> **
                </label>
            </div>

            <div class="button-container">
                <button type="submit">ENVIAR</button>
            </div>

        </form>
    </div>

</body>
</html>