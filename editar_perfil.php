<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: ../iniciar_sesion.html");
    exit;
}

$nombre_usuario = $_SESSION['usuario'];
$correo_nuevo = $_POST['correo'];
$nombre_nuevo = $_POST['nombre'];
$password_nuevo = $_POST['password'];

// Verificar si el correo nuevo es diferente al correo actual y si está en uso por otro usuario
$query_correo = "";
if ($correo_nuevo !== $_SESSION['correo']) { // Solo verificamos si el correo ha cambiado
    $query_correo = $conexion->prepare("SELECT id FROM persona WHERE correo = :correo AND nombre_usuario != :usuario");
    $query_correo->execute([':correo' => $correo_nuevo, ':usuario' => $nombre_usuario]);
    $correo_existente = $query_correo->fetch();

    if ($correo_existente) {
        // El correo ya está registrado por otro usuario
        echo "El correo electrónico ya está en uso por otro usuario.";
        exit;
    }
}

// Preparar la consulta para actualizar los datos del usuario
$query = "UPDATE persona SET nombre_usuario = :nombre";

if ($correo_nuevo !== $_SESSION['correo']) {
    $query .= ", correo = :correo";
}

if (!empty($password_nuevo)) {
    // Si el usuario ha introducido una nueva contraseña, también actualizarla
    $password_nueva_hash = password_hash($password_nuevo, PASSWORD_DEFAULT);
    $query .= ", contrasena = :contrasena";
}

$query .= " WHERE nombre_usuario = :usuario";

$stmt = $conexion->prepare($query);

// Ejecutar la actualización
$params = [
    ':nombre' => $nombre_nuevo,
    ':usuario' => $nombre_usuario
];

if ($correo_nuevo !== $_SESSION['correo']) {
    $params[':correo'] = $correo_nuevo;
}

if (!empty($password_nuevo)) {
    $params[':contrasena'] = $password_nueva_hash;
}

$stmt->execute($params);

// Actualizamos la sesión con el nuevo correo, si es que cambió
if ($correo_nuevo !== $_SESSION['correo']) {
    $_SESSION['correo'] = $correo_nuevo;
}

// Redirigir al usuario a la página de perfil o una página de éxito
header("Location: ../editar_perfil.php?mensaje=Perfil actualizado correctamente");
exit;
?>
