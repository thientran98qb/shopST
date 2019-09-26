<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
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
                'name' => 'admin',

            ],
            [
                'name' => 'customer',

            ]
        ];

        DB::table('roles')->insert($dataInsert);
    }
}
