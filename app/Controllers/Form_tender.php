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

        // if (!$this->session->has('login_date')) {
        //     $this->session->set('login_date', date('Y-m-d'));
        // }
        $userLoginDate = date('m/d/Y');

        $userModel = new UserModel();
        $user = $userModel->where('Name', $name)->first(); // Mendapatkan informasi pengguna

        $roleModel = new RoleModel();
        $division = $roleModel->find($user['RoleOID']); // Mendapatkan informasi divisi berdasarkan RoleOID

        $data = [
            'title' => 'Form Tender Page',
            'userLoginDate' => $userLoginDate,
            'name' => $name,
            'user' => $user,
            'division' => $division,
        ];

        return view('template/header', $data) . view('tiket/form_tender', $data) . view('template/footer');  //ini nyambunginnya
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



        $result = $this->tiketModel->insert($insertData);

        $response = [
            'success' => $result,
            'message' => ($result) ? 'Form submitted successfully' : 'Error submitting form',
        ];

        return $this->response->setJSON($response);
    }



    // public function submitForm()
    // {
    //     $data = $this->request->getPost();

    //     $insertData = [
    //         'tgl_pengajuan' => isset($data['tgl_pengajuan']) ? $data['tgl_pengajuan'] : null,
    //         'user_id' => $data['user_id'],
    //         'role_id' => $data['role_id'],
    //         'tgl_diperlukan' => isset($data['tgl_diperlukan']) ? $data['tgl_diperlukan'] : null,

    //         'tender_type' => $data['tender_type'],
    //         'kode_tender' => null,
    //         'deskripsi_tender' => null,
    //         'edc_baru' => isset($data['edc_baru']) ? $data['edc_baru'] : null,
    //         'ket_edc_baru' => null,
    //         'GL_mapping_tender' => null,
    //         'karakteristik_tender' => $data['karakteristik_tender'],
    //         'tgl_aktif' => null,
    //         'periode_aktif' => null,
    //     ];

    //     if ($data['tender_type'] == 0) { // if tender type is 0 (Baru)
    //         $insertData['deskripsi_tender'] = isset($data['deskripsi_tender']) ? $data['deskripsi_tender'] : null;

    //         if (isset($data['edc_baru']) && $data['edc_baru'] == 0) { // if edc is 0 (Ya)
    //             $insertData['ket_edc_baru'] = isset($data['ket_edc_baru']) ? $data['ket_edc_baru'] : null;
    //         }

    //         $insertData['GL_mapping_tender'] = $data['GL_mapping_tender'];

    //         if (isset($data['karakteristik_tender']) && $data['karakteristik_tender'] == 0) {
    //             $insertData['tgl_aktif'] = isset($data['tgl_aktif']) ? $data['tgl_aktif'] : null;
    //             $insertData['periode_aktif'] = isset($data['periode_aktif']) ? $data['periode_aktif'] : null;
    //         }
    //     } elseif ($data['tender_type'] == 1) {
    //         $insertData['kode_tender'] = $data['kode_tender'];
    //     }

    //     // Save data to the database
    //     $tiketTenderModel = new TiketModel();
    //     $result = $tiketTenderModel->insert($insertData);

    //     return $this->response->setJSON($result);
    // }




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
