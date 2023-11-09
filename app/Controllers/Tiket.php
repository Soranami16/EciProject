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
