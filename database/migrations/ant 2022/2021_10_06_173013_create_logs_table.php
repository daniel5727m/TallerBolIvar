<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
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
        Schema::drop('logs');
    }
}
