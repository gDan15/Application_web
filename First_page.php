<html>
  <head>
    <Title> Réservation </Title>
    <link rel="stylesheet" type="text/css" href="Style.css" media="screen" />
  </head>
  <body>
    <form method="POST" action="Routeur.php">
      <div id="wrapper">
        <h1 align="center">Réservation</h1>
        <table align="center">
          <tr>
            <td align="left">Le prix de la place est de 10 euros jusqu'à 12 ans et ensuite de 15 euros.</td>
          </tr>
          <tr>
            <td align="left">Le prix de l'assurance annulation est de 20 euros quel que soit le nombre de voyageurs.</td>
          </tr>
        </table>
        </p>
        <br>
        <table align="center"  bgcolor=#008CBA>
          <tr>
            <td colspan="2" align="left"> Destination  </td>
          </tr>
          <tr>
    				<td colspan="2"> <input type="text" value='<?php if(isset($control) && !$control->state()) echo $control->getDestination()?>' name="destination"/> </td>
          </tr>
          <tr>
            <td colspan="2">
            <?php
              if(isset($control)){
                if($control->getErrorText() && ($control->getDestination()=="" || is_numeric($control->getDestination()))){
                  echo "<error> Veuillez entrer une destination valide </error>";
                }
              }
            ?>
          </td>
          </tr>
          <tr>
            <td colspan="2" align="left"> Nombre de place </td>
          </tr>
          <tr>
            <td colspan="2"> <input type="text" value='<?php if(isset($control) && !$control->state()) echo $control->getPlace() ?>' name="place"/> </td>
          </tr>
          <tr>
            <td colspan="2">
            <?php
              if(isset($control)){
                if($control->getErrorText() && ($control->getPlace()=="" || (int)($control->getPlace())<=0 || (int)($control->getPlace())>10)){
                  echo "<error> Il faut qu'il y ait minimum une place et maximum 10 places </error>";
                }
              }
            ?>
          </td>
          </tr>
          <tr>
            <td align="left">Assurance</td>
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
        </table>
        <br>
        <table align="center">
          <tr>
            <td> <input type="submit" value="continuer" class="button" name="continuer"> </td>
            <td> <input type="submit" value="annuler" class="button" name="annuler"/> </td>
          </tr>
        </table>
      </div>
    <form>
  </body>
</html>
