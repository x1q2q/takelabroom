<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Facilities extends Seeder
{
    public function run()
    {
        $news_data = [
			[
				'name_facility' => 'Komputer Windows 7',
				'qty_facility'  => 10,
				'price' => 2500, // per menit
                'thumb_facility' => 'komputer-windows7.jpg',
			],
            [
				'name_facility' => 'Laptop Windows 10',
				'qty_facility'  => 10,
				'price' => 2500, // per menit
                'thumb_facility' => 'laptop-windows10.jpg',
			],
            [
				'name_facility' => 'VGA Card',
				'qty_facility'  => 5,
				'price' => 1000, // per menit
                'thumb_facility' => 'vga-card.jpg',
			],
            [
				'name_facility' => 'Tripod',
				'qty_facility'  => 8,
				'price' => 100, // per menit
                'thumb_facility' => 'tripod.png',
			],
            [
				'name_facility' => 'Kamera DSLR',
				'qty_facility'  => 20,
				'price' => 2000, // per menit
                'thumb_facility' => 'kamera-dslr.jpg',
			],
            [
				'name_facility' => 'Proyektor',
				'qty_facility'  => 5,
				'price' => 1000, // per menit
                'thumb_facility' => 'proyektor.jpg',
			],
            [
				'name_facility' => 'Mikrotik Router AP',
				'qty_facility'  => 15,
				'price' => 1500, // per menit
                'thumb_facility' => 'mikrotik-routerap.jpg',
			],
            [
				'name_facility' => 'Switch',
				'qty_facility'  => 12,
				'price' => 1000, // per menit
                'thumb_facility' => 'switch.jpg',
			],
            [
				'name_facility' => 'CD Instalasi Debian',
				'qty_facility'  => 20,
				'price' => 100, // per menit
                'thumb_facility' => 'cd-debian.jpg',
			],
		];

		foreach($news_data as $data){
			$this->db->table('facilities')->insert($data);
		}
    }
}
