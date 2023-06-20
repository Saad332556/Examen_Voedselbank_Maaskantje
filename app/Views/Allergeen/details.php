<?php require_once APPROOT . '/Views/Includes/header.php'; ?>

<section>

<div class="container container-mvckdemo">
    <div class="wrapper-mvckdemo">
        <div class="form-group">
            <h2>Details van userDetails</h2>

            <div class="form-group row">
                <label class="col-sm-3 control-label">KlantNaam</label>
                <input type="text" disabled value="<?= $data->KlantNaam ?>" />
            </div>

            <div class="form-group row">
                <label class="col-sm-3 control-label">Allergieen</label>
                <input type="text" disabled value="<?= $data->Allergieen ?>" />
            </div>

            <div class="form-group row float-lg-right">
                <a class="btn btn-warning" href="<?php URLROOT; ?>/Allergeen/update/<?= $data->Id ?>">Update</a>

                <a class="btn btn-primary mr-1" href="<?= URLROOT; ?>/Allergeen/index">Back</a>
            </div>
            <br>
        </div>
    </div>
</div>

</section>


<?php require_once APPROOT . '/Views/Includes/footer.php'; ?>
