<?php

class ModeloJuego {
    private $DB;
    function __construct() {
        require './DB/MySQL.php';
        $this->DB = new Conexion();
    }
    function RevisarJuego($Consulta) {
        return $this->DB->filas($this->DB->Query($Consulta));
         
    }
    function DatoJuego($Consulta) {
        $valor = $this->DB->matriz($this->DB->Query($Consulta));
        return $valor[0];
    }
    function Insert($Consulta) {
        $this->DB->Query($Consulta);
    }
    function ListarJuego($Consulta) {
        $array = array();
        $resultado=$this->DB->Query($Consulta);
        while ($row = $this->DB->matriz($resultado)){
            $array[]= $row[0];
        }
        return $array;
    }
    
    function TablaJuego($Consulta) {
        $array = array();
        $resultado=$this->DB->Query($Consulta);
        while ($row = $this->DB->matriz($resultado)){
            $array[]= $row;
        }
        return $array;
    }
}
