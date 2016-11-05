<?php
include 'Model.php';
session_start();
//Si il y a quelque chose dans la variable de session on récupère ce qui a dedans.
if (isset($_SESSION['Variable']) && !empty($_SESSION['Variable']))
{
  $control = unserialize($_SESSION['Variable']);
}
else
{
  $control = new Model();
}
//Aller voir différence entre & et &&
if(!empty($_POST['destination']) && !empty($_POST['place']) && !empty($_POST["continuer"]) && empty($_POST["annuler"])){
  $control->setDestination($_POST['destination']);
  $control->setPlace($_POST['place']);
  $control->setPage('Second_page.php');
  include 'Second_page.php';
}
elseif(!empty($_POST['page_precedente'])){
  if($control->currentPage()=='Second_page.php'){
    include 'First_page.php';
  }
  elseif($control->currentPage()=='Third_page.php'){
    $control->setPage('Second_page.php');
    include 'Second_page.php';
  }
}
elseif(!empty($_POST['confirmer'])){
  //on enregistre les éléments de la liste nom dans control comme ça on peut l'utiliser dans tout les programmes.
  $control->setArray($_POST['Info']);
  $Liste=$control->getArray();
  $control->setPage('Third_page.php');
  include 'Third_page.php';
}
elseif(!empty($_POST['annuler'])){
  $control->setDestination('');
  $control->setPlace('');
  include 'First_page.php';
  $control->setState(True);
}
else
{
  echo 'Il y a un problème.';
}
//Si control n'est pas vide on l'enregistre dans une variable de session.
if (isset($control) && $control->state()!=True)
{
  $_SESSION['Variable'] = serialize($control);
}
//Si on appui sur n'importe quel bouton 'annuler', la variable de session $control est effacée càd toutes les variables contenues dans celles-ci.
if($control->state()==True){
  session_unset();
}

// session_unset();
?>
