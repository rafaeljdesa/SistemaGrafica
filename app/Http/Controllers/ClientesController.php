<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cliente;

class ClientesController extends Controller
{
    public function cadastrar(request $request){

        $cliente = new Cliente;

        $cliente->nome = $request->nome;
        $cliente->telefone = $request->telefone;
        $cliente->email = $request->email;

        $cliente->save();
        
        return redirect()->route('clientes.cadastro')
                         ->with('status', 'Cliente cadastrado com sucesso!');

    }

    public function consultar(){
        
        // $clientes = Cliente::all();

        $clientes = DB::table('clientes')->orderBy('nome')->get();

        return view('clientes_consulta', ['clientes' => $clientes]);

    }

    public function editar($id){

        $cliente = Cliente::find($id);

        return view('clientes_editar', ['cliente' => $cliente]); 
    }

    public function atualizar(request $request, $id){
        
        $cliente = Cliente::find($id);
        
        $cliente->nome = $request->nome;
        $cliente->telefone = $request->telefone;
        $cliente->email = $request->email;

        $cliente->save();

        return redirect()->route('clientes.consulta')
                         ->with('status', 'Cliente atualizado com sucesso!');
    }

    public function deletar($id){
        
        $cliente = Cliente::find($id);

        $cliente->delete();

        return redirect()->route('clientes.consulta')
                         ->with('status', 'Cliente deletado com sucesso!');
    }
}
