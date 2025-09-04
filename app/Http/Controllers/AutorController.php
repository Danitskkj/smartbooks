<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutorController extends Controller
{
    public function index(Request $request)
    {
        $query = Autor::query();

        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        if ($request->filled('nacionalidade')) {
            $query->where('nacionalidade', 'like', '%' . $request->nacionalidade . '%');
        }

        $autores = $query->orderBy('nome')->paginate(10);

        return view('autores.index', compact('autores'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'nacionalidade' => 'required|string|max:255',
            'ano_nascimento' => 'required|integer|min:1000',
        ]);

        Autor::create($request->all());

        return redirect()->route('autores.index')->with('success', 'Autor cadastrado com sucesso.');
    }

    public function show(Autor $autor)
    {
        return view('autores.show', compact('autor'));
    }

    public function edit(Autor $autor)
    {
        return view('autores.edit', compact('autor'));
    }

    public function update(Request $request, Autor $autor)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'nacionalidade' => 'required|string|max:255',
            'ano_nascimento' => 'required|integer|min:1000',
        ]);
        $autor->update($data);
        return redirect()->route('autores.index')->with('success', 'Autor atualizado com sucesso.');
    }

    public function destroy(Autor $autor)
    {
        $autor->delete();
        return redirect()->route('autores.index')->with('success', 'Autor excluído.');
    }
}
