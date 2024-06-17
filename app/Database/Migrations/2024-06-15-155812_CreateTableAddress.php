<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableAddress extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_address' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'zip_code' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'colony' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'delegation' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'state' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_address', true);
        $this->forge->createTable('address');
    }

    public function down()
    {
        $this->forge->dropTable('address');
    }
}
