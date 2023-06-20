<?php
    require_once APPROOT . '/Views/Includes/header.php';
?>


<h1>Welcome to the Admin Dashboard</h1>


<table class="table table-hover">
    <thead>
        <tr>
            <th>Naam</th>
            <th>ContactPersoon</th>
            <th>LeverancierNummer</th>
            <th>Mobiel</th>
            <th>Stad</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['dashboards'] as $dashboard) {?>
                    <tr>
                        <input type="hidden" id="id" value="<?= $dashboard->Id ?>">
                        <td> <?= $dashboard->Naam ?> </td>
                        <td> <?= $dashboard->ContactPersoon ?> </td>
                        <td> <?= $dashboard->LeverancierNummer ?> </td>
                        <td> <?= $dashboard->Mobiel ?> </td>

                        <td class="float">
                            <a class="btn btn-info" href="<?php URLROOT; ?>/Contact/details/<?= $dashboard->Id ?>"><i class="fab fa-readme" title="details sollicitatie"></i></a>
                        </td>


                    </tr>
        <?php }?>
    </tbody>
</table> 





    <?php require_once APPROOT . '/Views/Includes/footer.php'; ?>
