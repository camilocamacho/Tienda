<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
        error_reporting(0);
        $link = mysql_connect("localhost", "root"); 
        mysql_select_db("Tienda", $link); 
        $result = mysql_query("SELECT j.nombre,j.descripcion,p.nombre,s.precio,s.cantidad FROM juego j,plataforma p,stock s where j.id=s.juego and p.id=s.plataforma and s.id=".$_GET['juego'], $link); 
        ?>
    <center>
    <table style="" cellspacing="40">
        <tr>
            <td rowspan="2">
        <?php
                echo '<img  src="./juegos/'.mysql_result($result, 0, 0).'.jpg" height="500" ><br>';
        ?>
            </td>
            <td>
        <?php   
                echo mysql_result($result, 0, 0).'<br>';
                echo '<br>Descripcion:<br>'.mysql_result($result, 0, 1).'<br>';
                echo '<br><img  src="./plataforma/'.mysql_result($result, 0, 2).'.png" width="100" ><br>';
                if (mysql_result($result, 0, 4)>0) {
                    echo '<br>Unidades disponibles : '.mysql_result($result, 0, 4).'<br>';
                    echo '<br>$'.mysql_result($result, 0, 3).'<br>';    
                }
        ?>
            </td>
        </tr>
        <tr>
            <td>
                Reservar<br>
                <form action="index.php" method="get">
                <br>Nombre:<br>
                <input type="text" name="Nombre" maxlength="30" required="required">
                <br>Cedula:<br>
                <input type="text" name="Cedula" maxlength="10" required="required">
                <br>Telefono:<br>
                <input type="text" name="Telefono" maxlength="10" required="required" >
                <!--texto obligatorio-->
                <br><br>
                <input type="image" src="./plataforma/Reservar.png" value="<?php echo $_GET['juego'];?>" name="acepto" width="70">
                </form>
            </td>
        </tr>
    </table>
    </center>
    </body>
</html>
