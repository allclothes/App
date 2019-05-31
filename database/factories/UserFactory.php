<?php

use Faker\Generator as Faker;

function storename($name){
    $x = str_replace(' ', '-', $name);
    $x = strtolower($x);
    $x = str_replace('.', '', $x);
    return $x.'Store';
}

$factory->define(App\User::class, function (Faker $faker) {
    return [
            'name'          => $faker->firstName,
            'lastname'      => $faker->lastName,
            'username'      => $faker->unique()->userName,
            'email'         => $faker->unique()->safeEmail,
            'birthday'      => "04/07/1996",
            "sex"           => $faker->randomElement(['male', 'female']),
            'storename'     => storename($faker->unique()->text($maxNbChars = 10)),
            'balance'       => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 400),
            'cpf'           => $faker->unique()->numberBetween($min = 10000000000, $max = 99999999999),
            'password'      => bcrypt('BHU*nji9'),      
    ];
});
