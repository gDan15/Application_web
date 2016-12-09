<?php
// Connexion à la DB
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=jeux_video;charset=utf8','root','');
  //echo 'est rentre dans le try';
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}
$reponse=$bdd->query('SELECT * FROM jeux_video');
while($donnees = $reponse->fetch())
{
?>
  <p>
  <strong> <?php echo $donnees['nom'];  ?></strong> <br/>
  </p>
<?php
}
// // Affichage des données
// $reponse = $bdd->query('SELECT lastname FROM users');
// while ($donnees = $reponse->fetch())
// {
//   echo $donnees['lastname'] . '<br />';
// }
// $reponse->closeCursor();
// // Ajout d'un utilisateur
// $bdd->exec(" INSERT INTO users SET lastname='Michel', firstname='Charles', email='cm@ecam.be', mobile='0478/123456' ) ;");
// // Modification d'un utilisateur$
// //$nb_modifs = $bdd->exec(" UPDATE users SET email = 'c.michel@ecam.be' WHERE lastname = 'Michel' ");
$reponse->closeCursor(); // Termine le traitement de la requête
?>
