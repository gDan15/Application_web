<html>
  <head>
    <link rel="stylesheet" type="text/css" href="Style.css" media="screen" />
    <title>Confirmation</title>
  </head>
  <body>
    <form method='POST' action="Controller.php">
      <div id="wrapper">
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
