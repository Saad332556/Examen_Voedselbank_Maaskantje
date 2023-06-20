<?php
     require_once APPROOT . '/Views/Includes/header.php';
?>

<div class="container container-mvckdemo">
     <div class="wrapper-mvckdemo">
         <div class="form-group">
             <h2>Create new Sollicitatie</h2>
             <form id="CreateSollicitatie" method="POST" action="<?= URLROOT; ?>/Sollicitatie/create" autocomplete="on">

                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Sollicitatie number *</label>
                    <input type="number" class="input-field-error-message" name="SollicitatieNumber" required="true"">
                        <span class="invalidFeedback"><?= $data->SollicitatieNumberError ?></span>
                    </input>
                 </div>
 
                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Gender *</label>
                    <select id="ddlGender" name="Genders" style="width:11.7rem;">
                        <option value="" disabled selected>Choose gender</option>
                        <option value="Male" <?= ($data->Gender == "Male")?"selected":"" ?> >Male</option>
                        <option value="Female" <?= ($data->Gender == "Female")?"selected":"" ?> >Female</option>
                        <option value="Transgender" <?= ($data->Gender == "Transgender")?"selected":"" ?> >Transgender</option>
                        <span class="invalidFeedback"><?= $data->GenderError ?></span>
                    </select>
                 </div>

                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Title</label>
                    <select id="ddlTitle" name="Titles" style="width:11.7rem;">
                            <option value="" disabled selected>Choose title</option>
                            <option value="Mr" <?= ($data->Title == "Mr")?"selected":"" ?> >Mr</option>
                            <option value="Mrs" <?= ($data->Title == "Mrs")?"selected":"" ?> >Mrs</option>
                            <option value="Miss" <?= ($data->Title == "Miss")?"selected":"" ?> >Miss</option>
                            <span class="invalidFeedback"><?= $data->TitleError ?></span>
                    </select>
                 </div>

                 <div class="form-group row">
                    <label class="col-sm-3 control-label">FirstName *</label>
                    <input type="text" class="input-field-error-message" name="FirstName" required="true" maxlength="50">
                        <span class="invalidFeedback"><?= $data->FirstNameError ?></span>
                    </input>
                 </div>
 
                 <div class="form-group row float-lg-right">
                    <a class="btn btn-primary mr-1" href="<?= URLROOT; ?>/Sollicitatie/index">Back</a>
                    <button type="submit" class="btn btn-success">Save</button>
                 </div>
             </form>
         </div>
     </div>
 </div>

<?php
    require_once APPROOT . '/Views/Includes/footer.php';
?>