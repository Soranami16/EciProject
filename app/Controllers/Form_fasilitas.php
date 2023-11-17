<?php

namespace App\Controllers;

use App\Models\RoleModel;
use App\Models\TenderModel;
use App\Models\UserModel;

class Form_fasilitas extends BaseController
{
    private $session;
    private $TenderModel;
    private $input;
    public function __construct()
    {
        $this->session = session();
        $this->TenderModel = new TenderModel();
    }
    public function index()
    {
        $name = $this->session->get('name');

        if (!$this->session->has('login_date')) {
            $this->session->set('login_date', date('Y-m-d'));
        }

        $userModel = new UserModel();
        $user = $userModel->where('Name', $name)->first(); // Mendapatkan informasi pengguna

        $roleModel = new RoleModel();
        $division = $roleModel->find($user['RoleOID']); // Mendapatkan informasi divisi berdasarkan RoleOID

        $data = [
            'title' => 'Form Fasilitas IT',
            'name' => $name,
            'user' => $user,
            'division' => $division,
        ];
        // echo view('template/header', $header);
        return view('tiket/form_fasilitas_it', $data);
        // echo view('template/footer');
    }
}
