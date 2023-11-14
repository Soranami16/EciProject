<?php

namespace App\Controllers;

use App\Models\TiketModel;

class Home extends BaseController
{
    private $session;
    private $tiketModel;
    public function __construct()
    {
        $this->tiketModel = new TiketModel();
        $this->session = session();
    }
    public function index()
    {
        $tiketWaiting = $this->tiketModel->whereIn('status', [0, 1, 2])->countAllResults();
        $tiketSolved = $this->tiketModel->where('status', 3)->countAllResults();
        $name = $this->session->get('name');

        $data = [
            'title' => 'Home Page',
            'tiketSolved' => $tiketSolved,
            'tiketWaiting' => $tiketWaiting,
            'name' => $name
        ];

        return view('template/header', $data) . view('home/index') . view('template/footer');
    }
}
