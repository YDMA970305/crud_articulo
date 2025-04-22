<?php

// Iniciar la sesión (si la vas a utilizar para la autenticación)
session_start();

// Autocargar clases (PSR-4 sería ideal en un proyecto más grande)
spl_autoload_register(function ($className) {
    $className = str_replace('\\', '/', $className);
    $path = __DIR__ . '/' . $className . '.php';
    if (file_exists($path)) {
        require $path;
    }
});

// Importar los controladores que vamos a usar
use Controllers\ArticuloController;
use Controllers\AuthController;

// Crear instancias de los controladores
$articuloController = new ArticuloController();
$authController = new AuthController();

// Obtener la acción a realizar de la URL (a través del parámetro GET 'accion')
$accion = $_GET['accion'] ?? 'mostrar_login'; // Acción por defecto si no se proporciona ninguna

// Middleware de autenticación (ejemplo básico para proteger ciertas rutas)
$rutasProtegidas = [
    'listar_articulos',
    'mostrar_crear_articulo',
    'crear_articulo',
    'mostrar_editar_articulo',
    'actualizar_articulo',
    'eliminar_articulo'
];

if (in_array($accion, $rutasProtegidas) && !isset($_SESSION['usuario_id'])) {
    header('Location: index.php?accion=mostrar_login');
    exit();
}

// Enrutamiento de las peticiones
switch ($accion) {
    case 'listar_articulos':
        $articuloController->listarArticulos();
        break;
    case 'mostrar_crear_articulo':
        $articuloController->mostrarFormularioCrear();
        break;
    case 'crear_articulo':
        $articuloController->crearArticulo();
        break;
    case 'mostrar_editar_articulo':
        $id = $_GET['id'] ?? null;
        $articuloController->mostrarFormularioEditar($id);
        break;
    case 'actualizar_articulo':
        $id = $_POST['id'] ?? null;
        $articuloController->actualizarArticulo($id);
        break;
    case 'eliminar_articulo':
        $id = $_GET['id'] ?? null;
        $articuloController->eliminarArticulo($id);
        break;
    case 'mostrar_login':
        $authController->mostrarFormularioLogin();
        break;
    case 'login':
        $authController->login();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'mostrar_registro':
        $authController->mostrarFormularioRegistro();
        break;
    case 'registrar_usuario':
        $authController->registrarUsuario();
        break;
    default:
        echo 'Acción no válida.';
}

?>