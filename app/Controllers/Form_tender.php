<?php

namespace App\Controllers;

use App\Models\RoleModel;
use App\Models\UserModel;
use App\Models\RolesModel;

class Form_tender extends BaseController
{
    private $session;
    private $UserModel;

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
            'title' => 'Form Tender Page',
            'name' => $name,
            'division' => $division,
        ];

        return view('template/header', $data) . view('tiket/form_tender', $data) . view('template/footer');
    }
}
