<?php

namespace App\Controllers;

use App\Models\TenderModel;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\StoreLocationModel;
use App\Models\TenderDBModel;
use App\Models\StoreModel;
use CodeIgniter\API\ResponseTrait;

class Master extends BaseController
{
    use ResponseTrait;
    private $session;
    private $TenderModel;
    private $userModel;
    private $roleModel;
    private $storelocationModel;
    private $storeModel;
    private $tenderdbModel;

    public function __construct()
    {
        $this->TenderModel = new TenderModel();
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();
        $this->storelocationModel = new StoreLocationModel();
        $this->storeModel = new StoreModel();
        $this->session = session();
        $this->tenderdbModel = new TenderDBModel();
    }

    public function MasterUser()
    {

        if (!$this->session->has('oid')) {
            return redirect()->to('/');
        }
        $name = $this->session->get('name');
        $role = $this->session->get('roleoid');
        $data = [
            'title' => 'Master User',
            'name' => $name,
            'role' => $role
        ];
        return view('master/v_masteruser', $data);
    }

    public function MasterUsers()
    {
        $users = $this->userModel->getUsersWithNameRole();

        $data = [];
        $no = 1;

        foreach ($users as $user) {

            $actionButtons =
                '<button class="btn  mr-2"  style="background-color: #6E98B8;" onclick="editmasteruser(' . $user["OID"] . ')"><i class="fa fa-edit"></i></button>' .
                '<button class="btn"   style="background-color: #F4B24E;"onclick="deletemasteruser(' . $user["OID"] . ')"><i class="fa fa-trash"></i></button>';

            $data[] = [
                'no'      => $no,
                'code'    => $user["Code"],
                'name'    => $user["Name"],
                'roleoid' => $user["role_name"],
                'action' => $actionButtons,
            ];
            $no++;
        }

        echo json_encode(['data' => $data]);
    }

    public function DeleteUser($id)
    {
        $User = $this->userModel->delete($id);

        $response = [
            'success' =>  $User,
            'message' => ($User) ? 'Delete successfully' : 'Error submitting form',
        ];

        return $this->respondDeleted($response);
    }

    public function FormUser()
    {
        $role = $this->roleModel->getAllRoles();
        $data = [
            'role' => $role,
        ];

        echo json_encode($data);
    }

    public function SubmitUser()
    {
        $data = $this->request->getPost();
        // var_dump($data);

        $encodedPassword = base64_encode($data['password']);

        $insertData = [
            'Code' => $data['code'],
            'Name' => $data['name'],
            'RoleOID' => $data['role'],
            'Password' => $encodedPassword,
        ];

        $result = $this->userModel->insert($insertData);

        $response = [
            'success' => $result,
            'message' => ($result) ? 'Form submitted successfully' : 'Error submitting form',
        ];

        return $this->respondCreated($response);
    }

    public function EditUser($id)
    {
        $role = $this->userModel->getAllRoles1();
        $user = $this->userModel->findByID($id);

        $data = [
            'roles' => $role,
            'user' => $user
        ];

        echo json_encode($data);
    }

    // public function UpdateUser($id)
    // {
    //     $data = $this->request->getPost();

    //     $insertData = [
    //         'Code' => $data['codes'],
    //         'Name' => $data['names'],
    //         'RoleOID' => $data['roles'],
    //         'Password' => $data['passwords'],
    //     ];

    //     $result = $this->userModel->update($id, $insertData);

    //     $response = [
    //         'success' => $result,
    //         'message' => ($result) ? 'Form submitted edit successfully' : 'Error submitting form',
    //     ];

    //     return $this->respond($response);
    // }

    public function UpdateUser($id)
    {
        $data = $this->request->getPost();

        // Assuming $data['codes'], $data['names'], $data['roles'] are available in your original code
        $updateData = [
            'OID' => $id, // Assuming OID is the user ID you want to update
            'Code' => $data['codes'],
            'PasswordOld' => $data['passwords'],
            'PasswordNew' => $data['new_password'], // Assuming 'new_password' is the new password field in your form
        ];

        // Assuming you are using CodeIgniter's HTTPClient to make API requests
        $client = \Config\Services::curlrequest([
            'base_uri' => 'http://10.140.4.22:81/UserPasswordUpdate',
        ]);

        try {
            // Make a POST request to the API endpoint
            $response = $client->post('UserPasswordUpdate', [
                'form_params' => $updateData,
            ]);

            // Assuming the API returns JSON, you may need to adjust this based on the actual API response
            $result = json_decode($response->getBody(), true);

            $response = [
                'success' => $result['success'], // Update based on the actual structure of the API response
                'message' => ($result['success']) ? 'User password updated successfully' : 'Error updating user password',
            ];
        } catch (\Exception $e) {
            // Handle exceptions if the API request fails
            $response = [
                'success' => false,
                'message' => 'Error connecting to the API: ' . $e->getMessage(),
            ];
        }

        return $this->respond($response);
    }



