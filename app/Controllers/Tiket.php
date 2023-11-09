<?php

namespace App\Controllers;

use App\Models\TiketModel;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class Tiket extends BaseController
{
    use ResponseTrait;
    private $session;
    private $tiketModel;

    public function __construct()
    {
        $this->session = session();
        $this->tiketModel = new TiketModel();
    }
    public function index()
    {
        $tiketModel = new TiketModel();
        $name = $this->session->get('name');

        $data = [
            'title' => 'List Tiket Page',
            'name' => $name,
            'tiket' => $tiketModel->getTiketWithUserAndRole()
        ];

        return view('template/header', $data) . view('tiket/list_tiket', $data) . view('template/footer');
    }

    public function detail_tiket($id_tiket)
    {
        $name = $this->session->get('name');
        $tiket = $this->tiketModel->get_id_tiket($id_tiket);

        $atasan = '';
        $finance = '';
        $it_support = '';

        if ($tiket->status == 0) {
            $atasan = 'Belum diapprove';
            $finance = 'Belum diapprove';
            $it_support = 'Belum diapprove';
        } elseif ($tiket->status == 1) {
            $atasan = 'Approved ';
            $finance = 'Belum diapprove';
            $it_support = 'Belum diapprove';
        } elseif ($tiket->status == 2) {
            $atasan = 'Approved ';
            $finance = 'Approved  ';
            $it_support = 'Belum diapprove';
        } elseif ($tiket->status == 3) {
            $atasan = 'Approved';
            $finance = 'Approved';
            $it_support = 'Approved';
        }

        $data = [
            'title' => 'Detail Tiket Page',
            'name'  =>  $name,
            'tiket' => $tiket,
            'atasan' => $atasan,
            'finance' => $finance,
            'it_support' => $it_support
        ];

        return view('template/header', $data) . view('tiket/detail_tiket', $data) . view('template/footer');
    }


    public function createTiket()
    {
        $tiketModel = new TiketModel();

        $data = array(
            'tgl_pengajuan' => $this->request->getPost('tgl_pengajuan'),
            'user_id' => $this->request->getPost('user_id'),
            'role_id' => $this->request->getPost('role_id'),
            'tgl_diperlukan' => $this->request->getPost('tgl_diperlukan'),
            'tender_type' => $this->request->getPost('tender_type') == 'Tender lama' ? 1 : 0,
            'kode_tender' => $this->request->getPost('kode_tender'),
            'deskripsi_tender' => $this->request->getPost('deskripsi_tender'),
            'edc_baru' => $this->request->getPost('edc_baru'),
            'ket_edc_baru' => $this->request->getPost('ket_edc_baru'),
            'GL_mapping_tender' => $this->request->getPost('GL_mapping_tender'),
            'karakteristik_tender' => $this->request->getPost('karakteristik_tender') == 'Permanen' ? 1 : 0,
            'tgl_aktif' => $this->request->getPost('tgl_aktif'),
            'periode_aktif' => $this->request->getPost('periode_aktif'),
            'status' => $this->request->getPost('status'),
        );


        $tiketModel->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];

        return $this->respondCreated($data, 201);
    }

    // public function edit($id)
    // {
    //     $tiketModel = new TiketModel();
    //     $data['tiket'] = $tiketModel->find($id);

    //     return view('tiket/edit', $data);
    // }

    // public function update($id)
    // {
    //     $tiketModel = new TiketModel();

    //     $data = [
    //         'tgl_pengajuan' => $this->request->getPost('tgl_pengajuan'),
    //         'nama' => $this->request->getPost('nama'),
    //         'divisi' => $this->request->getPost('divisi'),
    //         'status' => $this->request->getPost('status'),
    //     ];

    //     $tiketModel->update($id, $data);

    //     return redirect()->to('/tiket');
    // }

    // public function delete($id)
    // {
    //     $tiketModel = new TiketModel();
    //     $tiketModel->delete($id);

    //     return redirect()->to('/tiket');
    // }
}
