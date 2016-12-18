<?php
//Name of the database we want to connect to or create
include_once 'Model.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Si il y a quelque chose dans la variable de session on récupère ce qui a dedans.

if (isset($_SESSION['Variable']) && !empty($_SESSION['Variable']))
{
  $control = unserialize($_SESSION['Variable']);
}
else
{
  $control = new Model();
}
$dbname='Application';
$control->getDestination();
try
{
  $bdd = new PDO('mysql:host=localhost','root','');
  $bdd->query("CREATE DATABASE IF NOT EXISTS $dbname");
  $bdd->query("use $dbname");
  $bdd->query("CREATE TABLE IF NOT EXISTS Reservation(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Destination TEXT(30) NOT NULL,
    Assurance BOOLEAN NOT NULL,
    Total TEXT(50),
    NomAge TEXT(50)
  )");
}

catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}
$reponse=$bdd->query('SELECT * FROM Reservation');
$i=0;
while($donnees = $reponse->fetch()){
  if(!empty($_POST["Editer_".$donnees['id']."_".$donnees['Destination']])){
    $i=1;
    // echo "Editer_".$donnees['id']."_".$donnees['Destination'];
    include "Controller.php";
  }
  //Si aucun bouton n'a été appuyé, on continue à afficher la page 5
  elseif($i==0){
    include 'Fifth_page.php';
  }
}
// while($donnees = $reponse->fetch()){
//   if(!empty($_POST('Editer'))){
//     echo $donnees['Destination'];
//   }
// }
// if(){
//
// }


// $reponse=$bdd->query('SELECT * FROM jeux_video');

// // On ajoute une entrée dans la table jeux_video
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
