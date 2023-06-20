<?php require_once APPROOT . '/Views/Includes/header.php'; ?>

<div class="container container-mvckdemo">
    <div class="wrapper-mvckdemo">
        <div class="form-group">
            <h2>Bijwerken Leverancier</h2>
            <form id="UpdateLeverancier" method="POST" action="<?= URLROOT . '/Leverancier/update/' . $data->Id ?>"
                autocomplete="on">
                <input type="hidden" name="Id" value="<?= $data->Id ?>">

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Voornaam *</label>
                    <input type="text" class="input-field-error-message" name="voornaam" required="true" maxlength="50"
                        value="<?= $data->voornaam ?>">
                    <span class="invalidFeedback"><?= $data->voornaamError ?></span>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Achternaam *</label>
                    <input type="text" class="input-field-error-message" name="achternaam" required="true"
                        maxlength="50" value="<?= $data->achternaam ?>">
                    <span class="invalidFeedback"><?= $data->achternaamError ?></span>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Bedrijfsnaam *</label>
                    <input type="text" class="input-field-error-message" name="bedrijfsnaam" required="true"
                        value="<?= $data->bedrijfsnaam ?>">
                    <span class="invalidFeedback"><?= $data->bedrijfsnaamError ?></span>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Adres *</label>
                    <input type="text" class="input-field-error-message" name="adres" maxlength="50"
                        value="<?= $data->adres ?>">
                    <span class="invalidFeedback"><?= $data->adresError ?></span>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Contactpersoon *</label>
                    <input type="text" style="width: 11.7rem;" class="input-field-error-message" name="contactpersoon"
                        required="true" maxlength="10" value="<?= $data->contactpersoon ?>">
                    <span class="invalidFeedback"><?= $data->contactpersoonError ?></span>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Emailadres *</label>
                    <input type="text" class="input-field-error-message" name="emailadres" required="true"
                        maxlength="50" value="<?= $data->emailadres ?>">
                    <span class="invalidFeedback"><?= $data->emailadresError ?></span>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Telefoonnummer *</label>
                    <input type="number" class="input-field-error-message" name="telefoonnummer" required="true"
                        value="<?= $data->telefoonnummer ?>">
                    <span class="invalidFeedback"><?= $data->telefoonnummerError ?></span>
                </div>

                <div class="form-group row float-lg-right">
                    <a class="btn btn-primary mr-1" href="<?= URLROOT; ?>/Leverancier/index">Back</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/Views/Includes/footer.php'; ?>