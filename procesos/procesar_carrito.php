<?php
session_start();
include '../conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(["success" => false, "error" => "Usuario no autenticado"]);
    exit();
}

if (!isset($_GET['producto_id']) || !isset($_GET['cantidad'])) {
    echo json_encode(["success" => false, "error" => "ID del producto o cantidad no proporcionada"]);
    exit();
}

$numero_inventario = $_GET['producto_id'];
$cantidad = $_GET['cantidad'];
$usuario_id = $_SESSION['usuario_id'];

$consulta_persona = "SELECT id FROM persona WHERE id = :usuario_id";
$stmt = $conexion->prepare($consulta_persona);
$stmt->bindValue(':usuario_id', $usuario_id, PDO::PARAM_INT);
$stmt->execute();
$resultado = $stmt->fetch();

if ($resultado) {
    $persona_id = $resultado['id'];

    $insertar = "INSERT INTO persona_producto (producto_id, usuario_id, cantidad) VALUES (:producto_id, :persona_id, :cantidad)";
    $stmt_insertar = $conexion->prepare($insertar);
    $stmt_insertar->bindValue(':producto_id', $numero_inventario, PDO::PARAM_INT);
    $stmt_insertar->bindValue(':persona_id', $persona_id, PDO::PARAM_INT);
    $stmt_insertar->bindValue(':cantidad', $cantidad, PDO::PARAM_INT);

    if ($stmt_insertar->execute()) {
        header("Location: ../confirmacion.php");
        exit();
    } else {
        echo json_encode(["success" => false, "error" => "Error al insertar en la base de datos"]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Usuario no encontrado"]);
}

$conexion = null;
?>
