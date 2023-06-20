<?php
require_once APPROOT . '/Views/Includes/header.php';
?>



<div class="container container-mvckdemo">
    <div class="wrapper-mvckdemo">
        <div class="form-group">
            <h2>Bijwerken Sollicitatie</h2>
            <form id="UpdateUser" method="POST" action="<?= URLROOT; ?>Contact/update/<?= $data->Id ?>"
                autocomplete="on">
                <input type="hidden" name="Id" value="<?= $data->Id ?>">

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Naam *</label>
                    <input type="text" class="input-field-error-message" name="Naam" required="true" maxlength="255"
                        value="<?= $data->Naam ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">ContactPersoon *</label>
                    <input type="text" class="input-field-error-message" name="ContactPersoon" required="true"
                        maxlength="255" value="<?= $data->ContactPersoon ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">LeverancierNummer *</label>
                    <input type="text" class="input-field-error-message" name="LeverancierNummer" required="true" maxlength="255"
                        value="<?= $data->LeverancierNummer ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Mobiel *</label>
                    <input type="text" class="input-field-error-message" name="Mobiel" required="true" maxlength="255"
                        value="<?= $data->Mobiel ?>">
                </div>
          

                <div class="form-group row">
                    <label class="col-sm-3 control-label">straat *</label>
                    <input type="text" class="input-field-error-message" name="Straat" required="true" maxlength="11"
                        value="<?= $data->Straat ?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">huisnummer *</label>
                    <input type="text" class="input-field-error-message" name="Huisnummer" required="true" maxlength="50"
                        value="<?= $data->Huisnummer ?>">
                </div>

                
                <div class="form-group row">
                    <label class="col-sm-3 control-label">Postcode *</label>
                    <input type="text" class="input-field-error-message" name="Postcode" required="true" maxlength="50"
                        value="<?= $data->Postcode ?>">
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 control-label">Stad *</label>
                    <input type="text" class="input-field-error-message" name="Stad" required="true" maxlength="50"
                        value="<?= $data->Stad ?>">
                </div>

                <div class="form-group row float-lg-right">
                    <a class="btn btn-primary mr-1" href="<?= URLROOT; ?>Contact/index">Back</a>
                    <button type="submit" class="btn btn-success">Save</button>
                        
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once APPROOT . '/Views/Includes/footer.php';
?>
