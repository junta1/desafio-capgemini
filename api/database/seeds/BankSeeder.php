<?php

use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bank')->insert([
            'bank_name' => 'Nubank',
            'bank_code' => 260,
        ]);
    }
}
