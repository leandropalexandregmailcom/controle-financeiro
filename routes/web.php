<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    RendaController,
    DespesaController,
    CategoriaController,
    LoginController
};

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('logar', [LoginController::class, 'logar'])->name('logar');
Route::get('show', [UserController::class, 'show'])->name('show.user');
Route::post('create', [UserController::class, 'create'])->name('create.user');

Route::prefix('user')->middleware('auth')->group(function() {
    //Usuário
    Route::get('/', [UserController::class, 'index'])->name('home.user');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit.user');
    Route::post('update', [UserController::class, 'update'])->name('update.user');
    Route::post('delete', [UserController::class, 'delete'])->name('delete.user');
});

    Route::prefix('categoria')->group(function() {

        //Categoria
        Route::get('index', [CategoriaController::class, 'index'])->name('index.categoria');
        Route::get('show', [CategoriaController::class, 'show'])->name('show.categoria');
        Route::post('create', [CategoriaController::class, 'create'])->name('create.categoria');
        Route::get('edit/{id}', [CategoriaController::class, 'edit'])->name('edit.categoria');
        Route::post('update', [CategoriaController::class, 'update'])->name('update.categoria');
        Route::post('delete', [CategoriaController::class, 'delete'])->name('delete.categoria');
    });

    Route::prefix('renda')->group(function() {

        //Renda
        Route::get('index', [RendaController::class, 'index'])->name('index.renda');
        Route::get('show', [RendaController::class, 'show'])->name('show.renda');
        Route::post('create', [RendaController::class, 'create'])->name('create.renda');
        Route::get('edit/{id}', [RendaController::class, 'edit'])->name('edit.renda');
        Route::post('update', [RendaController::class, 'update'])->name('update.renda');
        Route::post('delete', [RendaController::class, 'delete'])->name('delete.renda');

    });

    Route::prefix('despesa')->group(function() {

        //Despesa
        Route::get('index', [DespesaController::class, 'index'])->name('index.despesa');
        Route::get('show', [DespesaController::class, 'show'])->name('show.despesa');
        Route::post('create', [DespesaController::class, 'create'])->name('create.despesa');
        Route::get('edit/{id}', [DespesaController::class, 'edit'])->name('edit.despesa');
        Route::post('update', [DespesaController::class, 'update'])->name('update.despesa');
        Route::post('delete', [DespesaController::class, 'delete'])->name('delete.despesa');
    });
