<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $address = [
            'zip_code' => '55029',
            'colony' => 'Granjas de ecatepec 2 Secc',
            'delegation' => 'Ecatepec de morelos',
            'state' => 'Estado de México'
        ];

        $this->db->table('address')->insert($address);
        $direccionID = $this->db->insertID();

        $user_type = [
            'user_type' => 'Administrador'
        ];

        $this->db->table('user_type')->insert($user_type);
        $user_type_ID = $this->db->insertID();

        $data = [
            'firstname' => 'Admin',
            'lastname' => 'Telat',
            'gender' => 'Indefinido',
            'email' => 'admin@example.com',
            'phone' => '5616558229',
            'id_address' =>  $direccionID,
            'id_user_type' => $user_type_ID,
            'register_date' => date('Y-m-d H:i:s'),
            'status' => 'activo'
        ];

        $this->db->table('user')->insert($data);
        $userID = $this->db->insertID();

        $credentials = [
            'id_user' => $userID,
            'password' => password_hash('admin1234', PASSWORD_DEFAULT),
        ];

        $this->db->table('credential')->insert($credentials);
    }
}
