<?php
session_start();
include 'conexion.php';

if (isset($_POST['mensaje_id'])) {
    $mensaje_id = $_POST['mensaje_id'];

    $query = "DELETE FROM soporte WHERE id = :mensaje_id";
    $stmt = $conexion->prepare($query);
    $stmt->bindValue(':mensaje_id', $mensaje_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: soporte.php");
        exit;
    } else {
        echo "Error al eliminar el mensaje.";
    }
} else {
    echo "No se ha especificado un mensaje para eliminar.";
}
?>
