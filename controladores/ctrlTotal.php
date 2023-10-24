<?php
require_once '../modelos/carrito.php';

require_once '../modelos/auth.php';
    $mostrar = new carrito();
    $auth = new Auth();
    if ($auth->isLoggedIn()) {
        $userID = $auth->getUserId();
    $total = $mostrar->mostrarTotal($userID); // Obtiene la lista de cursos
    } else {
        echo'no se hicio sesion';
    } 