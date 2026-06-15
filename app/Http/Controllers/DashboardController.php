<?php

namespace App\Http\Controllers;

use App\Models\Cliente;  
use App\Models\Barbeiro;
use App\Models\Servico;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalClientes = Cliente::count();
        $totalBarbeiros = Barbeiro::count();
        $totalServicos = Servico::count();

        return view('dashboard', compact('totalClientes', 'totalBarbeiros', 'totalServicos'));
    }
}