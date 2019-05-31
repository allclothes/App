<?php

$factory->define(App\Models\Store::class, function(\Faker\Generator $faker) {
    return [
        'description' => $faker->text,        
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'name' => function (array $post) {
            return App\User::find($post['user_id'])->storename;
        },
        'profileimg'    => $faker->randomElement([           
            'pi-1.jpg',
            'pi-2.jpg',
            'pi-3.jpg',
            'pi-4.jpg',
            'pi-5.jpg',
            'pi-6.jpg',
            'pi-7.jpg',
            'pi-8.jpg',
            'pi-9.jpg',
            'pi-10.jpg',
            'pi-11.jpg',
            'pi-12.jpg',
            'pi-13.jpg',
            'pi-14.jpg',
            'pi-15.jpg'
        ]),
        'backgroundimg'     => $faker->randomElement([
            'bi-1.jpg',
            'bi-2.jpg',
            'bi-3.jpg',
            'bi-4.png',
        ]),
        'instagram'     => '@'.$faker->unique()->text($maxNbChars = 10),
        'facebook'      => 'facebook.com/'.$faker->unique()->text($maxNbChars = 10),
    ];
});
function urlProduct($name){
    $x = str_replace(' ', '-', $name);
    $x = str_replace('.', '', $x);
    $x = strtolower($x);
    return $x;
}
$factory->define(App\Models\Product::class, function(\Faker\Generator $faker) {
    

    return [
        'name'      => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'url'       => urlProduct($faker->unique()->text($maxNbChars = 10)),
        'amount'    => $faker->numberBetween(1,100),
        'cost'      => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 400),
        'category'    => $faker->randomElement(['roupa', 'banho', 'eletronicos', 'casa', 'estimacao']),
        'images'   => $faker->randomElement([
            '["b1.jpg", "b2.jpg", "b3.jpg"]', 
            '["c1.jpg", "c2.jpg", "c3.jpg"]', 
            '["adidas 1.jpg", "adidas 2.jpg", "adidas 3.jpg"]', 
            '["barcelona 1.jpg", "barcelona 2.jpg", "barcelona 3.jpg"]', 
            '["e1.jpg", "e2.jpg", "e3.jpg"]', 
            '["r1.jpg", "r2.jpg", "r3.jpg"]', 
            '["nike 1.jpg", "nike 2.jpg", "nike 3.jpg"]', 
        ]),
        'description'=> $faker->sentence($nbWords = 3, $variableNbWords = true),       
    ];
});
