<?php

use Illuminate\Database\Seeder;

class DetailProductsTableSeeder extends Seeder
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
                'name'=>'Áo Thun Nam',
                'description'=>'mát mẻ thoải mái ',
                'image'=>'22.jpg'
            ],
            [
                'name'=>'Áo Sơ Mi Nam',
                'description'=>'lịch sự thoải mái ',
                'image'=>'22.jpg'
            ],
            [
                'name'=>'Áo Khoác Nam',
                'description'=>'ấm áp nam tính thoải mái ',
                'image'=>'23.jpg'
            ],
            [
                'name'=>'Quần Nam',
                'description'=>'phong cách ,nam tính,thoải mái ',
                'image'=>'24.jpg'
            ]
        ];

        DB::table('detailproducts')->insert($dataInsert);
    }
}
