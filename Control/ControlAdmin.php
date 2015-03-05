<?php
class ControlAdmin {
    private $Juego;
    function __construct() {
        require './Modelo/ModeloJuego.php';
        $this->Juego = new ModeloJuego();
    }
    
    function AgregarLista($consulta) {
        
        return $this->Juego->ListarJuego($consulta);
    }    
    function AgregarJuego($Datos) {
        require './Entidad/juego.php';    
        $nuevo = new juego($Datos[0], $Datos[4], $Datos[3], $Datos[5], $Datos[1], $Datos[2]);
        
        if ($this->Juego->RevisarJuego("SELECT * FROM juego WHERE nombre='".$nuevo->getNombre()."'")==0) {
            $this->Juego->Insert("INSERT INTO juego( nombre, descripcion,video) VALUES ('".$nuevo->getNombre()."','".$nuevo->getDescripcion()."','".$Datos[6]."')");
        }
        if ($this->Juego->RevisarJuego("SELECT * FROM categoria WHERE categoria='".$nuevo->getCategoria()."'")==0) {
            $this->Juego->Insert("INSERT INTO categoria(categoria) VALUES ('".$nuevo->getCategoria()."')");
        }
        if ($this->Juego->RevisarJuego("SELECT * FROM plataforma WHERE nombre='".$nuevo->getPlataforma()."'")==0) {
            $this->Juego->Insert( "INSERT INTO plataforma(nombre) VALUES ('".$nuevo->getPlataforma()."')");
        }
        $juego =  $this->Juego->DatoJuego("SELECT id FROM juego WHERE nombre='".$nuevo->getNombre()."'");
        $plataforma = $this->Juego->DatoJuego("SELECT id FROM plataforma WHERE nombre='".$nuevo->getPlataforma()."'");
        $categoria = $this->Juego->DatoJuego("SELECT id FROM categoria WHERE categoria='".$nuevo->getCategoria()."'");
        $this->Juego->Insert( "INSERT INTO stock(juego, plataforma, cantidad, precio) VALUES (".$juego.",".$plataforma.",".$nuevo->getCantidad().",".$nuevo->getPrecio().")");
    }
}
