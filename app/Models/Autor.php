<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autores';

    protected $fillable = [
        'nome',
        'nacionalidade',
        'ano_nascimento',
    ];

    // Um autor possui vários livros
    public function livros()
    {
        return $this->hasMany(Livro::class);
    }
}