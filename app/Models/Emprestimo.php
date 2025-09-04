<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_retirada',
        'data_devolucao',
        'status',
        'livro_id',
        'user_id',
    ];

    // Um empréstimo possui um livro
    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

    // Um empréstimo pertence a um usuário
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
