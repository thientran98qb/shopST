<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataInsert = [
            [
                'name'=>'Áo Thun Nam'
            ],
            [
                'name'=>'Áo Sơ Mi Nam'
            ],
            [
                'name'=>'Áo Khoác Nam'
            ],
            [
                'name'=>'Quần Nam'
            ]
        ];

        DB::table('categories')->insert($dataInsert);
    }
}
