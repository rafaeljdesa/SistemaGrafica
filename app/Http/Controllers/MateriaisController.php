<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Material;
use App\Produto;

class MateriaisController extends Controller
{
    
    public function index(){
        $produtos = Produto::all();

        return view('materiais_cadastro', ['produtos' => $produtos]); 
    }
    
    public function cadastrar(request $request){
        
        $material = new Material;

        $material->nome = $request->nome;
        $material->produto_id = $request->produto_id;
        $material->preco = $request->preco;
        $material->save();
        
        return redirect()->route('materiais.cadastro')
                         ->with('status', 'Material cadastrado com sucesso!');

    }

    public function consultar(){
        $materiais = DB::table('materiais')->orderBy('nome')->get();

        return view('materiais_consulta', ['materiais' => $materiais]);
    }

    public function editar($id){
        $material = Material::find($id);
        $produtos = Produto::all();

        return view('materiais_editar', ['material' => $material,
                                         'produtos' => $produtos ]);
        
    }

    public function atualizar(request $request, $id){
        $material = Material::find($id);

        $material->nome = $request->nome;
        $material->produto_id = $request->produto_id;
        $material->preco = $material->preco;
        $material->save();

        return redirect()->route('materiais.consulta')
                         ->with('status', 'Material atualizado com sucesso!');
        
    }

    public function deletar($id){
        $material = Material::find($id);

        $material->delete();

        return redirect()->route('materiais.consulta')
                         ->with('status', 'Material deletado com sucesso!');
        
    }
}
