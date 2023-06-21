<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="../public/css/style.css">
  </head>
  <body>
    <h3 style="margin-left: 1rem;"><?= $data['title']; ?></h3>
    <table class="table table-bordered table-white" style="margin: 1rem;">
        <thead>
            <tr>
                <th>Voornaam</th>
                <th>Tussenvoegsel</th>
                <th>Achternaam</th>
                <th>Geboortedatum</th>
                <th>TypePersoon</th>
                <th>Vertegenwoordiger</th>
                <th>Straatnaam</th>
                <th>Huisnummer</th>
                <th>Toevoeging</th>
                <th>Postcode</th>
                <th>Woonplaats</th>
                <th>Email</th>
                <th>Mobiel</th>
            </tr>
        </thead>
        <tbody>
            <?= $data['rows']; ?>
        </tbody>
    </table>
    <!-- End table with Bootstrap classes -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
</html>