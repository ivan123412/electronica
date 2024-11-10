<?php
session_start();
include '../conexion.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: iniciar_sesion.html");
    exit;
}

$nombre_usuario = $_SESSION['usuario'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password = $_POST['password'];

$query = "UPDATE persona SET nombre_usuario = :NOMBRE, correo = :CORREO";

$params = [
    ':NOMBRE' => $nombre,
    ':CORREO' => $correo,
    ':USUARIO' => $nombre_usuario
];


if (!empty($password)) {
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $query .= ", contrasena = :PASSWORD";
    $params[':PASSWORD'] = $password_hash;
}

$query .= " WHERE nombre_usuario = :USUARIO";
$stmt = $conexion->prepare($query);
$stmt->execute($params);


$_SESSION['usuario'] = $nombre;


header("Location: ../mensaje_perfil.php");
exit;
?>
