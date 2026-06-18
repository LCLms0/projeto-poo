<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Barbeiro;
use App\Models\Servico;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProdutos = Produto::count(); // <-- Contando os produtos reais
        $totalBarbeiros = Barbeiro::count();
        $totalServicos = Servico::count();

        // Passando a variável certa pro Blade
        return view('dashboard', compact('totalProdutos', 'totalBarbeiros', 'totalServicos'));
    }
}