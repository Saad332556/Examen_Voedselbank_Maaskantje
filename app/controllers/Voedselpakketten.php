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
        // Check post type als het POST is dan is er een formulier verstuurd (filteren)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Haal de filter optie uit de post data en selecteer nu de juiste records uit de database
            $records = $this->voedselpakketModel->getGefilterdePakketten($_POST['eetwens']);

            $rows = '';

            foreach ($records as $items) {
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


            // Check of de records array leeg is, zo ja dan is er geen resultaat gevonden en toon een melding
            if (empty($records)) {
                $data = [
                    // Bootstrap geel/primary alert with "Er zijn geen gezinnen bekent die de geselecteerde eetwens hebben"
                    'rows' => "<tr><td colspan='8'><div class='alert alert-warning' role='alert'>Er zijn geen gezinnen bekent die de geselecteerde eetwens hebben</div></td></tr>"
                ];
            }

            $this->view('voedselpakketten/index', $data);
        } else {
            $records = $this->voedselpakketModel->getVoedselpakketten();

            $rows = '';

            foreach ($records as $items) {
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
    }

    public function overzicht($id)
    {
        $records = $this->voedselpakketModel->getVoedselpakketById($id);

        $rows = '';

        foreach ($records as $items) {
            $rows .= "<tr>
                        <td>$items->Ideetje</td>
                        <td>$items->PakketNummer</td>
                        <td>$items->DatumSamenstelling</td>
                        <td>$items->DatumUitgifte</td>
                        <td>$items->Status</td>
                        <td>$items->AantalProductEenheden</td>
                        <td>
                            <a href='" . URLROOT . "/voedselpakketten/wijzig/$items->Ideetje'><img src='" . URLROOT . "/img/b_edit.png' alt='edit'></a>
                        </td>
                      </tr>";
        }

        // Als er geen records zijn gevonden dan is er geen voedselpakket gevonden dus toon mooie rode melding
        if (empty($records)) {
            $data = [
                'rows' => "<tr><td colspan='7'><div class='alert alert-danger' role='alert'>Er is geen voedselpakket gevonden</div></td></tr>"
            ];
        } else {
            $data = [
                'naam' => $items->Naam ?? 'N/A',
                'omschrijving' => $items->Omschrijving ?? 'N/A',
                'aantalvolwassenen' => $items->TotaalAantalPersonen ?? 'N/A',
                'rows' => $rows
            ];
        }

        $this->view('voedselpakketten/overzicht', $data);
    }

    public function wijzig($id)
    {
        $record = $this->voedselpakketModel->getVoedselpakketViaIdSimple($id);

        $data = [
            'id' => $record->id ?? 'N/A',
            'status' => $record->Status ?? 'N/A',
        ];

        if ($record === false) {
            // Show mooie rode melding dat er geen record is gevonden
            $data['alert'] = "<tr><td colspan='2'><div class='alert alert-danger' role='alert'>Dit gezin is niet meer ingeschreven bij de voedselbank en daarom kan er geen voedselpakket worden uitgereikt</div></td></tr>";
        }

        $this->view('voedselpakketten/wijzig', $data);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->voedselpakketModel->updateStatus($_POST['id'], $_POST['status']);

            if ($result) {
                // Haal nu de record met die id weer op
                $record = $this->voedselpakketModel->getVoedselpakketViaIdSimple($id);

                $data = [
                    'id' => $id,
                    'status' => $_POST['status'],
                    'baljeed' => "<tr><td colspan='2'><div class='alert alert-success' role='alert'>De status is met success gewijzigd</div></td></tr>"
                ];
                
            } else {
                $data['alert'] = "<tr><td colspan='2'><div class='alert alert-danger' role='alert'>Er is iets foutgegaan tijdens het opslaan van de data! OMFG</div></td></tr>";
            }

            $this->view('voedselpakketten/wijzig', $data);
        } else {
            echo "Er is iets fout gegaan, hoe ben je hier nou beland?";
        }
    }
}
