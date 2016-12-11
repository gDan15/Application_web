<?php
// Connexion à la DB
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');
  //echo 'est rentre dans le try';
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}
include 'Fifth_page.php';
// $reponse=$bdd->query('SELECT * FROM jeux_video');

// On ajoute une entrée dans la table jeux_video
// $bdd->exec('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires)
// VALUES(\'Battlefield 1942\', \'Patrick\', \'PC\', 45, 50, \'2nde guerre mondiale\')');

//permet de supprimer toutes les entrées dont les noms sont égos à Battlefield 1942
// $bdd->exec('DELETE FROM jeux_video WHERE nom=\'Dead\'');


// $donnees = $reponse->fetch()
// <strong> echo $donnees['nom'];  </strong> <br/>

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
// $reponse->closeCursor(); // Termine le traitement de la requête
?>
