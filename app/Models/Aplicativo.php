<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplicativo extends Model
{
    use HasFactory;

    protected $table = 'aplicativos';

    protected $fillable = [
        'nome_Aplicativo',
        'id',
        'criador',
        'aprovacao_Projeto',
        'qtd_Curtidas',
        'imagem',
        'descricao',
        'tipo_Postagem',
        'link_Projeto',
    ];
}
