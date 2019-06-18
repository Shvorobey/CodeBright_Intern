<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Company;

$factory->define(\App\Comment::class, function (Faker $faker) {
    return [
        'company_id' => $faker->numberBetween(1, 50),
        'body' => $faker->text(250),
        'name' => $faker->company,
    ];
});

