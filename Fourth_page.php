<html>
  <head>
    <link rel='stylesheet' type="text/css" href="Style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <title>Confirmation</title>
  </head>
  <body>
    <form method='POST' action="Controller.php">
      <div class="w3-container w3-teal" align='left'>
      <h1 align="center">Confirmation des réservations</h1>
      <table align="center">
        <tr>
          <td>Votre demande a bien été enregistrée.</td>
        </tr>
        <tr>
          <td>Merci de bien vouloir verser <?php echo $control->getPrice() ?> euros sur le compte 000-000000-00.</td>
        </tr>
        <tr>
          <td><input type='submit' value="Retour à la page d'acceuil" class="button" name='annuler'></td>
        </tr>
      </table>
      </div>
    </form>
  </body>
</html>
