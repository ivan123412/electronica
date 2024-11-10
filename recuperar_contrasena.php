<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña - Tienda de Electrónica</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="contenedor">
        <div class="cuadro-recuperacion">
            <h2 class="titulo-sesion">Recuperar Contraseña</h2>
            <p class="instrucciones">Ingrese su correo electrónico para recibir instrucciones sobre cómo recuperar su contraseña.</p>
            <form id="form-recuperacion" action="mensaje_recuperacion.php" method="POST">
                <div class="campo">
                    <label for="correo" class="etiqueta">Correo electrónico:</label>
                    <input type="email" id="correo" class="entrada" placeholder="Ingrese su correo electrónico" required>
                </div>
                <button type="submit" class="boton-comprar">Enviar instrucciones</button>
            </form>
            <p class="texto-crear-cuenta">¿Ya tienes tu contraseña? <a href="iniciar_sesion2.php" class="enlace-crear-cuenta">Inicia sesión aquí</a></p>
        </div>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
