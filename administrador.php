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

<?php include 'links/encabezado3.php'; ?>

<main class="perfil-contenido">


    <section class="perfil-datos">

        <h2 class="perfil-subtitulo">Perfil de Administrador</h2>
        <p class="perfil-info"><strong>Nombre del administrador:</strong> <?php echo htmlspecialchars(ucwords($usuario['nombre_usuario'])); ?></p>
        <p class="perfil-info"><strong>Correo electronico:</strong> <?php echo htmlspecialchars($usuario['correo']); ?></p>
        <p class="perfil-info"><strong>Tiempo en la App:</strong> 2 años</p>


        <div class="menu-opciones">
        <h2>Opciones de Administrador</h2>
        <ul>
            <li><a href="cerrar_Sesion.php">Cerrar sesion</a></li>
            <li><a href="index1.php">Volver al inicio</a></li>
        </ul>
    </div>
    </section>



</main>

<?php include 'links/footer.php'; ?>

<script src="scripts.js"></script>
</body>
</html>
