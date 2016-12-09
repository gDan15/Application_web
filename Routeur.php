<?php
session_start();
if(!empty($_GET["name"]) && is_file('Controller'.$_GET['name'].'php')){
  include 'Controller'.$_GET['name'].'php';
}
else{
  include "Controller.php";
}
?>
