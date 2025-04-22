<?php

namespace Controllers;

use Models\UsuarioModel;
use Entities\Usuario;

class AuthController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    public function mostrarFormularioLogin()
    {
        include __DIR__ . '/../View/auth/login.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usernameOrEmail = $_POST['username_or_email'];
            $password = $_POST['password'];

            $usuarioData = $this->usuarioModel->getUserByNombreUsuarioOrEmail($usernameOrEmail);

            if ($usuarioData && password_verify($password, $usuarioData['contrasena'])) {
                session_start();
                $_SESSION['usuario_id'] = $usuarioData['id'];
                $_SESSION['nombre_usuario'] = $usuarioData['nombreUsuario'];
                header('Location: index.php?accion=listar_articulos');
                exit();
            } else {
                $error = "Credenciales incorrectas.";
                include __DIR__ . '/../View/auth/login.php';
            }
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: index.php?accion=mostrar_login');
        exit();
    }

    public function mostrarFormularioRegistro()
    {
        include __DIR__ . '/../View/auth/registro.php';
    }

    public function registrarUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombreUsuario = $_POST['nombreUsuario'];
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Validar los datos del formulario (¡importante!)
            if (empty($nombreUsuario) || empty($nombre) || empty($email) || empty($password)) {
                $error = "Todos los campos son obligatorios.";
                include __DIR__ . '/../View/auth/registro.php';
                return;
            }

            // Verificar si el nombre de usuario o el email ya existen
            $existingUser = $this->usuarioModel->getUserByNombreUsuarioOrEmail($nombreUsuario);
            if ($existingUser) {
                $error = "El nombre de usuario o el email ya están registrados.";
                include __DIR__ . '/../View/auth/registro.php';
                return;
            }

            // Hash de la contraseña antes de guardarla
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            // Crear una nueva instancia de la entidad Usuario
            $usuario = new Usuario(null, $nombreUsuario, $nombre, $email, $passwordHash);

            // Llamar al modelo para crear el usuario
            if ($this->usuarioModel->crearUsuario($usuario)) {
                $mensaje = "Usuario registrado exitosamente. Puedes iniciar sesión.";
                include __DIR__ . '/../View/auth/login.php'; // Redirigir al login con mensaje
            } else {
                $error = "Error al registrar el usuario.";
                include __DIR__ . '/../View/auth/registro.php';
            }
        }
    }
}