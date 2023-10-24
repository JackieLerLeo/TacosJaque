<?php include '../controladores/ctrlMostrarCarrito.php';
include '../controladores/ctrlTotal.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../assets/css/iniciousuario.css">
    <link rel="icon" href="../assets/imagenes/Tacos.jpg">

    <script>
    src = '../assets/js/carrito.js';
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/headerMenu.css">

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
                            <li><a href="menu.php">Menu</a></li>
                            <li><a href="./contactus.html">Contacto</a></li>

                        </ul>
                        <div class="icons">
                            <i class="bx bxs-user" id="user-btn"><i class="fa-solid fa-user"></i></i>
                            <a href="listaDeseo.php" class="cart-btn"><i class="bx bx-heart"><i
                                        class="fa-solid fa-heart"></i></i><sup>0</sup></a>


                        </div>
                        <div class="user-box">
                            <p>usuario: <span><?php echo $_SESSION['usuarios_usuario'];?></span></p>
                            <p>email: <span><?php echo $_SESSION['usuarios_email'];?></span></p>
                            <a href="./Login.php" class="btn">login</a>
                            <a href="./registrarse.html" class="btn">registrarse</a>
                            <form method="post">
                                <button type="submit" name="logout" class="logout-btn">Log Out</button>
                            </form>
                        </div>
                    </nav>
                </div>
            </nav>
        </div>

    </header>
    <main class="products container">
        <h2></h2>
        <h2>Producto</h2>

        <div class="box">

        </div>

        <h2>Tacos</h2>
        <?php foreach ($productos as $producto) { ?>
        <div class="product-info">
            <div class="product">
                <div class="box">
                <img src="../assets/img/<?php echo $producto['foto']; ?>" alt="">
                    <p><?php echo $producto['id_producto']; ?>
                    <p>
                    <h3><?php echo $producto['nombre_producto']; ?></h3>
                    <p>PRECIO $<?php echo $producto['precio']; ?></p>
                    <p>SUBTOTAL $ <?php echo $producto['subtotal']; ?></p>
                    <p>CANTIDAD <?php echo $producto['cantidad']; ?></p>
                </div>
                <button id="checkout"><a
                        href="../controladores/ctrlBorrarElementoCarrito.php?id=<?php echo $producto['id_producto']; ?>">
                        borrar</a></button>

            </div>
            <?php } ?>

        </div>

    </main>
    <?php foreach ($total as $t) { ?>
            <p>TOTAL $<?php echo $t['total']; ?></p>
            <?php } ?>
    <button id="checkout"><a href="../controladores/ctrlComprarCarrito.php">Realizar Compra</a></button>

    <script>
    $(document).ready(function() {
        // Manejar el clic en el botón para eliminar un elemento del carrito
        $('.eliminar-elemento').click(function() {
            var id_producto = $(this).data('producto-id');
            var confirmation = confirm(
                "¿Estás seguro de que deseas eliminar este elemento del carrito?");
            if (confirmation) {
                eliminarElementoDelCarrito(id_producto, $(this));
            }
        });

        function eliminarElementoDelCarrito(producto_id, elemento) {
            $.ajax({
                url: '../controladores/ctrlBorrarElementoCarrito.php?id=' + producto_id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    alert(response.message);
                    if (response.success) {
                        alert(response.message);
                        // Actualiza la sección del carrito con la respuesta del servidor
                        $('#cart-items').html(response.cartItemsHtml);
                    } else {
                        alert('Hubo un error al eliminar el elemento del carrito.');
                    }
                }
            });
        }
    });
    </script>

</body>

</html>