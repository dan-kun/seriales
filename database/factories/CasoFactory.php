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

$factory->define(App\Caso::class, function (Faker $faker) {
    return [
        'num_caso' => 13,
        'cod_trasaccion' => 5,
        'solicitante' => $faker->name(),
        'lugar_ocurrencia' => str_random(10),
        'descripcion' => str_random(20),
        'status' => 'Procesado',

    ];
});
