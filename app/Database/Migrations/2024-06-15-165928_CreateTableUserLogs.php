<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUserLogs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_login' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'login_date' => [
                'type' => 'DATETIME',
            ],
            'ip_address' => [
                'type'       => 'VARCHAR',
                'constraint' => '45',
            ],
            'status' => [
                'type'  => 'VARCHAR',
                'constraint' => '10'
            ]
        ]);
        $this->forge->addKey('id_login', true);
        $this->forge->addForeignKey('id_user', 'user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('login');
    }

    public function down()
    {
        $this->forge->dropTable('login');
    }
}
