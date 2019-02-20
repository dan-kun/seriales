<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Seriales::class, function (Faker $faker) {
    return [
        'serie_dec' => 11234,
        'serie_hex' => 'a45',
        'tipo_solicitud' => $faker->name(),
        'estatus_solicitud' => str_random(10),

    ];
});
