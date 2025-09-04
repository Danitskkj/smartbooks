<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Autor;

class AutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $autores = [
            [
                'nome' => 'Franz Kafka',
                'nacionalidade' => 'Austro-húngara (Tcheco)',
                'ano_nascimento' => 1883,
            ],
            [
                'nome' => 'Miguel de Cervantes',
                'nacionalidade' => 'Espanhola',
                'ano_nascimento' => 1547,
            ],
            [
                'nome' => 'George Orwell',
                'nacionalidade' => 'Britânica',
                'ano_nascimento' => 1903,
            ],
            [
                'nome' => 'Gabriel García Márquez',
                'nacionalidade' => 'Colombiana',
                'ano_nascimento' => 1927,
            ],
            [
                'nome' => 'Machado de Assis',
                'nacionalidade' => 'Brasileira',
                'ano_nascimento' => 1839,
            ],
            [
                'nome' => 'Fiódor Dostoiévski',
                'nacionalidade' => 'Russa',
                'ano_nascimento' => 1821,
            ],
            [
                'nome' => 'Jane Austen',
                'nacionalidade' => 'Britânica',
                'ano_nascimento' => 1775,
            ],
            [
                'nome' => 'F. Scott Fitzgerald',
                'nacionalidade' => 'Norte-americana',
                'ano_nascimento' => 1896,
            ],
            [
                'nome' => 'Antoine de Saint-Exupéry',
                'nacionalidade' => 'Francesa',
                'ano_nascimento' => 1900,
            ],
            [
                'nome' => 'Harper Lee',
                'nacionalidade' => 'Norte-americana',
                'ano_nascimento' => 1926,
            ],
        ];

        foreach ($autores as $autorData) {
            Autor::create($autorData);
        }
    }
}
