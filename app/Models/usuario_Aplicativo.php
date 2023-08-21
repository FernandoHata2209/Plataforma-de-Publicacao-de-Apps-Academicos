<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario_Aplicativo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_Usuario',
        'id_Aplicativo',
    ];
}
