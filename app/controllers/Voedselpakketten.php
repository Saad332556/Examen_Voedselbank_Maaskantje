<?php

class Voedselpakketten extends Controller
{
    //properties
    private $voedselpakketModel;

    // Dit is de constructor van de controller
    public function __construct() 
    {
        $this->voedselpakketModel = $this->model('Voedselpakket');
    }

    public function index()
    {
        $records = $this->voedselpakketModel->getVoedselpakketten();
        //var_dump($records);

        $rows = '';

        foreach ($records as $items)
        {
            $rows .= "<tr>
                        <td>$items->id</td>
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

            $this->voedselpakketModel->updateCountry($_POST);

            header("Location: " . URLROOT . "/country/index");
        }

        $record = $this->voedselpakketModel->getCountry($id);

        $data = [
            'title' => 'Update Landen',
            'Id' => $record->Id,
            'Name' => $record->Name,
            'CapitalCity' => $record->CapitalCity,
            'Continent' => $record->Continent,
            'Population' => $record->Population
        ]; 
        $this->view('countries/update', $data);
    }

    public function delete($id)
    {
        $result = $this->voedselpakketModel->deleteCountry($id);
        if ($result) {
            echo "Het record is verwijderd uit de database";
            header("Refresh: 3; URL=" . URLROOT . "/countries/index");
        } else {
            echo "Internal servererror, het record is niet verwijderd";
            header("Refresh: 3; URL=" . URLROOT . "/countries/index");
        }
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // $_POST array schoonmaken
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->voedselpakketModel->createCountry($_POST);

            if ($result) {
                echo "Het invoeren is gelukt";
                header("Refresh:3; URL=" . URLROOT . "/countries/index");
            } else {
                echo "Het invoeren is NIET gelukt";
                header("Refresh:3; URL=" . URLROOT . "/countries/index");
            }
        }

        $data = [
            'title' => 'Voeg een nieuw land toe'
        ];
        $this->view('countries/create', $data);
    }
}