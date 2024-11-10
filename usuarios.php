<?php 
session_start();
include 'conexion.php';

$query = 'SELECT id, nombre_usuario, correo, rol FROM persona WHERE id NOT IN (1, 2, 3)';
$stmt = $conexion->prepare($query);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Electrónica - Gestión de Usuarios</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<style>
    .contenedor-usuarios {
        margin: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
    }
    .tabla-usuarios {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    .th-usuarios, .td-usuarios {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    .th-usuarios {
        background-color: #757575;
        color: white;
        font-weight: bold;
    }
    .td-usuarios {
        color: #555;
    }
    .fila-usuarios:nth-child(even) {
        background-color: #f2f2f2;
    }
    .btn {
        padding: 5px 10px;
        color: white;
        text-decoration: none;
        border-radius: 3px;
    }
    .btn-editar {
        background-color: #5cb85c;
    }
    .btn-eliminar {
        background-color: #d9534f;
    }
</style>

<body>

<nav>
    <a href="index1.php">Inicio</a>
    <a href="administrador.php">Administrador</a>
</nav>

<div class="contenedor-usuarios">
    <h2 class="titulo-usuarios">Gestión de Usuarios</h2>

    <?php if (count($usuarios) > 0): ?>
        <table class="tabla-usuarios">
            <thead>
                <tr>
                    <th class="th-usuarios">ID</th>
                    <th class="th-usuarios">Nombre</th>
                    <th class="th-usuarios">Correo</th>
                    <th class="th-usuarios">Rol</th> <!-- Nueva columna para Rol -->
                    <th class="th-usuarios">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr class="fila-usuarios">
                        <td class="td-usuarios"><?php echo htmlspecialchars($usuario['id']); ?></td>
                        <td class="td-usuarios"><?php echo htmlspecialchars($usuario['nombre_usuario']); ?></td>
                        <td class="td-usuarios"><?php echo htmlspecialchars($usuario['correo']); ?></td>
                        <td class="td-usuarios">
                            <?php 
                                // Verificar el rol y mostrar "administrador" o "usuario"
                                if ($usuario['rol'] == 1) {
                                    echo 'Administrador';
                                } elseif ($usuario['rol'] == 2) {
                                    echo 'Usuario';
                                } else {
                                    echo 'Rol desconocido';
                                }
                            ?>
                        </td>
                        <td class="td-usuarios">
                            <a href="editar_usuario.php?id=<?php echo $usuario['id']; ?>" class="btn btn-editar">Editar</a>
                            <a href="eliminar_usuario.php?id=<?php echo $usuario['id']; ?>" class="btn btn-eliminar" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="sin-usuarios">No hay usuarios disponibles para mostrar.</p>
    <?php endif; ?>
</div>

<footer>
    <div class="contenido-pie">
        <div class="seccion-pie">
            <h4>Electrónicos Jacobo's</h4>
            <p>Nuestras redes sociales:</p>
            <div class="sociales-pie">
                <img src="imagenes/google.png" alt="Google">
                <img src="imagenes/facebook.png" alt="Facebook">
                <img src="imagenes/instagram.png" alt="Instagram">
                <img src="imagenes/youtube.png" alt="YouTube">
                <img src="imagenes/whatsapp.png" alt="WhatsApp">
            </div>
        </div>
        <div class="seccion-pie">
            <h4>Ayuda</h4>
            <p><a href="#">Atención al cliente</a></p>
            <p><a href="#">Ayuda al cliente</a></p>
            <p><a href="#">Gestión de datos</a></p>
            <p><a href="#">Gestión de contenido</a></p>
        </div>
        <div class="seccion-pie">
            <h4>Métodos de pago</h4>
            <p><a href="#">Gestionar métodos de pago</a></p>
            <p><a href="#">Pago a meses</a></p>
            <p><a href="#">Pago en efectivo</a></p>
            <p><a href="#">Tarjetas de regalo</a></p>
        </div>
        <div class="seccion-pie">
            <h4>Conócenos</h4>
            <p><a href="#">Información corporativa</a></p>
            <p><a href="#">Departamento de prensa</a></p>
            <p><a href="#">Alertas de revisión</a></p>
            <p><a href="#">Contrato de seguridad</a></p>
        </div>
        <div class="seccion-pie">
            <h4>Trabaja con nosotros</h4>
            <p><a href="#">Vender tus productos</a></p>
            <p><a href="#">Suminístrate con nosotros</a></p>
            <p><a href="#">Programa de afiliados</a></p>
            <p><a href="#">Protege y desarrolla tu marca</a></p>
        </div>
    </div>
    <p>Copyright © 1999-2024. Electrónica Jacobo, Nayarit, México</p>
</footer>

<script src="scripts.js"></script>
</body>
</html>
