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
   
<div class="central-mensajes">
    <h2 class="titulo-mensajes">Central de Mensajes</h2>
    <div class="lista-mensajes">
        <div class="mensaje">
            <p class="texto-mensaje">Gracias por tu preferencia en Electronicos Jacobo.</p>
        </div>
        <div class="mensaje">
            <p class="texto-mensaje">No olvides revisar las ofertas especiales en nuestra tienda.</p>
        </div>
        <div class="mensaje">
            <p class="texto-mensaje">Tu pedido ha sido enviado.</p>
        </div>
        <div class="mensaje">
            <p class="texto-mensaje">Recuerda que podemos brindarte soporte en vivo. ¡Contáctanos!</p>
        </div>
    </div>
</div>


    
    <?php include 'links/footer.php'; ?>

    <script src="scripts.js"></script>
</body>
</html>
