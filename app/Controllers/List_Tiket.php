<?php

namespace App\Controllers;

use App\Models\TenderModel;
use App\Models\StoreModel;
use App\Models\FasilitasModel;
use CodeIgniter\API\ResponseTrait;

class List_Tiket extends BaseController
{
    use ResponseTrait;
    private $storeModel;
    private $session;
    private $TenderModel;
    private $FasilitasModel;

    public function __construct()
    {
        $this->session = session();
        $this->TenderModel = new TenderModel();
        $this->FasilitasModel = new FasilitasModel();
        $this->storeModel = new StoreModel();
    }

    public function index()
    {

        if (!$this->session->has('oid')) {
            return redirect()->to('/');
        }
        $name = $this->session->get('name');
        $role = $this->session->get('roleoid');

        $data = [
            'title' => 'List Tiket Page',
            'name' => $name,
            'role' => $role
        ];

        return view('tiket/v_ListTiket', $data);
    }

    // public function listtiket()
    // {
    //     // $history = $this->TenderModel->getTiketWithUserAndRole();

    //     $role_id = $this->session->get('roleoid');
    //     // var_dump($role_id);
    //     $history = $this->TenderModel->getTiketWithUserAndRole();
    //     $data = [];
    //     $no = 1;
    //     foreach ($history as $item) {
    //         $Status = $item["status"];
    //         if ($Status == 0) {
    //             $status = "Waiting..";
    //             $actionButtons =
    //                 '<button class="btn mr-2"  style="background-color: #DFEDF1;" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>' .
    //                 '<button class="btn  mr-2"  style="background-color: #6E98B8;" onclick="editFunction(' . $item["id_tiket"] . ')"><i class="fa fa-edit"></i></button>' .
    //                 '<button class="btn"   style="background-color: #F4B24E;"onclick="deleteTiket(' . $item["id_tiket"] . ')"><i class="fa fa-trash"></i></button>';
    //         } elseif ($Status == 1) {
    //             $status = "Approve Atasan ..";
    //             $actionButtons =
    //                 '<button class="btn  mr-2" style="background-color: #DFEDF1;" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>' .
    //                 '<button class="btn " style="background-color: #6E98B8;"  onclick="editFunction(' . $item["id_tiket"] . ')"><i class="fa fa-edit"></i></button>';
    //         } elseif ($Status == 2) {
    //             $status = "Approve Finance ..";
    //             $actionButtons =
    //                 '<button class="btn mr-2" style="background-color: #DFEDF1;" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>' .
    //                 '<button class="btn " style="background-color: #6E98B8;"  onclick="editFunction(' . $item["id_tiket"] . ')"><i class="fa fa-edit"></i></button>';
    //         } elseif ($Status == 3) {
    //             $status = "Solved";
    //             $actionButtons =
    //                 '<button class="btn mr-2" style="background-color: #DFEDF1;" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>' .
    //                 '<button class="btn " style="background-color: #6E98B8;"  onclick="editFunction(' . $item["id_tiket"] . ')"><i class="fa fa-edit"></i></button>';
    //         }


    //             $data[] = [
    //                 'id' => $item["user_id"],
    //                 'roleid' => $role_id,
    //                 'no' => $no,
    //                 'tgl_pengajuan' => $item["tanggal"],
    //                 'nama' => $item["user_name"],
    //                 'divisi' => $item["role_name"],
    //                 'tgl_diperlukan' => $item["tgl_diperlukan"],
    //                 'status' => $status,
    //                 'action' => $actionButtons
    //             ];
    //             $no++;

    //     }

    //     echo json_encode(['data' => $data]);
    // }

