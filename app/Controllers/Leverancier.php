<?php

class Leverancier extends BaseController
{
    private int $delay = 2;
    private string $infoMessage = '';

    private readonly mixed $LeverancierModel;

    public function __construct()
    {
        $this->LeverancierModel = $this->model('LeverancierModel');
    }

    public function index()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            $Leveranciers = $this->LeverancierModel->GetLeveranciers();

            $data = ['Leveranciers' => $Leveranciers];

            $this->view('Leverancier/index', $data);

        }
    }

}