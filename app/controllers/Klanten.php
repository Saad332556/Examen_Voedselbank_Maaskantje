<?php

class Klanten extends Controller
{

    public function __construct()
    {
        $this->klantModel = $this->model('KlantModel');
    }

    public function index()
    {
        $klanten = $this->klantModel->getKlanten();
        // var_dump($klanten);
        // exit();
        $rows = '';
        foreach ($klanten as $items) {
            $rows .= "<tr>
                        <td>$items->id</td>
                        <td>$items->naam</td>
                        <td>$items->adres</td>
                        <td>$items->emailadres</td>
                        <td>$items->telefoonnummer</td>
                        <td>$items->AantalKinderen</td>
                        <td>$items->AantalVolwassenen</td>
                        <td>$items->AantalBaby</td>
                        <td>
                            <a href='" . URLROOT . "/Klanten/wijzig/$items->id'><img src='" . URLROOT . "/img/b_edit.png' alt='Edit'></a></td>
                        </td>
                        <td>
                            <a href='" . URLROOT . "/Klanten/verwijder/$items->id'><img src='" . URLROOT . "/img/b_drop.png' alt='Remove'></a></td>
                        </td>

                      </tr>";
        }
        $data = [
            'klanten' => $klanten,
            'rows' => $rows
        ];
        $this->view('klanten/index', $data);
    }

    public function wijzig($id = null)
    {
        $klant = $this->klantModel->getKlantById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
            $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
           $update = $this->klantModel->wijzigKlant($POST);
            echo "<p>De klant is gewijzigd</p>";
           header("Refresh: 3; URL=" . URLROOT . "/klanten/index");
        }else{
     
      
        $data = [
            'id' => $klant->id,
            'naam' => $klant->naam,
            'adres' => $klant->adres,
            'emailadres' => $klant->emailadres,
            'telefoonnummer' => $klant->telefoonnummer,
            'AantalKinderen' => $klant->AantalKinderen,
            'AantalVolwassenen' => $klant->AantalVolwassenen,
            'AantalBaby' => $klant->AantalBaby
        ];
        $this->view('klanten/wijzig', $data);
    }

 }
    
    public function verwijder($id = null)
    {
        $klant = $this->klantModel->getKlantById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
            $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $delete = $this->klantModel->verwijderKlant($POST);
            echo "<p>De klant is verwijderd</p>";
            header("Refresh: 3; URL=" . URLROOT . "/klanten/index");
        }else{
        $data = [
            'id' => $klant->id,
            'naam' => $klant->naam,
            'adres' => $klant->adres,
            'emailadres' => $klant->emailadres,
            'telefoonnummer' => $klant->telefoonnummer,
            'AantalKinderen' => $klant->AantalKinderen,
            'AantalVolwassenen' => $klant->AantalVolwassenen,
            'AantalBaby' => $klant->AantalBaby
        ];
        $this->view('klanten/verwijder', $data);
    }
    }

    public function create()
    {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
                $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               
                $create = $this->klantModel->voegKlantToe($POST);
                echo "<p>De klant is toegevoegd</p>";
    
               header("Refresh: 3; URL=" . URLROOT . "/klanten/index");
    
        } else {
            $data = [
                'naam' => '',
                'adres' => '',
                'emailadres' => '',
                'telefoonnummer' => '',
                'AantalKinderen' => '',
                'AantalVolwassenen' => '',
                'AantalBaby' => ''
            ];
            $this->view('klanten/create', $data);
        }

    }
}