<html>
  <head>
    <title> Reservation -- Validation </title>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  </head>
  <body>
    <form method="POST" action="Controller.php">
      <div class="w3-container w3-teal" align='left'>
        <h1 align="center">Validation des réservations</h1>
        <table style="width:75%" align="center">
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
          echo '<tr>';
            echo "<td>Assurance annulation</td>";
            echo '<td>';
            if($control->getBox()){
              echo "OUI";
            }
            else{
              echo 'NON';
            }
            echo '</td>';
          echo '</tr>';
        ?>
        </table>
      <br>
        <table align="center">
          <tr>
            <td><input type='submit' name='page_precedente' class="button" value='page precedente'/></td>
            <td><input type='submit' name='annuler' class="button" value='annuler'/></td>
            <td><input type='submit' name='suivant' class="button" value='suivant'/></td>
          </tr>
        </table>
      </div>
    </form>
  </body>
</html>
