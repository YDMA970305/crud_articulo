<?php

namespace Controllers;

use Models\ArticuloModel;
use Entities\Articulo;

class ArticuloController
{
    private $articuloModel;

    public function __construct()
    {
        $this->articuloModel = new ArticuloModel();
    }

    public function listarArticulos()
    {
        $articulos = $this->articuloModel->getArticulos();
        include __DIR__ . '/../View/articulo/listar.php';
    }

    public function mostrarFormularioCrear()
    {
        include __DIR__ . '/../View/articulo/crear.php';
    }

    public function crearArticulo()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recoger los datos del formulario
            $marca = $_POST['marca'] ?? '';
            $precioVenta = $_POST['precioVenta'] ?? '';
            $precioCompra = $_POST['precioCompra'] ?? '';
            $iva = $_POST['iva'] ?? '';
            $modelo = $_POST['modelo'] ?? '';
            $proveedor = $_POST['proveedor'] ?? '';
            $tienda = $_POST['tienda'] ?? '';
            $cantidad = $_POST['cantidad'] ?? 0;
            $categoria = $_POST['categoria'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            // Obtener el nombre de usuario de la sesión
            $nombreUsuario = $_SESSION['nombre_usuario'] ?? '';

            // Crear una nueva instancia de la entidad Articulo
            $articulo = new Articulo(
                null,
                $marca,
                $precioVenta,
                $precioCompra,
                $iva,
                $modelo,
                $proveedor,
                $tienda,
                $cantidad,
                $categoria,
                $descripcion,
                $nombreUsuario
            );

            // Llamar al modelo para crear el artículo
            $articuloId = $this->articuloModel->crearArticulo($articulo);

            if ($articuloId) {
                header('Location: index.php?accion=listar_articulos&mensaje=articulo_creado');
                exit();
            } else {
                $error = "Error al crear el artículo.";
                include __DIR__ . '/../View/articulo/crear.php';
            }
        }
    }

    public function mostrarFormularioEditar($id)
    {
        $articulo = $this->articuloModel->getArticuloById($id);
        if ($articulo) {
            include __DIR__ . '/../View/articulo/editar.php';
        } else {
            header('Location: index.php?accion=listar_articulos&error=articulo_no_encontrado');
            exit();
        }
    }

    public function actualizarArticulo($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recoger los datos del formulario
            $marca = $_POST['marca'] ?? '';
            $precioVenta = $_POST['precioVenta'] ?? '';
            $precioCompra = $_POST['precioCompra'] ?? '';
            $iva = $_POST['iva'] ?? '';
            $modelo = $_POST['modelo'] ?? '';
            $proveedor = $_POST['proveedor'] ?? '';
            $tienda = $_POST['tienda'] ?? '';
            $cantidad = $_POST['cantidad'] ?? 0;
            $categoria = $_POST['categoria'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            // El nombre de usuario probablemente no se edita

            // Crear una nueva instancia de la entidad Articulo con el ID
            $articulo = new Articulo(
                $id,
                $marca,
                $precioVenta,
                $precioCompra,
                $iva,
                $modelo,
                $proveedor,
                $tienda,
                $cantidad,
                $categoria,
                $descripcion,
                $_POST['nombreUsuario'] ?? '' // Mantener el nombre de usuario si se envía
            );

            if ($this->articuloModel->actualizarArticulo($articulo)) {
                header('Location: index.php?accion=listar_articulos&mensaje=articulo_actualizado');
                exit();
            } else {
                $error = "Error al actualizar el artículo.";
                $articulo = $this->articuloModel->getArticuloById($id);
                include __DIR__ . '/../View/articulo/editar.php';
            }
        }
    }

    public function eliminarArticulo($id)
    {
        if ($this->articuloModel->eliminarArticulo($id)) {
            header('Location: index.php?accion=listar_articulos&mensaje=articulo_eliminado');
            exit();
        } else {
            header('Location: index.php?accion=listar_articulos&error=error_al_eliminar');
            exit();
        }
    }
}