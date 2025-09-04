<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'ano_publicacao',
        'genero',
        'quantidade_disponivel',
        'autor_id',
    ];

    // Um livro pertence a um autor
    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    // Um livro pode ter muitos empréstimos
    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }
}
