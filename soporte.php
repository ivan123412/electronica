<?php 
session_start();
include 'conexion.php';

$query = 'SELECT id, nombre, correo_electronico, mensaje, fecha FROM soporte';
$stmt = $conexion->prepare($query);
$stmt->execute();
$mensajes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Electrónica - Mensajes de Soporte</title>
    <link rel="stylesheet" href="style.css"> 
</head>

<body>

<?php include 'links/encabezado3.php'; ?>


<div class="contenedor-soporte">
    <h2 class="titulo-soporte">Mensajes de Soporte</h2>
    
    <?php if (count($mensajes) > 0): ?>
        <table class="tabla-soporte">
            <thead>
                <tr>
                    <th class="th-soporte">Nombre</th>
                    <th class="th-soporte">Correo</th>
                    <th class="th-soporte">Mensaje</th>
                    <th class="th-soporte">Fecha</th>
                    <th class="th-soporte">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mensajes as $mensaje): ?>
                    <tr class="fila-soporte">
                        <td class="td-soporte"><?php echo htmlspecialchars($mensaje['nombre']); ?></td>
                        <td class="td-soporte"><?php echo htmlspecialchars($mensaje['correo_electronico']); ?></td>
                        <td class="td-soporte"><?php echo htmlspecialchars($mensaje['mensaje']); ?></td>
                        <td class="td-soporte"><?php echo date('d/m/Y H:i:s', strtotime($mensaje['fecha'])); ?></td>
                        <td class="td-soporte">
                            <form action="eliminar_mensaje.php" method="POST" style="display:inline;">
                                <input type="hidden" name="mensaje_id" value="<?php echo $mensaje['id']; ?>">
                                <button type="submit" class="btn-eliminar">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="sin-mensajes-soporte">No hay mensajes de soporte disponibles.</p>
    <?php endif; ?>
</div>

<?php include 'links/footer.php'; ?>


<script src="scripts.js"></script>
</body>
</html>
