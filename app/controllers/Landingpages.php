<?php

class Landingpages extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home page'
        ];
        $this->view('landingpages/index', $data);
    }
}
