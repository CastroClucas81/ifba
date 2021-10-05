<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    use HasFactory;

    protected $table = 'slides';
    public $timestamps = true;

    protected $fillable = [
        'NomeImagem',
        'EnderecoImagem',
        'DataInicio',
        'DataFim',
    ];
}
