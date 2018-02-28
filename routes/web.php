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
})->name('home');

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

Route::get('/produtos/consulta', 'ProdutosController@consultar')->name('produtos.consulta');

Route::get('/produtos/consulta/editar/{id}', 'ProdutosController@editar')->name('produtos.editar');

Route::post('/produtos/consulta/atualizar/{id}', 'ProdutosController@atualizar')->name('produtos.atualizar');

Route::get('produtos/consulta/deletar/{id}', 'ProdutosController@deletar')->name('produtos.deletar');


/****************Materiais*********************/

Route::get('/materiais/cadastro', 'MateriaisController@index')->name('materiais.cadastro');

Route::post('/materiais/cadastro/cadastrar', 'MateriaisController@cadastrar')->name('materiais.cadastrar');

Route::get('/materiais/consulta', 'MateriaisController@consultar')->name('materiais.consulta');

Route::get('/materiais/consulta/editar/{id}', 'MateriaisController@editar')->name('materiais.editar');

Route::post('/materiais/consulta/atualizar/{id}', 'MateriaisController@atualizar')->name('materiais.atualizar');

Route::get('materiais/consulta/deletar/{id}', 'MateriaisController@deletar')->name('materiais.deletar');


/****************Servicos*********************/

Route::get('/servicos/cadastro', function(){
    return view('servicos_cadastro');
})->name('servicos.cadastro');

Route::post('/servicos/cadastro/cadastrar', 'ServicosController@cadastrar')->name('servicos.cadastrar');

Route::get('/servicos/consulta', 'ServicosController@consultar')->name('servicos.consulta');

Route::get('/servicos/consulta/editar/{id}', 'ServicosController@editar')->name('servicos.editar');

Route::post('/servicos/consulta/atualizar/{id}', 'ServicosController@atualizar')->name('servicos.atualizar');

Route::get('servicos/consulta/deletar/{id}', 'ServicosController@deletar')->name('servicos.deletar');




/****************Orcamentos*********************/

Route::get('/orcamentos/cadastro', 'OrcamentosController@index')->name('orcamentos.cadastro');

Route::get('/orcamentos/cadastro/produto={id}', 'OrcamentosController@lancarProduto')->name('lancar.produto');

Route::get('/orcamentos/cadastro/material={id}', 'OrcamentosController@lancarMaterial')->name('lancar.material');

Route::get('/orcamentos/cadastro/servico={id}', 'OrcamentosController@lancarServico')->name('lancar.servico');

Route::get('/orcamentos/cadastro/deletar/produto={id}', 'OrcamentosController@deletarProduto')->name('deletar.produto');

Route::get('/orcamentos/cadastro/deletar/material={id}', 'OrcamentosController@deletarMaterial')->name('deletar.material');

Route::get('/orcamentos/cadastro/deletar/servico={id}', 'OrcamentosController@deletarServico')->name('deletar.servico');