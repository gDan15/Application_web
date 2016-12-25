<?php
include_once 'Model.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['Variable']) && !empty($_SESSION['Variable']))
{
  $control = unserialize($_SESSION['Variable']);
}
else
{
  $control = new Model();
}
$dbname='Application';
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
//If none of the buttons are pressed, the Fifth_page is displayed
if(empty($_POST)){
  include('Fifth_page.php');
}
if(!empty($_POST)){
  while($donnees = $reponse->fetch()){
    //Update the entry
    if(isset($_POST[$donnees['id']])){
      $control->setDestination($donnees['Destination']);
      //Since the 'Editer' button has been pressed, the entry corresponding to the id has to be updated
      $control->setStateUpdate(True);
      $control->setIdUpdate($donnees['id']);
      $str=$donnees["NomAge"];
      $array=explode(":", $str);
      $control->setPlace(count($array)/2);
      $a=$control->setArray($array);
      if($donnees["Assurance"]==1){
        $control->setBox(True);
      }
      else{
        $control->setBox(False);
      }
      include 'First_page.php';
    }
    //Suppress the data from the database
    elseif(!empty($_POST["Suppress".$donnees['id']])){
      $id=$donnees['id'];
      $sql = "DELETE FROM Reservation WHERE id=$id";
      $bdd->exec($sql);
      include 'Fifth_page.php';
    }
  }
  if(!empty($_POST['Nouvelle_reservation'])){
    include 'Controller.php';
  }
}
$_SESSION['Variable'] = serialize($control);
?>
