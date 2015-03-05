<?php

class juego {
    private $Nombre;
    private $Categoria;
    Private $Descripcion;
    private $Plataforma;
    private $cantidad;
    private $precio;
    function __construct( $Nombre, $Categoria, $Descripcion, $Plataforma, $cantidad, $precio) {
        $this->Nombre = $Nombre;
        $this->Categoria = $Categoria;
        $this->Descripcion = $Descripcion;
        $this->Plataforma = $Plataforma;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getCategoria() {
        return $this->Categoria;
    }

    function getDescripcion() {
        return $this->Descripcion;
    }

    function getPlataforma() {
        return $this->Plataforma;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getPrecio() {
        return $this->precio;
    }


}
