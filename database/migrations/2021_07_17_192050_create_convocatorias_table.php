<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvocatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convocatorias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('cantidad');
            $table->string('email')->nullable();
            $table->string('estado');
            $table->string('adjudicado')->nullable();
            $table->string('fecha_inicio');
            $table->string('fecha_bases')->nullable();
            $table->string('fecha_consulta')->nullable();
            $table->string('fecha_propuestas')->nullable();
            $table->string('fecha_fin')->nullable();
            $table->text('alcance')->nullable();
            $table->string('tdr_url')->nullable();
            $table->string('proceso_url')->nullable();
            $table->string('resultado_url')->nullable();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('convocatorias');
    }
}
