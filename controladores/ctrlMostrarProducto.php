<?php
require_once '../modelos/productos_model.php';
require_once '../modelos/conexion.php';
    $mostrar = new mostrar();
    $productos = $mostrar->mostrarProductos(); // Obtiene la lista de cursos
?>