<?php

namespace App\Controllers;

class Home extends BaseController
{
    private $session;
    public function __construct()
    {

        $this->session = session();
    }
    public function index()
    {

        $name = $this->session->get('name');

        $data = [
            'title' => 'Home Page',
            'name' => $name
        ];

        return view('template/header', $data) . view('home/index') . view('template/footer');
    }
}
