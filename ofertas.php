<?php
include 'conexion.php';
session_start();

$productosConDescuento = $conexion->query("SELECT id, nombre_producto, precio_anterior, precio, imagen_url FROM inventario WHERE precio_anterior IS NOT NULL");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ofertas - Tienda de Electrónica</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include 'links/encabezado.php'; ?>

    <div class="productos3">
        <?php while ($producto = $productosConDescuento->fetch(PDO::FETCH_ASSOC)) { 
            $descuento = round((($producto['precio_anterior'] - $producto['precio']) / $producto['precio_anterior']) * 100);
        ?>
        <div class="producto3">
            <img src="imagenes/<?php echo $producto['imagen_url']; ?>" alt="<?php echo $producto['nombre_producto']; ?>" 
                 onclick="window.location.href='articulos/articulos.php?id=<?php echo $producto['id']; ?>'" 
                 style="cursor: pointer;">
            <p><?php echo $producto['nombre_producto']; ?></p>
            <p class="precio-antiguo tachado">Precio Original: $<?php echo number_format($producto['precio_anterior'], 2); ?></p>
            <p class="porcentaje-descuento">Descuento: <?php echo $descuento; ?>%</p>
            <p class="precio-actual">Precio Actual: $<?php echo number_format($producto['precio'], 2); ?></p>
        </div>
        <?php } ?>
    </div>

    <?php include 'links/footer.php'; ?>
</body>
</html>
