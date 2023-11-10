<?php

namespace App\Controllers;

use App\Models\RoleModel;
use App\Models\UserModel;
use App\Models\TiketModel;

class Form_tender extends BaseController
{
    private $session;
    private $tiketModel;
    private $input;

    public function __construct()
    {
        $this->session = session();
        $this->tiketModel = new TiketModel();
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
            'user' => $user,
            'division' => $division,
        ];

        return view('template/header', $data) . view('tiket/form_tender', $data) . view('template/footer');
    }

    // public function createTiket()
    // {
    //     $tiketModel = new TiketModel();

    //     $data = array(
    //         'tgl_pengajuan' => $this->request->getPost('tgl_pengajuan'),
    //         'user_id' => $this->request->getPost('user_id'),
    //         'role_id' => $this->request->getPost('role_id'),
    //         'tgl_diperlukan' => $this->request->getPost('tgl_diperlukan'),
    //         'tender_type' => $this->request->getPost('tender_type') == 'TenderLama' ? 1 : 0,
    //         'kode_tender' => $this->request->getPost('kode_tender'),
    //         'deskripsi_tender' => $this->request->getPost('deskripsi_tender'),
    //         'edc_baru' => $this->request->getPost('edc_baru') == 'Tidak' ? 1 : 0,
    //         'ket_edc_baru' => $this->request->getPost('ket_edc_baru'),
    //         'GL_mapping_tender' => $this->request->getPost('GL_mapping_tender'),
    //         'karakteristik_tender' => $this->request->getPost('karakteristik_tender') == 'Permanen' ? 1 : 0,
    //         'tgl_aktif' => $this->request->getPost('tgl_aktif'),
    //         'periode_aktif' => $this->request->getPost('periode_aktif'),
    //         // 'status' => $this->request->getPost('status'),
    //     );


    //     $tiketModel->insert($data);
    //     $res = array(
    //         "tiketModel" => $tiketModel
    //     );
    //     return json_encode($res);
    // }

    public function submitForm()
    {
        $data = $this->request->getPost();

        $insertData = [
            'tgl_pengajuan' => isset($data['tgl_pengajuan']) ? $data['tgl_pengajuan'] : null,
            'user_id' => $data['user_id'],
            'role_id' => $data['role_id'],
            'tgl_diperlukan' => isset($data['tgl_diperlukan']) ? $data['tgl_diperlukan'] : null,
            'tender_type' => $data['tender_type'],
            'kode_tender' => $data['kode_tender'],
            'deskripsi_tender' => $data['deskripsi_tender'],
            'edc_baru' => $data['edc_baru'],
            'ket_edc_baru' => $data['ket_edc_baru'],
            'GL_mapping_tender' => $data['GL_mapping_tender'],
            'karakteristik_tender' => $data['karakteristik_tender'],
            'tgl_aktif' => isset($data['tgl_aktif']) ? $data['tgl_aktif'] : null,
            'periode_aktif' => $data['periode_aktif'],
        ];

        if ($data['tender_type'] == 0) { // if tender type is 0 (Baru)
            $insertData['kode_tender'] = null;

            if (isset($data['edc_baru']) && $data['edc_baru'] == 0) { // if edc is 0 (Ya)
                $insertData['ket_edc_baru'] = isset($data['ket_edc_baru']) ? $data['ket_edc_baru'] : null;
            }

            $insertData['GL_mapping_tender'] = $data['GL_mapping_tender'];

            if (isset($data['karakteristik_tender']) && $data['karakteristik_tender'] == 0) {
                $insertData['tgl_aktif'] = isset($data['tgl_aktif']) ? $data['tgl_aktif'] : null;
                $insertData['periode_aktif'] = isset($data['periode_aktif']) ? $data['periode_aktif'] : null;
            }
        } elseif ($data['tender_type'] == 1) {
            $insertData['kode_tender'] = $data['kode_tender'];

            if (isset($data['karakteristik_tender']) && $data['karakteristik_tender'] == 0) {
                $insertData['tgl_aktif'] = isset($data['tgl_aktif']) ? $data['tgl_aktif'] : null;
                $insertData['periode_aktif'] = isset($data['periode_aktif']) ? $data['periode_aktif'] : null;
            }
        }

        // Save data to the database
        $tiketTenderModel = new TiketModel();
        $result = $tiketTenderModel->insert($insertData);

        return $this->response->setJSON($result);
    }



    // public function submitForm()
    // {
    //     $data = $this->request->getPost();

    //     $data = [
    //         'tgl_pengajuan' => $this->request->getPost('tgl_pengajuan'),
    //         'user_id' => $this->request->getPost('user_id'),
    //         'role_id' => $this->request->getPost('role_id'),
    //         'tgl_diperlukan' => $this->request->getPost('tgl_diperlukan'),
    //     ];

    //     if ($data['tender_type'] == 0) {
    //         // If Tender Type Baru
    //         $data['kode_tender'] = null;
    //         $data['deskripsi_tender'];
    //         $data['edc_baru'] = isset($data['edc_baru']) ? $data['edc_baru'] : null;
    //         $data['ket_edc_baru'] = ($data['edc_baru'] == 0) ? $data['ket_edc_baru'] : null;
    //         $data['GL_mappting_tender'];
    //         $data['karakteristk_tender'] = isset($data['karakteristk_tender']) ? $data['karakteristk_tender'] : null;
    //         $data['tgl_aktif'] = ($data['karakteristik_tender'] == 0) ? $data['tgl_aktif'] : null;
    //         $data['periode_aktif'] = ($data['karakteristik_tender'] == 0) ? $data['periode_aktif'] : null;
    //     } elseif ($data['tender_type'] == 1) {

    //         $data['kode_tender'];
    //         $data['deskripsi_tender'];
    //         $data['edc_baru'] = null;
    //         $data['ket_edc_baru'] = null;
    //         $data['GL_mappting_tender'] = null;
    //         $data['karakteristk_tender'] = isset($data['karakteristk_tender']) ? $data['karakteristk_tender'] : null;
    //         $data['tgl_aktif'] = ($data['karakteristik_tender'] == 0) ? $data['tgl_aktif'] : null;
    //         $data['periode_aktif'] = ($data['karakteristik_tender'] == 0) ? $data['periode_aktif'] : null;
    //     } else {
    //         // Handle other cases if needed
    //     }

    //     if ($this->tiketModel->insert($data)) {
    //         $response = ['success' => true, 'message' => 'Form saved successfully'];
    //     } else {
    //         $response = ['success' => false, 'message' => 'Error saving form'];
    //     }

    //     return $this->response->setJSON($response);
    // }
}
