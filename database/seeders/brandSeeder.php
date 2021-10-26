<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class brandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('brands')->truncate();

        DB::table('brands')->insert([
            [
                'id'=>1,
                'name'=>'Apple',
                'description'=>'none'
            ],
            [
                'id'=>2,
                'name'=>'Samsung',
                'description'=>'none'
            ],
            [
                'id'=>3,
                'name'=>'Xiaomi',
                'description'=>'none'
            ],
            [
                'id'=>4,
                'name'=>'Oppo',
                'description'=>'none'
            ],
            [
                'id'=>5,
                'name'=>'Nokia',
                'description'=>'none'
            ],
            [
                'id'=>6,
                'name'=>'Realme',
                'description'=>'none'
            ],
            [
                'id'=>7,
                'name'=>'Asus',
                'description'=>'none'
            ],
            [
                'id'=>8,
                'name'=>'Vivo',
                'description'=>'none'
            ],
            [
                'id'=>9,
                'name'=>'Huawei',
                'description'=>'none'
            ]
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
