<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Compras</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include 'links/encabezado.php'; ?>

<main>
    <div class="historial-compras">
        <h1 class="titulo-historial">Historial de Compras</h1>

    
        <div class="compra">
            <h2 class="fecha-compra">Fecha de compra: 20 de octubre de 2024</h2>
            <h3 class="numero-pedido">Número de pedido: #12345</h3>
            <p class="direccion-envio">Dirección de envío: Calle Ejemplo 123, Ciudad, Estado, Código Postal</p>
            <p class="metodo-pago">Método de pago: Tarjeta de crédito</p>
            <p class="estado-compra">Estado: Completo</p>
            <div class="lista-productos">
                <div class="producto">
                    <img src="imagenes/iphone12.png" alt="iPhone 12" class="imagen-producto">
                    <div class="detalles-producto">
                        <h2 class="nombre-producto">Apple iPhone 12</h2>
                        <p class="cantidad-producto">Cantidad: 1</p>
                        <p class="precio-producto">Precio: $12,999</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="imagenes/macbook1.png" alt="MacBook Air" class="imagen-producto">
                    <div class="detalles-producto">
                        <h2 class="nombre-producto">Apple MacBook Air</h2>
                        <p class="cantidad-producto">Cantidad: 1</p>
                        <p class="precio-producto">Precio: $13,299.99</p>
                    </div>
                </div>
            </div>
            <h2 class="total">Total: $26,298.99</h2>
        </div>

   
        <div class="compra">
            <h2 class="fecha-compra">Fecha de compra: 15 de octubre de 2024</h2>
            <h3 class="numero-pedido">Número de pedido: #12344</h3>
            <p class="direccion-envio">Dirección de envío: Calle Ejemplo 456, Ciudad, Estado, Código Postal</p>
            <p class="metodo-pago">Método de pago: PayPal</p>
            <p class="estado-compra">Estado: Completo</p>
            <div class="lista-productos">
                <div class="producto">
                    <img src="imagenes/ipadpro.png" alt="iPad Pro" class="imagen-producto">
                    <div class="detalles-producto">
                        <h2 class="nombre-producto">Apple iPad Pro</h2>
                        <p class="cantidad-producto">Cantidad: 1</p>
                        <p class="precio-producto">Precio: $11,199.99</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="imagenes/watchs10.png" alt="Apple Watch" class="imagen-producto">
                    <div class="detalles-producto">
                        <h2 class="nombre-producto">Apple Watch</h2>
                        <p class="cantidad-producto">Cantidad: 1</p>
                        <p class="precio-producto">Precio: $10,999.99</p>
                    </div>
                </div>
            </div>
            <h2 class="total">Total: $22,199.98</h2>
        </div>


        <div class="compra">
            <h2 class="fecha-compra">Fecha de compra: 10 de octubre de 2024</h2>
            <h3 class="numero-pedido">Número de pedido: #12343</h3>
            <p class="direccion-envio">Dirección de envío: Calle Ejemplo 789, Ciudad, Estado, Código Postal</p>
            <p class="metodo-pago">Método de pago: Transferencia bancaria</p>
            <p class="estado-compra">Estado: En preparación</p>
            <div class="lista-productos">
                <div class="producto">
                    <img src="imagenes/ipadpro.png" alt="iPad Pro" class="imagen-producto">
                    <div class="detalles-producto">
                        <h2 class="nombre-producto">Apple iPad Pro</h2>
                        <p class="cantidad-producto">Cantidad: 1</p>
                        <p class="precio-producto">Precio: $11,199.99</p>
                    </div>
                </div>
                <div class="producto">
                    <img src="imagenes/iphone12.png" alt="iPhone 12" class="imagen-producto">
                    <div class="detalles-producto">
                        <h2 class="nombre-producto">Apple iPhone 12</h2>
                        <p class="cantidad-producto">Cantidad: 1</p>
                        <p class="precio-producto">Precio: $12,999</p>
                    </div>
                </div>
            </div>
            <h2 class="total">Total: $24,198.99</h2>
        </div>

    </div>
</main>

<?php include 'links/footer.php'; ?>

<script src="scripts.js"></script>
</body>
</html>
