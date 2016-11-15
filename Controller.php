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
//Il faut rajouter une case pour cocher
//Faut faire des conditions pour vérifier si la valeur est plus petite que 0 avec (int) !!!!!! -- fait
if(!empty($_POST["continuer"]) && empty($_POST["annuler"]) && !$control->analysePlace($_POST['place'])){
  // $control->setErrorText(False);
  if(!empty($_POST['case'])){
    $control->setBox(True);
  }
  else{
    $control->setBox(False);
  }
  $control->setDestination($_POST['destination']);
  //Permet de comparer le nombre de place, c'est à dire le nombre déjà stocké et le nombre mis dans le champ, lorsqu'on passe de la 1ère page à la 2ème page.
  //En effet dans Second_page on travail uniquement avec le nombre de place et non pas avec la taille de la liste.
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
//Il faut vérifier que le nombre d'ages correspondent au nombre de nom !!!!!!!!
//Il faut que l'âge soit compris entre 1 - 100 ans.
elseif(!empty($_POST['confirmer']) && !$control->analyseArray($_POST['Info'])){
  //on enregistre les éléments de la liste nom dans control comme ça on peut l'utiliser dans tout les programmes.
  $control->setArray($_POST['Info']);
  $i=0;
  // foreach($_POST['Info'] as $value){
  //   $i=$i+1;
  //   echo $i." : ".$value;
  //   echo '<br>';
  // }
  $Liste=$control->getArray();
  $control->setPage('Third_page.php');
  include 'Third_page.php';
}
elseif(!empty($_POST['suivant'])){
  $control->currentPage('Fourth_page.php');
  include 'Fourth_page.php';
}
elseif(!empty($_POST['page_acceuil'])){
  $control->currentPage('First_page.php');
  $control->setState(True);
  include 'First_page.php';
}
elseif(!empty($_POST['annuler'])){
  // $control->setDestination('');
  // $control->setPlace('');
  //Il ne faut pas qu'il y ait des messages d'erreurs liés aux champ vide quand on appuie sur le bouton 'annuler'
  $control->setErrorText(False);
  $control->setState(True);
  include 'First_page.php';
}
else
{
  $control->setErrorText(True);
  if($control->currentPage()=='First_page.php')
  {
    echo "Erreur 1ere page -> Page courante : ".$control->currentPage();
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
    echo "Erreur 2eme page -> Page courante : ".$control->currentPage();
    $control->setArray($_POST['Info']);
  }
  include $control->currentPage();
}
//Si control n'est pas vide et qu'aucun bouton 'annuler' est appuyé, on l'enregistre dans une variable de session.
if (isset($control) && $control->state()!=True)
{
  $_SESSION['Variable'] = serialize($control);
}
//Si on appui sur n'importe quel bouton 'annuler', la variable de session $control est effacée càd toutes les variables contenues dans celles-ci.
if($control->state()==True)
{
  session_unset();
}
?>
