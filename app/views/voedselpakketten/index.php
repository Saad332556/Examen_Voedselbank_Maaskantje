<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
  <h3><?= $data['title'] ?></h3>
  <a href="<?= URLROOT ?>/voedselpakketten/create">Nieuw record</a>
   <!-- Table with Bootstrap classes -->
    <table class="table table-bordered table-white">
      <thead>
        <tr>
          <th>Aantal producten</th>
          <th>Naam klant</th>
          <th>Pakketnummer</th>
          <th>Samenstellingsdatum</th>
          <th>Uitgiftedatum</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?= $data['rows']; ?>
      </tbody>
    </table>
    <!-- End table with Bootstrap classes -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <p><a href="<?= URLROOT; ?>/landingpages/index">back to landingpage</a></p>
  </body>
</html>
