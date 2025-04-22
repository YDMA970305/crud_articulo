<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Artículo</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 500px; margin: 20px auto; border: 1px solid #ccc; padding: 20px; }
        h2 { text-align: center; margin-bottom: 20px; }
        .error { color: red; margin-bottom: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type=text], input[type=number], textarea, select { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ddd; border-radius: 4px; }
        button { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 1em; }
        button:hover { background-color: #0056b3; }
        .actions { margin-top: 20px; }
        .actions a { text-decoration: none; color: #007bff; margin-right: 10px; }
        .actions a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Crear Nuevo Artículo</h2>

        <?php if (isset($error)): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form method="post" action="index.php?accion=crear_articulo">
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" id="marca" name="marca" required>
            </div>
            <div class="form-group">
                <label for="precioVenta">Precio de Venta:</label>
                <input type="number" id="precioVenta" name="precioVenta" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="precioCompra">Precio de Compra:</label>
                <input type="number" id="precioCompra" name="precioCompra" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="iva">IVA (%):</label>
                <input type="number" id="iva" name="iva" step="0.01" value="0.00" required>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" id="modelo" name="modelo">
            </div>
            <div class="form-group">
                <label for="proveedor">Proveedor:</label>
                <input type="text" id="proveedor" name="proveedor">
            </div>
            <div class="form-group">
                <label for="tienda">Tienda:</label>
                <input type="text" id="tienda" name="tienda">
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" value="1" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <input type="text" id="categoria" name="categoria">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"></textarea>
            </div>

            <button type="submit">Guardar Artículo</button>

            <div class="actions">
                <a href="index.php?accion=listar_articulos">Volver a la lista</a>
            </div>
        </form>
    </div>
</body>
</html>