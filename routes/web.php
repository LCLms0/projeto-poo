<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\BarbeiroController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController; 

// Rotas de Autenticação
Route::get('/', [AuthController::class, 'mostrarLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.enviar');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Proteção
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('servicos', ServicoController::class);
    Route::resource('produtos', ProdutoController::class);
    Route::resource('barbeiros', BarbeiroController::class);
});