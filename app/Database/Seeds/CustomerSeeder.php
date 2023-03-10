<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;
use App\Models\CustomerModel;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $generator = new Fabricator(CustomerModel::class, null, 'id_ID');
        $generator->setOverrides(['deleted_at' => null])->create(50);
    }
}
