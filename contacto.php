<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Tienda de Electrónica</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

    <?php include 'links/encabezado.php'; ?>

    <main>
        <div class="informacion-contacto">
            <h1>Contacto</h1>
            <p>Si tienes alguna duda o necesitas soporte, por favor completa el siguiente formulario:</p>
        </div>

        <form action="procesos/procesar_contacto.php" method="POST" class="formulario-contacto">
        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" rows="4" required></textarea>
        <button type="submit">Enviar</button>
        </form>


        <div class="informacion-contacto">
            <h2>Otras formas de contacto:</h2>
            <p>Teléfono: 311-443-7184</p>
            <p>Email: soporte@electronicajacobos.com</p>
            <p>Síguenos en nuestras redes sociales para más actualizaciones.</p>
        </div>
    </main>

    <?php include 'links/footer.php'; ?>
    
    <script src="scripts.js"></script>
</body>
</html>
