<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta - Tienda de Electrónica</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="contenedor">
        <div class="cuadro-sesion" id="formContainer">
            <h2 class="titulo-sesion">Crear Cuenta</h2>
            <form id="crearCuentaForm" action="procesos/procesar_crear_cuenta.php" method="POST" onsubmit="return validarContrasena();">
                <div class="campo">
                    <label for="nombre" class="etiqueta">Nombre de Usuario:</label>
                    <input type="text" id="nombre" name="nombre" class="entrada" placeholder="Ingrese su nombre de usuario" required>
                </div>
                <div class="campo">
                    <label for="correo" class="etiqueta">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" class="entrada" placeholder="Ingrese su correo" required>
                </div>
                <div class="campo">
                    <label for="contrasena" class="etiqueta">Contraseña:</label>
                    <input type="password" id="contrasena" name="contrasena" class="entrada" placeholder="Ingrese su contraseña" required>
                    <small id="passwordHelp" style="color:red; display:none;">La contraseña debe tener al menos 8 caracteres, un número y un carácter especial.</small>
                </div>
                <div class="campo">
                    <label for="confirmar-contrasena" class="etiqueta">Confirmar Contraseña:</label>
                    <input type="password" id="confirmar-contrasena" name="confirmar_contrasena" class="entrada" placeholder="Confirme su contraseña" required>
                </div>
                <button type="submit" class="boton-crear-cuenta">Crear Cuenta</button>
            </form>
            <p class="texto-crear-cuenta">¿Ya tienes una cuenta? <a href="iniciar_sesion2.php" class="enlace-crear-cuenta">Inicia sesión aquí</a></p>
        </div>
    </div>
    <script>
        function validarContrasena() {
            const contrasena = document.getElementById('contrasena').value;
            const passwordHelp = document.getElementById('passwordHelp');
            const regex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;

            if (!regex.test(contrasena)) {
                passwordHelp.style.display = 'inline';
                return false;
            } else {
                passwordHelp.style.display = 'none';
                return true;
            }
        }
    </script>
</body>
</html>
