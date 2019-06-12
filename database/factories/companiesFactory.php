<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->text(30),
        'key' => $faker->text(30),
        'description' => $faker->text (250),
        'image' => $faker->imageUrl(750, 300),
    ];
});
