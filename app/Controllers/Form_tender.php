<?php

namespace App\Controllers;

use App\Models\RoleModel;
use App\Models\UserModel;
use App\Models\TiketModel;

class Form_tender extends BaseController
{
    private $session;
    private $UserModel;

    public function __construct()
    {

        $this->session = session();
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
            'title' => 'Form Tender Page',
            'name' => $name,
            'division' => $division,
        ];

        return view('template/header', $data) . view('tiket/form_tender', $data) . view('template/footer');
    }

    public function createTiket()
    {
        $tiketModel = new TiketModel();

        $data = array(
            'tgl_pengajuan' => $this->request->getPost('tgl_pengajuan'),
            'user_id' => $this->request->getPost('user_id'),
            'role_id' => $this->request->getPost('role_id'),
            'tgl_diperlukan' => $this->request->getPost('tgl_diperlukan'),
            'tender_type' => $this->request->getPost('tender_type') == 'TenderLama' ? 1 : 0,
            'kode_tender' => $this->request->getPost('kode_tender'),
            'deskripsi_tender' => $this->request->getPost('deskripsi_tender'),
            'edc_baru' => $this->request->getPost('edc_baru') == 'Tidak' ? 1 : 0,
            'ket_edc_baru' => $this->request->getPost('ket_edc_baru'),
            'GL_mapping_tender' => $this->request->getPost('GL_mapping_tender'),
            'karakteristik_tender' => $this->request->getPost('karakteristik_tender') == 'Permanen' ? 1 : 0,
            'tgl_aktif' => $this->request->getPost('tgl_aktif'),
            'periode_aktif' => $this->request->getPost('periode_aktif'),
            // 'status' => $this->request->getPost('status'),
        );


        $tiketModel->insert($data);
        $res = array(
            "tiketModel" => $tiketModel
        );
        return json_encode($res);
    }
}
