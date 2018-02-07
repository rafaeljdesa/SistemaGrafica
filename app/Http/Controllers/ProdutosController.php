<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Produto;

class ProdutosController extends Controller
{
    public function cadastrar(request $request){
        
        $produto = new Produto;

        $produto->nome = $request->nome;
        $produto->vias = $request->vias;
        $produto->tamanho = $request->tamanho;
        $produto->preco = $request->preco;
        $produto->save();
        
        return redirect()->route('produtos.cadastro')
                         ->with('status', 'Produto cadastrado com sucesso!');

    }

    public function consultar(){
        $produtos = DB::table('produtos')->orderBy('nome')->get();

        return view('produtos_consulta', ['produtos' => $produtos]);
    }

    public function editar($id){

        $produto = Produto::find($id);

        return view('produtos_editar', ['produto' => $produto]); 
    }

    public function atualizar(request $request, $id){
        
        $produto = Produto::find($id);
        
        $produto->nome = $request->nome;
        $produto->vias = $request->vias;
        $produto->tamanho = $request->tamanho;
        $produto->preco = $request->preco;

        $produto->save();

        return redirect()->route('produtos.consulta')
                         ->with('status', 'Produto atualizado com sucesso!');
    }

    public function deletar($id){
        
        $produto = Produto::find($id);

        $produto->delete();

        return redirect()->route('produtos.consulta')
                         ->with('status', 'Produto deletado com sucesso!');
    }
}
