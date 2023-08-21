<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comentarios_Aplicativo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_Aplicativo',
        'id_Usuario',
        'comentario'
    ];
}
