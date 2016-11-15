<html>
  <head>
    <link rel='stylesheet' type="text/css" href="Style.css">
    <title>Confirmation</title>
  </head>
  <body>
    <form method='POST' action="Controller.php">
      <h1>Confirmation des réservations</h1>
      <table>
        <tr>
          <td>Votre demande a bien été enregistrée.</td>
        </tr>
        <tr>
          <td>Merci de bien vouloir verser <?php echo $control->getPrice() ?> euros sur le compte 000-000000-00.</td>
        </tr>
        <tr>
          <td><input type='submit' value="Retour à la page d'acceuil" name='annuler'></td>
        </tr>
      </table>
    </form>
  </body>
</html>
