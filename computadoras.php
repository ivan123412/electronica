<?php
session_start();
include 'conexion.php';


$orden = isset($_GET['orden']) ? $_GET['orden'] : 'desc'; 

if (isset($_GET['query']) && !empty($_GET['query'])) {
    $query = $_GET['query'];

    $stmt = $conexion->prepare("SELECT * FROM inventario WHERE nombre_producto LIKE :query AND tipo = 'computadora' ORDER BY precio " . ($orden === 'desc' ? 'DESC' : 'ASC'));
    $stmt->execute([':query' => '%' . $query . '%']);
} else {
    $stmt = $conexion->prepare("SELECT * FROM inventario WHERE tipo = 'computadora' ORDER BY precio " . ($orden === 'desc' ? 'DESC' : 'ASC'));
    $stmt->execute();
}

$resultados = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computadoras - Tienda de Electrónica</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'links/encabezado.php'; ?>

<h2 class="titulo">Computadoras</h2>

<div class="filtro">
    <form method="GET" action="">
        <label for="orden" class="filtro-label">Ordenar por precio:</label>
        <select name="orden" id="orden" class="filtro-select" onchange="this.form.submit()">
            <option value="asc" <?php if ($orden === 'asc') echo 'selected'; ?>>Más bajo a más alto</option>
            <option value="desc" <?php if ($orden === 'desc') echo 'selected'; ?>>Más alto a más bajo</option>
        </select>
        <?php if (isset($query)): ?>
            <input type="hidden" name="query" value="<?php echo htmlspecialchars($query); ?>">
        <?php endif; ?>
    </form>
</div>

<div class="productos">
    <?php if (!empty($resultados)): ?>
        <?php foreach ($resultados as $producto): ?>
            <div>
                <img src="imagenes/<?php echo htmlspecialchars($producto['imagen_url']); ?>" alt="<?php echo htmlspecialchars($producto['nombre_producto']); ?>" 
                     onclick="window.location.href='articulos/articulos.php?id=<?php echo htmlspecialchars($producto['id']); ?>'" 
                     style="cursor: pointer;">
                <p class="nombre-producto"><?php echo htmlspecialchars($producto['nombre_producto']); ?></p>
                <p class="precio-producto"><?php echo '$' . number_format($producto['precio'], 2); ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No se encontraron productos para "<?php echo isset($query) ? htmlspecialchars($query) : ''; ?>".</p>
    <?php endif; ?>
</div>

<?php include 'links/footer.php'; ?>

<script src="scripts.js"></script>
</body>
</html>
