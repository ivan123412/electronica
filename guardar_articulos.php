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

    <?php include 'links/encabezado3.php'; ?>
    

    <div class="contenedor">
        <div class="cuadro-alta">
            <h2 class="titulo-alta">Alta de Artículos</h2>
            <form id="form-alta" action="producto_guardado.php" method="POST" enctype="multipart/form-data">
                <div class="campo">
                    <label for="nombre" class="etiqueta">Nombre del Producto:</label>
                    <input type="text" id="nombre" class="entrada" name="nombre" placeholder="Ingrese el nombre del producto" required>
                </div>
                <div class="campo">
                    <label for="descripcion" class="etiqueta">Descripción:</label>
                    <textarea id="descripcion" class="entrada" name="descripcion" placeholder="Ingrese una descripción del producto" required></textarea>
                </div>
                <div class="campo">
                    <label for="precio" class="etiqueta">Precio:</label>
                    <input type="number" id="precio" class="entrada" name="precio" placeholder="Ingrese el precio del producto" required>
                </div>
                <div class="campo">
                    <label for="cantidad" class="etiqueta">Cantidad:</label>
                    <input type="number" id="cantidad" class="entrada" name="cantidad" placeholder="Ingrese la cantidad disponible" required>
                </div>
                <div class="campo">
                    <label for="categoria" class="etiqueta">Categoría:</label>
                    <select id="categoria" class="entrada" name="categoria" required>
                        <option value="">Seleccione una categoría</option>
                        <option value="Celular">Celular</option>
                        <option value="Accesorio">Laptop</option>
                        <option value="Computadora">Computador</option>
                        <option value="Televisor">Televisor</option>
                        <option value="Audífono">Audífono</option>
                        <option value="Refrigerador">Refrigerador</option>
                        <option value="Estufa">Estufa</option>
                        <option value="Lavadora">Lavadora</option>
                        <option value="Secadora">Secadora</option>                        
                    </select>
                </div>
                <div class="campo">
                    <label for="imagen" class="etiqueta">Imagen del Producto:</label>
                    <input type="file" id="imagen" class="entrada" name="imagen" accept="image/*" required>
                </div>
                <button type="submit" class="boton-guardar">Guardar Artículo</button>
            </form>
            <p class="texto-regresar"><a href="index.html" class="enlace-regresar">Regresar al inicio</a></p>
        </div>
    </div>


    <?php include 'links/footer.php'; ?>

    <script src="scripts.js"></script>
</body>
</html>