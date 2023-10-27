<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evento_carreras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_evento');
            $table->date('fecha_evento');
            $table->string('cronograma');
            $table->string('foto_ruta');
            $table->text('descripcion');
            $table->text('ubicacion');
            $table->bigInteger('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')
            ->on('categorias');
            $table->bigInteger('carrera_id')->unsigned();
            $table->foreign('carrera_id')->references('id')
            ->on('carreras');
            $table->string('enable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evento_carreras');
    }
};
