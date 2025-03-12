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
        Schema::create('alocao_pessoas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pessoa_id')->constrained('pessoas')->onDelete('cascade');
            $table->foreignId('sala_id')->constrained('salas')->onDelete('cascade');
            $table->foreignId('sala_cafe_id')->constrained('salas_cafe')->onDelete('cascade');
            $table->foreignId('etapa_id')->constrained('etapas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alocao_pessoas');
    }
};
