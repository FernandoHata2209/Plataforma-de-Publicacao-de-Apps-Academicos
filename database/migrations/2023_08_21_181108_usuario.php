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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('email');
            $table->string('cargo');
            $table->string('senha');
            $table->integer('qtd_Postagens')->nullable();
            $table->string('curso')->nullable();
            $table->integer('matricula')->nullable();
            $table->binary('imagem')->nullable();
            $table->boolean('perfil_completo');
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
