<html>
  <head>
    <title> Reservation -- Détails </title>
    <link rel="stylesheet" type="text/css" href="Style.css">
  </head>
  <body>
    <form method="POST" action="Controller_manager.php">
      <title>Liste des réservations</title>
      <table>
        <tr>
          <td> Destination </td>
          <td> Assurance </td>
          <td> Total </td>
          <td> Nom - Age </td>
          <td> Editer </td>
          <td> Supprimer </td>
        </tr>
        <tr>
          <?php
          $reponse=$bdd->query('SELECT * FROM Reservation');
          while($donnees = $reponse->fetch()){
            echo '<td>'.$donnees['Destination'].'</td>';
            echo '<td>'.$donnees['Assurance'].'</td>';
            echo '<td>'.$donnees['Total'].'</td>';
            echo '<td>'.$donnees['NomAge'].'</td>';
            echo '<td> <input type="submit" value="continuer" name="Editer"> </td>';
            echo '<td> <input type="submit" value="continuer" name="Supprimer"> </td>';
          }
         ?>
        </tr>
      </table>
    </form>
  </body>
</html>
