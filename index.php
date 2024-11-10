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

    <div class="banner">
        <img src="imagenes/banner2.png" alt="Banner de productos" onclick="window.location.href='ofertas.php'" style="cursor: pointer;">
    </div>

    <div class="contenido-principal">
        <aside class="barra-lateral">

            <div class="ofertas-seccion">
                <h3>Ofertas</h3>
                <ul class="ordencuadritos">
                    <li><p>15% de descuento en todos los celulares</p></li>
                    <li><p>Compra 1 videojuego, y lleva el otro al %50</p></li>
                </ul>
            </div>
        
            <div class="nuevos-productos">
                <h3>Nuevos Productos</h3>
                <ul class="ordencuadritos">
                    <li><p>iPhone 16 Pro - $32,999</p></li>
                    <li><p>Apple Watch Series 10 - $11,999</p></li>
                </ul>
            </div>
        
            <div class="nuevo-lanzamiento-iphone">
                <h3>Lanzamiento iPhone 16 Apple</h3>
                <ul class="ordencuadritos">
                    <li><p>Explora las nuevas características del iPhone 16.</p></li>
                    <li><p>Descubre los diferentes modelos y sus especificaciones.</p></li>
                </ul>
            </div>
        
        </aside>
        
        <section class="productos2">
            <div>
                <img src="imagenes/iphone16pronegro.png" alt="iPhone 16 Pro" 
                     onclick="window.location.href='articulos/articulos.php?id=16'" 
                     style="cursor: pointer;">
                <p class="nombre-producto">iPhone 16 Pro Negro</p>
                <p class="precio-producto">$38,499</p>
            </div>
            
            <div>
                <img src="imagenes/xboxsx.png" alt="Xbox Series X" 
                     onclick="window.location.href='articulos/articulos.php?id=75'" 
                     style="cursor: pointer;">
                <p class="nombre-producto">Xbox Series X</p>
                <p class="precio-producto">$11,999</p>
            </div>

            <div>
                <img src="imagenes/watchs10.png" alt="Apple Watch Series 10" 
                     onclick="window.location.href='articulos/articulos.php?id=72'" 
                     style="cursor: pointer;">
                <p class="nombre-producto">Apple Watch Series 10</p>
                <p class="precio-producto">$11,999</p>
            </div>

            <div>
                <img src="imagenes/iphone15protitanionegro.png" alt="iPhone 15 Pro" 
                     onclick="window.location.href='articulos/articulos.php?id=11'" 
                     style="cursor: pointer;">
                <p class="nombre-producto">Apple iPhone 15 Pro</p>
                <p class="precio-producto">$28,999</p>
            </div>
        </section>
    </div>

    <?php include 'links/footer.php'; ?>

    <script src="scripts.js"></script>
</body>
</html>
