<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Facilities extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id_facility' => [
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => true,
					'auto_increment' => true,
				],
			'name_facility' => [
					'type' => 'VARCHAR',
					'constraint' => 50,
			],
            'qty_facility' => [
                'type'			=> 'INT',
                'constraint'	=> 5,
                'unsigned'   => true,
            ],
            'price' => [
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'thumb_facility' => [
				'type' => 'text',
				'null' => true,
			]
		]);
        $this->forge->addPrimaryKey('id_facility');
		$this->forge->createTable('facilities');
    }

    public function down()
    {
        $this->forge->dropTable('facilities');
    }
}
