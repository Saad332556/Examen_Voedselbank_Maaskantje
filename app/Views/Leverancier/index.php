<?php
    require_once APPROOT . '/Views/Includes/header.php';
?>


<div class="form-group">
    <a class="btn btn-success float-right mb-2 extra-mrt" href="<?= URLROOT; ?>/Leverancier/create">Create new
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
                <td class="float-right">
                    <a class="btn btn-info" href="<?php URLROOT; ?>/Leverancier/details/<?= $Leverancier->Id ?>"><i
                            class="fab fa-readme" title="details Leverancier"></i></a>
                    <a class="btn btn-danger" href="<?php URLROOT; ?>/Leverancier/delete/<?= $Leverancier->Id ?>"><i
                            class="fab fa-trash" title="delete Leverancier"></i></a>
                    <!-- <a class="btndelete btn btn-danger" href="javascript:void(0)"><i class="fab fa-trash" title="delete company"></i></a>  -->
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<?php
    require_once APPROOT . '/Views/Includes/footer.php';
?>