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
        Schema::create('atendimento_escola', function (Blueprint $table) {
            $table->id();
            $table->boolean('prioridade');
            $table->boolean('finalizado');
            $table->date('inicio');
            $table->string('cor', 255);
            $table->string('titulo', 255);
            $table->integer('funcionario_abriu');
            $table->integer('funcionario_fez');
            $table->integer('escola');
            $table->string('solucao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atendimento_escola');
    }
};
