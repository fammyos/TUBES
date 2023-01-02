<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Userseeder extends Seeder
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
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'status' => 'Admin',
                'password' => bcrypt('admin123'),
            ],
            [
                'name' => 'user',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'status' => 'User',
                'password' => bcrypt('user123'),
            ]
            ];
        //
        DB::table('users')->insert($data);
    }
}
