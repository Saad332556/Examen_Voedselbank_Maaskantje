<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="../public/css/style.css">
  </head>
  <body>
  <h3 style="margin-left: 1rem;">
    <?= $data['title']; ?>
    <?= $data['voornaam']; ?>
    <?php if (!empty($data['tussenvoegsel'])) echo $data['tussenvoegsel'] . ' '; ?>
    <?= $data['achternaam']; ?>
</h3>

    <table style="margin-left: 1rem;">
        <tbody>
            <tr>
                <td>Voornaam:</td>
                <td><input type="text" name="voornaam" id="voornaam" disabled value="<?= $data['voornaam']; ?>"></td>
            </tr>
            <tr>
                <td>Tussenvoegsel:</td>
                <td><input type="text" name="tussenvoegsel" id="tussenvoegsel" disabled value="<?= $data['tussenvoegsel']; ?>"></td>
            </tr>
            <tr>
                <td>Achternaam:</td>
                <td><input type="text" name="achternaam" id="achternaam" disabled value="<?= $data['achternaam']; ?>"></td>
            </tr>
            <tr>
                <td>Geboortedatum:</td>
                <td><input type="date" name="geboortedatum" id="geboortedatum" disabled value="<?= $data['geboortedatum']; ?>"></td>
            </tr>
            <tr>
                <td>TypePersoon:</td>
                <td><input type="text" name="typepersoon" id="typepersoon" disabled value="<?= $data['typepersoon']; ?>"></td>
            </tr>
            <tr>
                <td>Vertegenwoordiger:</td>
                <td><input type="text" name="isvertegenwoordiger" id="isvertegenwoordiger" disabled value="<?= $data['isvertegenwoordiger']; ?>"></td>
            </tr>
            <tr>
                <td>Straatnaam:</td>
                <td><input type="text" name="straat" id="straat" disabled value="<?= $data['straat']; ?>"></td>
            </tr>
            <tr>
                <td>Huisnummer:</td>
                <td><input type="text" name="huisnummer" id="huisnummer" disabled value="<?= $data['huisnummer']; ?>"></td>
            </tr>
            <tr>
                <td>Toevoeging:</td>
                <td><input type="text" name="toevoeging" id="toevoeging" disabled value="<?= $data['toevoeging']; ?>"></td>
            </tr>
            <tr>
                <td>Postcode:</td>
                <td><input type="text" name="postcode" id="postcode" disabled value="<?= $data['postcode']; ?>"></td>
            </tr>
            <tr>
                <td>Woonplaats:</td>
                <td><input type="text" name="woonplaats" id="woonplaats" disabled value="<?= $data['woonplaats']; ?>"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" id="email" disabled value="<?= $data['email']; ?>"></td>
            </tr>
            <tr>
                <td>Mobiel:</td>
                <td><input type="mobile" name="mobiel" id="mobiel" disabled value="<?= $data['mobiel']; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" id="id" value="<?= $data['id']; ?>"></td>
                <td><input type="submit" name="submit" id="submit" value="Bewerken"></td>
            </tr>
        </tbody>
    </table>
    <!-- End table with Bootstrap classes -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>