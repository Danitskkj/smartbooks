<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Livro;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmprestimoController extends Controller
{
    public function index(Request $request)
    {
        $query = Emprestimo::with(['livro.autor', 'usuario']);

        if ($request->filled('livro')) {
            $query->whereHas('livro', function($q) use ($request) {
                $q->where('titulo', 'like', '%' . $request->livro . '%');
            });
        }

        if ($request->filled('usuario')) {
            $query->whereHas('usuario', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->usuario . '%')
                  ->orWhere('email', 'like', '%' . $request->usuario . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $emprestimos = $query->orderByDesc('created_at')->paginate(10);

        return view('emprestimos.index', compact('emprestimos'));
    }

    public function create()
    {
        $livros = Livro::orderBy('titulo')->get();
        $usuarios = User::orderBy('name')->get();
        return view('emprestimos.create', compact('livros', 'usuarios'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'livro_id' => 'required|exists:livros,id',
            'user_id' => 'required|exists:users,id',
            'data_retirada' => 'required|date',
            'data_devolucao' => 'nullable|date|after_or_equal:data_retirada',
            'status' => 'required|in:pendente,devolvido',
        ]);
        Emprestimo::create($data);
        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo registrado.');
    }

    public function show(Emprestimo $emprestimo)
    {
        // Load the user with their loans to prevent the error
        $emprestimo->load(['usuario.emprestimos', 'livro.autor']);
        return view('emprestimos.show', compact('emprestimo'));
    }

    public function edit(Emprestimo $emprestimo)
    {
        $livros = Livro::orderBy('titulo')->get();
        $usuarios = User::orderBy('name')->get();
        return view('emprestimos.edit', compact('emprestimo', 'livros', 'usuarios'));
    }

    public function update(Request $request, Emprestimo $emprestimo)
    {
        $data = $request->validate([
            'livro_id' => 'required|exists:livros,id',
            'user_id' => 'required|exists:users,id',
            'data_retirada' => 'required|date',
            'data_devolucao' => 'nullable|date|after_or_equal:data_retirada',
            'status' => 'required|in:pendente,devolvido',
        ]);
        $emprestimo->update($data);
        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo atualizado.');
    }

    public function destroy(Emprestimo $emprestimo)
    {
        $emprestimo->delete();
        return redirect()->route('emprestimos.index')->with('success', 'Empréstimo removido.');
    }
}
