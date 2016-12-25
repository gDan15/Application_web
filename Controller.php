<?php
include_once 'Model.php';

//A new session is started if it has not been done yet
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//If there is
if (isset($_SESSION['Variable']) && !empty($_SESSION['Variable']))
{
  $control = unserialize($_SESSION['Variable']);
}
else
{
  $control = new Model();
}

//Name of the database we want to connect to or create
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
//When the program starts, the first page must be displayed without any error messages.
if(empty($control->getDestination()) && empty($control->getPlace()) && empty($_POST["continuer"])){
  $control->setErrorText(False);
  include("First_page.php");
}
//If these condition are valid, the Second_page is displayed
elseif(!empty($_POST["continuer"]) && empty($_POST["annuler"]) && $control->analysePlace($_POST['place']) && !is_numeric($_POST['destination'])){
  if(!empty($_POST['case'])){
    $control->setBox(True);
  }
  else{
    $control->setBox(False);
  }
  $control->setDestination($_POST['destination']);
  $control->comparePlace($_POST['place']);
  $control->setPlace($_POST['place']);
  $control->setPage('Second_page.php');
  //Lorsqu'on passe à la 2 ème on aimerait bien qu'il n'y ait pas de message d'erreur.
  $control->setErrorText(False);
  include 'Second_page.php';
}
elseif(!empty($_POST['page_precedente'])){
  if($control->currentPage()=='Second_page.php'){
    $control->setArray($_POST['Info']);
    $control->setPage('First_page.php');
    include 'First_page.php';
  }
  elseif($control->currentPage()=='Third_page.php'){
    $control->setPage('Second_page.php');
    $control->setPrice(0);
    include 'Second_page.php';
  }
}
//If these conditions are satisfied, the Third_page is displayed
elseif(!empty($_POST['confirmer']) && !$control->analyseArray($_POST['Info'])){
  //The array of names and ages is saved
  $control->setArray($_POST['Info']);
  $i=0;
  $Liste=$control->getArray();
  $control->setPage('Third_page.php');
  include 'Third_page.php';
}
elseif(!empty($_POST['suivant'])){
  $control->currentPage('Fourth_page.php');
  $dest=$control->getDestination();
  $assurance=$control->getBox();
  $total=$control->getPrice();
  $array=$control->getArray();
  if($assurance==True){
    $assurance=1;
  }
  else{
    $assurance=0;
  }
  //To add the names and ages, we will first transform the array into a single string with implode ( ":",$nom) where : is the caracter between all the elements.
  //After extracting the string, we can turn it back into an array using explode(":",$nom)
  $str=implode(":",$array);
  if($control->stateUpdate()==False){
    $sql="INSERT INTO Reservation (Destination, Assurance, Total, NomAge) VALUES ('$dest','$assurance','$total','$str')";
  }
  else{
    $id=$control->idUpdate();
    $sql="UPDATE Reservation SET Destination='$dest', Assurance='$assurance', Total='$total', NomAge='$str' WHERE id='$id'";
  }
  $stmt = $bdd->prepare($sql);
  $exec=$stmt->execute();
  // var_dump($result);
  include 'Fourth_page.php';
}
elseif(!empty($_POST['page_acceuil'])){
  $control->currentPage('First_page.php');
  $control->setState(True);
  include 'First_page.php';
}
elseif(!empty($_POST['annuler'])){
  //There must not be any error messages related to the empty fields while the button 'annuler' is pressed
  $control->setErrorText(False);
  $control->setState(True);
  include 'First_page.php';
}
else
{
  $control->setErrorText(True);
  if($control->currentPage()=='First_page.php')
  {
    // echo "Erreur 1ere page -> Page courante : ".$control->currentPage();
    $control->setDestination($_POST['destination']);
    $control->setPlace($_POST['place']);
    if(!empty($_POST['case'])){
      $control->setBox(True);
    }
    else{
      $control->setBox(False);
    }
  }
  elseif($control->currentPage()=='Second_page.php'){
    // echo "Erreur 2eme page -> Page courante : ".$control->currentPage();
    $control->setArray($_POST['Info']);
  }
  include $control->currentPage();
}
//If control is not empty and there isn't any button pressed, we save the data in a session variable
if (isset($control) && $control->state()!=True)
{
  $_SESSION['Variable'] = serialize($control);
}
//If the button 'annuler' is pressed in any view page, the session is unset meaning that the object $control is suppressed.
if($control->state()==True)
{
  session_unset();
}
?>
