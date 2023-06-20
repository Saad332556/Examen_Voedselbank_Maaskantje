<?php
    require_once APPROOT . '/Views/Includes/header.php';
?>
<section>


<h1>Welcome to the Admin Dashboard</h1>


<div class="form-group">
    <a class="btn btn-success float-right mb-2 extra-mrt" href="<?= URLROOT; ?>/Allergeen/create">Create new Allergeen</a>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th>KlantNaam</th>
            <th>Allergieen</th>
            <th>Specifieke wensen</th>
            <th>Details Allergeen</th>
            <th>Verwijderen</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['dashboards'] as $dashboard) {?>
                    <tr>
                        <input type="hidden" id="id" value="<?= $dashboard->Id ?>">
                        <td> <?= $dashboard->KlantNaam ?> </td>
                        <td> <?= $dashboard->Allergieen ?> </td>
                        <td> <?= $dashboard->specifieke_wensen ?> </td>


                        <td class="float">
                            <a class="btn btn-info" href="<?php URLROOT; ?>/Allergeen/details/<?= $dashboard->Id ?>"><i class="fab fa-readme" title="details Allergeen"></i></a>
                        </td>
                        <td>
                        <a class="btn btn-danger" href="<?php URLROOT; ?>/Allergeen/delete/<?= $dashboard->Id ?>"><i class="fab fa-trash" title="delete sollicitatie"></i></a> 

                        </td>
                    </tr>
        <?php }?>
    </tbody>
</table> 


        </section>



    <?php require_once APPROOT . '/Views/Includes/footer.php'; ?>
