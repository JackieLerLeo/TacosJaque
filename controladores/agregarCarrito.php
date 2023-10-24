<?php
require_once '../modelos/carrito.php';
require_once '../modelos/auth.php';
//require_once '../modelos/mostrar.php';
require_once '../modelos/conexion.php';


// Verifica si se ha enviado el ID del curso por la URL
if (isset($_GET['id']) && isset($_GET['cantidad'])) {
    // Recibe el ID del curso y la cantidad
    $producto = $_GET['id'];
    $cantidad = $_GET['cantidad'];

 

    // Resto del código para agregar el producto al carrito
    $auth = new Auth();
    if ($auth->isLoggedIn()) {
        $userID = $auth->getUserId();
        $carrito = new carrito();
       // echo 'idProducto= '.$producto.' cantidad= '.$cantidad.' user = '.$userID;
        $carrito->agregarCarrito($userID, $producto, $cantidad);
    }


}
?>