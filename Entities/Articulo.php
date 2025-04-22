<?php
namespace Entities;

class Articulo
{
    private $idArticulo;
    private $marca;
    private $precioVenta;
    private $precioCompra;
    private $iva;
    private $modelo;
    private $proveedor;
    private $tienda;
    private $cantidad;
    private $categoria;
    private $descripcion;
    private $nombreUsuario;

    public function __construct($idArticulo, $marca, $precioVenta, $precioCompra, $iva, $modelo, $proveedor, $tienda, $cantidad, $categoria, $descripcion, $nombreUsuario)
    {
        $this->idArticulo = $idArticulo;
        $this->marca = $marca;
        $this->precioVenta = $precioVenta;
        $this->precioCompra = $precioCompra;
        $this->iva = $iva;
        $this->modelo = $modelo;
        $this->proveedor = $proveedor;
        $this->tienda = $tienda;
        $this->cantidad = $cantidad;
        $this->categoria = $categoria;
        $this->descripcion = $descripcion;
        $this->nombreUsuario = $nombreUsuario;
    }
    public function getIdArticulo()
    {
        return $this->idArticulo;
    }
    public function getMarca()
    {
        return $this->marca;
    }
    public function getPrecioVenta()
    {
        return $this->precioVenta;
    }
    public function getPrecioCompra()
    {
        return $this->precioCompra;
    }
    public function getIva()
    {
        return $this->iva;
    }
    public function getModelo()
    {
        return $this->modelo;
    }
    public function getProveedor()
    {
        return $this->proveedor;
    }
    public function getTienda()
    {
        return $this->tienda;
    }
    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }
    public function setIdArticulo($idArticulo)
    {
        $this->idArticulo = $idArticulo;
    }
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }
    public function setPrecioVenta($precioVenta)
    {
        $this->precioVenta = $precioVenta;
    }
    public function setPrecioCompra($precioCompra)
    {
        $this->precioCompra = $precioCompra;
    }
    public function setIva($iva)
    {
        $this->iva = $iva;
    }
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }
    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;
    }
    public function setTienda($tienda)
    {
        $this->tienda = $tienda;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
    }

}
?>