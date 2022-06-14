<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CodeFacilities extends Seeder
{
    public function run()
    {
        $news_data = [
			[
                'code_facility'  => 'LABR1-HEYU78',
                'facility_id' => 1,
			],
            [
                'code_facility'  => 'LABR1-HEYU78',
                'facility_id' => 2,
			],
            [
                'code_facility'  => 'LABR1-HEYU78',
                'facility_id' => 3,
			],
            [
                'code_facility'  => 'LABR2-QEIU09',
                'facility_id' => 4,
			],
            [
                'code_facility'  => 'LABR2-QEIU09',
                'facility_id' => 5,
			],
            [
                'code_facility'  => 'LABR2-QEIU09',
                'facility_id' => 6,
			],
            [
                'code_facility'  => 'LABR3-DSYL31',
                'facility_id' => 7,
			],
            [
                'code_facility'  => 'LABR3-DSYL31',
                'facility_id' => 8,
			],
            [
                'code_facility'  => 'LABR3-DSYL31',
                'facility_id' => 9,
			],
		];

		foreach($news_data as $data){
			$this->db->table('code_facilities')->insert($data);
		}
    }
}
