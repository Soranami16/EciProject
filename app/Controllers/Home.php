<?php

namespace App\Controllers;

use App\Models\TenderModel;

class Home extends BaseController
{
    private $session;
    private $TenderModel;
    public function __construct()
    {
        $this->TenderModel = new TenderModel();
        $this->session = session();
    }
    public function index()
    {
        $tiketWaiting = $this->TenderModel->whereIn('status', [0, 1, 2])->countAllResults();
        $tiketSolved = $this->TenderModel->where('status', 3)->countAllResults();
        $name = $this->session->get('name');

        $data = [
            'title' => 'Home Page',
            'tiketSolved' => $tiketSolved,
            'tiketWaiting' => $tiketWaiting,
            'name' => $name
        ];

        return view('home/index', $data);
    }
}
