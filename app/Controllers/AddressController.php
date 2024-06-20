<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Address;
use CodeIgniter\HTTP\ResponseInterface;

class AddressController extends BaseController
{
    public function index()
    {
        try {
            $addressModel = new Address();
            $query = $addressModel->findAll();

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
            $model = new Address();
            $model->save($data);

            return $this->response->setStatusCode(201)->setJSON(['message' => 'success']);
        } catch(\Exception $e) {
            return $this->response->setStatusCode(500, 'Internal Server Error')
                ->setJSON(['error' => $e->getMessage()]);
        }
    }
}
