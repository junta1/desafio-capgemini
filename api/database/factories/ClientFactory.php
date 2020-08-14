<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\Bank\Models\ClientModel::class, function (Faker $faker) {
    return [
        'clie_name' => $faker->name,
        'clie_phone' => $faker->phoneNumber,
        'clie_cpf' => $faker->numberBetween(00000000000, 99999999999),
    ];
});
