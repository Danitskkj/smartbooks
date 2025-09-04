<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Livro;
use App\Models\Autor;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $livrosInfo = [
            [
                'titulo' => 'A Metamorfose',
                'genero' => 'Novela / Ficção Absurda',
                'autor_nome' => 'Franz Kafka',
                'ano_publicacao' => 1915,
                'quantidade_disponivel' => 7,
                'descricao' => 'Um caixeiro-viajante acorda certa manhã transformado num inseto monstruoso. A Metamorfose é uma das obras mais influentes de Kafka.',
            ],
            [
                'titulo' => 'Dom Quixote de la Mancha',
                'genero' => 'Romance / Sátira',
                'autor_nome' => 'Miguel de Cervantes',
                'ano_publicacao' => 1605,
                'quantidade_disponivel' => 5,
                'descricao' => 'Considerado o primeiro romance moderno e uma das maiores obras da literatura mundial.',
            ],
            [
                'titulo' => '1984',
                'genero' => 'Distopia / Ficção Científica',
                'autor_nome' => 'George Orwell',
                'ano_publicacao' => 1949,
                'quantidade_disponivel' => 9,
                'descricao' => 'Romance distópico que retrata um futuro totalitário onde o governo exerce vigilância extrema sobre a população.',
            ],
            [
                'titulo' => 'Cem Anos de Solidão',
                'genero' => 'Realismo Mágico',
                'autor_nome' => 'Gabriel García Márquez',
                'ano_publicacao' => 1967,
                'quantidade_disponivel' => 6,
                'descricao' => 'Obra-prima do realismo mágico que narra a história da família Buendía ao longo de sete gerações.',
            ],
            [
                'titulo' => 'Dom Casmurro',
                'genero' => 'Romance / Realismo',
                'autor_nome' => 'Machado de Assis',
                'ano_publicacao' => 1899,
                'quantidade_disponivel' => 8,
                'descricao' => 'Um dos principais romances da literatura brasileira, conta a história de Bentinho e Capitu.',
            ],
            [
                'titulo' => 'Crime e Castigo',
                'genero' => 'Romance Psicológico',
                'autor_nome' => 'Fiódor Dostoiévski',
                'ano_publicacao' => 1866,
                'quantidade_disponivel' => 4,
                'descricao' => 'Romance que explora os aspectos psicológicos de um crime e suas consequências para o protagonista.',
            ],
            [
                'titulo' => 'Orgulho e Preconceito',
                'genero' => 'Romance',
                'autor_nome' => 'Jane Austen',
                'ano_publicacao' => 1813,
                'quantidade_disponivel' => 7,
                'descricao' => 'Romance clássico que explora temas de classe social, casamento e moralidade na Inglaterra do século XIX.',
            ],
            [
                'titulo' => 'O Grande Gatsby',
                'genero' => 'Romance / Modernismo',
                'autor_nome' => 'F. Scott Fitzgerald',
                'ano_publicacao' => 1925,
                'quantidade_disponivel' => 5,
                'descricao' => 'Um retrato crítico da sociedade americana dos anos 1920, explorando temas como decadência, idealismo e excesso.',
            ],
            [
                'titulo' => 'O Pequeno Príncipe',
                'genero' => 'Novela / Fábula',
                'autor_nome' => 'Antoine de Saint-Exupéry',
                'ano_publicacao' => 1943,
                'quantidade_disponivel' => 10,
                'descricao' => 'Uma das obras mais traduzidas do mundo, conta a história de um pequeno príncipe que viaja por diferentes planetas.',
            ],
            [
                'titulo' => 'O Sol é Para Todos',
                'genero' => 'Romance',
                'autor_nome' => 'Harper Lee',
                'ano_publicacao' => 1960,
                'quantidade_disponivel' => 6,
                'descricao' => 'Romance que aborda questões de racismo e injustiça no sul dos Estados Unidos durante os anos 1930.',
            ],
        ];

        foreach ($livrosInfo as $livroInfo) {
            $autor = Autor::where('nome', $livroInfo['autor_nome'])->first();
            
            if ($autor) {
                Livro::create([
                    'titulo' => $livroInfo['titulo'],
                    'genero' => $livroInfo['genero'],
                    'autor_id' => $autor->id,
                    'ano_publicacao' => $livroInfo['ano_publicacao'],
                    'quantidade_disponivel' => $livroInfo['quantidade_disponivel'],
                ]);
            }
        }
    }
}
