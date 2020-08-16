<?php

use Illuminate\Database\Seeder;

class TypeDriveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_drive')->insert([
            [
                'type_driv_name' => 'Saque'
            ],
            [
                'type_driv_name' => 'Depósito Recebido'
            ],
        ]);
    }
}
