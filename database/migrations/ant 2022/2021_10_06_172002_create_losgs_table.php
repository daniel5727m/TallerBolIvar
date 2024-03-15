<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLosgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('losgs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('peticion_api')->nullable();
            $table->string('metodo_peticion')->nullable();
            $table->date('fecha')->nullable();
            $table->text('peticion')->nullable();
            $table->string('peticion')->nullable();
            $table->text('respuesta')->nullable();
            $table->string('exito')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('losgs');
    }
}
