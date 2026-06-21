<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicoController extends Controller
{
    public function index()
    {
        $servicos = Servico::all();
        return view('servicos.index', compact('servicos'));
    }
    
    public function create()
    {
        return view('servicos.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'descricao' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $dados['foto'] = $request->file('foto')->store('servicos', 'public');
        } else {
            $dados['foto'] = ''; 
        }

        Servico::create($dados);
        return redirect()->route('servicos.index')->with('sucesso', 'Serviço criado com sucesso!');
    }

    public function edit(Servico $servico)
    {
        return view('servicos.edit', compact('servico'));
    }

    public function update(Request $request, Servico $servico)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
            'descricao' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            if (!empty($servico->foto) && Storage::disk('public')->exists($servico->foto)) {
                Storage::disk('public')->delete($servico->foto);
            }
            $dados['foto'] = $request->file('foto')->store('servicos', 'public');
        } else {
            $dados['foto'] = ''; 
        }

        $servico->update($dados);
        return redirect()->route('servicos.index')->with('sucesso', 'Serviço atualizado com sucesso!');
    }

    public function destroy(Servico $servico)
    {
        if (!empty($servico->foto) && Storage::disk('public')->exists($servico->foto)) {
            Storage::disk('public')->delete($servico->foto);
        }

        $servico->delete();
        return redirect()->route('servicos.index')->with('sucesso', 'Serviço excluído com sucesso!');
    }
}