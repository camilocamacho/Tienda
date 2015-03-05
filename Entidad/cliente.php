<?php

class cliente {
    private $Nombre;
    private $Cedula;
    private $Telefono;
    function __construct($Nombre, $Cedula, $Telefono) {
        $this->Nombre = $Nombre;
        $this->Cedula = $Cedula;
        $this->Telefono = $Telefono;
    }
    function getNombre() {
        return $this->Nombre;
    }

    function getCedula() {
        return $this->Cedula;
    }

    function getTelefono() {
        return $this->Telefono;
    }

}
