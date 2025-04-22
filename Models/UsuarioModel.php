<?php

namespace Models;

use Entities\Usuario;
use Libs\Database;

class UsuarioModel
{
    private $conn;
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
    public function getUserByNombreUsuarioOrEmail(string  $usernameOrEmail):array
    {
        $stmt = $this->conn->prepare("SELECT * FROM usuario WHERE nombreUsuario = :nombreUsuario OR email = :email");
        $stmt->bindParam(':nombreUsuario', $usernameOrEmail);
        $stmt->bindParam(':email', $usernameOrEmail);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $row ? $row : null;
    }
    public function crearUsuario(Usuario $usuario)
    {
        $stmt = $this->conn->prepare("INSERT INTO usuario (nombreUsuario, nombre, email, contrasena) VALUES (:nombreUsuario,:nombre,:email,:contrasena)");
        $stmt->bindParam(':nombreUsuario', $usuario->getNombreUsuario());
        $stmt->bindParam(':nombre', $usuario->getNombre());
        $stmt->bindParam(':email', $usuario->getEmail());
        $stmt->bindParam(':contrasena', $usuario->getPassword());
        return $stmt->execute();
    }
}
