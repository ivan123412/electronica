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

    <div class="contenedor">
        <div class="cuadro-alta">
            <div id="detalles-producto-compra" class="precio-final"></div>

            <form id="form-compra"  action="articulo_comprado.php" method="POST">
                <div class="campo">
                    <label for="nombre" class="etiqueta">Nombre Completo:</label>
                    <input type="text" id="nombre" class="entrada" name="nombre" placeholder="Ingrese su nombre completo" required>
                </div>
                <div class="campo">
                    <label for="direccion" class="etiqueta">Dirección de Entrega:</label>
                    <input type="text" id="direccion" class="entrada" name="direccion" placeholder="Ingrese su dirección de entrega" required>
                </div>
                <div class="campo">
                    <label for="telefono" class="etiqueta">Teléfono:</label>
                    <input type="tel" id="telefono" class="entrada" name="telefono" placeholder="Ingrese su número de teléfono" required>
                </div>
                <div class="campo">
                    <label for="email" class="etiqueta">Correo Electrónico:</label>
                    <input type="email" id="email" class="entrada" name="email" placeholder="Ingrese su correo electrónico" required>
                </div>

                <div class="campo">
                    <label for="metodo-pago" class="etiqueta">Método de Pago:</label>
                    <select id="metodo-pago" class="entrada" name="metodo_pago" required>
                        <option value="">Seleccione un método de pago</option>
                        <option value="Tarjeta de crédito">Tarjeta de crédito</option>
                        <option value="Tarjeta de débito">Tarjeta de débito</option>
                        <option value="Paypal">Paypal</option>
                        <option value="Efectivo">Efectivo</option>
                    </select>
                </div>
                <div class="campo">
                    <label for="numero-tarjeta" class="etiqueta">Número de Tarjeta:</label>
                    <input type="text" id="numero-tarjeta" class="entrada" name="numero_tarjeta" placeholder="Ingrese el número de su tarjeta" required>
                </div>
                <div class="campo">
                    <label for="expiracion" class="etiqueta">Fecha de Expiración:</label>
                    <input type="month" id="expiracion" class="entrada" name="expiracion" required>
                </div>
                <div class="campo">
                    <label for="cvv" class="etiqueta">CVV:</label>
                    <input type="text" id="cvv" class="entrada" name="cvv" placeholder="Ingrese el código de seguridad" required>
                </div>

                <button type="submit" class="boton-comprar">Realizar compra</button>
            </form>
        </div>
    </div>

    <?php include 'links/footer.php'; ?>
    
    <script src="scripts.js"></script>
    <script>
        // Mostrar detalles del producto
        const productoCompra = JSON.parse(sessionStorage.getItem('productoCompra'));
        if (productoCompra) {
            const detalles = `
                <h3>Producto: ${productoCompra.nombre}</h3>
                <p>Precio: ${productoCompra.precio}</p>
                <!-- Agregar más detalles si es necesario -->
            `;
            document.getElementById('detalles-producto-compra').innerHTML = detalles;
        }
    </script>
</body>
</html>
