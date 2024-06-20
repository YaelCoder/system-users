<?php

namespace App\Controllers;

use App\Models\Credentials;
use App\Models\UserLogs;
use App\Models\Users;
use CodeIgniter\RESTful\ResourceController;
use Config\Services;
use Exception;

class AuthController extends ResourceController
{
    public function login()
    {
        $username = $this->request->getPost('Username');
        $password = $this->request->getPost('password');
        $ip = $this->request->getIPAddress();

        $validation = Services::validation();
        $validation->setRules([
            'Username' => 'required|alpha_numeric',
            'password' => 'required|min_length[8]',
        ]);

        if (!$validation->run($this->request->getPost())) {
            return $this->respond([
                'status' => 'error',
                'message' => $validation->getErrors(),
            ], 400);
        }

        try {
            $credential = new Credentials();
            $login = new UserLogs();
            $userModel = new Users();

            $user = $credential->getByUsername($username);

            if (empty($user) || !password_verify($password, $user['password'])) {
                return $this->respond([
                    'status' => 'error',
                    'message' => 'Invalid username or password',
                ], 401);
            }

            $fullUser = $userModel->find($user['id_user']);
            if ($fullUser['status'] !== 'activo') {
                return $this->respond([
                    'status' => 'error',
                    'message' => 'User account is inactive',
                ], 403);
            }

            $data = [
                'id_user' => $user['id_user'],
                'login_date' => date('Y-m-d H:i:s'),
                'ip_address' => $ip,
                'status' => 'login'
            ];

            $login->insert($data);

            return $this->respond([
                'status' => 'success',
                'message' => 'Login successful',
                'data' => $user
            ], 200);
        } catch (Exception $e) {
            return $this->respond([
                'status' => 'error',
                'message' => 'An error occurred during login: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function logout()
    {
        $userDataHeader = $this->request->header('User-Data');
        $userData = $userDataHeader ? $userDataHeader->getValue() : null;
        $userDataArray = $userData ? json_decode($userData, true) : [];

        $data = [
            'id_user' => $userDataArray['id_user'] ?? null,
            'login_date' => date('Y-m-d H:i:s'),
            'ip_address' => $this->request->getIPAddress(),
            'status' => 'logout'
        ];

        try {
            $login = new UserLogs();
            $login->insert($data);
            
            return $this->respond([
                'status' => 'success',
                'message' => 'Logout successful'
            ], 200);
        } catch (Exception $e) {
            return $this->respond([
                'status' => 'error',
                'message' => 'An error occurred during logout: ' . $e->getMessage(),
            ], 500);
        }
    }
}
