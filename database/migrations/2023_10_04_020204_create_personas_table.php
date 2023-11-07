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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('primer_nombre');
            $table->string('segundo_nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->bigInteger('ci');
            $table->date('fecha_nacimiento');
            $table->unsignedBigInteger('personal_id')->unsigned()->nullable();
            $table->unsignedBigInteger('facultad_id')->unsigned()->nullable();
            $table->unsignedBigInteger('carrera_id')->unsigned()->nullable();
            $table->foreign('personal_id')->references('id')
            ->on('personals');
            $table->foreign('facultad_id')->references('id')
            ->on('facultads');
            $table->foreign('carrera_id')->references('id')
            ->on('carreras');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
