<?php

use App\Models\Empresa;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_empresa');
            $table->string('razon_social');
            $table->string('ruc');
            $table->string('direccion');
            $table->string('pagina_web')->nullable();
            $table->string('brochure_url');
            $table->string('contacto_nombre');
            $table->string('contacto_cargo');
            $table->string('contacto_telefono');
            $table->string('contacto_correo');
            $table->string('anos_experiencia');
            $table->string('sustento_experiencia_url')->nullable();
            $table->string('facturacion_2020_url')->nullable();
            $table->string('reporte_central_url')->nullable();
            $table->string('fecha_registro');
            $table->enum('propuesta_recepcionada', [Empresa::NO,Empresa::SI, Empresa::DEFAULT])->default(Empresa::DEFAULT);
            $table->enum('preseleccionado', [Empresa::NO,Empresa::SI, Empresa::DEFAULT])->default(Empresa::DEFAULT);
            $table->enum('seleccionado', [Empresa::NO,Empresa::SI, Empresa::DEFAULT])->default(Empresa::DEFAULT);
            $table->enum('resultado', [Empresa::NO,Empresa::SI, Empresa::DEFAULT])->default(Empresa::DEFAULT);
            $table->unsignedBigInteger('convocatorias_id');
            $table->foreign('convocatorias_id')->references('id')->on('convocatorias')->onDelete('cascade');
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
        Schema::dropIfExists('empresas');
    }
}
