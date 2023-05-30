<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDataJamu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'namaJamu'             => ['type' => 'varchar', 'constraint' => 255],
            'gambar'   => ['type' => 'varchar', 'constraint' => 255],
            'manfaat'   => ['type' => 'varchar', 'constraint' => 255],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('data_jamu', true);
    }

    public function down()
    {
        //
    }
}