    //Fungsi Store
    public function DeleteStore($id)
    {
        $store = $this->storeModel->delete($id);

        $response = [
            'success' => $store,
            'message' => ($store) ? 'Delete successfully' : 'Error submitting form',
        ];

        return $this->respondDeleted($response);
    }

    public function MasterStore()
    {

        if (!$this->session->has('oid')) {
            return redirect()->to('/');
        }
        $name = $this->session->get('name');
        $role = $this->session->get('roleoid');
        $data = [
            'title' => 'Master Store',
            'name' => $name,
            'role' => $role
        ];

        return view('master/v_masterstore', $data);
    }

    public function MasterStores()
    {
        $store = $this->storeModel->getStoreWithNameOID();
        $data = [];
        $no = 1;

        foreach ($store as $stores) {
            $actionButtons =
                '<button class="btn mr-2"  style="background-color: #6E98B8;" onclick="editmasterstore(' . $stores["OID"] . ')"><i class="fa fa-edit"></i></button>' .
                '<button class="btn" style="background-color: #F4B24E;"onclick="deletemasterstore(' . $stores["OID"] . ')"><i class="fa fa-trash"></i></button>';

            $data[] = [
                'no' => $no,
                'CompanyOID' => $stores['company_name'],
                'Code'  => $stores['Code'],
                'Name'  => $stores['Name'],
                'StoreRegionOID' => $stores['SR_name'],
                'TenderRegionOID'  => $stores['TR_name'],
                'StoreDCOID'  => $stores['SDC_name'],
                'ReturnDay'  => $stores['ReturnDay'],
                'OptimisticLockField'  => $stores['OptimisticLockField'],
                'GCRecord'  => $stores['GCRecord'],
                'BusinessDate'  => date('d F Y', strtotime($stores['BusinessDate'])),
                'StoreType'  => $stores['StoreType'],
                'Expired'  => $stores['Expired'],
                'IsActive'  => $stores['IsActive'],
                'EInvoice'  => $stores['EInvoice'],
                'StoreRegionalOID'  => $stores['SRL_name'],
                'TInvoice'  => $stores['TInvoice'],
                'StoreTieringOID'  => $stores['ST_name'],
                'action' => $actionButtons
            ];
            $no++;
        }
        echo json_encode(['data' => $data]);
    }

    public function FormStore()
    {
        $company = $this->storeModel->getAllCompany();
        $storeregion = $this->storeModel->getAllStoreRegion();
        $tenderregion = $this->storeModel->getAllTenderegion();
        $storedc = $this->storeModel->findAll();
        $storeregional = $this->storeModel->getAllStoreregional();
        $storetiering = $this->storeModel->getAllStoretiering();

        $data = [
            'company' => $company,
            'storeregion' => $storeregion,
            'tenderregion' => $tenderregion,
            'storedc' => $storedc,
            'storeregional' => $storeregional,
            'storetiering' => $storetiering,
        ];

        echo json_encode($data);
    }

    public function SubmitStore()
    {
        $data = $this->request->getPost();
        // var_dump($data);
        $storetype = isset($data['storetype']) ? 1 : 0;
        $expired = isset($data['expired']) ? 1 : 0;
        $tinvoice = isset($data['tinvoice']) ? 1 : 0;
        $isactived = isset($data['isactived']) ? 1 : 0;
        $einvoice = isset($data['einvoice']) ? 1 : 0;

        $gcrecord = ($data['gcrecord'] !== '') ? $data['gcrecord'] : null;
        $optimisticlockfield = ($data['optimisticlockfield'] !== '') ? $data['optimisticlockfield'] : null;
        $companyOID = ($data['company'] !== '') ? $data['company'] : null;
        $storeregion = ($data['storeregion'] !== '') ? $data['storeregion'] : null;
        $tenderregion = ($data['tenderregion'] !== '') ? $data['tenderregion'] : null;
        $storedc = ($data['storedc'] !== '') ? $data['storedc'] : null;
        $storetiering = ($data['storetiering'] !== '') ? $data['storetiering'] : null;
        $storeregional = ($data['storeregional'] !== '') ? $data['storeregional'] : null;

        $insertData = [
            'Name' => $data['name'],
            'Code' => $data['code'],
            'GCRecord' => $gcrecord,
            'ReturnDay' => $data['returnday'],
            'OptimisticLockField' => $optimisticlockfield,
            'BusinessDate' => $data['bussinessdate'],
            'StoreType' => $storetype,
            'Expired' => $expired,
            'TInvoice' => $tinvoice,
            'IsActive' => $isactived,
            'EInvoice' => $einvoice,
            'CompanyOID' => $companyOID,
            'StoreRegionOID' => $storeregion,
            'TenderRegionOID' => $tenderregion,
            'StoreDCOID' => $storedc,
            'StoreRegionalOID' => $storeregional,
            'StoreTieringOID' => $storetiering,
        ];

        $result = $this->storeModel->insert($insertData);

        $response = [
            'success' => $result,
            'message' => ($result) ? 'Form submitted successfully' : 'Error submitting form',
        ];

        return $this->respondCreated($response);
    }


