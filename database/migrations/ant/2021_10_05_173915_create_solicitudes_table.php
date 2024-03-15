<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('nro_solicitud');
            $table->string('cod_tipo_solicitud')->nullable();
            $table->string('nom_tipo_solicitud')->nullable();
            $table->date('fecha_solicitud')->nullable();
            $table->text('des_solicitud')->nullable();
            $table->string('cod_estado_solicitud')->nullable();
            $table->string('nom_estado_solicitud')->nullable();
            $table->string('cod_inmueble')->nullable();

            $table->string('motivo_solicitud')->nullable();
            $table->string('tipo_solicitante')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->datetime('fecha_agendamiento')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('solicitudes');
    }
}
