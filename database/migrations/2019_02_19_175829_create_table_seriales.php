<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSeriales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seriales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('serie_dec');
            $table->string('serie_hex');
            $table->string('tipo_solicitud');
            $table->string('estatus_solicitud');
            $table->date('fecha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seriales');
    }
}
