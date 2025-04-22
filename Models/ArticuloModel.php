<?php

namespace Models;

use Entities\Articulo;
use Libs\Database;

class ArticuloModel
{

    private $conn;
    public function __construct()
    {

        $database = new Database();
        $this->conn = $database->getConnection();
    }
    public function getArticulos()
    {
        $stmt = $this->conn->query("SELECT * FROM articulo");
        $articulos = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $articulos[] = new Articulo(
                $row['idArticulo'],
                $row['marca'],
                $row['precioVenta'],
                $row['precioCompra'],
                $row['iva'],
                $row['modelo'],
                $row['proveedor'],
                $row['tienda'],
                $row['cantidad'],
                $row['categoria'],
                $row['descripcion'],
                $row['nombreUsuario']
            );
           
        }
        return $articulos;
    }
    public function getArticuloById($idArticulo)
    {
        $stmt = $this->conn->prepare("SELECT * FROM articulo WHERE idArticulo = :idArticulo");
        $stmt->bindParam(':idArticulo', $idArticulo, \PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            return new Articulo(
                $row['idArticulo'],
                $row['marca'],
                $row['precioVenta'],
                $row['precioCompra'],
                $row['iva'],
                $row['modelo'],
                $row['proveedor'],
                $row['tienda'],
                $row['cantidad'],
                $row['categoria'],
                $row['descripcion'],
                $row['nombreUsuario']
            );
        } else {
            return null;
        }
    }
    public function crearArticulo($articulo)
    {
        $stmt = $this->conn->prepare("INSERT INTO articulo (marca, precioVenta, precioCompra, iva, modelo, proveedor, tienda, cantidad, categoria, descripcion, nombreUsuario) VALUES (:marca, :precioVenta, :precioCompra, :iva, :modelo, :proveedor, :tienda, :cantidad, :categoria, :descripcion, :nombreUsuario)");
        $stmt->bindParam(':marca', $articulo->getMarca(), \PDO::PARAM_STR);
        $stmt->bindParam(':precioVenta', $articulo->getPrecioVenta(), \PDO::PARAM_STR);
        $stmt->bindParam(':precioCompra', $articulo->getPrecioCompra(), \PDO::PARAM_STR);
        $stmt->bindParam(':iva', $articulo->getIva(), \PDO::PARAM_STR);
        $stmt->bindParam(':modelo', $articulo->getModelo(), \PDO::PARAM_STR);
        $stmt->bindParam(':proveedor', $articulo->getProveedor(), \PDO::PARAM_STR);
        $stmt->bindParam(':tienda', $articulo->getTienda(), \PDO::PARAM_STR);
        $stmt->bindParam(':cantidad', $articulo->getCantidad(), \PDO::PARAM_INT);
        $stmt->bindParam(':categoria', $articulo->getCategoria(), \PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $articulo->getDescripcion(), \PDO::PARAM_STR);
        $stmt->bindParam(':nombreUsuario', $articulo->getNombreUsuario(), \PDO::PARAM_STR);
        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        } else {
            return false;
        }
    }
    public function actualizarArticulo($articulo)
    {
        $stmt = $this->conn->prepare("UPDATE articulo SET marca = :marca, precioVenta = :precioVenta, precioCompra = :precioCompra, iva = :iva, modelo = :modelo, proveedor = :proveedor, tienda = :tienda, cantidad = :cantidad, categoria = :categoria, descripcion = :descripcion WHERE idArticulo = :idArticulo");
        $stmt->bindParam(':idArticulo', $articulo->getIdArticulo(), \PDO::PARAM_INT);
        $stmt->bindParam(':marca', $articulo->getMarca(), \PDO::PARAM_STR);
        $stmt->bindParam(':precioVenta', $articulo->getPrecioVenta(), \PDO::PARAM_STR);
        $stmt->bindParam(':precioCompra', $articulo->getPrecioCompra(), \PDO::PARAM_STR);
        $stmt->bindParam(':iva', $articulo->getIva(), \PDO::PARAM_STR);
        $stmt->bindParam(':modelo', $articulo->getModelo(), \PDO::PARAM_STR);
        $stmt->bindParam(':proveedor', $articulo->getProveedor(), \PDO::PARAM_STR);
        $stmt->bindParam(':tienda', $articulo->getTienda(), \PDO::PARAM_STR);
        $stmt->bindParam(':cantidad', $articulo->getCantidad(), \PDO::PARAM_INT);
        $stmt->bindParam(':categoria', $articulo->getCategoria(), \PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $articulo->getDescripcion(), \PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function eliminarArticulo($idArticulo)
    {
        $stmt = $this->conn->prepare("DELETE FROM articulo WHERE idArticulo = :idArticulo");
        $stmt->bindParam(':idArticulo', $idArticulo, \PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
