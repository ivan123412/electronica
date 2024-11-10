<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="fade-in">

    <main class="agradecimiento">
        <p>¡Bienvenido, <span id="nombre-usuario"></span>! Tu cuenta ha sido creada exitosamente.</p>
        <div class="icon">🎉</div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const nombreUsuario = sessionStorage.getItem('nombre_usuario');
            if (nombreUsuario) {
                document.getElementById('nombre-usuario').textContent = nombreUsuario;
            } else {
                document.getElementById('nombre-usuario').textContent = 'Usuario no encontrado.';
            }


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
