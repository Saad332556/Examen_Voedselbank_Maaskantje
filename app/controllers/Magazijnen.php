<?php

class Magazijnen extends Controller
{
    //properties
    private $magazijnModel;

    // Dit is de constructor van de controller
    public function __construct() 
    {
        // We maken een object van de model class en stoppen dit in $magazijnModel
        $this->magazijnModel = $this->model('Magazijn');
    }

    public function index()
    {
        $magazijn = $this->magazijnModel->getMagazijnen();
        // var_dump($magazijn);

        $rows = '';

            foreach ($magazijn as $items)
            {
                $rows .= "<tr>
                            <td>$items->Barcode</td>
                            <td>$items->Naam</td>
                            <td>$items->Varpakkingseenheid</td>
                            <td>$items->AantalAanwezig</td>
                            <td>
                                <a href='" . URLROOT . "/overzichten/create/{$items->Id}'>
                                    <img src='" . URLROOT . "/img/delete.png' alt='table picture'>
                                </a>
                            </td>
                            <td>
                            <a href='" . URLROOT . "/overzichten/update/{$items->Id}'>
                                <img src='" . URLROOT . "/img/questionmark.png' alt='table picture'>
                            </a>
                            </td>
                          </tr>";
            }

        $data = [
            'title' => 'Overzicht Magazijn Jamin'
        ];
        $this->view('Magazijnen/index', $data);
    }
    
}
