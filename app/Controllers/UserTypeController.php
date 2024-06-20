<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserType;
use CodeIgniter\HTTP\ResponseInterface;

class UserTypeController extends BaseController
{
    public function index()
    {
        try {
            $typeModel = new UserType();
            $query = $typeModel->findAll();

            return $this->response->setJSON($query);
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500, 'Internal Server Error')
                ->setJSON(['error' => $e->getMessage()]);
        }
    }

    public function store()
    {
        $request = service('request');
        $data = $request->getPost();

        try {
            $model = new UserType();
            $model->save($data);

            return $this->response->setStatusCode(201)->setJSON(['message' => 'success']);
        } catch(\Exception $e) {
            throw $e->getMessage();
        }
    }
}
