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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_evento');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('foto_ruta');
            $table->text('descripcion');
            $table->text('ubicacion');
            $table->bigInteger('categoria_id')->unsigned();
            $table->bigInteger('facultad_id')->unsigned()->nullable();
            $table->bigInteger('carrera_id')->unsigned()->nullable();
            $table->bigInteger('personal_id')->unsigned()->nullable();
            $table->foreign('categoria_id')->references('id')
            ->on('categorias');
            $table->foreign('facultad_id')->references('id')
            ->on('facultads');
            $table->foreign('carrera_id')->references('id')
            ->on('carreras');
            $table->foreign('personal_id')->references('id')
            ->on('personals');
            $table->string('enable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
