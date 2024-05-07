<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'duracao',
        'artista',
        'genero',
        'nacionalidade',
        'ano_lancamento',
        'album'

    ];
}
