<?php

namespace App\Controllers;

use App\Models\Credentials;
use App\Models\UserLogs;
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

            $user = $credential->getByUsername($username);

            if (empty($user) || !password_verify($password, $user['password'])) {
                return $this->respond([
                    'status' => 'error',
                    'message' => 'Invalid username or password',
                ], 401);
            }

            $data = [
                'id_user' => $user['id_user'],
                'login_date' => date('Y-m-d H:i:s'),
                'ip_address' => $ip
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
}
