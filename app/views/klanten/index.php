<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <h1>Overzicht Klanten</h1>
    <!-- Table with Bootstrap classes -->
<table class="table table-bordered table-white">
    <thead>
        <tr>
            <th>Id</th>
            <th>Naam</th>
            <th>Adres</th>
            <th>Email</th>
            <th>Telefoonnummer</th>
            <th>Volwassenen</th>
            <th>Kinderen</th>
            <th>Baby</th>
            <th>Wijzig</th>
            <th>Verwijder</th>    
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
<br>
<button type="button" class="btn btn-primary" onclick="window.location.href='<?= URLROOT ?>/klanten/create'">Voeg klant toe</button

