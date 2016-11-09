<html>
  <head>
    <Title> Réservation </Title>
  </head>
  <body>
    <form method="POST" action="Controller.php">
      <link rel="stylesheet" type="text/css" href="Style.css">
    <table>
      <tr>
        <td> Destination  </td>
				<td> <input type="text" value='<?php if(isset($control)) echo $control->getDestination()?>' name="destination"/> </td>
			</tr>
      <tr>
        <td>
        <?php
          if(isset($control)){
            if($control->getErrorText() && $control->getDestination()==""){
              echo "Veuillez entrer quelque chose de valide";
            }
          }
        ?>
      </td>
      </tr>
      <tr>
        <td> Nombre de place </td>
        <td> <input type="text" value='<?php if(isset($control)) echo $control->getPlace() ?>' name="place"/> </td>
      </tr>
      <tr>
        <td>
        <?php
          if(isset($control)){
            if($control->getErrorText() && !is_numeric($control->getPlace())){
              echo "Veuillez entrer quelque chose de valide";
            }
          }
        ?>
      </td>
      </tr>
    </table>
    <table.ver1>
      <tr>
        <td> <input type="submit" value="continuer" name="continuer"> </td>
        <td> <input type="submit" value="annuler" name="annuler"/> </td>
      </tr>
    </table.ver2>
    <form>
  </body>
</html>
