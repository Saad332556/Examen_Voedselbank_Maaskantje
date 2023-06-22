  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>

  <body>
    <span style="color: green;">
      <h3><u>Overzicht gezinnen met voedselpakketten</u></h3>
    </span>
    <form action="<?= URLROOT ?>/voedselpakketten/index" method="post">
      <select class="form-select form-select-sm sm-1" aria-label="Default select example" name="eetwens">
        <option selected>Selecteer Eetwens</option>
        <option value="1">GeenVarken</option>
        <option value="2">Veganistisch</option>
        <option value="3">Vegetarisch</option>
        <option value="4">Omnivoor</option>
      </select>
      <button type="submit" class="btn btn-secondary">Toon Gezinnen</button>
    </form>
    <!-- Table with Bootstrap classes -->
    <table class="table table-bordered table-white">
      <thead>
        <tr>
          <th>id</th>
          <th>Naam</th>
          <th>Omschrijving</th>
          <th>Volwassenen</th>
          <th>Kinderen</th>
          <th>Babys</th>
          <th>Vertegenwoordiger</th>
          <th>Voedselpakket Details</th>
        </tr>
      </thead>
      <tbody>
        <?= $data['rows']; ?>
      </tbody>
    </table>
    <!-- End table with Bootstrap classes -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <br>
    <button type="button" class="btn btn-primary" onclick="window.location.href='<?= URLROOT ?>/landingpages/index'">home</button>

  </html>