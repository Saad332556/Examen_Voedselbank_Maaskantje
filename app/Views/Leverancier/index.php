<?php
    require_once APPROOT . '/Views/Includes/header.php';
?>


<div class="form-group">
    <a class="btn btn-success float-right mb-2 extra-mrt" href="<?= URLROOT; ?>/Sollicitatie/create">Create new
        Leverancier</a>
</div>
<div class="mt-4">


    <table class="table table-hover">
        <thead>
            <tr>
                <th>Bedrijfsnaam</th>
                <th>Adres</th>
                <th>EmailAdres</th>
                <th>Telefoonnummer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['Leveranciers'] as $Leverancier) {?>
            <tr>
                <input type="hidden" id="id" value="<?= $Leverancier->Id ?>">
                <td> <?= $Leverancier->bedrijfsnaam ?> </td>
                <td> <?= $Leverancier->adres ?> </td>
                <td> <?= $Leverancier->emailadres ?> </td>
                <td> <?= $Leverancier->telefoonnummer ?> </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<?php
    require_once APPROOT . '/Views/Includes/footer.php';
?>