<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Electrónica - Producto Guardado</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

    <?php include 'links/encabezado.php'; ?>

    <section class="confirmacion-carrito">
        <h1 class="titulo-mensajes">Producto Guardado</h1>
        <div class="contenedor-producto">
            <div id="detalle-producto"></div>
        </div>
        <a href="index1.php" class="boton-inicio">Volver al Inicio</a> 
    </section>
    

    <?php include 'links/footer.php'; ?>
    
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const productoAgregado = JSON.parse(sessionStorage.getItem('productoAgregado'));

        if (productoAgregado) {
            const detalleProducto = document.getElementById('detalle-producto');
            detalleProducto.innerHTML = `
                <h2>${productoAgregado.nombre}</h2>
                <p><strong>Descripción:</strong> ${productoAgregado.descripcion}</p>
                <p><strong>Precio:</strong> $${productoAgregado.precio}</p>
                <p><strong>Cantidad:</strong> ${productoAgregado.cantidad}</p>
                <p><strong>Categoría:</strong> ${productoAgregado.categoria}</p>
                <img src="${productoAgregado.imagen}" alt="${productoAgregado.nombre}" style="max-width: 200px;"/>
            `;
        } else {
            document.getElementById('detalle-producto').innerHTML = '<p>No se encontraron datos del producto.</p>';
        }
    });
    </script>
    <script src="scripts.js"></script>
</body>
</html>
