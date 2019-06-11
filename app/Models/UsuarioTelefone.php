<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioTelefone extends Model
{
    protected $fillable = [
        'telefone',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
