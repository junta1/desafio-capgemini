<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\Bank\Models\AccountModel::class, function (Faker $faker) {

    $client = DB::table('client')->pluck('clie_id');
    $bank = DB::table('bank')->pluck('bank_id');

    return [
        'acco_agency' => $faker->numberBetween(0000, 9999),
        'acco_account' => $faker->numberBetween(00000000, 99999999),
        'acco_balance' => $faker->randomFloat(2, 10, 12),
        'cod_client' => $faker->randomElement($client),
        'cod_bank' => $faker->randomElement($bank),
    ];
});
