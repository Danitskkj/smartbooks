<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Autor;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index(Request $request)
    {
        $query = Livro::with('autor');

        if ($request->filled('titulo')) {
            $query->where('titulo', 'like', '%'.$request->titulo.'%');
        }
        if ($request->filled('autor_id')) {
            $query->where('autor_id', $request->autor_id);
        }
        if ($request->filled('genero')) {
            $query->where('genero', 'like', '%'.$request->genero.'%');
        }

        $livros = $query->orderBy('titulo')->paginate(10)->withQueryString();
        $autores = Autor::orderBy('nome')->get();

        return view('livros.index', compact('livros', 'autores'));
    }

    public function create()
    {
        $autores = Autor::orderBy('nome')->get();
        return view('livros.create', compact('autores'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'ano_publicacao' => 'required|digits:4|integer|min:1000',
            'genero' => 'required|string|max:100',
            'quantidade_disponivel' => 'required|integer|min:0',
            'autor_id' => 'required|exists:autores,id',
        ]);
        Livro::create($data);
        return redirect()->route('livros.index')->with('success', 'Livro cadastrado.');
    }

    public function show(Livro $livro)
    {
        return view('livros.show', compact('livro'));
    }

    public function edit(Livro $livro)
    {
        $autores = Autor::orderBy('nome')->get();
        return view('livros.edit', compact('livro', 'autores'));
    }

    public function update(Request $request, Livro $livro)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'ano_publicacao' => 'required|digits:4|integer|min:1000',
            'genero' => 'required|string|max:100',
            'quantidade_disponivel' => 'required|integer|min:0',
            'autor_id' => 'required|exists:autores,id',
        ]);
        $livro->update($data);
        return redirect()->route('livros.index')->with('success', 'Livro atualizado.');
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();
        return redirect()->route('livros.index')->with('success', 'Livro removido.');
    }
}
