<?php

namespace App\Controllers;

use App\Models\RoleModel;
use App\Models\UserModel;
use App\Models\TenderModel;

class Form_tender extends BaseController
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

        $userLoginDate = date('m/d/Y');

        $userModel = new UserModel();
        $user = $userModel->where('Name', $name)->first();

        $roleModel = new RoleModel();
        $division = $roleModel->find($user['RoleOID']);

        $data = [
            'title' => 'Form Tender Page',
            'userLoginDate' => $userLoginDate,
            'name' => $name,
            'user' => $user,
            'division' => $division,
        ];

        return view('tiket/form_tender', $data);
    }

    public function submitForm()
    {
        $data = $this->request->getPost();
        // var_dump($data);
        // die;

        if ($data['tender_type'] == 0) {
            $deskripsi = $data['deskripsi_tender_baru'];
            $karakteristik = $data['karakteristik_tender_baru'];
        } else {
            $deskripsi = $data['deskripsi_tender_lama'];
            $karakteristik = $data['karakteristik_tender_lama'];
        }

        if ($data['tender_type'] == 0 && $data['karakteristik_tender_baru'] == 0) {
            $tgl_aktif = $data['tgl_aktif_baru'];
            $periode_aktif = $data['periode_aktif_baru'];
        } else if ($data['tender_type'] == 1 && $data['karakteristik_tender_lama'] == 0) {
            $tgl_aktif = $data['tgl_aktif_lama'];
            $periode_aktif = $data['periode_aktif_lama'];
        } else {
            $tgl_aktif = null;
            $periode_aktif = null;
        }

        $insertData = [
            'tanggal' => $data['tgl_pengajuan'],
            'user_id' => $data['user_id'],
            'role_id' => $data['role_id'],
            'tgl_diperlukan' => $data['tgl_diperlukan'],
            'status' => 0,
            'tender_type' => $data['tender_type'],
            'deskripsi_tender' => $deskripsi,
            'karakteristik_tender' => $karakteristik,
            'tgl_aktif' =>  $tgl_aktif,
            'periode_aktif' =>  $periode_aktif,
            'edc_baru' => ($data['tender_type'] == 0) ? $data['edc_baru'] : null,
            'ket_edc_baru' => ($data['tender_type'] == 0 && $data['edc_baru'] == 0) ? $data['ket_edc_baru'] : null,
            'GL_mapping_tender' => ($data['tender_type'] == 0) ? $data['GL_mapping_tender'] : null,
            'kode_tender' => ($data['tender_type'] == 1) ? $data['kode_tender'] : null,
        ];

        $result = $this->TenderModel->insert($insertData);

        $response = [
            'success' => $result,
            'message' => ($result) ? 'Form submitted successfully' : 'Error submitting form',
        ];

        return $this->response->setJSON($response);
    }

    public function editformtender($id)
    {
        $name = $this->session->get('name');
        $userLoginDate = date('m/d/Y');

        $userModel = new UserModel();
        $user = $userModel->where('Name', $name)->first();

        $roleModel = new RoleModel();
        $division = $roleModel->find($user['RoleOID']);
        $data = [
            'title' => 'Form Tender Page',
            'userLoginDate' => $userLoginDate,
            'name' => $name,
            'user' => $user,
            'division' => $division,
            'tender' => $this->TenderModel->findByID($id)
        ];
        return view('template/header', $data) . view('tiket/edit_tiket', $data) . view('template/footer');
    }

    public function updateFormTender($id)
    {
        $tiketModel = new TenderModel();

        $data = $this->request->getPost();
        // var_dump($data);
        // die;

        if ($data['tender_type'] == 0) {
            $deskripsi = $data['deskripsi_tender_baru'];
            $karakteristik = $data['karakteristik_tender_baru'];
        } else {
            $deskripsi = $data['deskripsi_tender_lama'];
            $karakteristik = $data['karakteristik_tender_lama'];
        }

        if ($data['tender_type'] == 0 && $data['karakteristik_tender_baru'] == 0) {
            $tgl_aktif = $data['tgl_aktif_baru'];
            $periode_aktif = $data['periode_aktif_baru'];
        } else if ($data['tender_type'] == 1 && $data['karakteristik_tender_lama'] == 0) {
            $tgl_aktif = $data['tgl_aktif_lama'];
            $periode_aktif = $data['periode_aktif_lama'];
        } else {
            $tgl_aktif = null;
            $periode_aktif = null;
        }

        $insertData = [
            'tanggal' => $data['tgl_pengajuan'],
            'user_id' => $data['user_id'],
            'role_id' => $data['role_id'],
            'tgl_diperlukan' => $data['tgl_diperlukan'],
            'status' => 0,
            'tender_type' => $data['tender_type'],
            'deskripsi_tender' => $deskripsi,
            'karakteristik_tender' => $karakteristik,
            'tgl_aktif' =>  $tgl_aktif,
            'periode_aktif' =>  $periode_aktif,
            'edc_baru' => ($data['tender_type'] == 0) ? $data['edc_baru'] : null,
            'ket_edc_baru' => ($data['tender_type'] == 0 && $data['edc_baru'] == 0) ? $data['ket_edc_baru'] : null,
            'GL_mapping_tender' => ($data['tender_type'] == 0) ? $data['GL_mapping_tender'] : null,
            'kode_tender' => ($data['tender_type'] == 1) ? $data['kode_tender'] : null,
        ];

        $result = $this->TenderModel->update($id, $insertData);

        $response = [
            'success' => $result,
            'message' => ($result) ? 'Form submitted editsuccessfully' : 'Error submitting form',
        ];

        return $this->response->setJSON($response);
    }
}
