<html>
  <head>
    <title> Reservation -- Détails </title>
    <link rel="stylesheet" type="text/css" href="Style.css">
  </head>
  <body>
    <form method="POST" action="Controller_manager.php">
      <title>Liste des réservations</title>
      <input type='submit' value='Nouvelle réservation' name='Nouvelle_reservation'>
      <table width="800" class="table1">
        <tr>
          <th> Id </th>
          <th> Destination </th>
          <th> Assurance </th>
          <th> Total </th>
          <th> Nom --- Age </th>
          <th> Editer </th>
          <th> Supprimer </th>
        </tr>
          <?php
          $reponse=$bdd->query('SELECT * FROM Reservation');
          while($donnees = $reponse->fetch()){
            echo '<tr>';
              echo '<td>'.$donnees['id'].'</td>';
              echo '<td>'.$donnees['Destination'].'</td>';
              if($donnees['Assurance']==1){
                $assurance='OUI';
              }
              else{
                $assurance='NON';
              }
              echo '<td>'.$assurance.'</td>';
              echo '<td>'.$donnees['Total'].'</td>';
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
              echo '<td> <input type="submit" value="Editer" name="';
              echo $donnees['id'];
              echo '"> </td>';
              echo '<td> <input type="submit" value="Supprimer" name="';
              echo "Suppress".$donnees['id'];
              echo '"> </td>';
            echo '</tr>';
          }
         ?>
      </table1>
    </form>
  </body>
</html>
