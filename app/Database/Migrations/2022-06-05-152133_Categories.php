<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id_category' => [
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => true,
					'auto_increment' => true,
				],
			'name_category' => [
					'type' => 'VARCHAR',
					'constraint' => 50,
			],
			'slug' => [
					'type' => 'VARCHAR',
					'constraint' => 50,
			],
			'thumb_category' => [
				'type' => 'text',
				'null' => true,
			],
            'desc_category' => [
				'type' => 'text',
				'null' => true,
			],
		]);
        $this->forge->addPrimaryKey('id_category');
		$this->forge->createTable('categories');
    }

    public function down()
    {
        $this->forge->dropTable('categories');
    }
}
