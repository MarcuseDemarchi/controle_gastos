<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DespesaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('usuarios', UserController::class);    
    Route::resource('categorias', CategoriaController::class);
    Route::resource('despesas', DespesaController::class);
    Route::get('relatorio', [DespesaController::class, 'relatorio'])->name('despesas.relatorio');
});

require __DIR__.'/auth.php';
