<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id_user' => [
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => true,
					'auto_increment' => true,
				],
			'username' => [
					'type' => 'VARCHAR',
					'constraint' => 25,
			],
			'full_name' => [
					'type' => 'VARCHAR',
					'constraint' => 50,
			],
            'password' => [
				'type' => 'VARCHAR',
                'constraint' => 255,
            ],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
			],
            'type_user'      => [
				'type'           => 'ENUM',
				'constraint'     => ['civitas', 'non-civitas'],
				'default'        => 'civitas',
			],
			'gender'      => [
				'type'           => 'ENUM',
				'constraint'     => ['laki-laki', 'perempuan'],
				'default'        => 'perempuan',
			],
			'notelp' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
			],
			'nim' => [
				'type' => 'VARCHAR',
				'constraint' => 15,
			],
			'thumb_user' => [
				'type' => 'text',
				'null' => true,
			],
			'is_activated' => [
                'type'			=> 'TINYINT',
                'constraint'	=> 1,
				'default'		=> 0, 
            ],
			'created_at datetime default current_timestamp',
        	'updated_at datetime default current_timestamp on update current_timestamp'
		]);
        $this->forge->addPrimaryKey('id_user');
        $this->forge->addUniqueKey('email');
		$this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
