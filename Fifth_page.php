<html>
  <head>
    <title> Reservation -- Détails </title>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  </head>
  <body class="body2">
    <form method="POST" action="Controller_manager.php">
      <h1 align="center">Liste des réservations</h1>
      <table width="800" class="table2" align="center">
        <tr class="tr2">
          <th class="th2"> Id </th2>
          <th class="th2"> Destination </th2>
          <th class="th2"> Assurance </th2>
          <th class="th2"> Total </th2>
          <th class="th2"> Nom </th2>
          <th class="th2"> Age </th2>
          <th class="th2"> Editer </th2>
          <th class="th2"> Supprimer </th2>
        </tr2>
          <?php
          $reponse=$bdd->query('SELECT * FROM Reservation');
          while($donnees = $reponse->fetch()){
            echo '<tr class="tr2">';
              echo '<td class="td2">'.$donnees['id'].'</td2>';
              echo '<td class="td2">'.$donnees['Destination'].'</td2>';
              if($donnees['Assurance']==1){
                $assurance='OUI';
              }
              else{
                $assurance='NON';
              }
              echo '<td class="td2">'.$assurance.'</td2>';
              echo '<td class="td2">'.$donnees['Total'].'</td2>';
              $list=explode(":",$donnees['NomAge']);
              echo '<td class="td2">';
                echo '<table align="center">';
                  for($i=0;$i<count($list);$i++){
                    echo '<tr>';
                      echo '<td>'.$list[$i].'</td>';
                    echo '</tr>';
                    $i=$i+1;
                  }
                echo '</table>';
                echo '</td2>';
                echo '<td class="td2">';
                echo '<table align="center">';
                  for($i=0;$i<count($list);$i++){
                    echo '<tr>';
                      echo '<td>'.$list[$i+1].'</td>';
                    echo '</tr>';
                    $i=$i+1;
                  }
                echo '</table>';
              echo '</td2>';
              echo '<td class="td2"> <input type="submit" class="buttonEditer" value="Editer" name="';
                echo $donnees['id'];
              echo '"> </td2>';
              echo '<td class="td2"> <input type="submit" class="buttonSupprimer" value="Supprimer" name="';
                echo "Suppress".$donnees['id'];
              echo '"> </td2>';
            echo '</tr2>';
          }
         ?>
      </table>
      </br>
      <center>
        <input type='submit' value='Nouvelle réservation' class="buttonNew" name='Nouvelle_reservation'>
      </center>
    </form>
  </body2>
</html>
