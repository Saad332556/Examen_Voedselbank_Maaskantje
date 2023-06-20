<?php
require_once APPROOT . '/Views/Includes/header.php';
?>

<?php

$userDetailsData = $data;

?>


<div class="container container-mvckdemo">
    <div class="wrapper-mvckdemo">
        <div class="form-group">
            <h2>Details van userDetails</h2>
            <form id="userDetails" method="GET" action="<?= URLROOT; ?>/Contact/details?id=">

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Naam</label>
                    <input type="text" disabled value="<?= $data->Naam ?>"></input>
                </div>

              

                <div class="form-group row float-lg-right">
                    <a class="btn btn-primary mr-1" href="<?php URLROOT; ?>/Contact/index">Back</a>
                    <a class="btn btn-warning" href="<?php URLROOT; ?>/Contact/update/<?= $data->Id ?>">Update</a>
                </div>

                <br>
            
            </form>
        </div>
    </div>
</div>


<?php
require_once APPROOT . '/Views/Includes/footer.php';
?>