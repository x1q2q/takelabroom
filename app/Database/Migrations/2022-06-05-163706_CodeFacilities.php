<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CodeFacilities extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id_codefac' => [
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => true,
					'auto_increment' => true,
				],
            'code_facility' => [
					'type' => 'VARCHAR',
					'constraint' => 20,
			],
            'facility_id' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true
            ],
		]);
        $this->forge->addPrimaryKey('id_codefac');
        $this->forge->addForeignKey('facility_id','facilities','id_facility', 'CASCADE', 'CASCADE');
		$this->forge->createTable('code_facilities');
    }

    public function down()
    {
        $this->forge->dropTable('code_facilities');
    }
}
