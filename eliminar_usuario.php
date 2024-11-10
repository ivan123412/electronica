<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar el usuario con el ID específico
    $query = 'DELETE FROM persona WHERE id = :id';
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<script>alert('Usuario eliminado correctamente'); window.location.href = 'usuarios.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el usuario'); window.location.href = 'usuarios.php';</script>";
    }
} else {
    echo "<script>window.location.href = 'usuarios.php';</script>";
}
