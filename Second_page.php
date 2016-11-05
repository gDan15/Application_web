<html>
  <head>
    <title> Reservation -- Détails </title>
  </head>
  <body>
  <form method="POST" action="Controller.php">
    <?php
      $nombre=intval($control->getPlace('place'));
      for($i=0;$i<$nombre;$i++)
      {
        echo "<table style='width:25%'>";
        echo "<tr>";
        echo "<td> Nom </td>";
        echo "<td> <input type='text' name='Info[]' value=";
        //Les éléments contenus dans la liste sont des string donc il ne faut pas mettre des '' pour value
        if($control->getArray()!=[]){
          if(defined($control->getArray()[$i])){
            echo $control->getArray()[$i];
          }
        }
        echo "></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td> Age </td>";
        echo "<td> <input type='text' name='Info[]' value=";
        if($control->getArray()!=[]){
          if(defined($control->getArray()[$i+1])){
            echo $control->getArray()[$i+1];
          }
        }
        echo "></td>";
        echo "</tr>";
        echo "</table>";
      }
    ?>
    <table>
      <tr>
        <td> <input type='submit' name='page_precedente' value='page precedente'/> </td>
        <td> <input type='submit' name='confirmer' value='confirmer'/> </td>
        <td> <input type='submit' name='annuler' value='annuler'/> </td>
      </tr>
    </table>
  </form>
</body>
</html>
