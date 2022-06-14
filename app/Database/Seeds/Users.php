<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
class Users extends Seeder
{
    public function run()
    {
        $news_data = [
			[
				'username' => 'rafiknurf',
				'full_name'  => 'Arafik Nur F',
				'password' => password_hash('bojes123',PASSWORD_BCRYPT),
                'email' => 'rbojjes@student.uns.ac.id',
                'type_user' => 'civitas',
                'gender' => 'laki-laki',
                'notelp' => '085714284782',
                'nim'   => 'K3519015',
                'thumb_user' => 'rafik1.png',
                'is_activated' => 1,
                'created_at' => Time::now(),
                'updated_at' => Time::now()
			],
            [
				'username' => 'adityans',
				'full_name'  => 'Aditya Nur S',
				'password' => password_hash('adit123',PASSWORD_BCRYPT),
                'email' => 'aditbojes@gmail.com',
                'type_user' => 'non-civitas',
                'gender' => 'laki-laki',
                'notelp' => '08773239782',
                'nim' => 'K1519019',
                'thumb_user' => 'adit1.jpg',
                'is_activated' => 1,
                'created_at' => Time::now(),
                'updated_at' => Time::now()
			],
            [
				'username' => 'lukmans',
				'full_name'  => 'Lukman Nur H',
				'password' => password_hash('lukman123',PASSWORD_BCRYPT),
                'email' => 'lukmannurh@gmail.com',
                'type_user' => 'non-civitas',
                'gender' => 'laki-laki',
                'notelp' => '08128639782',
                'nim' => 'M3518017',
                'thumb_user' => 'lukman1.jpg',
                'is_activated' => 0,
                'created_at' => Time::now(),
                'updated_at' => Time::now()
			]
		];

		foreach($news_data as $data){
			$this->db->table('users')->insert($data);
		}
    }
}
