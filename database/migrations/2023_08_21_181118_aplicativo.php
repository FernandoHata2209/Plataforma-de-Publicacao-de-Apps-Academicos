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
        Schema::create('aplicativo', function (Blueprint $table) {
            $table->id();
            $table->string('nome_Aplicativo');
            $table->string('criador');
            $table->boolean('aprovacao_Projeto');
            $table->integer('qtd_Curtidas');
            $table->binary('imagem');
            $table->string('descricao');
            $table->string('tipo_Postagem');
            $table->string('link_Projeto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
