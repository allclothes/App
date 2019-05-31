<?php

use Faker\Generator as Faker;
    
$factory->define(App\Models\Vines::class, function(\Faker\Generator $faker) {
    return [
        'type'      => 0,
        'link'      => $faker->randomElement(['1535030683.jpg', '1535030694.jpg', '1535030702.jpg', '1535030718.jpg', '1535528848.png', '1535030742.jpg', '1534998203.png']),
        'server'    => $faker->randomElement(['Impera', 'Talera', 'Inabra', 'Nefera', 'Premia', 'Antica', 'Celesta']),
        'playmode'  => $faker->randomElement(['PvP', 'PvM']),
        'pvptype'   => $faker->randomElement(['Open PvP', 'Optional PvP']),
        'description'=> $faker->sentence($nbWords = 3, $variableNbWords = true),
        'view'      => 0,
        'comments'  => 0,
        'likes'     => 0
    ];
});