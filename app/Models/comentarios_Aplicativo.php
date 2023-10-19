<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comentarios_Aplicativo extends Model
{
    use HasFactory;

    protected $table = 'comentarios_aplicativo';

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id');
    }

    public function aplicativo()
    {
        return $this->belongsTo(Aplicativo::class, 'id');
    }

    protected $fillable = [
        'id_Aplicativo',
        'id_Usuario',
        'comentario'
    ];
}
