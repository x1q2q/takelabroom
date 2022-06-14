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
                'total_payment' => 960000, // already calculated
                'thumb_order' => 'konfirm-bukti1.jpg',
			],
		];

		foreach($news_data as $data){
			$this->db->table('orders')->insert($data);
		}
    }
}
