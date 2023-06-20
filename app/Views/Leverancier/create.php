<?php
    require_once APPROOT . '/Views/Includes/header.php';
?>

<div class="container container-mvckdemo">
    <div class="wrapper-mvckdemo">
        <div class="form-group">
            <h2>Maken nieuwe Leverancier</h2>
            <form id="CreateLeverancier" method="POST" action="<?= URLROOT; ?>/Leverancier/create" autocomplete="on">

                <div class="form-group row">
                    <label class="col-sm-3 control-label">voornaam *</label>
                    <input type="text" class="input-field-error-message" name="voornaam" required="true" maxlength="50"
                        value="<?= isset($data->voornaam) ? $data->voornaam : '' ?>">
                    <span class="invalidFeedback"><?= isset($data->voornaamError) ? $data->voornaamError : '' ?></span>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">achternaam *</label>
                    <input type="text" class="input-field-error-message" name="achternaam" required="true"
                        maxlength="50" value="<?= isset($data->achternaam) ? $data->achternaam : '' ?>">
                    <span
                        class="invalidFeedback"><?= isset($data->achternaamError) ? $data->achternaamError : '' ?></span>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">bedrijfsnaam *</label>
                    <input type="text" class="input-field-error-message" name="bedrijfsnaam" required="true"
                        value="<?= isset($data->bedrijfsnaam) ? $data->bedrijfsnaam : '' ?>">
                    <span
                        class="invalidFeedback"><?= isset($data->bedrijfsnaamError) ? $data->bedrijfsnaamError : '' ?></span>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">adres</label>
                    <input type="text" class="input-field-error-message" name="adres" required="true" maxlength="50"
                        value="<?= isset($data->adres) ? $data->adres : '' ?>">
                    <span class="invalidFeedback"><?= isset($data->adresError) ? $data->adresError : '' ?></span>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">contactpersoon *</label>
                    <input type="text" style="width: 11.7rem;" class="input-field-error-message" name="contactpersoon"
                        required="true" maxlength="10"
                        value="<?= isset($data->contactpersoon) ? $data->contactpersoon : '' ?>">
                    <span
                        class="invalidFeedback"><?= isset($data->contactpersoonError) ? $data->contactpersoonError : '' ?></span>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">emailadres *</label>
                    <input type="text" class="input-field-error-message" name="emailadres" required="true"
                        maxlength="50" value="<?= isset($data->emailadres) ? $data->emailadres : '' ?>">
                    <span
                        class="invalidFeedback"><?= isset($data->emailadresError) ? $data->emailadresError : '' ?></span>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">telefoonnummer *</label>
                    <input type="text" class="input-field-error-message" name="telefoonnummer" required="true"
                        value="<?= isset($data->telefoonnummer) ? $data->telefoonnummer : '' ?>">
                    <span
                        class="invalidFeedback"><?= isset($data->telefoonnummerError) ? $data->telefoonnummerError : '' ?></span>
                </div>

                <div class="form-group row float-lg-right">
                    <a class="btn btn-primary mr-1" href="<?= URLROOT; ?>/Leverancier/index">Back</a>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    require_once APPROOT . '/Views/Includes/footer.php';
?>