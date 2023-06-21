<?php

class Klanten_d3_saad extends Controller
{
    //properties
    private $voedselpakketModel;

    // Dit is de constructor van de controller
    public function __construct() 
    {
        $this->voedselpakketModel = $this->model('Klant_d3_saad');
    }

    public function index()
    {
        $records = $this->voedselpakketModel->getVoedselpakketten();
        //var_dump($records);

        $rows = '';

        foreach ($records as $items)
        {
            $rows .= "<tr>
                        <td>$items->aantal</td>
                        <td>$items->naam</td>
                        <td>$items->pakketnummer</td>
                        <td>$items->datum_samenstelling</td>
                        <td>$items->datum_uitgifte</td>
                        <td>
                            <a href='" . URLROOT . "/voedselpakketten/update/$items->id'>update</a>
                        </td>
                        <td>
                            <a href='" . URLROOT . "/voedselpakketten/delete/$items->id'>delete</a>
                        </td>
                      </tr>";
        }

        $data = [
            'title' => "Overzicht voedselpakketten",
            'rows' => $rows
        ];
        $this->view('voedselpakketten/index', $data);
    }

    public function update($id = null) 
    {
        /**
         * Controleer of er gepost wordt vanuit de view update.php
         */
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /**
             * Maak het $_POST array schoon
             */
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $this->voedselpakketModel->updateVoedselpakket($_POST);

            header("Location: " . URLROOT . "/voedselpakketten/index");
        }

        $record = $this->voedselpakketModel->getVoedselpakketById($id);

        $data = [
            'title' => 'Update voedselpakket',
            'id' => $record->id,
            'aantal' => $record->aantal
        ]; 
        $this->view('voedselpakketten/update', $data);
    }

    public function delete($id)
    {
        $result = $this->voedselpakketModel->deleteVoedselpakket($id);
        if ($result) {
            echo "Het record is met success verwijderd";
            header("Refresh: 3; URL=" . URLROOT . "/voedselpakketten/index");
        } else {
            echo "Internal servererror, het record is niet verwijderd";
        }
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // $_POST array schoonmaken
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->voedselpakketModel->createVoedselpakket($_POST);

            if ($result) {
                echo "Het invoeren is gelukt";
                header("Refresh:3; URL=" . URLROOT . "/voedselpakketten/index");
            } else {
                echo "Het invoeren is NIET gelukt";
                header("Refresh:3; URL=" . URLROOT . "/voedselpakketten/index");
            }
        }

        $data = [
            'title' => 'Voeg een nieuw voedselpakket toe'
        ];
        $this->view('voedselpakketten/create', $data);
    }
}