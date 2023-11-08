<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RolesModel;

class Form_tender extends BaseController
{
    private $session;

    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        $userModel = new UserModel();
        $name = $this->session->get('name');

        if (!$this->session->has('login_date')) {
            $this->session->set('login_date', date('Y-m-d'));
        }

        $roleOID = $userModel->where('Name', $name)->get()->getRow('RoleOID');

        $divisi = '';
        if ($roleOID) {
            $rolesModel = new RolesModel();
            $divisi = $rolesModel->where('OID', $roleOID)->get()->getRow('Name');
        }

        $data = [
            'title' => 'Form Tender Page',
            'name' => $name,
            'divisi' => $divisi
        ];

        return view('template/header', $data) . view('tiket/form_tender', $data) . view('template/footer');
    }
}
