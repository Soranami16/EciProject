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
        $tiketWaiting = $this->TenderModel->whereIn('status', [0, 1, 2])->countAllResults();
        $tiketSolved = $this->TenderModel->where('status', 3)->countAllResults();
        $name = $this->session->get('name');

        $data = [
            'title' => 'Home Page',
            'tiketSolved' => $tiketSolved,
            'tiketWaiting' => $tiketWaiting,
            'name' => $name
        ];

        return view('home/index', $data);
    }

    public function notifikasi()
    {
        $name = $this->session->get('name');
        $data = [
            'title' => 'History Page',
            'name' => $name
        ];
        return view('home/v_history', $data);
    }

    public function histori()
    {

        $name = $this->session->get('name');
        $role = $this->session->get('roleoid');
        $userId = $this->session->get('oid');
        if ($role == 1) {
            $history = $this->TenderModel->getTiketWithUserAndRole();

            $data = [];
            $no = 1;
            foreach ($history as $item) {
                $modifiedAt = $item["ModifiedAt"];
                if ($modifiedAt == null) {
                    $status = "Disubmit";
                    $tgl = $item["CreatedAt"];
                } else {
                    $status = "Diupdate";
                    $tgl = $item["ModifiedAt"];
                }

                $data[] = [
                    'id' => $item["user_id"],
                    'no' => $no,
                    'nama' => $item["user_name"],
                    'divisi' => $item["role_name"],
                    'status' => $status,
                    'tgl' => $tgl,
                ];
                $no++;
            }

            echo json_encode(['data' => $data]);
        } else {
            $history = $this->TenderModel->getTiketWithUserAndRole1($userId);
            $data = [];
            $no = 1;
            foreach ($history as $item) {
                $modifiedAt = $item["ModifiedAt"];
                if ($modifiedAt == null) {
                    $status = "Disubmit";
                    $tgl = $item["CreatedAt"];
                } else {
                    $status = "Diupdate";
                    $tgl = $item["ModifiedAt"];
                }

                $data[] = [
                    'id' => $item["user_id"],
                    'no' => $no,
                    'nama' => $item["user_name"],
                    'divisi' => $item["role_name"],
                    'status' => $status,
                    'tgl' => $tgl,
                ];
                $no++;
            }
            echo json_encode(['data' => $data]);
        }
    }
};
