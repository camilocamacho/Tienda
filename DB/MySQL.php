<?php
class Conexion {
    private $conexion;
    function __construct() {
        $this->conexion = mysqli_connect("localhost", "root", "", "tienda");
    }    
    function cerrar(){
        mysqli_close($this->conexion);
    }
    function Query($consulta) {
        return mysqli_query($this->conexion, $consulta);
    }
    function filas($resultado) {
        return mysqli_num_rows($resultado);
    }
    function matriz($resultado) {
        return mysqli_fetch_row($resultado);
    }
}