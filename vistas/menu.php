<?php include '../controladores/ctrlMostrarProducto.php'  ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/iniciousuario.css">
    <link rel="icon" href="../assets/imagenes/Tacos.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/headerMenu.css">
    <link rel="stylesheet" href="../assets/js/styles.css">
</head>
<body>
    <header class="header">
        <img class="bg" src="../assets/imagenes/bg.svg" alt="">
        <div class="menu container">
            <a class="logo"><img src="../assets/imagenes/Tacos.jpg" alt="Logo"></a>
            <input type="checkbox" id="menu">
            <nav class="nav">
                <div class="flex">
                    <nav class="navbar">
                        <ul>
                            <li><a href="../index.html">Inicio</a></li>
                            <li><a href="./contactus.html">Contacto</a></li>
                            <li><a href="editarproductos.php">EDITAR PRODUCTOS</a></li>
                            <li><a href="subirproductos.php">SUBIR PRODUCTOS</a></li>
                            <div class="icons">
                                <i class="bx bxs-user" id="user-btn"><i class="fa-solid fa-user"></i></i>
                                <a href="listaDeseo.php" class="cart-btn"><i class="bx bx-heart"><i class="fa-solid fa-heart"></i></i><sup>0</sup></a>
                                <a href="carrito.php" class="cart-btn"><i class="bx bx-download"><i class="fa-solid fa-cart-shopping"  id="contador-value"></i></i><sup>0</sup></a>
                                <i class="bx bx-list-plus" id="menu-btn" style="font-size: 2rem;"><i class="fa-solid fa-bars"></i></i>
                            </div>
                            <div class="user-box">
                                <form method="post">
                                    <button type="submit" name="logout" class="logout-btn">Log Out</button>
                                </form>
                            </div>
                            <div>
                                <a class="nav-link" href="carrito.php" id="contador">
                                    <img src="../assets/img/carrito.png" alt="" width="25px" height="auto">
                                    <div class="carrito-container">
                                        <span id="contador-value">contador</span>
                                    </div>
                                </a>
                            </div>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
        <div class="header-content container">
            <div class="header-info">
                <div class="header-txt">
                    <h1>Disfruta de nuestros mejores productos</h1>
                    <p>
                        Nuestros productos de menú son el resultado de una cuidadosa selección de ingredientes frescos y
                        de alta calidad, combinados con sabores auténticos y recetas tradicionales para ofrecer una
                        un sabor único e inolvidable.
                    </p>
                </div>
                <div class="header-img">
                    <img src="../assets/imagenes/NiñaTacosMenu.jpg" alt="">
                </div>
            </div>
        </div>
    </header>
    
    <main class="products container">
        <h2>Tacos</h2>
        <div class="product-info">
            <?php foreach ($productos as $producto) { ?>
            <div class="product">
                <div class="box">
                    <img src="../assets/img/<?php echo $producto['foto']; ?>" alt="">
                    <h3><?php echo $producto['nombre_producto']; ?></h3>
                    <p>Stock: <?php echo $producto['stock']; ?></p>
                    <a class="add-to-cart"
                        href="../controladores/agregarCarrito.php?id=<?php echo $producto['id_producto']; ?>&cantidad=" id="add-to-cart-link-<?php echo $producto['id_producto']; ?>">Add to cart</a>
                    <div id="contador-<?php echo $producto['id_producto']; ?>">0</div>
                    <button onclick="aumentarContador(<?php echo $producto['id_producto']; ?>)">+</button>
                    <button onclick="disminuirContador(<?php echo $producto['id_producto']; ?>)">-</button>
                    <span>$<?php echo $producto['precio']; ?></span>
                </div>
            </div>
            <?php } ?>
        </div>
    </main>
</body>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../assets/js/styles.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "../controladores/contador_carrito.php", // Ruta al archivo de servidor
            type: "GET",
            success: function(data) {
                $("#contador-value").text("" + data); // Muestra el valor en la barra de navegación
            }
        });
    });
    function aumentarContador(idProducto) {
        var contador = document.getElementById('contador-' + idProducto);
        var valorActual = parseInt(contador.textContent);
        contador.textContent = valorActual + 1;
        actualizarURLCarrito(idProducto, valorActual + 1);
    }
    function disminuirContador(idProducto) {
        var contador = document.getElementById('contador-' + idProducto);
        var valorActual = parseInt(contador.textContent);
        if (valorActual > 0) {
            contador.textContent = valorActual - 1;
            actualizarURLCarrito(idProducto, valorActual - 1);
        }
    }
    function actualizarURLCarrito(idProducto, cantidad) {
        var link = document.getElementById('add-to-cart-link-' + idProducto);
        link.href = `../controladores/agregarCarrito.php?id=${idProducto}&cantidad=${cantidad}`;
    }
</script>
</html>
