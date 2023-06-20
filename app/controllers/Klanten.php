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
            var_dump($POST);
            
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
            $this->klantModel->verwijderKlant($id);
            header("Refresh: 3; URL=" . URLROOT . "/klanten/index");
        } else {
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
            $data = [
                'naam' => $POST['naam'],
                'adres' => $POST['adres'],
                'emailadres' => $POST['emailadres'],
                'telefoonnummer' => $POST['telefoonnummer'],
                'AantalKinderen' => $POST['AantalKinderen'],
                'AantalVolwassenen' => $POST['AantalVolwassenen'],
                'AantalBaby' => $POST['AantalBaby']
            ];
            $this->klantModel->createKlant($data);
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