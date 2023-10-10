<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curtida extends Model
{
    protected $fillable = ['aplicativo_id', 'usuario_id'];
    
    // Relacionamento com o Aplicativo
    public function aplicativo()
    {
        return $this->belongsTo(Aplicativo::class);
    }
    
    // Relacionamento com o Usuário que deu a curtida
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
