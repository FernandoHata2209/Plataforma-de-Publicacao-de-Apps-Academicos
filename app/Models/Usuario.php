<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Model implements Authenticatable
{

    use HasFactory;

    protected $table = 'usuarios';

    public function getAuthIdentifierName()
    {
        return 'id'; // Substitua 'id' pelo nome do campo de identificação na tabela
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getAuthPassword()
    {
        return $this->senha; // Substitua 'senha' pelo nome do campo de senha na tabela
    }

    public function getRememberToken()
    {
        return $this->remember_token; // Substitua 'remember_token' pelo nome do campo de token de lembrança na tabela
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getRememberTokenName()
    {
        return 'remember_token'; // Substitua 'remember_token' pelo nome do campo de token de lembrança na tabela
    }

    public function aplicativos()
    {
        return $this->hasMany(Aplicativo::class, 'criador');
    }

    public function comentarios()
    {
        return $this->hasMany(comentarios_Aplicativo::class);
    }


    protected $fillable = [
        'nome',
        'sobrenome',
        'email',
        'senha',
        'id',
        'cargo',
        'qtd_Postagens',
        'curso',
        'matricula',
        'imagem',
    ];
}
