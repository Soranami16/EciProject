<?php

namespace App\Controllers;

use App\Models\TenderModel;
use App\Models\UserModel;
use App\Models\RoleModel;

class Home extends BaseController
{
    private $session;
    private $TenderModel;
    private $userModel;
    private $roleModel;

    public function __construct()
    {
        $this->TenderModel = new TenderModel();
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();
        $this->session = session();
    }

    public function index()
    {

        if (!$this->session->has('oid')) {
            return redirect()->to('/');
        }

        $name = $this->session->get('name');
        $role = $this->session->get('roleoid');
        $userId = $this->session->get('oid');

        if ($role == 1) {
            $tiketWaiting = $this->TenderModel->where('status', 1)->countAllResults();
            $tiketSolved = $this->TenderModel->where('status', 2)->countAllResults();
            $tiketDitolak = $this->TenderModel->where('status', 3)->where('approved1 IS NOT NULL', null, false)->countAllResults();

            $data = [
                'title' => 'Home Page',
                'tiketSolved' => $tiketSolved,
                'tiketWaiting' => $tiketWaiting,
                'tiketDitolak' => $tiketDitolak,
                'name' => $name,
                'role' => $role
            ];

            return view('home/index', $data);
        } elseif ($role == 22) {
            $tiketWaiting = $this->TenderModel->where('status', 0)->countAllResults();
            $tiketSolved = $this->TenderModel->where('status', 2)->countAllResults();
            $tiketDitolak = $this->TenderModel->where('status', 3)->where('approved2 IS NOT NULL', null, false)->countAllResults();

            $data = [
                'title' => 'Home Page',
                'tiketSolved' => $tiketSolved,
                'tiketWaiting' => $tiketWaiting,
                'tiketDitolak' => $tiketDitolak,
                'name' => $name,
                'role' => $role
            ];

            return view('home/index', $data);
        } else {
            $tiketWaiting = $this->TenderModel->where('user_id', $userId)->whereIn('status', [0, 1])->countAllResults();
            $tiketSolved = $this->TenderModel->where('user_id', $userId)->where('status', 2)->countAllResults();
            $tiketDitolak = $this->TenderModel->where('user_id', $userId)->where('status', 3)->countAllResults();

            $data = [
                'title' => 'Home Page',
                'tiketSolved' => $tiketSolved,
                'tiketWaiting' => $tiketWaiting,
                'tiketDitolak' => $tiketDitolak,
                'name' => $name,
                'role' => $role
            ];

            return view('home/index', $data);
        }
    }


    public function lonceng()
    {
        $role = $this->session->get('roleoid');
        $userId = $this->session->get('oid');

        if ($role == 1 || $role == 22) { //kan kalo role nya 1 & 22 dia bisa ngeliat semua tiket yg dibuat
            $jumlah = $this->TenderModel->countAllResults();
            $jumlahsubmit = $this->TenderModel->where('status', 0)->countAllResults();
            $jumlahapprove = $this->TenderModel->whereIn('status', [1, 2, 3])->countAllResults();
            $lastsubmit = $this->TenderModel->where('status', 0)->orderBy('id_tiket', 'desc')->first();
            $lastapprove = $this->TenderModel->whereIn('status', [1, 2, 3])->orderBy('id_tiket', 'desc')->first();

            $data = [
                'jumlah' => $jumlah,
                'jumlahsubmit' => $jumlahsubmit,
                'jumlahapprove' => $jumlahapprove,
                'lastsubmit' => $lastsubmit,
                'lastapprove' => $lastapprove
            ];
            echo json_encode($data);
        } else {

            $jumlah = $this->TenderModel->where('user_id', $userId)->countAllResults();
            $jumlahsubmit = $this->TenderModel->where('user_id', $userId)->where('status', 0)->countAllResults();
            $jumlahapprove = $this->TenderModel->where('user_id', $userId)->whereIn('status', [1, 2, 3])->countAllResults();
            $lastsubmit = $this->TenderModel->where('user_id', $userId)->where('status', 0)->orderBy('id_tiket', 'desc')->first();
            $lastapprove = $this->TenderModel->where('user_id', $userId)->whereIn('status', [1, 2, 3])->orderBy('id_tiket', 'desc')->first();


            $data = [
                'jumlah' => $jumlah,
                'jumlahsubmit' => $jumlahsubmit,
                'jumlahapprove' => $jumlahapprove,
                'lastsubmit' => $lastsubmit,
                'lastapprove' => $lastapprove
            ];

            echo json_encode($data);
        }
    }


    public function notifikasi()
    {

        if (!$this->session->has('oid')) {
            return redirect()->to('/');
        }
        $name = $this->session->get('name');
        $role = $this->session->get('roleoid');

        $data = [
            'title' => 'History Page',
            'name' => $name,
            'role' => $role
        ];
        return view('home/v_history', $data);
    }

    public function histori()
    {

        $name = $this->session->get('name');
        $role = $this->session->get('roleoid');
        $userId = $this->session->get('oid');

        if ($role == 1 || $role == 22) {
            $history = $this->TenderModel->getTiketWithUserAndRole();

            $data = [];
            $no = 1;
            foreach ($history as $item) {
                $modifiedAt = $item["ModifiedAt"];
                $createdAt = $item["CreatedAt"];

                if ($modifiedAt == $createdAt) {
                    $status = "Disubmit";

                    $tanggal = date('d F Y', strtotime($item["CreatedAt"]));
                } else {
                    $status = "Diupdate";
                    $tanggal = date('d F Y', strtotime($item["ModifiedAt"]));
                }

                $data[] = [
                    'id' => $item["user_id"],
                    'no' => $no,
                    'nama' => $item["user_name"],
                    'divisi' => $item["role_name"],
                    'status' => $status,
                    'tanggal' => $tanggal

                ];
                $no++;
            }

            echo json_encode(['data' => $data]);
        } else {
            $history = $this->TenderModel->getTiketWithUserAndRole1($userId);
            $data = [];
            $no = 1;
            foreach ($history as $item) {
                $modifiedAt = date('d F Y', strtotime($item["ModifiedAt"]));
                $createdAt = date('d F Y', strtotime($item["CreatedAt"]));

                if ($modifiedAt == $createdAt) {
                    $status = "Disubmit";
                } else {
                    $status = "Diupdate";
                }

                $data[] = [
                    'id' => $item["user_id"],
                    'no' => $no,
                    'nama' => $item["user_name"],
                    'divisi' => $item["role_name"],
                    'status' => $status,
                ];
                $no++;
            }
            echo json_encode(['data' => $data]);
        }
    }
};
