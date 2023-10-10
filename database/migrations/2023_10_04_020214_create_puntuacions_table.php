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
        Schema::create('puntuacions', function (Blueprint $table) {
            $table->id();
            $table->string('puntaje');
            $table->bigInteger('persona_id')->unsigned();
            $table->bigInteger('evento_id')->unsigned();
            $table->foreign('persona_id')->references('id')
            ->on('personas')->onDelete('cascade');
            $table->foreign('evento_id')->references('id')
            ->on('eventos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puntuacions');
    }
};
