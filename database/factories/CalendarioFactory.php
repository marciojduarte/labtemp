<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\Calendario;
use Faker\Generator as Faker;

$factory->define(Calendario::class, function (Faker $faker) {
    return [
        //'data' => $faker->date($format = 'Y-m-d', $min = 'now'),
        'data' => $faker->dateTimeBetween($startDate = 'now', $endDate = '12 month'),
        'convenio_id' => $faker->numberBetween($min = 1, $max = 4),
        'atendimento'=> $faker->numberBetween($min = 5, $max = 10),
        'limite'=> $faker->numberBetween($min = 1, $max = 5)
    ];
});


