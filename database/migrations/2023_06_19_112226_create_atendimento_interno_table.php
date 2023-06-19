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
        Schema::create('atendimento_interno', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->integer('funcionario');
            $table->integer('setor');
            $table->string('problema', 255);
            $table->string('solucao', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atendimento_interno');
    }
};
