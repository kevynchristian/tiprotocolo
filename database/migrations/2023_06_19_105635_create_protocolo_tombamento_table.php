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
        Schema::create('protocolo_tombamento', function (Blueprint $table) {
            $table->id();
            $table->integer('id_protocolo');
            $table->boolean('prioridade');
            $table->string('tombamento', 100);
            $table->integer('tipo');
            $table->string('acessorios', 500);
            $table->integer('local');
            $table->string('desc', 500);
            $table->integer('status');
            $table->string('solucao', 255);
            $table->string('historico', 255);
            $table->integer('id_responsavel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('protocolo_tombamento');
    }
};
