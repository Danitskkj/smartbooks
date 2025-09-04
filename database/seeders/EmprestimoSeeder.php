<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Emprestimo;
use App\Models\Livro;
use App\Models\User;

class EmprestimoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $emprestimos = [
            [
                'livro_titulo' => 'Dom Casmurro',
                'usuario_email' => 'ana.oliveira@email.com',
                'data_retirada' => '2025-08-12',
                'data_devolucao' => '2025-08-26',
                'status' => 'devolvido',
            ],
            [
                'livro_titulo' => '1984',
                'usuario_email' => 'bruno.costa@email.com',
                'data_retirada' => '2025-08-20',
                'data_devolucao' => null,
                'status' => 'pendente',
            ],
            [
                'livro_titulo' => 'A Metamorfose',
                'usuario_email' => 'carla.dias@email.com',
                'data_retirada' => '2025-08-25',
                'data_devolucao' => '2025-09-03',
                'status' => 'devolvido',
            ],
            [
                'livro_titulo' => 'O Pequeno Príncipe',
                'usuario_email' => 'daniel.martins@email.com',
                'data_retirada' => '2025-08-28',
                'data_devolucao' => null,
                'status' => 'pendente',
            ],
            [
                'livro_titulo' => 'Cem Anos de Solidão',
                'usuario_email' => 'ana.oliveira@email.com',
                'data_retirada' => '2025-09-02',
                'data_devolucao' => null,
                'status' => 'pendente',
            ],
            [
                'livro_titulo' => 'O Sol é Para Todos',
                'usuario_email' => 'elena.ferreira@email.com',
                'data_retirada' => '2025-08-15',
                'data_devolucao' => '2025-08-30',
                'status' => 'devolvido',
            ],
            [
                'livro_titulo' => 'Crime e Castigo',
                'usuario_email' => 'bruno.costa@email.com',
                'data_retirada' => '2025-09-01',
                'data_devolucao' => null,
                'status' => 'pendente',
            ],
        ];

        foreach ($emprestimos as $emprestimoData) {
            $livro = Livro::where('titulo', $emprestimoData['livro_titulo'])->first();
            $usuario = User::where('email', $emprestimoData['usuario_email'])->first();

            if ($livro && $usuario) {
                Emprestimo::create([
                    'livro_id' => $livro->id,
                    'user_id' => $usuario->id,
                    'data_retirada' => $emprestimoData['data_retirada'],
                    'data_devolucao' => $emprestimoData['data_devolucao'],
                    'status' => $emprestimoData['status'],
                ]);
            }
        }
    }
}
