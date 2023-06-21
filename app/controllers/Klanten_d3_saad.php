<?php

class Klanten_d3_saad extends Controller
{
    //properties
    private $klantModel;

    // Dit is de constructor van de controller
    public function __construct() 
    {
        $this->klantModel = $this->model('Klant_d3_saad');
    }

    public function index()
    {
        $records = $this->klantModel->getKlanten();
        // var_dump($records);

        $rows = '';

        foreach ($records as $items)
        {
            $rows .= "<tr>
                        <td>$items->Naam</td>
                        <td>$items->IsVertegenwoordiger</td>
                        <td>$items->Email</td>
                        <td>$items->Mobiel</td>
                        <td>$items->Adres</td>
                        <td>$items->Woonplaats</td>
                        <td>
                            <a href='" . URLROOT . "/klanten_3d_saad/update/$items->Id'>update</a>
                        </td>
                      </tr>";
        }

        $data = [
            'title' => "Overzicht Klanten",
            'rows' => $rows
        ];
        $this->view('klanten_d3_saad/index', $data);
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

            $this->klantModel->updateVoedselpakket($_POST);

            header("Location: " . URLROOT . "/voedselpakketten/index");
        }

        $record = $this->klantModel->getVoedselpakketById($id);

        $data = [
            'title' => 'Update voedselpakket',
            'id' => $record->id,
            'aantal' => $record->aantal
        ]; 
        $this->view('voedselpakketten/update', $data);
    }
}