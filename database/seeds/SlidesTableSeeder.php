<?php

use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
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

                'link'=>'',
                'image' => 'banner1.jpg',

            ],
            [
                'link'=>'',
                'image' => 'banner2.jpg',

            ]
            ,
            [
                'link'=>'',
                'image' => 'banner3.jpg',

            ]
        ];

        DB::table('slides')->insert($dataInsert);
    }
}
