<?php 
session_start();
include 'conexion.php';

$query = 'SELECT id, nombre_producto, precio, descripcion, imagen_url, cantidad_disponible FROM inventario';
$stmt = $conexion->prepare($query);
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Productos</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php include 'links/encabezado3.php'; ?>

<div class="contenedor-inventario">
    <h2 class="titulo-inventario">Inventario de Productos</h2>
    
    <?php if (count($productos) > 0): ?>
        <table class="tabla-inventario">
            <thead>
                <tr>
                    <th class="th-inventario">Imagen</th>
                    <th class="th-inventario">Nombre</th>
                    <th class="th-inventario">Descripción</th>
                    <th class="th-inventario">Precio</th>
                    <th class="th-inventario">Cantidad Disponible</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr class="fila-inventario">
                        <td class="td-inventario">
                            <img src="imagenes/<?php echo htmlspecialchars($producto['imagen_url']); ?>" alt="Imagen de <?php echo htmlspecialchars($producto['nombre_producto']); ?>" class="producto-imagen">
                        </td>
                        <td class="td-inventario"><?php echo htmlspecialchars($producto['nombre_producto']); ?></td>
                        <td class="td-inventario"><?php echo htmlspecialchars($producto['descripcion']); ?></td>
                        <td class="td-inventario"><?php echo '$' . number_format($producto['precio'], 2); ?></td>
                        <td class="td-inventario"><?php echo htmlspecialchars($producto['cantidad_disponible']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="sin-productos">No hay productos disponibles en el inventario.</p>
    <?php endif; ?>
</div>

<?php include 'links/footer.php'; ?>

<script src="scripts.js"></script>
</body>
</html>
