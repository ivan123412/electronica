<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperacion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="fade-in">

    <main class="agradecimiento">
        <p>En breve te enviaremos un correo de recuperación ¡Revisa tu bandeja!.</p>
        <div class="icon">📧</div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.classList.add('fade-in');

            setTimeout(function() {
                document.body.classList.add('fade-out');
                setTimeout(function() {
                    window.location.href = 'iniciar_sesion2.php';
                }, 500);
            }, 1500);
        });
    </script>

</body>
</html>
