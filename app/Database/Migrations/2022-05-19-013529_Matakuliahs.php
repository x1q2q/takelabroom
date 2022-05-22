<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Matakuliahs extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
			'id_makul' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
			'name' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
			],
            'name_en' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
			'kode_makul' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
			],
            'sks' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'semester' => [
                'type' => 'INT',
                'constraint' => 11,
            ]
		]);
		//buat primary key
		$this->forge->addKey('id_makul', true);
		//buat nama tabel
		$this->forge->createTable('matakuliah');
    }

    public function down()
    {
        //
        $this->forge->dropTable('matakuliah');
    }
}
