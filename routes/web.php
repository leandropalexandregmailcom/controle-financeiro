<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\{
    UserController,
    RendaController,
    DespesaController,
    CategoriaController,
    TipoFinancaController,
    LoginController,
    SocialiteController
};

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('logar', [LoginController::class, 'logar'])->name('logar');
Route::get('show', [UserController::class, 'show'])->name('show.user');
Route::post('create', [UserController::class, 'create'])->name('create.user');

Route::get('callback', [SocialiteController::class, 'callbackFacebook'])->name('callback.facebook');
Route::prefix('social/')->group(function() {

    Route::get('redirect/{provider}', [SocialiteController::class, 'redirect'])->name('redirect');

});
Route::middleware('auth')->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('home.user');
});

Route::prefix('user/')->middleware('auth')->group(function() {


    //Usuário
    Route::get('index', [UserController::class, 'index'])->name('home.user');
    Route::get('edit', [UserController::class, 'edit'])->name('edit.user');
    Route::post('update', [UserController::class, 'update'])->name('update.user');
    Route::post('delete', [UserController::class, 'delete'])->name('delete.user');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('renda/')->group(function() {

        //Renda
        Route::get('index', [RendaController::class, 'index'])->name('index.renda');
        Route::get('show', [RendaController::class, 'show'])->name('show.renda');
        Route::post('create', [RendaController::class, 'create'])->name('create.renda');
        Route::get('edit/{id}', [RendaController::class, 'edit'])->name('edit.renda');
        Route::post('update', [RendaController::class, 'update'])->name('update.renda');
        Route::post('delete', [RendaController::class, 'delete'])->name('delete.renda');

    });

    Route::prefix('despesa/')->group(function() {

        //Despesa
        Route::get('index', [DespesaController::class, 'index'])->name('index.despesa');
        Route::get('show', [DespesaController::class, 'show'])->name('show.despesa');
        Route::post('create', [DespesaController::class, 'create'])->name('create.despesa');
        Route::get('edit/{id}', [DespesaController::class, 'edit'])->name('edit.despesa');
        Route::post('update', [DespesaController::class, 'update'])->name('update.despesa');
        Route::post('delete', [DespesaController::class, 'delete'])->name('delete.despesa');
    });

});
