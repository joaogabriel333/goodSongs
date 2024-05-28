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
        Schema::create('musicas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 120)->nullable(false);
            $table->integer('duracao')->nullable(false);
            $table->string('artista',120)->nullable(false);
            $table->string('genero',120 )->nullable(false);
            $table->string('nacionalidade',120)->nullable(false);
            $table->date('ano_lancamento')->nullable(false);
            $table->string('album',120)->nullable(true);
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musicas');
    }
};