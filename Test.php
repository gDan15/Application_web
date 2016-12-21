<?php
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
  $id=2;
  $sql="UPDATE Reservation SET Destination='Mongolie', Assurance='1', Total='35', NomAge='Gaetan:24' WHERE id='$id'";
  var_dump($sql);
  $stmt = $bdd->prepare($sql);
  var_dump($stmt);
  $exec=$stmt->execute();
  var_dump($exec);

?>
