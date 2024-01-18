<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'clientes' => \App\Models\Cliente::all(),
        'users' => \App\Models\User::all()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users-index', [UserController::class, 'index'])->name('users.index');
    Route::get('/users-edit/{id}',  [UserController::class, 'edit'])->name('users.edit');
    Route::put('/edit-update/{id}',  [UserController::class, 'update'])->name('users.update');
    Route::resources([
        //utilizando resources, o nome da rota será "nome":controller, e o método do controleer será as rotas.
        'cliente'=> \App\Http\Controllers\ClienteController::class

    ]);
    Route::get('/confirma-delete/{id}', [\App\Http\Controllers\ClienteController::class, 'confirma_delete'])->name('confirma.delete');
    Route::get('/meus-clientes/{id}', [\App\Http\Controllers\ClienteController::class, 'meus_clientes'])->name('meus.clientes');
});

require __DIR__.'/auth.php';
