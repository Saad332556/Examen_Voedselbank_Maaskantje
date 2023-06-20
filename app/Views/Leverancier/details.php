<?php require_once APPROOT . '/Views/Includes/header.php'; ?>



<div class="container container-mvckdemo">
    <div class="wrapper-mvckdemo">
        <div class="form-group">
            <h2>Details van Leverancier</h2>
            <form id="DetailsLeverancier" method="GET" action="<?= URLROOT; ?>/Leverancier/details?id=">

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Voornaam</label>
                    <input type="text" disabled value="<?= $data->voornaam ?>"></input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Achternaam</label>
                    <input type="text" disabled value="<?= $data->achternaam ?>"></input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">bedrijfsnaam</label>
                    <input type="text" disabled value="<?= $data->bedrijfsnaam ?>"></input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">adres</label>
                    <input type="text" disabled value="<?= $data->adres ?>"></input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">contactpersoon</label>
                    <input type="text" disabled value="<?= $data->contactpersoon ?>"></input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">emailadres</label>
                    <input type="text" disabled value="<?= $data->emailadres ?>"></input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">telefoonnummer</label>
                    <input type="number" style="width:12rem" disabled value="<?= $data->telefoonnummer ?>"></input>
                </div>

                <div class="form-group row float-lg-right">
                    <a class="btn btn-primary mr-1" href="<?= URLROOT; ?>/Leverancier/index">Back</a>
                    <a class="btn btn-warning" href="<?= URLROOT; ?>/Leverancier/update/<?= $data->id ?>">Update</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/Views/Includes/footer.php'; ?>