<?php
require_once("../modelos/conexion.php");
require_once '../modelos/a.php';
$conexion = new Conexion();
$crearCurso = new a($conexion->conectar());


if (isset($_GET['id'])) {
    $producto_id = $_GET['id'];
//echo''.$producto_id.'';
    // Recoge los datos del formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nombre_producto = $_POST['nombre_producto'];
       // echo''.$nombre_producto.'';
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $status = $_POST['status'];

        // Asegúrate de validar la subida de la imagen
        $foto = $_FILES['foto'];
       // echo''.$foto.'';
        $foto = $_FILES['foto'];


/*echo 'Nombre del archivo: ' . $foto['name'] . '<br>';
echo 'Nombre temporal del archivo: ' . $foto['tmp_name'] . '<br>';
echo 'Tipo del archivo: ' . $foto['type'] . '<br>';
echo 'Tamaño del archivo: ' . $foto['size'] . '<br>';
echo 'Código de error: ' . $foto['error'] . '<br>';*/

        // Valida los tipos de datos y convierte a números según sea necesario
        $status = intval($status);
        $precio = doubleval($precio);
        $stock = intval($stock);
        $producto_id = intval($producto_id);
 //echo 'ESTATUS'. $status;
        // Ahora, llama a la función Actualizar pasando los datos correctos
     $curso = $crearCurso->Actualizar($nombre_producto, $foto, $precio, $stock, $status, $producto_id);
    } else {
        echo "No se recibió una solicitud POST.";
    }
}

?>