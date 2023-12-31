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
            $table->string('nombre');
            $table->string('apellido');
            $table->bigInteger('ci');
            $table->date('fecha_nacimiento');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('personal_id')->nullable();
            $table->unsignedBigInteger('carrera_id')->nullable();
            $table->foreign('personal_id')->references('id')
            ->on('personals')->onDelete('cascade');
            $table->foreign('carrera_id')->references('id')
            ->on('carreras')->onDelete('cascade');
            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');
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
