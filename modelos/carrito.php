<?php

class carrito
{
    private $db;
    public function __construct()
    {
        $con = new Conexion();
        $this->db = $con->conectar();
    }
    public function carritosContador($id_usuario)
    {   //select  count(cantidad) from carrito where id_usuario=2;
        $query = "SELECT sum(cantidad) AS total FROM carrito WHERE id_usuario = :id_usuario";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $fila["total"];
            return $total; // Devuelve el valor en lugar de imprimirlo
        } else {
            return 0; // Devuelve 0 en caso de error
        }
    }
    private function actualizarStock($producto_id, $cantidad)
    {   //update producto set stock=2 where id_producto;
        $query = "UPDATE producto SET stock = stock - :cantidad WHERE id_producto = :id_producto";
        $rs = $this->db->prepare($query);
        $rs->bindParam(':id_producto', $producto_id, PDO::PARAM_INT);
        $rs->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);

        if ($rs->execute()) {
            // El stock se ha actualizado correctamente
            echo "Stock actualizado exitosamente.";
        } else {
            // Hubo un error al actualizar el stock
            echo "Error al actualizar el stock.";
        }
    }
    public function agregarCarrito($id_usuario, $producto_id, $cantidad)
    {
        // Primero, verifica si la cantidad a comprar es menor o igual al stock disponible
        if ($this->verificarStockSuficiente($producto_id, $cantidad)) {
            // La cantidad a comprar es válida, puedes agregar el producto al carrito
            $query = "INSERT INTO carrito(id_usuario, id_producto, cantidad) VALUES (:id_usuario, :id_producto, :cantidad)";
            $rs = $this->db->prepare($query);
            $rs->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $rs->bindParam(':id_producto', $producto_id, PDO::PARAM_INT);
            $rs->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);

            if ($rs->execute()) {
                // La compra se ha registrado correctamente en la base de datos
                echo "¡Se agregó a su carrito :D siga comprando!";
                $this->actualizarStock($producto_id, $cantidad); // Llamamos a la función para actualizar el stock
            } else {
                // Hubo un error al registrar la compra
                echo "Error al registrar la compra.";
            }
        } else {
            // La cantidad a comprar es mayor que el stock disponible
            echo "La cantidad a comprar es mayor que el stock disponible.";
        }
    }

    // Función para verificar si el stock es suficiente
    private function verificarStockSuficiente($producto_id, $cantidad)
    {
        $query = "SELECT stock FROM producto WHERE id_producto = :id_producto";
        $rs = $this->db->prepare($query);
        $rs->bindParam(':id_producto', $producto_id, PDO::PARAM_INT);
        $rs->execute();

        $row = $rs->fetch(PDO::FETCH_ASSOC);

        if ($row['stock'] >= $cantidad) {
            // El stock es suficiente
            return true;
        } else {
            // El stock no es suficiente
            return false;
        }
    }
    public function obtenerCarrito($user_id)
    {
        /* select p.nombre_producto,cantidad,p.precio,p.foto,
        sum(c.cantidad*p.precio) as subtotal from carrito c
         join producto p on p.id_producto = c.id_producto
         join usuario u on u.id_usuario = c.id_usuario
         where c.id_usuario=11
group by 1 desc
order by 1;*/
$query = "SELECT p.id_producto, p.nombre_producto, c.cantidad, p.precio, p.foto, (c.cantidad * p.precio) as subtotal, u.id_usuario 
FROM carrito c
JOIN producto p ON p.id_producto = c.id_producto
JOIN usuario u ON u.id_usuario = c.id_usuario
WHERE c.id_usuario = :user_id
GROUP BY p.id_producto
ORDER BY p.nombre_producto";


        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        $p = array(); // Inicializa un array para almacenar los cursos

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $p[] = $row;
        }
        return $p; // Devuelve el array de cursos
    }

    public function comprarCarrito($id_usuario)
    {
        // Verificar si hay cursos en el carrito
        $carritoCursos = $this->obtenerCarrito($id_usuario); // Asegúrate de pasar el ID del usuario
        if (empty($carritoCursos)) {
            echo "No hay producto en carrito. Agregue antes de comprar.";
            return;
        }

        
        foreach ($carritoCursos as $curso) {
            $id_usuario = $curso["id_usuario"];
            $id_producto = $curso['id_producto'];
            $cantidad = $curso['cantidad'];
            $subtotal = $curso['subtotal'];
            echo 'cantidad' . $cantidad . ' subtotal' . $subtotal;
        
//insert into venta(id_producto, id_usuario, fecha, cantidad) VALUE (1,11,now(),10);              
            $query = "INSERT INTO venta (id_producto, id_usuario, cantidad, fecha, subtotal) VALUES (:id_producto, :id_usuario, :cantidad, NOW(), :subtotal)";
                      $rs = $this->db->prepare($query);
            $rs->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $rs->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
            $rs->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
            $rs->bindParam(':subtotal', $subtotal, PDO::PARAM_INT);

            if ($rs->execute()) {
                // La compra se ha registrado correctamente en la base de datos
                header("Location: ../vistas/carrito.php");
               // echo "¡Compra registrada en la base de datos!";
     
                $this->eliminarCarrito($id_usuario);
            } else {
                // Hubo un error al registrar la compra
                echo "Error al registrar la compra.";
            }
        }}
        
        public function SubirProducto(){
        $nombre_producto = $_POST["nombre_producto"];
        $precio = $_POST["precio"];
        $stock = $_POST["stock"];
        // Subir la imagen
        $imagen = $_FILES["foto"]["name"];
        $imagen_temp = $_FILES["foto"]["tmp_name"];
        move_uploaded_file($imagen_temp, "../assets/img/" . $imagen);
        //insert into producto (nombre_producto, precio, foto, stock, status) values ('sasa',50,'a.jpg',1,1);
        $status=1;
            $query = "INSERT into producto (nombre_producto, precio, foto, stock, status) VALUES ('$nombre_producto', '$precio','$imagen','$stock',$status )";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            header("Location: ../vistas/subirproductos.php");
            //echo"subido";
            /*
            $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
            */
        

        }
    



    public function eliminarCarrito($id_usuario)
    {
        // Luego, eliminar los cursos del carrito
        $query = "DELETE FROM carrito WHERE id_usuario = :user_id";
        $rs = $this->db->prepare($query);
        $rs->bindParam(':user_id', $id_usuario, PDO::PARAM_INT);
        if ($rs->execute()) {
            // Los cursos del carrito se han eliminado correctamente
            echo "¡ del carrito eliminados!";
        } else {
            // Hubo un error al eliminar los cursos del carrito
            echo "Error al eliminar los tenis del carrito.";
        }

}

