<?php

namespace App\Controllers;

use App\Models\TenderModel;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class List_Tiket extends BaseController
{
    use ResponseTrait;
    private $session;
    private $TenderModel;

    public function __construct()
    {
        $this->session = session();
        $this->TenderModel = new TenderModel();
    }

    public function index()
    {
        $name = $this->session->get('name');

        $data = [
            'title' => 'List Tiket Page',
            'name' => $name,
        ];

        return view('tiket/v_ListTiket', $data);
    }

    public function listtiket()
    {
        $history = $this->TenderModel->getTiketWithUserAndRole();
        $data = [];
        $no = 1;
        foreach ($history as $item) {
            $Status = $item["status"];
            if ($Status == 0) {
                $status = "Waiting..";
                $actionButtons =
                    '<button class="btn btn-info mr-2" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>' .
                    '<button class="btn btn-primary mr-2" onclick="editFunction(' . $item["id_tiket"] . ')"><i class="fa fa-edit"></i></button>' .
                    '<button class="btn btn-info" onclick="deleteTiket(' . $item["id_tiket"] . ')"><i class="fa fa-trash"></i></button>';
            } elseif ($Status == 1) {
                $status = "Approve Atasan ..";
                $actionButtons =
                    '<button class="btn btn-info mr-2" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>' .
                    '<button class="btn btn-primary" onclick="editFunction(' . $item["id_tiket"] . ')"><i class="fa fa-edit"></i></button>';
            } elseif ($Status == 2) {
                $status = "Approve Finance ..";
                $actionButtons =
                    '<button class="btn btn-info mr-2" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>' .
                    '<button class="btn btn-primary" onclick="editFunction(' . $item["id_tiket"] . ')"><i class="fa fa-edit"></i></button>';
            } else {
                $status = "Solved";
                $actionButtons =
                    '<button class="btn btn-info mr-2" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>' .
                    '<button class="btn btn-primary" onclick="editFunction(' . $item["id_tiket"] . ')"><i class="fa fa-edit"></i></button>';
            }

            $data[] = [
                'id' => $item["user_id"],
                'no' => $no,
                'tgl_pengajuan' => $item["tanggal"],
                'nama' => $item["user_name"],
                'divisi' => $item["role_name"],
                'tgl_diperlukan' => $item["tgl_diperlukan"],
                'status' => $status,
                'action' => $actionButtons
            ];
            $no++;
        }

        echo json_encode(['data' => $data]);
    }

    public function detail_tiket($id_tiket)
    {
        $name = $this->session->get('name');
        $tiket = $this->TenderModel->get_id_tiket($id_tiket);

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

        return view('tiket/v_DetailTiket', $data);
    }


    // public function edit($id)
    // {
    //     $TenderModel = new TenderModel();
    //     $data['tiket'] = $TenderModel->find($id);

    //     return view('tiket/edit', $data);
    // }

    // public function update($id)
    // {
    //     $TenderModel = new TenderModel();

    //     $data = [
    //         'tgl_pengajuan' => $this->request->getPost('tgl_pengajuan'),
    //         'nama' => $this->request->getPost('nama'),
    //         'divisi' => $this->request->getPost('divisi'),
    //         'status' => $this->request->getPost('status'),
    //     ];

    //     $TenderModel->update($id, $data);

    //     return redirect()->to('/tiket');
    // }


}
