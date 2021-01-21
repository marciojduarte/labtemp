<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\Agenda;
use Faker\Generator as Faker;

$factory->define(Agenda::class, function (Faker $faker) {
    return [
        'paciente_id'=> $faker->numberBetween($min = 1, $max = 16),
        'solicitante_id'=> $faker->numberBetween($min = 1, $max = 6),
        'convenio_id'=> $faker->numberBetween($min = 1, $max = 4),
        'user_id' => 1,
        'calendario_id'=> $faker->numberBetween($min = 1, $max = 50),
    ];
});
