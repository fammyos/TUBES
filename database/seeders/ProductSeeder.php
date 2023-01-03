<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_product = [
            [
                'id' => '100',
                'name' => 'Iphone XII',
                'price' => 2500000,
                'stock' => 100,
                'type' => 'preOrder',
                'description' => 'Brand new Iphone XII',
                'manufacturer' => 'Apple'
            ],
            [
                'id' => '101',
                'name' => 'Iphone XI',
                'price' => 2000000,
                'stock' => 10,
                'type' => 'Exist',
                'description' => 'Brand new Iphone XII',
                'manufacturer' => 'Apple'
            ],
        ];


        $data_category = [
            [
                'product_id' => '100',
                'category' => 'Gold',
                'stock' => '100',
            ],
            [
                'product_id' => '101',
                'category' => 'Silver',
                'stock' => '10',
            ],
        ];


        $data_image = [
            [
                'product_id' => '100',
                'url_image' => asset('assets_user/img/ipro.png'),
            ],
            [
                'product_id' => '101',
                'url_image' => asset('assets_user/img/ipro.png'),
            ],
        ];

        DB::table('product')->insert($data_product);
        DB::table('product_category')->insert($data_category);
        DB::table('product_image')->insert($data_image);



    }
}
