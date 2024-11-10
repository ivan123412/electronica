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

    <?php include 'links/encabezado.php'; ?>

    <section class="confirmacion-carrito">
        <h2>Producto comprado con exito</h2>
        <div id="detalles-producto-compra"></div>
        <button class="boton-carrito" onclick="window.location.href='index.php'">Seguir comprando</button>
    </section>

    <?php include 'links/footer.php'; ?>
    
    <script src="scripts.js"></script>
    <script>

        const productoCompra = JSON.parse(sessionStorage.getItem('productoCompra'));
        if (productoCompra) {
            const detalles = `
                <h3> ${productoCompra.nombre}</h3>
                <p>Precio: ${productoCompra.precio}</p>
                <!-- Agregar más detalles si es necesario -->
            `;
            document.getElementById('detalles-producto-compra').innerHTML = detalles;
        }
    </script>
</body>
</html>