<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        // create data
        $news_data = [
			[
				'name' => 'arafik nur f',
				'email'  => 'rbojjes@gmail.com',
				'password' => password_hash('bojes123',PASSWORD_BCRYPT),
                'role'  => 'mahasiswa'
			],
            [
				'name' => 'ahmad nur k',
				'email'  => 'ahmadnk@gmail.com',
				'password' => password_hash('ahmad123',PASSWORD_BCRYPT),
                'role'  => 'mahasiswa'
			],
            [
				'name' => 'farhan rahman',
				'email'  => 'farhanr@gmail.com',
				'password' => password_hash('farhan123',PASSWORD_BCRYPT),
                'role'  => 'mahasiswa'
			],
            [
				'name' => 'john doe',
				'email'  => 'johndoe@gmail.com',
				'password' => password_hash('johndoe123',PASSWORD_BCRYPT),
                'role'  => 'dosen'
			],
		];

		foreach($news_data as $data){
			$this->db->table('users')->insert($data);
		}
    }
}
