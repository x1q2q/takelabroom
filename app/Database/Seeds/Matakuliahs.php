<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Matakuliahs extends Seeder
{
    public function run()
    {
        // create data
        $news_data = [
			[
				'name' => 'Bahasa Indonesia',
				'name_en'  => 'Indonesian Language',
				'kode_makul' => '02143112004',
                'sks'  => 2,
                'semester'  => 1
			],
            [
				'name' => 'Ilmu Pendidikan',
				'name_en'  => 'Educational Science',
				'kode_makul' => '02143132001',
                'sks'  => 2,
                'semester'  => 2
			],
            [
				'name' => 'Praktikum Pemrograman Terstruktur',
				'name_en'  => 'Structured Programming Lab Work',
				'kode_makul' => '02143141007',
                'sks'  => 3,
                'semester'  => 2
			],
            [
				'name' => 'Praktikum Komunikasi Data dan Jaringan Komputer',
				'name_en'  => 'Data Communication and Computer Network Lab Work',
				'kode_makul' => '02143141009',
                'sks'  => 3,
                'semester'  => 3
			]
		];

		foreach($news_data as $data){
			$this->db->table('matakuliah')->insert($data);
		}
    }
}