    public function listtiket()
    {
        $history = $this->TenderModel->getTiketWithUserAndRole();
        $roleId = $this->session->get('roleoid');
        $data = [];
        $no = 1;
        $user = $this->session->get('oid');

        if ($roleId == 22) {
            foreach ($history as $item) {
                $Status = $item["status"];
                $userapprove1 = $item["approved1"];
                $userapprove2 = $item["approved2"];
                if ($Status == 0) {
                    $status = "Waiting..";
                    $actionButtons =
                        '<button class="btn mr-2" style="background-color: #DFEDF1;" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>' .
                        '<button class="btn  mr-2" style="background-color: #6E98B8;" onclick="editFunction(' . $item["id_tiket"] . ')"><i class="fa fa-edit"></i></button>' .
                        '<button class="btn" style="background-color: #F4B24E;" onclick="deleteTiket(' . $item["id_tiket"] . ')"><i class="fa fa-trash"></i></button>';

                    $data[] = [
                        'id' => $item["user_id"],
                        'roleid' => $roleId,
                        'no' => $no,
                        'tgl_pengajuan' => $item["tanggal"],
                        'nama' => $item["user_name"],
                        'divisi' => $item["role_name"],
                        'tgl_diperlukan' => $item["tgl_diperlukan"],
                        'status' => $status,
                        'action' => $actionButtons
                    ];
                    $no++;
                } elseif ($Status == 1) {
                    $status = "Approve  Finance..";
                    $actionButtons =
                        '<button class="btn  mr-2" style="background-color: #DFEDF1;" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>';
                    // '<button class="btn " style="background-color: #6E98B8;"  onclick="editFunction(' . $item["id_tiket"] . ')"><i class="fa fa-edit"></i></button>';
                    $data[] = [
                        'id' => $item["user_id"],
                        'roleid' => $roleId,
                        'no' => $no,
                        'tgl_pengajuan' => $item["tanggal"],
                        'nama' => $item["user_name"],
                        'divisi' => $item["role_name"],
                        'tgl_diperlukan' => $item["tgl_diperlukan"],
                        'status' => $status,
                        'action' => $actionButtons
                    ];
                    $no++;
                } elseif ($Status == 2) {
                    $status = "Solved";
                    $actionButtons =
                        '<button class="btn  mr-2" style="background-color: #DFEDF1;" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>';
                    // '<button class="btn " style="background-color: #6E98B8;"  onclick="editFunction(' . $item["id_tiket"] . ')"><i class="fa fa-edit"></i></button>';
                    $data[] = [
                        'id' => $item["user_id"],
                        'roleid' => $roleId,
                        'no' => $no,
                        'tgl_pengajuan' => $item["tanggal"],
                        'nama' => $item["user_name"],
                        'divisi' => $item["role_name"],
                        'tgl_diperlukan' => $item["tgl_diperlukan"],
                        'status' => $status,
                        'action' => $actionButtons
                    ];
                    $no++;
                } elseif ($Status == 3 && $userapprove1 && $userapprove2 == null) {
                    $status = "Ditolak Finance";
                    $actionButtons =
                        '<button class="btn  mr-2" style="background-color: #DFEDF1;" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>';
                    // '<button class="btn " style="background-color: #6E98B8;"  onclick="editFunction(' . $item["id_tiket"] . ')"><i class="fa fa-edit"></i></button>';

                    $data[] = [
                        'id' => $item["user_id"],
                        'roleid' => $roleId,
                        'no' => $no,
                        'tgl_pengajuan' => $item["tanggal"],
                        'nama' => $item["user_name"],
                        'divisi' => $item["role_name"],
                        'tgl_diperlukan' => $item["tgl_diperlukan"],
                        'status' => $status,
                        'action' => $actionButtons
                    ];
                    $no++;
                } elseif ($Status == 3 && $userapprove2) {
                    $status = "Ditolak IT Support";
                    $actionButtons =
                        '<button class="btn  mr-2" style="background-color: #DFEDF1;" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>';
                    // '<button class="btn " style="background-color: #6E98B8;"  onclick="editFunction(' . $item["id_tiket"] . ')"><i class="fa fa-edit"></i></button>';

                    $data[] = [
                        'id' => $item["user_id"],
                        'roleid' => $roleId,
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
            }
        } elseif ($roleId == 1) {
            foreach ($history as $item) {
                $Status = $item["status"];
                $userapprove1 = $item["approved1"];
                $userapprove2 = $item["approved2"];
                if ($Status == 0) {
                    $status = "Waiting..";
                    $actionButtons =
                        '<button class="btn mr-2" style="background-color: #DFEDF1;" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>' .
                        '<button class="btn  mr-2" style="background-color: #6E98B8;" onclick="editFunction(' . $item["id_tiket"] . ')"><i class="fa fa-edit"></i></button>' .
                        '<button class="btn" style="background-color: #F4B24E;" onclick="deleteTiket(' . $item["id_tiket"] . ')"><i class="fa fa-trash"></i></button>';

                    $data[] = [
                        'id' => $item["user_id"],
                        'roleid' => $roleId,
                        'no' => $no,
                        'tgl_pengajuan' => $item["tanggal"],
                        'nama' => $item["user_name"],
                        'divisi' => $item["role_name"],
                        'tgl_diperlukan' => $item["tgl_diperlukan"],
                        'status' => $status,
                        'action' => $actionButtons
                    ];
                    $no++;
                } elseif ($Status == 1) {
                    $status = "Approve  Finance..";
                    $actionButtons =
                        '<button class="btn  mr-2" style="background-color: #DFEDF1;" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>';
                    // '<button class="btn " style="background-color: #6E98B8;"  onclick="editFunction(' . $item["id_tiket"] . ')"><i class="fa fa-edit"></i></button>';
                    $data[] = [
                        'id' => $item["user_id"],
                        'roleid' => $roleId,
                        'no' => $no,
                        'tgl_pengajuan' => $item["tanggal"],
                        'nama' => $item["user_name"],
                        'divisi' => $item["role_name"],
                        'tgl_diperlukan' => $item["tgl_diperlukan"],
                        'status' => $status,
                        'action' => $actionButtons
                    ];
                    $no++;
                } elseif ($Status == 2) {
                    $status = "Solved";
                    $actionButtons =
                        '<button class="btn  mr-2" style="background-color: #DFEDF1;" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>';
                    // '<button class="btn " style="background-color: #6E98B8;"  onclick="editFunction(' . $item["id_tiket"] . ')"><i class="fa fa-edit"></i></button>';
                    $data[] = [
                        'id' => $item["user_id"],
                        'roleid' => $roleId,
                        'no' => $no,
                        'tgl_pengajuan' => $item["tanggal"],
                        'nama' => $item["user_name"],
                        'divisi' => $item["role_name"],
                        'tgl_diperlukan' => $item["tgl_diperlukan"],
                        'status' => $status,
                        'action' => $actionButtons
                    ];
                    $no++;
                } elseif ($Status == 3 && $userapprove2) {
                    $status = "Ditolak IT Support";
                    $actionButtons =
                        '<button class="btn  mr-2" style="background-color: #DFEDF1;" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>';
                    // '<button class="btn " style="background-color: #6E98B8;"  onclick="editFunction(' . $item["id_tiket"] . ')"><i class="fa fa-edit"></i></button>';

                    $data[] = [
                        'id' => $item["user_id"],
                        'roleid' => $roleId,
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
            }
        } else {
            $history = $this->TenderModel->getTiketWithUserAndRole1($user);
            $data = [];
            $no = 1;
            foreach ($history as $item) {
                $Status = $item["status"];
                if ($Status == 0) {
                    $status = "Waiting..";
                    $actionButtons =
                        '<button class="btn mr-2"  style="background-color: #DFEDF1;" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>' .
                        '<button class="btn  mr-2"  style="background-color: #6E98B8;" onclick="editFunction(' . $item["id_tiket"] . ')"><i class="fa fa-edit"></i></button>' .
                        '<button class="btn"   style="background-color: #F4B24E;"onclick="deleteTiket(' . $item["id_tiket"] . ')"><i class="fa fa-trash"></i></button>';
                } elseif ($Status == 1) {
                    $status = "Approve Finance ..";
                    $actionButtons =
                        '<button class="btn  mr-2" style="background-color: #DFEDF1;" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>' .
                        '<button class="btn " style="background-color: #6E98B8;"  onclick="editFunction(' . $item["id_tiket"] . ')"><i class="fa fa-edit"></i></button>';
                } elseif ($Status == 2) {
                    $status = "Solved..";
                    $actionButtons =
                        '<button class="btn  mr-2" style="background-color: #DFEDF1;" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>';
                } elseif ($Status == 3) {
                    $status = "Ditolak..";
                    $actionButtons =
                        '<button class="btn  mr-2" style="background-color: #DFEDF1;" onclick="detailTiket(' . $item["id_tiket"] . ')"><i class="fa fa-eye"></i></button>';
                }

                $data[] = [
                    'id' => $item["user_id"],
                    'Status' => $Status,
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
        }

        echo json_encode(['data' => $data]);
    }

    public function detail_tiket($id_tiket)
    {
        $name = $this->session->get('name');
        $role = $this->session->get('roleoid');
        $tiket = $this->TenderModel->get_id_tiket($id_tiket);
        $status = $this->TenderModel->get_approval_status($id_tiket);
        $userapprove1 = $this->TenderModel->get_userapprove1($id_tiket);
        $userapprove2 = $this->TenderModel->get_userapprove2($id_tiket);
        $data = [
            'title' => 'Detail Tiket Page',
            'role' => $role,
            'name'  => $name,
            'userapprove1' => $userapprove1,
            'userapprove2' => $userapprove2,
            'tiket' => $tiket,
            'status' => $status,
        ];
        echo json_encode($data);
    }

    public function processApproval($id_tiket)
    {
        $action = $this->request->getPost('action');
        $result = false;

        if ($action == 'approve') {
            $user_id = $this->session->get('oid');
            $name = $this->session->get('name');
            $role = $this->session->get('roleoid');

            if ($this->session->get('roleoid') == 22) {
                $result = $this->TenderModel->update($id_tiket, ['status' => 1, 'approved1' => $user_id]);
                $response = [
                    'success' => $result,
                    'message' => ($result) ? 'Approve successfully' : 'Error submitting form',
                    'name' => $name,
                    'role_id' => $role,
                ];
            } elseif ($this->session->get('roleoid') == 1) {
                $result = $this->TenderModel->update($id_tiket, ['status' => 2, 'approved2' => $user_id]);
                $response = [
                    'success' => $result,
                    'message' => ($result) ? 'Approve successfully' : 'Error submitting form',
                    'name' => $name,
                    'role_id' => $role,
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Invalid role',
                ];
            }
        } elseif ($action == 'reject') {
            $user_id = $this->session->get('oid');
            $name = $this->session->get('name');
            $role = $this->session->get('roleoid');
            $currentStatus = $this->TenderModel->find($id_tiket)['status'];

            if ($this->session->get('roleoid') == 22) {
                if ($currentStatus !== 3) {
                    $result = $this->TenderModel->update($id_tiket, ['status' => 3, 'approved1' => $user_id]);
                    $response = [
                        'success' => $result,
                        'message' => ($result) ? 'Reject successfully' : 'Error submitting form',
                        'name' => $name,
                        'role_id' => $role,
                    ];
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'Role with ID 1 has already rejected, cannot reject again.',
                    ];
                }
            } elseif ($this->session->get('roleoid') == 1) {
                if ($currentStatus !== 3) {
                    $result = $this->TenderModel->update($id_tiket, ['status' => 3, 'approved2' => $user_id]);
                    $response = [
                        'success' => $result,
                        'message' => ($result) ? 'Reject successfully' : 'Error submitting form',
                        'name' => $name,
                        'role_id' => $role,
                    ];
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'Role with ID 22 has already rejected, cannot reject again.',
                    ];
                }
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Invalid role',
                ];
            }
        } else {
            $response = [
                'success' => false,
                'message' => 'Invalid action',
            ];
        }

        return $this->response->setJSON($response);
    }

    public function listtiketFasilitas()
    {
        $fasilitas = $this->FasilitasModel->getFasilitas();
        $storeModel = new StoreModel();
        $stores = $storeModel->getStore();

        $data = [];
        $no = 1;
        foreach ($fasilitas as $f) {
            $Status = $f["status"];
            if ($Status == 0) {
                $status = "Waiting..";
                $actionButtons =

                    '<button class="btn btn-success mr-2" onclick="detailFasilitas(' . $f["id_tiket"] . ')"><i class="fa fa-eye"></i></button>' .
                    '<button class="btn btn-warning mr-2" onclick="editFunctionFasilitas(' . $f["id_tiket"] . ')"><i class="fa fa-edit"></i></button>' .
                    '<button class="btn btn-danger" onclick="deletetiketFasilitas(' . $f["id_tiket"] . ')"><i class="fa fa-trash"></i></button>';
            } elseif ($Status == 1) {
                $status = "Approve Atasan ..";
                $actionButtons =
                    '<button class="btn btn-success mr-2" onclick="detailFasilitas(' . $f["id_tiket"] . ')"><i class="fa fa-eye"></i></button>' .
                    '<button class="btn btn-warning" onclick="editFunctionFasilitas(' . $f["id_tiket"] . ')"><i class="fa fa-edit"></i></button>';
            } elseif ($Status == 2) {
                $status = "Approve Finance ..";
                $actionButtons =
                    '<button class="btn btn-success mr-2" onclick="detailFasilitas(' . $f["id_tiket"] . ')"><i class="fa fa-eye"></i></button>' .
                    '<button class="btn btn-warning" onclick="editFunctionFasilitas(' . $f["id_tiket"] . ')"><i class="fa fa-edit"></i></button>';
            } else {
                $status = "Solved";
                $actionButtons =
                    '<button class="btn btn-info mr-2" onclick="detailFasilitas(' . $f["id_tiket"] . ')"><i class="fa fa-eye"></i></button>' .
                    '<button class="btn btn-primary" onclick="editFunctionFasilitas(' . $f["id_tiket"] . ')"><i class="fa fa-edit"></i></button>';
            }

            $data[] = [
                // 'id' => $f["user_id"],
                'no' => $no,
                'tanggal' => $f["tanggal"],
                'store' => $f["store"],
                'nik' => $f["nik"],
                'dept' => $f["dept"],
                'nama' => $f["nama"],
                'jabatan' => $f["jabatan"],
                'status' => $status,
                'action' => $actionButtons,
                'fasilitas' => $fasilitas,
                'stores' => $stores
            ];
            $no++;
        }
        // return $this->response->setJSON($data); //data harus dikirim jadi pake json benerin lagi dah
        echo json_encode(['data' => $data]);
    }
    public function detail_tiketFasilitas($id_tiket)
    {
        $name = $this->session->get('name');
        $tiket = $this->FasilitasModel->get_id_tiket($id_tiket);

        $data = [
            'title' => 'Detail Tiket Page',
            'name'  =>  $name,
            'tiket' => $tiket,
            // 'atasan' => $atasan,
            // 'finance' => $finance,
            // 'it_support' => $it_support
        ];

        echo json_encode($data);
    }
}
