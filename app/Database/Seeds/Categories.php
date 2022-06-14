<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Categories extends Seeder
{
    public function run()
    {
        $news_data = [
			[
				'name_category' => 'software engineering',
				'slug'  => 'software-engineering',
				'thumb_category' => 'software-eng1.jpg',
                'desc_category' => 'Software Engineering memiliki fasilitas yang lengkap karena...',
			],
            [
				'name_category' => 'multimedia studio',
				'slug'  => 'multimedia-studio',
				'thumb_category' => 'mulmed1.jpg',
                'desc_category' => 'Multimedia Studio memiliki fasilitas mulmed yang',
			],
            [
				'name_category' => 'computer network and instrumentation',
				'slug'  => 'computer-network-instrument',
				'thumb_category' => 'comp-network.jpg',
                'desc_category' => 'Computer Network Instrumentation memiliki fasilitas berupa salah satunya',
			],
		];

		foreach($news_data as $data){
			$this->db->table('categories')->insert($data);
		}
    }
}
