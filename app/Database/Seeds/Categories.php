<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Categories extends Seeder
{
    public function run()
    {
        $news_data = [
			[
				'name_category' => 'Software Engineering',
				'slug'  => 'software-engineering',
				'thumb_category' => 'software-eng1.jpg',
                'desc_category' => 'Lab Software Engineering sering dipakai untuk keperluan tools-tools perangkat lunak.',
			],
            [
				'name_category' => 'Multimedia Studio',
				'slug'  => 'multimedia-studio',
				'thumb_category' => 'mulmed1.jpg',
                'desc_category' => 'Lab Multimedia Studio  sering dipakai untuk keperluan meminjam alat-alat multimedia.',
			],
            [
				'name_category' => 'Computer Network and Instrumentation',
				'slug'  => 'computer-network-instrument',
				'thumb_category' => 'comp-network.jpg',
                'desc_category' => 'Lab Computer Network and Instrumentation sering dipakai untuk keperluan alat-alat Jaringan.',
			],
		];

		foreach($news_data as $data){
			$this->db->table('categories')->insert($data);
		}
    }
}
