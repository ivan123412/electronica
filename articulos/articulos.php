<?php
session_start();
include '../conexion.php';

$precio_anterior = null;
$precio_actual = 0;
$descuento = 0;
$producto = [];
$especificaciones = [];

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_producto = $_GET['id']; // Obtener el ID del producto desde la URL

    try {
        $query = $conexion->prepare("SELECT nombre_producto, precio, imagen_url, precio_anterior, tipo FROM inventario WHERE id = :id");
        $query->bindParam(':id', $id_producto, PDO::PARAM_INT);
        $query->execute();
        $producto = $query->fetch(PDO::FETCH_ASSOC);

        if ($producto) {
            $precio_anterior = $producto['precio_anterior'] ?? null;
            $precio_actual = $producto['precio'] ?? 0;

            if ($precio_anterior && $precio_anterior > 0) {
                $descuento = (($precio_anterior - $precio_actual) / $precio_anterior) * 100;
            }
        }

        $query_especificaciones = $conexion->prepare("SELECT esp1, esp2, esp3, esp4, esp5, esp6, esp7, esp8, esp9, esp10 FROM especificaciones WHERE id = :id");
        $query_especificaciones->bindParam(':id', $id_producto, PDO::PARAM_INT);
        $query_especificaciones->execute();
        $especificaciones = $query_especificaciones->fetch(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        echo "Error al cargar el producto: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($producto['nombre_producto'] ?? 'Producto'); ?> - Electrónica Jacobo</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <?php include '../links/encabezado2.php'; ?>

    <section class="contenedor-especificaciones">
        <div class="imagen-producto">
            <img src="../imagenes/<?php echo htmlspecialchars($producto['imagen_url'] ?? '../imagenes/default.png'); ?>" alt="<?php echo htmlspecialchars($producto['nombre_producto'] ?? 'Producto'); ?>">
        </div>
        <div class="detalles-producto">
            <h1 class="titulo-producto"><?php echo htmlspecialchars($producto['nombre_producto'] ?? 'Producto'); ?></h1>
            
            <?php if ($precio_anterior): ?>
                <p class="precio-antiguo">Precio antiguo: <span class="tachado">$<?php echo number_format($precio_anterior, 2); ?></span></p>
                <p class="porcentaje-descuento">Descuento: <span class="rojo"><?php echo round($descuento, 2); ?>%</span></p>
                <p class="precio-actual">Precio actual: $<?php echo number_format($precio_actual, 2); ?></p>
            <?php else: ?>
                <p class="precio-producto"><?php echo '$' . number_format($precio_actual, 2); ?></p>
            <?php endif; ?>
            
            <p class="envio-disponibilidad">Envío estimado: 3-5 días hábiles</p>
            <p class="envio-disponibilidad">Envío a Ixtlan del Rio, Nayarit</p>
            <p class="stock-disponibilidad">Stock disponible: <span class="stock">En existencia</span></p>
            <button class="boton-comprar" onclick="comprarProducto(this)">Comprar ahora</button>
            <button class="boton-carrito" data-id="<?php echo htmlspecialchars($id_producto); ?>" onclick="agregarAlCarrito(this)">Añadir al Carrito</button>
        </div>
    </section>

    <?php
    if (isset($producto['tipo']) && $producto['tipo'] === 'celular') {
        include '../links/celular.php';
    }

    if (isset($producto['tipo']) && $producto['tipo'] === 'computadora') {
        include '../links/compu.php';
    }


    if (isset($producto['tipo']) && $producto['tipo'] === 'electrodomestico') {
        include '../links/electrodomestico.php';
    }


    if (isset($producto['tipo']) && $producto['tipo'] === 'television') {
        include '../links/television.php';
    }

    if (isset($producto['tipo']) && $producto['tipo'] === 'videojuego') {
        include '../links/videojuego.php';
    }

    if (isset($producto['tipo']) && $producto['tipo'] === 'audifonos') {
        include '../links/audifonos.php';
    }

    if (isset($producto['tipo']) && $producto['tipo'] === 'reloj') {
        include '../links/reloj.php';
    }
    ?>

    <?php include '../links/footer2.php'; ?>
    
    <script src="../scripts.js"></script>
</body>
</html>
