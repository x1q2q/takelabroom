<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestSeeder extends Seeder
{
    public function run()
    {
        $this->call('Admins');
        $this->call('Users');
        $this->call('Categories');
        $this->call('Facilities');
        $this->call('CodeFacilities');
        $this->call('Labrooms');
        $this->call('Reservations');
        $this->call('Orders');
    }
}
