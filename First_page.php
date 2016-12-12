<html>
  <head>
    <Title> Réservation </Title>
    <link rel="stylesheet" type="text/css" href="Style.css">
  </head>
  <body>
    <form method="POST" action="Controller.php">
      <h1>Réservation</h1>
      <table>
        <tr>
          <td>Le prix de la place est de 10 euros jusqu'à 12 ans et ensuite de 15 euros.</td>
        </tr>
        <tr>
          <td>Le prix de l'assurance annulation est de 20 euros quel que soit le nombre de voyageurs.</td>
        </tr>
      </table>
      <br>
      <table class="table1">
        <tr>
          <td> Destination  </td>
  				<td> <input type="text" value='<?php if(isset($control) && !$control->state()) echo $control->getDestination()?>' name="destination"/> </td>
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
          <td> <input type="text" value='<?php if(isset($control) && !$control->state()) echo $control->getPlace() ?>' name="place"/> </td>
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
            echo "<input type=\"checkbox\" name=\"case\" value=\"case\"";
            if(isset($control) && $control->getBox() && !$control->state()){
              echo "checked";
            }
            echo "/>";
          ?>
          </td>
        </tr>
      </table1>
      <table class='table1'>
        <tr>
          <td> <input type="submit" value="continuer" name="continuer"> </td>
          <td> <input type="submit" value="annuler" name="annuler"/> </td>
        </tr>
      </table1>
    <form>
  </body>
</html>
