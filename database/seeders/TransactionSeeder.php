<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'user_id' => 2,
                'address' => 'Test',
                'city' => 'Bandung',
                'province' => 'Jawa Barat',
                'zip_code' => 14045,
                'total_price' => 4500000,
            ],
        ];


    }
}
