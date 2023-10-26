<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comentarios_Aplicativo extends Model
{
    use HasFactory;

    protected $table = 'comentarios_aplicativo';

    public function aplicativo()
    {
        return $this->belongsTo(Aplicativo::class);
    }

    // Relação muitos para um com Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    protected $fillable = [
        'aplicativo_id',
        'usuario_id',
        'comentario'
    ];
}
