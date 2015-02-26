<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="cliente.php" method="get">
        <?php 
        error_reporting(0);
        
        $link = mysql_connect("localhost", "root"); 
        mysql_select_db("Tienda", $link);
        if ($_GET['acepto']) {
            mysql_query("INSERT INTO cliente(nombre, cedula, telefono) VALUES ('".$_GET['Nombre']."',".$_GET['Cedula'].",".$_GET['Telefono'].")");
            mysql_query("INSERT INTO reservas(juego,cliente) VALUES (".$_GET['acepto'].",".$_GET['Cedula'].")");
            $result = mysql_query("SELECT s.cantidad FROM stock s WHERE s.id=".$_GET["acepto"]);
            mysql_query('UPDATE stock SET cantidad='.(mysql_result($result, 0, 0)-1).' WHERE id='.$_GET["acepto"]);
        }
        $result = mysql_query("SELECT j.nombre,p.nombre,s.precio,s.id FROM juego j,plataforma p,stock s where j.id=s.juego and p.id=s.plataforma", $link); 
        $fila = mysql_num_rows($result);
       ?>
       <center>
        <table style="width:80%" cellspacing="50">
            <caption>Games</caption>
        <?php
        echo '<tr>';
        $x=0;
        for ($i = 0;$i < $fila;$i++){
            $x++;
            echo '<td ><center>';//inicio de contenido
            echo mysql_result($result, $i,0)."<br>";//nombre
            echo '<input type="image" name="juego" value="'.mysql_result($result, $i, 3).'" src="./juegos/'.mysql_result($result, $i, 0).'.jpg" alt="Smiley face" height="200" ><br>';
            echo '<input type="image" name="plataforma" src="./plataforma/'.mysql_result($result, $i, 1).'.png" alt="Smiley face" width="60" ><br>';
            echo "precio: $".mysql_result($result, $i, 2);
            echo '<center></td>';//fin de contenido
            if ($x==4) {
                echo '</tr><tr>';
                $x=0;
            }
        }
        mysql_close($link);
        ?> 
          </table>
        </center>
        </form>
    </body>
</html>
