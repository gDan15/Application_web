<html>
  <head>
    <Title> Reservation -- Page 1 </Title>
  </head>
    <body>
      <form method="POST" action="Controller.php">
      <table>
        <tr>
          <td> Destination  </td>
					<td> <input type="text" value='<?php if(isset($control)) echo $control->getDestination()?>' name="destination"/> </td>
				</tr>
        <tr>
          <td> Nombre de place </td>
          <td> <input type="text" value='<?php if(isset($control)) echo $control->getPlace() ?>' name="place"/> </td>
        </tr>
        <tr>
          <td> <input type="submit" value="Continuer" name="Continuer"> </td>
          <td> <input type="submit" value="Annuler" name="Annuler"/> </td>
        </tr>
      </table>
      <form>
</body>
</html>
