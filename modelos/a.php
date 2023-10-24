<?php

class a
{

    private $db;

    public function __construct($conexion)
    {
        $this->db = $conexion;
    }
    public function Actualizar($nombre_producto, $imagen_nombre, $precio, $stock, $status, $id_producto)
    {
       // echo"actualizar";
        // Obtén la ubicación temporal del archivo y el nombre del archivo
        $imagen_temp = $_FILES["foto"]["tmp_name"];
        $imagen_nombre = $_FILES["foto"]["name"];
       // echo "El nombre del archivo temporal es: " . $imagen_temp . ", y el nombre del archivo es: " . $imagen_nombre;
        
        // Mueve el archivo subido a la ubicación de destino
        if (move_uploaded_file($imagen_temp, "../assets/img/" . $imagen_nombre)) {
            // Preparar la consulta SQL e insertar los datos en la tabla
            $conn = $this->db;
            $sql = "UPDATE producto SET nombre_producto = :nombre_producto, foto = :foto, precio = :precio, stock = :stock, status = :status WHERE id_producto = :id_producto";
    
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nombre_producto', $nombre_producto, PDO::PARAM_STR);
            $stmt->bindParam(':foto', $imagen_nombre, PDO::PARAM_STR); // Cambiar $foto a $imagen_nombre
            $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
            $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
            $stmt->bindParam(':status', $status, PDO::PARAM_INT);
            $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                header("Location: ../vistas/editarproductos.php");

                //echo "Cambios guardados correctamente";
            } else {
                $errorInfo = $stmt->errorInfo();
                echo "Error al actualizar el producto: " . $errorInfo[2];
            }
        } else {
            echo "Error al mover el archivo subido.";
        }
    }
    
    

}
