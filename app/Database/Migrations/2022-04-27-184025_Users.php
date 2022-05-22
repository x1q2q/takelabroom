<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
			'id_user' => [
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => true,
					'auto_increment' => true,
				],
			'name' => [
					'type' => 'VARCHAR',
					'constraint' => 50,
			],
			'email' => [
					'type' => 'VARCHAR',
					'constraint' => 200,
			],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'role'      => [
				'type'           => 'ENUM',
				'constraint'     => ['dosen', 'mahasiswa'],
				'default'        => 'mahasiswa',
			],
		]);
		//buat primary key
		$this->forge->addKey('id_user', true);
		//buat nama tabel
		$this->forge->createTable('users');
    }

    public function down()
    {
        //
        $this->forge->dropTable('users');
    }
}
