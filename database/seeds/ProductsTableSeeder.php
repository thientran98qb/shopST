<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataInsert=[
            [
                'name'=>'áo thun có cổ',
                'description'=>'',
                'unit_price'=>'200000',
                'promotion_price'=>'50000',
                'image'=>'1.jpg',
                'unit'=>'cai',
            ],
            [
                'name'=>'áo thun in hình',
                'description'=>'',
                'unit_price'=>'250000',
                'promotion_price'=>'40000',
                'image'=>'2.png',
                'unit'=>'cai',
            ],
            [
                'name'=>'áo thun nam họa tiết',
                'description'=>'',
                'unit_price'=>'230000',
                'promotion_price'=>'35000',
                'image'=>'3.jpg',
                'unit'=>'cai',
            ],
            [
                'name'=>'áo thun nam tay dài',
                'description'=>'',
                'unit_price'=>'280000',
                'promotion_price'=>'20000',
                'image'=>'4.jpg',
                'unit'=>'cai',
            ],
            [
                'name'=>'áo thun nam trơn',
                'description'=>'',
                'unit_price'=>'180000',
                'promotion_price'=>'30000',
                'image'=>'5.png',
                'unit'=>'cai',
            ],
            [
                'name'=>'áo sơ mi nam body',
                'description'=>'',
                'unit_price'=>'200000',
                'promotion_price'=>'50000',
                'image'=>'1.jpg',
                'unit'=>'cai',
            ],

        ];

    }
}
