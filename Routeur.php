<?php
session_start();
if(!empty($_GET["name"]) && is_file('Controller_'.$_GET['name'].'.php')){
  include 'Controller_'.$_GET['name'].'.php';
}
// else{
//   include "Controller.php";
// }
?>
