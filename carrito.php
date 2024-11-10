<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: iniciar_sesion.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $total = 0; 
    foreach ($_POST['cantidad'] as $producto_id => $cantidad) {

        $consulta_cantidad_actual = "SELECT SUM(cantidad) AS total_cantidad FROM persona_producto WHERE usuario_id = :usuario_id AND producto_id = :producto_id";
        $stmt_cantidad = $conexion->prepare($consulta_cantidad_actual);
        $stmt_cantidad->bindValue(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt_cantidad->bindValue(':producto_id', $producto_id, PDO::PARAM_INT);
        $stmt_cantidad->execute();
        $cantidad_actual = $stmt_cantidad->fetch(PDO::FETCH_ASSOC)['total_cantidad'];


        if ($cantidad < $cantidad_actual) {
            $diferencia = $cantidad_actual - $cantidad;


            while ($diferencia > 0) {

                $consulta_eliminar = "SELECT id FROM persona_producto WHERE usuario_id = :usuario_id AND producto_id = :producto_id AND cantidad = 1 LIMIT 1";
                $stmt_eliminar = $conexion->prepare($consulta_eliminar);
                $stmt_eliminar->bindValue(':usuario_id', $usuario_id, PDO::PARAM_INT);
                $stmt_eliminar->bindValue(':producto_id', $producto_id, PDO::PARAM_INT);
                $stmt_eliminar->execute();
                $producto_a_eliminar = $stmt_eliminar->fetch(PDO::FETCH_ASSOC);

                if ($producto_a_eliminar) {

                    $consulta_borrar = "DELETE FROM persona_producto WHERE id = :id";
                    $stmt_borrar = $conexion->prepare($consulta_borrar);
                    $stmt_borrar->bindValue(':id', $producto_a_eliminar['id'], PDO::PARAM_INT);
                    $stmt_borrar->execute();
                    $diferencia--;
                } else {

                    $consulta_reducir = "UPDATE persona_producto SET cantidad = cantidad - 1 WHERE usuario_id = :usuario_id AND producto_id = :producto_id AND cantidad > 1 LIMIT 1";
                    $stmt_reducir = $conexion->prepare($consulta_reducir);
                    $stmt_reducir->bindValue(':usuario_id', $usuario_id, PDO::PARAM_INT);
                    $stmt_reducir->bindValue(':producto_id', $producto_id, PDO::PARAM_INT);
                    $stmt_reducir->execute();
                    $diferencia--;
                }
            }
        } elseif ($cantidad > $cantidad_actual) {

            $diferencia = $cantidad - $cantidad_actual;


            $consulta_actualizar = "UPDATE persona_producto SET cantidad = cantidad + :diferencia WHERE usuario_id = :usuario_id AND producto_id = :producto_id AND cantidad = 1 LIMIT 1";
            $stmt_actualizar = $conexion->prepare($consulta_actualizar);
            $stmt_actualizar->bindValue(':diferencia', $diferencia, PDO::PARAM_INT);
            $stmt_actualizar->bindValue(':usuario_id', $usuario_id, PDO::PARAM_INT);
            $stmt_actualizar->bindValue(':producto_id', $producto_id, PDO::PARAM_INT);
            $stmt_actualizar->execute();
        }


        $consulta_precio = "SELECT p.precio FROM inventario p WHERE p.id = :producto_id";
        $stmt_precio = $conexion->prepare($consulta_precio);
        $stmt_precio->bindValue(':producto_id', $producto_id, PDO::PARAM_INT);
        $stmt_precio->execute();
        $precio = $stmt_precio->fetch(PDO::FETCH_ASSOC)['precio'];

        $total += $precio * $cantidad; 
    }

    header("Location: carrito.php"); 
    exit();
}

$consulta_productos = "SELECT p.id AS producto_id, p.nombre_producto, p.precio, p.descripcion, p.imagen_url, pp.cantidad
                       FROM persona_producto pp
                       JOIN inventario p ON pp.producto_id = p.id
                       WHERE pp.usuario_id = :usuario_id";
$stmt = $conexion->prepare($consulta_productos);
$stmt->bindValue(':usuario_id', $usuario_id, PDO::PARAM_INT);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

$productos = [];
$total = 0;
foreach ($resultado as $producto) {
    $producto_id = $producto['producto_id'];
    if (isset($productos[$producto_id])) {
        $productos[$producto_id]['cantidad'] += $producto['cantidad'];
    } else {
        $productos[$producto_id] = [
            'nombre_producto' => $producto['nombre_producto'],
            'precio' => $producto['precio'],
            'descripcion' => $producto['descripcion'],
            'imagen_url' => "imagenes/" . $producto['imagen_url'],
            'cantidad' => $producto['cantidad']
        ];
    }
}

foreach ($productos as $producto) {
    $total += $producto['precio'] * $producto['cantidad'];
}

$conexion = null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include 'links/encabezado.php'; ?>

    <main>
        <div class="carrito-compras">
            <h1 class="titulo-carrito">Tu carrito de compras</h1>
            <form action="carrito.php" method="POST">
                <div class="lista-productos">
                    <?php foreach ($productos as $producto_id => $producto): ?>
                        <div class="producto">
                            <img src="<?php echo $producto['imagen_url']; ?>" alt="<?php echo $producto['nombre_producto']; ?>" class="imagen-producto">
                            <div class="detalles-producto">
                                <h2 class="nombre-producto"><?php echo $producto['nombre_producto']; ?></h2>
                                <p class="descripcion-producto"><?php echo $producto['descripcion']; ?></p>
                                <p class="cantidad-producto">Cantidad: 
                                    <input type="number" name="cantidad[<?php echo $producto_id; ?>]" value="<?php echo $producto['cantidad']; ?>" min="0" class="cantidad-input">
                                </p>
                                <p class="precio-producto">Precio: $<?php echo $producto['precio']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <h2 class="total">Total a pagar: $<?php echo number_format($total, 2); ?></h2>
                <button type="submit" class="boton-comprar">Actualizar Carrito</button>
            </form>
            <a href="iniciar_sesion.html" class="boton-comprar">Proceder al Pago</a>
        </div>
    </main>

    <?php include 'links/footer.php'; ?>

    <script src="scripts.js"></script>
</body>
</html>
