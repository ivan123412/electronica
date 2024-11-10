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
        <h2>Producto agregado al carrito</h2>
        <div id="detalles-producto"></div> 
        <button class="boton-comprar" onclick="window.location.href='carrito.php'">Ver carrito</button>
        <button class="boton-carrito" onclick="window.location.href='index.php'">Seguir comprando</button>
    </section>

    <?php include 'links/footer.php'; ?>

    <!-- Scripts -->
    <script src="scripts.js"></script>
    <script>
        // Mostrar detalles del producto
        const productoAgregado = JSON.parse(sessionStorage.getItem('productoAgregado'));
        if (productoAgregado) {
            const detalles = `
                <h3>Producto: ${productoAgregado.nombre}</h3>
                <p>Precio: ${productoAgregado.precio}</p>
                <p>Envío: ${productoAgregado.envio}</p>
                <p>Stock: ${productoAgregado.stock}</p>
                <img src="${productoAgregado.imagen}" alt="${productoAgregado.nombre}" id="imagen-producto" style="cursor:pointer;">
            `;
            document.getElementById('detalles-producto').innerHTML = detalles;

            // Agregar evento de clic a la imagen para redirigir a la página del producto
            document.getElementById('imagen-producto').addEventListener('click', function() {
                window.location.href = productoAgregado.pagina; // Redirigir a la página del producto
            });
        }
    </script>
</body>
</html>
