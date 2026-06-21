<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        if ($request->has('preco_venda')) {
            $request->merge([
                'preco_venda' => str_replace(',', '.', $request->preco_venda)
            ]);
        }

        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'preco_venda' => 'required|numeric|min:0',
            'quantidade_estoque' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $dados['foto'] = $request->file('foto')->store('produtos', 'public');
        } else {
            $dados['foto'] = null; 
        }

        Produto::create($dados);

        return redirect()->route('produtos.index')->with('sucesso', 'Produto criado com sucesso!');
    }

    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto)
        {
            if ($request->has('preco_venda')) {
                $request->merge([
                    'preco_venda' => str_replace(',', '.', $request->preco_venda)
                ]);
            }

            $validador = Validator::make($request->all(), [
                'nome' => 'required|string|max:255',
                'marca' => 'required|string|max:255',
                'preco_venda' => 'required|numeric|min:0',
                'quantidade_estoque' => 'required|integer|min:0',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if ($validador->fails()) {
                return redirect()->back()
                    ->withErrors($validador)
                    ->withInput()
                    ->with('modal_error_id', $produto->id);
            }

            $dados = $validador->validated();

            if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
                if ($produto->foto) {
                    Storage::disk('public')->delete($produto->foto);
                }
                $dados['foto'] = $request->file('foto')->store('produtos', 'public');
            } else {
                $dados['foto'] = null; 
            }

            $produto->update($dados);

            return redirect()->route('produtos.index')->with('sucesso', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        if ($produto->foto) {
            Storage::disk('public')->delete($produto->foto);
        }

        $produto->delete();

        return redirect()->route('produtos.index')->with('sucesso', 'Produto excluído com sucesso!');
    }
}