<html>
  <head>
    <title> Reservation -- Détails </title>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <style>
    error{
      font-family: 'alex_brushregular', Courier, "Lucida Console", monospace;
      color: Red;
      font-size: 70%;
    }
    </style>
  </head>
  <body>
  <form method="POST" action="Controller.php">
    <h1>Détails des réservations</h1>
    <table class="table1">
      <?php
        $nombre=intval($control->getPlace('place'));
        for($i=0;$i<$nombre;$i++)
        {
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
              echo "<error> Veuillez entrer un nom valide </error>";
            }
          }
          echo "</td>";
          echo "</tr>";
          echo "</tr>";
          echo "<p class=\"big\">";
          echo "</p>";
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
            if($control->getErrorText() && ($control->getArray()[$i*2+1]=="" || (int)($control->getArray()[$i*2+1])<=0 || (int)($control->getArray()[$i*2+1])>=100)){
              echo "<error> Veuillez entrer un âge valide compris entre 1 et 99 inclus </error>";
            }
          }
          echo "</td>";
          echo "</tr>";
          echo "</table1>";
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
