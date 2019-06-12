<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Company;

$factory->define(\App\Comment::class, function (Faker $faker) {
    return [
        'company_id' => $this->Company@getRandomCompanyId(),
        'body' => $faker->text (250),
    ];
});

