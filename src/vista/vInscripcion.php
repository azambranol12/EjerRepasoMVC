<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php if (!empty($objControlador->mensaje)): ?>
        <div class="mensaje <?= $objControlador->errorTipo ?>">
            <?= $objControlador->mensaje ?>
        </div>
    <?php endif; ?>
    <div class="form-container">
        <form action="index.php?c=Inscripcion&m=guardarDatos" method="POST">
            
            <div class="field">
                <label for="usuario">Nombre usuario: (no se puede repetir)</label>
                <input type="text" id="usuario" name="usuario">
            </div>

            <div class="field">
                <label for="nombre">Apellidos y Nombre:</label>
                <input type="text" id="nombre" name="nombre">
            </div>

            <div class="field">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password">
            </div>

            <div class="field">
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo">
            </div>

            <div class="field">
                <label for="telefono">Teléfono: (si no se rellena se guarda el valor null)</label>
                <input type="tel" id="telefono" name="telefono">
            </div>

            <div class="field">
                <p>Deportes: (un alumno puede inscribirse en más de un deporte)</p>
                <?php
                foreach($deportes as $deporte)
                    {
                    echo '<label><input type="checkbox" name="deporte[]" value="'.$deporte['idDeporte'].'">'. $deporte['nombreDep'].'</label><br>';
                    }
                ?>
            </div>

            <div class="field">
                <label>
                    Acepto las condiciones <input type="checkbox" name="condiciones"> **
                </label>
            </div>

            <div class="button-container">
                <button type="submit">ENVIAR</button>
            </div>

        </form>
    </div>

    <div class="button-container">
        <a href='index.php?c=Inicio&m=iniciarSesion'>VOLVER</a>
    </div>



</body>
</html>