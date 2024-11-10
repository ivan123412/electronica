document.addEventListener("DOMContentLoaded", function() {

    function agregarEfectoHover(elemento) {
        if (!elemento) return; 
        elemento.addEventListener('mouseenter', function() {
            this.src = this.dataset.gif;
        });
        
        elemento.addEventListener('mouseleave', function() {
            this.src = this.dataset.gif2;
        });
    }

    const mensajeImg = document.querySelector('.mensajes1');
    const carritoImg = document.querySelector('.icono-carrito');
    agregarEfectoHover(mensajeImg);
    agregarEfectoHover(carritoImg);

    const barraLateral = document.querySelector('.barra-lateral');
    const pestaña = document.querySelector('.pestaña');

    if (barraLateral) {
        function expandirBarra() {
            barraLateral.style.transition = 'width 0.5s ease';
            barraLateral.style.width = '400px';
            pestaña.style.transition = 'left 0.5s ease';
            pestaña.style.left = '-60px';
        }

        function contraerBarra() {
            barraLateral.style.transition = 'width 0.5s ease';
            barraLateral.style.width = '200px';
            pestaña.style.transition = 'left 0.5s ease';
            pestaña.style.left = '-30px';
        }

        barraLateral.addEventListener('mouseover', expandirBarra);
        barraLateral.addEventListener('mouseout', contraerBarra);
    }

});



function comprarProducto(button) {
    const producto = {
        nombre: button.closest('.detalles-producto').querySelector('.titulo-producto').innerText,
        precio: button.closest('.detalles-producto').querySelector('.precio-actual') ? 
                button.closest('.detalles-producto').querySelector('.precio-actual').innerText : 
                button.closest('.detalles-producto').querySelector('.precio-producto').innerText,
        tiempoEntrega: 5,
    };

    // Almacena el producto en sessionStorage
    sessionStorage.setItem('productoCompra', JSON.stringify(producto));

    // Redirige según el estado de la sesión
    if (isSessionActive) {
        window.location.href = "../pagar.php"; // Redirigir a pagar.php si la sesión está activa
    } else {
        window.location.href = "../iniciar_sesion.php"; // Redirigir a iniciar_sesion.php si la sesión no está activa
    }
}



function agregarAlCarrito(button) {
    const especificaciones = button.closest('.contenedor-especificaciones');
    const productoId = button.getAttribute('data-id');
    const cantidadInput = especificaciones.querySelector('.cantidad-producto');
    const cantidad = cantidadInput ? cantidadInput.value : 1;

    const producto = {
        nombre: especificaciones.querySelector('.titulo-producto').innerText,
        precio: especificaciones.querySelector('.precio-actual') ? 
                especificaciones.querySelector('.precio-actual').innerText : 
                especificaciones.querySelector('.precio-producto').innerText,
        envio: especificaciones.querySelector('.envio-disponibilidad').innerText,
        stock: especificaciones.querySelector('.stock').innerText,
        imagen: especificaciones.querySelector('.imagen-producto img').src,
        pagina: especificaciones.querySelector('.imagen-producto img').getAttribute('data-pagina')
    };

    sessionStorage.setItem('productoAgregado', JSON.stringify(producto));

    if (isSessionActive) {
        window.location.href = `../procesos/procesar_carrito.php?producto_id=${productoId}&cantidad=${cantidad}`;
    } else {
        window.location.href = "../iniciar_sesion.php";
    }
}







document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('form-alta').addEventListener('submit', function(event) {
        event.preventDefault();

        const nombre = document.getElementById('nombre').value;
        const descripcion = document.getElementById('descripcion').value;
        const precio = document.getElementById('precio').value;
        const cantidad = document.getElementById('cantidad').value;
        const categoria = document.getElementById('categoria').value;
        const imagen = document.getElementById('imagen').files[0];

        const reader = new FileReader();
        reader.onload = function(e) {
            const producto = {
                nombre,
                descripcion,
                precio,
                cantidad,
                categoria,
                imagen: e.target.result 
            };


            sessionStorage.setItem('productoAgregado', JSON.stringify(producto));
            window.location.href = 'producto_guardado.php'; 
        };


        reader.readAsDataURL(imagen);
    });
});
