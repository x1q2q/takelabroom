<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Labrooms extends Seeder
{
    public function run()
    {
        $news_data = [
			[
				'category_id' => 1,
				'name_lab'  => 'Software Engineering a',
				'code_facility' => 'LABR1-HEYU78',
				'capacity'	=> 50,
                'desc_lab' => 'Lab Software Engineering untuk kelas a'
			],
            [
				'category_id' => 2,
				'name_lab'  => 'Multimedia Studio a',
				'code_facility' => 'LABR2-QEIU09',
				'capacity'	=> 60,
                'desc_lab' => 'Lab multimedia Studio untuk kelas a'
			],
            [
				'category_id' => 3,
				'name_lab'  => 'Computer Network and Instrument a',
				'code_facility' => 'LABR3-DSYL31',
				'capacity'	=> 70,
                'desc_lab' => 'Lab CompNetwork & Instrument untuk kelas a'
			],
			[
				'category_id' => 1,
				'name_lab'  => 'Software Engineering b',
				'code_facility' => 'LABR1-HEYU78',
				'capacity'	=> 55,
                'desc_lab' => 'Lab Software Engineering untuk kelas b'
			],
		];

		foreach($news_data as $data){
			$this->db->table('labrooms')->insert($data);
		}
    }
}
