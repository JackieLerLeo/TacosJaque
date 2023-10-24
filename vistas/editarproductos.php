<?php 
include("../controladores/ctrlMostrarTodo.php");
include("../controladores/ctrlStatus.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/editar.css">
    <title>Editar Productos</title>
</head>

<body>
    <main class="products container">
        <h2>Editar Productos</h2>
        <?php foreach ($productos as $producto) { ?>
        <form method="post"
            action="../controladores/ctrlmodificarproducto.php?id=<?php echo $producto['id_producto']; ?>"
            enctype="multipart/form-data">
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Estatus</th>
                        <th>Nueva Imagen</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $producto['id_producto']; ?></td>
                        <td><img src="../assets/img/<?php echo $producto['foto']; ?>"
                                alt="<?php echo $producto['nombre_producto']; ?>"></td>
                        <td><input type="text" name="nombre_producto"
                                value="<?php echo $producto['nombre_producto']; ?>"></td>
                        <td><input type="text" name="stock" value="<?php echo $producto['stock']; ?>"></td>
                        <td><input type="text" name="precio" value="<?php echo $producto['precio']; ?>"></td>
                        <td>
                        
                            <p><?php echo $producto['status']; ?></p>
                          
                            <select name="status" id="status">
                            <?php foreach ($status as $s) : ?>
                                <option value="<?php echo $s['id_status']; ?>"><?php echo $s['status']; ?>
                                </option>
                                <?php endforeach; ?>

                            </select>
                        </td>

                        <!-- Campo de entrada para la nueva imagen -->
                        <td><input type="file" name="foto">
                            <?php if (empty($_FILES['foto']['name'])) : ?>
                            <!-- Mostrar el nombre del archivo actual como valor predeterminado -->
                            <input type="text" value="<?php echo $producto['foto']; ?>" readonly>
                            <?php endif; ?>
                        </td>

                        <td> <button type="submit">Guardar Cambios</button></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <?php } ?>
    </main>
</body>

</html>