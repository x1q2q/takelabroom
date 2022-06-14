<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reservations extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id_reserv' => [
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => true,
					'auto_increment' => true,
				],
            'lab_id' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true
            ],
            'user_id' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true
            ],
			'code_reserv' => [
					'type' => 'VARCHAR',
					'constraint' => 20,
			],
            'time_start datetime default current_timestamp',
            'time_end datetime default current_timestamp',
            'status_reserv'      => [
				'type'           => 'ENUM',
				'constraint'     => ['cancelled', 'pending','verified','finished'],
				'default'        => 'pending',
			],
			'created_at datetime default current_timestamp',
        	'updated_at datetime default current_timestamp on update current_timestamp'
		]);
        $this->forge->addPrimaryKey('id_reserv');
        $this->forge->addUniqueKey('code_reserv');
        $this->forge->addForeignKey('lab_id','labrooms',
                'id_lab', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id','users',
                'id_user', 'CASCADE', 'CASCADE');
		$this->forge->createTable('reservations');
    }

    public function down()
    {
        $this->forge->dropTable('reservations');
    }
}
