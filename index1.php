<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Electrónica</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

    <?php include 'links/encabezado3.php'; ?>

    <div class="menu-opciones">

        <ul>
            <li><a href="inventario.php">Inventario de Productos</a></li>
            <li><a href="cerrar_sesion.php">Cerrar sesion</a></li>
            <li><a href="guardar_articulos.php">Dar de alta articulos</a></li>
            <li><a href="soporte.php">Mensajes de Soporte</a></li>
            <li><a href="usuarios.php">Soporte de Usuarios</a></li>
            <li><a href="alta_admin.php">Dar de alta administradores</a></li>
            <li><a href="crear_cuenta.php">Dar de alta usuarios</a></li>
            <li><a href="noencontrado.php">Compras Grupales</a></li>
            <li><a href="noencontrado.php">Comparar Productos</a></li>
            <li><a href="noencontrado.php">Programa de Lealtad</a></li>
            <li><a href="noencontrado.php">Noticias y Actualizaciones</a></li>
            <li><a href="noencontrado.php">Contacto y Soporte</a></li>
            <li><a href="noencontrado.php">Política de Devoluciones</a></li>
            <li><a href="noencontrado.php">Opciones de Envío</a></li>
            <li><a href="noencontrado.php">Preguntas Frecuentes (FAQ)</a></li>
        </ul>
    </div>


    <?php include 'links/footer.php'; ?>

    <script src="scripts.js"></script>
</body>
</html>
