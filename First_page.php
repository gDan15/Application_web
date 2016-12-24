<html>
  <head>
    <Title> Réservation </Title>
    <link rel="stylesheet" type="text/css" href="Style.css">
  </head>
  <body>
    <form method="POST" action="Routeur.php">
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
      <table align="center">
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
              if($control->getErrorText() && ($control->getPlace()=="" || (int)($control->getPlace())<=0 || (int)($control->getPlace())>=100)){
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
      <!-- div{
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
      } -->
      <!-- <label for="fname">First Name</label>
      <input type="text" id="fname" name="firstname"> -->

      <table align="center">
        <tr>
          <td> <input type="submit" value="continuer" class="button" name="continuer"> </td>
          <td> <input type="submit" value="annuler" class="button" name="annuler"/> </td>
        </tr>
      </table>
    <form>
  </body>
</html>