    public function EditStore($id)
    {
        $store = $this->storeModel->findByID($id);
        $company = $this->storeModel->getAllCompany();
        $storeregion = $this->storeModel->getAllStoreRegion();
        $tenderregion = $this->storeModel->getAllTenderegion();
        $storedc = $this->storeModel->findAll();
        $storeregional = $this->storeModel->getAllStoreregional();
        $storetiering = $this->storeModel->getAllStoretiering();


        $data = [
            'store' => $store,
            'company' => $company,
            'storeregion' => $storeregion,
            'tenderregion' => $tenderregion,
            'storedc' => $storedc,
            'storeregional' => $storeregional,
            'storetiering' => $storetiering,
        ];

        echo json_encode($data);
    }

    //Fungsi Store Location 
    public function DeleteStoreLocation($id)
    {
        $storelocation = $this->storelocationModel->delete($id);

        $response = [
            'success' => $storelocation,
            'message' => ($storelocation) ? 'Delete successfully' : 'Error submitting form',
        ];

        return $this->respondDeleted($response);
    }

    public function MasterStoreLocation()
    {

        $name = $this->session->get('name');
        $role = $this->session->get('roleoid');
        $data = [
            'title' => 'Master Store Location',
            'name' => $name,
            'role' => $role
        ];

        return view('master/v_masterstorelocation', $data);
    }

    public function MasterStoreLocations()
    {
        // $store = $this->storeModel->getAllStoreLocation();
        $storee = $this->storelocationModel->getStoreLocationWithNameStoreOID();
        $data = [];
        $no = 1;

        foreach ($storee as $stores) {
            $actionButtons =
                '<button class="btn mr-2"  style="background-color: #6E98B8;" onclick="editmasterstorelocation(' . $stores["OID"] . ')"><i class="fa fa-edit"></i></button>' .
                '<button class="btn" style="background-color: #F4B24E;"onclick="deletemasterstorelocation(' . $stores["OID"] . ')"><i class="fa fa-trash"></i></button>';

            $data[] = [
                'no' => $no,
                'storeoid' => $stores['store_name'],
                'code' => $stores['Code'],
                'name' => $stores['Name'],
                'action' => $actionButtons
            ];
            $no++;
        }
        echo json_encode(['data' => $data]);
    }

    public function FormStoreLocation()
    {
        $store = $this->storeModel->findAll();

        $data = [
            'store' => $store,
        ];

        echo json_encode($data);
    }

    public function SubmitStoreLocation()
    {
        $data = $this->request->getPost();
        // var_dump($data);

        $insertData = [
            'StoreOID' => $data['storeoid'],
            'Code' => $data['code'],
            'Name' => $data['name'],
        ];

        $result = $this->storelocationModel->insert($insertData);

        $response = [
            'success' => $result,
            'message' => ($result) ? 'Form submitted successfully' : 'Error submitting form',
        ];

        return $this->respondCreated($response);
    }

    public function EditStoreLocation($id)
    {
        $store = $this->storelocationModel->getAllStores();
        $storelocation = $this->storelocationModel->findByID($id);

        $data = [
            'store' => $store,
            'storelocation' => $storelocation
        ];

        echo json_encode($data);
    }

    public function UpdateStoreLocation($id)
    {
        $data = $this->request->getPost();
        // var_dump($data);
        // die;
        $insertData = [
            'StoreOID' => $data['storeOID'],
            'Code' => $data['code'],
            'Name' => $data['name'],
        ];

        $result = $this->storelocationModel->update($id, $insertData);

        $response = [
            'success' => $result,
            'message' => ($result) ? 'Form submitted edit successfully' : 'Error submitting form',
        ];

        return $this->respond($response);
    }

    //fungsi Tender


    public function DeleteTender($id)
    {
        $tender = $this->tenderdbModel->delete($id);

        $response = [
            'success' => $tender,
            'message' => ($tender) ? 'Delete successfully' : 'Error submitting form',
        ];
    }

    public function MasterTender()
    {
        $name = $this->session->get('name');
        $data = [
            'title' => 'MasterTender',
            'name' => $name,
        ];

        return view('master/v_mastertender', $data);
    }
};
