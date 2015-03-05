<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    require './Control/ControlAdmin.php';
    $control = new ControlAdmin();
    
    if (isset($_POST["enviar"])) {
        $Datos = array();
        $Datos[0] = $_POST["Nombre"];
        $Datos[1] = $_POST["Cantidad"];
        $Datos[2] = $_POST["Precio"];
        $Datos[3] = $_POST["Descripcion"];
        $Datos[4] = $_POST["Categoria"];
        $Datos[5] = $_POST["Plataforma"];
        $Datos[6] = $_POST["img"];
        $control->AgregarJuego($Datos);
    }
   
?>
<html>
    <head lang="es">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="Admin.php" method="post">
            <h1>
                Admin NewGame
            </h1>
            <h2>
                Agregar juegos
            </h2>
            <p>
                Nombre:
                <input list="Nombres" name="Nombre" required="requiered">
                <datalist id="Nombres">
                <?php
                
                foreach ($control->AgregarLista("SELECT nombre FROM juego") as $valor){
                    echo "<option value='".$valor."'><br>";
                }
                
                ?>
                </datalist>
            </p>
            <p>
                Cantidad:
                <input type="number" name="Cantidad" required="requiered" placeholder="0">
            </p>
            <p>
                Precio:
                <input type="number" name="Precio" required="requiered" placeholder="$ ----" >
            </p>
            <p>
                Descripcion:
            </p>
            <p>
                <textarea name="Descripcion" rows="3" cols="50"></textarea>
            </p>
            <p>
                Categoria:
                <input list="Categorias" name="Categoria">
                <datalist id="Categorias">
                </datalist>
            </p>
            <p>
                Plataforma:
                <input list="plataformas" name="Plataforma" required="requiered">
                <datalist id="plataformas">
                <?php
                foreach ($control->AgregarLista("SELECT nombre FROM plataforma") as $valor){
                    echo "<option value='".$valor."'><br>";
                }
                ?>
                </datalist>
            </p>
            Video
            <input type="text" name="img" required="requiered">
            <p>
                <input type="submit" name="enviar">   <input type="reset">
            </p>
        </form>
    </body>
</html>