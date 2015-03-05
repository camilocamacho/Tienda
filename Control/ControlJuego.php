<?php

class ControlJuego {
    private $Juego;
                function __construct() {
        require './Modelo/ModeloJuego.php';
        $this->Juego = new ModeloJuego();
    }
    function MostrarJuego($Consulta) {
        return $this->Juego->TablaJuego($Consulta);
    }
    function VideoJuego($Consulta) {
        return $this->Juego->DatoJuego($Consulta);
    }
}
