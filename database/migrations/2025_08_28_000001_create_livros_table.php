<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            // Usar smallint pois o year permite valores apenas de 1901 a 2155
            $table->unsignedSmallInteger('ano_publicacao');
            $table->string('genero');
            $table->unsignedInteger('quantidade_disponivel');
            $table->foreignId('autor_id')->constrained('autores')->cascadeOnDelete(); // Se um autor for excluído, seus livros também serão excluídos
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
