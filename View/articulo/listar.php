<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Artículos</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 90%; margin: 20px auto; }
        h2 { text-align: center; margin-bottom: 20px; }
        .message { margin-bottom: 15px; padding: 10px; border-radius: 5px; }
        .success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .actions { margin-bottom: 15px; }
        .actions a { display: inline-block; padding: 8px 15px; text-decoration: none; background-color: #007bff; color: white; border-radius: 5px; margin-right: 10px; }
        .actions a:hover { background-color: #0056b3; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .edit-btn, .delete-btn { display: inline-block; padding: 5px 10px; text-decoration: none; border-radius: 5px; margin-right: 5px; font-size: 0.9em; }
        .edit-btn { background-color: #28a745; color: white; }
        .edit-btn:hover { background-color: #1e7e34; }
        .delete-btn { background-color: #dc3545; color: white; }
        .delete-btn:hover { background-color: #c82333; }
        .pagination a { display: inline-block; padding: 5px 10px; text-decoration: none; border: 1px solid #ccc; margin-right: 5px; border-radius: 3px; }
        .pagination .current { background-color: #007bff; color: white; border-color: #007bff; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Lista de Artículos</h2>

        <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'articulo_creado'): ?>
            <p class="message success">Artículo creado exitosamente.</p>
        <?php endif; ?>

        <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'articulo_actualizado'): ?>
            <p class="message success">Artículo actualizado exitosamente.</p>
        <?php endif; ?>

        <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'articulo_eliminado'): ?>
            <p class="message success">Artículo eliminado exitosamente.</p>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
            <p class="message error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>

        <div class="actions">
            <a href="index.php?accion=mostrar_crear_articulo">Crear Nuevo Artículo</a>
        </div>

        <?php if (!empty($articulos)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Precio Venta</th>
                        <th>Precio Compra</th>
                        <th>IVA</th>
                        <th>Modelo</th>
                        <th>Proveedor</th>
                        <th>Tienda</th>
                        <th>Cantidad</th>
                        <th>Categoría</th>
                        <th>Descripción</th>
                        <th>Usuario</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articulos as $articulo): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($articulo->getIdArticulo()); ?></td>
                            <td><?php echo htmlspecialchars($articulo->getMarca()); ?></td>
                            <td><?php echo htmlspecialchars($articulo->getPrecioVenta()); ?></td>
                            <td><?php echo htmlspecialchars($articulo->getPrecioCompra()); ?></td>
                            <td><?php echo htmlspecialchars($articulo->getIva()); ?></td>
                            <td><?php echo htmlspecialchars($articulo->getModelo()); ?></td>
                            <td><?php echo htmlspecialchars($articulo->getProveedor()); ?></td>
                            <td><?php echo htmlspecialchars($articulo->getTienda()); ?></td>
                            <td><?php echo htmlspecialchars($articulo->getCantidad()); ?></td>
                            <td><?php echo htmlspecialchars($articulo->getCategoria()); ?></td>
                            <td><?php echo htmlspecialchars($articulo->getDescripcion()); ?></td>
                            <td><?php echo htmlspecialchars($articulo->getNombreUsuario()); ?></td>
                            <td>
                                <a href="index.php?accion=mostrar_editar_articulo&id=<?php echo htmlspecialchars($articulo->getIdArticulo()); ?>" class="edit-btn">Editar</a>
                                <a href="index.php?accion=eliminar_articulo&id=<?php echo htmlspecialchars($articulo->getIdArticulo()); ?>" class="delete-btn" onclick="return confirm('¿Estás seguro de eliminar este artículo?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php else: ?>
            <p>No hay artículos disponibles.</p>
        <?php endif; ?>
    </div>
</body>
</html>