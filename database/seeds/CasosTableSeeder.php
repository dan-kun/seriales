<?php

use Illuminate\Database\Seeder;
use App\Caso;

class CasosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Caso::class, 2000)->create();
    }
}
