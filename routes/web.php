<?php

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

Route::get('/', function () {
    return view('index');
});

Route::get('/clientes/cadastro', function(){
    return view('clientes_cadastro');
})->name('clientes.cadastro');

Route::post('/clientes/cadastro/cadastrar', 'ClientesController@cadastrar')->name('clientes.cadastrar');