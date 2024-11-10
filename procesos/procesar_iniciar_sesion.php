<?php
include '../conexion.php';
session_start();

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $pass = $_POST['contrasena'];

    $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $validar_usuario = $conexion->prepare('SELECT * FROM persona WHERE correo = :CORREO LIMIT 1');
    $validar_usuario->execute(array(':CORREO' => $correo));
    $resultado = $validar_usuario->fetch();

    if ($resultado) {
        // Verifica la contraseña ingresada con la almacenada
        if (password_verify($pass, $resultado['contrasena'])) {
            $_SESSION['usuario'] = $resultado['nombre_usuario'];
            $_SESSION['usuario_id'] = $resultado['id']; 
            $user_rol = $resultado['rol'];
    
            if ($user_rol == 1) {
                header("Location: ../index1.php");
            } else {
                $redirect_url = $_SESSION['url_referer'] ?? '../index.php';
                unset($_SESSION['url_referer']); 
                header("Location: $redirect_url");
                exit;
            }
            exit;
        } else {
            $errores = '<li>La contraseña es incorrecta</li>';
        }
    } else {
        $errores = '<li>El correo no está registrado</li>';
    }
    

    if (!empty($errores)) {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Error de Inicio de Sesión</title>
            <link rel="stylesheet" href="style.css"> 
            <link rel="stylesheet" href="styles_contacto.css"> 
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f2f2f2;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    animation: fadeIn 0.5s ease-in;
                }

                @keyframes fadeIn {
                    from { opacity: 0; }
                    to { opacity: 1; }
                }

                .error-container {
                    background: white;
                    border-radius: 8px;
                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                    padding: 20px;
                    max-width: 400px;
                    text-align: center;
                }

                h1 {
                    color: #d9534f; 
                }

                ul {
                    list-style-type: none;
                    padding: 0;
                    margin: 15px 0;
                    color: #333;
                }

                button {
                    background-color: #d9534f;
                    color: white;
                    border: none;
                    border-radius: 5px;
                    padding: 10px 15px;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                }

                button:hover {
                    background-color: #c9302c; 
                }

                .fade-out {
                    opacity: 0;
                    transition: opacity 0.5s ease;
                }
            </style>
        </head>
        <body>

            <div class="error-container fade-in">
                <h1>Error</h1>
                <ul>
                    <?php echo $errores; ?>
                </ul>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const errorContainer = document.querySelector('.error-container');

                    setTimeout(function() {
                        errorContainer.classList.add('fade-out');
                        setTimeout(function() {
                            window.location.href = '../iniciar_sesion.php';
                        }, 500);
                    }, 3000);
                });
            </script>
        </body>
        </html>
        <?php
    }
}
?>
