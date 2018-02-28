<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Servico;


class ServicosController extends Controller
{
    public function cadastrar(request $request){
        
        $servico = new Servico;

        $servico->nome = $request->nome;
        $servico->preco = $request->preco;
        $servico->save();
        
        return redirect()->route('servicos.cadastro')
                         ->with('status', 'Servico cadastrado com sucesso!');

    }

    public function consultar(){
        $servicos = DB::table('servicos')->orderBy('nome')->get();

        return view('servicos_consulta', ['servicos' => $servicos]);
    }

    public function editar($id){

        $servico = Servico::find($id);

        return view('servicos_editar', ['servico' => $servico]); 
    }

    public function atualizar(request $request, $id){
        
        $servico = Servico::find($id);
        
        $servico->nome = $request->nome;
        $servico->preco = $request->preco;

        $servico->save();

        return redirect()->route('servicos.consulta')
                         ->with('status', 'Servico atualizado com sucesso!');
    }

    public function deletar($id){
        
        $servico = Servico::find($id);

        $servico->delete();

        return redirect()->route('servicos.consulta')
                         ->with('status', 'Servico deletado com sucesso!');
    }
}
