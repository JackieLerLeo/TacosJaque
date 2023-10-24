
    //Agregamos funcionalidad al boton Agregar al carrito
    var botonagregarAlCarrito = document.getElementsByClassName('agregarAlCarrito');
    for(var i=0; i<botonagregarAlCarrito.length;i++){
        var button = botonAgregarAlCarrito[i];
        button.addEventListener('click', agregarAlCarrito);
    }
/*
    function agregarItemAlCarrito(titulo, precio, imagenSrc){
        var item = document.createElement('div');
        item.classList.add = ('item');
        var itemsCarrito = document.getElementsByClassName('carrito-items')[0];
    
        //controlamos que el item que intenta ingresar no se encuentre en el carrito
        var nombresItemsCarrito = itemsCarrito.getElementsByClassName('carrito-item-titulo');
        for(var i=0;i < nombresItemsCarrito.length;i++){
            if(nombresItemsCarrito[i].innerText==titulo){
                alert("El item ya se encuentra en el carrito");
                return;
            }
        }
        var itemCarritoContenido = `
        <div class="carrito-item">
            <img src="${imagenSrc}" width="80px" alt="">
            <div class="carrito-item-detalles">
                <span class="carrito-item-titulo">${titulo}</span>
                <div class="selector-cantidad">
                    <i class="fa-solid fa-minus restar-cantidad"></i>
                    <input type="text" value="1" class="carrito-item-cantidad" disabled>
                    <i class="fa-solid fa-plus sumar-cantidad"></i>
                </div>
                <span class="carrito-item-precio">${precio}</span>
            </div>
            <button class="btn-eliminar">
                <i class="fa-solid fa-trash"></i>
            </button>
        </div>
    `
    item.innerHTML = itemCarritoContenido;
    itemsCarrito.append(item);

    //Agregamos la funcionalidad eliminar al nuevo item
     item.getElementsByClassName('btn-eliminar')[0].addEventListener('click', eliminarItemCarrito);

    //Agregmos al funcionalidad restar cantidad del nuevo item
    var botonRestarCantidad = item.getElementsByClassName('restar-cantidad')[0];
    botonRestarCantidad.addEventListener('click',restarCantidad);

    //Agregamos la funcionalidad sumar cantidad del nuevo item
    var botonSumarCantidad = item.getElementsByClassName('sumar-cantidad')[0];
    botonSumarCantidad.addEventListener('click',sumarCantidad);

    //Actualizamos total
    actualizarTotalCarrito();
}*/