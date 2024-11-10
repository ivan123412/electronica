<?php
include '../conexion.php';
$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $pass = $_POST['contrasena'];
    $pass2 = $_POST['confirmar_contrasena'];

    $nombre = filter_var(strtolower($nombre), FILTER_SANITIZE_STRING);
    $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $pass2 = filter_var($pass2, FILTER_SANITIZE_STRING);

    $validar_usuario = $conexion->prepare('SELECT * FROM persona WHERE nombre_usuario = :NOMBRE OR correo = :CORREO LIMIT 1');
    $validar_usuario->execute(array(':NOMBRE' => $nombre, ':CORREO' => $correo));
    $resultado = $validar_usuario->fetch();

    if ($resultado !== false) {
        if ($resultado['nombre_usuario'] === $nombre) {
            $errores .= '<li>El nombre de usuario ya está registrado</li>';
        }
        if ($resultado['correo'] === $correo) {
            $errores .= '<li>El correo electrónico ya está registrado</li>';
        }
    }

    if ($pass !== $pass2) {
        $errores .= '<li>Las contraseñas no coinciden</li>';
    }

    if (!empty($errores)) {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Error</title>
        </head>
        <body>
            <div class="error-message">
                <p><?php echo $errores; ?></p>
                <button onclick="window.location.href='../crear_cuenta.php'">Volver a Intentar</button>
            </div>
        </body>
        </html>
        <?php
    } else {

        $pass_cifrada = password_hash($pass, PASSWORD_DEFAULT);

        $guardar = $conexion->prepare('INSERT INTO persona (nombre_usuario, correo, contrasena, rol) VALUES (:NOMBRE, :CORREO, :CONTRASENA, :ROL)');
        $guardar->execute(array(
            ':NOMBRE' => $nombre,
            ':CORREO' => $correo,
            ':CONTRASENA' => $pass_cifrada,
            ':ROL' => 2  
        ));

        echo "<script>
            sessionStorage.setItem('nombre_usuario', '$nombre');
            window.location.href = '../registrado.php';
        </script>";
        exit();
    }
}
?>
