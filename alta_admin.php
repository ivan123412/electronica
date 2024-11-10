<?php
session_start();
include 'conexion.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena_confirmar = $_POST['contrasena_confirmar'];

    // Validar contraseña
    if (strlen($contrasena) < 8 || !preg_match('/[!@#$%^&*(),.?":{}|<>]/', $contrasena)) {
        $mensaje = 'La contraseña debe tener al menos 8 dígitos y un carácter especial.';
    } elseif ($contrasena !== $contrasena_confirmar) {
        $mensaje = 'Las contraseñas no coinciden.';
    } else {
        // Verificar si el correo ya está en uso
        $correoQuery = 'SELECT COUNT(*) as total FROM persona WHERE correo = :correo';
        $stmt = $conexion->prepare($correoQuery);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();
        $correoExistente = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        if ($correoExistente > 0) {
            $mensaje = 'El correo electrónico ya está en uso. Por favor, elija otro.';
        } else {
            // Insertar nuevo administrador
            $insertQuery = 'INSERT INTO persona (nombre_usuario, correo, contrasena, rol) VALUES (:nombre, :correo, :contrasena, :rol)';
            $stmt = $conexion->prepare($insertQuery);
            $hashedPassword = password_hash($contrasena, PASSWORD_DEFAULT); // Hashea la contraseña
            $rol = 1; // Rol para administrador
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':contrasena', $hashedPassword);
            $stmt->bindParam(':rol', $rol); // Asignar rol

            if ($stmt->execute()) {
                $mensaje = 'Administrador creado exitosamente.';
            } else {
                $mensaje = 'Error al crear el administrador.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Administrador</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<nav>
    <a href="index1.php">Inicio</a>
    <a href="administrador.php">Administrador</a>
</nav>

<div class="contenedor-formulario">
    <?php if ($mensaje): ?>
        <p class="mensaje"><?php echo htmlspecialchars($mensaje); ?></p>
    <?php endif; ?>

    <div class="contenedor">
        <div class="cuadro-sesion" id="formContainer">
            <h2 class="titulo-sesion">Crear Administrador</h2>
            <form id="crearCuentaForm" action="" method="POST" onsubmit="return validarContrasena();">
                <div class="campo">
                    <label for="nombre" class="etiqueta">Nombre del Administrador:</label>
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
                    <input type="password" id="confirmar-contrasena" name="contrasena_confirmar" class="entrada" placeholder="Confirme su contraseña" required>
                </div>
                <button type="submit" class="boton-crear-cuenta">Crear Administrador</button>
            </form>
        </div>
    </div>
</div>

<footer>
    <div class="contenido-pie">
        <div class="seccion-pie">
            <h4>Electrónicos Jacobo's</h4>
            <p>Nuestras redes sociales:</p>
            <div class="sociales-pie">
                <img src="imagenes/google.png" alt="Google">
                <img src="imagenes/facebook.png" alt="Facebook">
                <img src="imagenes/instagram.png" alt="Instagram">
                <img src="imagenes/youtube.png" alt="YouTube">
                <img src="imagenes/whatsapp.png" alt="WhatsApp">
            </div>
        </div>
        <div class="seccion-pie">
            <h4>Ayuda</h4>
            <p><a href="#">Atención al cliente</a></p>
            <p><a href="#">Ayuda al cliente</a></p>
            <p><a href="#">Gestión de datos</a></p>
            <p><a href="#">Gestión de contenido</a></p>
        </div>
        <div class="seccion-pie">
            <h4>Métodos de pago</h4>
            <p><a href="#">Gestionar métodos de pago</a></p>
            <p><a href="#">Pago a meses</a></p>
            <p><a href="#">Pago en efectivo</a></p>
            <p><a href="#">Tarjetas de regalo</a></p>
        </div>
        <div class="seccion-pie">
            <h4>Conócenos</h4>
            <p><a href="#">Información corporativa</a></p>
            <p><a href="#">Departamento de prensa</a></p>
            <p><a href="#">Alertas de revisión</a></p>
            <p><a href="#">Contrato de seguridad</a></p>
        </div>
        <div class="seccion-pie">
            <h4>Trabaja con nosotros</h4>
            <p><a href="#">Vender tus productos</a></p>
            <p><a href="#">Suminístrate con nosotros</a></p>
            <p><a href="#">Programa de afiliados</a></p>
            <p><a href="#">Protege y desarrolla tu marca</a></p>
        </div>
    </div>
    <p>Copyright © 1999-2024. Electrónica Jacobo, Nayarit, México</p>
</footer>

<script src="scripts.js"></script>
</body>
</html>
