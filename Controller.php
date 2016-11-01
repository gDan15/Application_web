<?php
include 'Model.php';
session_start();
if (isset($_SESSION['Variable']) && !empty($_SESSION['Variable']))
{
  $control = unserialize($_SESSION['Variable']);
}
else
{
  $control = new Model();
}
if(!empty($_POST['destination']) & !empty($_POST['place'])){
  $control->setDestination($_POST['destination']);
  $control->setPlace($_POST['place']);
  include 'Second_page.php';
}
elseif(!empty($_POST['page_precedente'])){
  include 'First_page.php';
}
else
{
  echo $control->getDestination();
  echo '</br>';
  echo $control->getPlace();
  echo '</br>';
  echo 'Faut remplir les 2 champs';
}
if (isset($control))
{
  $_SESSION['Variable'] = serialize($control);
}
?>
