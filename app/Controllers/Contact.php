<?php



class Contact extends BaseController
{

    private readonly mixed $ContactModel;
    private int $delay = 2;


    public function __construct()
    {


        $this->ContactModel = $this->model('ContactModel');
    }

    private function redirect($page)
    {
        header("Location: " . URLROOT . "/" . $page);
        exit;
    }


    public function index()
    {

        // Fetch all dashboards from dashboard model.
        $dashboards = $this->ContactModel->GetContacten();

        // Assign the result data from model to local variable.

        $data = ['dashboards' => $dashboards];


        $this->view('Contact/index', $data);
    }


    public function details(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Fetch selected user details by ID from the AdminModel
            $userDetailsData = $this->ContactModel->GetContactenById($id);

            $this->view('Contact/details', $userDetailsData);
        }
    }

   

    public function update(int $id)
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            // Get the selected Sollicitatie row from database by Id.
            $modifiedUserId = $this->ContactModel->GetContactenById($id);


            // Map the selected Sollicitatie row to object.
            $data = $modifiedUserId;

            // Send the modified Sollicitatie object to view Sollicitatie/update.
            $this->view('Contact/update', $data);
        }
        else //elseif($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST);

            // Get the input values of the Sollicitatie modified fields from the update view.
            $data = $_POST;

            // Valide all the input fields of update method.
            $isViewValid = true;

            // Check whether the update view is valid.
            // updateSollicitatieUseSP($data)
            if($isViewValid && $this->ContactModel->UpdateUserDetails($data))
            {
                
                // Redirect to the index Sollicitatie view. 
                header("refresh:$this->delay; url=" . URLROOT  . '/Contact/index');
            }
            else 
            {
                // Redirect to the update Sollicitatie view. 
                header("refresh:$this->delay; url=" . URLROOT  . '/Contact/update');

                // Stay in the update Sollicitatie view.
                $this->view('Contact/update', $data);
            }
        }  
    }


    


}