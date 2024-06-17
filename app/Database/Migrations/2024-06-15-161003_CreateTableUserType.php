<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUserType extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user_type' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_type' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id_user_type', true);
        $this->forge->createTable('user_type');
    }

    public function down()
    {
        $this->forge->dropTable('user_type');
    }
}
