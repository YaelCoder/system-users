<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'firstname' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'lastname' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'gender' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique'     => true,
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'id_address' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'id_user_type' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'register_date' => [
                'type' => 'DATETIME',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['activo', 'inactivo'],
                'default'    => 'activo',
            ],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->addForeignKey('id_address', 'address', 'id_address', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_user_type', 'user_type', 'id_user_type', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
