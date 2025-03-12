<?php

use App\Http\Controllers\Admin\AlocacaoPessoaController;
use App\Http\Controllers\Admin\EspacoCafeController;
use App\Http\Controllers\Admin\EtapaController;
use App\Http\Controllers\Admin\PessoaController;
use App\Http\Controllers\Admin\ReuniaoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::put('/alocacao/{id}', [AlocacaoPessoaController::class, 'update'])->name('alocacao.update');
Route::get('/alocacao/{id}/edit', [AlocacaoPessoaController::class, 'edit'])->name('alocacao.edit');
Route::delete('/alocacao/{id}', [AlocacaoPessoaController::class, 'destroy'])->name('alocacao.destroy');
Route::post('/alocacao/store', [AlocacaoPessoaController::class, 'store'])->name('alocacao.store');
Route::get('/alocacao/create', [AlocacaoPessoaController::class, 'create'])->name('alocacao.create');
Route::get('/alocacao', [AlocacaoPessoaController::class, 'index'])->name('alocacao.index');

Route::delete('/etapa/{id}', [EtapaController::class, 'destroy'])->name('etapa.destroy');
Route::get('/etapas/{id}', [EtapaController::class, 'show'])->name('etapa.show');
Route::post('/etapa/store', [EtapaController::class, 'store'])->name('etapa.store');
Route::get('/etapa/create', [EtapaController::class, 'create'])->name('etapa.create');
Route::get('/etapa', [EtapaController::class, 'index'])->name('etapa.index');

Route::delete('/espacocafe/{id}', [EspacoCafeController::class, 'destroy'])->name('espacocafe.destroy');
Route::get('/espacos-cafe/{id}', [EspacoCafeController::class, 'show'])->name('espacocafe.show');
Route::post('/espacocafe/store', [EspacoCafeController::class, 'store'])->name('espacocafe.store');
Route::get('/espacocafe/create', [EspacoCafeController::class, 'create'])->name('espacocafe.create');
Route::get('/espacocafe', [EspacoCafeController::class, 'index'])->name('espacocafe.index');

Route::delete('/sala/{id}', [ReuniaoController::class, 'destroy'])->name('sala.destroy');
Route::get('/sala/{id}/pessoas', [ReuniaoController::class, 'show'])->name('sala.show');
Route::post('/salas/store', [ReuniaoController::class, 'store'])->name('sala.store');
Route::get('/salas/create', [ReuniaoController::class, 'create'])->name('sala.create');
Route::get('/salas', [ReuniaoController::class, 'index'])->name('sala.index');

Route::delete('/pessoa/{id}', [PessoaController::class, 'destroy'])->name('pessoa.destroy');
Route::get('/pessoa/{id}/show', [PessoaController::class, 'show'])->name('pessoa.show');
Route::post('/pessoa/store', [PessoaController::class, 'store'])->name('pessoa.store');
Route::get('/pessoa/create', [PessoaController::class, 'create'])->name('pessoa.create');
Route::get('/pessoa', [PessoaController::class, 'index'])->name('pessoa.index');

Route::get('/', function () {
    return view('entrada');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
