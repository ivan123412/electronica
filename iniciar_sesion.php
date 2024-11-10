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
            <form id="iniciarSesionForm" action="procesos/procesar_iniciar_sesion.php" method="POST">
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
            
        </div>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
