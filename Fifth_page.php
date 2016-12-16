<html>
  <head>
    <title> Reservation -- Détails </title>
    <link rel="stylesheet" type="text/css" href="Style.css">
  </head>
  <body>
    <form method="POST" action="Controller_manager.php">
      <title>Liste des réservations</title>
      <table width="800">
        <tr>
          <td> Destination </td>
          <td> Assurance </td>
          <td> Total </td>
          <td> Nom --- Age </td>
          <td> Editer </td>
          <td> Supprimer </td>
        </tr>
          <?php
          $reponse=$bdd->query('SELECT * FROM Reservation');
          while($donnees = $reponse->fetch()){
            echo '<tr>';
              echo '<td>'.$donnees['Destination'].'</td>';
              echo '<td>'.$donnees['Assurance'].'</td>';
              echo '<td>'.$donnees['Total'].'</td>';
              // echo '<td>'.$donnees['NomAge'].'</td>';
              echo '<td>';
              $list=explode(":",$donnees['NomAge']);
              echo '<table>';
                for($i=0;$i<count($list);$i++){
                  echo '<tr>';
                    echo '<td>'.$list[$i]." --- ".$list[$i+1]."</td>";
                    $i=$i+1;
                  echo '</tr>';
                }
              echo '</table>';
              echo '</td>';
              echo '<td> <input type="submit" value="Editer" name="Editer"> </td>';
              echo '<td> <input type="submit" value="Supprimer" name="Supprimer"> </td>';
            echo '</tr>';
          }
         ?>
      </table>
    </form>
  </body>
</html>
