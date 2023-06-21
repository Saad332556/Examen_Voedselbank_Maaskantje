<?php

class Landingpages extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Homepage voedselbank Maaskantje'
        ];
        $this->view('landingpages/index', $data);
    }
}
