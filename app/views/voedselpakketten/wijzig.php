<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <script src="Javascript.js"></script>
  </head>
  <body>
  <span style="color: green;"><h3>Wijzig voedselpakket status</h3></span>
   <!-- Table with Bootstrap classes -->
 <select id="mySelect" class="form-select form-select-sm sm-1" aria-label="Default select example">
  <option selected>Niet Uitgereikt</option>
  <option value="1">Uitgereikt</option>
  <option value="2">Niet Uitgereikt</option>
</select>

    <!-- End table with Bootstrap classes -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <br>
    <button type="button" class="btn btn-secondary"onclick="window.location.href='<?= URLROOT ?>/landingpages/index'">Wijzig status voedselpakket</button>
    <button type="button" class="btn btn-primary" onclick="window.location.href='<?= URLROOT ?>/voedselpakketten/index'">terug</button>
<button type="button" class="btn btn-primary" onclick="window.location.href='<?= URLROOT ?>/landingpages/index'">home</button>
</body>
</html>
