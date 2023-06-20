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

        public function update(int $id)
        {
            if($_SERVER['REQUEST_METHOD'] == 'GET')
            {
                // Get the selected Leverancier row from database by Id.
                $modifiedLeverancier = $this->LeverancierModel->getLeverancierById($id);

                // $modifiedLeverancier = $this->LeverancierModel->getLeverancierByIdUseSPSqlServer($id);

                // Map the selected Leverancier row to object.
                $data = leverancierHelper::mapLeverancierRowToObject($modifiedLeverancier);

                // Send the modified Leverancier object to view Leverancier/update.
                $this->view('Leverancier/update', $data);
            }
            else //elseif($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $_POST = filter_input_array(INPUT_POST);

                // Get the input values of the Leverancier modified fields from the update view.
                $data = leverancierHelper::setInputLeverancierFieldsToLeverancierObject($_POST, 'update');

                // Valide all the input fields of update method.
                $isViewValid = LeverancierValidator::validateLeverancierInputFields($data);

                // Check whether the update view is valid.
                // updateLeverancierUseSP($data)
                if($isViewValid && $this->LeverancierModel->updateLeverancierUseSPMySql($data))
                //if($isViewValid && $this->LeverancierModel->updateLeverancierUseSPSqlServer($data))
                {
                    // Display een info message on company index view.
                    $this->infoMessage = FormatTextHelper::GetInfoMessage("Selected Leverancier has been modified", EnumTypeMessage::Success);

                    // Redirect to the index Leverancier view. 
                    header("refresh:$this->delay; url=" . URLROOT  . '/Leverancier/index' . $this->infoMessage);
                }
                else 
                {
                    // Display een info message on Leverancier update view.
                    $this->infoMessage = FormatTextHelper::GetInfoMessage("Selected Leverancier has been not modified", EnumTypeMessage::Error);

                    // Redirect to the update Leverancier view. 
                    header("refresh:$this->delay; url=" . URLROOT  . '/Leverancier/update' . $this->infoMessage);

                    // Stay in the update Leverancier view.
                    $this->view('Leverancier/update', $data);
                }
            }  
        }
}