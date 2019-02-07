<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->unique();
            $table->integer('dni_id')->unsigned();
            $table->string('numero')->unique();
            $table->string('nombre');
            $table->string('genero')->nullable();
            $table->string('raza')->nullable();
            $table->string('estatura')->nullable();
            $table->string('peso')->nullable();
            $table->string('tipo_sangre')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('direccion')->nullable();
            $table->string('movil')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('nivel_academico')->nullable();
            $table->string('titulo_academico')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('religion')->nullable();
            $table->string('imagen')->nullable();
            $table->string('web_url')->nullable();
            $table->string('familiar_nombre')->nullable();
            $table->string('familiar_parentesco')->nullable();
            $table->string('familiar_telefono')->nullable();
            $table->string('observacion')->nullable();
            $table->string('created_by');
            $table->string('updated_by');
            $table->string('deleted_by');
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp('rowversion');

            $table->foreign('dni_id')->references('id')->on('dni');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
