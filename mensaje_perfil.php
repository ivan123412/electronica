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

    <main class="agradecimiento fade-in">
        <p>Cambios efectuados con éxito! Tu cuenta se actualizará en breve.</p>
    </main>

    <?php include 'links/footer.php'; ?>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const main = document.querySelector('main.agradecimiento');
            main.classList.add('fade-in');

            setTimeout(function() {
                main.classList.add('fade-out');
                setTimeout(function() {
                    window.location.href = 'cuenta.php';
                }, 500);
            }, 1500);
        });
    </script>
    <script src="scripts.js"></script>
</body>
</html>
