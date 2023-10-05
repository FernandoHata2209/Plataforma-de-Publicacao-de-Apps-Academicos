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

    protected $fillable = [
        'nome_Aplicativo',
        'id',
        'criador',
        'aprovacao_Projeto',
        'qtd_Curtidas',
        'media',
        'descricao',
        'tipo',
        'link_Projeto',
        'status',
    ];
}
