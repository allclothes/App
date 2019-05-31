<?php

use Faker\Generator as Faker;

    
$factory->define(App\Models\Canal::class, function(\Faker\Generator $faker) {
    return [
        'description' => $faker->sentence($nbWords = 3, $variableNbWords = true),        
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'name' => function (array $post) {
            return App\User::find($_post['user_id'])->channel_name;
        },
        'keycode'       => 'TibiaVines.com/'.$_post['name']
    ];
});


