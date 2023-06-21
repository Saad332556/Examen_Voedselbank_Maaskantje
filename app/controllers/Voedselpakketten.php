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
                        <td>$items->Naam</td>
                        <td>$items->Omschrijving</td>
                        <td>$items->AantalVolwassenen</td>
                        <td>$items->AantalKinderen</td>
                        <td>$items->AantalBabys</td>
                        <td>$items->IsVertegenwoordiger</td>
                        <td>
                            <a href='" . URLROOT . "/voedselpakketten/overzicht/$items->id'><img src='" . URLROOT . "/img/bxs-package.svg' alt='Box'></a></td>
                        </td>
                      </tr>";
        }

        $data = [
            'rows' => $rows
        ];
        $this->view('voedselpakketten/index', $data);
    }

    public function overzicht($id)
    {
        $records = $this->voedselpakketModel->getVoedselpakketById($id);
        
        var_dump($records);

        $rows = '';

        foreach ($records as $items)
        {
            $rows .= "<tr>
                        <td>$items->id</td>
                        <td>$items->PakketNummer</td>
                        <td>$items->DatumSamenstelling</td>
                        <td>$items->DatumUitgifte</td>
                        <td>$items->Status</td>
                        <td>$items->AantalProductEenheden</td>
                        <td>
                            <a href='" . URLROOT . "/voedselpakketten/wijzig/$items->id'><img src='" . URLROOT . "/img/b_edit.png' alt='edit'></a></td>
                        </td>
                      </tr>";
        }

        $data = [
            
            'naam' => $items->Naam,
            'omschrijving' => $items->Omschrijving,
            'aantalvolwassenen' => $items->TotaalAantalPersonen,
            'rows' => $rows
        ];
        $this->view('voedselpakketten/overzicht', $data);
    }

    public function wijzig($id)
    {
        $record = $this->voedselpakketModel->getVoedselpakketById($id);

        $data = [
            'title' => 'Wijzig voedselpakket',
        ];

        $this->view('voedselpakketten/wijzig', $data);
    }

    // public function update($id = null) 
    // {
    //     /**
    //      * Controleer of er gepost wordt vanuit de view update.php
    //      */
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         /**
    //          * Maak het $_POST array schoon
    //          */
    //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //         $this->voedselpakketModel->updateVoedselpakket($_POST);

    //         header("Location: " . URLROOT . "/voedselpakketten/index");
    //     }

    //     $record = $this->voedselpakketModel->getVoedselpakketById($id);

    //     $data = [
    //         'title' => 'Update voedselpakket',
    //         'id' => $record->id,
    //         'aantal' => $record->aantal
    //     ]; 
    //     $this->view('voedselpakketten/update', $data);
    // }

    // public function delete($id)
    // {
    //     $result = $this->voedselpakketModel->deleteVoedselpakket($id);
    //     if ($result) {
    //         echo "Het record is met success verwijderd";
    //         header("Refresh: 3; URL=" . URLROOT . "/voedselpakketten/index");
    //     } else {
    //         echo "Internal servererror, het record is niet verwijderd";
    //     }
    // }

    // public function create()
    // {
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         // $_POST array schoonmaken
    //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //         $result = $this->voedselpakketModel->createVoedselpakket($_POST);

    //         if ($result) {
    //             echo "Het invoeren is gelukt";
    //             header("Refresh:3; URL=" . URLROOT . "/voedselpakketten/index");
    //         } else {
    //             echo "Het invoeren is NIET gelukt";
    //             header("Refresh:3; URL=" . URLROOT . "/voedselpakketten/index");
    //         }
    //     }

    //     $data = [
    //         'title' => 'Voeg een nieuw voedselpakket toe'
    //     ];
    //     $this->view('voedselpakketten/create', $data);
    // }
}