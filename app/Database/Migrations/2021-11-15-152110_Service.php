<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Service extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'description' => [
                'type' => 'TEXT',
                'constraint' => '100',

            ],
            
            
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('service');
    }

    public function down()
    {
        $this->forge->dropTable('service');
    }
}
