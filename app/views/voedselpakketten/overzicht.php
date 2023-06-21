<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
  <span style="color: green;"><h3>Overzicht Voedselpakketten</h3></span>
  <table class="table table-bordered table-white">
    <thead>
      <tr>
  <th> Naam: <?= $data["naam"]; ?></th>
    <th>Omschrijving: <?= $data["omschrijving"]; ?></th>
    <th>Totaal aantal Personen: <?= $data["aantalvolwassenen"]; ?></th>
    </tr>
    </thead>
    </table>
   <!-- Table with Bootstrap classes -->
    <table class="table table-bordered table-white">
      <thead>
        <tr>
        <th>Id</th>
          <th>Pakketnummer</th>
          <th>Datum samenstelling</th>
          <th>Datum uitgifte</th>
          <th>Status</th>
          <th>Aantal producten</th>
          <th>Wijzig Status</th>
        </tr>
      </thead>
      <tbody>
        <?= $data['rows']; ?>
      </tbody>
    </table>
    <!-- End table with Bootstrap classes -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <br>
    <button type="button" class="btn btn-primary" onclick="window.location.href='<?= URLROOT ?>/voedselpakketten/index'">terug</button>
<button type="button" class="btn btn-primary" onclick="window.location.href='<?= URLROOT ?>/landingpages/index'">home</button>
</html>
 