public function eliminarElementoDelCarrito($id_usuario, $producto_id)
{
    // Elimina un elemento del carrito
    $query = "DELETE FROM carrito WHERE id_usuario = :id_usuario AND id_producto = :id_producto";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->bindParam(':id_producto', $producto_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // El elemento se ha eliminado correctamente del carrito
        echo "¡Elemento eliminado del carrito exitosamente! id Usuario= ".$id_usuario."producto=".$producto_id;
    //    header("Location: ../html/carrito.php");
    } else {
        // Hubo un error al eliminar el elemento del carrito
        echo "Error al eliminar el elemento del carrito.";
    }
}


public function ActualizarCursos($nombre_producto, $foto, $precio, $stock, $status, $id_producto)
{
    $imagen_nombre = $_FILES["foto"]["name"];
    $imagen_temp = $_FILES["foto"]["tmp_name"];
    move_uploaded_file($imagen_temp, "../assets/img/" . $imagen_nombre);

    // Preparar la consulta SQL e insertar los datos en la tabla
    $conn = $this->db;
//update producto set nombre_producto='',foto='',precio=0,stock=1,status=1 where id_producto=1;
    $sql = "UPDATE producto SET nombre_producto = :nombre_producto, foto = :foto, precio = :precio,stock = :stock, status=:status WHERE id_producto = :id_producto";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre_producto', $nombre_producto, PDO::PARAM_STR);
    $stmt->bindParam(':foto', $foto, PDO::PARAM_STR);
    $stmt->bindParam(':precio', $precio, PDO::PARAM_STR); // Cambiado a PDO::PARAM_STR
    $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
    $stmt->bindParam(':status', $status, PDO::PARAM_INT);
    $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: ../vistas/editarproductos.php");

       // echo "Actualización exitosa.";
       // header("Location: ../html/modificarCurso.php?Update=1");
        //header("Location: ../html/carrito.php?Quitar=1");
        //echo "campus actualizados";
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Error al actualizar el curso: " . $errorInfo[2];
    }
}

public function mostrarTotal($id_usuario) {

    //select sum(cantidad*precio)as total from carrito c
//join producto p on c.id_producto = p.id_producto
//where id_usuario=1;
  $query = "SELECT sum(cantidad*precio) as total from carrito c join producto p on c.id_producto = p.id_producto
    where id_usuario=$id_usuario";
    $stmt = $this->db->prepare($query);
    $stmt->execute();
    $cursos = array(); // Inicializa un array para almacenar los cursos
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $cursos[] = $row;
    }
    return $cursos; // Devuelve el array de cursos
}
}