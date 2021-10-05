<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembrosDoTerritorio extends Model
{
    use HasFactory;

    protected $table = 'membros_do_territorio';
    public $timestamps = true;

    protected $fillable = [
        'Nome',
        'Sobrenome',
        'DataNascimento',
        'Sexo',
        'Email',
        'Telefone',
    ];
}
