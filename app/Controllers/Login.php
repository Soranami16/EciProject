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

    public function getToken()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $userModel = new UserModel();

        $user = $userModel->where('Code', $username)
            ->first();

        if (is_null($user)) {
            return $this->respond(['error' => 'Invalid username'], 401);
        } else {
            $expire = 172799;
            $token = $this->generateToken($username, $expire, $user);

            // Simpan token dalam session
            $sessionData = [
                'oid' => $user['OID'],
                'code' => $user['Code'],
                'name' => $user['Name'],
                'roleoid' => $user['RoleOID'],

            ];

            $this->session->set($sessionData);

            return $this->respond([
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => $expire
            ], 200);
        }

        return $this->respond(['error' => 'Invalid credentials'], 401);
    }

    private function generateToken($username, $expire, $user)
    {
        $key = getenv('TOKEN_SECRET');
        $iat = time();
        $exp = $iat + $expire;

        $payload = array(
            "iat" => $iat,
            "exp" => $exp,
            "code" => $user['Code'],
            "name" => $user['Name']
        );

        return JWT::encode($payload, $key, 'HS256');
    }

    public function logout()
    {
        $this->session->destroy(); // Hapus semua data sesi

        return redirect()->to('auth'); // Ganti 'auth' dengan URL halaman login
    }
}
