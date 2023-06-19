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
        Schema::create('inservivel', function (Blueprint $table) {
            $table->id();
            $table->integer('id_protocolo_tombamento');
            $table->string('marca', 50);
            $table->string('modelo', 50);
            $table->string('serie', 50);
            $table->integer('tipo_problema');
            $table->integer('diretoria_id');
            $table->integer('setor_id');
            $table->timestamps();
            $table->integer('id_equipamento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inservivel');
    }
};
