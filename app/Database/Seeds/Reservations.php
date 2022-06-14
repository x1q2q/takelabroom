<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Reservations extends Seeder
{
    public function run()
    {
        $timeStart = '2022-06-06 07:00:00';
        $timeEnd = '2022-06-06 09:00:00';
        //
        $timeStart2 = '2022-06-07 08:15:00';
        $timeEnd2 = '2022-06-07 10:15:00';
        $news_data = [
			[
                'lab_id' => 4,
                'user_id' => 1,
                'code_reserv' => 'RESV.20229830',
                'time_start' => date('Y-m-d H:i:s', strtotime($timeStart)),
                'time_end' => date('Y-m-d H:i:s', strtotime($timeEnd)),
                'status_reserv' => 'verified'
			],
            [
                'lab_id' => 2,
                'user_id' => 2,
                'code_reserv' => 'RESV.20221905',
                'time_start' => date('Y-m-d H:i:s', strtotime($timeStart2)),
                'time_end' => date('Y-m-d H:i:s', strtotime($timeEnd2)),
                'status_reserv' => 'pending'
			],
		];

		foreach($news_data as $data){
			$this->db->table('reservations')->insert($data);
		}
    }
}
