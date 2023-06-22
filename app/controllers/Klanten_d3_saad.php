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
        // Check post type als het POST is dan is er een formulier verstuurd (filteren)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Haal de filter optie uit de post data en selecteer nu de juiste records uit de database
            $records = $this->klantModel->getGefilterdePostcodes($_POST['postcode']);
            // var_dump($records);

            $rows = '';

            foreach ($records as $items)
            {
                $rows .= "<tr>
                            <td>$items->Naam</td>
                            <td>$items->Vertegenwoordiger</td>
                            <td>$items->Email</td>
                            <td>$items->Mobiel</td>
                            <td>$items->Adres</td>
                            <td>$items->Woonplaats</td>
                            <td>
                                <a href='" . URLROOT . "/klanten_d3_saad/getbyid/$items->Id'><img src='../public/img/book.png' width='20' height='20'></a>
                            </td>
                        </tr>";
            }

            $data = [
                'rows' => $rows
            ];

             // Check of de records array leeg is, zo ja dan is er geen resultaat gevonden en toon een melding
             if (empty($records)) {
                $data = [
                    // Bootstrap geel/primary alert with "Er zijn geen klanten bekent die de geselecteerde postcode hebben"
                    'rows' => "<tr><td colspan='8'><div class='alert alert-warning' role='alert'>Er zijn geen klanten bekent die de geselecteerde postcode hebben</div></td></tr>"
                ];
            }

            $this->view('klanten_d3_saad/index', $data);

        } else {

            $records = $this->klantModel->getKlanten();
            // var_dump($records);

            $rows = '';

            foreach ($records as $items)
            {
                $rows .= "<tr>
                            <td>$items->Naam</td>
                            <td>$items->Vertegenwoordiger</td>
                            <td>$items->Email</td>
                            <td>$items->Mobiel</td>
                            <td>$items->Adres</td>
                            <td>$items->Woonplaats</td>
                            <td>
                                <a href='" . URLROOT . "/klanten_d3_saad/getbyid/$items->Id'><img src='../public/img/book.png' width='20' height='20'></a>
                            </td>
                        </tr>";
            }

            $data = [
                'rows' => $rows
            ];

            $this->view('klanten_d3_saad/index', $data);
        }
    }

    public function getbyid($id = null)
    {
        try {
            $record = $this->klantModel->getKlantenById($id);

            $data = [
                'title' => "Klant details ",
                'voornaam' =>  $record->Voornaam,
                'tussenvoegsel' =>  $record->Tussenvoegsel,
                'achternaam' =>  $record->Achternaam,
                'geboortedatum' =>  $record->Geboortedatum,
                'typepersoon' =>  $record->TypePersoon,
                'isvertegenwoordiger' =>  $record->Vertegenwoordiger,
                'straat' =>  $record->Straat,
                'huisnummer' =>  $record->Huisnummer,
                'toevoeging' =>  $record->Toevoeging,
                'postcode' =>  $record->Postcode,
                'woonplaats' =>  $record->Woonplaats,
                'email' =>  $record->Email,
                'mobiel' =>  $record->Mobiel,
                'id' =>  $record->Id
            ];
            $this->view('klanten_d3_saad/getbyid', $data);
        } catch(Exception $e) {
            echo "Er is een fout opgetreden: " . $e->getMessage();
            header("Refresh: 5; URL=" . URLROOT . "/klanten_d3_saad/index");
        }
    }

    public function update($id = null) 
    {
        try {
            /**
             * Controleer of er gepost wordt vanuit de view update.php
             */
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                /**
                 * Maak het $_POST array schoon
                 */
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $this->klantModel->updateKlanten($_POST);

                header("Location: " . URLROOT . "/klanten_d3_saad/index");
            }

            $record = $this->klantModel->getKlantenById($id);

            $data = [
                'title' => 'Klant Details ',
                'id' => $record->Id,
                'voornaam' => $record->Voornaam,
                'tussenvoegsel' => $record->Tussenvoegsel,
                'achternaam' => $record->Achternaam,
                'geboortedatum' => $record->Geboortedatum,
                'typepersoon' => $record->TypePersoon,
                'vertegenwoordiger' => $record->Vertegenwoordiger,
                'straatnaam' => $record->Straatnaam,
                'huisnummer' => $record->Huisnummer,
                'toevoeging' => $record->Toevoeging,
                'postcode' => $record->Postcode,
                'woonplaats' => $record->Woonplaats,
                'email' => $record->Email,
                'mobiel' => $record->Mobiel,
            ]; 
            $this->view('klanten_d3_saad/update', $data);
        } catch(Exception $e) {
            echo "Er is een fout opgetreden: " . $e->getMessage();
            header("Refresh: 5; URL=" . URLROOT . "/klanten_d3_saad/getbyid");
        }
    }
}