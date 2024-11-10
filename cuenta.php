<?php
include 'conexion.php';
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: iniciar_sesion.html");
    exit;
}


$nombre_usuario = $_SESSION['usuario'];
$query = $conexion->prepare("SELECT * FROM persona WHERE nombre_usuario = :NOMBRE");
$query->execute([':NOMBRE' => $nombre_usuario]);
$usuario = $query->fetch();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'links/encabezado.php'; ?>

<main class="perfil-contenido">


    <section class="perfil-datos">

        <h2 class="perfil-subtitulo">Perfil de <?php $primer_nombre = explode(' ', trim($_SESSION['usuario']))[0];
        echo ucfirst(strtolower(htmlspecialchars($primer_nombre))); ?></h2>
        <p class="perfil-info"><strong>Nombre:</strong> <?php echo htmlspecialchars(ucwords($usuario['nombre_usuario'])); ?></p>
        <p class="perfil-info"><strong>Correo electronico:</strong> <?php echo htmlspecialchars($usuario['correo']); ?></p>
        <p class="perfil-info"><strong>Cliente desde:</strong> <?php echo date('d/M/y', strtotime($usuario['fecha_registro'])); ?></p>

    </section>

    <section class="perfil-productos">
        <h2 class="perfil-subtitulo">Productos Guardados</h2>
        <ul class="perfil-lista-productos">
            <li class="perfil-item-producto">iPhone 16 Blanco (256 GB)</li>
            <li class="perfil-item-producto">Switch Lite Gris</li>
            <li class="perfil-item-producto">MacBook Pro (1 TB)</li>
        </ul>
    </section>

    <section class="perfil-historial">
        <h2 class="perfil-subtitulo">Opciones</h2>
        <a href="historial.php">
            <button type="button" class="boton-carrito">Ver Historial de Compras</button>
        </a>  
        <a href="editar_perfil.php">
            <button type="button" class="boton-comprar">Editar perfil</button>
        </a>  
    </section>
</main>

<?php include 'links/footer.php'; ?>

<script src="scripts.js"></script>
</body>
</html>
