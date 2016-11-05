<html>
  <head>
    <Title> Réservation </Title>
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
      </table>
      <table>
        <tr>
          <td> <input type="submit" value="continuer" name="continuer"> </td>
          <td> <input type="submit" value="annuler" name="annuler"/> </td>
        </tr>
      </table>
      <form>
</body>
</html>
