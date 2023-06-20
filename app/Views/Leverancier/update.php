<?php
     require_once APPROOT . '/Views/Includes/header.php';
?>

<!-- <div>
    <?php

    $Leverancier = $data;
    ?>    
</div> -->

<div class="container container-mvckdemo">
    <div class="wrapper-mvckdemo">
        <div class="form-group">
            <h2>Bijwerken Leverancier</h2>
            <form id="UpdateLeverancier" method="POST" action="<?= URLROOT; ?>/Leverancier/update/<?= $data->Id ?>"
                autocomplete="on">
                <input type="hidden" name="Id" value="<?= $data->Id ?>">

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Voornaam *</label>
                    <input type="text" class="input-field-error-message" name="Voornaam" required="true" maxlength="50"
                        value="<?= $data->Voornaam ?>">
                    </input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Achternaam *</label>
                    <input type="text" class="input-field-error-message" name="Achternaam" required="true"
                        maxlength="50" value="<?= $data->Achternaam ?>">
                    </input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">bedrijfsnaam *</label>
                    <input type="number" class="input-field-error-message" name="bedrijfsnaam" required="true"
                        value="<?= $data->bedrijfsnaam ?>">
                    </input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">adres</label>
                    <input type="text" class="input-field-error-message" name="adres" required="true" maxlength="50"
                        value="<?= $data->adres ?>">
                    </input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">contactpersoon *</label>
                    <input type="text" style="width:11.7rem;" class=" input-field-error-message" name="contactpersoon"
                        required="true" maxlength="10" value="<?= $data->contactpersoon ?>">
                    </input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">emailadres *</label>
                    <input type="text" class="input-field-error-message" name="emailadres" required="true"
                        maxlength="50" value="<?= $data->emailadres ?>">
                    </input>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">telefoonnummer *</label>
                    <input type="number" class="input-field-error-message" name="telefoonnummer" required="true"
                        value="<?= $data->telefoonnummer ?>">
                    </input>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    require_once APPROOT . '/Views/Includes/footer.php';
?>