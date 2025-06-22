<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DespesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = \App\Models\Despesa::with('categoria');

        if ($request->filled('busca')) {
            $busca = $request->input('busca');
            $query->where('desdescricao', 'like', "%{$busca}%");
        }

        if ($request->filled('catcodigo')) {
            $query->where('catcodigo', $request->catcodigo);
        }

        $despesas = $query->paginate(10);

        $categorias = \App\Models\Categoria::all();

        return view('despesas.index', compact('despesas', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = \App\Models\Categoria::all();
        return view('despesas.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'desdescricao' => 'required|string|max:255',
            'desvalor' => 'required|numeric',
            'desdata' => 'required|date',
            'catcodigo' => 'required|exists:tbcategorias,catcodigo',
        ]);

        \App\Models\Despesa::create([
            'desdescricao' => $request->desdescricao,
            'desvalor' => $request->desvalor,
            'desdata' => $request->desdata,
            'catcodigo' => $request->catcodigo,
        ]);

        return redirect()->route('despesas.index')->with('success', 'Despesa cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $despesa = \App\Models\Despesa::findOrFail($id);
        $categorias = \App\Models\Categoria::all();
        return view('despesas.edit', compact('despesa', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'desdescricao' => 'required|string|max:255',
            'desvalor' => 'required|numeric',
            'desdata' => 'required|date',
            'catcodigo' => 'required|exists:tbcategorias,catcodigo',
        ]);

        $despesa = \App\Models\Despesa::findOrFail($id);
        $despesa->update([
            'desdescricao' => $request->desdescricao,
            'desvalor' => $request->desvalor,
            'desdata' => $request->desdata,
            'catcodigo' => $request->catcodigo,
        ]);

        return redirect()->route('despesas.index')->with('success', 'Despesa atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $despesa = \App\Models\Despesa::findOrFail($id);
        $despesa->delete();

        return redirect()->route('despesas.index')->with('success', 'Despesa excluída com sucesso!');
    }
}
