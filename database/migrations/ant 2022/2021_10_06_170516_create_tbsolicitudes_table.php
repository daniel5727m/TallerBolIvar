<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTbsolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbsolicitudes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('tipoTrabajo');
            $table->string('diametroTubo');
            $table->string('tipoMaterial');
            $table->string('espesor');
            $table->string('tamanoTubo');
            $table->string('haySoldadura')->nullable();
            $table->integer('numeroSoldadura')->nullable();
            $table->integer('numeroTubos')->nullable();
            $table->integer('numeroDobleces')->nullable();
            $table->integer('numeroCurvas')->nullable();
            $table->integer('numeroCortes')->nullable();
            $table->string('Plantilla')->nullable();
            $table->integer('ancho')->nullable();
            $table->integer('altura')->nullable();
            $table->integer('radio')->nullable();
            $table->integer('largo')->nullable();
            $table->string('incluyePasamanosSecundarios')->nullable();
            $table->integer('largoTotal')->nullable();
            $table->integer('largoParteRecta')->nullable();
            $table->integer('a')->nullable();
            $table->integer('b')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbsolicitudes');
    }
}
