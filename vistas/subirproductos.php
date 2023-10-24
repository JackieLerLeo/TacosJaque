<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Carga de Producto</title>
</head>
<body>
    <h1>Formulario de Carga de Producto</h1>
    
    <form action="../controladores/ctrlSubirProductos.php" method="post" enctype="multipart/form-data">
        <label for="nombre_producto">Nombre del Producto:</label>
        <input type="text" id="nombre_producto" name="nombre_producto" required>
        
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" required>
        
        <label for="imagen">Imagen del Producto:</label>
        <input type="file" id="imagen" name="foto" accept="image/*" required>
        
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required>
        <input type="submit" value="Agregar Producto">
    </form>
</body>
</html>
