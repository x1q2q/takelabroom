<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orders extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id_order' => [
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => true,
					'auto_increment' => true,
				],
            'code_reserv' => [
					'type' => 'VARCHAR',
					'constraint' => 20,
			],
            'status_order'      => [
				'type'           => 'ENUM',
				'constraint'     => ['cancelled', 'pending',
                    'paided','confirmed'],
				'default'        => 'pending',
			],
            'total_payment' => [
                'type'          => 'BIGINT',
                'unsigned'      => true
            ],
            'thumb_order' => [
				'type' => 'text',
				'null' => true,
			],
		]);
        $this->forge->addPrimaryKey('id_order');
        $this->forge->addForeignKey('code_reserv','reservations',
                'code_reserv', 'CASCADE', 'CASCADE');
		$this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
