<?php require_once APPROOT . '/Views/Includes/header.php'; ?>
<section>

    <div class="container container-mvckdemo">
        <div class="wrapper-mvckdemo">
            <div class="form-group">
                <h2>Bijwerken Sollicitatie</h2>

                <!-- Display flash message if it exists -->
                <?php if (isset($_SESSION['flash_message'])) : ?>
                    <div class="alert alert-<?= $_SESSION['flash_message']['type']; ?>">
                        <?= $_SESSION['flash_message']['message']; ?>
                    </div>
                    <?php unset($_SESSION['flash_message']); ?>
                <?php endif; ?>

                <form id="UpdateUser" method="POST" action="<?= URLROOT; ?>/Allergeen/update/<?= $data->Id ?>"
                      autocomplete="on">
                    <input type="hidden" name="Id" value="<?= $data->Id ?>">

                    <div class="form-group row">
                        <label class="col-sm-3 control-label">Soort Allergie *</label>
                        <select name="allergeen_id" class="form-control" required>
                            <option value="1" <?= ($data->allergeen_id == 1) ? 'selected' : '' ?>>Gluten</option>
                            <option value="2" <?= ($data->allergeen_id == 2) ? 'selected' : '' ?>>Pinda</option>
                            <option value="3" <?= ($data->allergeen_id == 3) ? 'selected' : '' ?>>Schaaldieren</option>
                            <option value="4" <?= ($data->allergeen_id == 4) ? 'selected' : '' ?>>Schaaldieren</option>
                            <option value="5" <?= ($data->allergeen_id == 5) ? 'selected' : '' ?>>Lactose</option>
                        </select>
                    </div>

                    <div class="form-group row float-lg-right">
                        <a class="btn btn-primary mr-1" href="<?= URLROOT; ?>/Allergeen/index">Back</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>

<?php require_once APPROOT . '/Views/Includes/footer.php'; ?>
