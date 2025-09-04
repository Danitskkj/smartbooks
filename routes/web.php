<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AutorController; // Não se esqueça de importar o controller!
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EmprestimoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Módulos principais
    Route::resource('autores', AutorController::class)
        ->parameters(['autores' => 'autor']);
    Route::resource('livros', LivroController::class)
        ->parameters(['livros' => 'livro']);
    Route::resource('emprestimos', EmprestimoController::class)
        ->parameters(['emprestimos' => 'emprestimo']);
});

require __DIR__.'/auth.php';
