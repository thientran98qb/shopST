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
                'name'=>'Áo Thun Có C?',
                'description'=>'',
                'unit_price'=>'200000',
                'promotion_price'=>'50000',
                'image'=>'1.jpg',
                'unit'=>'cai',
                'category_id'=>'1',
                'detail_id'=>'1',
            ],
            [
                'name'=>'Áo Thun In Hình',
                'description'=>'',
                'unit_price'=>'250000',
                'promotion_price'=>'40000',
                'image'=>'2.png',
                'unit'=>'cai',
                'category_id'=>'1',
                'detail_id'=>'1'
            ],
            [
                'name'=>'Áo Thun Nam H?a Ti?t',
                'description'=>'',
                'unit_price'=>'230000',
                'promotion_price'=>'35000',
                'image'=>'3.jpg',
                'unit'=>'cai',
                'category_id'=>'1',
                'detail_id'=>'1'
            ],
            [
                'name'=>'Áo Thun Nam Tay Dài',
                'description'=>'',
                'unit_price'=>'280000',
                'promotion_price'=>'20000',
                'image'=>'4.jpg',
                'unit'=>'cai',
                'category_id'=>'1',
                'detail_id'=>'1'
            ],
            [
                'name'=>'Áo Thun Nam Tron',
                'description'=>'',
                'unit_price'=>'180000',
                'promotion_price'=>'30000',
                'image'=>'5.png',
                'unit'=>'cai',
                'category_id'=>'1',
                'detail_id'=>'1'
            ],
            [
                'name'=>'Áo So Mi Nam Body',
                'description'=>'',
                'unit_price'=>'200000',
                'promotion_price'=>'50000',
                'image'=>'6.png',
                'unit'=>'cai',
                'category_id'=>'2',
                'detail_id'=>'2'
            ],
            [
                'name'=>'Áo So Mi Nam Caro',
                'description'=>'',
                'unit_price'=>'220000',
                'promotion_price'=>'20000',
                'image'=>'7.jpg',
                'unit'=>'cai',
                'category_id'=>'2',
                'detail_id'=>'2'
            ],
            [
                'name'=>'Áo So Mi Nam C? Tr?',
                'description'=>'',
                'unit_price'=>'315000',
                'promotion_price'=>'15000',
                'image'=>'8.jpg',
                'unit'=>'cai',
                'category_id'=>'2',
                'detail_id'=>'2'
            ],
            [
                'name'=>'Áo So Mi Nam H?a Ti?t',
                'description'=>'',
                'unit_price'=>'250000',
                'promotion_price'=>'15000',
                'image'=>'9.jpg',
                'unit'=>'cai',
                'category_id'=>'2',
                'detail_id'=>'2'
            ],
            [
                'name'=>'Áo So Mi Nam Tay Dài',
                'description'=>'',
                'unit_price'=>'355000',
                'promotion_price'=>'55000',
                'image'=>'10.jpg',
                'unit'=>'cai',
                'category_id'=>'2',
                'detail_id'=>'2'
            ],
            [
                'name'=>'Áo So Mi Nam Tay Ng?n',
                'description'=>'',
                'unit_price'=>'175000',
                'promotion_price'=>'25000',
                'image'=>'11.jpg',
                'unit'=>'cai',
                'category_id'=>'2',
                'detail_id'=>'2'
            ],
            [
                'name'=>'Áo So Mi Nam Tr?ng',
                'description'=>'',
                'unit_price'=>'305000',
                'promotion_price'=>'35000',
                'image'=>'12.jpg',
                'unit'=>'cai',
                'category_id'=>'2',
                'detail_id'=>'2'
            ],
            [
                'name'=>'Áo Khoác Dù',
                'description'=>'',
                'unit_price'=>'405000',
                'promotion_price'=>'35000',
                'image'=>'13.jpg',
                'unit'=>'cai',
                'category_id'=>'3',
                'detail_id'=>'3'
            ],
            [
                'name'=>'Áo Khoác Nam Bomber',
                'description'=>'',
                'unit_price'=>'450000',
                'promotion_price'=>'0',
                'image'=>'14.jpg',
                'unit'=>'cai',
                'category_id'=>'3',
                'detail_id'=>'3'
            ],
            [
                'name'=>'Hoodie',
                'description'=>'',
                'unit_price'=>'450000',
                'promotion_price'=>'0',
                'image'=>'15.jpg',
                'unit'=>'cai',
                'category_id'=>'3',
                'detail_id'=>'3'
            ],
            [
                'name'=>'Áo Vest Nam',
                'description'=>'',
                'unit_price'=>'550000',
                'promotion_price'=>'0',
                'image'=>'16.jpg',
                'unit'=>'cai',
                'category_id'=>'3',
                'detail_id'=>'3'
            ],
            [
                'name'=>'Qu?n Jean Nam',
                'description'=>'',
                'unit_price'=>'350000',
                'promotion_price'=>'50000',
                'image'=>'17.jpg',
                'unit'=>'cai',
                'category_id'=>'4',
                'detail_id'=>'4'
            ],
            [
                'name'=>'Qu?n Jogger Nam',
                'description'=>'',
                'unit_price'=>'250000',
                'promotion_price'=>'30000',
                'image'=>'18.jpg',
                'unit'=>'cai',
                'category_id'=>'4',
                'detail_id'=>'4'
            ],
            [
                'name'=>'Qu?n Kaki Nam',
                'description'=>'',
                'unit_price'=>'200000',
                'promotion_price'=>'0',
                'image'=>'19.png',
                'unit'=>'cai',
                'category_id'=>'4',
                'detail_id'=>'4'
            ],
            [
                'name'=>'Qu?n Short Nam',
                'description'=>'',
                'unit_price'=>'230000',
                'promotion_price'=>'0',
                'image'=>'20.png',
                'unit'=>'cai',
                'category_id'=>'4',
                'detail_id'=>'4'
            ],
            [
                'name'=>'Qu?n Tây Nam',
                'description'=>'',
                'unit_price'=>'300000',
                'promotion_price'=>'50000',
                'image'=>'21.png',
                'unit'=>'cai',
                'category_id'=>'4',
                'detail_id'=>'4'
            ],
        ];
        DB::table('products')->insert($dataInsert);
    }
}
