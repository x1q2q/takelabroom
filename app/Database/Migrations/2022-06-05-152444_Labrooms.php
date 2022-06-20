<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Labrooms extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id_lab' => [
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => true,
					'auto_increment' => true,
				],
            'category_id' => [
                'type'			=> 'INT',
                'constraint'	=> 11,
                'unsigned'   => true,
            ],
			'name_lab' => [
					'type' => 'VARCHAR',
					'constraint' => 100,
			],
            'code_facility' => [
				'type' => 'VARCHAR',
                'constraint' => 20,
            ],
			'capacity' => [
                'type'			=> 'INT',
                'constraint'	=> 3,
            ],
            'desc_lab' => [
				'type' => 'text',
				'null' => true,
			],
			'status_lab'      => [
				'type'           => 'ENUM',
				'constraint'     => ['full-booked', 'available'],
				'default'        => 'available',
			]
		]);
        $this->forge->addPrimaryKey('id_lab');
        $this->forge->addForeignKey('category_id','categories','id_category', 'CASCADE', 'CASCADE');
		$this->forge->createTable('labrooms');
    }

    public function down()
    {
        $this->forge->dropTable('labrooms');
    }
}
