<?php

class Allergeen extends BaseController
{
    private mixed $AllergeenModel;
    private int $delay = 2;

    public function __construct()
    {
        $this->AllergeenModel = $this->model('AllergeenModel');
    }

    private function redirect($page)
    {
        header("Location: " . URLROOT . "/" . $page);
        exit;
    }

    public function index()
    {
        try {
            $dashboards = $this->AllergeenModel->GetKlantAllergie();
            $data = ['dashboards' => $dashboards];
            $this->view('Allergeen/index', $data);
        } catch (Exception $e) {
            // Display error message or handle the exception appropriately
            echo "An error occurred: " . $e->getMessage();
        }
    }

    public function details(int $id)
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $userDetailsData = $this->AllergeenModel->GetKlantAllergieById($id);
                $this->view('Allergeen/details', $userDetailsData);
            }
        } catch (Exception $e) {
            echo "An error occurred: " . $e->getMessage();
        }
    }
    public function update(int $id)
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                // Get the selected Sollicitatie row from the database by Id.
                $modifiedUserId = $this->AllergeenModel->GetKlantAllergieById($id);
    
                // Map the selected Sollicitatie row to the object.
                $data = $modifiedUserId;
    
                // Send the modified Sollicitatie object to view Sollicitatie/update.
                $this->view('Allergeen/update', $data);
            } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST);
    
                // Get the input values of the Sollicitatie modified fields from the update view.
                $data = [
                    'Id' => $id,
                    'allergeen_id' => $_POST['allergeen_id']
                ];
    
                // Validate all the input fields of the update method.
                $isViewValid = true;
    
                // Check whether the update view is valid.
                if ($isViewValid && $this->AllergeenModel->UpdateKlantAllergie($data)) {
                    // Set the success message.
                    $successMessage = "Sollicitatie successfully updated!";
                    $this->setFlashMessage('success', $successMessage);
    
                    // Redirect to the index Sollicitatie view.
                    header("refresh:$this->delay; url=" . URLROOT . '/Allergeen/index' . $e);
                    exit;
                } else {
                    // Stay in the update Sollicitatie view.
                    $this->view('Allergeen/update', $data);
                }
            }
        } catch (Exception $e) {
            echo "An error occurred: " . $e->getMessage();
        }
    }
    
    private function setFlashMessage($type, $message)
    {
        // Set the flash message in the session.
        $_SESSION['flash_message'] = [
            'type' => $type,
            'message' => $message
        ];
    }
    

    public function create()
    {
        try {
            // Create a new empty Allergeen object for the create view.
            $data = [
                'Klanten' => $_POST['Klanten'] ?? '',
                'Allergie' => $_POST['Allergie'] ?? ''
            ];
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $this->view('Allergeen/create', $data);
            } else {
                $_POST = filter_input_array(INPUT_POST);

                // Get the input values of the Allergeen fields from the create view.
                $data = $_POST;

                // Validate all the input fields of the create method.
                $isViewValid = $data;

                // Check whether the create view is valid.
                if ($isViewValid && $this->AllergeenModel->createCreateAllergiel($data)) {
                    // Redirect to the index Allergeen view.
                    header("refresh:$this->delay; url=" . URLROOT . '/Allergeen/index');
                } else {
                    // Display an error message on the create Allergeen view.

                    // Redirect to the create Allergeen view.
                    header("refresh:$this->delay; url=" . URLROOT . '/Allergeen/create');

                    // Stay in the create Allergeen view.
                    $this->view('Allergeen/update', $data);
                }
            }
        } catch (Exception $e) {
            echo "An error occurred: " . $e->getMessage();
        }
    }

    public function delete(int $id)
    {
        try {
            // Check whether the delete request has been processed.
            if ($this->AllergeenModel->DeleteAllergie($id)) {
                // Redirect to the index Allergeen view.
                header("refresh:$this->delay; url=" . URLROOT . '/Allergeen/index');
            } else {
                // Redirect to the index Allergeen view.
                header("refresh:$this->delay; url=" . URLROOT . '/Allergeen/index');

                // Stay in the index Allergeen view.
                $this->view('Allergeen/index');
            }
        } catch (Exception $e) {
            echo "An error occurred: " . $e->getMessage();
        }
    }
    
    


}
