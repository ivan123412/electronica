<header>
    <div class="contenedor-encabezado">
        <input type="text" id="search-query" placeholder="Buscar productos...">
        <a href="../carrito.php" class="enlace-carrito">
            <img src="../imagenes/carrito1.png" alt="Carrito" class="icono-carrito" data-gif="../gifs/carrito1.gif" data-gif2="../gifs/carrito2.gif">
        </a>            
        <a href="#" id="buscar-enlace" class="buscador">
            <img src="../imagenes/buscar.png" alt="Buscar" class="buscador">
        </a>
        <a href="../opciones.php" class="opciones">
            <img src="../imagenes/opciones.png" alt="Opciones" class="opciones">
        </a>
        <a href="../mensajes.php" class="mensajes">
            <img src="../imagenes/mensajes.png" alt="Mensajes" class="mensajes1" data-gif="../gifs/mensajes1.gif" data-gif2="../gifs/mensajes2.gif">
        </a>
        <a href="../iniciar_sesion2.php" class="iniciar">
            <img src="../imagenes/usuario.png" alt="Iniciar" class="iniciar">
        </a>
    </div>
</header>

<nav>
    <a href="../index.php">Inicio</a>
    <a href="../ofertas.php">Ofertas</a>
    <a href="../todo.php">Todo</a>
    <a href="../celulares.php">Celulares</a>
    <a href="../videojuegos.php">Videojuegos</a>
    <a href="../electrodo.php">Electrodomésticos</a>
    <a href="../computadoras.php">Computadoras</a>
    <?php if (isset($_SESSION['usuario'])): ?>
        <a href="contacto.php">Contacto</a>
    <?php endif; ?>
    <a href="<?php echo isset($_SESSION['usuario']) ? '../cuenta.php' : '../iniciar_sesion.php'; ?>">
        <?php
        if (!isset($_SESSION['usuario'])) {
            echo "Iniciar sesión";
        } else {
            $primer_nombre = explode(' ', trim($_SESSION['usuario']))[0];
            echo "Cuenta de " . ucfirst(strtolower(htmlspecialchars($primer_nombre)));
        }
        ?>
    </a>
</nav>

<?php
if (!isset($_SESSION['usuario'])) {
    $_SESSION['sesion_activa'] = false;
} else {
    $_SESSION['sesion_activa'] = true;
}
?>

<script>
    var isSessionActive = <?php echo json_encode($_SESSION['sesion_activa']); ?>;


    function realizarBusqueda() {
        var query = document.getElementById('search-query').value.trim(); 

        if (query) {
            window.location.href = '../buscar.php?query=' + encodeURIComponent(query); 
        } else {
            alert('Por favor ingrese un término de búsqueda.');
        }
    }


    document.querySelector('.buscador').addEventListener('click', function(event) {
        event.preventDefault();
        realizarBusqueda();
    });

    document.getElementById('search-query').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault(); 
            realizarBusqueda(); 
        }
    });
</script>
