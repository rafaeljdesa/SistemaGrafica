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

/****************Clientes*********************/

Route::get('/clientes/cadastro', function(){
    return view('clientes_cadastro');
})->name('clientes.cadastro');

Route::post('/clientes/cadastro/cadastrar', 'ClientesController@cadastrar')->name('clientes.cadastrar');

Route::get('/clientes/consulta', 'ClientesController@consultar')->name('clientes.consulta');

Route::get('/clientes/consulta/editar/{id}', 'ClientesController@editar')->name('clientes.editar');

Route::post('/clientes/consulta/atualizar/{id}', 'ClientesController@atualizar')->name('clientes.atualizar');

Route::get('clientes/consulta/deletar/{id}', 'ClientesController@deletar')->name('clientes.deletar');

/****************Produtos*********************/

Route::get('/produtos/cadastro', function(){
    return view('produtos_cadastro');
})->name('produtos.cadastro');

Route::post('/produtos/cadastro/cadastrar', 'ProdutosController@cadastrar')->name('produtos.cadastrar');
