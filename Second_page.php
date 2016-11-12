<html>
  <head>
    <title> Reservation -- Détails </title>
    <link rel="stylesheet" type="text/css" href="Style.css">
  </head>
  <body>
  <form method="POST" action="Controller.php">
    <?php
      $nombre=intval($control->getPlace('place'));
      for($i=0;$i<$nombre;$i++)
      {
        echo "<table class=\"table1\">";
        echo "<tr>";
        echo "<td> Nom </td>";
        echo "<td> <input type='text' name='Info[]' value=";
        //Les éléments contenus dans la liste sont des string donc il ne faut pas mettre des '' pour value
        if($control->getArray()!=[]){
          echo $control->getArray()[$i*2];
        }
        echo "></td>";
        echo "<tr>";
        echo "<td>";
        if(isset($control)){
          if($control->getErrorText() && ($control->getArray()[$i*2]=="" || is_numeric($control->getArray()[$i*2]))){
            echo "Veuillez entrer quelque chose de valide";
          }
        }
        echo "</td>";
        echo "</tr>";
        echo "</tr>";
        echo "<tr>";
        echo "<td> Age </td>";
        echo "<td> <input type='text' name='Info[]' value=";
        if($control->getArray()!=[]){
          echo $control->getArray()[$i*2+1];
        }
        echo "></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>";
        if(isset($control)){
          if($control->getErrorText() && ($control->getArray()[$i*2+1]=="" || is_numeric($control->getArray()[$i*2+1])<=0 || is_numeric($control->getArray()[$i*2+1])>=100)){
            echo "Veuillez entrer quelque chose de valide";
          }
        }
        echo "</td>";
        echo "</tr>";
        echo "</table1>";
      }
    ?>
    <table class="table2">
      <tr>
        <td> <input type='submit' name='page_precedente' value='page precedente'/> </td>
        <td> <input type='submit' name='confirmer' value='confirmer'/> </td>
        <td> <input type='submit' name='annuler' value='annuler'/> </td>
      </tr>
    </table class="table2">
    </form>
  </body>
</html>
