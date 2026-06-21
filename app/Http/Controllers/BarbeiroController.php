<?php

namespace App\Http\Controllers;

use App\Models\Barbeiro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarbeiroController extends Controller
{
    public function index()
    {
        $barbeiros = Barbeiro::all();
        return view('barbeiros.index', compact('barbeiros'));
    }

    public function create()
    {
        return view('barbeiros.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:20',
            'especialidade' => 'nullable|string|max:100',
            'bio' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $dados['foto'] = $request->file('foto')->store('barbeiros', 'public');
        } else {
            $dados['foto'] = ''; // String vazia para evitar quebras de nulo se necessário
        }

        Barbeiro::create($dados);

        return redirect()->route('barbeiros.index')->with('sucesso', 'Barbeiro criado com sucesso!');
    }

    public function edit(Barbeiro $barbeiro)
    {
        return view('barbeiros.edit', compact('barbeiro'));
    }

    public function update(Request $request, Barbeiro $barbeiro)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:20',
            'especialidade' => 'nullable|string|max:100',
            'bio' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            if (!empty($barbeiro->foto) && Storage::disk('public')->exists($barbeiro->foto)) {
                Storage::disk('public')->delete($barbeiro->foto);
            }
            $dados['foto'] = $request->file('foto')->store('barbeiros', 'public');
        }

        $barbeiro->update($dados);

        return redirect()->route('barbeiros.index')->with('sucesso', 'Barbeiro atualizado com sucesso!');
    }

    public function destroy(Barbeiro $barbeiro)
    {
        if (!empty($barbeiro->foto) && Storage::disk('public')->exists($barbeiro->foto)) {
            Storage::disk('public')->delete($barbeiro->foto);
        }

        $barbeiro->delete();

        return redirect()->route('barbeiros.index')->with('sucesso', 'Barbeiro excluído com sucesso!');
    }
}