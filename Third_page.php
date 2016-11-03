<html>
  <head>
    <title> Reservation -- Validation </title>
  </head>
  <body>
  <form method="POST" action="Controller.php">
    <?php
      // $control->displayArray();
      $liste=$control->getArray();
      echo '<table>';
        echo '<tr>';
          echo '<td>Destination : </td>';
          echo '<td>'.$control->getDestination().'</td>';
        echo '</tr>';
        echo '<tr>';
          echo '<td>Nombre de place : </td>';
          echo '<td>'.$control->getPlace().'</td>';
        echo '<tr/>';
      echo '</table>';
      //la liste contient tous les noms et ages
      for($i=0;$i<count($liste);$i++){
        echo '<table>';
          echo '<tr>';
            echo '<td>Nom : </td>';
            echo '<td>'.$liste[$i].'</td>';
            $i+=1;
          echo '</tr>';
          echo '<tr>';
            echo '<td>Age : </td>';
            echo '<td>'.$liste[$i].'</td>';
          echo '</tr>';
        echo '</table>';
      }

    ?>
  </form>
  </body>
</html>
