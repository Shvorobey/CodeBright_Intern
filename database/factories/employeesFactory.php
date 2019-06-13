<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Employee::class, function (Faker $faker) {
    return [
        'company_id' => $faker->numberBetween (1, 50),
        'first_name' => $faker->text(10),
        'last_name' => $faker->text(15),
    ];
});
