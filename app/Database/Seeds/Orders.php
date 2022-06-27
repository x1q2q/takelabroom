<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Orders extends Seeder
{
    public function run()
    {
        $news_data = [
            [
                'code_reserv' => 'RESV.20221905',
                'status_order' => 'pending',
                'total_payment' => 372000, // already calculated
                'thumb_order' => '',
			],
            [
                'code_reserv' => 'RESV.20229830',
                'status_order' => 'paided',
                'total_payment' => 360000, // already calculated
                'thumb_order' => 'konfirm-bukti1.jpg',
			]
		];

		foreach($news_data as $data){
			$this->db->table('orders')->insert($data);
		}
    }
}
