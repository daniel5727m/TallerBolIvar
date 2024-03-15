<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCostoDoblezsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costo_doblezs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('diametro_Tubo');
            $table->bigInteger('precio')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('costo_doblezs');
    }
}
