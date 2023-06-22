    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="Javascript.js"></script>
    </head>

    <body>
        <div class="container">
            <span class="text-success">
                <h3>Wijzig voedselpakket status</h3>
            </span>


            <form action="<?= URLROOT ?>/voedselpakketten/update/<?= $id ?>" method="post">
                <!-- Hidden input id -->
                <input type="hidden" name="id" value="<?= $data["id"] ?>">
                <!-- Table with Bootstrap classes -->
                <select class="form-select form-select-sm sm-1" name="status" <?php if ($data['alert']) echo 'disabled'; ?>>
                    <option>Selecteer optie</option>
                    <option value="NietUitgereikt" <?php if ($data["status"] == "NietUitgereikt") echo 'selected'; ?>>Niet Uitgereikt</option>
                    <option value="Uitgereikt" <?php if ($data["status"] == "Uitgereikt") echo 'selected'; ?>>Uitgereikt</option>
                </select>

                <br>

                <button type="submit" class="btn btn-secondary" onclick="window.location.href='<?= URLROOT ?>/landingpages/index'" <?php if (isset($data['alert'])) echo 'disabled'; ?>>Wijzig status voedselpakket</button>
                <button type="button" class="btn btn-primary" onclick="window.location.href='<?= URLROOT ?>/voedselpakketten/index'">terug</button>
                <button type="button" class="btn btn-primary" onclick="window.location.href='<?= URLROOT ?>/landingpages/index'">home</button>
            </form>

            <!-- If success is dan toon je die -->
            <?php if (isset($data['success'])) : ?>
                <div class="alert" role="alert">
                    <?= $data['success'] ?>
                </div>
            <?php endif; ?>

            <!-- If alert is neergezet dan toon je die -->
            <?php if (isset($data['alert'])) : ?>
                <div class="alert" role="alert">
                    <?= $data['alert'] ?>
                </div>
            <?php endif; ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>

    </html>