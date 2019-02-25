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
        'num_caso' => mt_rand(1,100),
        'cod_trasaccion' => mt_rand(100,1000),
        'solicitante' => $faker->name(),
        'lugar_ocurrencia' => $faker->paragraph($nbSentences = 1, $variableNbSentences = true),
        'descripcion' => str_random(20),
        'status' => $faker-> randomElement(['Procesado','Por procesar']),
        'fecha'=>$faker->date($format = 'Y-m-d', $max = 'now'),

    ];
});
