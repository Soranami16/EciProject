<?php

namespace App\Controllers;

use App\Models\RoleModel;
use App\Models\UserModel;
use App\Models\TenderModel;
use CodeIgniter\API\ResponseTrait;

class Form_tender extends BaseController
{
    use ResponseTrait;
    private $session;
    private $TenderModel;
    private $userModel;

    public function __construct()
    {
        $this->session = session();
        $this->TenderModel = new TenderModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {

        $name = $this->session->get('name');

        $userLoginDate = date('m/d/Y');

        $user = $this->userModel->where('Name', $name)->first();

        $roleModel = new RoleModel();
        $division = $roleModel->find($user['RoleOID']);

        $data = [
            'title' => 'Form Tender',
            'userLoginDate' => $userLoginDate,
            'name' => $name,
            'user' => $user,
            'division' => $division,
        ];

        return view('tiket/tiketTender/v_FormTender', $data);
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
            'createdAt'    => date('Y-m-d H:i:s'),
            'modifiedAt'    => date('Y-m-d H:i:s')
        ];

        $result = $this->TenderModel->insert($insertData);
        // } else {
        //     $result = $validasi->listErrors();
        // }

        $response = [
            'success' => $result,
            'message' => ($result) ? 'Form submitted successfully' : 'Error submitting form',
        ];

        return $this->respondCreated($response);
    }

    public function editformtender($id)
    {
        $name = $this->session->get('name');
        $tiket = $this->TenderModel->get_id_tiket($id);
        $user = $this->userModel->where('Name', $name)->first();
        $roleModel = new RoleModel();
        $division = $roleModel->find($user['RoleOID']);

        $data = [
            'title' => 'Edit Form Tender',
            'name' => $name,
            'user' => $user,
            'division' => $division,
            'tiket' => $tiket,
            'tender' => $this->TenderModel->findByID($id),

        ];

        // return view('tiket/tiketTender/v_FormTenderEdit', $data);
        return view('tiket/modals/v_EditFormTender', $data);
        // echo json_encode($data);
    }

    public function updateFormTender($id)
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

        $result = $this->TenderModel->update($id, $insertData);

        $response = [
            'success' => $result,
            'message' => ($result) ? 'Form submitted edit successfully' : 'Error submitting form',
        ];

        return $this->respond($response);
    }

    public function deletetiket($id)
    {
        $tiketModel = new TenderModel();
        $tiketModel->delete($id);

        $response = [
            'success' => $tiketModel,
            'message' => ($tiketModel) ? 'Delete successfully' : 'Error submitting form',
        ];

        return $this->respondDeleted($response);
    }
}
