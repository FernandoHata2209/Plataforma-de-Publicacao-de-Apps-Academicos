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
        Schema::create('aplicativos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_Aplicativo');
            $table->string('criador');
            $table->boolean('aprovacao_Projeto')->nullable();
            $table->integer('qtd_Curtidas')->nullable();
            $table->binary('imagem');
            $table->text('descricao');
            $table->string('tipo_Postagem')->nullable();
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
