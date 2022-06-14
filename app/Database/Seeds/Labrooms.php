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
				'name_lab'  => 'software engineering a',
				'code_facility' => 'LABR1-HEYU78',
				'capacity'	=> 50,
                'desc_lab' => 'Lab soft.eng a untuk kelas a',
                'status_lab' => 'available',
			],
            [
				'category_id' => 2,
				'name_lab'  => 'multimedia studio a',
				'code_facility' => 'LABR2-QEIU09',
				'capacity'	=> 60,
                'desc_lab' => 'Lab mulmed a untuk kelas a',
                'status_lab' => 'available',
			],
            [
				'category_id' => 3,
				'name_lab'  => 'computer network and instrument a',
				'code_facility' => 'LABR3-DSYL31',
				'capacity'	=> 70,
                'desc_lab' => 'Lab compnetwork a untuk kelas a',
                'status_lab' => 'available',
			],
			[
				'category_id' => 1,
				'name_lab'  => 'software engineering b',
				'code_facility' => 'LABR1-HEYU78',
				'capacity'	=> 55,
                'desc_lab' => 'Lab soft.eng b untuk kelas b',
                'status_lab' => 'booked',
			],
		];

		foreach($news_data as $data){
			$this->db->table('labrooms')->insert($data);
		}
    }
}
