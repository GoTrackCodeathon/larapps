<?php

use Faker\Generator as Faker;

$factory->define(App\Kasus::class, function (Faker $faker) {
    return [
        'title'       => $faker->sentence,
        'description' => $faker->paragraph,
    ];
});
