<?php

use Illuminate\Database\Seeder;
use App\Seriales;

class SerialesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Seriales::class, 20000)->create();
    }
}
