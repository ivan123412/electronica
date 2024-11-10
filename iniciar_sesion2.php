<?php
session_set_cookie_params(0); 
session_start();
$_SESSION['url_referer'] = $_SERVER['HTTP_REFERER'] ?? 'index.php';
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Tienda de Electrónica</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="contenedor">
        <div class="cuadro-sesion" id="formContainer">
            <h2 class="titulo-sesion">Iniciar Sesión</h2>
            <form id="iniciarSesionForm" action="procesos/procesar_iniciar_sesion2.php" method="POST">
                <div class="campo">
                    <label for="correo" class="etiqueta">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" class="entrada" placeholder="Ingrese su correo" required>
                </div>
                <div class="campo">
                    <label for="contrasena" class="etiqueta">Contraseña:</label>
                    <input type="password" id="contrasena" name="contrasena" class="entrada" placeholder="Ingrese su contraseña" required>
                </div>
                <button type="submit" class="boton-entrar">Iniciar Sesión</button>
            </form>
            <p class="texto-crear-cuenta">¿No tienes una cuenta? <a href="crear_cuenta.php" class="enlace-crear-cuenta">Crea una aquí</a></p>
            <p class="texto-crear-cuenta">¿Olvidaste tu contraseña? <a href="recuperar_contrasena.php" class="enlace-crear-cuenta">Recupérala aquí</a></p>
        </div>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
