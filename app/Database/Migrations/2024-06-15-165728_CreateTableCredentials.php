<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableCredentials extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_credential' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_credential', true);
        $this->forge->addForeignKey('id_user', 'user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('credential');
    }

    public function down()
    {
        $this->forge->dropTable('credential');
    }
}
