<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Credentials;
use App\Models\Users;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function getUsers()
    {
        try {
            $userModel = new Users();
            $users = $userModel->getUsersWithRelations();

            return $this->response->setJSON($users);
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500, 'Internal Server Error')
                ->setJSON(['error' => $e->getMessage()]);
        }
    }

    public function storeUsers()
    {
        $request = service('request');
        $data = $request->getPost();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'firstname' => 'required',
            'lastname'  => 'required',
            'gender'    => 'required',
            'email'     => 'required|valid_email',
            'phone'     => 'required|numeric',
            'id_address'   => 'required',
            'id_user_type'      => 'required',
            'status'    => 'required',
            'username'  => 'required',
            'password'  => 'required'
        ]);

        if (!$validation->run($data)) {
            return $this->response->setStatusCode(400)
                ->setJSON(['error' => $validation->getErrors()]);
        }

        try {
            $userModel = new Users();
            $credentialsModel = new Credentials();

            if (!$userModel->save([
                'firstname' => $data['firstname'],
                'lastname'  => $data['lastname'],
                'gender'     => $data['gender'],
                'email'     => $data['email'],
                'phone'     => $data['phone'],
                'id_address'   => $data['id_address'],
                'id_user_type'      => $data['id_user_type'],
                'register_date' => date('Y-m-d H:i:s'),
                'status'    => $data['status']
            ])) {
                $errors = $userModel->errors();
                throw new \Exception('Error al guardar el usuario: ' . json_encode($errors));
            }

            $userId = $userModel->insertID();

            if (!$credentialsModel->save([
                'id_user'  => $userId,
                'username' => $data['username'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT)
            ])) {
                throw new \Exception('Error al guardar las credenciales del usuario');
            }

            return $this->response->setStatusCode(201)
                ->setJSON([
                    'message' => 'Usuario creado con éxito',
                    'id_user' => $userId
                ]);
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)
                ->setJSON(['error' => $e->getMessage()]);
        }
    }

    public function editUser($id)
    {
        $request = service('request');
        $data = $request->getRawInput();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'firstname' => 'required',
            'lastname'  => 'required',
            'gender'    => 'required',
            'email'     => 'required|valid_email',
            'phone'     => 'required|numeric',
            'id_address' => 'required',
            'id_user_type' => 'required',
            'status'    => 'required',
            'username'  => 'required',
        ]);

        if (!$validation->run($data)) {
            return $this->response->setStatusCode(400)
                ->setJSON(['error' => $validation->getErrors()]);
        }

        try {
            $userModel = new Users();
            $credentialsModel = new Credentials();

            if (!$userModel->update($id, [
                'firstname' => $data['firstname'],
                'lastname'  => $data['lastname'],
                'gender'    => $data['gender'],
                'email'     => $data['email'],
                'phone'     => $data['phone'],
                'id_address' => $data['id_address'],
                'id_user_type' => $data['id_user_type'],
                'status'    => $data['status']
            ])) {
                $errors = $userModel->errors();
                log_message('error', 'Error al actualizar el usuario: ' . json_encode($errors));
                throw new \Exception('Error al actualizar el usuario: ' . json_encode($errors));
            }

            if (!$credentialsModel->update($id, [
                'username' => $data['username'],
                'password' => !empty($data['password']) ? password_hash($data['password'], PASSWORD_DEFAULT) : $credentialsModel->find($id)['password']
            ])) {
                $errors = $credentialsModel->errors();
                log_message('error', 'Error al actualizar las credenciales del usuario: ' . json_encode($errors));
                throw new \Exception('Error al actualizar las credenciales del usuario: ' . json_encode($errors));
            }

            return $this->response->setStatusCode(200)
                ->setJSON([
                    'message' => 'Usuario actualizado con éxito',
                    'id_user' => $id
                ]);
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)
                ->setJSON(['error' => $e->getMessage()]);
        }
    }
}
