<?php
namespace Entities;
class Usuario
{
    private $nombreUsuario;
    private $nombre;
    private $email;
    private $password;
    

    public function __construct($nombreUsuario, $nombre, $email, $password, $rol)
    {
        $this->nombreUsuario = $nombreUsuario;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
       
    }

    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }


    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

}

?>