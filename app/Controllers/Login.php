<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\UserModel;

class Login extends BaseController
{
    use ResponseTrait;
    private $session;

    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        return view('login/index');
    }

    // public function login()
    // {

    //     $baseUrl = 'http://10.140.4.22:81/token';

    //     $postData = [
    //         'grant_type' => 'password',
    //         'username'   => $this->request->getPost('username'),
    //         'password'   => $this->request->getPost('password')
    //     ];

    //     $ch = curl_init($baseUrl);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));

    //     $response = curl_exec($ch);

    //     if ($response === false) {
    //         $error = curl_error($ch);
    //         var_dump($error);
    //         curl_close($ch);
    //         return $this->response->setJSON(['error' => $error]);
    //     }

    //     curl_close($ch);

    //     $responseData = json_decode($response, true);

    //     if (isset($responseData['token'])) {          
    //         $userModel = new UserModel();
    //         $user = $userModel->where('Code', $postData['username'])
    //                 ->first();

    //         $session = session();
    //         $sessionData = [
    //             'oid' => $user['OID'],
    //             'code' => $user['Code'],
    //             'name' => $user['Name'],
    //             'roleoid' => $user['RoleOID'],

    //         ];

    //         $this->session->set($sessionData);   
    //         return $this->response->setJSON(['message' => 'Login successful']);
    //     } else {
    //         return $this->response->setStatusCode(401)->setJSON(['error' => 'Invalid credentials']);
    //     }
    // } 

    // public function getToken()
    // {
    //     $username = $this->request->getVar('username');
    //     $password = $this->request->getVar('password');

    //     $userModel = new UserModel();

    //     $user = $userModel->where('Code', $username)
    //         ->first();

    //     if (is_null($user)) {
    //         return $this->respond(['error' => 'Invalid username'], 401);
    //     } else {
    //         $expire = 172799;
    //         $token = $this->generateToken($username, $expire, $user);

    //         // Simpan token dalam session
    //         $sessionData = [
    //             'oid' => $user['OID'],
    //             'code' => $user['Code'],
    //             'name' => $user['Name'],
    //             'roleoid' => $user['RoleOID'],

    //         ];

    //         $this->session->set($sessionData);

    //         return $this->respond([
    //             'access_token' => $token,
    //             'token_type' => 'bearer',
    //             'expires_in' => $expire
    //         ], 200);
    //     }

    //     return $this->respond(['error' => 'Invalid credentials'], 401);
    // }

    // private function generateToken($username, $expire, $user)
    // {
    //     $key = getenv('TOKEN_SECRET');
    //     $iat = time();
    //     $exp = $iat + $expire;

    //     $payload = array(
    //         "iat" => $iat,
    //         "exp" => $exp,
    //         "code" => $user['Code'],
    //         "name" => $user['Name']
    //     );

    //     return JWT::encode($payload, $key, 'HS256');
    // }

    // public function login()
    // {

    //     $baseUrl = 'http://10.140.4.22:81/token';

    //     $postData = [
    //         'grant_type' => 'password',
    //         'username'   => $this->request->getPost('username'),
    //         'password'   => $this->request->getPost('password')
    //     ];

    //     $ch = curl_init($baseUrl);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));

    //     $response = curl_exec($ch);

    //     if ($response === false) {
    //         $error = curl_error($ch);
    //         curl_close($ch);
    //         return $this->response->setJSON(['error' => $error]);
    //     }

    //     curl_close($ch);
    //     $userModel = new UserModel();
    //     $user = $userModel->where('Code', $postData['username'])
    //         ->first();

    //     $sessionData = [
    //         'oid' => $user['OID'],
    //         'code' => $user['Code'],
    //         'name' => $user['Name'],
    //         'roleoid' => $user['RoleOID'],

    //     ];

    //     $this->session->set($sessionData);
    //     return $this->response->setJSON(json_decode($response, true));
    // }

    public function login()
    {

        $baseUrl = 'http://10.140.4.22:81/token';

        $postData = [
            'grant_type' => 'password',
            'username'   => $this->request->getPost('username'),
            'password'   => $this->request->getPost('password')
        ];

        $ch = curl_init($baseUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));

        $response = curl_exec($ch);

        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            return $this->response->setJSON(['error' => $error]);
        }

        curl_close($ch);
        $userModel = new UserModel();
        $user = $userModel->where('Code', $postData['username'])
            ->first();

        if ($user) {
            $sessionData = [
                'oid' => $user['OID'],
                'code' => $user['Code'],
                'name' => $user['Name'],
                'roleoid' => $user['RoleOID'],
            ];

            $this->session->set($sessionData);
            return $this->response->setJSON(json_decode($response, true));
        } else {
            return $this->response->setJSON(['error' => 'User not found']);
        }
    }


    public function logout()
    {
        $this->session->destroy(); // Hapus semua data sesi

        return redirect()->to('/'); // Ganti 'auth' dengan URL halaman login
    }
}
