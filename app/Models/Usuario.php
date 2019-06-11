<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'sexo',
        'cpf',
    ];

    protected $visible = ['*'];

    public function telefones()
    {
        return $this->hasMany(UsuarioTelefone::class);
    }
}
