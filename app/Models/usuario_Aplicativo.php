<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario_Aplicativo extends Model
{
    use HasFactory;

    protected $table = 'usuario_aplicativo';

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id');
    }

    public function aplicativo()
    {
        return $this->belongsTo(Aplicativo::class, 'id');
    }

    protected $fillable = [
        'id_Usuario',
        'id_Aplicativo',
    ];
}
