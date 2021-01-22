<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\AgendaExame;
use Faker\Generator as Faker;

$factory->define(AgendaExame::class, function (Faker $faker) {
    return [
        'exame_id'=>$faker->numberBetween($min = 1, $max = 620),
        'agenda_id' =>$faker->numberBetween($min = 1, $max = 50)
    ];
});
