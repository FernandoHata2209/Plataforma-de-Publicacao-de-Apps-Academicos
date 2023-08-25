<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplicativo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_Aplicativo',
        'id',
        'criador',
        'aprovacao_Projeto',
        'qtd_Curtidas',
        'Imagem',
        'Descricao',
        'tipo_Postagem',
        'link_Projeto',
    ];
}
