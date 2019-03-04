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
        'serie_dec' => mt_rand(50,200),
        'serie_hex' => $faker-> randomElement(['A10','B4','C45','23A','4CB','AB10','43C']),
        'tipo_solicitud' => $faker->randomElement(['Exclusión', 'Inclusión']),
        'estatus_solicitud' => $faker->randomElement(['Procesado', 'Por Procesar']),
        'fecha'=>$faker->date($format = 'Y-m-d', $max = 'now'),

    ];
});
