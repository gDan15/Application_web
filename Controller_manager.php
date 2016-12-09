<?php
// Connexion et sélection de la base
$mysqli = new mysqli("localhost", "username", "password","dbname") or die("Could not select database");
if ($mysqli->connect_errno){
  echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
}
// Exécuter des requêtes SQL
....
// Afficher les résultats
....
// Libération des résultats
$result->close();
// Fermeture de la connexion
$mysqli->close();
SQL$query= "SELECT * FROM users";
$result= $mysqli->query($query) or die("Queryfailed");
if ($result->num_rows== 0) {
  echo"Aucune ligne trouvée, rien à afficher.";
  exit;
}
// Affichage des entêtes de colonnesecho
"<table>\n<tr>";
while($finfo= $result->fetch_field()){
  echo'<th>'. $finfo->name.'</th>';
}
echo"</tr>\n";
// Afficher des résultats en HTML
while($line = $result->fetch_assoc()) {
  echo"\t<tr>\n";
  foreach($line as $col_value) {
    echo"\t\t<td>$col_value</td>\n";
  }
  echo"\t</tr>\n";
}echo"</table>\n";
// Récupération du résultat sous forme d'un tableau associatif
$result= $mysqli->query($query) or die("Queryfailed");
while($line = $result->fetch_array(MYSQLI_ASSOC)){
  echo$line['lastname'].'<BR>';
}
// Insertion d'un enregistrement
enregistrement$sql= "INSERT INTO `test`.`users` (`id`, `lastname`, `firstname`, `email`, `Mobile`)VALUES (NULL, 'Doe', 'John', 'j.doe@ecam.be', '0478/65.32.89');";
if ($mysqli->query($sql) === TRUE) {
  echo"Record updatedsuccessfully";
  $id_insert= $mysqli->insert_id;
} else{
  echo"Errorinsertingrecord: " . $mysqli->error;
}
// Récupérationde l'id de la dernière insertion
$id_user= $mysqli->insert_id;
// Mise à jour d'un enregistrement
$sql= "UPDATE usersSET lastname='Dardenne' WHERE id=2";
if ($mysqli->query($sql) === TRUE) {
  echo"Record insertedsuccessfully";
} else{
  echo"Errorupdatingrecord: " . $mysqli->error;
}















  ?>
