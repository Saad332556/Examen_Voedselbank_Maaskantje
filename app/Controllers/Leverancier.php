<?php

class Leverancier extends BaseController
{
    private int $delay = 2;
    private string $infoMessage = '';

    private readonly mixed $LeverancierModel;

    public function __construct()
    {
        $this->LeverancierModel = $this->model('LeverancierModel');
    }

    public function index()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            $Leveranciers = $this->LeverancierModel->GetLeveranciers();

            $data = ['Leveranciers' => $Leveranciers];

            $this->view('Leverancier/index', $data);

        }
    }

    public function details($Id)
        {
            if($_SERVER['REQUEST_METHOD'] == 'GET')
            {
                // Fetch selected Leverancier by Id from Leverancier model.
                $data = $this->LeverancierModel->GetLeveranciersById($Id);

                // Send the selected Leverancier to view Leverancier/details.
                $this->view('Leverancier/details', $data);
            }
        }

    public function update($id)
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Get the selected Leverancier row from the database by id.
        $modifiedLeverancier = $this->LeverancierModel->getLeveranciersById($id);

        // Map the selected Leverancier row to an object.
        $data = LeverancierHelper::mapLeverancierRowToObject($modifiedLeverancier);

        // Send the modified Leverancier object to the update view.
        $this->view('Leverancier/update', $data);
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST);

        // Get the input values of the modified Leverancier fields from the update view.
        $data = LeverancierHelper::setInputLeverancierFieldsToLeverancierObject($_POST, 'update');

        // Set the ID in the data object.
        $data->Id = $id;

        // Validate all the input fields of the update method.
        $isViewValid = LeverancierValidator::validateLeverancierInputFields($data);

        // Check whether the update view is valid.
        if ($isViewValid && $this->LeverancierModel->updateLeverancierUseSPMySql($data)) {
            // Display an info message on the company index view.
            $this->infoMessage = FormatTextHelper::getInfoMessage("Selected Leverancier has been modified", EnumTypeMessage::Success);

            // Redirect to the index Leverancier view.
            header("refresh:$this->delay; url=" . URLROOT . '/Leverancier/index' . $this->infoMessage);
        } else {
            // Display an info message on the Leverancier update view.
            $this->infoMessage = FormatTextHelper::getInfoMessage("Selected Leverancier has not been modified", EnumTypeMessage::Error);

            // Stay in the update Leverancier view.
            $this->view('Leverancier/update', $data);
        }
    }
}

}