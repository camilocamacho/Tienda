<?php
    require './Control/ControlJuego.php';
    $control = new ControlJuego();
?>
<!DOCTYPE html>
<html>
    <head lang="es">
        <meta charset="UTF-8">
        <title>NewGame</title>
    </head>
    <body>
        
        <form action="cliente.php" method="get">
       <center>
        <table cellspacing="50">
            <caption>NewGame</caption>
            <tr>
                <td>
                    <?php
                        $x=0;
                        foreach($control->MostrarJuego("SELECT s.id,j.nombre,p.nombre,s.precio FROM stock s,juego j,plataforma p WHERE j.id=s.juego and p.id = s.plataforma") as $row){
                            echo "<b>".$row[1]."</b><br>";
                            echo '<input type="image" name="juego" value="'.$row[0].'" src="./juegos/'.$row[1].'.jpg" alt="Smiley face" height="200" ><br>';
                            echo '<img name="plataforma" src="./plataforma/'.$row[2].'.png" alt="Smiley face" width="60" ><br>';
                            echo "$ ".$row[3]."<br>";
                            echo '</td>';
                            $x++;
                            if ($x == 4) {
                                $x = 0;
                                echo '</tr><tr><td>';
                            }
                            else{
                                echo '<td>';
                            }
                        }
                    ?>
                </td>
            </tr>
          </table>
        </center>
        </form>
    </body>
</html>
