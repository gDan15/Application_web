<html>
  <head>
    <title> Reservation -- Validation </title>
    <link rel="stylesheet" type="text/css" href="Style.css">
  </head>
  <body>
  <form method="POST" action="Controller.php">
    <table class="table1" style="width:25%">
    <?php
      // $control->displayArray();
      $liste=$control->getArray();
      //la liste contient tous les noms et ages
      for($i=0;$i<count($liste);$i++){
        //on affiche une seule fois la destination et le nombre de place dans le tableau récapitulatif
        if($control->getArray()!=[]){
          if($i==0){
            echo '<tr>';
              echo '<td>Destination : </td>';
              echo '<td>'.$control->getDestination().'</td>';
            echo '</tr>';
            echo '<tr>';
              echo '<td>Nombre de place : </td>';
              echo '<td>'.$control->getPlace().'</td>';
            echo '<tr/>';
            echo '<tr>';
              echo "<td>Assurance</td>";
              echo '<td>';
              if($control->getBox()){
                echo "Oui";
              }
              else{
                echo 'Non';
              }
              echo '</td>';
            echo '</tr>';
          }
          echo '<tr>';
            echo '<td>Nom : </td>';
            echo '<td>'.$liste[$i].'</td>';
            $i+=1;
          echo '</tr>';
          echo '<tr>';
            echo '<td>Age : </td>';
            echo '<td>'.$liste[$i].'</td>';
          echo '</tr>';
        }
      }
    ?>
    </table>
    <table>
      <tr>
        <td><input type='submit' name='page_precedente' value='page precedente'/></td>
        <td><input type='submit' name='annuler' value='annuler'/></td>
      </tr>
    </table>
  </form>
  </body>
</html>
