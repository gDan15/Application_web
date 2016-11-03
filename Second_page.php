<html>
  <head>
    <title> Reservation -- Confirmation </title>
  </head>
  <body>
  <form method="POST" action="Controller.php">
    <?php
    $nombre=intval($control->getPlace('place'));
    for($i=0;$i<$nombre;$i++)
    {
      echo "<table style='width:25%'>";
      echo "<tr>";
      echo "<td> Nom </td>";
      echo "<td> <input type='text' name='Info[]' value=''/></td>";
      echo "</tr>";
      echo "<br>";
      echo "<tr>";
      echo "<td> Age </td>";
      echo "<td> <input type='text' name='Info[]' value=''/> </td>";
      echo "</table>";
    }
    echo "<br>";
    echo "<table style='width:25%'>";
    echo "</tr>";
    echo "<tr>";
    echo "<td> <input type='submit' name='page_precedente' value='page precedente'/> </td>";
    echo "<td> <input type='submit' name='confirmer' value='confirmer'/> </td>";
    echo "<td> <input type='submit' name='annuler' value='annuler'/> </td>";
    echo "</tr>";
    echo "</table>";
    ?>
  </form>
</body>
</html>
