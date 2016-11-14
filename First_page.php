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
            if($control->getErrorText() && ($control->getDestination()=="" || is_numeric($control->getDestination()))){
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
            if($control->getErrorText() && ($control->getPlace()=="" || (int)($control->getPlace())<=0 || (int)($control->getPlace())>=100)){
              echo "Veuillez entrer quelque chose de valide";
            }
          }
        ?>
      </td>
      </tr>
      <tr>
        <td>Assurance</td>
        <td>
        <?php
          if(isset($control)){
            echo "<input type=\"checkbox\" name=\"case\" value=\"case\"";
            if($control->getBox()){
              echo "checked";
            }
            echo "/>";
          }
        ?>
        </td>
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
