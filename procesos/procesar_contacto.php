<?php
session_start();
require_once '../conexion.php';

if (isset($_SESSION['usuario_id'])) {
    $usuario_id = $_SESSION['usuario_id'];

    $query_usuario = "SELECT nombre_usuario, correo FROM persona WHERE id = :usuario_id";
    $stmt = $conexion->prepare($query_usuario);
    $stmt->bindValue(':usuario_id', $usuario_id, PDO::PARAM_INT);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        $nombre = $usuario['nombre_usuario'];
        $correo_electronico = $usuario['correo'];
    } else {
        echo "Usuario no encontrado.";
        exit;
    }
} else {
    echo "No estás logueado.";
    exit;
}

$mensaje = $_POST['mensaje'];

$query = "INSERT INTO soporte (nombre, correo_electronico, mensaje) VALUES (:nombre, :correo_electronico, :mensaje)";
$stmt = $conexion->prepare($query);

$stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR);
$stmt->bindValue(':correo_electronico', $correo_electronico, PDO::PARAM_STR);
$stmt->bindValue(':mensaje', $mensaje, PDO::PARAM_STR);

if ($stmt->execute()) {
    header("Location: ../agradecimiento.php");
    exit;
} else {
    echo "Error al enviar el mensaje.";
}
?>
