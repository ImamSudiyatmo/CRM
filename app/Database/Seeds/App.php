<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class App extends Seeder
{
    public function run()
    {
        $this->call('CustomerSeeder');
    }
}