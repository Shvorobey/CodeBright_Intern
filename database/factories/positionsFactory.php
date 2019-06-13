<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Position::class, function (Faker $faker) {
    return [
        'employee_id' => $faker->unique()->numberBetween (1, 201),
        'title' => $faker->randomElement(['HR', 'Manager', 'Lead engineer', 'Engineer' ]),
        'salary' => $faker->numberBetween (10000, 50000),
    ];
});
