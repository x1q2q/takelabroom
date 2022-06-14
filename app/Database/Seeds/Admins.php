<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admins extends Seeder
{
    public function run()
    {
        $news_data = [
			[
				'username' => 'bojes',
				'full_name'  => 'Rafik Bojes',
				'password' => password_hash('bojes123',PASSWORD_BCRYPT)
			],
            [
				'username' => 'admin1',
				'full_name'  => 'Admin Satu',
				'password' => password_hash('admin123',PASSWORD_BCRYPT)
			],
		];

		foreach($news_data as $data){
			$this->db->table('admins')->insert($data);
		}
    }
}
