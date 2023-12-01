<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplicativo extends Model
{
    use HasFactory;

    protected $table = 'aplicativos';

    public function criadorRelacao()
    {
        return $this->belongsTo(Usuario::class, 'criador', 'id');
    }

    public function comentarios()
    {
        return $this->hasMany(comentarios_Aplicativo::class);
    }

    protected $fillable = [
        'nome_Aplicativo',
        'id',
        'criador',
        'aprovacao_Projeto',
        'qtd_Curtidas',
        'qtd_Comentarios',
        'media',
        'arquivo',
        'descricao',
        'tipo',
        'link_Projeto',
        'status',
    ];
}
