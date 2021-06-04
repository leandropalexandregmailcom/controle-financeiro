<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::group(['prefix' => '/'], function() {

    Route::get('/', 'App\Http\Controllers\UserController@index')->name('home');
    Route::get('logar', 'App\Http\Controllers\LoginController@logar')->name('logar');
    Route::get('login', 'App\Http\Controllers\LoginController@login')->name('login');
    Route::get('index', 'App\Http\Controllers\UserController@index')->name('index');
    Route::get('show', 'App\Http\Controllers\UserController@show')->name('show');
    Route::post('create', 'App\Http\Controllers\UserController@create')->name('create');
    Route::get('edit', 'App\Http\Controllers\UserController@edit')->name('edit');
    Route::post('update', 'App\Http\Controllers\UserController@update')->name('update');
    Route::post('delete', 'App\Http\Controllers\UserController@delete')->name('delete');
});

Route::group(['prefix' => 'administrador/'], function() {

});

Route::group(['prefix' => 'cliente/'], function() {

});

Route::group(['prefix' => 'categoria/'], function() {

    //Categoria
    Route::get('index', 'App\Http\Controllers\CategoriaController@index')->name('index_categoria');
    Route::get('show', 'App\Http\Controllers\CategoriaController@show')->name('show_categoria');
    Route::post('create', 'App\Http\Controllers\CategoriaController@create')->name('create_categoria');
    Route::get('edit', 'App\Http\Controllers\CategoriaController@edit')->name('edit_categoria');
    Route::post('update', 'App\Http\Controllers\CategoriaController@update')->name('update_categoria');
    Route::post('delete', 'App\Http\Controllers\CategoriaController@delete')->name('delete_categoria');
});

Route::group(['prefix' => 'despesa/'], function() {
    //Despesa
    Route::get('index', 'App\Http\Controllers\DespesaController@index')->name('index_despesa');
    Route::get('show', 'App\Http\Controllers\DespesaController@show')->name('show_despesa');
    Route::post('create', 'App\Http\Controllers\DespesaController@create')->name('create_despesa');
    Route::get('edit', 'App\Http\Controllers\DespesaController@edit')->name('edit_despesa');
    Route::post('update', 'App\Http\Controllers\DespesaController@update')->name('update_despesa');
    Route::post('delete', 'App\Http\Controllers\DespesaController@delete')->name('delete_despesa');
});

Route::group(['prefix' => 'renda/'], function() {
    //Renda
    Route::get('index', 'App\Http\Controllers\RendaController@index')->name('index_renda');
    Route::get('show', 'App\Http\Controllers\RendaController@show')->name('show_renda');
    Route::post('create', 'App\Http\Controllers\RendaController@create')->name('create_renda');
    Route::get('edit', 'App\Http\Controllers\RendaController@edit')->name('edit_renda');
    Route::post('update', 'App\Http\Controllers\RendaController@update')->name('update_renda');
    Route::post('delete', 'App\Http\Controllers\RendaController@delete')->name('delete_renda');
});
