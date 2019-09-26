<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'name' => 'Nguyen Van A',
                'email' => 'nguyenvana@gmail.com',
                'password' => bcrypt('123456'),
                'gender' =>'nam',
                'phone'=>'0123456789',
                'address'=>'Da Nang',
                'note'=>'',
                'role_id'=>'1'
            ],
            [
                'name' => 'Tran Thi B',
                'email' => 'tranthib@gmail.com',
                'gender' =>'nu',
                'password' => bcrypt('123456'),
                'phone'=>'01489546',
                'address'=>'Quang Nam',
                'note'=>'',
                'role_id'=>'2'
            ]
        ];

        DB::table('users')->insert($dataInsert);
    }
}
